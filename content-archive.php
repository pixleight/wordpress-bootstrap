<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">

	<div class="row clearfix">

		<div class="col-xs-8 col-xs-push-4 col-sm-9 col-sm-push-3 clearfix">
							
			<header>
				
				<div class="page-header"><h2 class="h3"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1></div>
				
				<p class="meta"><?php _e("Posted", "wpbootstrap"); ?> <time datetime="<?php echo the_time('Y-m-j'); ?>" pubdate><?php the_time(); ?></time> <?php _e("by", "wpbootstrap"); ?> <?php the_author_posts_link(); ?> <span class="amp">&</span> <?php _e("filed under", "wpbootstrap"); ?> <?php the_category(', '); ?>.</p>
			
			</header> <!-- end article header -->

			<section class="post_content clearfix">
				<?php the_content( __("Read more &raquo;","wpbootstrap") ); ?>
			</section> <!-- end article section -->

			<footer>

				<p class="tags"><?php the_tags('<span class="tags-title">' . __("Tags","wpbootstrap") . ':</span> ', ' ', ''); ?></p>
				
			</footer> <!-- end article footer -->

		</div>

		<div class="col-xs-4 col-xs-pull-8 col-sm-3 col-sm-pull-9 clearfix">
			<a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail( 'intranet-featured-excerpt', array(
					'class' => 'img-thumbnail img-responsive'
				) ); ?></a>
		</div>
	</div>

</article> <!-- end article -->