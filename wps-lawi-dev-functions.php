<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
/*
Plugin Name: WP Stars Landwirt DEV Functions
Plugin URI: #
Description: * Disables wp_mail function
Author: Daniel Stadler
Version: 1.0.0
*/
register_activation_hook( __FILE__, 'activhook' );
function activhook() {
    update_option( 'wps_lawi_dev_functions_active', 'active' );
}
register_deactivation_hook( __FILE__, 'deactivhook' );
function deactivhook() {
    delete_option( 'wps_lawi_dev_functions_active' );
}
if(get_option( 'wps_lawi_dev_functions_active' )) {
    add_filter( 'wp_mail', 'override_mail_recipient');
    function override_mail_recipient ( $args ) {
        $args['to'] = 'daniel@wp-stars.com';
        return $args;
    }
}


?>