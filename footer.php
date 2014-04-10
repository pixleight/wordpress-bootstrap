		
		</div> <!-- end #container -->

		<div class="container" id="footer">
			<footer role="contentinfo">
			
				<div id="inner-footer" class="clearfix">
		          <div id="widget-footer" class="clearfix row">
		            <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer1') ) : ?>
		            <?php endif; ?>
		            <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer2') ) : ?>
		            <?php endif; ?>
		            <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer3') ) : ?>
		            <?php endif; ?>
		          </div>
					
					<nav class="clearfix">
						<?php wp_bootstrap_footer_links(); // Adjust using Menus in Wordpress Admin ?>
					</nav>

					<div class="pull-left attribution">&copy; <?php bloginfo('name'); ?><br>
						<a href="http://pchc.com/" target="_blank" title="Penobscot Community Health Center">PCHC.com <i class="glyphicon glyphicon-chevron-right"></i></a></div>
					
					<div class="pull-right">
						<?php
						/**
						 * The WordPress Query class.
						 * @link http://codex.wordpress.org/Function_Reference/WP_Query
						 *
						 */
						$loc_args = array(
							
							//Type & Status Parameters
							'post_type'   => 'location',
							'post_status' => 'publish',

							//Order & Orderby Parameters
							'order'               => 'ASC',
							'orderby'             => 'title',
							
							//Pagination Parameters
							'nopaging'               => true,
							
						);
						
						$loc_query = new WP_Query( $loc_args );

						if( $loc_query->have_posts() ) : ?>
						<ul class="locations">
							<?php while( $loc_query->have_posts() ) : $loc_query->the_post(); ?>
							<li>
								<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
								<?php if( get_field( 'address' ) ) : ?>
								 | <?php $address = get_field('address'); echo $address['address']; ?>
								<?php endif; ?>
								<?php if( get_field( 'phone_number' ) ) : ?>
									 | <?php the_field( 'phone_number' ); ?>
								<?php endif; ?>
							</li>
							<?php endwhile; ?>
						</ul>
						<?php endif; wp_reset_query(); ?>
					</div>
				
				</div> <!-- end #inner-footer -->
				
			</footer> <!-- end footer -->
		</div>
				
		<!--[if lt IE 7 ]>
  			<script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
  			<script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
		<![endif]-->
		
		<?php wp_footer(); // js scripts are inserted using this function ?>

	</body>

</html>