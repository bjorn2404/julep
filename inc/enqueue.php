<?php
/**
 * Theme enqueues
 *
 * @package julep
 */

/**
 * Enqueue scripts.
 */
if ( ! function_exists( 'julep_enqueue' ) ) {
	/**
	 * Enqueue theme styles and scripts
	 */
	function julep_enqueue() {

		// Primary stylesheet.
		wp_enqueue_style( 'primary-style', get_template_directory_uri() . '/assets/css/app-min.css' );

		// Primary JS.
		if ( SCRIPT_DEBUG || WP_DEBUG ) {
			wp_enqueue_script( 'development-js', get_template_directory_uri() . '/assets/js/development.js', array( 'jquery' ), '1.0.0', false );
		} else {
			wp_enqueue_script( 'production-js', get_template_directory_uri() . '/assets/js/production-min.js', array( 'jquery' ), '1.0.0', false );
		}

	}

	add_action( 'wp_enqueue_scripts', 'julep_enqueue' );
}
