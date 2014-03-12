<div class="well">
	<div class="row">
		<div class="col-xs-3 col-md-2">
			<img src="<?php echo get_wp_user_avatar_src( $curauth->ID, 'thumbnail' ); ?>" class="img-thumbnail avatar-thumbnail wp-user-avatar wp-user-avatar-thumbnail photo img-responsive" alt="<?php echo get_the_author_meta( 'display_name', $curauth->ID ); ?>">
		</div>
		<div class="col-xs-9 col-md-10">
			<?php echo wpautop( get_the_author_meta( 'description', $curauth->ID ) ); ?>
		</div>
	</div>
</div>