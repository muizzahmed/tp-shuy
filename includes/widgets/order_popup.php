<?php

class TP_order_popup extends WP_Widget{
    public function __construct(){
        parent:: __construct(
            'tp_order_popup',
            esc_html__('Order Popup', $GLOBALS['tp_trans_name']),
            array(
                'description' => esc_html__( 'Order Popup for Home Page!', $GLOBALS['tp_trans_name'] )
                )
            );
            
            // Public costruct end
        }

        ////////////////////////////////////////////// Widget area
        
        public function form($instance) {    }

    ////////////////////////////////////////////////////// Frontend
    public function widget($args,$instance) {
        $widget_id = $this->id;

        $tittle = esc_html__(get_field('tp_order_popup_wid_tittle', 'widget_' . $widget_id), $GLOBALS['tp_trans_name'] );
        
        $name1 = esc_html__(get_field('tp_order_popup_wid_name1', 'widget_' . $widget_id), $GLOBALS['tp_trans_name'] );
        $url1 = esc_html__(get_field('tp_order_popup_wid_url1', 'widget_' . $widget_id), $GLOBALS['tp_trans_name'] );
        $hex1 = esc_html__(get_field('tp_order_popup_wid_color1', 'widget_' . $widget_id), $GLOBALS['tp_trans_name'] );
        
        
        $name2 = esc_html__(get_field('tp_order_popup_wid_name2', 'widget_' . $widget_id), $GLOBALS['tp_trans_name'] );
        $url2 = esc_html__(get_field('tp_order_popup_wid_url2', 'widget_' . $widget_id), $GLOBALS['tp_trans_name'] );
        $hex2 = esc_html__(get_field('tp_order_popup_wid_color2', 'widget_' . $widget_id), $GLOBALS['tp_trans_name'] );
        
        
        $name3 = esc_html__(get_field('tp_order_popup_wid_name3', 'widget_' . $widget_id), $GLOBALS['tp_trans_name'] );
        $url3 = esc_html__(get_field('tp_order_popup_wid_url3', 'widget_' . $widget_id), $GLOBALS['tp_trans_name'] );
        $hex3 = esc_html__(get_field('tp_order_popup_wid_color3', 'widget_' . $widget_id), $GLOBALS['tp_trans_name'] );
        
        
        $name4 = esc_html__(get_field('tp_order_popup_wid_name4', 'widget_' . $widget_id), $GLOBALS['tp_trans_name'] );
        $url4 = esc_html__(get_field('tp_order_popup_wid_url4', 'widget_' . $widget_id), $GLOBALS['tp_trans_name'] );
        $hex4 = esc_html__(get_field('tp_order_popup_wid_color4', 'widget_' . $widget_id), $GLOBALS['tp_trans_name'] );
        
        $name5 = esc_html__(get_field('tp_order_popup_wid_name5', 'widget_' . $widget_id), $GLOBALS['tp_trans_name'] );
        $url5 = esc_html__(get_field('tp_order_popup_wid_url5', 'widget_' . $widget_id), $GLOBALS['tp_trans_name'] );
        $hex5 = esc_html__(get_field('tp_order_popup_wid_color5', 'widget_' . $widget_id), $GLOBALS['tp_trans_name'] );
        

        ?>  

        <section class="themesPlatform_order">
            <button class="tp_order_cancel_button">
                <div>&nbsp;</div>
                <div>&nbsp;</div>
            </button>
            <div class="layout order_popup_jvs">
                <div class="top">
                    <h2 class="heading_huge1 text_center"><?php echo $tittle; ?></h2>
                </div>

                <div class="buttons">

                    <?php if(!empty($name1) && !empty($url1)){
                    ?> <a style="background-color: <?php echo $hex1 ?>" class=" color_white heading_big" href="<?php echo $url1 ?>"><?php echo $name1 ?></a>
                    <?php } ?>

                    <?php if(!empty($name2) && !empty($url2)){
                    ?> <a style="background-color: <?php echo $hex2 ?>" class=" color_white heading_big" href="<?php echo $url2 ?>"><?php echo $name2 ?></a>
                    <?php } ?>

                    <?php if(!empty($name3) && !empty($url3)){
                    ?> <a style="background-color: <?php echo $hex3 ?>" class=" color_white heading_big" href="<?php echo $url3 ?>"><?php echo $name3 ?></a>
                    <?php } ?>

                    <?php if(!empty($name4) && !empty($url4)){
                    ?> <a style="background-color: <?php echo $hex4 ?>" class=" color_white heading_big" href="<?php echo $url4 ?>"><?php echo $name4 ?></a>
                    <?php } ?>

                    <?php if(!empty($name5) && !empty($url5)){
                    ?> <a style="background-color: <?php echo $hex5 ?>" class=" color_white heading_big" href="<?php echo $url5 ?>"><?php echo $name5 ?></a>
                    <?php } ?>

                </div>
            </div>
        </section>
            
        <?php

        }


    // Class end
};

