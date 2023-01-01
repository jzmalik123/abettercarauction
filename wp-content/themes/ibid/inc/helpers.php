<?php 
defined( 'ABSPATH' ) || exit;

/*
 * Return fallback plugin version by slug
 * @param string plugin_slug
 * @return string plugin version by slug
 */
function ibid_fallback_plugin_version($plugin_slug = ''){
	$plugins = array(
	    "modeltheme-framework-ibid" => "3.5.5",
	    "js_composer" => "6.9.0",
	    "revslider" => "6.6.0",
	    "woocommerce-simple-auctions" => "2.0.17",
	    "parallax-backgrounds-for-vc" => "4.5",
	    "essential-grid" => "3.0.15",
	);

	return $plugins[$plugin_slug];
}


/*
 * Return plugin version by slug from remote json
 * @param string plugin_slug
 * @return string plugin version by slug
 */
function ibid_plugin_version($plugin_slug = ''){

    $request = wp_remote_get('https://modeltheme.com/json/plugin_versions.json');
    $plugin_versions = json_decode(wp_remote_retrieve_body($request), true);

	if( is_wp_error( $request ) ) {
		return ibid_fallback_plugin_version($plugin_slug);
	}else{
    	return $plugin_versions[0][$plugin_slug];
	}

}