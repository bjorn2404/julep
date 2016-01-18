<?php
/**
 * Admin init functions
 *
 * @package julep
 */

if ( ! function_exists( 'julep_admin_init' ) ) {
	/**
	 * Admin init functionality
	 */
	function julep_admin_init() {
		// Disable file editing through the admin.
		define( 'DISALLOW_FILE_EDIT', true );
	}

	add_action( 'admin_init', 'julep_admin_init' );
}

if ( ! function_exists( 'julep_update_dashboard' ) ) {
	/**
	 * Customize the dashboard
	 */
	function julep_update_dashboard() {
		// Remove default dashboard widgets.
		remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
		remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
		remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
		remove_meta_box( 'dashboard_secondary', 'dashboard', 'normal' );
		remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
		remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );
		remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
		remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
		remove_meta_box( 'dashboard_activity', 'dashboard', 'normal' );
	}

	add_action( 'wp_dashboard_setup', 'julep_update_dashboard' );
}

if ( ! function_exists( 'julep_update_admin_menu' ) ) {
	/**
	 * Customize the admin menu
	 */
	function julep_update_admin_menu() {
		remove_menu_page( 'theme-editor.php' );
		remove_menu_page( 'edit-comments.php' );
		remove_submenu_page( 'themes.php', 'customize.php' );
	}

	add_action( 'admin_menu', 'julep_update_admin_menu' );
}

if ( ! function_exists( 'julep_admin_company_widget' ) ) {
	/**
	 * Company admin widget
	 *
	 * @param string $html Widget markup.
	 */
	function julep_admin_company_widget( $html ) {
		$html .= '<div class="admin-widget-image">';
		$html .= '<a target="_blank" href="http://www.yourcompany.com"><img src="' . esc_url( get_template_directory_uri() ) . '/admin/assets/img/company-logo.jpg"/></a>';
		$html .= '</div>';
		$html .= '<div class="admin-widget-content">';
		$html .= '<p>Need support, updates or have a new project in mind? Contact us!</p>';
		$html .= '<ul>';
		$html .= '<li>Email: <a href="mailto:hello@yourcompany.com">hello@yourcompany.com</a></li>';
		$html .= '<li>Phone: <a href="tel:+10000000000">+1 000-000-0000</a></li>';
		$html .= '</ul>';
		$html .= '</div>';

		echo wp_kses( $html, array(
			'div' => array(
				'class' => array(),
			),
			'p'   => array(),
			'ul'  => array(),
			'li'  => array(),
			'a'   => array(
				'href' => array(),
			),
			'img' => array(
				'src' => array(),
			),
		) );
	}
}

if ( ! function_exists( 'julep_company_admin_widget_add' ) ) {
	/**
	 * Add the Company admin widget
	 */
	function julep_company_admin_widget_add() {
		wp_add_dashboard_widget(
			'julep-admin-widget',
			'This site is proudly developed by Company',
			'julep_admin_company_widget'
		);
	}

	add_action( 'wp_dashboard_setup', 'julep_company_admin_widget_add' );
}


if ( ! function_exists( 'julep_welcome_panel' ) ) {
	/**
	 * Adds custom welcome panel content to the dashboard
	 *
	 * @param string $html Welcome panel markup.
	 */
	function julep_welcome_panel( $html ) {
		$html .= '<div class="welcome-panel-content">';
		$html .= '<h3>Welcome to the Julep Dashboard</h3>';
		$html .= '<p class="about-description">We’ve assembled some links and information to get you started:</p>';
		$html .= '<ul>';
		$html .= '<li>Example: all the pages for this website can be edited via the "<a href="' . get_bloginfo( 'url' ) . '/wp-admin/edit.php?post_type=page">Pages</a>" link in the left-hand column of the admin dashboard.</li>';
		$html .= '</ul>';
		$html .= '</div>';

		echo wp_kses( $html, array(
			'div' => array( 'class' => array() ),
			'h3' => array(),
			'p' => array( 'class' => array() ),
			'a' => array( 'href' => array(), 'target' => array() ),
			'ul' => array(),
			'li' => array(),
		));
	}

	remove_action( 'welcome_panel', 'wp_welcome_panel' );
	add_action( 'welcome_panel', 'julep_welcome_panel' );
}

if ( ! function_exists( 'julep_welcome_init' ) ) {
	/**
	 * Restore the welcome panel to all users when theme is activated
	 */
	function julep_welcome_init() {
		global $wpdb;
		$wpdb->update( $wpdb->usermeta, array( 'meta_value' => 1 ), array( 'meta_key' => 'show_welcome_panel' ) );
	}

	add_action( 'after_switch_theme', 'julep_welcome_init' );
}

if ( class_exists( 'WPSEO_Metabox' ) && ! function_exists( 'julep_move_yoast_meta' )  ) {

	/**
	 * Move Yoast meta box to the bottom if it's installed.
	 *
	 * @return string
	 */
	function julep_move_yoast_meta() {
		return 'low';
	}

	add_filter( 'wpseo_metabox_prio', 'julep_move_yoast_meta' );
}

