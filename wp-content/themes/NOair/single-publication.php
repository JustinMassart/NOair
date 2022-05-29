<?php get_header() ?>
<main class="main">
	<section class="main__article article">
		<div class="article__text">
			<h2 class="main__title">
				<?= strtoupper( get_field( 'publication_author' ) ) . ' - ' ?>
				<span class="accent pbaccent">
			<?= get_field( 'publication_date' ) ?>
		</span>
			</h2>
			<div class="article__desc">
				<h3 class="article__title sro">
					<?= __( 'L’article de ' ) . strtoupper( get_field( 'publication_author' ) ) ?>
				</h3>
				<div class="article__desc">
					<?= get_field( 'publication_text' ) ?>
				</div>
			</div>
		</div>
		<div class="article__img support">
			<?php
				$images = [];
				foreach ( get_field( 'publication_images' ) as $img ) {
					if ( $img !== null && $img !== false ) {
						$images[] = $img;
					}
				}
				foreach ( $images as $image ): ?>
					<?= NOair_get_template_by_extension( $image, 'medium' ) ?>
				<?php endforeach; ?>
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
						   class="nav__contact"><?= strtoupper( __( 'voir nos modules', 'NOair' ) ) ?>
						</a>
					</div>
				</div>
				<div class="dis_card__svgContainer">
					<?= NOair_get_svg( 'module' ) ?>
				</div>
			</div>
		</article>
	</section>
</main>
<?php get_footer() ?>
