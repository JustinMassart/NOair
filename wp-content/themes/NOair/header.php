<!DOCTYPE html>
<html lang="<?= get_locale() ?>">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description"
			  content="<?= __( 'Rejoignez la sensibilisation contre la pollution grâce aux modules de NOair permettant de mesurer la qualité de l’air.', 'NOair' ); ?>">
		<title><?= get_bloginfo( 'name' ); ?><?= wp_title( '•' ); ?></title>
		<link rel="stylesheet" type="text/css" href="<?= NOair_mix( '/css/style.css' ); ?>"/>
		<script type="text/javascript" src="<?= NOair_mix( 'js/script.js' ); ?>"></script>
		<?php wp_head(); ?>
	</head>
	<body class="body">
		<div class="body__container">
			<header class="header">
				<div class="header__wrapper">
					<h1 class="header__title sro">
						<?= get_bloginfo( 'name' ) ?>
						<span class="sro">
						<?= wp_title( '•' ) ?>
					</span>
					</h1>
					<div class="header__logo">
						<a href="/">
							<?= file_get_contents( __DIR__ . '/resources/assets/NOair.svg' ) ?>
						</a>
					</div>
					<div class="header__burger">
						<div class="header__languages">
							<?php foreach ( pll_the_languages( [ 'raw' => true ] ) as $code => $locale ) : ?>
								<a href="<?= $locale[ 'url' ]; ?>" class="header__locale" title="<?= $locale[ 'name' ]; ?>"
								   lang="<?= $locale[ 'locale' ]; ?>" hreflang="<?= $locale[ 'locale' ]; ?>"><?= $code; ?></a>
							<?php endforeach; ?>
						</div>
						<nav class="header__nav nav">
							<h2 class="nav__title sro"><?= __( 'Navigation principale', 'NOair' ); ?></h2>
							<ul class="nav__container">
								<?php foreach ( NOair_get_menu_items( 'primary' ) as $link ): ?>
									<li class="<?= $link -> getBemClasses( 'nav__item' ); ?>">
										<a href="<?= $link -> url; ?>" class="nav__link"><?= $link -> label; ?></a>
									</li>
								<?php endforeach; ?>
							</ul>
							<div class="nav__cta cta">
								<a href="<?= get_permalink( NOair_get_template_page( ( 'template-contact' ) ) ) ?>"
								   class="nav__contact"><?= __( 'contactez nous', 'NOair' ); ?></a>
							</div>
						</nav>
					</div>
				</div>
			</header>