<?php
/**
 * Default content part
 *
 * @package julep
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry' ); ?>>
	<header class="entry__header">
		<?php
		if ( is_single() ) {
			the_title( '<h1 class="entry__title">', '</h1>' );
		} else {
			the_title( '<h2 class="entry__title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		}

		if ( 'post' === get_post_type() ) : ?>
			<div class="entry__meta">
				<?php julep_posted_on(); ?>
			</div><!-- .entry__meta -->
			<?php
		endif; ?>
	</header><!-- .entry__header -->

	<div class="entry__content">
		<?php
		the_content( sprintf(
			wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'julep' ), array( 'span' => array( 'class' => array() ) ) ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		) );
		?>
	</div><!-- .entry__content -->

	<footer class="entry__footer">
		<?php julep_entry_footer(); ?>
	</footer><!-- .entry__footer -->
</article><!-- #post-## -->
