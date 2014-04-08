<?php get_header(); ?>
			
			<div id="content" class="clearfix row">
			
				<div id="main" class="col-sm-8 clearfix" role="main">

					<?php if ( function_exists('yoast_breadcrumb') ) {
					yoast_breadcrumb('<p id="breadcrumbs">','</p>');
					} ?>

					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
					<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

						<?php the_post_thumbnail( 'wpbs-featured', array(
							'class' => 'img-rounded img-responsive'
						) ); ?>

						<div class="row">

							<div class="col-sm-6">
						
							<header>
								
								<div class="page-header">
									<h1 class="single-title" itemprop="headline">
										<?php the_title(); ?>
									</h1>
									<?php $address = get_field('address');
									if( $address ) : ?>
										<h3 class="h4">
										<small><?php echo $address['address']; ?></small>
										</h3>
									<?php endif; ?>
								</div>
							
							</header> <!-- end article header -->
						
							<section class="post_content clearfix" itemprop="articleBody">
								<?php the_content(); ?>
								
								<?php wp_link_pages(); ?>

								<?php 
								$providers = get_posts(array(
									'post_type' => 'provider',
									'meta_query' => array(
										array(
											'key' => 'locations', // name of custom field
											'value' => '"' . get_the_ID() . '"', // matches exaclty "123", not just 123. This prevents a match for "1234"
											'compare' => 'LIKE'
										)
									)
								));
								
								if( $providers ) : ?>
									<div class="panel panel-primary">
										<div class="panel-heading">
											<h3 class="panel-title">Providers</h3>
										</div>
										<div class="list-group">
											<?php foreach( $providers as $provider ) : ?>
												<a class="list-group-item" href="<?php echo get_permalink( $provider->ID ); ?>"><?php echo get_the_title( $provider->ID ); ?></a>
											<?php endforeach; ?>
										</div>
									</div>
								<?php endif; ?>
						
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

							</div> <!-- end col -->

							<div class="col-sm-6">
								<?php 
								 
								if( !empty($address) ):
								?>
								<div class="acf-map">
									<div class="marker" data-lat="<?php echo $address['lat']; ?>" data-lng="<?php echo $address['lng']; ?>">
										<h4><?php the_title(); ?></h4>
										<p class="address"><?php echo $address['address']; ?></p>
									</div>
								</div>
								<?php endif; ?>
							</div>

						</div> <!-- end row -->
					
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