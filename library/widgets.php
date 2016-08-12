<?php
// Creating the widget
class newsletter_widget extends WP_Widget {

	function __construct() {
		parent::__construct(
		// Base ID of your widget
		'newsletter_widget',

		// Widget name will appear in UI
		__('Latest PCHC Newsletter', 'newsletter_widget_domain'),

		// Widget description
		array( 'description' => __( 'Displays a link to download the latest newsletter.', 'newsletter_widget_domain' ), )
		);
	}

	// Creating widget front-end
	// This is where the action happens
	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] );
		// before and after widget arguments are defined by themes
		echo $args['before_widget'];
		if ( ! empty( $title ) ) {
			echo $args['before_title'] . $title . $args['after_title'];
		}

		/**
		 * The WordPress Query class.
		 * @link http://codex.wordpress.org/Function_Reference/WP_Query
		 *
		 */
		$news_args = array(
			//Category Parameters
			'cat'              => 12,

			//Type & Status Parameters
			'post_type'   => 'post',
			'post_status' => 'publish',

			//Order & Orderby Parameters
			'order'               => 'DESC',
			'orderby'             => 'date',

			//Pagination Parameters
			'posts_per_page'         => 1,
			//'posts_per_archive_page' => 1,
			//'nopaging'               => false,
		);

		$news_query = new WP_Query( $news_args );

		if( $news_query->have_posts() ) : while( $news_query->have_posts() ) : $news_query->the_post(); ?>
			<article>
				<?php
				if( shortcode_exists( 'wpfilebase') ) {
					//echo do_shortcode( '[wpfilebase tag=attachments tpl=link /]' );
				} ?>
				<p><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a><br/>
				<small><?php the_date('F Y'); ?></small></p>
			</article>
		<?php endwhile; endif; wp_reset_postdata();

		echo $args['after_widget'];
	}

	// Widget Backend
	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}
		else {
			$title = __( 'New title', 'newsletter_widget_domain' );
		}
		// Widget admin form
		?>
			<p>
				<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
				<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
			</p>
		<?php
	}

	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		return $instance;
	}
} // Class newsletter_widget ends here

// Register and load the widget
function newsletter_load_widget() {
	register_widget( 'newsletter_widget' );
}
add_action( 'widgets_init', 'newsletter_load_widget' );
?>
