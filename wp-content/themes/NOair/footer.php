</div>
<footer class="footer">
	<h2 class="sro"><?= __( 'Pied de page', 'NOair' ) ?></h2>
	<div class="footer__grid">
		<div class="footer__logo">
			<a href="/">
				<?= NOair_get_svg( 'NOair' ) ?>
			</a>
		</div>
		<div class="footer__socials socials">
			<div class="socials__insta">
				<a href="https://instagram.com/ingenieur.hepl?igshid=YmMyMTA2M2Y=">
					<?= NOair_get_svg( 'instagram' ) ?>
				</a>
			</div>
			<div class="socials__fb">
				<?= NOair_get_svg( 'facebook' ) ?>
			</div>
		</div>
	</div>
	<nav class="footer__nav fnav">
		<h3 class="fnav__title sro"><?= __( 'Navigation de pied de page', 'NOair' ); ?></h3>
		<ul class="fnav__container">
			<?php foreach ( NOair_get_menu_items( 'footer' ) as $link ): ?>
				<li class="<?= $link -> getBemClasses( 'fnav__item' ); ?>">
					<a href="<?= $link -> url; ?>" class="fnav__link"><?= $link -> label ?></a>
				</li>
			<?php endforeach; ?>
			<li class="fnav__item copyright">
				Copyright <?= date( "Y" ) ?>
			</li>
		</ul>
	</nav>
	<div class="footer__dev">
		<?= NOair_get_svg( 'JustinMassart' ) ?>
	</div>
</footer>
</body>
</html>