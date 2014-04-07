<?php 
	function register_providers_widget() {
	    register_widget( 'Providers_Widget' );
	}
	add_action( 'widgets_init', 'register_providers_widget' );

class Providers_Widget extends WP_Widget {

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {
		// widget actual processes
		parent::__construct(
			'providers_widget', // Base ID
			__('PCHC Providers List', 'wpbootstrap'), // Name
			array( 'description' => __( 'A listing of providers', 'wpbootstrap' ), ) // Args
		);
	}

	/**
	 * Ouputs the options form on admin
	 *
	 * @param array $instance The widget options
	 */
	public function form( $instance ) {
		// outputs the options form on admin
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}
		else {
			$title = __( 'Our Providers', 'wpbootstrap' );
		}
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		// processes widget options to be saved
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

		return $instance;
	}

	/**
	 * Outputs the content of the widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {
		// outputs the content of the widget
		$title = apply_filters( 'widget_title', $instance['title'] );

		echo $args['before_widget'];
		if ( ! empty( $title ) )
			echo $args['before_title'] . $title . $args['after_title'];

		/**
		 * The WordPress Query class.
		 * @link http://codex.wordpress.org/Function_Reference/WP_Query
		 *
		 */
		$query_args = array(
			
			//Type & Status Parameters
			'post_type'   => 'provider',
			'post_status' => 'publish',

			//Order & Orderby Parameters
			'order'               => 'DESC',
			'orderby'             => 'date',
			
			//Pagination Parameters
			'posts_per_page'         => -1,
			'nopaging'               => true,
			
		);
	
		$providers_query = new WP_Query( $query_args );
		
		if( $providers_query->have_posts() ) : ?>
			<div class="row"><ul>
			<?php while( $providers_query->have_posts() ) : $providers_query->the_post(); ?>

				<li id="provider-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>
					<div class="col-xs-4">
						<?php the_post_thumbnail( 'thumbnail', array(
							'class' => 'img-circle img-responsive'
						) ); ?>
					</div>
					<div class="col-xs-8">
						<h4 class="provider-name"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
						<p class="provider-details">Pediatric Dentist</p>
						<p class="provider-details">PCHC Dental Center</p>
					</div>
				</li>

			<?php endwhile; wp_reset_postdata(); ?>
			</ul></div>
		<?php endif;

		echo $args['after_widget'];
	}
} // class Providers_Widget
?>