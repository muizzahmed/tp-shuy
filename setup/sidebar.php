<?php

// Register widget
function TP_register_sidebar () {


    register_sidebar(array(
        'name' => esc_html__(' Home Page', $GLOBALS['tp_trans_name']),
        'id' => 'tp-sidebar-main',
        'description' =>  esc_html__( 'Home page layout', $GLOBALS['tp_trans_name']),
        'before_title' => '<h5>',
        'after_title' => '</h5>'
    ));


};




add_action( 'widgets_init', 'TP_register_sidebar');