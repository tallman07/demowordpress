<?php	
/**
Template Name:Business Home Page 
* @Theme Name	:	healthcenter
* @file         :	front-healthcenter.php
* @package      :	healthcenter
* @author       :	Hari Maliya
* @license      :	license.txt
* @filesource   :	wp-content/themes/health-center/front-healthcenter.php
*/
	get_header();	
?>
<?php $current_options=get_option('hc_lite_options'); 
if($current_options['home_page_image']!='') { ?>
<div class="row">		
	<img style="height:450px; width:1200px;" src="<?php echo $current_options['home_page_image']; ?>" class="img-responsive" />
</div>	
<?php } ?>
<!-- HC Service Section -->
<div class="container" id="service_section">	
	<div class="row">
		<div class="hc_service_title">
			<?php if($current_options['service_title']!='') { ?>
			<h1><?php echo $current_options['service_title']; ?></h1>
			<?php } ?>
			<?php if($current_options['service_description']!='') { ?>
			<p><?php echo $current_options['service_description']; ?>.</p>
			<?php } ?>		
		</div>
	</div>	
	<div class="row">	
		<div class="col-md-3 hc_service_area">
			<?php if($current_options['service_one_icon']!='') { ?>
			<i class="fa <?php echo $current_options['service_one_icon']; ?>"></i>
			<?php } ?>
			<?php if($current_options['service_one_title']!='') { ?>
			<h2><a href="#"><?php echo $current_options['service_one_title']; ?></a></h2>
			<?php } ?>
			<?php if($current_options['service_one_description']!='') { ?>
			<p><?php echo $current_options['service_one_description']; ?> </p>
			<?php } ?>
		</div>	
		<div class="col-md-3 hc_service_area">
			<?php if($current_options['service_two_icon']!='') { ?>
			<i class="fa <?php echo $current_options['service_two_icon']; ?>"></i>
			<?php } ?>
			<?php if($current_options['service_two_title']!='') { ?>
			<h2><a href="#"><?php echo $current_options['service_two_title']; ?></a></h2>
			<?php } ?>
			<?php if($current_options['service_two_description']!='') { ?>
			<p><?php echo $current_options['service_two_description']; ?> </p>
			<?php } ?>
		</div>	
		<div class="col-md-3 hc_service_area">
			<?php if($current_options['service_third_icon']!='') { ?>
			<i class="fa <?php echo $current_options['service_third_icon']; ?>"></i>
			<?php } ?>
			<?php if($current_options['service_third_title']!='') { ?>
			<h2><a href="#"><?php echo $current_options['service_third_title']; ?></a></h2>
			<?php } ?>
			<?php if($current_options['service_third_description']!='') { ?>
			<p><?php echo $current_options['service_third_description']; ?> </p>
			<?php } ?>
		</div>	
		<div class="col-md-3 hc_service_area">
			<?php if($current_options['service_four_icon']!='') { ?>
			<i class="fa <?php echo $current_options['service_four_icon']; ?>"></i>
			<?php } ?>
			<?php if($current_options['service_four_title']!='') { ?>
			<h2><a href="#"><?php echo $current_options['service_four_title']; ?></a></h2>
			<?php } ?>
			<?php if($current_options['service_four_description']!='') { ?>
			<p><?php echo $current_options['service_four_description']; ?> </p>
			<?php } ?>
		</div>	
		
	</div>			
</div>
<?php get_footer(); ?>