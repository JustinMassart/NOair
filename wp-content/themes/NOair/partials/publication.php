<article class="recent__publication publication dis_card">
	<div class="publication__container dis_card__container">
		<div class="dis_card__text">
			<h3 class="publication__title">
				<?= strtoupper( get_field( 'publication_author' ) ) ?>
				<span class="publication__date">
				<?= get_field( 'publication_date' ) ?>
			</span>
			</h3>
			<div class="publication__infos">
				<p class="recent__desc"><?= substr( get_field( 'publication_text' ), 0, 140 ) . '...' ?></p>
				<div class="publication__cta cta">
					<a href="<?= the_permalink() ?>"
					   class="publication__link"><?= strtoupper( __( 'Voir la publication', 'NOair' ) ) ?>
						<span class="sro">
					<?= str_replace( ':author', get_field( 'publication_author' ), __( ' de :author', 'NOair' ) ) ?>
				</span>
					</a>
				</div>
			</div>
		</div>
		<div class="dis_card__imgContainer">
			<?= NOair_get_template_by_extension( get_field( 'author_img' ), 'medium' ) ?>
		</div>
	</div>
</article>