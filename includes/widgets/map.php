<?php

class TP_map extends WP_Widget{
    public function __construct(){
        parent:: __construct(
            'tp_map',
            esc_html__('Map', $GLOBALS['tp_trans_name']),
            array(
                'description' => esc_html__( 'Map for home page', $GLOBALS['tp_trans_name'] )
                )
            );
            
            // Public costruct end
        }

        ////////////////////////////////////////////// Widget area
        
        public function form($instance) {}

    ////////////////////////////////////////////////////// Frontend
    public function widget($args,$instance) {

        $widget_id = $this->id;
        $page_id = get_page_by_title('contact us');

        $tittle = esc_html__(get_field('tp_map_wid_tittle', 'widget_' . $widget_id),$GLOBALS['tp_trans_name']);
        $para = esc_html__(get_field('tp_map_wid_paragraph', 'widget_' . $widget_id),$GLOBALS['tp_trans_name']);
        $phone = esc_html__(get_field('tp_contact_number', $page_id),$GLOBALS['tp_trans_name']);
        $address = esc_html__(get_field('tp_contact_location', $page_id),$GLOBALS['tp_trans_name']);
        $email = esc_html__(get_field('tp_contact_email', $page_id),$GLOBALS['tp_trans_name']);
        $longitude = esc_html__(get_field('tp_map_wid_map_longitude', 'widget_' . $widget_id),$GLOBALS['tp_trans_name']);
        $latitude = esc_html__(get_field('tp_map_wid_map_latitude', 'widget_' . $widget_id),$GLOBALS['tp_trans_name']);
        $map_box_token = esc_html__(get_field('tp_map_wid_map_token', 'widget_' . $widget_id),$GLOBALS['tp_trans_name']);
     
        $bcg_color =  esc_html__(strtolower(get_field('tp_map_wid_bcg_color', 'widget_' . $widget_id)), $GLOBALS['tp_trans_title']);
        $back_color_value = '';
            
        if($bcg_color == 'primary'){
            $back_color_value = '--TP-primary';
        }else if($bcg_color == 'secondary'){
            $back_color_value = '--TP-secondry';
            
        }else if($bcg_color == 'trio'){
            $back_color_value = '--TP-trio';
        };

        ?>  
            <script src='https://api.mapbox.com/mapbox-gl-js/v1.11.1/mapbox-gl.js'></script>
            <link href='https://api.mapbox.com/mapbox-gl-js/v1.11.1/mapbox-gl.css' rel='stylesheet' />
 
        <section style="background-color:var(<?php echo $back_color_value ?>)" class="TP_flex-map">
            <div class="left">
                <div class='map_anim' id='map'>&nbsp;</div>
            </div>
            
            <div class="right">
                <div class="headings">
                    <h2 class="h_anim heading_huge"><?php echo $tittle ?></h2>
                    <h3 class="h_anim heading_small"><?php echo $para ?></h3>
                </div>
                <div class="details items_anim">
                    <div class="item">
                        <svg>
                            <use xlink:href="<?php echo get_template_directory_uri(  ) ?>/files/imgs/sprite.svg#pin"></use>
                        </svg>
                        <h4 class="heading_small"><?php echo $address ?></h4>
                    </div>
                    <div class="item">
                        <svg>
                            <use xlink:href="<?php echo get_template_directory_uri(  ) ?>/files/imgs/sprite.svg#phone"></use>
                        </svg>
                        <h4 class="heading_small"><?php echo $phone ?></h4>
                    </div>

                    <div class="item">
                        <svg>
                            <use xlink:href="<?php echo get_template_directory_uri(  ) ?>/files/imgs/sprite.svg#message"></use>
                        </svg>
                        <h4 class="heading_small"><?php echo  $email; ?></h4>
                    </div>

                </div>
            </div>
            <script>ScrollOut({
                targets: '.h_anim, .items_anim,.map_anim'
                });
            </script>
        </section>

        <script>
            mapboxgl.accessToken = '<?php echo $map_box_token; ?>';
            var map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/streets-v11', // stylesheet location
            center: [<?php echo $longitude ?>, <?php echo $latitude ?>], // starting position [lng, lat]
            zoom: 9 // starting zoom
            });
        </script>

        <?php

        }
 
    // Class end
};

