<?php
/**
 * Setup functions
 *
 * @package julep
 */

if ( ! function_exists( 'julep_setup' ) ) {
	/**
	 * Theme setup functionality
	 */
	function julep_setup() {

		// Primary navigation menu.
		register_nav_menu( 'primary-navigation', __( 'Primary Menu', 'julep' ) );

		// Add post thumbnail support.
		add_theme_support( 'post-thumbnails' );

		// HTML5 all the things.
		add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );

		// Add title tag support.
		add_theme_support( 'title-tag' );

	}

	add_action( 'after_setup_theme', 'julep_setup' );
}
