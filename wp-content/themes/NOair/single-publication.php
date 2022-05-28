<?php get_header() ?>
<main class="main">
	<h2 class="main__title">
		<?= strtoupper( get_field( 'publication_author' ) ) . ' - ' ?>
		<span class="accent pbaccent">
			<?= get_field( 'publication_date' ) ?>
		</span>
	</h2>
	<section class="main__article article">
		<div class="article__text">
			<h3 class="article__title sro">
				<?= __( 'L’article de ' ) . strtoupper( get_field( 'publication_author' ) ) ?>
			</h3>
			<div class="article__desc">
				<?= get_field( 'publication_text' ) ?>
			</div>
		</div>
		<div class="article__img support">
			<?php if ( get_field( 'publication_images' ) !== null ): ?>
				<?php foreach ( get_field( 'publication_images' ) as $img ): ?>
					<?= NOair_get_template_by_extension( $img, 'medium' ) ?>
				<?php endforeach; ?>
			<?php endif; ?>
		</div>
	</section>
	<section class="main_discover_modules discover_modules">
		<h2 class="discover_modules__title">
			<?= __( 'Découvrez de quels modules ils parlent', 'NOair' ) ?>
		</h2>
		<article class="discover_modules__card dis_card">
			<div class="dis_card__container">
				<div class="dis_card__text">
					<h3 class="dis_card__title">
						<?= strtoupper( __( 'Les modules', 'NOair' ) ) ?>
					</h3>
					<p class="dis_card__desc">
						<?= __( 'Tous les modules dont les articles ci-dessus parlent ce trouvent ici !', 'NOair' ) ?>
					</p>

					<div class="dis_card__cta cta">
						<a href="<?= get_permalink( NOair_get_template_page( ( 'template-modules' ) ) ) ?>"
						   class="nav__contact"><?= strtoupper( __( 'voir nos modules', 'NOair' ) ) ?></a>
					</div>
				</div>
			</div>
		</article>
	</section>
</main>
<?php get_footer() ?>
