<?php 
/**
 * The template for displaying the Header.
 *
 *
 * @subpackage Medical Center
 * @since Medical Center
 */
?> <!DOCTYPE HTML>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<title><?php wp_title( '|', 'true', 'right' ); ?></title>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<div id="mdclcntr_home_page">
		<div id="mdclcntr_header_main">
			<div id="mdclcntr_wrap_head">
				<div class="mdclcntr_head">
					<div class="mdclcntr_logodescr">
						<h2 class="site_title"><a href="<?php echo esc_url( home_url() ); ?>" rel="<?php echo esc_attr( home_url( 'name', 'display' ) ); ?>" title="<?php bloginfo( 'name' ); ?>"><?php bloginfo( 'name' ); ?></a></h2>
						<h3 class="site_description"><?php bloginfo( 'description' ); ?></h3>
					</div ><!-- header_group -->
					<nav id="menu_nav" class="menu_nav" role="navigation">
						<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
					</nav>
					<?php get_search_form(); ?>
					<div class="clear"></div>
				</div><!-- mdclcntr_head -->
			</div><!-- mdclcntr_wrap_head -->
			<?php if ( get_header_image() ) : ?>
				<img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="" />
			<?php endif; ?>
			<div id="mdclcntr_head_bot">
				<div class="logo">
					<h1><?php _e( 'Welcome to our blog!', 'medical_center' ); ?></h1>
					<div class="nagination">
						<?php do_action( 'mdclcntr_the_breadcrumb' ); ?>
					</div><!-- nagination -->
				</div>	<!-- logo -->
			</div><!-- mdclcntr_head_bot -->
			<?php get_template_part( 'slider' ); ?>
			<div class="clear"></div>
		</div><!-- mdclcntr_header_main -->
		<div id="mdclcntr_main">