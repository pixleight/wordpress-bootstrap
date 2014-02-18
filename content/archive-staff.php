<?php
/**
 * The default template for displaying content. Used for both single and index/archive/search.
 *
 * @subpackage Reverie
 * @since Reverie 4.0
 */
?>


		<tr id="post-<?php the_ID(); ?>">
			<td>
				<a href="<?php the_permalink(); ?>">
					<?php 
					echo get_field('first_name') . ' ' . get_field('last_name');
					echo get_field('suffix') ? ', ' . get_field('suffix') : '';
					?>
				</a>
			</div>
			<td>
				<?php echo get_field('email') ? '<a href="mailto:'.get_field('email').'">' . get_field('email') . '</a>' : ''; ?>
			</td>
			<td>
				<?php the_field('phone_number'); echo get_field('extension') ? ' ext. ' . get_field('extension') : ''; ?>
			</td>
			<td>
				<?php // Departments
				$args = array(
					'post__in' => get_field('staff_department'),
					'post_type' => 'department',
					'posts_per_page' => -1,
					'orderby' => 'title',
					'order' => 'ASC'
				);
				$departments = new WP_Query($args);
				if( $departments->have_posts() ) : ?>
					<ul class="list-inline">
					<?php while( $departments->have_posts() ) : $departments->the_post(); ?>
						<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
					<?php endwhile; ?>
					</ul>
				<?php endif; wp_reset_query(); ?>
			</td>
		</tr>