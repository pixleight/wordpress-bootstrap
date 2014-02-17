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
				<?php the_field('email'); ?>&nbsp;
			</td>
			<td>
				<?php the_field('phone_number'); ?>
			</td>
			<td>
				<?php the_field('extension'); ?>
			</td>
		</tr>