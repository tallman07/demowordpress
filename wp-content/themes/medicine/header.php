<?php
if ( isset($_POST['action'])&&$_POST['action']=='get_posts_ajax' ) {
	while ( have_posts() ) : the_post();
	get_template_part( 'content', get_post_format() );
	endwhile;
	get_template_part('navigation');
	die();
}
?>
<?php global $settings; ?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<title><?php echo wp_title( false ); ?></title>

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
<div id="page">
	<div class='foliage'></div>
<div id="header">
	<div class="container">
		<?php if ( $settings['elements']['logo']['show'] || is_super_admin() ) { ?>
		<div class="hd-left lzblock" <?php if (!$settings['elements']['logo']['show']&&is_super_admin()) echo 'style="display:none"'; ?> data-block="logo">
		<div id="logo">
			<?php if (true) { ?>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="<?php echo $settings['general']['logo']; ?>" alt="<?php bloginfo( 'name' ); ?>" /></a>
			<?php } else { ?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<p class="site-description"><?php bloginfo( 'description' ); ?></p>
			<?php } ?>
		</div></div>
		<?php } ?>
		
		
		
	<?php if ( $settings['elements']['search']['show'] || is_super_admin() ) { ?>
		<div class="hd-right lzblock" <?php if (!$settings['elements']['search']['show']&&is_super_admin()) echo 'style="display:none"'; ?> data-block="search">
			<div class="header_search">
				<div class='label'><?php echo __('Search this website', 'lizard');?> </div>
				<?php get_search_form(); ?>
			</div>
		</div>
		<?php } ?>
		
		<?php if ( $settings['elements']['secondary-menu']['show'] || is_super_admin() ) { ?>
		<div class="hd-right lzblock" <?php if (!$settings['elements']['secondary-menu']['show']&&is_super_admin()) echo 'style="display:none"'; ?> data-block="secondary-menu">
		<?php wp_nav_menu( array( 'theme_location' => 'header-menu2',
'container'       => 'div',
	'container_class' => 'nav-menu',
	'container_id'    => 'secondary-menu',
	'fallback_cb'=>'theme_secondary_menu'
	) ); ?>
		</div>
		<?php } ?>
		
		<div class="clear"></div>
		
		<?php $header_image = get_header_image();
		if ( ! empty( $header_image ) ) : ?>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( $header_image ); ?>" class="header-image" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="" /></a>
		<?php endif; ?>
		<?php if ( $settings['elements']['main-menu']['show'] || is_super_admin() ) { ?>
		<div class="lzblock" <?php if (!$settings['elements']['main-menu']['show']&&is_super_admin()) echo 'style="display:none"'; ?> data-block="main-menu">
		<?php wp_nav_menu( array( 'theme_location' => 'header-menu1',
			'container'       => 'div',
			'container_class' => 'nav-menu',
			'container_id'    => 'main-menu',
			'fallback_cb'=>'medicine_theme_main_menu'
		) ); ?>
		</div>
		<?php } ?>
		<div class="clear"></div>
		<?php if ( ($settings['elements']['slider']['show'] || is_super_admin())&&(is_front_page()||$settings['slider']['innerpages']) && ( isset( $settings['slider']['slides'] ) && count( $settings['slider']['slides'] ) )  ) { ?>
		<div id='slider' class="lzblock" <?php if (!$settings['elements']['slider']['show']&&is_super_admin()) echo 'style="display:none"'; ?> data-block="slider">
			<div class='slides'>
				<?php get_template_part( 'content', 'slide' ); ?>
			</div>
			<div class='slider-previews'></div>
			<div class='slider-arrows'>
				<div class='slide-left' title="Previous slide"></div>
				<div class='slide-right' title="Next slide"></div>
			</div>
		</div>
		<?php } ?>
		
			<div class="clear"></div>
		
	</div>	
</div>			
	<?php get_template_part('showroom'); ?>
	
	<div id="content-body" class="container">	