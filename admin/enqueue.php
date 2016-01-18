<?php
/**
 * Theme admin enqueues
 *
 * @package julep
 */

/**
 * Admin enqueues.
 */
if ( ! function_exists( 'julep_admin_enqueue' ) ) {
	/**
	 * Enqueue theme styles and scripts
	 */
	function julep_admin_enqueue() {
		wp_enqueue_style( 'julep-admin-style', get_template_directory_uri() . '/admin/assets/css/app-min.css', array(), '1.0.0' );
	}

	add_action( 'admin_enqueue_scripts', 'julep_admin_enqueue' );
}
