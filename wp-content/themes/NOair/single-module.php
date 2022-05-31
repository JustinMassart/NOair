<?php NOair_get_new_accent() ?>
<?php get_header() ?>
	<main class="main">
		<div class="main__container">
			<h2 class="main__title sro">
				<?= __( 'Le module ' ) . get_field( 'module_name' ) ?>
			</h2>
			<section class="main__intro intro <?= strtolower( get_field( 'module_name' ) ) ?>">
				<div class="intro__hero">
					<h3 class="intro__title accent">
						<?= str_replace( ':name', ucfirst( strtolower( get_field( 'module_name' ) ) ), __( ':name', 'NOair' ) ) ?>
					</h3>
					<?php if ( have_posts() ): while ( have_posts() ):
						the_post(); ?>
					<div class="intro__desc">
						<?= the_content() ?>
						<?php endwhile;
							endif; ?>
					</div>
				</div>
				<div class="intro__svg">
					<?= NOair_get_template_by_extension( get_field( 'logo' ), 'thumbnail' ) ?>
				</div>
			</section>
			<section class="main__images images">
				<h3 class="sro">
					<?= str_replace( ':name', ucfirst( strtolower( get_field( 'module_name' ) ) ), __( 'Les photos du module :name', 'NOair' ) ) ?>
				</h3>
				<?php if ( get_field( 'module_images' ) !== null ): ?>
					<?php $images = [];
					foreach ( get_field( 'module_images' ) as $img ) {
						if ( $img !== null && $img !== false ) {
							$images[] = $img;
						}
					} ?>
					<div class="intro__grid<?= NOair_count_array( $images ) ?>">
						<?php
							foreach ( $images as $image ): ?>
								<div class="intro__img">
									<?= NOair_get_template_by_extension( $image, 'medium' ) ?>
								</div>
							<?php endforeach; ?>
					</div
				<?php else: ?>
					<div class="intro__pictures">
						<div class=" intro__img">
							<?= NOair_get_template_by_extension( get_field( 'module_image' ), 'medium' ) ?>
						</div>
					</div>
				<?php endif; ?>
			</section>
			<section class="main__specs specs">
				<h3 class="specs__title sro"><?= str_replace( ':name', ucfirst( strtolower( get_field( 'module_name' ) ) ), __( 'Information du module :name', 'NOair' ) ) ?></h3>
				<div class="specs__use use">
					<h4 class="specs__title">
						<?= __( 'Comment s’utilise-t-il ?', 'NOair' ) ?>
					</h4>
					<p class="specs__desc">
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
					<div class="technical__container">
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
				<span class="measures__options">
				<?= __( '* Sous options.', 'NOair' ) ?>
			</span>
			</section>
			<section class="wanted">
				<article class="wanted__card <?= strtolower( get_field( 'module_name' ) ) ?> dis_card">
					<div class="wanted__container dis_card__container">
						<div class="dis_card__text">
							<h4 class="wanted__title dis_card__title">
								<?= strtoupper( __( 'Des questions sur ce module ?' ) ) ?>
							</h4>
							<p class="wanted__desc dis_card__desc">
								<?= str_replace( ':name', ucfirst( strtolower( get_field( 'module_name' ) ) ), __( 'Posez nous vos question et demandes au sujet du module :name' ) ) ?>
							</p>
							<div class="wanted__cta cta dis_card__cta <?= $_SESSION[ 'accents' ][ 'name' ] ?> <?= $_SESSION[ 'accents' ][ 'name' ] ?>__cta">
								<a href="<?= get_permalink( NOair_get_template_page( ( 'template-contact' ) ) ) ?>" class="nav__contact">
									<?= __( 'contactez nous', 'NOair' ) ?>
								</a>
							</div>
						</div>
						<div class="dis_card__imgContainer wanted__imgContainer">
							<?= NOair_get_template_by_extension( get_field( 'module_image' ), 'medium' ) ?>
						</div>
					</div>
				</article>
			</section>
		</div>
	</main>
<?php get_footer() ?>