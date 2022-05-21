<?php /* Template Name: Partners page template */ ?>
<?php get_header() ?>
	<main class="main">
		<h2 class="main__title">
			<?= get_field( 'first_title_part' ); ?>
			<span class="accent">
			<?= get_field( 'second_title_part' ); ?>
		</span>
		</h2>
		<section class="main__hepling hepling">
			<h3 class="hepling__title">
				<?= __( 'La HEPL et ces ingénieurs', 'NOair' ) ?>
			</h3>
			<article class="hepling__hepl hepl">
				<div class="hepl__name">
					<h4 class="hepl__title">
						<?= get_field( 'hepl_partner_name' ) ?>
					</h4>
					<?php if ( get_field( 'hepl_partner_logo' ) !== null ): ?>
						<div class="hepl__logo">
							<?= NOair_get_template_by_extension( get_field( 'hepl_partner_logo' ), 105, 40, 'thumbnail' ) ?>
						</div>
					<?php endif; ?>
				</div>
				<p class="hepl__desc">
					<?= get_field( 'hepl_partner_desc' ) ?>
				</p>
				<?php if ( get_field( 'hepl_partner_image' ) !== null ): ?>
					<div class="hepl__logo">
						<?= NOair_get_template_by_extension( get_field( 'hepl_partner_image' ), 105, 40, 'medium' ) ?>
					</div>
				<?php endif; ?>
				<div class="hepl__cta">
					<a href="<?= get_permalink( NOair_get_template_page( ( 'template-contact' ) ) ) ?>"
					   class="nav__contact"><?= strtoupper( __( 'contactez la hepl', 'NOair' ) ) ?></a>
				</div>
			</article>
	</main>
<?php get_footer() ?>