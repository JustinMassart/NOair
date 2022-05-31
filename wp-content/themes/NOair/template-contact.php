<?php /* Template Name: Contact page template */ ?>
<?php get_header(); ?>
<?php if ( have_posts() ): while ( have_posts() ): the_post(); ?>
	<main class="main">
		<section class="contactWrapper">
			<?php if ( get_locale() === 'fr_BE' ): ?>
				<h2 class="main__title <?= $_SESSION[ 'accents' ][ 'name' ] ?>">
					<?= __( 'Formulaire de ', 'NOair' ) ?>
					<span class="accent">
					<?= get_the_title() ?>
				</span>
				</h2>
			<?php else: ?>
				<h2 class="main__title">
				<span class="accent">
					<?= get_the_title() ?>
				</span>
					<?= __( ' form', 'NOair' ) ?>
				</h2>
			<?php endif; ?>
			<div class="contactWrapper__grid">
				<?php if ( ! isset( $_SESSION[ 'feedback_contact_form' ] ) || ! $_SESSION[ 'feedback_contact_form' ][ 'success' ] ) : ?>
					<section class="main__contact contact">
						<?php include( __DIR__ . '/partials/form.php' ) ?>
					</section>
				<?php else : ?>
					<div class="form__feedback">
						<span>
							<?= __( 'Merci de nous avoir contacté.', 'NOair' ) ?>
						</span>
						<span class="form__fbAccent">
							<?= __( 'À bientôt !', 'NOair' ) ?>
						</span>
						<div class="form__feedbackCta cta">
							<a href="/" class="nav__contact">
								<?= __( 'Revenir à la page d’accueil', 'NOair' ) ?>
							</a>
						</div>
					</div>
				<?php endif; ?>
				<section class="contact__general general">
					<h2 class="general__title sro"><?= __( 'Les différents contacts', 'NOair' ) ?></h2>
					<?php if ( ( $contacts = NOair_get_contacts( 2 ) ) -> have_posts() ): while ( $contacts -> have_posts() ): $contacts -> the_post();
						include( __DIR__ . '/partials/contact.php' );
					endwhile; endif; ?>
				</section>
			</div>
		</section>
	</main>
<?php endwhile; endif; ?>
<?php
	get_footer();
	unset( $_SESSION[ 'feedback_contact_form' ], $_SESSION[ 'errors' ] );
?>