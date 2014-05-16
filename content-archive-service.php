<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
						
	<header>
		
		<h3 class="h2"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
	
	</header> <!-- end article header -->

	<section class="post_content">
	
		<?php the_post_thumbnail( 'wpbs-featured' ); ?>
	
		<?php the_excerpt(); ?>

	</section> <!-- end article section -->
	
	<footer>
		<?php $children_args = array(
			'post_parent' => get_the_ID(),
			'post_type' => 'service',
			'post_status' => 'publish',
			'posts_per_page' => -1,
		);
		$children = new WP_Query( $children_args );
		if( $children->have_posts() ) : while( $children->have_posts() ) : $children->the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
				<header>
					<h4><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4>
				</header>

				<section class="post_content">
	
					<?php the_post_thumbnail( 'wpbs-featured' ); ?>
				
					<?php the_excerpt(); ?>

				</section> <!-- end article section -->
			</article>
		<?php endwhile; endif; ?>
	</footer> <!-- end article footer -->

</article> <!-- end article -->
