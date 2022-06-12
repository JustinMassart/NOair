</div>
<footer class="footer">
	<h2 class="sro"><?= __( 'Pied de page', 'NOair' ) ?></h2>
	<div class="footer__grid">
		<div class="footer__logo">
			<a href="/" title="<?= __( 'Aller sur la page d’accueil', 'NOair' ) ?>">
				<?= NOair_get_svg( 'NOair' ) ?>
			</a>
		</div>
		<div class="footer__socials socials">
			<div class="socials__insta">
				<a href="https://instagram.com/ingenieur.hepl?igshid=YmMyMTA2M2Y=" itemprop="sameAs"
				   title="<?= __( 'Aller sur le compte Instagram de NOair', 'NOair' ) ?>">
					<?= NOair_get_svg( 'instagram' ) ?>
				</a>
			</div>
			<div class="socials__fb" itemprop="sameAs">
				<a href="https://fr-fr.facebook.com/ISILELECTRO/" itemprop="sameAs"
				   title="<?= __( 'Aller sur la page Facebook de NOair', 'NOair' ) ?>">
					<?= NOair_get_svg( 'facebook' ) ?>
				</a>
			</div>
		</div>
	</div>
	<nav class="footer__nav fnav">
		<h3 class="fnav__title sro"><?= __( 'Navigation de pied de page', 'NOair' ); ?></h3>
		<ul class="fnav__container">
			<?php foreach ( NOair_get_menu_items( 'footer' ) as $link ): ?>
				<li class="<?= $link -> getBemClasses( 'fnav__item' ); ?>">
					<a href="<?= $link -> url; ?>"
					   title="<?= __( 'Aller sur la page ', 'NOair' ) . $link -> label ?>"
					   class="fnav__link"><?= $link -> label ?></a>
					<span class="footer__ball"> • </span>
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
	<div class="footer__contact sro">
		<span itemprop="sameAs">https://www.ingehepl.be/</span>
		<span itemprop="sameAs">https://www.issep.be/</span>
	</div>
</footer>
</body>
</html>