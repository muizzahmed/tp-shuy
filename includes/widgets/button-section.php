<?php

class TP_button_sec extends WP_Widget{
    public function __construct(){
        parent:: __construct(
            'tp_button_sec',
            esc_html__('Message Layout', $GLOBALS['tp_trans_name']),
            array(
                'description' => esc_html__( 'Message layout for home page!', $GLOBALS['tp_trans_name'] )
                )
            );
            
            // Public costruct end
        }

        ////////////////////////////////////////////// Widget area
        
        public function form($instance) { }

    ////////////////////////////////////////////////////// Frontend
    public function widget($args,$instance) {

        $widget_id = $this->id;
        $tittle = esc_html__(get_field('tp_msg_wid_tittle', 'widget_' . $widget_id), $GLOBALS['tp_trans_name'] );
        $bcg_img = esc_html__(get_field('tp_msg_wid_bcg_img', 'widget_' . $widget_id), $GLOBALS['tp_trans_name'] );
        $url = esc_url_raw( get_field('tp_msg_wid_url', 'widget_' . $widget_id));
        $url_text = esc_html__(get_field('tp_msg_wid_url_tittle', 'widget_' . $widget_id), $GLOBALS['tp_trans_name'] );
        $bcg_img_url = esc_url_raw( wp_get_attachment_image_url($bcg_img, 'full'));


        ?>  

            <section style="background-image: linear-gradient(#0009,#0009), url(<?php echo $bcg_img_url; ?>)" class="button_section">
                <div>
                    <h1 class="heading_big color_white text_center weight_small"><?php echo $tittle; ?></h1>
                </div>
                <?php if(empty($url)){ ?>
                    <button class="heading_small TP_book color_white"><?php echo $url_text; ?></button>
                <?php }else{ ?>
                    <a href="<?php echo $url ?>" style="text-decoration:none;" class="heading_small tp_padding_s tp_back_color_prim color_white"><?php echo $url_text; ?></a>

                <?php } ?>
                <script>
                    ScrollOut({targets: '.button_section' });
                </script>

            </section>
            
        <?php

        }
        
  
    // Class end
};

