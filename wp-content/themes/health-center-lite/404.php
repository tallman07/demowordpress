<?php
/*	@Theme Name	:	Health-Center
* 	@file         :	404.php
* 	@package      :	Health-Center
* 	@author       :	Hari Maliya
* 	@license      :	license.txt
* 	@filesource   :	wp-content/themes/health-center/404.php
*/
get_header(); ?>
<!-- HC Page Header Section -->	
<div class="container">
	<div class="row">
		<div class="hc_page_header_area">
		<h1><?php _e('Error 404','health'); ?></h1>		
		</div>
	</div>
</div>
<!-- /HC Page Header Section -->
<!-- HC 404 Error Section -->	
<div class="container">
	<div class="row">		
		<div class="col-md-12 hc_404_error_section">
			<div class="error_404">
				<h2><?php _e('Error 404','health'); ?></h2>
				<h4><?php _e('Oops! Page not found','health'); ?></h4>
				<p><?php _e('We`re sorry, but the page you are looking for doesn`t exist.','health'); ?></p>
				<p><a href="<?php echo esc_html(site_url()); ?>" class="error_404_btn"><?php _e('Go to Homepage','health'); ?></a></p>
			</div>
		</div>		
	</div>	
</div>
<!-- /HC 404 Error Section -->
<?php get_footer(); ?>