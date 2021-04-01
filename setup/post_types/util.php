<?php 

function tp_get_labels ($name, $site_name){
   return array(
        'name'                  => esc_html_x(  ''.$name, 'Post type general name', $site_name ),
        'singular_name'         => _x( ''.$name.'', 'Post type singular name', $site_name ),
        'menu_name'             => _x( ''.$name, 'Admin Menu text', $site_name ),
        'name_admin_bar'        => _x( ''.$name.'', 'Add New on Toolbar', $site_name ),
        'add_new'               => __( 'Add New '.$name.'', $site_name ),
        'add_new_item'          => __( 'Add New '.$name.'', $site_name ),
        'new_item'              => __( 'New '.$name.'', $site_name ),
        'edit_item'             => __( 'Edit '.$name.'', $site_name ),
        'view_item'             => __( 'View '.$name.'', $site_name ),
        'all_items'             => __( 'All '.$name, $site_name ),
        'search_items'          => __( 'Search '.$name, $site_name ),
        'parent_item_colon'     => __( 'Parent '.$name, $site_name ),  
        'featured_image'        => _x( ''.$name.' Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', $site_name  ),
        'set_featured_image'    => _x( 'Set '.$name.' Image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', $site_name  ),
        'remove_featured_image' => _x( 'Remove '.$name.' Image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', $site_name  ),
        'not_found'             => __( 'No '.$name.' found.', 'recipe' ),
        'not_found_in_trash'    => __( 'No '.$name.' found in Trash.', $site_name ),
        'archives'              => _x( ''.$name.' Archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', $site_name ),
        'insert_into_item'      => _x( 'Insert Into '.$name.'', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', $site_name ),
        'uploaded_to_this_item' => _x( 'Uploaded to This '.$name.'', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', $site_name ),
        'filter_items_list'     => _x( 'Filter '.$name.' List', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', $site_name ),
        'items_list_navigation' => _x( ''.$name.' List Navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', $site_name ),
        'items_list'            => _x( ''.$name.' List', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', $site_name ),
    );    
};

function tp_custom_taxonomy ($display_menu, $taxonomy_slug ,$label, $hier, $show_admin) {


    $args_tax = array(
        'labels' => $label,
        'has_archive' => true,
        'hierarchical'      => $hier,
        'show_in_rest' => true,
        'show_admin_column' => $show_admin
    );
    
    
    register_taxonomy($taxonomy_slug, [$display_menu], $args_tax);

};