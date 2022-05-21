<?php

	require_once( __DIR__ . '/Menus/PrimaryMenuItem.php' );

// Lancer la session PHP

	add_action( 'init', 'NOair_boot_theme', 1 );

	function NOair_boot_theme() {
		load_theme_textdomain( 'NOair', __DIR__ . '/locales' );

		if ( ! session_id() ) {
			session_start();
		}
	}

// Désactiver l'éditeur "Gutenberg" de Wordpress
	add_filter( 'use_block_editor_for_post', '__return_false' );
	add_filter( 'use_block_editor_for_post', '__return_false' );

// Autoriser l'upload de SVG par l’admin

	add_filter( 'wp_check_filetype_and_ext', function ( $data, $file, $filename, $mimes )
	{

		global $wp_version;
		if ( $wp_version !== '4.7.1' ) {
			return $data;
		}

		$filetype = wp_check_filetype( $filename, $mimes );

		return [
			'ext'             => $filetype[ 'ext' ],
			'type'            => $filetype[ 'type' ],
			'proper_filename' => $data[ 'proper_filename' ]
		];

	}, 10, 4 );

	function cc_mime_types( $mimes ) {
		$mimes[ 'svg' ] = 'image/svg+xml';

		return $mimes;
	}

	add_filter( 'upload_mimes', 'cc_mime_types' );

	function fix_svg() {
		echo '<style type="text/css">
        .attachment-266x266, .thumbnail img {
             width: 100% !important;
             height: auto !important;
        }
        </style>';
	}

	add_action( 'admin_head', 'fix_svg' );

// Enregistrer un seul custom post-type pour les modules

	register_post_type( 'module', [
		'label'         => 'Modules',
		'labels'        => [
			'name'          => 'Modules',
			'singular_name' => 'Module',
		],
		'description'   => 'Tous les articles à propos des modules',
		'public'        => true,
		'menu_position' => 20,
		'menu_icon'     => 'dashicons-welcome-add-page',
		'supports'      => [ 'title', 'editor' ],
		'rewrite'       => [ 'slug' => 'modules' ],
	] );

	// Requête Wordpress pour la boucle des modules

	function NOair_get_modules() {
		return new WP_Query( [
			'post_type' => 'module',
			'orderby'   => 'name',
			'order'     => 'ASC'
		] );
	}

	// Enregistrer un seul custom post-type pour les publications

	register_post_type( 'publication', [
		'label'         => 'Publications',
		'labels'        => [
			'name'          => 'Publications',
			'singular_name' => 'Publication',
		],
		'description'   => 'Toutes les publications qui font référence à NOair.',
		'public'        => true,
		'menu_position' => 21,
		'menu_icon'     => 'dashicons-welcome-write-blog',
		'supports'      => [ 'title' ],
		'rewrite'       => [ 'slug' => 'publications' ],
	] );

	// Requête Wordpress pour la boucle des publications

	function NOair_get_publications( $limit ) {
		return new WP_Query( [
			'post_type'      => 'publication',
			'posts_per_page' => $limit,
			'orderby'        => 'DESC'
		] );
	}

	// Enregistrer un seul custom post-type pour les messages

	register_post_type( 'message', [
		'label'         => 'Messages de contact',
		'labels'        => [
			'name'          => 'Messages de contact',
			'singular_name' => 'Message de contact',
		],
		'description'   => 'Les messages envoyés par les utilisateurs via le formulaire de contact.',
		'public'        => false,
		'show_ui'       => true,
		'menu_position' => 23,
		'menu_icon'     => 'dashicons-buddicons-pm',
		'capabilities'  => [
			'create_posts' => false,
		],
		'map_meta_cap'  => true,
	] );

// Enregistrer les menus de navigation

	register_nav_menu( 'primary', 'Emplacement de la navigation principale de haut de page' );
	register_nav_menu( 'footer', 'Emplacement de la navigation de pied de page' );

// Définition de la fonction retournant un menu de navigation sous forme d'un tableau de liens de niveau 0.

	function NOair_get_menu_items( $location ) {
		$items = [];

		// Récupérer le menu qui correspond à l'emplacement souhaité
		$locations = get_nav_menu_locations();

		if ( ! ( $locations[ $location ] ?? false ) ) {
			return $items;
		}

		$menu = $locations[ $location ];

		// Récupérer tous les éléments du menu en question
		$posts = wp_get_nav_menu_items( $menu );

		// Traiter chaque élément de menu pour le transformer en objet
		foreach ( $posts as $post ) {
			// Créer une instance d'un objet personnalisé à partir de $post
			$item = new PrimaryMenuItem( $post );

			// Ajouter cette instance soit à $items (s'il s'agit d'un élément de niveau 0), soit en tant que sous-élément d'un item déjà existant.
			if ( ! $item -> isSubItem() ) {
				// Il s'agit d'un élément de niveau 0, on l'ajoute au tableau
				$items[] = $item;
				continue;
			}

			// Ajouter l'instance comme "enfant" d'un item existant
			foreach ( $items as $existing ) {
				if ( ! $existing -> isParentFor( $item ) ) {
					continue;
				}

				$existing -> addSubItem( $item );
			}
		}

		// Retourner les éléments de menu de niveau 0
		return $items;
	}

