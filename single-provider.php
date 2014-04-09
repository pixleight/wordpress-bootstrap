<?php get_header(); ?>
			
			<div id="content" class="clearfix row">
			
				<div id="main" class="col-sm-8 clearfix" role="main">

					<?php if ( function_exists('yoast_breadcrumb') ) {
					yoast_breadcrumb('<p id="breadcrumbs">','</p>');
					} ?>

					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
					<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
						
						<div class="row">
							<div class="col-xs-3 col-sm-4 col-sm-push-8">
								<p><?php the_post_thumbnail( 'medium', array(
									'class' => 'img-thumbnail img-responsive center-block',
								) ); ?></p>

								<?php $locations = get_field( 'locations' );
								if( $locations ) : ?>
									<div class="panel panel-primary">
										<div class="panel-heading">
											<h3 class="panel-title">Locations</h3>
										</div>
										<div class="list-group">
											<?php foreach( $locations as $location ) : ?>
												<a class="list-group-item" href="<?php echo get_permalink( $location->ID ); ?>"><?php echo get_the_title( $location->ID ); ?></a>
											<?php endforeach; ?>
										</div>
									</div>
								<?php endif; ?>
							</div>
							<div class="col-xs-9 col-sm-8 col-sm-pull-4">
								<header>
									
									<div class="page-header"><h1 class="single-title" itemprop="headline">
										<?php the_title(); ?>
										<?php if( get_field( 'title' ) ) : ?>
										<br />
										<small><?php the_field( 'title' ); ?></small>
										<?php endif; ?>
									</h1></div>
								
								</header> <!-- end article header -->
							
								<section class="post_content clearfix" itemprop="articleBody">
									<?php the_content(); ?>

									<?php if( get_field( 'education' ) ) : ?>
										<div class="panel panel-default">
											<div class="panel-heading">
												<h3 class="panel-title">Education</h3>
											</div>
											<div class="panel-body">
												<?php the_field( 'education' ); ?>
											</div>
										</div>
									<?php endif; ?>

									<?php if( get_field( 'certifications' ) ) : ?>
										<div class="panel panel-default">
											<div class="panel-heading">
												<h3 class="panel-title">Certifications</h3>
											</div>
											<div class="panel-body">
												<?php the_field( 'certifications' ); ?>
											</div>
										</div>
									<?php endif; ?>

									<?php if( get_field( 'affiliations' ) ) : ?>
										<div class="panel panel-default">
											<div class="panel-heading">
												<h3 class="panel-title">Affiliations</h3>
											</div>
											<div class="panel-body">
												<?php the_field( 'affiliations' ); ?>
											</div>
										</div>
									<?php endif; ?>

									
									
									<?php wp_link_pages(); ?>
							
								</section> <!-- end article section -->
								
								<footer>
									
									<?php 
									// only show edit button if user has permission to edit posts
									if( $user_level > 0 ) { 
									?>
									<a href="<?php echo get_edit_post_link(); ?>" class="btn btn-success edit-post"><i class="icon-pencil icon-white"></i> <?php _e("Edit post","wpbootstrap"); ?></a>
									<?php } ?>
									
								</footer> <!-- end article footer -->

							</div> <!-- end col -->
						</div> <!-- end .row -->
					
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