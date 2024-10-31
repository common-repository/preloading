<?php

global $wpdb;
define( 'PRE_LOADING_VERSION', '1.0' );
define( 'PRE_LOADING_ROOT_PATH', plugin_dir_path( __FILE__ ) );
define( 'PRE_LOADING_ROOT_URL', plugin_dir_url( __FILE__ ) );
define( 'PRE_LOADING_FORM_NONCE', 'tbpl-nonce' );
define( 'PRE_LOADING_PREVIEW_NONCE', 'preview-nonce' );
define( 'PRE_LOADING_TABLE_IPS',  $wpdb->prefix . 'tbpl_ips' );

?>