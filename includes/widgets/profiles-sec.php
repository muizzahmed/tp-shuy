<?php

class TP_profiles_sec extends WP_Widget{
    public function __construct(){
        parent:: __construct(
            'profiles-sec',
            esc_html__('Chefs Layout', $GLOBALS['tp_trans_name']),
            array(
                'description' => esc_html__( 'Chefs Layout for home page', $GLOBALS['tp_trans_name'] )
                )
            );
            
            // Public costruct end
        }

        ////////////////////////////////////////////// Widget area
        
        public function form($instance) {}

    ////////////////////////////////////////////////////// Frontend
    public function widget($args,$instance) {

        $widget_id = $this->id;
        $tittle = esc_html__(get_field('tp_chef_wid_tittle', 'widget_' . $widget_id), $GLOBALS['tp_trans_name'] );
        $bcg_img_id = esc_html__(get_field('tp_chef_wid_bcg_image', 'widget_' . $widget_id), $GLOBALS['tp_trans_name'] );

        $bcg_img = esc_url_raw( wp_get_attachment_image_url( $bcg_img_id, 'full'));

       
        $bcg_color =  esc_html__(strtolower(get_field('tp_chef_wid_bcg_color', 'widget_' . $widget_id)), $GLOBALS['tp_trans_name']);
        $back_color_value = '';
            
        if($bcg_color == 'primary'){
            $back_color_value = '--TP-primary';
        }else if($bcg_color == 'secondary'){
            $back_color_value = '--TP-secondry';
            
        }else if($bcg_color == 'trio'){
            $back_color_value = '--TP-trio';
        };
        

        global $name;

         if(empty($bcg_img_id)){  ?>
            <section style="background-color:var(<?php echo $back_color_value ?>)" class="TP_profiles-sec">
                <h2 class="profiles_h_a heading_huge text_center"><?php echo $tittle ?></h2>
         <?php }else{ ?>
            <section style="background-image: linear-gradient(#0009,#0009), url(<?php echo $bcg_img ?>)"  class="TP_profiles-bcg">
                <h2 class="profiles_h_a heading_huge color_white text_center"><?php echo $tittle ?></h2>
         <?php }?>


                    <ul class="profiles_items_a">

                        <?php 
                        
                            $args = array(  
                                'post_type' => 'tp_chef',
                                'post_status' => 'publish',
                                'posts_per_page' => 3, 
                                'orderby' => 'title', 
                            );
                        
                            $loop = new WP_Query( $args ); 

                            if($loop->have_posts(  )):
                                while($loop->have_posts()):
                                    $loop->the_post();

                                    $title = esc_html__( get_the_title( ), $name);
                                    $permalink = esc_url_raw( get_the_permalink( ), $name);
                                    $role = esc_html__( get_field('chef_type'), $name);
                                    $fb = esc_url_raw( get_field('chef_facebook'));
                                    $insta = esc_url_raw(get_field('chef_instagram'));
                                    $twitter = esc_url_raw(get_field('chef_twitter'));
                                    $youtube = esc_url_raw(get_field('chef_youtube'));
                                    $bio = esc_html__( get_post_meta( $loop->post->ID, 'tp_chef_bio', true), $name);

                                    $img_id = esc_html__(get_post_thumbnail_id( $loop->post->ID), $name);
                                    $img = esc_url_raw(wp_get_attachment_image_url( $img_id,'tp_chef'));
        
                                
                        ?>

                            <li>
                                <div>
                                    <div style='background-image: linear-gradient(rgba(51, 51, 51, 0.109),rgba(51, 51, 51, 0.15)), url(<?php echo $img ?>);'>
                                        &nbsp;
                                        <h3 class="heading_small color_white"><?php echo $role; ?></h3>
                                    </div>
                                </div>
                                <div>
                                    <a href="<?php echo $permalink ?>" class="heading_normal color_primary"><?php echo $title; ?></a>
       
                                        <?php if(!empty($fb) || !empty($twitter) || !empty($insta)): ?>
                                            <div>
                                                <?php 
                                                    if(!empty($fb)):
                                                ?>

                                                <a href="#">
                                                    <svg>
                                                        <use xlink:href="<?php echo get_template_directory_uri(  ) ?>/files/imgs/sprite.svg#facebook"></use>
                                                    </svg>
                                                </a>

                                                <?php
                                                    endif;
                                                    if(!empty($twitter)):
                                                ?>

                                                <a href="#">
                                                    <svg>
                                                        <use xlink:href="<?php echo get_template_directory_uri(  ) ?>/files/imgs/sprite.svg#twitter"></use>
                                                    </svg>
                                                </a>

                                                <?php endif; 
                                                if(!empty($insta)):
                                                ?>
                                                
                                                <a href="#">
                                                    <svg>
                                                        <use xlink:href="<?php echo get_template_directory_uri(  ) ?>/files/imgs/sprite.svg#insta"></use>
                                                    </svg>
                                                </a>
                                                <?php endif; ?>
                                            </div>
                                         <?php endif; ?>
                                    <h6 class="heading_small text_center"><?php echo $bio; ?></h6>
                                </div>
                            </li>

                        <?php 
                            endwhile; 
                            endif;
                            wp_reset_postdata( );
                        ?>

                    </ul>
            

                <a class="profiles_a heading_small color_white" href="<?php echo get_site_url( ); ?>/chefs"><?php esc_html_e( 'View All', $name ) ?></a>
                
      <script>
          ScrollOut({targets: '.profiles_h_a, .profiles_items_a, .profiles_a' });
      </script>
                
    </section>
            
        <?php

        }


    // Class end
};

