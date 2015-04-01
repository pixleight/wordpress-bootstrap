<?php get_header(); ?>
			
			<div id="content" class="clearfix row">
			
				<div id="main" class="col-sm-8 clearfix" role="main">

					<?php if (have_posts()) : ?>
						<table class="table table-striped table-hover table-condensed">
						<thead>
							<tr>
								<th>
									<?php $last_name_order = ($_GET['sortby'] == 'last_name' && $_GET['order'] == 'ASC') || !$_GET['sortby'] ? 'DESC' : 'ASC'; ?>
									<a href="?sortby=last_name&amp;order=<?php echo $last_name_order; ?>">
										<strong>Last Name</strong>
										<?php if( ( $_GET['sortby'] == 'last_name' && $_GET['order'] == 'ASC' ) || !$_GET['sortby'] ) : ?>
											<span class="glyphicon glyphicon-sort-by-attributes"></span>
										<?php elseif( $_GET['sortby'] == 'last_name' && $_GET['order'] == 'DESC' ) : ?>
											<spam class="glyphicon glyphicon-sort-by-attributes-alt"></span>
										<?php endif; ?>
									</a>
								</th>
								<th>
									<strong>Email</strong>
								</th>
								<th>
									<strong>Phone Number</strong>
								</th>
								<th>
									<strong>Departments</strong>
								</th>
							</tr>
						</thead>
						<tbody>
					<?php while (have_posts()) : the_post(); ?>
						<?php get_template_part( 'content-archive', get_post_type() ); ?>
					<?php endwhile; ?>	
						</tbody>
					</table>
					
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
					    	<h1><?php _e("No Posts Yet", "wpbootstrap"); ?></h1>
					    </header>
					    <section class="post_content">
					    	<p><?php _e("Sorry, What you were looking for is not here.", "wpbootstrap"); ?></p>
					    </section>
					    <footer>
					    </footer>
					</article>
					
					<?php endif; ?>
			
				</div> <!-- end #main -->
    
				<?php get_sidebar(); // sidebar 1 ?>
    
			</div> <!-- end #content -->

<?php get_footer(); ?>