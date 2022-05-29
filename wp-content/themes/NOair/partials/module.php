<article class="modules__module module <?= strtolower( get_field( 'module_name' ) ) ?>">
	<div class="module__container">
		<h3 class="module__title">
			<?= ucfirst( strtolower( get_field( 'module_name' ) ) ) ?>
		</h3>
		<div class="module__public">
						<span class="module__who">
							<?= __( 'Pour qui ?', 'NOair' ) ?>
						</span>
			<p class="module__desc">
				<?php the_field( 'public' ) ?>
			</p>
		</div>
		<div class="module__measures">
						<span>
							<?= __( 'Mesures effectuées', 'NOair' ) ?>
						</span>
			<ul class="module__list">
				<?php foreach ( NOair_get_N_measures( 3 ) as $measure ): ?>
					<li class="module__item">
						<?= $measure ?>
					</li>
				<?php endforeach; ?>
				<li class="module__more">
					...
				</li>
			</ul>
		</div>
		<div class="module__imgContainer">
			<?= NOair_get_template_by_extension( get_field( 'module_image' ), 'medium' ) ?>
		</div>
		<div class="module__cta cta <?= strtolower( get_field( 'module_name' ) ) ?>">
			<a href="<?= the_permalink() ?>" class="module__link">
				<?= __( 'Voir le module ', 'NOair' ); ?>
				<span class="sro">
				<?= str_replace( ':name', get_field( 'module_name' ), __( ':name', 'NOair' ) ) ?>
			</span>
			</a>
		</div>
		<?php if ( get_field( 'logo' ) !== false ): ?>
			<div class="module__svgContainer <?= strtolower( get_field( 'module_name' ) ) ?>">
				<?= NOair_get_template_by_extension( get_field( 'logo' ), 'thumbnail' ) ?>
			</div>
		<?php endif; ?>
	</div>
</article>