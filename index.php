<?php
/**
 * The main template file
 *
 * @package julep
 */

get_header(); ?>

	<div id="primary" class="primary">
		<div id="content" class="primary__content">

			<?php if ( have_posts() ) : ?>

				<?php while ( have_posts() ) : the_post(); ?>

					<?php
					/** Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'parts/content', get_post_format() );
					?>

					<?php
				endwhile; ?>

			<?php else : ?>

				<?php get_template_part( 'parts/content', 'none' ); ?>

				<?php
			endif; ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>
