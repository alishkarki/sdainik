<?php
/* Replacing the parent theme widget */

/**
 * Custom columns of category with various options
 */
if ( ! class_exists( 'esn_three_category_widget_news' ) ) {
    /**
     * Class for adding widget
     *
     * @package Acme Themes
     * @subpackage supermag_posts_col_new
     * @since 1.0.0
     */
	class esn_three_category_widget_news extends WP_Widget {
	  /**
	  * To create the example widget all four methods will be 
	  * nested inside this single instance of the WP_Widget class.
	  **/
		public function __construct() {
			$widget_options = array( 
			  'classname' => 'esn_three_category_widget_news',
			  'description' => 'This widget display the news from three category!',
			);
			parent::__construct( 'esn_three_category_widget_news', 'Three Category News Widget', $widget_options );
		}
		
		/* widget function displays the widget in the front end */
		public function widget( $args, $instance ) {
		  $title1 = ! empty( $instance['title1'] ) ? $instance['title1'] : '';
		  $title2 = ! empty( $instance['title2'] ) ? $instance['title2'] : '';
		  $title3 = ! empty( $instance['title3'] ) ? $instance['title3'] : '';
		  $supermag_selected_cat1 = esc_attr( $instance['supermag_cat1'] );
		  $supermag_selected_cat2 = esc_attr( $instance['supermag_cat2'] );
		  $supermag_selected_cat3 = esc_attr( $instance['supermag_cat3'] );
		  
			if( $supermag_selected_cat1 != -1 ){
	            $sticky1 = get_option( 'sticky_posts' );
				$supermag_cat_post_args1 = array(
					'posts_per_page'      => 6,
					'cat'				  => $supermag_selected_cat1,
					'no_found_rows'       => true,
					'post_status'         => 'publish',
					'ignore_sticky_posts' => true,
					'post__not_in' => $sticky1
				);
			}

			if( $supermag_selected_cat2 != -1 ){
	            $sticky2 = get_option( 'sticky_posts' );
				$supermag_cat_post_args2 = array(
					'posts_per_page'      => 6,
					'cat'				  => $supermag_selected_cat2,
					'no_found_rows'       => true,
					'post_status'         => 'publish',
					'ignore_sticky_posts' => true,
					'post__not_in' => $sticky2
				);
			}
			
			if( $supermag_selected_cat3 != -1 ){
	            $sticky3 = get_option( 'sticky_posts' );
				$supermag_cat_post_args3 = array(
					'posts_per_page'      => 6,
					'cat'				  => $supermag_selected_cat3,
					'no_found_rows'       => true,
					'post_status'         => 'publish',
					'ignore_sticky_posts' => true,
					'post__not_in' => $sticky3
				);
			}
			$news_query1 = new WP_Query($supermag_cat_post_args1);
			$news_query2 = new WP_Query($supermag_cat_post_args2);
			$news_query3 = new WP_Query($supermag_cat_post_args3);
			echo '<div class="main_wrapper_category_widget">';
				if ($news_query1->have_posts()){
					$count_number = 1;
						echo '<div class="home_category_widget_news">';
							echo '<div class="news-category-highlight"><span>'.$title1.'</span></div>';	
							echo '<div class="post_main_cat_wrapper">';
								while ($news_query1->have_posts()): $news_query1->the_post();
									if ($count_number <= 2){
										if (has_post_thumbnail()) {
											$image_url = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large');
										} else {
											$image_url[0] = get_template_directory_uri() . '/assets/img/no-image-660-365.png';
										}
										echo '<div class="news-cat-section">';
											echo '<div class="news-cat-section-title">';							
												the_title('<h4 class="title-big"><a href="'.get_permalink().'">','</a></h4>');					
											echo '</div>'; // end of news-cat-section-title				
											echo '<div class="img-wrap-cat">	
													<a href="'.get_permalink().'">
														<img src="'.$image_url[0].'"/>
													</a>			
											</div>';	// end of img-wrap-cat				
											$content = supermag_words_count( get_the_excerpt() ,30);
											echo '<div class="cat-news-summary">
													<a href="'.get_permalink().'">
														<p>'.esc_html( $content ).'</p>
													</a> 
											</div>';//end of cat-news-summary
											echo '</div>';//end of news-cat-section
									} else {
										echo '<div class="title_list">';
											the_title('<h4 class="title-big-cat"><a href="'.get_permalink().'">','</a></h4>');
										echo '</div>';// end of title_list 
									}
									$count_number ++;
								endwhile;	
							echo '</div>'; // end of post_main_cat_wrapper 
						echo '</div>'; // end of home_category_widget_news			
					wp_reset_postdata();
				}
				if ($news_query2->have_posts()){
					$count_number = 1;
						echo '<div class="home_category_widget_news">';
							echo '<div class="news-category-highlight"><span>'.$title2.'</span></div>';	
							echo '<div class="post_main_cat_wrapper">';
								while ($news_query2->have_posts()): $news_query2->the_post();
									if ($count_number <= 2){
										if (has_post_thumbnail()) {
											$image_url = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large');
										} else {
											$image_url[0] = get_template_directory_uri() . '/assets/img/no-image-660-365.png';
										}
										echo '<div class="news-cat-section">';
											echo '<div class="news-cat-section-title">';							
												the_title('<h4 class="title-big"><a href="'.get_permalink().'">','</a></h4>');					
											echo '</div>'; // end of news-cat-section-title
											echo '<div class="img-wrap-cat">	
													<a href="'.get_permalink().'">
														<img src="'.$image_url[0].'"/>
													</a>			
											</div>';	// end of img-wrap-cat				
											$content = supermag_words_count( get_the_excerpt() ,30);
											echo '<div class="cat-news-summary">
													<a href="'.get_permalink().'">
														<p>'.esc_html( $content ).'</p>
													</a> 
											</div>';//end of cat-news-summary
											echo '</div>';//end of news-cat-section
									} else {
										echo '<div class="title_list">';
											the_title('<h4 class="title-big-cat"><a href="'.get_permalink().'">','</a></h4>');
										echo '</div>';// end of title_list 
									}
									$count_number ++;
								endwhile;	
							echo '</div>'; // end of post_main_cat_wrapper 
						echo '</div>'; // end of home_category_widget_news				
					wp_reset_postdata();
				}
				if ($news_query3->have_posts()){
					$count_number = 1;
						echo '<div class="home_category_widget_news">';
							echo '<div class="news-category-highlight"><span>'.$title3.'</span></div>';	
							echo '<div class="post_main_cat_wrapper">';
								while ($news_query3->have_posts()): $news_query3->the_post();
									if ($count_number <= 2){
										if (has_post_thumbnail()) {
											$image_url = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large');
										} else {
											$image_url[0] = get_template_directory_uri() . '/assets/img/no-image-660-365.png';
										}
										echo '<div class="news-cat-section">';
											echo '<div class="news-cat-section-title">';							
												the_title('<h4 class="title-big"><a href="'.get_permalink().'">','</a></h4>');					
											echo '</div>'; // end of news-cat-section-title						
											echo '<div class="img-wrap-cat">	
													<a href="'.get_permalink().'">
														<img src="'.$image_url[0].'"/>
													</a>			
											</div>';	// end of img-wrap-cat				
											$content = supermag_words_count( get_the_excerpt() ,30);
											echo '<div class="cat-news-summary">
													<a href="'.get_permalink().'">
														<p>'.esc_html( $content ).'</p>
													</a> 
											</div>';//end of cat-news-summary
											
										echo '</div>';//end of news-cat-section
									} else {
										echo '<div class="title_list">';
											the_title('<h4 class="title-big-cat"><a href="'.get_permalink().'">','</a></h4>');
										echo '</div>';// end of title_list 
									}
									$count_number ++;
								endwhile;	
							echo '</div>'; // end of post_main_cat_wrapper 
						echo '</div>'; // end of home_category_widget_news							
					wp_reset_postdata();
				}	
			echo '</div>'; // end of main_wrapper_category_widget
			//echo $args['after_widget'];
		}
		
		/* form function displays the widget in the back end */
		public function form( $instance ) {			
			$title1 = ! empty( $instance['title1'] ) ? $instance['title1'] : ''; //for title1
			$title2 = ! empty( $instance['title2'] ) ? $instance['title2'] : ''; //for title2
			$title3 = ! empty( $instance['title3'] ) ? $instance['title3'] : ''; //for title3
			
			$supermag_selected_cat1 = esc_attr( $instance['supermag_cat1'] ); //for category1 selection
			$supermag_selected_cat2 = esc_attr( $instance['supermag_cat2'] ); //for category2 selection
			$supermag_selected_cat3 = esc_attr( $instance['supermag_cat3'] ); //for category3 selection
			?> 
			
			
			<p>
				<label for="<?php echo $this->get_field_id( 'title1' ); ?>">Title1:</label>
				<input type="text" id="<?php echo $this->get_field_id( 'title1' ); ?>" name="<?php echo $this->get_field_name( 'title1' ); ?>" value="<?php echo esc_attr( $title1 ); ?>" />
			</p>
			
			<p>
				<label for="<?php echo $this->get_field_id('supermag_cat1'); ?>"><?php _e('Select Category1', 'supermag'); ?></label>
				<?php
				$supermag_dropown_cat1 = array(
					'show_option_none'   => __('From Recent Posts','supermag'),
					'orderby'            => 'name',
					'order'              => 'asc',
					'show_count'         => 1,
					'hide_empty'         => 1,
					'echo'               => 1,
					'selected'           => $supermag_selected_cat1,
					'hierarchical'       => 1,
					'name'               => $this->get_field_name('supermag_cat1'),
					'id'                 => $this->get_field_name('supermag_cat1'),
					'class'              => 'widefat',
					'taxonomy'           => 'category',
					'hide_if_empty'      => false,
				);
				wp_dropdown_categories($supermag_dropown_cat1);
				?>
			</p>
			
			<p>
				<label for="<?php echo $this->get_field_id( 'title2' ); ?>">Title2:</label>
				<input type="text" id="<?php echo $this->get_field_id( 'title2' ); ?>" name="<?php echo $this->get_field_name( 'title2' ); ?>" value="<?php echo esc_attr( $title2 ); ?>" />
			</p>
			
			<p>
				<label for="<?php echo $this->get_field_id('supermag_cat2'); ?>"><?php _e('Select Category2', 'supermag'); ?></label>
				<?php
				$supermag_dropown_cat2 = array(
					'show_option_none'   => __('From Recent Posts','supermag'),
					'orderby'            => 'name',
					'order'              => 'asc',
					'show_count'         => 1,
					'hide_empty'         => 1,
					'echo'               => 1,
					'selected'           => $supermag_selected_cat2,
					'hierarchical'       => 1,
					'name'               => $this->get_field_name('supermag_cat2'),
					'id'                 => $this->get_field_name('supermag_cat2'),
					'class'              => 'widefat',
					'taxonomy'           => 'category',
					'hide_if_empty'      => false,
				);
				wp_dropdown_categories($supermag_dropown_cat2);
				?>
			</p>
			
			<p>
				<label for="<?php echo $this->get_field_id( 'title3' ); ?>">Title3:</label>
				<input type="text" id="<?php echo $this->get_field_id( 'title3' ); ?>" name="<?php echo $this->get_field_name( 'title3' ); ?>" value="<?php echo esc_attr( $title3 ); ?>" />
			</p>
			
			<p>
				<label for="<?php echo $this->get_field_id('supermag_cat3'); ?>"><?php _e('Select Category3', 'supermag'); ?></label>
				<?php
				$supermag_dropown_cat3 = array(
					'show_option_none'   => __('From Recent Posts','supermag'),
					'orderby'            => 'name',
					'order'              => 'asc',
					'show_count'         => 1,
					'hide_empty'         => 1,
					'echo'               => 1,
					'selected'           => $supermag_selected_cat3,
					'hierarchical'       => 1,
					'name'               => $this->get_field_name('supermag_cat3'),
					'id'                 => $this->get_field_name('supermag_cat3'),
					'class'              => 'widefat',
					'taxonomy'           => 'category',
					'hide_if_empty'      => false,
				);
				wp_dropdown_categories($supermag_dropown_cat3);
				?>
			</p>
			
			
			<?php 
		}
		
		public function update( $new_instance, $old_instance ) {
			$instance = $old_instance;
			$instance['title1'] = ( isset( $new_instance['title1'] ) ) ? sanitize_text_field( $new_instance['title1'] ) : '';
			$instance['supermag_cat1'] = ( isset( $new_instance['supermag_cat1'] ) ) ? esc_attr( $new_instance['supermag_cat1'] ) : '';
			$instance['title2'] = ( isset( $new_instance['title2'] ) ) ? sanitize_text_field( $new_instance['title2'] ) : '';
			$instance['supermag_cat2'] = ( isset( $new_instance['supermag_cat2'] ) ) ? esc_attr( $new_instance['supermag_cat2'] ) : '';
			$instance['title3'] = ( isset( $new_instance['title3'] ) ) ? sanitize_text_field( $new_instance['title3'] ) : '';
			$instance['supermag_cat3'] = ( isset( $new_instance['supermag_cat3'] ) ) ? esc_attr( $new_instance['supermag_cat3'] ) : '';

			return $instance;
		}
	
	  
	} // class esn_three_category_widget_news ends here
}

if ( ! function_exists( 'esn_three_category_widget_news' ) ) :
    /**
     * Function to Register and load the widget
     *
     * @since 1.0.0
     *
     * @param null
     * @return void
     *
     */
    function esn_three_category_widget_news() {
        register_widget( 'esn_three_category_widget_news' );
    }
endif;
add_action( 'widgets_init', 'esn_three_category_widget_news' );