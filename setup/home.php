<?php


function tp_filter_show_home() {
    if(is_active_sidebar('tp-sidebar-main')){
      return dynamic_sidebar( 'tp-sidebar-main' );
    }
}

add_action( 'tp_show_home_page', 'tp_filter_show_home', 7,1 );


