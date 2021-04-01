<?php


class TP_flex_two extends WP_Widget{
    public function __construct(){
        parent:: __construct(
            'tp_flex_two',
            esc_html__('Layout 2', $GLOBALS['tp_trans_name']),
            array(
                'description' => esc_html__( 'Layout 2 for home page',$GLOBALS['tp_trans_name'])
                )
            );
        }
        public function form($instance) {}

    ////////////////////////////////////////////////////// Frontend
    public function widget($args,$instance) {

        $widget_id = $this->id;
        $title_small = esc_html__(get_field('tp_l2_wid_small_tittle', 'widget_' . $widget_id), $GLOBALS['tp_trans_name'] );
        $title_big = esc_html__(get_field('tp_l2_wid_big_tittle', 'widget_' . $widget_id), $GLOBALS['tp_trans_name'] );
        $para = esc_html__(get_field('tp_l2_wid_paragraph', 'widget_' . $widget_id), $GLOBALS['tp_trans_name'] );
        $url = esc_url_raw( get_field('tp_l2_wid_url', 'widget_' . $widget_id) );
        $url_text = esc_html__(get_field('tp_l2_wid_url_tittle', 'widget_' . $widget_id), $GLOBALS['tp_trans_name'] );
        //////////////// IMGS
        $img_title = esc_html__(get_field('tp_l2_wid_img_tittle', 'widget_' . $widget_id), $GLOBALS['tp_trans_name'] );
        $img = esc_html__(get_field('tp_l2_wid_image', 'widget_' . $widget_id), $GLOBALS['tp_trans_name'] );
        $img_url = esc_url_raw( wp_get_attachment_image_url($img ,'large'));
        
        $bcg_color =  esc_html__(strtolower(get_field('tp_l2_wid_bcg_color', 'widget_' . $widget_id)), $GLOBALS['tp_trans_name']);
        $back_color_value = '';
        
        if($bcg_color == 'primary'){
            $back_color_value = '--TP-primary';
        }else if($bcg_color == 'secondary'){
            $back_color_value = '--TP-secondry';
            
        }else if($bcg_color == 'trio'){
            $back_color_value = '--TP-trio';
        };

        ?>

           
            <section style="background-color:var(<?php echo $back_color_value ?>)" class='flew-two'>
                <div>
                    <div class="flex_img_a" style='background-image: url(<?php echo $img_url ?>)'>&nbsp;
                      <h3 class="heading_normal capitalize color_white tp_back_color_prim"><?php echo $img_title ?></h3>
                    </div>
                </div>

                <div>
                    <h1 class="heading_normal"><?php echo $title_small ?></h1>
                    <h2 class="heading_huge1"><?php echo $title_big ?></h2>
                    <p class="heading_small"><?php echo $para ?></p>
                    <a class="heading_small color_primary" href="<?php echo $url; ?>"><?php echo $url_text ?></a>
                </div>
                
                <script>ScrollOut({
                    targets: '.flex_img_a,h3,h1,h2,p,a'
                    })
                </script>
            </section>

        <?php

        }
        
    // Class end
};

