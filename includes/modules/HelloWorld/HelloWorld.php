<?php

class ETL_HelloWorld extends ET_Builder_Module {

    public $slug       = 'etl_hello_world';
    public $vb_support = 'on';

    protected $module_credits = array(
        'module_uri' => 'http://tilted.imagiasweb.com',
        'author'     => 'Jay Durnil',
        'author_uri' => 'http://tilted.imagiasweb.com',
    );

    public function init() {

        $this->child_slug      = 'etl_helloworld_item';
        $this->child_item_text = esc_html__( 'Image', 'et_builder' );
        $this->name = esc_html__( 'Tilted Image Scroll', 'etl-divilocal' );
    }
    public function get_advanced_fields_config() {
        return array(
            'max_width' => false,
            'fonts' => false,

        );
    }

    public function get_fields() {
        return array(

        );
    }

    public function render( $attrs, $content = null, $render_slug ) {
        return sprintf( '<script>
                                 jQuery(document).ready(function( $ ) {
                                     jQuery(".main").tiltedpage_scroll({
                                        sectionContainer: ".etl_helloworld_item",     // In case you don\'t want to use <section> tag, you can define your won CSS selector here
                                        angle: 50,                         // You can define the angle of the tilted section here. Change this to false if you want to disable the tilted effect. The default value is 50 degrees.
                                        opacity: true,                     // You can toggle the opacity effect with this option. The default value is true
                                        scale: true,                       // You can toggle the scaling effect here as well. The default value is true.
                                        outAnimation: true                 // In case you do not want the out animation, you can toggle this to false. The defaul value is true.
                                        });
                                     });
                                </script>
                                <div class="main">%1$s</div>',$this->content  );
    }
}

new ETL_HelloWorld;

class ETL_HelloWorld_Item extends ET_Builder_Module{
    public $slug = 'etl_helloworld_item';
    public $vb_support = 'on';
    public function init() {
        $this->slug            = 'etl_helloworld_item';
        $this->type            = 'child';
        $this->child_title_var = 'field_id';
        $this->name = esc_html__( 'Hello World Item', 'etl-divilocal' );
        $this->advanced_setting_title_text = esc_html__( 'New Image', 'et_builder' );
        $this->settings_text               = esc_html__( 'Image Settings', 'et_builder' );
    }
    public function get_settings_modal_toggles(){
        return array(
            'general'  => array(
                'toggles' => array(
                    'main_content' => esc_html__( 'Image', 'et_builder' ),
                ),
            ),
        );
    }
    public function get_advanced_fields_config() {
        return array(
            'background' => false,
            'filters' => false,
            'margin_padding' => false,
            'fonts' => false,
            'max_width' => false,
            'box_shadow' => array(
                'default' => array(
                    'css' => array(
                        'main' => '%%order_class%% .hello_item',
                    ),
                ),
            ),
            'borders' => array(
                'default' => array(
                    'css'      => array(
                        'main' => array(
                            'border_styles' => "%%order_class%% .hello_item",
                        ),
                    ),
                ),
            ),
        );
    }
    public function get_fields() {
        return array(
            'src' => array(
                'type'               => 'upload',
                'option_category'    => 'basic_option',
                'upload_button_text' => esc_attr__( 'Upload an image', 'et_builder' ),
                'choose_text'        => esc_attr__( 'Choose an Image', 'et_builder' ),
                'update_text'        => esc_attr__( 'Set As Image', 'et_builder' ),
                'hide_metadata'      => true,
                'affects'            => array(
                    'alt',
                    'title_text',
                ),
                'description'        => esc_html__( 'Upload your desired image, or type in the URL to the image you would like to display.', 'et_builder' ),
                'toggle_slug'        => 'main_content',
            ),
            'height' => array(
                'label'           => esc_html__( 'Height', 'simp-simple-extension' ),
                'type'            => 'text',
                'option_category' => 'basic_option',
                'description'     => esc_html__( 'Content entered here will appear inside the module.', 'simp-simple-extension' ),
                'toggle_slug'     => 'main_content',
            ),

        );
    }

    public function render( $attrs, $content = null, $render_slug ) {
        ET_Builder_Element::set_style( $render_slug, array(
                'selector'    => '%%order_class%%',
                'declaration' => sprintf(
                    'height: %1$s',
                    $this->props['height']
                )
            )
        );
        return sprintf( '<img class="tilted-image hello_item" src="%1$s" />'
            , $this->props['src']);


    }


}

new ETL_HelloWorld_Item;