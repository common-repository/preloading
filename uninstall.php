<?php

if ( !defined( 'WP_UNINSTALL_PLUGIN' ) )
	exit();

require_once( 'tbpl-config.php' );

delete_option( 'pre_loading_config' );

delete_option( 'pre_loading_options' );

delete_option( 'pre_loading_options_preview' );

$wpdb->query( 'DROP TABLE IF EXISTS ' . PRE_LOADING_TABLE_IPS . ';' );

?>