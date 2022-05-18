<footer class="footer">
	<section class="footer__body">
		<h2 class="sro"><?= __ ( 'Pied de page', 'NOair' ) ?></h2>
		<nav class="footer__nav nav">
			<h3 class="nav__title sro"><?= __ ( 'Navigation de pied de page', 'NOair' ); ?></h3>
			<ul class="nav__container">
				<?php foreach ( NOair_get_menu_items ( 'footer' ) as $link ): ?>
					<li class="<?= $link -> getBemClasses ( 'nav__item' ); ?>">
						<a href="<?= $link -> url; ?>" class="nav__link"><?= $link -> label; ?></a>
					</li>
				<?php endforeach; ?>
			</ul>
		</nav>
	</section>
</footer>
</body>
</html>