<?php get_header(); ?>
			
			<div id="content" class="clearfix row">
			
				<div id="main" class="col-sm-8 clearfix" role="main">

					<?php if ( is_active_sidebar( 'fptop' ) ) : ?>
						<div class="clearfix row">
							<div class="col-sm-12 frontpage-top-widgets clearfix">
								<?php dynamic_sidebar( 'fptop' ); ?>
							</div>
						</div>
					<?php endif; ?>

					<?php 
						/**
						 * The WordPress Query class.
						 * @link http://codex.wordpress.org/Function_Reference/WP_Query
						 *
						 */
						$args = array(
							//Category Parameters
							'tag_id'              => 10,
							//'category_name'    => 'front-page',
							
							//Type & Status Parameters
							'post_type'   => 'post',
							'post_status' => 'publish',
							
							//Order & Orderby Parameters
							'order'               => 'DESC',
							'orderby'             => 'date',
							'ignore_sticky_posts' => false,
							
							
							//Pagination Parameters
							'posts_per_page'         => 10,
							'nopaging'               => false,
							
						);
					$fp_query = new WP_Query( $args );
					
					if ($fp_query->have_posts()) : $active = true; $indicator_active = true; ?>

					<div id="carousel-frontpage" class="carousel slide" data-ride="carousel" data-interval="5000">

						<ol class="carousel-indicators">
						<?php $indicator_query = $fp_query;
						$i = 0;
						while( $indicator_query->have_posts()) : $indicator_query->the_post(); ?>
							<li data-target="#carousel-frontpage" data-slide-to="<?php echo $i; $i++; ?>" class="<?php echo $indicator_active ? 'active' : ''; $indicator_active = false; ?>"></li>
						<?php endwhile; ?>
						</ol>

						<div class="carousel-inner">

					<?php while ($fp_query->have_posts()) : $fp_query->the_post(); ?>

					<div class="item<?php echo $active ? ' active' : ''; $active = false; ?>">

						<?php if ( get_the_content() ) : ?>
							<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
						
								<header>
									
									<div class="page-header"><h1 class="h2"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1></div>
								
								</header> <!-- end article header -->
							
								<section class="post_content clearfix">
									<?php the_content( __("Read more &raquo;","wpbootstrap") ); ?>
								</section> <!-- end article section -->
								
								<footer>
									
								</footer> <!-- end article footer -->
							
							</article> <!-- end article -->
						<?php endif; ?>

						<?php if( has_post_thumbnail() ) : ?>
							<?php if( get_field('featured_image_link') ) : ?>
								<?php $link_ids = get_field('featured_image_link'); ?>
								<a href="<?php echo get_permalink( $link_ids[0] ); ?>">
							<?php else: ?>
								<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
							<?php endif; ?>
									<?php the_post_thumbnail( 'intranet-featured-carousel' ); ?>
							</a>
						<?php endif; ?>

					</div>
					
					
					
					<?php endwhile; ?>
					</div>

					<!-- Controls -->
						<a class="left carousel-control" href="#carousel-frontpage" data-slide="prev">
							<span class="glyphicon glyphicon-chevron-left"></span>
						</a>
						<a class="right carousel-control" href="#carousel-frontpage" data-slide="next">
							<span class="glyphicon glyphicon-chevron-right"></span>
						</a>
					</div>
					
					<?php else : ?>
					
					<article id="post-not-found">
					    <header>
					    	<h1><?php _e("Not Found", "wpbootstrap"); ?></h1>
					    </header>
					    <section class="post_content">
					    	<p><?php _e("Sorry, but the requested resource was not found on this site.", "wpbootstrap"); ?></p>
					    	<pre><?php print_r($wp_query); ?></pre>
					    </section>
					    <footer>
					    </footer>
					</article>
					
					<?php endif; ?>
			
				</div> <!-- end #main -->
    
				<?php get_sidebar(); // sidebar 1 ?>
    
			</div> <!-- end #content -->

<?php get_footer(); ?>