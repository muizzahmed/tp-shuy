<?php 


function TP_CPT_Menu(){


    $labels = tp_get_labels('Menu Item', 'ThemesPlatform');
    $labels_tax = tp_get_labels('Food Category', 'ThemesPlatform');

    
   $args = array(
       'labels' => $labels,
       'public' => true,
       'has_archive' => true,
       'menu_icon' => 'dashicons-carrot',
       'supports' => array('title', 'thumbnail'),
       'rewrite'           => array('slug' => 'menu'),
       'show_in_rest' => true
   );
    
    register_post_type( 'tp_menu', $args);

    tp_custom_taxonomy('tp_menu', 'food-category', $labels_tax, false, true);


};


add_action( 'init', 'TP_CPT_Menu' );