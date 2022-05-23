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
		<svg id="svgs" xmlns="http://www.w3.org/2000/svg">
			<symbol id="NOair" viewBox="0 0 545.76 208.6">
				<defs>
					<style>.NOair {
                            fill: #1d1d1b;
                        }</style>
				</defs>
				<g>
					<path class="NOair" d="M22.96,167.85H0V0L107.77,127.4V2.92h22.96V167.85h-22.28L22.96,63.81v104.04Z"/>
					<path class="NOair"
						  d="M249.64,2.02c11.52,0,22.36,2.17,32.51,6.52,10.15,4.35,18.98,10.26,26.49,17.75,7.5,7.49,13.42,16.29,17.73,26.4,4.32,10.11,6.48,20.94,6.48,32.47s-2.16,22.1-6.48,32.13c-4.32,10.04-10.23,18.8-17.73,26.29-7.5,7.49-16.33,13.41-26.49,17.75-10.16,4.35-21,6.52-32.51,6.52s-22.32-2.17-32.4-6.52c-10.08-4.34-18.87-10.26-26.37-17.75-7.5-7.49-13.41-16.25-17.73-26.29-4.32-10.03-6.48-20.75-6.48-32.13s2.16-22.36,6.48-32.47c4.32-10.11,10.23-18.91,17.73-26.4,7.5-7.49,16.29-13.4,26.37-17.75,10.08-4.34,20.88-6.52,32.4-6.52Zm0,142.68c7.88,0,15.35-1.57,22.4-4.7,7.05-3.13,13.19-7.39,18.42-12.76,5.23-5.37,9.36-11.68,12.39-18.92,3.03-7.24,4.55-14.96,4.55-23.17s-1.52-15.97-4.55-23.28c-3.03-7.31-7.16-13.69-12.39-19.14-5.23-5.45-11.37-9.74-18.42-12.87-7.05-3.13-14.52-4.7-22.4-4.7s-15.31,1.57-22.28,4.7c-6.97,3.14-13.07,7.43-18.3,12.87-5.23,5.45-9.36,11.83-12.39,19.14-3.03,7.31-4.55,15.07-4.55,23.28s1.51,15.93,4.55,23.17c3.03,7.24,7.16,13.54,12.39,18.92,5.23,5.37,11.33,9.63,18.3,12.76,6.97,3.14,14.4,4.7,22.28,4.7Z"/>
				</g>
				<g>
					<path class="NOair"
						  d="M381.02,132.7c5.33,0,10.35,1.01,15.05,3.02,4.7,2.02,8.83,4.75,12.36,8.21,3.54,3.46,6.33,7.54,8.36,12.24,2.04,4.71,3.06,9.7,3.06,14.98v37.3h-15.01v-6.98c-3.3,2.47-6.95,4.42-10.93,5.85-3.99,1.43-8.26,2.14-12.82,2.14-5.34,0-10.37-1.01-15.08-3.02-4.71-2.02-8.82-4.75-12.31-8.21-3.5-3.46-6.27-7.51-8.31-12.17-2.04-4.66-3.06-9.62-3.06-14.91s1.02-10.27,3.05-14.98c2.04-4.7,4.8-8.79,8.29-12.24,3.49-3.46,7.59-6.19,12.29-8.21,4.7-2.02,9.72-3.02,15.06-3.02Zm.07,61.93c3.3,0,6.39-.63,9.25-1.88,2.86-1.26,5.37-2.95,7.5-5.07,2.14-2.12,3.84-4.61,5.1-7.46,1.26-2.85,1.89-5.87,1.89-9.06s-.63-6.35-1.89-9.2c-1.26-2.85-2.96-5.34-5.1-7.46-2.14-2.12-4.64-3.82-7.5-5.07-2.87-1.26-5.95-1.88-9.25-1.88s-6.39,.63-9.25,1.88c-2.87,1.26-5.37,2.95-7.51,5.07-2.14,2.13-3.84,4.62-5.1,7.46-1.26,2.85-1.89,5.92-1.89,9.2s.63,6.21,1.89,9.06c1.26,2.85,2.96,5.34,5.1,7.46,2.14,2.13,4.64,3.82,7.51,5.07,2.86,1.26,5.95,1.88,9.25,1.88Z"/>
					<path class="NOair" d="M445.36,124.78v-14.83h15.01v14.83h-15.01Zm15.01,7.78v76.05h-15.01v-76.05h15.01Z"/>
					<path class="NOair"
						  d="M537.31,138.23c3.3,2.13,6.12,4.8,8.45,8l-8.45,6.64-3.21,2.59c-1.65-2.4-3.81-4.32-6.48-5.76-2.67-1.44-5.56-2.16-8.67-2.16-2.53,0-4.91,.48-7.14,1.44-2.24,.96-4.18,2.26-5.83,3.89-1.65,1.63-2.96,3.55-3.93,5.76-.97,2.21-1.46,4.56-1.46,7.06v42.78h-15.01v-75.76h15.01v5.53c2.62-1.74,5.49-3.1,8.6-4.07,3.11-.97,6.36-1.46,9.76-1.46s6.65,.49,9.76,1.46c3.11,.97,5.97,2.33,8.6,4.07Z"/>
				</g>
			</symbol>
			<symbol id="cross" viewBox="0 0 45.47 45.48">
				<defs>
					<style>.cross {
                            fill: none;
                            stroke: #1d1d1b;
                            stroke-linecap: round;
                            stroke-miterlimit: 10;
                            stroke-width: 5px;
                        }</style>
				</defs>
				<line class="cross" x1="42.78" y1="2.68" x2="2.69" y2="42.77"/>
				<line class="cross" x1="2.69" y1="2.68" x2="42.78" y2="42.77"/>
			</symbol>
			<symbol id="burger" viewBox="0 0 45.47 45.48">
				<defs>
					<style>.b {
                            fill: none;
                            stroke: #1d1d1b;
                            stroke-linecap: round;
                            stroke-miterlimit: 10;
                            stroke-width: 5px;
                        }</style>
				</defs>
				<line class="b" x1="2.61" y1="42.68" x2="42.76" y2="42.68"/>
				<line class="b" x1="2.61" y1="22.81" x2="42.76" y2="22.81"/>
				<line class="b" x1="2.61" y1="2.94" x2="42.76" y2="2.94"/>
			</symbol>
			<symbol id="wave" viewBox="0 0 1680 489">
				<path d="M845.957 56.0972C492.732 -45.5003 134.809 13.7649 0 56.0972V438.12C134.809 395.788 492.732 336.523 845.957 438.12C1199.18 539.718 1549.16 465.998 1680 416.438V34.4149C1549.16 83.9747 1199.18 157.695 845.957 56.0972Z"
					  fill="#648947" fill-opacity="0.07"/>
			</symbol>
		</svg>
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
						<svg class="header__logoSVG">
							<title>
								Logo du site web NOair • Antilope.
							</title>
							<desc>
								Le logo de NOair• Antilope, noir sur fond blanc.
							</desc>
							<use xlink:href="#NOair"/>
						</svg>
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
						<div class="nav__cta">
							<a href="<?= get_permalink( NOair_get_template_page( ( 'template-contact' ) ) ) ?>"
							   class="nav__contact"><?= __( 'contactez nous', 'NOair' ); ?></a>
						</div>
					</nav>
				</div>
			</div>
		</header>