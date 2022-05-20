<?php /* Template Name: Modules page template */ ?>
<?php get_header(); ?>
	<main class="main">
		<h2 class="main__title">
			<?= get_field( 'first_title_part' ); ?>
			<span class="accent">
				<?= get_field( 'second_title_part' ); ?>
			</span>
		</h2>
		<section class="modules">
			<?php if ( ( $modules = NOair_get_modules() ) -> have_posts() ): while ( $modules -> have_posts() ): $modules -> the_post(); ?>
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
						<?= wp_get_attachment_image( get_field( 'module_image' ), 'medium' ) ?>
					</div>
					<div class="<?= strtolower( get_field( 'module_name' ) ) ?>__cta">
						<a href="<?= the_permalink() ?>" class="<?= strtolower( get_field( 'module_name' ) ) ?>__link">
							<?= __( 'Voir le module ', 'NOair' ); ?>
							<span class="sro">
								<?= str_replace( ':name', get_field( 'module_name' ), __( ':name', 'NOair' ) ) ?>
							</span>
						</a>
					</div>
					<?php if ( get_field( 'logo' ) !== null ): ?>
						<div class="<?= strtolower( get_field( 'module_name' ) ) ?>__svgContainer">
							<svg class="description__svg"
								 width="<?= get_field( 'module_name' ) === 'Oryx' ? 52 : 50 ?>"
								 height="<?= get_field( 'module_name' ) === 'Oryx' ? 65 : 58 ?>">
								<title>
									<?= str_replace( ':name', get_field( 'module_name' ), __( 'Le logo du module :name .', 'NOair' ) ) ?>
								</title>
								<desc>
									<?= str_replace( ':name', get_field( 'module_name' ), __( 'Le logo du module :name .', 'NOair' ) ) ?>
								</desc>
								<image xlink:href="<?= get_field( 'logo' ) ?>"
									   width="<?= get_field( 'module_name' ) === 'Oryx' ? 52 : 50 ?>"
									   height="<?= get_field( 'module_name' ) === 'Oryx' ? 65 : 58 ?>"/>
							</svg>
						</div>
					<?php endif; ?>
				</article>
			<?php endwhile; else: ?>
				<p class="modules__empty">
					<?= __( 'Oups ! On dirait qu’il n’aucun module n’ait été publié. Revenez plus tard !', 'NOair' ) ?>
				</p>
			<?php endif; ?>
		</section>
		<section class="recent">
			<h2 class="recent__title"><?= __( 'Les publications récentes', 'NOair' ) ?></h2>
			<?php if ( ( $publications = NOair_get_publications( 2 ) ) -> have_posts() ): while ( $publications -> have_posts() ): $publications -> the_post(); ?>
				<article class="recent__publication publication">
					<div class="publication__imgContainer">
						<?= NOair_get_template_by_extension( get_field( 'author_img' ), 330, 120, 0 ) ?>
					</div>
					<div class="publication__infos">
						<span class="recent__title"><?= strtoupper( get_field( 'publication_author' ) ) ?></span>
						<p class="recent__desc"><?= substr( get_field( 'publication_text' ), 0, 140 ) . '...' ?></p>
						<div class="publication__cta">
							<a href="<?= the_permalink() ?>"
							   class="publication__link"><?= strtoupper( __( 'Voir la publication', 'NOair' ) ) ?>
								<span class="sro">
									<?= str_replace( ':author', get_field( 'publication_author' ), __( ' de :author', 'NOair' ) ) ?>
								</span>
							</a>
						</div>
					</div>
				</article>
			<?php endwhile;
			endif; ?>
		</section>
		<?php // TODO : Remplacer la fonction substr de php par du css ?>
	</main>
<?php get_footer(); ?>