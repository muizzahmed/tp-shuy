<?php

class TP_grid_images extends WP_Widget{
    public function __construct(){
        parent:: __construct(
            $GLOBALS['tp_trans_name'] . '_layout_one',
            esc_html__('Layout 1',$GLOBALS['tp_trans_name']),
            array(
                'description' => esc_html__( 'Layout 1 for home page',$GLOBALS['tp_trans_name'] )
                )
            );
            
            // Public costruct end
        }
        public function form($instance) {}

    ////////////////////////////////////////////////////// Frontend
    public function widget($args,$instance) {

        $widget_id  = $this->id;

        $title = esc_html__(get_field('tp_l1_wid_top_tittle', 'widget_' . $widget_id), $GLOBALS['tp_trans_name'] );
        $para = esc_html__(get_field('tp_l1_wid_paragraph', 'widget_' . $widget_id), $GLOBALS['tp_trans_name'] );

        $imgs = get_field('tp_l1_wid_images', 'widget_' . $widget_id);
        //////////////// IMGS
        $img_one = $imgs['tp_l1_wid_image1'];
        $img_one_url = esc_url_raw(wp_get_attachment_image_url($img_one ,'large'));

        $img_two = $imgs['tp_l1_wid_image2'];
        $img_two_url = esc_url_raw(wp_get_attachment_image_url($img_two ,'large'));

        $img_three = $imgs['tp_l1_wid_image3'];
        $img_three_url = esc_url_raw(wp_get_attachment_image_url($img_three ,'large'));

        $img_four = $imgs['tp_l1_wid_image4'];
        $img_four_url = esc_url_raw(wp_get_attachment_image_url($img_four ,'large'));

        $img_five = $imgs['tp_l1_wid_image5'];
        $img_five_url = esc_url_raw(wp_get_attachment_image_url($img_five ,'large'));

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

        <section style="background-color:var(<?php echo $back_color_value ?>)" class="section_grid-images">
            <div>
                <!-- <div class="bcg">&nbsp;</div> -->
                <h2 class="heading_huge weight_normal"><?php echo $title ?></h2>
                <p class="heading_small"><?php echo $para ?></p>
            </div>

            <div class="grid_imgs_a">
                <div style='background-image: url(<?php echo $img_one_url ?>);' class="img img1">&nbsp;</div>
                <div style='background-image: url(<?php echo $img_two_url ?>);' class="img img2">&nbsp;</div>
                <div style='background-image: url(<?php echo $img_three_url ?>);' class="img img3">&nbsp;</div>
                <div style='background-image: url(<?php echo $img_four_url ?>);' class="img img4">&nbsp;</div>
                <div style='background-image: url(<?php echo $img_five_url ?>);' class="img img5">&nbsp;</div>
            </div>

            <script>
                ScrollOut({targets: '.grid_imgs_a,h2,p'})
            </script>
        </section>

        <?php

        }
    // Class end
};