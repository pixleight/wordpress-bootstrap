<!doctype html>  
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta charset="utf-8">
		<title><?php wp_title( '|', true, 'right' ); ?></title>	
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
		<!--[if IE]>
			<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
		<![endif]-->
				
		<!-- media-queries.js (fallback) -->
		<!--[if lt IE 9]>
			<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>			
		<![endif]-->

		<!-- html5.js -->
		<!--[if lt IE 9]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		
  		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<!-- wordpress head functions -->
		<?php wp_head(); ?>
		<!-- end of wordpress head -->

<<<<<<< HEAD
		<?php if( date('Ymd') == date('Ymd', 
strtotime('20160401')) ) { ?>
=======
		<?php if( date('Ymd') == date('Ymd', strtotime('20150401')) ) { ?>
>>>>>>> baff54e96d77ab631a89ce2ad6c123f70415ca6a
		<!-- April Fools! -->
		<style type="text/css">
			body {
				font-family: "Comic Sans MS", "Comic Sans" !important; 
			}

			h1, h2, h3, h4, h5, h6 {
<<<<<<< HEAD
				font-family: "Comic Sans MS", "Comic Sans" !important;
				color: #F0F !important;
=======
				font-family: "Papyrus", "Comic Sans MS", "Comic Sans" !important;
>>>>>>> baff54e96d77ab631a89ce2ad6c123f70415ca6a
			}
		</style>
		<!-- April Fools! -->
		<?php }?>
				
	</head>
	
	<body <?php body_class(); ?>>
				
		<header role="banner">
				
			<div class="navbar navbar-inverse navbar-fixed-top">
				<div class="container">
          
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>

						<a class="navbar-brand" title="<?php echo get_bloginfo('description'); ?>" href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a>
					</div>

					<div class="collapse navbar-collapse navbar-responsive-collapse">
						<?php wp_bootstrap_main_nav(); // Adjust using Menus in Wordpress Admin ?>
					</div>

				</div> <!-- end .container -->
			</div> <!-- end .navbar -->
		
		</header> <!-- end header -->
		
		<div class="container">

		<!--[if lte IE 8]>
		<?php if( !isset($_COOKIE['ie-notice-hide']) ) : ?>
			<div class="alert alert-danger alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<strong>Welcome!</strong> It appears you are using an older version of Internet Explorer. The new Intranet should work perfectly fine for you, but as with any new technology, there are bound to be a few bugs to work out.<br>
				If you are experiencing any problems or things don't look right, <a href="<?php echo get_site_url(1, '?page_id=693'); ?>">click here</a> for help.<br>
				<em>This notice will not appear again for 90 days.</em>
			</div>
		<?php endif; ?>
		<![endif]-->

		<?php if ( function_exists('yoast_breadcrumb') ) { ?>
			<div class="row clearfix"><div class="col-sm-12 clearfix">
				<?php $breadcrumbs = yoast_breadcrumb('<ol class="breadcrumb"><li>','</li></ol>',false);
				echo str_replace( '|', '</li><li>', $breadcrumbs ); ?>
			</div></div>
		<?php } ?>
