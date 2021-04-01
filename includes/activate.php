<?php 

function tp_plugin_activation() {
    
    if( version_compare( get_bloginfo( 'version' ), '5.0', '<')) {
        wp_die( esc_html__( "You must update WordPress to use this plugin!", $GLOBALS['tp_trans_name']) );

    };
};
