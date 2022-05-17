<?php /* Template Name: Contact page template */ ?>
<?php get_header (); ?>
<?php if ( have_posts () ): while ( have_posts () ): the_post (); ?>
	<main class="layout contact">
		<h2 class="contact__title"><?= get_the_title (); ?></h2>
		<?php if ( !isset( $_SESSION[ 'feedback_contact_form' ] ) || !$_SESSION[ 'feedback_contact_form' ][ 'success' ] ) : ?>
			<form action="<?= get_home_url (); ?>/wp-admin/admin-post.php" method="POST" class="contact__form form">
				<?php if ( isset( $_SESSION[ 'feedback_contact_form' ] ) && !$_SESSION[ 'feedback_contact_form' ][ 'success' ] ) : ?>
					<p class="form__errors"><?= __ ( 'Oups ! Ce formulaire contient des erreurs, merci de les corriger.', 'NOair' ); ?></p>
				<?php endif; ?>
				<div class="form__field">
					<label for="firstname" class="form__label"><?= __ ( 'Votre prénom', 'NOair' ); ?></label>
					<input type="text" name="firstname" id="firstname" class="form__input"
						   value="<?= NOair_get_contact_field_value ( 'firstname' ); ?>"/>
					<?= NOair_get_contact_field_error ( 'firstname' ); ?>
				</div>
				<div class="form__field">
					<label for="lastname" class="form__label"><?= __ ( 'Votre nom', 'NOair' ); ?></label>
					<input type="text" name="lastname" id="lastname" class="form__input"
						   value="<?= NOair_get_contact_field_value ( 'lastname' ); ?>"/>
					<?= NOair_get_contact_field_error ( 'lastname' ); ?>
				</div>
				<div class="form__field">
					<label for="email" class="form__label"><?= __ ( 'Votre adresse e-mail', 'NOair' ); ?></label>
					<input type="email" name="email" id="email" class="form__input"
						   value="<?= NOair_get_contact_field_value ( 'email' ); ?>"/>
					<?= NOair_get_contact_field_error ( 'email' ); ?>
				</div>
				<div class="form__field">
					<label for="work" class="form__label"><?= __ ( 'Que faites vous dans la vie ?', 'NOair' ); ?></label>
					<input type="tel" name="work" id="work" class="form__input"
						   value="<?= NOair_get_contact_field_value ( 'work' ); ?>"/>
				</div>
				<div class="form__field">
					<label for="subject">Votre message est à propos de ...</label>
					<select name="subject" id="subject" class="form__select">
						<option value="" selected hidden>Sélectionner un sujet ici</option>
						<option value="modules" class="form__option">des modules</option>
						<option value="ingénieur" class="form__option">de la section ingénieur de la HEPL</option>
						<option value="hepl" class="form__option">de la HEPL</option>
						<option value="issep" class="form__option">l’ISSeP</option>
					</select>
					<?= NOair_get_contact_field_error ( 'subject' ); ?>
				</div>
				<div class="form__field">
					<label for="message" class="form__label"><?= __ ( 'Votre message', 'NOair' ); ?></label>
					<textarea name="message" id="message" cols="30" rows="10"
							  class="form__input"><?= NOair_get_contact_field_value ( 'message' ); ?></textarea>
					<?= NOair_get_contact_field_error ( 'message' ); ?>
				</div>
				<div class="form__field">
					<label for="rules" class="form__checkbox">
						<input type="checkbox" name="rules" id="rules" class="form__checker" value="1">
						<span class="form__checklabel"><?= str_replace (
								':conditions',
								'<a href="#">' . __ ( 'conditions générales d’utilisation', 'NOair' ) . '</a>',
								__ ( 'J’ai lu et j’accepte les :conditions.', 'NOair' )
							); ?></span>
					</label>
					<?= NOair_get_contact_field_error ( 'rules' ); ?>
				</div>
				<div class="form__actions">
					<input type="hidden" name="action" value="submit_contact_form"/>
					<?php wp_nonce_field ( 'nonce_check_contact_form' ); ?>
					<button type="submit" class="form__button"><?= __ ( 'Envoyer', 'NOair' ); ?></button>
				</div>
			</form>
		<?php else : ?>
			<p class="form__feedback"><?= __ ( 'Merci de nous avoir contacté, à bientôt !', 'NOair' ); ?></p>
		<?php endif; ?>
	</main>
<?php endwhile; endif; ?>
<?php
	get_footer ();
	unset( $_SESSION[ 'feedback_contact_form' ] );
?>