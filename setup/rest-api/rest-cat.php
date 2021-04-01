<?php 


function tp_shuy_cat_api(){ 

        $args = array(
            'method' => 'GET',
            'callback' => 'tp_categories',
            'permission_callback' => '__return_true'

        );
    
    register_rest_route('tp/v1/category', '/(?P<id>\d+)', $args);
};

add_action('rest_api_init', 'tp_shuy_cat_api');
 function tp_categories($request){

     $id = $request->get_param('id');
    return  tp_shuy_cat_data($id);
     
    };

//////////////////////////////// Collect data
function tp_shuy_cat_data($id){

    
    $args = array(  
        'post_type' => 'post',
        'post_status' => 'publish',
        'posts_per_page' => -1, 
        'orderby' => 'title', 
        'tax_query' => array(
            array(
                'taxonomy' => 'category', //double check your taxonomy name in you dd 
                'field'    => 'id',
                'terms'    => $id,
            )
    ));
                

    $data = array();
    $loop = new WP_Query( $args ); 

if($loop->have_posts(  )):
    while($loop->have_posts(  )):
    $loop->the_post(  );
    $title = get_the_title();
    $date = get_the_date();
    $img_id = get_post_thumbnail_id($loop->post->ID );
    $img = wp_get_attachment_image_url( $img_id, 'large' );
    
    $new_array = 
        array(
            'title' => $title,
            'date' => $date,
            'img' => $img
        );
    
    array_push($data, $new_array);
    
    endwhile;
    wp_reset_postdata();
    endif;
    
    return $data;
    
};

//add_action('init', 'tp_menu_data');