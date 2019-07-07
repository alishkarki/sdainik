<?php
/* Replacing the parent theme widget */

/**
 * Custom columns of category with various options
 */
if ( ! class_exists( 'esn_two_big_news_widget' ) ) {
    /**
     * Class for adding widget
     *
     * @package Acme Themes
     * @subpackage supermag_posts_col_new
     * @since 1.0.0
     */
	class esn_two_big_news_widget extends WP_Widget {
	  /**
	  * To create the example widget all four methods will be 
	  * nested inside this single instance of the WP_Widget class.
	  **/
		public function __construct() {
			$widget_options = array( 
			  'classname' => 'esn_two_big_news_widget',
			  'description' => 'This widget display the two big news and other smaller!',
			);
			parent::__construct( 'esn_two_big_news_widget', 'Two Big News Widget', $widget_options );
		}
		
		/* widget function displays the widget in the front end */
		public function widget( $args, $instance ) {
			$title = ! empty( $instance['title'] ) ? $instance['title'] : '';
			$title1 = ! empty( $instance['title1'] ) ? $instance['title1'] : '';
			$supermag_selected_cat = esc_attr( $instance['supermag_cat'] );
		  
			if( $supermag_selected_cat != -1 ){
	            $sticky = get_option( 'sticky_posts' );
				$supermag_cat_post_args = array(
					'posts_per_page'      => 7,
					'cat'				  => $supermag_selected_cat,
					'no_found_rows'       => true,
					'post_status'         => 'publish',
					'ignore_sticky_posts' => true,
					'post__not_in' => $sticky
				);
			}						
			$news_query = new WP_Query($supermag_cat_post_args);
			echo '<div class="main_wrapper_for_two_big_and_list_widget">';
				if ($news_query->have_posts()){
					$count_number = 1;
					echo '<div class="home_two_news_widget_wrapper">';
						echo '<div class="news-highlight"><span>'.$title.'</span></div>';		
						echo '<div class="main_two_news_list_wrapper">';
							echo '<div class="main_two_news_wrapper">';	
							while ($news_query->have_posts()): $news_query->the_post();
								if ($count_number<=2){
									echo '<div class="two_news_wrapper">';	
										if (has_post_thumbnail()) { 
											$image_url = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large');
										} else {
											$image_url[0] = get_template_directory_uri() . '/assets/img/no-image-660-365.png';
										}
										echo '<div class="news-big-section">';									
											the_title('<h4 class="title-big"><a href="'.get_permalink().'">','</a></h4>');					
											echo '<div class="img-wrap">	
													<a href="'.get_permalink().'">
														<img src="'.$image_url[0].'"/>
													</a>			
											</div>';					
										echo '</div>';//end of news-big-section
										$count_number ++;	
									echo '</div>';//end of two_news_wrapper
									if($count_number == 3){ echo '</div><div class="other_post_main_wrapper">'; } //main_two_news_wrapper
								}
								else{
										if (has_post_thumbnail()) {
											$image_url = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large');
										} else {
											$image_url[0] = get_template_directory_uri() . '/assets/img/no-image-660-365.png';
										}
										echo '<div class="news-other-section">';
											echo '<div class="img-wrap">	
													<a href="'.get_permalink().'">
														<img src="'.$image_url[0].'"/>
													</a>			
											</div>';							
											the_title('<h4 class="title-big"><a href="'.get_permalink().'">','</a></h4>');										
										echo '</div>';//end of news_other_section
										$count_number ++;
								}
							endwhile;
									echo '</div>';// end of other_post_main_wrapper	
						echo '</div>'; // end of main_two_news_list_wrapper 
						
					echo '</div>'; // end of home_two_news_widget_wrapper			
					wp_reset_postdata();
				} // close if
				
				//if( $supermag_selected_cat != -1 ){
					$sticky = get_option( 'sticky_posts' );
					$supermag_cat_post_args = array(
						'posts_per_page'      => 5,
						'no_found_rows'       => true,
						'order' => 'ASC',
						'post_status'         => 'publish',
						'ignore_sticky_posts' => true,
						'post__not_in' => $sticky
					);
				//}						
				$news_query = new WP_Query($supermag_cat_post_args);
				if ($news_query->have_posts()){
					echo '<div class="two_big_side_post">';
						echo '<div class="news-highlight"><span>'.$title1.'</span></div>';
						while ($news_query->have_posts()): $news_query->the_post();
							if (has_post_thumbnail()) {
								$image_url = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large');
							} else {
								$image_url[0] = get_template_directory_uri() . '/assets/img/no-image-660-365.png';
							}
							echo '<div class="two_big_post_wrapper">';
								echo '<div class="img-wrap">	
									<a href="'.get_permalink().'">
										<img src="'.$image_url[0].'"/>
									</a>			
								</div>';	
								echo '<div class="title_wrapper">';							
									the_title('<h4 class="title-big"><a href="'.get_permalink().'">','</a></h4>');					
								echo '</div>'; // end of title_wrapper
							echo '</div>'; //end of two_big_post_wrapper	
						endwhile;
					echo '</div>'; // end of two_big_side_post			
					wp_reset_postdata();
				}
			
			echo '</div>';//end of main_wrapper_for_two_big_and_list_widget
			//echo $args['after_widget'];
		}
		
		/* form function displays the widget in the back end */
		public function form( $instance ) {			
			$title = ! empty( $instance['title'] ) ? $instance['title'] : ''; //for title
			$title1 = ! empty( $instance['title1'] ) ? $instance['title1'] : ''; //for title1
			$supermag_selected_cat = esc_attr( $instance['supermag_cat'] ); //for category selection
			?> 
			<p>
				<label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label>
				<input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $title ); ?>" />
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
				<label for="<?php echo $this->get_field_id( 'title1' ); ?>">Title for recent post:</label>
				<input type="text" id="<?php echo $this->get_field_id( 'title1' ); ?>" name="<?php echo $this->get_field_name( 'title1' ); ?>" value="<?php echo esc_attr( $title1 ); ?>" />
			</p>	
			<?php 
		}
		
		public function update( $new_instance, $old_instance ) {
            $instance = $old_instance;
            $instance['title'] = ( isset( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
			$instance['title1'] = ( isset( $new_instance['title1'] ) ) ? sanitize_text_field( $new_instance['title1'] ) : '';
            $instance['supermag_cat'] = ( isset( $new_instance['supermag_cat'] ) ) ? esc_attr( $new_instance['supermag_cat'] ) : '';

            return $instance;
        }
	
	  
	} // class esn_two_big_news_widget ends here
}

if ( ! function_exists( 'esn_two_big_news_widget' ) ) :
    /**
     * Function to Register and load the widget
     *
     * @since 1.0.0
     *
     * @param null
     * @return void
     *
     */
    function esn_two_big_news_widget() {
        register_widget( 'esn_two_big_news_widget' );
    }
endif;
add_action( 'widgets_init', 'esn_two_big_news_widget' );