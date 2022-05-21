<?php get_header() ?>
	<main class="main">
		<h2 class="main__title sro">
			<?= __( 'Le module ' ) . get_field( 'module_name' ) ?>
		</h2>
		<section class="main__intro intro">
			<div class="intro__hero">
				<h3 class="intro__title accent">
					<?= str_replace( ':name', ucfirst( strtolower( get_field( 'module_name' ) ) ), __( ':name', 'NOair' ) ) ?>
				</h3>
				<div class="intro_desc">
					<?= __( the_content(), 'NOair' ) ?>
				</div>
				<div class="intro__pictures">
					<div class="intro_svg">
						<?= NOair_get_svg_template( get_field( 'logo' ), 163, 190 ) ?>
					</div>
					<div class=" intro__img">
						<?= NOair_get_png_template( get_field( 'module_image' ), 'medium' ) ?>
					</div>
				</div>
			</div>
		</section>
		<section class="main__specs specs">
			<h3 class="specs__title"><?= str_replace( ':name', ucfirst( strtolower( get_field( 'module_name' ) ) ), __( 'Information du module :name', 'NOair' ) ) ?></h3>
			<div class="specs__use use">
				<h4 class="specs__title">
					<?= __( 'Comment s’utilise-t-il ?', 'NOair' ) ?>
				</h4>
				<p class="use__desc">
					<?= get_field( 'how_to_use' ) ?>
				</p>
			</div>
			<div class="specs__qualities_defects quadef">
				<h4 class="specs__title">
					<?= __( 'Ces qualités et défauts', 'NOair' ) ?>
				</h4>
				<ul class="quadef__list list">
					<?php foreach ( NOair_make_array_of_string( get_field( 'qualities_defects_qualities' ) ) as $quality ): ?>
						<li class="list__item quality">
							<?= ucfirst( strtolower( $quality ) ) ?>
						</li>
					<?php endforeach ?>
				</ul>
				<ul class="quadef__list list">
					<?php foreach ( NOair_make_array_of_string( get_field( 'qualities_defects_defects' ) ) as $defect ): ?>
						<li class="list__item defect">
							<?= ucfirst( strtolower( $defect ) ) ?>
						</li>
					<?php endforeach ?>
				</ul>
			</div>
			<div class="specs__technical technical">
				<h4 class="specs__title">
					<?= __( 'Caractéristiques', 'NOair' ) ?>
				</h4>
				<ul class="technical__list specList">
					<?php foreach ( NOair_make_array_of_string( get_field( 'specifications' ) ) as $spec ): ?>
						<?php if ( ! empty( $spec ) ): ?>
							<li class="specList__item">
								<?= $spec ?>
							</li>
						<?php endif; ?>
					<?php endforeach; ?>
				</ul>
			</div>
		</section>
		<section class="measures">
			<h4 class="measures__title">
				<?= str_replace( ':name', ucfirst( strtolower( get_field( 'module_name' ) ) ), __( 'Ce que :name mesure', 'NOair' ) ) ?>
			</h4>
			<div class="measures__listContainer">
				<ul class="measures__list list">
					<?php foreach ( get_field( 'measurement' ) as $measure ): ?>
						<li class="list__item">
							<?= $measure ?>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>
		</section>
		<section class="wanted">
			<article class="wanted__card">
				<h4 class="wanted__title">
					<?= strtoupper( __( 'Ce module vous intéresse ?' ) ) ?>
				</h4>
				<p class="wanted_desc">
					<?= str_replace( ':name', ucfirst( strtolower( get_field( 'module_name' ) ) ), __( 'Posez nous vos question et demandes au sujet du module :name' ) ) ?>
				</p>
				<div class="wanted__cta">
					<a href="<?= get_permalink( NOair_get_template_page( ( 'template-contact' ) ) ) ?>" class="nav__contact">
						<?= __( 'contactez nous', 'NOair' ) ?>
					</a>
				</div>
			</article>
		</section>
	</main>
<?php get_footer() ?>