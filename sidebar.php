				<div id="sidebar1" class="col-sm-4 hidden-xs" role="complementary">

					<h1 class="hidden-xs sidebar-logo"><a title="<?php echo get_bloginfo('description'); ?>" href="<?php echo home_url(); ?>" class="text-hide"><?php bloginfo('name'); ?></a></h1>

					<?php $nnesin = get_user_by( 'login', 'nnesin' );
					if( !empty($nnesin) ) : ?>

						<div class="well nnesin">
							<img src="<?php echo get_wp_user_avatar_src( $nnesin->ID, 'medium' ); ?>" class="img-rounded avatar-thumbnail wp-user-avatar wp-user-avatar-thumbnail photo img-responsive pull-right" alt="<?php echo $nnesin->display_name; ?>">
								<?php echo wpautop( $nnesin->description ); ?>
						</div>

					<?php endif; ?>
				
					<?php if ( is_active_sidebar( 'sidebar1' ) ) : ?>

						<?php dynamic_sidebar( 'sidebar1' ); ?>

					<?php endif; ?>

				</div>