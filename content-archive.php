<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
						
	<header>
	
		<a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail( 'wpbs-featured' ); ?></a>
		
		<div class="page-header"><h1 class="h2"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1></div>
		
		<p class="meta"><?php _e("Posted", "wpbootstrap"); ?> <time datetime="<?php echo the_time('Y-m-j'); ?>" pubdate><?php the_time(); ?></time> <?php _e("by", "wpbootstrap"); ?> <?php the_author_posts_link(); ?> <span class="amp">&</span> <?php _e("filed under", "wpbootstrap"); ?> <?php the_category(', '); ?>.</p>
	
	</header> <!-- end article header -->

	<section class="post_content clearfix">
		<?php the_content( __("Read more &raquo;","wpbootstrap") ); ?>
	</section> <!-- end article section -->
	
	<footer>

		<p class="tags"><?php the_tags('<span class="tags-title">' . __("Tags","wpbootstrap") . ':</span> ', ' ', ''); ?></p>
		
	</footer> <!-- end article footer -->

</article> <!-- end article -->