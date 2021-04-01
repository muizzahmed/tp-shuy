<?php

class TP_testimonial extends WP_Widget{
    public function __construct(){
        parent:: __construct(
            'tp_testimonial',
            esc_html__('Testimonial', $GLOBALS['tp_trans_name']),
            array(
                'description' => esc_html__( 'Testimonial for home page', $GLOBALS['tp_trans_name'] )
                )
            );
            
            // Public costruct end
        }

        ////////////////////////////////////////////// Widget area
        
        public function form($instance) {}

    ////////////////////////////////////////////////////// Frontend
    public function widget($args,$instance) {
        $widget_id = $this->id;

        $tittle = esc_html__(get_field('tp_testimonial_wid_tittle', 'widget_' . $widget_id), $GLOBALS['tp_trans_name'] );
        $how_many = esc_html__(get_field('tp_testimonial_wid_count', 'widget_' . $widget_id), $GLOBALS['tp_trans_name'] );
        $bcg_img_id = esc_html__(get_field('tp_testimonial_wid_bcg_img', 'widget_' . $widget_id), $GLOBALS['tp_trans_name'] );
        $img = esc_url_raw( wp_get_attachment_image_url( $bcg_img_id, 'org'));
        ?>  


            
        <section class="TP_testimonial" style="background-image: linear-gradient(rgba(51, 51, 51, 0.753), rgba(51, 51, 51, 0.747)), url(<?php echo $img ?>)">
            <div class="top">
                <h2 class="h_anim heading_huge color_white"><?php echo esc_html($tittle) ?></h2>
            </div>
            <div class="layout">
                <button class="prev_button">
                    <svg>
                        <use xlink:href="<?php echo get_template_directory_uri(  ) ?>/files/imgs/sprite.svg#arrow-side"></use>
                    </svg>
                </button>
                <div class="items">
                    <div class="slider">
                    <?php 

                    $new_cont = -1;

                    if(isset($how_many)){
                        $new_cont = $how_many;
                    }
                    $args = array(  
                        'post_type' => 'tp-testimonial',
                        'post_status' => 'publish',
                        'posts_per_page' => $how_many, 
                        'orderby' => 'title', 
                    );

                    $loop = new WP_Query( $args ); 

                    
                    if($loop->have_posts(  )){
                        while ($loop->have_posts()) {
                            $loop->the_post(  );
                            
                            $title = get_the_title( );
                            $des = get_the_content( $loop->post->ID);

                            $img_id = get_post_thumbnail_id($loop->post->ID);
                            $img = wp_get_attachment_image_url( $img_id, 'chef');
                    ?>

                    
                    <div class="item item_anim">
                        <h3 class="heading_small color_white"><?php echo $des ?></h3>
                        <h4 class="heading_normal color_white weight_normal"><?php echo esc_html($title) ?></h4>
                        <img src="<?php echo esc_html($img); ?>" alt="user-img">
                        <h6>&bdquo;</h6>
                    </div> 

                <?php 
                    }}
                ?>
                </div>

                </div>
                <button class="next_button">
                    <svg>
                        <use xlink:href="<?php echo get_template_directory_uri(  ) ?>/files/imgs/sprite.svg#arrow-side"></use>
                    </svg>
                </button>

            </div>
            <script>ScrollOut({
                targets: '.h_anim'
                });
            </script>
        </section>

        <?php

        }


    // Class end
};

