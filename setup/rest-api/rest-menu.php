<?php 


function tp_shuy_menu_api(){ 

        $args = array(
            'method' => 'GET',
            'callback' => 'tp_shuy_menu_foods',
            'permission_callback' => '__return_true'

        );
    
    register_rest_route('tp/v1/food', '/(?P<id>\d+)', $args);
};

add_action('rest_api_init', 'tp_shuy_menu_api');
 function tp_shuy_menu_foods($request){

     $id = $request->get_param('id');
    return  tp_shuy_menu_data($id);
     
    };

//////////////////////////////// Collect data
function tp_shuy_menu_data($id){

    
    $args = array(  
        'post_type' => 'tp_menu',
        'post_status' => 'publish',
        'posts_per_page' => -1, 
        'orderby' => 'title', 
        'tax_query' => array(
            array(
                'taxonomy' => 'food-category', //double check your taxonomy name in you dd 
                'field'    => 'id',
                'terms'    => $id,
            )
    ));
                

    $data = array();
    $loop = new WP_Query( $args ); 

if($loop->have_posts(  )):
    while($loop->have_posts(  )):
    $loop->the_post(  );
    $title = esc_html__( get_the_title(), 'tp-shuy');
    $bio = esc_html__( get_field('menu_item_description'), 'tp-shuy');
    $price = esc_html__(get_field('menu_item_price'), 'tp-shuy');
    $type = esc_html__(get_field('menu_item_type'), 'tp-shuy');
    $img_id = esc_html__( get_post_thumbnail_id($loop->post->ID ), 'tp-shuy');
    $img = esc_url_raw( wp_get_attachment_image_url( $img_id, 'medium' ));
    
    $new_array = 
        array(
            'title' => $title,
            'bio' => $bio,
            'price' => $price,
            'type' => $type,
            'img' => $img
        );
    
    array_push($data, $new_array);
    
    endwhile;
    wp_reset_postdata();
    endif;
    
    return $data;
    
};

//add_action('init', 'tp_shuy_menu_data');