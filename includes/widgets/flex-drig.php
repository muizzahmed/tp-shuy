<?php


class TP_flex_drig extends WP_Widget{
    public function __construct(){
        parent:: __construct(
            'tp_flex_drig',
            esc_html__('Layout 4', $GLOBALS['tp_trans_name']),
            array(
                'description' => esc_html__( 'Layout 4 for home page', $GLOBALS['tp_trans_name'] )
                )
            );
            
            // Public costruct end
        }

        ////////////////////////////////////////////// Widget area
        
        public function form($instance) {}

    ////////////////////////////////////////////////////// Frontend
    public function widget($args,$instance) {

        $widget_id = $this->id;
        $tittle = esc_html__(get_field('tp_l4_wid_tittle', 'widget_' . $widget_id), $GLOBALS['tp_trans_name'] );
        $para = esc_html__(get_field('tp_l4_wid_paragraph', 'widget_' . $widget_id), $GLOBALS['tp_trans_name'] );
        $imgs = get_field('tp_l4_wid_images', 'widget_' . $widget_id) ;

        $img_id1 = $imgs['tp_l4_wid_image1'];
        $img_id2 = $imgs['tp_l4_wid_image2'];
       
     
        $img1 = esc_url_raw(wp_get_attachment_image_url($img_id1 ,'large'));
        $img2 =  esc_url_raw( wp_get_attachment_image_url($img_id2 ,'large'));

        $bcg_color =  esc_html__(strtolower(get_field('tp_l4_wid_bcg_color', 'widget_' . $widget_id)), $GLOBALS['tp_trans_name']);
        $back_color_value = '';
            
        if($bcg_color == 'primary'){
            $back_color_value = '--TP-primary';
        }else if($bcg_color == 'secondary'){
            $back_color_value = '--TP-secondry';
            
        }else if($bcg_color == 'trio'){
            $back_color_value = '--TP-trio';
        };

        ?>  


            <section style="background-color:var(<?php echo $back_color_value ?>)" class="TP_flex-two-drig">

                <div class="layout">
                    <div class="left">
                        <div class="img_anim" style="background-image: url(<?php echo $img1 ?>)" >&nbsp;</div>
                        <h3 class="h_anim heading_huge weight_small"><?php echo $tittle  ?></h3>
                    </div>
                    
                    <div class="right">
                        <div class="img_anim"  style="background-image: url(<?php echo $img2 ?>)">&nbsp;</div>
                        <h3 class="h_anim heading_small"><?php echo $para ?></h3>
                    </div>
                </div>
                <script>ScrollOut({
                    targets: '.img_anim, .h_anim'
                    });
                </script>

            </section>

        <?php

        }
        
    // Class end
};

