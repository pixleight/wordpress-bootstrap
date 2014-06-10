<form action="<?php echo home_url( '/' ); ?>" method="get" class="form-inline">
    <fieldset>
		<div class="input-group col-sm-12">
			<input type="text" name="s" id="search" placeholder="<?php _e("Search","wpbootstrap"); ?>" value="<?php the_search_query(); ?>" class="form-control input-sm" />
			<span class="input-group-btn">
				<button class="btn btn-primary btn-sm" type="submit"><span class="glyphicon glyphicon-search"> Search</span></button>
			</span>
		</div>
    </fieldset>
</form>