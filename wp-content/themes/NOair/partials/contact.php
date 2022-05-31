<article class="general__contact dis_card  <?= strtolower( get_field( 'contact_name' ) ) ?>" itemscope itemtype="https://schema.org/Organization">
	<div class="general__container">
		<h3 class="general__title dis_card__title" itemprop="legalName">
			<?= get_field( 'contact_name' ) ?>
		</h3>
		<span class="general__email" itemprop="email">
		<?= get_field( 'contact_email' ) ?>
	</span>
		<span class="general__address" itemprop="address">
		<?= get_field( 'contact_address' ) ?>
	</span>
		<span class="general__phone" itemprop="telephone">
		<?= get_field( 'contact_phone' ) ?>
	</span>
	</div>
</article>