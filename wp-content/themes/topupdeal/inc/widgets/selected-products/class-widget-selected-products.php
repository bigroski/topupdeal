<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }

class Widget_Selected_Products extends WP_Widget {

	/**
     * Widget constructor.
     */
    private $options;
    private $prefix;
    function __construct() {

        $widget_ops = array( 'description' => __( 'Display the selected products in the sidebar', 'unyson' ) );
        parent::__construct( false, __( 'Selected Products', 'unyson' ), $widget_ops );
        $this->options = array(
            'title' => array(
                'type' => 'text',
                'label' => __('Widget Title', 'unyson'),
            ),
            'products'      => array(
                'type'       => 'multi-select',
                'label'      => __( 'Select Products', 'unyson' ),
                'population' => 'posts',
                'source'     => 'product',
                
            ),
            

        );
        $this->prefix = 'online_support';
    }

    function widget( $args, $instance ) {
        extract( $args );
        $params = array();

        foreach ( $instance as $key => $value ) {
            $params[ $key ] = $value;
        }

        $filepath = dirname( __FILE__ ) . '/views/widget.php';

        $instance = $params;

        if ( file_exists( $filepath ) ) {
            include( $filepath );
        }
    }

    function update( $new_instance, $old_instance ) {
        return fw_get_options_values_from_input(
            $this->options,
            FW_Request::POST(fw_html_attr_name_to_array_multi_key($this->get_field_name($this->prefix)), array())
        );
    }

    function form( $values ) {

        $prefix = $this->get_field_id($this->prefix);
        $id = 'fw-widget-options-'. $prefix;

        echo '<div class="fw-force-xs fw-theme-admin-widget-wrap" id="'. esc_attr($id) .'">';
        $this->print_widget_javascript($id);
        echo fw()->backend->render_options($this->options, $values, array(
            'id_prefix' => $prefix .'-',
            'name_prefix' => $this->get_field_name($this->prefix),
        ));
        echo '</div>';

        return $values;
    }

    private function print_widget_javascript($id) {
        ?><script type="text/javascript">
            jQuery(function($) {
                var selector = '#<?php echo esc_js($id) ?>', timeoutId;

                $(selector).on('remove', function(){ // ReInit options on html replace (on widget Save)
                    clearTimeout(timeoutId);
                    timeoutId = setTimeout(function(){ // wait a few milliseconds for html replace to finish
                        fwEvents.trigger('fw:options:init', { $elements: $(selector) });
                    }, 100);
                });
            });
        </script><?php
    }
}
