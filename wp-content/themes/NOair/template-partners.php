<?php /* Template Name: Partners page template */ ?>
<?php get_header() ?>
	<main class="main">
		<h2 class="main__title">
			<?= get_field( 'first_title_part' ); ?>
			<span class="accent">
			<?= get_field( 'second_title_part' ); ?>
		</span>
		</h2>
		<section class="main__hepling hepling">
			<h3 class="hepling__title sro">
				<?= __( 'La HEPL et ces ingénieurs', 'NOair' ) ?>
			</h3>
			<?php
				$partners = [ 'hepl', 'engineer', 'issep' ];
				foreach ( $partners as $partner ):
					include( __DIR__ . '/partials/partner.php' );
				endforeach; ?>
	</main>
<?php get_footer() ?>