<?php
function pre_loading_installation() {
	
	global $wpdb;
	
	// preloaded page Config
	$old_config			= get_option( 'pre_loading_config' );
	$defaults			= array(
		'version' 		=> PRE_LOADING_VERSION,
		'cookie_name'	=> 'tbpl_cookie_' . wp_create_nonce( 'tbpl_cookie_name' ),
		'show_info'		=> true
	);
	$new_config			= wp_parse_args( $old_config, $defaults );
	
	update_option( 'pre_loading_config', $new_config );
	
	// preloaded page Options
	$defaults	= array(
		
		'enable_pre_loading_page'		=> FALSE,
		'show_in_all'				=> true,
		'expiration_time'			=> 30,
		'show_on_mobile'			=> TRUE,
		'enable_age_confirmation'	=> FALSE,
		'min_age'					=> 18,
		'reject_text'				=> strip_tags( __( 'Sorry, you may not view this site', 'pre-loading-domain' ) ),
		'template'					=> 'default',
		'page_title'				=> get_bloginfo( 'name' ),
		'title'						=> strip_tags( __( 'Here\'s The Title', 'pre-loading-domain' ) ),
		'title_color'				=> '649089',
		'text'						=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur volutpat nulla nec arcu blandit vulputate. Nunc eu libero nunc. In hac habitasse platea dictumst.',
		'text_color'				=> '555555',
		'continue_button_text'		=> strip_tags( __( 'Continue to Web Site', 'pre-loading-domain' ) ),
		'continue_button_bg_color'	=> 'eeeeee',
		'continue_button_text_color'=> '649089',
		'image_url'					=> '',
		'center_image'				=> 'left top',
		'repeat_image'				=> 'no-repeat',
		'background_color'			=> 'fdfdfd',
		'youtube_id'				=> '',
		'video_autoplay'			=> TRUE,
		'video_width'				=> '640',
		'video_height'				=> '360',
		'enable_opt_in'				=> FALSE,
		'opt_in_text'				=> strip_tags( __( 'I agree with the terms and conditions.', 'pre-loading-domain' ) ),
		'opt_in_reject_text'		=> strip_tags( __( 'You aren\'t agree with conditions', 'pre-loading-domain' ) )

	);
	$old_options	= get_option( 'pre_loading_options' );
	$new_options	= wp_parse_args( $old_options, $defaults );
	
	update_option( 'pre_loading_options', $new_options );
	
	$wpdb->query( '
		CREATE TABLE IF NOT EXISTS ' . PRE_LOADING_TABLE_IPS . ' (
			ip VARCHAR(30) NOT NULL,
			cookie_name VARCHAR(40) NOT NULL,
			splash_date datetime DEFAULT "0000-00-00 00:00:00",
			PRIMARY KEY  (ip, cookie_name)
		);'
	);

}

register_activation_hook( PRE_LOADING_ROOT_PATH . '/init.php', 'pre_loading_installation' );
?>