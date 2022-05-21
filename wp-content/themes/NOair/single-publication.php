<?php get_header() ?>
<main class="main">
	<section class="main__content content">
		<h2 class="content__title">
			<?= strtoupper( get_field( 'publication_author' ) ) . ' - ' ?>
			<span class="content__accent">
			<?= get_field( 'publication_date' ) ?>
		</span>
		</h2>
		<?= get_field( 'publication_text' ) ?>
	</section>
	<?php if ( get_field( 'publication_images' ) !== null ): ?>
		<section class="main_support support">
			<?php  // TODO: Changer la fonction par NOair_get_template_by_extension() ?>
			<?php foreach ( get_field( 'publication_images' ) as $img ): ?>
				<?= NOair_get_png_template( $img, 'medium' ) ?>
			<?php endforeach; ?>l
		</section>
	<?php endif; ?>
	<section class="main_discover_modules discover_modules">
		<h2 class="discover_modules__title">
			<?= __( 'Découvrez de quels modules ils parlent', 'NOair' ) ?>
		</h2>
		<article class="discover_modules__card dis_card">
			<h3 class="dis_card__title">
				<?= strtoupper( __( 'Les modules', 'NOair' ) ) ?>
			</h3>
			<p class="dis_card__desc">
				<?= __( 'Tous les modules dont les articles ci-dessus parlent ce trouvent ici !', 'NOair' ) ?>
			</p>

			<div class="dis_card__cta">
				<a href="<?= get_permalink( NOair_get_template_page( ( 'template-modules' ) ) ) ?>"
				   class="nav__contact"><?= strtoupper( __( 'voir nos modules', 'NOair' ) ) ?></a>
			</div>
		</article>
	</section>
</main>
<?php get_footer() ?>
