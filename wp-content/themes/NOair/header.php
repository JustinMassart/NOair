<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title><?= get_bloginfo ( 'name' ); ?><?= wp_title ( '•' ); ?></title>
		<link rel="stylesheet" type="text/css" href="<?= NOair_mix ( '/css/style.css' ); ?>"/>
		<script type="text/javascript" src="<?= NOair_mix ( 'js/script.js' ); ?>"></script>
		<?php wp_head (); ?>
	</head>
	<body>
		<header class="header">
			<div class="header__wrapper">
				<h1 class="header__title"><?= get_bloginfo ( 'name' ); ?><span class="sro"><?= wp_title ( '•' ) ?></span></h1>
				<div class="header__languages">
					<?php foreach ( pll_the_languages ( [ 'raw' => true ] ) as $code => $locale ) : ?>
						<a href="<?= $locale[ 'url' ]; ?>" class="header__locale" title="<?= $locale[ 'name' ]; ?>"
						   lang="<?= $locale[ 'locale' ]; ?>" hreflang="<?= $locale[ 'locale' ]; ?>"><?= $code; ?></a>
					<?php endforeach; ?>
				</div>
				<nav class="header__nav nav">
					<h2 class="nav__title"><?= __ ( 'Navigation principale', 'NOair' ); ?></h2>
					<ul class="nav__container">
						<?php foreach ( NOair_get_menu_items ( 'primary' ) as $link ): ?>
							<li class="<?= $link -> getBemClasses ( 'nav__item' ); ?>">
								<a href="<?= $link -> url; ?>" class="nav__link"><?= $link -> label; ?></a>
								<?php if ( $link -> hasSubItems () ): ?>
									<ul class="nav__subitems">
										<?php foreach ( $link -> subitems as $sub ): ?>
											<li class="<?= $link -> getBemClasses ( 'nav__subitem' ); ?>">
												<a href="<?= $sub -> url; ?>" class="nav__link"><?= $sub -> label; ?></a>
											</li>
										<?php endforeach; ?>
									</ul>
								<?php endif; ?>
							</li>
						<?php endforeach; ?>
					</ul>
					<div class="nav__cta">
						<a href="<?= get_permalink ( NOair_get_template_page ( ( 'template-contact' ) ) ) ?>"
						   class="nav__contact"><?= __ ( 'contactez nous', 'NOair' ); ?></a>
					</div>
				</nav>
			</div>
		</header>