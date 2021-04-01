<?php


function TP_register_widgets () {

    
        register_widget('TP_grid_images');
        register_widget('TP_flex_two_reverse');
        register_widget('TP_flex_two');
        register_widget('TP_menu');
        register_widget('TP_profiles_sec');
        register_widget('TP_button_sec');
        register_widget('TP_map');
        register_widget('TP_flex_drig');
        register_widget('TP_testimonial');
        register_widget('TP_6Items_video');
        register_widget('TP_posts_3_col');
        register_widget('TP_table_book');
        register_widget('TP_order_popup');
 
        unregister_widget('WP_Widget_Media_Audio');
        unregister_widget('WP_Widget_Media_Video');
        unregister_widget('WP_Widget_Media_Gallery');
        unregister_widget('WP_Widget_Media_Image');
        // unregister_widget('WP_Widget_Custom_HTML');
        unregister_widget('WP_Widget_Pages');
        unregister_widget('WP_Widget_Calendar');
        unregister_widget('WP_Widget_Archives');
        unregister_widget('WP_Widget_Links');
        unregister_widget('WP_Widget_Meta');
        unregister_widget('WP_Widget_Search');
        unregister_widget('WP_Widget_Text');
        unregister_widget('WP_Widget_Categories');
        unregister_widget('WP_Widget_Recent_Posts');
        unregister_widget('WP_Widget_Recent_Comments');
        unregister_widget('WP_Widget_RSS');
        unregister_widget('WP_Widget_Tag_Cloud');
        unregister_widget('WP_Nav_Menu_Widget');
        unregister_widget('Twenty_Eleven_Ephemera_Widget');
    };




add_action( 'widgets_init', 'TP_register_widgets');