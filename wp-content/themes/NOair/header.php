<!DOCTYPE html>
<html lang="<?= explode( '_', get_locale() )[ 0 ] ?>">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description"
			  content="<?= __( 'Rejoignez la sensibilisation contre la pollution grâce aux modules de NOair permettant de mesurer la qualité de l’air.', 'NOair' ); ?>">
		<title><?= get_bloginfo( 'name' ); ?><?= wp_title( '•' ); ?></title>
		<link rel="stylesheet" type="text/css" href="<?= NOair_mix( '/css/style.css' ); ?>"/>
		<script type="text/javascript" src="<?= NOair_mix( '/js/script.js' ); ?>"></script>
		<?php wp_head(); ?>
	</head>
	<body class="body" itemscope itemtype="https://schema.org/Organization">
		<span class="alert"><?= __( 'Ce site est toujours en cours de développement', 'NOair' ) ?></span>
		<div class="body__container">
			<div class="body__wave <?= $_SESSION[ 'accents' ][ 'name' ] ?>">
				<?= NOair_get_svg( 'wave' ) ?>
			</div>
			<header class="header">
				<div class="header__wrapper">
					<h1 class="header__title sro">
						<span itemprop="legalName">
							<?= get_bloginfo( 'name' ) ?>
						</span>
						<span class="sro">
							<?= wp_title( '•' ) ?>
						</span>
					</h1>
					<div class="header__logo">
						<a href="/" itemprop="logo" title="<?= __( 'Aller sur la page d’accueil', 'NOair' ) ?>">
							<?= NOair_get_svg( 'NOair' ) ?>
						</a>
					</div>
					<div class="header__burger">
						<div class="header__languages">
							<?php foreach ( pll_the_languages( [ 'raw' => true ] ) as $code => $locale ) : ?>
								<div class="header__langs <?= NOair_verify_lang( $locale ) ?>">
									<a href="<?= $locale[ 'url' ]; ?>" itemprop="knowsLanguage"
									   title="<?= __( 'Changer la langue en ', 'NOair' ) . strtoupper( $code ) ?>"
									   class="header__locale"
									   title="<?= $locale[ 'name' ]; ?>"
									   lang="<?= $locale[ 'locale' ]; ?>" hreflang="<?= $locale[ 'locale' ]; ?>"><?= $code; ?></a>
								</div>
							<?php endforeach; ?>
						</div>
						<nav class="header__nav nav">
							<h2 class="nav__title sro"><?= __( 'Navigation principale', 'NOair' ); ?></h2>
							<ul class="nav__container">
								<?php foreach ( NOair_get_menu_items( 'primary' ) as $link ): ?>
									<li class="<?= $link -> getBemClasses( 'nav__item' ); ?><?= NOair_verify_url( $link -> url ) ?>">
										<a href="<?= $link -> url ?>" title="<?= __( 'Aller sur la page ', 'NOair' ) . $link -> label ?>"
										   class="nav__link"><?= $link -> label; ?></a>
									</li>
								<?php endforeach; ?>
							</ul>
							<div class="nav__cta cta <?= $_SESSION[ 'accents' ][ 'name' ] . '__cta' ?>">
								<a href="<?= get_permalink( NOair_get_template_page( ( 'template-contact' ) ) ) ?>"
								   title="<?= __( 'Aller sur la page de contact', 'NOair' ) ?>"
								   class="nav__contact"><?= __( 'contactez nous', 'NOair' ); ?></a>
							</div>
						</nav>
					</div>
				</div>
			</header>