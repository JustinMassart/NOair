<?php /* Template Name: Contact page template */ ?>
<?php get_header(); ?>
<?php if ( have_posts() ): while ( have_posts() ): the_post(); ?>
	<main class="layout contact">
		<h2 class="contact__title"><?= get_the_title(); ?></h2>
		<?php if ( ! isset( $_SESSION[ 'feedback_contact_form' ] ) || ! $_SESSION[ 'feedback_contact_form' ][ 'success' ] ) : ?>
			<?php include( __DIR__ . '/partials/form.php' ) ?>
		<?php else : ?>
			<p class="form__feedback"><?= __( 'Merci de nous avoir contacté, à bientôt !', 'NOair' ) ?></p>
		<?php endif; ?>
		<section class="contact__general general">
			<h2 class="general__title"><?= __( 'Les différents contacts', 'NOair' ) ?></h2>
			<?php if ( ( $contacts = NOair_get_contacts( 2 ) ) -> have_posts() ): while ( $contacts -> have_posts() ): $contacts -> the_post();
				include( __DIR__ . '/partials/contact.php' );
			endwhile; endif; ?>
		</section>
	</main>
<?php endwhile; endif; ?>
<?php
	get_footer();
	unset( $_SESSION[ 'feedback_contact_form' ] );
?>