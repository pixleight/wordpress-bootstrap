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
								<div class="col-md-8">
									<?php the_content(); ?>

									<?php if( get_field('department_phone_number') ) field_panel('Phone Number', get_field('department_phone_number') ); ?>

									<?php if( get_field('hours') ) field_panel('Hours', wpmarkdown_markdown_to_html( get_field('hours') ) ); ?>
									
									<?php if( !empty($address) ): ?>
										<div class="acf-map">
											<div class="marker" data-lat="<?php echo $address['lat']; ?>" data-lng="<?php echo $address['lng']; ?>"></div>
										</div>
									<?php endif; ?>
								</div>

								<div class="col-md-4">
									<?php $staff_members = get_posts(array(
										'posts_per_page' => -1,
										'post_type' => 'staff',
										'meta_query' => array(
											array(
												'key' => 'staff_department', // name of custom field
												'value' => '"' . get_the_ID() . '"', // matches exaclty "123", not just 123. This prevents a match for "1234"
												'compare' => 'LIKE'
											)
										)
									)); ?>

									<?php if( $staff_members) {
										$staff_content = '<ul class="list-unstyled">';
											foreach( $staff_members as $staff ) { 
												$staff_content .= '<li>';
													$staff_content .= '<a href="'.get_permalink( $staff->ID ).'">';
														$staff_content .=  get_the_title( $staff->ID );
													$staff_content .= '</a>';
												$staff_content .= '</li>';
											}
										$staff_content .= '</ul>';
										field_panel('Staff Members', $staff_content);
									} ?>
								</div>
							</div>

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