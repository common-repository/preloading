<?php
/*
Plugin Name: Pre Loading
Plugin URI: www.techbooth.in/wordpress-plugins/
Description: An Easy to use Pre Loading page which will help you in many ways like adding age confirmation, making youser confirm terms or need to show anything to users... It will also helps you increase your Email subscriptins.
Version: 1.0
Author: Amit Bhardwaj
Author URI: www.techbooth.in
*/

require_once( 'tbpl-config.php' );

load_plugin_textdomain( 'pre-loading-domain', false, dirname( plugin_basename( __FILE__ ) ) . '/lang/' );

require_once( 'inc/activation.php' );

add_action( 'init', 'pre_loading_init' );

function pre_loading_init() {	
	
	if ( ! is_admin() )	
		add_action( 'template_redirect', 'pre_loading_generate' );
	
	if ( is_admin() ) {		
		
		tbpl_import_class( 'Pre_Loading_Admin', 'inc/admin/class-pre-loading-admin.php' );
		
		require_once( 'inc/preview-ajax.php' );
			
		add_action( 'wp_ajax_pre_loading_hook', 'pre_loading_show_preview' );
			
	}
	
}

function pre_loading_generate() {

	tbpl_import_class( 'Pre_Loading', 'inc/class-pre-loading.php' );
		
	$tbpl	= new Pre_Loading();

	if ( $tbpl->is_active() )
		$tbpl->splash_page();

}

function tbpl_import_class( $class, $file ) {
	
	if ( ! class_exists( $class ) )
		require_once( $file );
	
}

?>