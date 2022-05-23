<?php /* Template Name: Publications page template */ ?>
<?php get_header(); ?>
<main class="main">
	<h2 class="main__title">
		<?= get_field( 'first_title_part' ); ?>
		<span class="accent">
			<?= get_field( 'second_title_part' ); ?>
		</span>
	</h2>
	<section class="main__publications publications">
		<h2 class="publications__title sro">
			<?= __( 'Voici publications les plus récentes', 'NOair' ) ?>
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
		</article>
	</section>
</main>
<?php get_footer() ?>
