<?php get_header(); ?>
	<main class="main">
		<div class="wrapper">
			<h2 class="main__title sro">
				<?= ucfirst( strtolower( get_field( 'first_title_part' ) ) ) ?>
				<span class="accent">
				<?= get_field( 'second_title_part' ) ?>
			</span>
			</h2>
			<section class="description">
				<div class="description__desc">
					<h3 class="description__title">
					<span class="sro">
						<?= __( 'NOair •', 'NOair' ) ?>
					</span>
						<?= get_field( 'first_hook_part' ) ?>
						<span class="accent">
						<?= get_field( 'second_hook_part' ) ?>
					</span>
						<?= get_field( 'third_hook_part' ) ?>
						<span class="accent">
						<?= get_field( 'fourth_hook_part' ) ?>
					</span>
					</h3>
					<div class="description__goal">
						<?= the_content() ?>
					</div>
					<div class="description__cta cta">
						<a href="<?= get_permalink( NOair_get_template_page( ( 'template-modules' ) ) ) ?>"
						   class="description__modules"><?= __( 'voir nos modules', 'NOair' ); ?></a>
					</div>
				</div>
				<div class="description__svgContainer">
					<?= $_SESSION[ 'accents' ]['logo'] ?>
				</div>
			</section>
			<section class="whoAreWe">
				<h3 class="whoAreWe__title"><?= __( 'NOair c’est :', 'NOair' ) ?></h3>
				<div class="whoAreWe__grid">
					<?php foreach ( NOair_get_general_infos() as $key => $value ): ?>
						<div class="whoAreWe__infos">
							<span class="whoAreWe__subTitle">
								<?= $value[ 'info_title' ] ?>
							</span>
							<p class="whoAreWe__desc">
								<?= $value[ 'info_desc' ] ?>
							</p>
						</div>
					<?php endforeach; ?>
				</div>
			</section>
			<section class="presentation">
				<h3 class="presentation__title sro">
					<?= __( 'Vidéo de présentation de NOair - Antilope', 'NOair' ) ?>
				</h3>
				<div class="presentation__video">
					<?= get_field( 'presentation_video' ) ?>
				</div>
			</section>
			<section class="discover">
				<h2 class="discover__title">
					<?= __( 'Découvrez aussi', 'NOair' ) ?>
				</h2>
				<article class="discover__card dis_card">
					<div class="dis_card__container">
						<div class="dis_card__text">
							<h3 class="dis_card__title">
								<?= strtoupper( __( 'Les publications', 'NOair' ) ) ?>
							</h3>
							<p class="dis_card__desc">
								<?= __( 'Toutes les publications qui nous font références autant dans des journaux et jusqu’à la télévision', 'NOair' ) ?>
							</p>
							<div class="dis_card__cta cta">
								<a class="dis_card__link" href="<?= get_permalink( NOair_get_template_page( ( 'template-publications' ) ) ) ?>"
								   class="nav__contact"><?= strtoupper( __( 'voir les publications', 'NOair' ) ) ?></a>
							</div>
						</div>
						<div class="dis_card__svgContainer">
							<?= NOair_get_svg( 'publication' ) ?>
						</div>
					</div>
				</article>
				<article class="discover__card dis_card">
					<div class="dis_card__container">
						<div class="dis_card__text">
							<h3 class="dis_card__title">
								<?= strtoupper( __( 'Nos partenaires', 'NOair' ) ) ?>
							</h3>
							<p class="dis_card__desc">
								<?= __( 'Nous ne travaillons pas seul, nous sommes plusieurs à réaliser cette démarche', 'NOair' ) ?>
							</p>
							<div class="dis_card__cta cta">
								<a class="dis_card__link" href="<?= get_permalink( NOair_get_template_page( ( 'template-partners' ) ) ) ?>"
								   class="nav__contact">
									<?= strtoupper( __( 'voir les partenaires', 'NOair' ) ) ?>
								</a>
							</div>
						</div>
						<div class="dis_card__svgContainer">
							<?= NOair_get_svg( 'teamWork' ) ?>
						</div>
					</div>
				</article>
			</section>
		</div>
	</main>
<?php get_footer(); ?>