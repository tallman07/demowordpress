<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">	
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>" charset="<?php bloginfo('charset'); ?>" />
	<meta name="generator" content="WordPress <?php bloginfo('version'); ?>"/>
	<title><?php wp_title( '|', true, 'right'); ?></title>
	<!-- Theme Css -->
	<link href="<?php echo get_stylesheet_uri(); ?>" rel="stylesheet">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> >
<!-- Wrapper -->
<div id="wrapper">
<!-- Header Section -->
<div class="header_section">
	<div class="container">
		<!-- Logo & Contact Info -->
		<div class="row">
			<div class="col-md-12">
				<div class="hc_logo">
					<h1><?php $hc_current_options=get_option('hc_lite_options'); ?>	
						<a title="Health Center" href="<?php echo home_url( '/' ); ?>">
						<?php if($hc_current_options['hc_texttitle'] =="on")
						{ echo get_bloginfo( ); }
						else if($hc_current_options['upload_image_logo']!='') 
						{ ?>
						<img src="<?php echo $hc_current_options['upload_image_logo']; ?>" style="height:<?php if($hc_current_options['height']!='') { echo $hc_current_options['height']; }  else { "50"; } ?>px; width:<?php if($hc_current_options['width']!='') { echo $hc_current_options['width']; }  else { "150"; } ?>px;" />
						<?php } else { _e('Health','health'); ?><span><?php _e('Center','health'); ?></span> <?php } ?>
						</a>
					</h1> 
				</div>
			</div>	
		</div>
		<!-- /Logo & Contact Info -->
	</div>	
</div>	
<!-- /Header Section -->	
<!-- Navbar Section -->
<div class="navigation_section">
	<div class="container navbar-container">
		<nav class="navbar navbar-default" role="navigation">
		  <div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			  <span class="sr-only">Toggle navigation</span>
			  <span class="icon-bar"></span>
			  <span class="icon-bar"></span>
			  <span class="icon-bar"></span>			  
			</button>
		  </div>
		  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<?php	wp_nav_menu( array(  
					'theme_location' => 'primary',
					'container'  => 'nav-collapse collapse navbar-inverse-collapse',
					'menu_class' => 'nav navbar-nav',
					'fallback_cb' => 'webriti_fallback_page_menu',
					'walker' => new webriti_nav_walker()
					));	
			?>
		  </div>
		</nav>
	</div>
</div><!-- /Navbar Section -->