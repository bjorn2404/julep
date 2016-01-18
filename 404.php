<?php
/**
 * Single posts template
 *
 * @package julep
 */

get_header(); ?>

	<div id="primary" class="primary">
		<div id="content" class="primary__content">

			<section>
				<header class="page__header">
					<h1 class="page__title"><?php echo esc_html__( 'Oops! That page can&rsquo;t be found.', 'julep' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page__content">
					<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'julep' ); ?></p>

					<?php get_search_form(); ?>

				</div><!-- .page-content -->
			</section><!-- section -->

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>
