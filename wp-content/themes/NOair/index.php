<?php get_header(); ?>
	<main class="main">
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
				<p class="description__goal">
					<?= the_content() ?>
				</p>
				<div class="description__cta">
					<a href="<?= get_permalink( NOair_get_template_page( ( 'template-modules' ) ) ) ?>"
					   class="description__modules"><?= __( 'voir nos modules', 'NOair' ); ?></a>
				</div>
			</div>
			<div class="description__svgContainer">
				<svg class="description__svg">
					<title>
						<?= __( 'Le logo du module Oryx.', 'NOair' ) ?>
					</title>
					<desc>
						<?= __( 'Le logo du module Oryx en noir et vert.', 'NOair' ) ?>
					</desc>
					<use xlink:href="#oryx"/>
				</svg>
			</div>
		</section>
		<section class="whoAreWe">
			<h3 class="whoAreWe__title"><?= __( 'NOair c’est :', 'NOair' ) ?></h3>
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
		</section>
	</main>
<?php get_footer(); ?>