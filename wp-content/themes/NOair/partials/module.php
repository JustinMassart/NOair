<article class="modules__module <?= strtolower( get_field( 'module_name' ) ) ?>">
	<h3 class="<?= strtolower( get_field( 'module_name' ) ) ?>__title">
		<?= ucfirst( strtolower( get_field( 'module_name' ) ) ) ?>
	</h3>
	<div class="<?= strtolower( get_field( 'module_name' ) ) ?>__public">
						<span class="<?= strtolower( get_field( 'module_name' ) ) ?>__who">
							<?= __( 'Pour qui ?', 'NOair' ) ?>
						</span>
		<p class="<?= strtolower( get_field( 'module_name' ) ) ?>__desc">
			<?php the_field( 'public' ) ?>
		</p>
	</div>
	<div class="<?= strtolower( get_field( 'module_name' ) ) ?>__measures">
						<span>
							<?= __( 'Mesures effectuées', 'NOair' ) ?>
						</span>
		<ul class="<?= strtolower( get_field( 'module_name' ) ) ?>__list">
			<?php foreach ( NOair_get_N_measures( 3 ) as $measure ): ?>
				<li class="<?= strtolower( get_field( 'module_name' ) ) ?>__item">
					<?= $measure ?>
				</li>
			<?php endforeach; ?>
			<li class="<?= strtolower( get_field( 'module_name' ) ) ?>__more">
				...
			</li>
		</ul>
	</div>
	<div class="<?= strtolower( get_field( 'module_name' ) ) ?>__imgContainer">
		<?= NOair_get_template_by_extension( get_field( 'module_image' ), 235, 360, 'medium' ) ?>
	</div>
	<div class="<?= strtolower( get_field( 'module_name' ) ) ?>__cta">
		<a href="<?= the_permalink() ?>" class="<?= strtolower( get_field( 'module_name' ) ) ?>__link">
			<?= __( 'Voir le module ', 'NOair' ); ?>
			<span class="sro">
				<?= str_replace( ':name', get_field( 'module_name' ), __( ':name', 'NOair' ) ) ?>
			</span>
		</a>
	</div>
	<?php if ( get_field( 'logo' ) !== false ): ?>
		<div class="<?= strtolower( get_field( 'module_name' ) ) ?>__svgContainer">
			<?= NOair_get_template_by_extension( get_field( 'logo' ), 50, 58, 'thumbnail' ) ?>
		</div>
	<?php endif; ?>
</article>