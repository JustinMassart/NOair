<article class="<?= $partner ?>">
	<div class="<?= $partner ?>__name">
		<h4 class="<?= $partner ?>__title">
			<?= get_field( $partner . '_partner_name' ) ?>
		</h4>
		<span class="<?= $partner ?>__fullname">
								<?= get_field( $partner . '_partner_fullname' ) ?>
							</span>
	</div>
	<p class="<?= $partner ?>__desc">
		<?= get_field( $partner . '_partner_desc' ) ?>
	</p>
	<?php if ( get_field( $partner . '_partner_image' ) !== false ): ?>
		<div class="<?= $partner ?>__image">
			<?= NOair_get_template_by_extension( get_field( $partner . '_partner_image' ), 370, 220, 'medium' ) ?>
		</div>
	<?php endif; ?>
	<div class="<?= $partner ?>__cta">
		<a href="<?= get_permalink( NOair_get_template_page( ( 'template-contact' ) ) ) ?>"
		   class="nav__contact">
			<?php if ( $partner === 'hepl' ): ?>
				<?= __( 'contactez la hepl', 'NOair' ) ?>
			<?php elseif ( $partner === 'engineer' ): ?>
				<?= __( 'contactez la section ingénieur', 'NOair' ) ?>
			<?php else: ?>
				<?= __( 'contactez l’issep', 'NOair' ) ?>
			<?php endif; ?>
		</a>
	</div>
</article>