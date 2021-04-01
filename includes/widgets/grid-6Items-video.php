<?php


class TP_6Items_video extends WP_Widget{
    public function __construct(){
        parent:: __construct(
            'tp_6Items_video',
            esc_html__('Hot Rated',$GLOBALS['tp_trans_name']),
            array(
                'description' => esc_html__( 'Hot rated for home page',$GLOBALS['tp_trans_name'] )
                )
            );
            
            // Public costruct end
        }

        ////////////////////////////////////////////// Widget area
        
        public function form($instance) {}

    ////////////////////////////////////////////////////// Frontend
    public function widget($args,$instance) {
        
        $widget_id = $this->id;
        $tittle = esc_html__(get_field('tp_hot_rated_wid_tittle', 'widget_' . $widget_id), $GLOBALS['tp_trans_name'] );
        $para = esc_html__(get_field('tp_hot_rated_wid_para', 'widget_' . $widget_id), $GLOBALS['tp_trans_name'] );
        $imgs = get_field('tp_hot_rated_wid_media', 'widget_' . $widget_id) ;
        
        
        $img1_id = esc_html__( $imgs['tp_hot_rated_wid_img1'], $GLOBALS['tp_trans_name'] );
        $img1 =  esc_url_raw(wp_get_attachment_image_url($img1_id ,'large'));
        $img1_title = esc_html__($imgs['tp_hot_rated_wid_img1_tittle'], $GLOBALS['tp_trans_name'] );
        
        $img2_id = esc_html__( $imgs['tp_hot_rated_wid_img2'], $GLOBALS['tp_trans_name'] );
        $img2 =  esc_url_raw(wp_get_attachment_image_url($img2_id ,'large'));
        $img2_title = esc_html__($imgs['tp_hot_rated_wid_img2_tittle'], $GLOBALS['tp_trans_name'] );

        $img3_id = esc_html__( $imgs['tp_hot_rated_wid_img3'], $GLOBALS['tp_trans_name'] );
        $img3 =  esc_url_raw(wp_get_attachment_image_url($img3_id ,'large'));
        $img3_title = esc_html__($imgs['tp_hot_rated_wid_img3_tittle'], $GLOBALS['tp_trans_name'] );

        $img4_id = esc_html__( $imgs['tp_hot_rated_wid_img4'], $GLOBALS['tp_trans_name'] );
        $img4 =  esc_url_raw(wp_get_attachment_image_url($img4_id ,'large'));
        $img4_title = esc_html__($imgs['tp_hot_rated_wid_img4_tittle'], $GLOBALS['tp_trans_name'] );

        $img5_id = esc_html__( $imgs['tp_hot_rated_wid_img5'], $GLOBALS['tp_trans_name'] );
        $img5 =  esc_url_raw(wp_get_attachment_image_url($img5_id ,'large'));
        $img5_title = esc_html__($imgs['tp_hot_rated_wid_img5_tittle'], $GLOBALS['tp_trans_name'] );

        $img6_id = esc_html__( $imgs['tp_hot_rated_wid_video'], $GLOBALS['tp_trans_name'] );
        $img6 =  esc_url_raw(wp_get_attachment_url( $img6_id));
        $img6_title = esc_html__($imgs['tp_hot_rated_wid_video_tittle'], $GLOBALS['tp_trans_name'] );

        $bcg_color =  esc_html__(strtolower(get_field('tp_hot_rated_wid_bcg_color', 'widget_' . $widget_id)), $GLOBALS['tp_trans_name']);
        $back_color_value = '';
            
        if($bcg_color == 'primary'){
            $back_color_value = '--TP-primary';
        }else if($bcg_color == 'secondary'){
            $back_color_value = '--TP-secondry';
            
        }else if($bcg_color == 'trio'){
            $back_color_value = '--TP-trio';
        };

        
        if(!empty($img1_id) && !empty($img2_id) && !empty($img3_id) && !empty($img4_id) && !empty($img5_id) && !empty($img6_id)){

        ?>  



        
            <section style="background-color:var(<?php echo $back_color_value ?>)" class="TP_grid-6Items">
                <div class="top">
                    <h2 class="grid_hea_a heading_huge" ><?php echo $tittle ?></h2>
                    <h3 class="grid_hea_a heading_small"><?php echo $para; ?></h3>
                </div>

                <div class="items">

                    <div class="item item1">
                        <div style="background-image: url(<?php echo $img1 ?>);" class="img img1">&nbsp;</div>
                        <h4 class="heading_small"><?php echo $img1_title ?></h4>
                    </div>

                    <div class="item item2">
                        <div style="background-image: url(<?php echo $img2 ?>);" class="img img2">&nbsp;</div>
                        <h4 class="heading_small"><?php echo $img2_title ?></h4>
                    </div>

                    <div class="item item3">
                        <div class="img img3">
                            <video muted autoplay loop>
                                <source src="<?php echo $img6 ?>" type="video/mp4">
                            </video>
                        </div>
                        <h4 class="heading_small"><?php echo $img6_title ?></h4>
                    </div>

                    <div class="item item4">
                        <div style="background-image: url(<?php echo $img4 ?>);" class="img img4">&nbsp;</div>
                        <h4 class="heading_small"><?php echo $img4_title ?></h4>
                    </div>

                    <div  class="item item5">
                        <div style="background-image: url(<?php echo $img5 ?>);" class="img img5">&nbsp;</div>
                        <h4 class="heading_small"><?php echo $img5_title ?></h4>
                    </div>

                    <div class="item item6">
                        <div style="background-image: url(<?php echo $img3 ?>);" class="img img6">&nbsp;</div>
                        <h4 class="heading_small"><?php echo $img3_title ?></h4>
                    </div>
                </div>
                <script>
                    ScrollOut({targets: '.grid_hea_a, .item1,.item2,.item3,.item4,.item5,.item6'})
                </script>

            </section>

        <?php
        }
        }
        

    // Class end
};

