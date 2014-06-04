<?php get_header(); ?>
			
			<div id="content" class="clearfix row">
			
				<div id="main" class="col-sm-8 clearfix" role="main">

					<?php 
						/**
						 * The WordPress Query class.
						 * @link http://codex.wordpress.org/Function_Reference/WP_Query
						 *
						 */
						global $wp_query;
						$args = array_merge( $wp_query->query_vars, array(
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
							
						) );
					query_posts( $args );
					
					if (have_posts()) : $active = true; $indicator_active = true; ?>

					<div id="carousel-frontpage" class="carousel slide" data-ride="carousel" data-interval="5000">

						<ol class="carousel-indicators">
						<?php $indicator_query = $wp_query;
						$i = 0;
						while( $indicator_query->have_posts()) : $indicator_query->the_post(); ?>
							<li data-target="#carousel-frontpage" data-slide-to="<?php echo $i; $i++; ?>" class="<?php echo $indicator_active ? 'active' : ''; $indicator_active = false; ?>"></li>
						<?php endwhile; ?>
						</ol>

						<div class="carousel-inner">

					<?php while (have_posts()) : the_post(); ?>

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
							<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
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