<?php

class TP_table_book extends WP_Widget{
    public function __construct(){
        parent:: __construct(
            'tp_book_table_id',
            esc_html__('Book Table Popup', $GLOBALS['tp_trans_name']),
            array(
                'description' => esc_html__( 'Book Table Popup for Home Page!', $GLOBALS['tp_trans_name'] )
                )
            );
            
            // Public costruct end
        }

        ////////////////////////////////////////////// Widget area
        
        public function form($instance) {}

    ////////////////////////////////////////////////////// Frontend
    public function widget($args,$instance) {

        $widget_id = $this->id;
        $tittle = esc_html__(get_field('tp_book_table_wid_tittle', 'widget_' . $widget_id), $GLOBALS['tp_trans_name'] );
        $para = esc_html__(get_field('tp_book_table_wid_para', 'widget_' . $widget_id), $GLOBALS['tp_trans_name'] );
        $book_table_id = esc_html__(get_field('tp_book_table_wid_ot_id', 'widget_' . $widget_id), $GLOBALS['tp_trans_name'] );
       
        $openTable_script = "<script type='text/javascript' src='//www.opentable.com/widget/reservation/loader?rid=".$book_table_id."&type=standard&theme=tall&iframe=true&domain=com&lang=en-US&newtab=false&ot_source=Restaurant%20website'></script>";


        ?>  

            <section class="themesPlatform_book">
                <button class="tp_book_cancel_button">
                    <div>&nbsp;</div>
                    <div>&nbsp;</div>
                </button>
                <div class="layout book_popup_jvs">
                    <div class="top">
                        <h2 class="heading_huge1 color_white"><?php echo $tittle; ?></h2>
                        <p class="heading_normal weight_small color_white"><?php echo $para; ?></p>
                    </div>

                    <div class="opentable">
                        <?php echo $openTable_script; ?>
                    </div>
                </div>
                
            </section>
            
        <?php

        }
        
    // Class end
};

