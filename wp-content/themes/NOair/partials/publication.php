<article class="recent__publication publication">
	<h3 class="publication__title">
		<?= strtoupper( get_field( 'publication_author' ) ) . ' - ' . get_field( 'publication_date' ) ?>
	</h3>
	<div class="publication__imgContainer">
		<?= NOair_get_template_by_extension( get_field( 'author_img' ), 330, 120, 'medium' ) ?>
	</div>
	<div class="publication__infos">
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