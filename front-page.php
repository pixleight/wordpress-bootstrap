<?php get_header(); ?>
			
			<div id="content" class="clearfix row">
				<?php
					/**
					 * The WordPress Query class.
					 * @link http://codex.wordpress.org/Function_Reference/WP_Query
					 *
					 */
					$args = array(
						
						//Type & Status Parameters
						'post_type'   => 'front_page_slide',
						'post_status' => 'publish',

						//Order & Orderby Parameters
						'order'               => 'DESC',
						'orderby'             => 'date',
						
						//Pagination Parameters
						'posts_per_page'         => -1,
						'nopaging'               => true,
						
					);
				
				$fps_query = new WP_Query( $args );
				
				if ( $fps_query->have_posts() ) : ?>

				<div id="front-page-slides" class="carousel slide clearfix" data-ride="carousel">
					<div class="carousel-inner">
						<?php $active = 'active'; while ( $fps_query->have_posts() ) : $fps_query->the_post(); ?>
						<div class="item <?php echo $active; ?>">
							<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
								<div class="col-sm-4 col-sm-push-1">
									<?php the_post_thumbnail( 'pchc-front-page-slide', array(
										'class' => 'img-responsive img-circle',
									) ); ?>
								</div>
								<div class="col-sm-6 col-sm-push-1">
									<header>
										<div class="page-header">
											<h2 class="h1"><?php the_title(); ?></h2>
										</div>
									</header>
									<section class="post_content clearfix">
										<?php the_content(); ?>
										<?php if( get_field( 'learn_more_link') ) : ?>
											<a class="btn btn-primary btn-lg pull-right clearfix" href="<?php the_field( 'learn_more_link' ); ?>" role="button">Learn More <i class="glyphicon glyphicon-chevron-right"></i></a>
										<?php endif; ?>
									</section>
								</div>
							</article>
						</div>
						<?php $active = false; endwhile; wp_reset_postdata(); ?>
					</div>
					<a class="left carousel-control" href="#front-page-slides" data-slide="prev">
						<span class="glyphicon glyphicon-chevron-left"></span>
					</a>
					<a class="right carousel-control" href="#front-page-slides" data-slide="next">
						<span class="glyphicon glyphicon-chevron-right"></span>
					</a>
				</div>

				<?php endif; ?>
			
				<div id="main" class="col-sm-8 clearfix" role="main">

					<?php if ( function_exists('yoast_breadcrumb') ) {
					yoast_breadcrumb('<p id="breadcrumbs">','</p>');
					} ?>

					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
					<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
						
						<header>
						
							<a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail( 'wpbs-featured' ); ?></a>
							
							<div class="page-header"><h1><?php the_title(); ?></h1></div>
						
						</header> <!-- end article header -->
					
						<section class="post_content clearfix">
							<?php the_content(); ?>
						</section> <!-- end article section -->
					
					</article> <!-- end article -->

					<div class="row">
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
						
						if( $loc_query->have_posts() ) : while( $loc_query->have_posts() ) : $loc_query->the_post(); ?>

						<div class="col-sm-6">
							<div class="row clearfix">
								<div class="col-xs-4">
									<p><a href="<?php the_permalink(); ?>">
									<?php the_post_thumbnail( 'thumbnail', array(
										'class' => 'img-responsive img-circle',
									) ); ?>
									</a></p>
								</div>
								<div class="col-xs-8">
									<h3 class="h4">
										<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
									</h3>
									<p class="location-details text-muted">
									<?php if( get_field('address') ) : ?>
										<?php $address = get_field('address'); echo $address['address']; ?>
									<?php endif; ?>
									<?php if( get_field('phone_number') ) : ?>
										<br><?php the_field('phone_number'); ?>
									<?php endif; ?>
									</p>
								</div>
							</div>
						</div>

						<?php endwhile; endif; wp_reset_query(); ?>
					</div><!-- end row -->
					
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
					    	<h1><?php _e("Not Found", "wpbootstrap"); ?></h1>
					    </header>
					    <section class="post_content">
					    	<p><?php _e("Sorry, but the requested resource was not found on this site.", "wpbootstrap"); ?></p>
					    </section>
					    <footer>
					    </footer>
					</article>
					
					<?php endif; ?>
			
				</div> <!-- end #main -->
    
				<?php get_sidebar(); // sidebar 1 ?>
    
			</div> <!-- end #content -->

<?php get_footer(); ?>