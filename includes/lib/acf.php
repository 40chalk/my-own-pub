<?php

namespace MyOwnPub\Includes\Lib\ACF;

function addACF() {
	// Define path and URL to the ACF plugin.
	define( 'MY_ACF_PATH', MY_OWN_PUB_DIR . '/includes/acf/' );
	define( 'MY_ACF_URL', MY_OWN_PUB_DIR_URL . '/includes/acf/' );

// Include the ACF plugin.
	include_once( MY_ACF_PATH . 'acf.php' );

// Customize the url setting to fix incorrect asset URLs.
	add_filter('acf/settings/url', 'MyOwnPub\Includes\Lib\ACF\my_acf_settings_url');
	function my_acf_settings_url( $url ) {
		return MY_ACF_URL;
	}

// (Optional) Hide the ACF admin menu item.
	add_filter('acf/settings/show_admin', 'MyOwnPub\Includes\Lib\ACF\my_acf_settings_show_admin');
	function my_acf_settings_show_admin( $show_admin ) {
		return true;
	}
}