<?php
/*---------------------------------------------------------------------------------*
 * @file           theme_stup_data.php
 * @package        Health-Center
 * @copyright      2014 webriti
 * @license        license.txt
 * @author       :	Hari Maliya
 * @filesource     wp-content/themes/health=center/theme_setup_data.php
 *	Admin  & front end defual data file 
 *-----------------------------------------------------------------------------------*/ 
function theme_data_setup()
{	$defailt_image = WEBRITI_TEMPLATE_DIR_URI .'/images/slide1.png';
	return $health_center_theme_options=array(
			//Logo and Fevicon header			
			'upload_image_logo'=>'',
			'height'=>'50',
			'width'=>'150',
			'hc_texttitle'=>'on',
			'upload_image_favicon'=>'',
			'home_page_image'=>$defailt_image,
			
			'service_title'=>'Awesome Services',
			'service_description' =>'Lorem ipsum dolor sit amet, consectetuer adipiscing elit lorem ipsum dolor sit amet.',
			
			'service_one_icon'=>'fa-wheelchair',
			'service_one_title'=>'Medical Guidance',
			'service_one_description' =>'Lorem ipsum dolor sit amet, consectetur adipricies sem Unlimited ColorsCras pulvin, maurisoicituding adipiscing, Lorem ipsum dolor sit amet, consect adipiscing elit, sed diam nonummy nibh euis udin',
			
			'service_two_icon'=>'fa-medkit',
			'service_two_title'=>'Emergency Help',
			'service_two_description' =>'Lorem ipsum dolor sit amet, consectetur adipricies sem Unlimited ColorsCras pulvin, maurisoicituding adipiscing, Lorem ipsum dolor sit amet, consect adipiscing elit, sed diam nonummy nibh euis udin',
			
			'service_third_icon'=>'fa-ambulance',
			'service_third_title'=>'Cardio Monitoring',
			'service_third_description' =>'Lorem ipsum dolor sit amet, consectetur adipricies sem Unlimited ColorsCras pulvin, maurisoicituding adipiscing, Lorem ipsum dolor sit amet, consect adipiscing elit, sed diam nonummy nibh euis udin',
			
			'service_four_icon'=>'fa-user-md',
			'service_four_title'=>'Medical Treatments',
			'service_four_description' =>'Lorem ipsum dolor sit amet, consectetur adipricies sem Unlimited ColorsCras pulvin, maurisoicituding adipiscing, Lorem ipsum dolor sit amet, consect adipiscing elit, sed diam nonummy nibh euis udin',
			
			'webrit_custom_css'=>'',			
			'footer_customizations' => ' @ 2014 Health Center. All Rights Reserved. Powered by',
			'created_by_text' => 'Created by',
			'created_by_webriti_text' => 'Webriti',
			'created_by_link' => 'http://www.webriti.com'
	);
}
?>