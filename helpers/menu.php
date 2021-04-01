<?php 

//////////////////////////////////////////// Menu category buttons home or single menu page
function tp_shuy_show_menu_cats ($place) {
    $name = 'ThemesPlatform';

     $terms = get_terms(
        array(
            'taxonomy'   => 'food-category',
            'hide_empty' => true
        )
    );

    if(!empty($terms)){
        $first_cat_id  = 0;

        foreach ($terms as $key => $value):  
            $name = esc_html__( $value->name, $name); 
            $id = esc_html__( $value->term_id, $name); 
            $url = esc_url_raw( get_site_url() . '/menu?type=' . $id);
            
            if($place == 'home'){

                if($key == 0){
                    ?> 

                    <li><a href="<?php echo $url ?>" class="tp_back_color_prim capitalize color_white heading_small" data-cat_id="<?php echo $id ?>"><?php echo $name ?></a></li>
                       <?php  $first_cat_id = $id; ?>
                        <?php }else{ ?>
                    <li><a href="<?php echo $url ?>" class="capitalize tp_back_color heading_small" data-cat_id="<?php echo $id ?>"><?php echo $name ?></a></li>
                <?php } 
                }else{ 
                    
                    if($key == 0){
                ?>
                        <?php  $first_cat_id = $id; ?>
                    <button data-cat_id="<?php echo $id; ?>" class="heading_small menu_button capitalize"><?php echo $name ?></button>
                        <?php }else{ ?>                    
                    <button class="menu_button capitalize heading_small" data-cat_id="<?php echo $id; ?>"><?php echo $name ?></button>
            <?php }};


    endforeach; 
    return $first_cat_id;
    }; 

    wp_reset_postdata(  );
    // tp_show_menu_cats end
};

///////////////////////////////////////////////////// Menu Default first category items show

function tp_shuy_menu_default_items ($id, $place, $num) {
    $name = 'ThemesPlatform';

                    $args = array(  
                        'post_type' => 'tp_menu',
                        'post_status' => 'publish',
                        'posts_per_page' => $num, 
                        'orderby' => 'title', 
                        // 'food-category' => 'breakfast',
                        'tax_query' => array(
                        array(
                            'taxonomy' => 'food-category', //double check your taxonomy name in you dd 
                            'field'    => 'id',
                            'terms'    => $id
                        )
                        ));
                
                    $loop = new WP_Query( $args ); 

                    if($loop->have_posts(  )):
                        while($loop->have_posts(  )):
                            $loop->the_post(  );

                            $title = esc_html__( get_the_title(), $name);
                            $bio = esc_html__( get_field('menu_item_description'), $name);
                            $price = esc_html__(get_field('menu_item_price'), $name);
                            $type = esc_html__(get_field('menu_item_type'), $name);
                            $img_id = esc_html__( get_post_thumbnail_id($loop->post->ID ), $name);
                            $img = esc_url_raw( wp_get_attachment_image_url( $img_id, 'medium' ));

                            if($place == 'home'){
                                ?>
                                    <li>
                                        <div style='background-image:  url(<?php echo $img ?>)'>&nbsp;</div>
                                        <div>
                                            <h1 class="heading_normal color_white"><?php echo $title ?></h1>
                                            <h2 class="heading_small color_white"><?php echo $bio ?></h2>
                                        </div>
                                    
                                        <div>
                                            <h4 class="heading_normal weight_big color_white"><?php echo $price ?></h4>

                                            <?php if($type){ ?>
                                                <h5 class="heading_small color_white"><?php echo $type ?></h5>
                                            <?php } ?>
                                        </div>
                                    
                                    </li>
                                <?php

                            } else {
                                ?>
                                    <div class="item">
                                        <img src="<?php echo $img ?>" alt="">
                                        <div class="details">
                                            <div>
                                                <h2 class="heading_normal weight_normal"><?php echo $title ?></h2>
                                                <h3 class="heading_small"><?php echo $bio ?></h3>
                                            </div>
                                            <div>
                                                <h4 class="heading_normal"><?php echo $price ?></h4>
                                                <?php if($type){ ?>
                                                    <h5 class="heading_small color_white"><?php echo $type ?></h5>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>

                                <?php
                            };
                
                        endwhile;
                        endif;
                        wp_reset_postdata(  );

    // Default items end
};


///////////////////////////////////////////////////// Menu Default first category items show

function tp_shuy_menu_header_option ($id, $place = 'simple') {
    $name = 'ThemesPlatform';

                    $args = array(  
                        'post_type' => 'tp_menu',
                        'post_status' => 'publish',
                        'posts_per_page' => -1, 
                        'orderby' => 'title', 
                        // 'food-category' => 'breakfast',
                        'tax_query' => array(
                        array(
                            'taxonomy' => 'food-category', //double check your taxonomy name in you dd 
                            'field'    => 'id',
                            'terms'    => $id
                        )
                        ));
                
                    $loop = new WP_Query( $args ); 

                    if($place != 'simple'){

                        $arr = [];

                        if($loop->have_posts(  )){
                            while($loop->have_posts(  )){
                                $loop->the_post(  );
    
                                $title = esc_html__( get_the_title(), $name);
                                $price = esc_html__(get_field('menu_item_price'), $name);
                                $img_id = esc_html__( get_post_thumbnail_id($loop->post->ID ), $name);
                                $img = esc_url_raw( wp_get_attachment_image_url( $img_id, 'medium' ));
                                        $item = [
                                            "name" => $title,
                                            "img" => $img,
                                        ];
                                        array_push($arr, $item);
                              
                            }
                        }

                        return $arr;

                    }else{
                        if($loop->have_posts(  )){
                            while($loop->have_posts(  )){
                                $loop->the_post(  );
    
                                $title = esc_html__( get_the_title(), $name);
                                $price = esc_html__(get_field('menu_item_price'), $name);
                                $img_id = esc_html__( get_post_thumbnail_id($loop->post->ID ), $name);
                                $img = esc_url_raw( wp_get_attachment_image_url( $img_id, 'medium' ));
                                    ?>
                                        <li>
                                            <img src="<?php echo $img ?>" alt="<?php echo $title; ?>">
                                            <h4 class="heading_small weight_normal "><?php echo $title; ?></h4>
                                        </li>
                                    <?php
    
                    
                            }
                        }
                    }

                    wp_reset_postdata(  );

    // Default items end
};
