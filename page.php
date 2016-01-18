<?php
/**
 * Page template
 *
 * @package julep
 */

get_header(); ?>

	<div id="primary" class="primary">
		<div id="content" class="primary__content">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'parts/content', 'page' ); ?>

			<?php endwhile; ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>