// Enregistrer le traitement du formulaire de contact personnalisé.

	add_action( 'admin_post_submit_contact_form', 'NOair_handle_submit_contact_form' );

	function NOair_handle_submit_contact_form() {
		if ( ! NOair_verify_contact_form_nonce() ) {
			// C'est pas OK.
			header( "HTTP/1.1 401 Unauthorized" );
			exit;
		}

		$data = NOair_sanitize_contact_form_data();

		if ( $errors = NOair_validate_contact_form_data( $data ) ) {
			$_SESSION[ 'feedback_contact_form' ] = [
				'success' => false,
				'data'    => $data,
				'errors'  => $errors,
			];

			return wp_redirect( $_POST[ '_wp_http_referer' ] );
		}

		// Stocker en base de données
		$id = wp_insert_post( [
			'post_type'    => 'message',
			'post_title'   => 'Message de ' . $data[ 'firstname' ] . ' ' . $data[ 'lastname' ],
			'post_content' => $data[ 'message' ],
			'post_status'  => 'publish',
		] );

		// Envoyer un mail
		$content = 'Bonjour, un nouveau message de contact a été envoyé.<br />';
		$content .= 'Pour le visualiser : ' . get_edit_post_link( $id );

		wp_mail( get_bloginfo( 'admin_email' ), 'Nouveau message', $content );

		// Tout est OK, afficher le feedback positif
		$_SESSION[ 'feedback_contact_form' ] = [
			'success' => true,
		];

		return wp_redirect( $_POST[ '_wp_http_referer' ] );
	}

	function NOair_verify_contact_form_nonce() {
		$nonce = $_POST[ '_wpnonce' ];

		return wp_verify_nonce( $nonce, 'nonce_check_contact_form' );
	}

	function NOair_sanitize_contact_form_data() {
		return [
			'firstname' => sanitize_text_field( $_POST[ 'firstname' ] ?? null ),
			'lastname'  => sanitize_text_field( $_POST[ 'lastname' ] ?? null ),
			'email'     => sanitize_email( $_POST[ 'email' ] ?? null ),
			'work'      => sanitize_text_field( $_POST[ 'work' ] ?? null ),
			'subject'   => sanitize_text_field( $_POST[ 'subject' ] ?? null ),
			'message'   => sanitize_text_field( $_POST[ 'message' ] ?? null ),
			'rules'     => $_POST[ 'rules' ] ?? null
		];
	}

	function NOair_validate_contact_form_data( $data ) {

		$errors = [];

		$required = [ 'firstname', 'lastname', 'email', 'message' ];
		$email    = [ 'email' ];
		$accepted = [ 'rules' ];
		$options  = [ 'modules', 'ingénieur', 'hepl', 'issep' ];
		$select   = $_POST[ 'subject' ];

		foreach ( $data as $key => $value ) {
			if ( in_array( $key, $required, true ) && ! $value ) {
				$errors[ $key ] = 'requis';
				continue;
			}

			if ( in_array( $key, $email, true ) && ! filter_var( $value, FILTER_VALIDATE_EMAIL ) ) {
				$errors[ $key ] = 'email';
				continue;
			}

			if ( in_array( $key, $accepted, true ) && $value !== '1' ) {
				$errors[ $key ] = 'Vous devez accepter les conditions générales d’utilisations pour envoyer un message.';
				continue;
			}
		}

		if ( ! in_array( $select, $options, true ) ) {
			$errors[ 'subject' ] = 'Veuillez choisir un sujet dans la liste.';
		}

		return $errors ? : false;
	}

	function NOair_get_contact_field_value( $field ) {
		if ( ! isset( $_SESSION[ 'feedback_contact_form' ] ) ) {
			return '';
		}

		return $_SESSION[ 'feedback_contact_form' ][ 'data' ][ $field ] ?? '';
	}

	function NOair_get_contact_field_error( $field ) {
		if ( ! isset( $_SESSION[ 'feedback_contact_form' ] ) ) {
			return '';
		}

		return $_SESSION[ 'feedback_contact_form' ][ 'errors' ][ $field ] ?? '';
	}

