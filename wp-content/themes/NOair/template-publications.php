<?php /* Template Name: Publications page template */ ?>
<?php get_header(); ?>
<main class="main">
	<section class="main__publications publications">
		<h2 class="main__title <?= $_SESSION[ 'accents' ][ 'name' ] ?>">
			<?= get_field( 'first_title_part' ); ?>
			<span class="accent" style="color: <?= $_SESSION[ 'accents' ][ 'color' ] ?>">
			<?= get_field( 'second_title_part' ); ?>
		</span>
		</h2>
		<?php if ( ( $publications = NOair_get_publications( 1000 ) ) -> have_posts() ): while ( $publications -> have_posts() ): $publications -> the_post();
			include( __DIR__ . '/partials/publication.php' );
		endwhile; endif; ?>
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
					<div class="dis_card__cta cta" style="background-color: <?= $_SESSION[ 'accents' ][ 'color' ]?>">
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
