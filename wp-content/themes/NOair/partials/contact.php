<article class="general__contact contact dis_card  <?= strtolower(get_field( 'contact_name' )) ?>">
	<div class="general__container">
		<h3 class="general__title dis_card__title">
			<?= get_field( 'contact_name' ) ?>
		</h3>
		<span class="general__email">
		<?= get_field( 'contact_email' ) ?>
	</span>
		<span class="general__address">
		<?= get_field( 'contact_address' ) ?>
	</span>
		<span class="general__phone">
		<?= get_field( 'contact_phone' ) ?>
	</span>
	</div>
</article>