// Utilitaire pour charger un fichier compilé par mix, avec cache bursting.

	function NOair_mix( $path ) {
		$path = '/' . ltrim( $path, '/' );

		// Checker si le fichier demandé existe bien, sinon retourner NULL
		if ( ! realpath( __DIR__ . '/public' . $path ) ) {
			return;
		}

		// Check si le fichier mix-manifest existe bien, sinon retourner le fichier sans cache-bursting
		if ( ! ( $manifest = realpath( __DIR__ . '/public/mix-manifest.json' ) ) ) {
			return get_stylesheet_directory_uri() . '/public' . $path;
		}

		// Ouvrir le fichier mix-manifest et lire le JSON
		$manifest = json_decode( file_get_contents( $manifest ), true );

		// Check si le fichier demandé est bien présent dans le mix manifest, sinon retourner le fichier sans cache-bursting
		if ( ! array_key_exists( $path, $manifest ) ) {
			return get_stylesheet_directory_uri() . '/public' . $path;
		}

		// C'est OK, on génère l'URL vers la ressource sur base du nom de fichier avec cache-bursting.
		return get_stylesheet_directory_uri() . '/public' . $manifest[ $path ];
	}

// Fonction permettant d'inclure des composants et d'y injecter des variables locales (scope de l'appel de fonction)

	function NOair_include( string $partial, array $variables = [] ) {
		extract( $variables );

		include( __DIR__ . '/partials/' . $partial . '.php' );
	}

// Générer un lien vers la première page utilisant un certain template

	function NOair_get_template_page( string $template ) {
		// Créer une WP_Query
		$query = new WP_Query( [
			'post_type'   => 'page', // uniquement récupérer des pages
			'post_status' => 'publish', // uniquement les pages publiées
			'meta_query'  => [
				[
					'key'   => '_wp_page_template',
					'value' => $template . '.php',
					// Filtrer sur le type de template utilisé
				]
			]
		] );

		// Retourner la première occurrence
		return $query -> posts[ 0 ] ?? null;
	}

	// Récupérer les champs des informations générales dans un tableau pour le templating

	function NOair_get_general_infos(): array {
		$infos = [];

		$info[] = get_field( 'first_info' );
		$info[] = get_field( 'second_info' );
		$info[] = get_field( 'third_info' );
		$info[] = get_field( 'fourth_info' );

		return $info;

	}

	// Récupérer un tableau des mesures effectuées par un module

	function NOair_get_measures(): array {
		return get_field( 'measurement' );
	}

	// Récupérer les trois premières mesures effectuées par un module pour le templating de la page MODULES

	function NOair_get_N_measures( $number ): array {
		return array_slice( NOair_get_measures(), 0, $number );
	}

	// Faire une fonction qui renvoi un template si l’image enregistrée dans une publication est un fichier '.png'

	function NOair_get_png_template( $id, $size ) {
		return wp_get_attachment_image( $id, $size );
	}

	// Faire une fonction qui renvoi un template si l’image enregistrée dans une publication est un fichier '.svg'

	function NOair_get_svg_template( $url, $width, $height ): string {
		$link  = $url;
		$title = str_replace( ':name', $link, __( 'Le logo de :name .', 'NOair' ) );
		$desc  = str_replace( ':name', $link, __( 'Le logo de :name .', 'NOair' ) );

		return <<<HTML
			<svg class="publication__svg"
				 width="{$width}"
				 height="{$height}">
				<title>
					{$title}
				</title>
				<desc>
					{$desc}
				</desc>
				<image xlink:href="{$link}" width="{$width}" height="{$height}"/>
			</svg>
HTML;

	}

	// Faire une fonction qui regarde de quelle extension est, l'image qui a été enregistré dans une publication.
	// Ensuite elle renvoi suivant l’extension une fonction qui fera le bon templating

	function NOair_get_template_by_extension( $file, $width, $height, $size ) {
		$fileInfo = pathinfo( $file[ 'url' ] );
		$id       = $file[ 'ID' ];
		$url      = $file[ 'url' ];

		switch ( $fileInfo[ 'extension' ] ) {
			case 'png':
			case 'jpg':
			case 'jpeg':
				return NOair_get_png_template( $id, $size );
				break;
			case 'svg':
				return NOair_get_svg_template( $url, $width, $height );
				break;
			case "": // Si le fichier termine par '.'
			case null: // Si pas d’extension de fichier
				return 'Oups ! On dirait qu’il y a un problème avec l’image de cette publication.';
				break;
		}
	}

	// Faire une fonction qui prend un texte donnée par une zone de texte de ACF et en fait un tableau d’éléments pour chaque entrée

	function NOair_make_array_of_string( $string ) {
		return explode( PHP_EOL, $string );
	}