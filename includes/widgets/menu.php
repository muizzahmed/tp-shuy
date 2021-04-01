<?php

include_once (dirname(__dir__, 2) . '/helpers/menu.php');
class TP_menu extends WP_Widget{
    public function __construct(){
        parent:: __construct(
            'tp_menu',
            esc_html__('Menu Layout', $GLOBALS['tp_trans_name']),
            array(
                'description' => esc_html__( 'Menu Layout for home page', $GLOBALS['tp_trans_name'] )
                )
            );
            
            // Public costruct end
        }

        ////////////////////////////////////////////// Widget area
        
        public function form($instance) { }

    ////////////////////////////////////////////////////// Frontend
    public function widget($args,$instance) {

        $widget_id = $this->id;
        $page_id = get_page_by_title('contact us');

        $tittle_small = esc_html__(get_field('tp_menu_wid_small_tittle', 'widget_' . $widget_id), $GLOBALS['tp_trans_name'] );
        $tittle_big = esc_html__(get_field('tp_menu_wid_big_tittle', 'widget_' . $widget_id), $GLOBALS['tp_trans_name'] );
        $bcg_img = esc_html__(get_field('tp_menu_wid_bcg_img', 'widget_' . $widget_id), $GLOBALS['tp_trans_name'] );
        
        $bcg_img_url = esc_url_raw(wp_get_attachment_image_url($bcg_img, 'full'));

     

        ?>  

            <section style='background-image:linear-gradient(#0009,#0009),  url(<?php echo $bcg_img_url ?>);' class="tp_menu">
                <div class="menu_header">
                    <div>
                        <h1 class="h_a heading_normal color_white"><?php echo $tittle_small ?></h1>
                        <h2 class="h_a heading_huge color_white"><?php echo $tittle_big ?></h2>

                    </div>


                    <ul class="buttons_a tp_padding_tbn tp_buttons">
                        
                       <?php $show_cat_buttons = tp_shuy_show_menu_cats('home'); 
                       ?>
                        
                    </ul>
                </div>

                <ul class="menu_products tp_menu_items tp_menu_items_home">

                    <?php tp_shuy_menu_default_items($show_cat_buttons, 'home', 4) ?>
                    
                </ul>

                <div class="bottom">
                    <a class="heading_small color_black weight_normal" href="<?php echo get_site_url() ?>/menu">View All</a>
                </div>
                
                <div class="menu_line">&nbsp;</div>
            <script>
                ScrollOut({targets: '.buttons_a,.bottom,.menu_line,.tp_menu_items,.h_a'});
            </script>
            </section>
            
        <?php

        }
};

