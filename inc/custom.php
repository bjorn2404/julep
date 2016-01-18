<?php
/**
 * Custom functions
 *
 * @package julep
 */

if ( ! function_exists( 'julep_format_address' ) ) {
	/**
	 * Format a street address
	 *
	 * @param array $address Address.
	 *
	 * @return null|string
	 */
	function julep_format_address( $address ) {
		$formatted_address = null;

		if ( count( $address ) > 0 ) {
			$formatted_address .= '<address itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">';
			if ( array_key_exists( 'name', $address ) && $address['name'] ) { $formatted_address .= '<span class="loc-name" itemprop="name">' . $address['name'] . '</span> '; }
			if ( array_key_exists( 'address', $address ) && $address['address'] ) { $formatted_address .= '<span itemprop="streetAddress">' . $address['address'] . '</span><br>'; }
			if ( array_key_exists( 'address2', $address ) && $address['address2'] ) { $formatted_address .= $address['address2'] . '<br>'; }
			if ( array_key_exists( 'city', $address ) && $address['city'] ) { $formatted_address .= '<span itemprop="addressLocality">' . $address['city'] . '</span>'; }
			if ( array_key_exists( 'state', $address ) && $address['state'] ) { $formatted_address .= ', <span itemprop="addressRegion">' . $address['state'] . '</span><br> '; }
			if ( array_key_exists( 'zip', $address )  && $address['zip'] ) { $formatted_address .= '<span itemprop="postalCode">' . $address['postal'] . '</span><br>'; }
			if ( array_key_exists( 'country', $address ) && $address['country'] ) { $formatted_address .= '<span itemprop="addressCountry">' . $address['country'] . '</span><br>'; }
			$formatted_address .= '</address>';
			if ( array_key_exists( 'phone', $address ) && $address['phone'] ) { $formatted_address .= '<span itemprop="telephone">' . $address['phone'] . '</span><br>'; }
			if ( array_key_exists( 'email', $address ) && $address['email'] ) { $formatted_address .= '<a itemprop="email" href="mailto:' . $address['email'] . '">' . $address['email'] .'</a><br>'; }
		}

		return apply_filters( 'julep_address', $formatted_address );
	}
}

if ( ! function_exists( 'is_ipad' ) ) {
	/**
	 * Test for iPad
	 *
	 * @return bool
	 */
	function is_ipad() {
		$user_agent = filter_input( INPUT_SERVER, 'HTTP_USER_AGENT', FILTER_SANITIZE_STRING );
		$is_ipad = (bool) strpos( $user_agent, 'iPad' );

		if ( $is_ipad ) {
			return true;
		} else {
			return false;
		}
	}
}

if ( ! function_exists( 'is_iphone' ) ) {
	/**
	 * Test for iPhone
	 *
	 * @return bool
	 */
	function is_iphone() {
		$user_agent = filter_input( INPUT_SERVER, 'HTTP_USER_AGENT', FILTER_SANITIZE_STRING );
		$is_iphone = (bool) strpos( $user_agent, 'iPhone' );

		if ( $is_iphone ) {
			return true;
		} else {
			return false;
		}
	}
}

if ( ! function_exists( 'is_ipod' ) ) {
	/**
	 * Test for iPod
	 *
	 * @return bool
	 */
	function is_ipod() {
		$user_agent = filter_input( INPUT_SERVER, 'HTTP_USER_AGENT', FILTER_SANITIZE_STRING );
		$is_ipod = (bool) strpos( $user_agent, 'iPod' );

		if ( $is_ipod ) {
			return true;
		} else {
			return false;
		}
	}
}

if ( ! function_exists( 'is_ios' ) ) {
	/**
	 * Test for iOS
	 *
	 * @return bool
	 */
	function is_ios() {
		if ( is_iphone() || is_ipad() || is_ipod() ) {
			return true;
		} else {
			return false;
		}
	}
}
