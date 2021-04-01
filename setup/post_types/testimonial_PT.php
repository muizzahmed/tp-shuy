<?php 


function TP_CPT_Testimonial(){

    $name = 'Testimonial';
    $site_name = 'ThemesPlatform';

    $labels = tp_get_labels($name, $site_name);
    $labels1 = tp_get_labels('test', $site_name);
    $labels2 = tp_get_labels('skill', $site_name);
    
    
   $args = array(
       'labels' => $labels,
       'public' => true,
       'has_archive' => true,
       'menu_icon' => 'dashicons-format-status',
       'supports' => array('title', 'editor', 'thumbnail'),
       'rewrite'           => array('slug' => 'chef'),
       'show_in_rest' => true
       
       
   );
    
    register_post_type( 'tp-testimonial', $args);
};


add_action( 'init', 'TP_CPT_Testimonial');