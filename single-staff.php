<?php get_header(); ?>
			
			<div id="content" class="clearfix row">
			
				<div id="main" class="col-sm-8 clearfix" role="main">

					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
					<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
						
						<header>
							
							<div class="page-header"><h1 class="single-title" itemprop="headline">
								<?php the_title(); ?><?php echo get_field('suffix') ? ', ' . get_field('suffix') : ''; ?>
								<?php echo get_field('title') ? '<small>'.get_field('title').'</small>' : ''; ?>
							</h1>
								<?php // Departments
								if( get_field('staff_department') ) {
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
									<?php endif;
									wp_reset_query();
								} ?>
							</div>
						
						</header> <!-- end article header -->
					
						<section class="post_content clearfix" itemprop="articleBody">
							<div class="row">

								<?php if( has_post_thumbnail() ) : ?>

									<div class="col-sm-4 col-sm-push-8">
										<?php the_post_thumbnail( 'medium', array(
											'class' => 'pull-right img-thumbnail',
										) ); ?>
									</div>
									<div class="col-sm-8 col-sm-pull-4">

								<?php else : ?>

								<div class="col-sm-12">

								<?php endif; ?>

									<?php the_content(); ?>

									<?php if( get_field('email') )  field_panel('Email', '<a href="mailto:'.get_field('email').'">' . get_field('email') . '</a>'); ?>

									<?php if( get_field('phone_number') ) {
										$ext = get_field('extension') ? " ext. " . get_field('extension') : '';
										field_panel('Phone Number', get_field('phone_number') . $ext);
									} ?>

									<?php wp_link_pages(); ?>
								</div>
							</div>
					
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