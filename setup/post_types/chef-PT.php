<?php 


function TP_CPT_Chef(){

    $name = 'Chef';
    $site_name = 'ThemesPlatform';

    $labels = tp_get_labels($name, $site_name);
    
    
   $args = array(
       'labels' => $labels,
       'public' => true,
       'has_archive' => true,
       'menu_icon' => 'dashicons-universal-access',
       'supports' => array('title', 'editor', 'thumbnail'),
       'rewrite'           => array('slug' => 'chefs'),
       'show_in_rest' => true
   );
    
    register_post_type( 'tp_chef', $args);
};


add_action( 'init', 'TP_CPT_Chef' );