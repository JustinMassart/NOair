<footer class="footer">
	<h2 class="sro"><?= __( 'Pied de page', 'NOair' ) ?></h2>
	<div class="footer__logo">
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
	<nav class="footer__nav fnav">
		<h3 class="fnav__title sro"><?= __( 'Navigation de pied de page', 'NOair' ); ?></h3>
		<ul class="fnav__container">
			<?php foreach ( NOair_get_menu_items( 'footer' ) as $link ): ?>
				<li class="<?= $link -> getBemClasses( 'fnav__item' ); ?>">
					<a href="<?= $link -> url; ?>" class="fnav__link"><?= $link -> label ?></a>
				</li>
				<span>•</span>
			<?php endforeach; ?>
			<li class="fnav__item copyright">
				Copyright <?= date( "Y" ) ?>
			</li>
		</ul>
	</nav>
</footer>
</body>
</html>