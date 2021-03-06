<?php /* Template Name: Modules page template */ ?>
<?php get_header(); ?>
	<main class="main">
		<section class="modules">
			<h2 class="main__title <?= $_SESSION[ 'accents' ][ 'name' ] ?>">
				<?= get_field( 'first_title_part' ); ?>
				<span class="accent" style="color: <?= $_SESSION[ 'accents' ][ 'color' ] ?>">
				<?= get_field( 'second_title_part' ); ?>
			</span>
			</h2>
			<div class="modules__grid">
				<?php if ( ( $modules = NOair_get_modules() ) -> have_posts() ): while ( $modules -> have_posts() ): $modules -> the_post();
					include( __DIR__ . '/partials/module.php' );
				endwhile;
				else: ?>
					<p class="modules__empty">
						<?= __( 'Oups ! On dirait qu’il n’aucun module n’ait été publié. Revenez plus tard !', 'NOair' ) ?>
					</p>
				<?php endif; ?>
			</div>
		</section>
		<section class="recent">
			<h2 class="recent__title">
				<?= __( 'Les publications récentes', 'NOair' ) ?>
			</h2>
			<?php if ( ( $publications = NOair_get_publications( 2 ) ) -> have_posts() ): while ( $publications -> have_posts() ): $publications -> the_post();
				include( __DIR__ . '/partials/publication.php' );
			endwhile; endif; ?>
		</section>
	</main>
<?php get_footer(); ?>