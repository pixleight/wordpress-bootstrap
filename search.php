<?php get_header(); ?>
			
			<div id="content" class="clearfix row">
			
				<div id="main" class="col col-lg-8 clearfix" role="main">
				
					<div class="page-header"><h1><span><?php _e("Search Results for","wpbootstrap"); ?>:</span> <?php echo esc_attr(get_search_query()); ?></h1></div>

					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">

						<div class="row clearfix">

							<div class="col-xs-8 col-xs-push-4 col-sm-9 col-sm-push-3 clearfix">
								
								<header>
									
									<h3><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
									
									<?php if( get_post_type() == 'post' ) : ?>
										<p class="meta"><?php _e("Posted", "wpbootstrap"); ?> <time datetime="<?php echo the_time('Y-m-j'); ?>" pubdate><?php the_time(); ?></time> <?php _e("by", "wpbootstrap"); ?> <?php the_author_posts_link(); ?> <span class="amp">&</span> <?php _e("filed under", "wpbootstrap"); ?> <?php the_category(', '); ?>.</p>
									<?php endif; ?>
								
								</header> <!-- end article header -->
							
								<section class="post_content">
									<?php the_excerpt('<span class="read-more">' . __("Read more on","wpbootstrap") . ' "'.the_title('', '', false).'" &raquo;</span>'); ?>
							
								</section> <!-- end article section -->
								
								<footer>
							
									
								</footer> <!-- end article footer -->

							</div>

							<div class="col-xs-4 col-xs-pull-8 col-sm-3 col-sm-pull-9 clearfix">
								<a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail( 'intranet-featured-excerpt', array(
										'class' => 'img-thumbnail img-responsive'
									) ); ?></a>
							</div>

						</div>

					</article> <!-- end article -->
					
					<?php endwhile; ?>	
					
					<?php if (function_exists('page_navi')) { // if expirimental feature is active ?>
						
						<?php page_navi(); // use the page navi function ?>
						
					<?php } else { // if it is disabled, display regular wp prev & next links ?>
						<nav class="wp-prev-next">
							<ul class="clearfix">
								<li class="prev-link"><?php next_posts_link(_e('&laquo; Older Entries', "wpbootstrap")) ?></li>
								<li class="next-link"><?php previous_posts_link(_e('Newer Entries &raquo;', "wpbootstrap")) ?></li>
							</ul>
						</nav>
					<?php } ?>			
					
					<?php else : ?>
					
					<!-- this area shows up if there are no results -->
					
					<article id="post-not-found">
					    <header>
					    	<h1><?php _e("Not Found", "wpbootstrap"); ?></h1>
					    </header>
					    <section class="post_content">
					    	<p><?php _e("Sorry, but the requested resource was not found on this site. Please try your search again:", "wpbootstrap"); ?></p>
					    	<?php get_template_part( 'searchform' ); ?>
					    </section>
					    <footer>
					    </footer>
					</article>
					
					<?php endif; ?>
			
				</div> <!-- end #main -->
    			
    			<?php get_sidebar(); // sidebar 1 ?>
    
			</div> <!-- end #content -->

<?php get_footer(); ?>