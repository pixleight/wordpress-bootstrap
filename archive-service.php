<?php get_header(); ?>
			
			<div id="content" class="clearfix row">
			
				<div id="main" class="col-sm-6 clearfix" role="main">
				
					<div class="page-header">
						<h1 class="archive_title">
							<span>PCHC</span> Departments
						</h1>
					</div>
					<?php $args = array(
						'orderby' => 'title',
						'order' => 'ASC',
						'post_parent' => 0,
						'post_type' => 'service',
						'post_status' => 'publish',
						'posts_per_page' => 999,
						'nopaging' => true
					);
					$wp_query = new WP_Query( $args ); ?>
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
						<?php get_template_part( 'content-archive', get_post_type() ); ?>
					
					<?php endwhile; ?>	
					
					<?php if (function_exists('page_navi')) { // if expirimental feature is active ?>
						
						<?php page_navi(); // use the page navi function ?>

					<?php } else { // if it is disabled, display regular wp prev & next links ?>
						<nav class="wp-prev-next">
							<ul class="pager">
								<li class="previous"><?php next_posts_link(_e('&laquo; Older Entries', "wpbootstrap")) ?></li>
								<li class="next"><?php previous_posts_link(_e('Newer Entries &raquo;', "wpbootstrap")) ?></li>
							</ul>
						</nav>
					<?php } ?>
								
					
					<?php else : ?>
					
					<article id="post-not-found">
					    <header>
					    	<h1><?php _e("No Posts Yet", "wpbootstrap"); ?></h1>
					    </header>
					    <section class="post_content">
					    	<p><?php _e("Sorry, What you were looking for is not here.", "wpbootstrap"); ?></p>
					    </section>
					    <footer>
					    </footer>
					</article>
					
					<?php endif; ?>
			
				</div> <!-- end #main -->

				<div class="col-sm-6 clearfix" role="complementary">
					<div id="department-map" data-spy="affix" style="width: 555px;">
						<?php rewind_posts();
						if ( have_posts() ) : ?>
						<div class="acf-map">
							<?php while ( have_posts() ) : the_post();
							$address = get_field('address');
								if( !empty( $address['lat'] ) && !empty( $address['lng'] ) ) :?>
									<div class="marker" data-lat="<?php echo $address['lat']; ?>" data-lng="<?php echo $address['lng']; ?>"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
								<?php endif; ?>
							<?php endwhile; ?>
						</div>
						<?php endif; ?>
					</div>
				</div>
    
			</div> <!-- end #content -->

<?php get_footer(); ?>