<?php

class TP_posts_3_col extends WP_Widget{
    public function __construct(){
        parent:: __construct(
            'tp_posts_3_col',
            esc_html__('Blogs', $GLOBALS['tp_trans_name']),
            array( 'description' => esc_html__( 'Blogs for home page', $GLOBALS['tp_trans_name'] ) ) );}
            public function form($instance) {}

   
    ////////////////////////////////////////////////////// Frontend
    public function widget($args,$instance) { 

        $widget_id = $this->id;
        $top_title=  esc_html__(get_field('tp_blogs_wid_top_tittle', 'widget_' . $widget_id), $GLOBALS['tp_trans_name']);
        $posts_count =  esc_html__(get_field('tp_blogs_wid_quantity', 'widget_' . $widget_id), $GLOBALS['tp_trans_name']);
        $bcg_color =  esc_html__(strtolower(get_field('tp_blogs_wid_bcg_color', 'widget_' . $widget_id)), $GLOBALS['tp_trans_name']);
        $back_color_value = '';
        
        if($bcg_color == 'primary'){
            $back_color_value = '--TP-primary';
        }else if($bcg_color == 'secondary'){
            $back_color_value = '--TP-secondry';
            
        }else if($bcg_color == 'trio'){
            $back_color_value = '--TP-trio';
        };

        ?>  

            <section class="TP_posts-3-col" style="background-color:var(<?php echo $back_color_value ?>)">
            <div class="top">
                <h1 class="heading_huge"><?php echo $top_title ?></h1>
            </div>

            <div class="items">
                <?php 
                    $args = array(  
                        'post_type' => 'post',
                        'post_status' => 'publish',
                        'posts_per_page' => $posts_count, 
                        'orderby' => 'title', 
                        );
                
                    $loop = new WP_Query( $args); 
                        
                    if($loop->have_posts()){

                    while($loop->have_posts()){
                        $loop->the_post();
                        $current_post = $loop->current_post;
                        
                        $img = get_the_post_thumbnail_url( $loop->post->ID, 'tp_blog_img_small' );
                    ?>
                        <a href="<?php the_permalink( ); ?>" class="item">
                            <img src="<?php echo $img; ?>" alt="<?php the_title(); ?>">
                            <div class="details">
                                <div>
                                    <h1 class="heading_normal color_white"><?php the_title( ); ?></h1>
                                </div>
                                <div>
                                    <h3 class="heading_small color_white weight_normal"><?php echo get_the_date( ); ?></h3>
                                </div>                    
                            </div>
                        </a>

                <?php  }} wp_reset_postdata( ); ?>
                </div>

                <div class="bottom">
                    <a href="<?php echo get_site_url( ); ?>/blog" class="TP_single-button-bcg"><?php  esc_html_e('View All', $GLOBALS['tp_trans_name']) ?></a>
                </div>
                
            <script> ScrollOut({ targets: '.items, .TP_single-button-bcg, .TP_heading-Bline' }) </script>
            </section>
<?php 
 }};

