<?php get_header() ?>
<main class="main main__pb">
	<div class="back">
		<a title="<?= __( 'Retourner sur la page des publications', 'NOair' ) ?>" href="<?= get_permalink( NOair_get_template_page( ( 'template-publications' ) ) ) ?>">
			<div class="back__svg">
				<?= NOair_get_svg( 'arrow' ) ?>
			</div>
			<span>
				<?= __( 'Retourner sur la page des publications', 'NOair' ) ?>
			</span>
		</a>
	</div>
	<section class="main__article article">
		<div class="article__text">
			<h2 class="main__title <?= $_SESSION[ 'accents' ][ 'name' ] ?>">
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
		<?php if ( get_field( 'publication_images' ) !== null ): ?>
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
		<?php endif; ?>
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
					<div class="dis_card__cta cta <?= $_SESSION[ 'accents' ][ 'name' ] ?> <?= $_SESSION[ 'accents' ][ 'name' ] . '__cta' ?>">
						<a href="<?= get_permalink( NOair_get_template_page( ( 'template-modules' ) ) ) ?>"
						   title="<?= __( 'Aller sur la page des modules', 'NOair' ) ?>"
						   class="nav__contact"><?= strtoupper( __( 'voir nos modules', 'NOair' ) ) ?></a>
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
