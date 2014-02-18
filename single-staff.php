<?php get_header(); ?>
			
			<div id="content" class="clearfix row">
			
				<div id="main" class="col-sm-8 clearfix" role="main">

					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
					<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
						
						<header>
						
							<?php the_post_thumbnail( 'wpbs-featured' ); ?>
							
							<div class="page-header"><h1 class="single-title" itemprop="headline">
								<?php the_title(); ?><?php echo get_field('suffix') ? ', ' . get_field('suffix') : ''; ?>
								<?php echo get_field('title') ? '<small>'.get_field('title').'</small>' : ''; ?>
							</h1>
							</div>
						
						</header> <!-- end article header -->
					
						<section class="post_content clearfix" itemprop="articleBody">
							<?php the_content(); ?>

							<?php function field_panel($title, $content) { ?>
								<div class="panel panel-default">
									<div class="panel-heading">
										<h3 class="panel-title"><?php echo $title; ?></h3>
									</div>
									<div class="panel-body">
										<?php echo $content; ?>
									</div>
								</div>
							<?php } ?>

							<?php if( get_field('email') )  field_panel('Email', get_field('email')); ?>

							<?php if( get_field('phone_number') ) {
								$ext = get_field('extension') ? " ext. " . get_field('extension') : '';
								field_panel('Phone Number', get_field('phone_number') . $ext);
							} ?>
							
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
								<div class="panel panel-default">
									<div class="panel-heading">
										<h3 class="panel-title">Departments</h3>
									</div>
									<div class="panel-body">
										<ul class="list-inline">
										<?php while( $departments->have_posts() ) : $departments->the_post(); ?>
											<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
										<?php endwhile; ?>
										</ul>
									</div>
								</div>
							<?php endif; wp_reset_query(); ?>

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