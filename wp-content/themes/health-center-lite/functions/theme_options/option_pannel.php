<?php
add_action('admin_menu', 'webriti_admin_menu_pannel');  
function webriti_admin_menu_pannel()
 {	$page=add_theme_page( 'theme', 'Option Panel', 'edit_theme_options', 'webriti', 'webriti_option_panal_function' ); 
 	$page2=add_theme_page( 'webriti_themes', 'Webriti Themes', 'edit_theme_options', 'webriti_themes', 'webriti_themes_function' );
	add_action('admin_print_styles-'.$page, 'webriti_admin_enqueue_script');
	add_action('admin_print_styles-'.$page2, 'webriti_theme_admin_enqueue_script');
 }
function webriti_admin_enqueue_script()
{		
	wp_enqueue_script('tab',get_template_directory_uri().'/functions/theme_options/js/option-panel-js.js',array('media-upload','jquery-ui-sortable'));	
	wp_enqueue_script( 'bootstrap-modal', get_template_directory_uri() . '/functions/theme_options/js/bootstrap-modal.js');
	wp_enqueue_style('thickbox');	
	wp_enqueue_style('option',get_template_directory_uri().'/functions/theme_options/css/style-option.css');
	wp_enqueue_style('hc-bootstrap',get_template_directory_uri().'/functions/theme_options/css/hc-bootstrap.css');
}
	function webriti_option_panal_function()
	{	require_once('webriti_option_pannel.php'); }


	function webriti_themes_function ()
	{	
		require_once('webriti_theme.php');
	}
	//Theme pages css and js
	function webriti_theme_admin_enqueue_script()
	{ 	
		
		wp_enqueue_style('responsive',get_template_directory_uri().'/css/bootstrap-responsive.css'); 
		wp_enqueue_style('bootstrap',get_template_directory_uri().'/functions/theme_options/css/webriti_theme.css'); 
		
	}
?>