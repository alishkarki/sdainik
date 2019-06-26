<?php
/**
 * Custom columns of category with various options
 *
 * @package Acme Themes
 * @subpackage SuperMag
 */
if ( ! class_exists( 'supermag_posts_col_breaker' ) ) {
    /**
     * Class for adding widget
     *
     * @package Acme Themes
     * @subpackage supermag_posts_col_breaker
     * @since 1.0.0
     */
    class supermag_posts_col_breaker extends WP_Widget {

        /*defaults values for fields*/
        private $defaults = array(
            'supermag_cat_title'            => '',
            'supermag_cat'                  => 0,
            'supermag_enable_first_featured'=> 0,
            'supermag_post_col_layout'      => 0,
            'supermag_post_col_first_featured_image_layout' => 'large',
            'supermag_post_col_normal_image_layout' => 'large'
        );

        function __construct() {
            parent::__construct(
            /*Base ID of your widget*/
                'supermag_posts_col_breaker',
                /*Widget name will appear in UI*/
                __('Breaker Column', 'supermag'),
                /*Widget description*/
                array( 'description' => __( 'Show breaker post in selected category', 'supermag' ), )
            );
        }

        /*Widget Backend*/
        public function form( $instance ) {
            /*defaults values*/
            $instance = wp_parse_args( (array) $instance, $this->defaults );

            /*selected cat*/
            $supermag_selected_cat = esc_attr( $instance['supermag_cat'] );
            /*Main title*/
            $supermag_col_posts_title = esc_attr( $instance['supermag_cat_title'] );
            if( empty( $supermag_col_posts_title ) && 0 != $supermag_selected_cat ){
                $supermag_col_posts_title = get_cat_name($supermag_selected_cat);
            }

            
            ?>
            <p>
                <label for="<?php echo $this->get_field_id( 'supermag_cat_title' ); ?>"><?php _e( 'Title:', 'supermag' ); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'supermag_cat_title' ); ?>" name="<?php echo $this->get_field_name( 'supermag_cat_title' ); ?>" type="text" value="<?php echo $supermag_col_posts_title; ?>" />
            </p>
            <p>
                <label for="<?php echo $this->get_field_id('supermag_cat'); ?>"><?php _e('Select Category', 'supermag'); ?></label>
                <?php
                $supermag_dropown_cat = array(
                    'show_option_none'   => __('From Recent Posts','supermag'),
                    'orderby'            => 'name',
                    'order'              => 'asc',
                    'show_count'         => 1,
                    'hide_empty'         => 1,
                    'echo'               => 1,
                    'selected'           => $supermag_selected_cat,
                    'hierarchical'       => 1,
                    'name'               => $this->get_field_name('supermag_cat'),
                    'id'                 => $this->get_field_name('supermag_cat'),
                    'class'              => 'widefat',
                    'taxonomy'           => 'category',
                    'hide_if_empty'      => false,
                );
                wp_dropdown_categories($supermag_dropown_cat);
                ?>
            </p>
            
            <p>
                <small><?php _e( 'Note: Some of the features only work in "Home main content area" due to minimum width in other areas.' ,'supermag'); ?></small>
            </p>
            <?php
        }

        /**
         * Function to Updating widget replacing old instances with new
         *
         * @access public
         * @since 1.0.0
         *
         * @param array $new_instance new arrays value
         * @param array $old_instance old arrays value
         * @return array
         *
         */
        public function update( $new_instance, $old_instance ) {
            $instance = array();
            $instance['supermag_cat_title'] = ( isset( $new_instance['supermag_cat_title'] ) ) ? sanitize_text_field( $new_instance['supermag_cat_title'] ) : '';
            $instance['supermag_cat'] = ( isset( $new_instance['supermag_cat'] ) ) ? esc_attr( $new_instance['supermag_cat'] ) : '';
            
            return $instance;
        }
        /**
         * Function to Creating widget front-end. This is where the action happens
         *
         * @access public
         * @since 1.0.0
         *
         * @param array $args widget setting
         * @param array $instance saved values
         * @return void
         *
         */
        public function widget($args, $instance) {
            if( isset( $args['id'] ) ){
                $supermag_sidebar_id = $args['id'];
            }
            else{
                $supermag_sidebar_id = 'supermag-home';
            }
            /*defaults values*/
            $instance = wp_parse_args( (array) $instance, $this->defaults );
            /*selected cat*/
            $supermag_selected_cat = esc_attr( $instance['supermag_cat'] );

            /*Main title*/
            $supermag_col_posts_title = !empty( $instance['supermag_cat_title'] ) ? esc_attr( $instance['supermag_cat_title'] ) : get_cat_name($supermag_selected_cat);
            $supermag_col_posts_title = apply_filters( 'widget_title', $supermag_col_posts_title, $instance, $this->id_base );

            
            
            
            /**
             * Filter the arguments for the Recent Posts widget.
             *
             * @since 1.0.0
             *
             * @see WP_Query
             *
             */
            $sticky = get_option( 'sticky_posts' );
            $supermag_cat_post_args = array(
                'posts_per_page'      => $supermag_number,
                'no_found_rows'       => true,
                'post_status'         => 'publish',
                'ignore_sticky_posts' => true,
                'post__not_in' => $sticky
            );
            if( -1 != $supermag_selected_cat ){
                $supermag_cat_post_args['cat'] = $supermag_selected_cat;
            }
            $supermag_featured_query = new WP_Query($supermag_cat_post_args);

            if ($supermag_featured_query->have_posts()) :

                echo $args['before_widget'];
                if ( !empty( $supermag_col_posts_title ) ){
	                if( -1 != $supermag_selected_cat ){
		                echo "<div class='at-cat-color-wrap-".$supermag_selected_cat."'>";
	                }
                    echo $args['before_title'] . $supermag_col_posts_title . $args['after_title'];

	                if( -1 != $supermag_selected_cat ){
		                echo "</div>";
	                }
                }
                $supermag_post_col_layout_class ='';
                if( 1 == $supermag_post_col_layout ){
                    $supermag_post_col_layout_class = 'sm-col-post-type-2';
                }
                ?>
                <?php echo $args['after_widget'];
                echo "<div class='clearfix'></div>";
                // Reset the global $the_post as this query will have stomped on it
                wp_reset_postdata();
            endif;
        }
    } // Class supermag_posts_col_breaker ends here
}

if ( ! function_exists( 'supermag_posts_col_breaker' ) ) :
    /**
     * Function to Register and load the widget
     *
     * @since 1.0.0
     *
     * @param null
     * @return void
     *
     */
    function supermag_posts_col_breaker() {
        register_widget( 'supermag_posts_col_breaker' );
    }
endif;
add_action( 'widgets_init', 'supermag_posts_col_breaker' );
