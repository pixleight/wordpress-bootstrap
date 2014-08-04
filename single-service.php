<?php get_header(); ?>
			
			<div id="content" class="clearfix row">
			
				<div id="main" class="col-sm-8 clearfix" role="main">

					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
					<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
						
						<header>
						
							<?php the_post_thumbnail( 'wpbs-featured' ); ?>

							<?php $address = get_field('address'); ?>
							
							<div class="page-header"><h1 class="single-title" itemprop="headline">
								<?php the_title(); ?>
								<?php echo $address['address'] ? '<br><small>'.$address['address'].'</small>' : ''; ?>
							</h1></div>
						
						</header> <!-- end article header -->
					
						<section class="post_content clearfix" itemprop="articleBody">
							<div class="row">
								<?php $colwidth = (get_field('service_phone_number') && get_field('hours')) ? 'col-md-6' : 'col-md-12'; ?>

								<?php if(get_field('service_phone_number')) : ?>
									<div class="<?php echo $colwidth; ?>">
									<?php field_panel('Hours', wpmarkdown_markdown_to_html( get_field('hours') ) ); ?>
									</div>
								<?php endif; ?>

								<?php if(get_field('service_phone_number')) : ?>
									<div class="<?php echo $colwidth; ?>">
									<?php field_panel('Phone Number', get_field('service_phone_number') ); ?>
									</div>
								<?php endif; ?>
							</div>

							<?php the_content(); ?>
							
							<?php if( !empty($address) ): ?>
								<div class="acf-map">
									<div class="marker" data-lat="<?php echo $address['lat']; ?>" data-lng="<?php echo $address['lng']; ?>"></div>
								</div>
							<?php endif; ?>

							<?php wp_link_pages(); ?>
					
						</section> <!-- end article section -->
						
						<footer>
			
							<?php the_tags('<p class="tags"><span class="tags-title">' . __("Tags","wpbootstrap") . ':</span> ', ' ', '</p>'); ?>
							
							<?php 
							// only show edit button if user has permission to edit posts
							if( $user_level > 0 ) { 
							?>
							<a href="<?php echo get_edit_post_link(); ?>" class="btn btn-success edit-post"><i class="icon-pencil icon-white"></i> <?php _e("Edit post","wpbootstrap"); ?></a>
							<?php } ?>
							
						</footer> <!-- end article footer -->
					
					</article> <!-- end article -->

					<?php $attached_category = get_field('blog_category');
						if( $attached_category ) {
							/**
							 * The WordPress Query class.
							 * @link http://codex.wordpress.org/Function_Reference/WP_Query
							 *
							 */
							$args = array(
								
								//Category Parameters
								'cat'     => $attached_category->term_id,
								
								//Type & Status Parameters
								'post_type'   => 'post',
								'post_status' => 'publish',
								
								//Order & Orderby Parameters
								'order'               => 'DESC',
								'orderby'             => 'date',
								
								//Pagination Parameters
								'posts_per_archive_page' => 5,
								'nopaging'               => false,
								'paged'                  => get_query_var('paged'),
								
							);
						
						$cat_query = new WP_Query( $args );

						if ($cat_query->have_posts()) : ?>

							<h1><a href="<?php echo esc_url( get_category_link( $attached_category ) ); ?>" title="<?php $attached_category->name; ?>"><?php echo $attached_category->name; ?></a></h1>

							<?php while ($cat_query->have_posts()) : $cat_query->the_post(); ?>

							<div class="row clearfix">
								<div class="col-xs-10 col-xs-offset-1 clearfix">
									<?php get_template_part( 'content-archive', get_post_type() ); ?>
								</div>
							</div>

							<?php endwhile; ?>

							<a href="<?php echo esc_url( get_category_link( $attached_category ) ); ?>" title="<?php $attached_category->name; ?>" class="btn btn-primary btn-lg btn-block">Read More: <?php echo $attached_category->name; ?></a>

						<?php endif; wp_reset_postdata();
							
						} // End check for attached blog category
					?>
					
					<?php endwhile; ?>			
					
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