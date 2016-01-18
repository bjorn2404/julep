<?php
/**
 * Sidebar
 *
 * @package julep
 */

?>
<div id="secondary" class="widgets" role="complementary">
	<?php do_action( 'before_sidebar' ); ?>
	<?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>

		<aside id="search" class="widget widget--search">
			<?php get_search_form(); ?>
		</aside>

		<aside id="archives" class="widget widget--archives">
			<h4 class="widget__title"><?php esc_html_e( 'Archives', 'julep' ); ?></h4>
			<ul>
				<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
			</ul>
		</aside>

		<aside id="meta" class="widget widget--acount">
			<h4 class="widget__title"><?php esc_html_e( 'Meta', 'julep' ); ?></h4>
			<ul>
				<?php wp_register(); ?>
				<li><?php wp_loginout(); ?></li>
				<?php wp_meta(); ?>
			</ul>
		</aside>

	<?php endif; ?>
</div><!-- #secondary -->
