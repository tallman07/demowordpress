<?php
/*	@Theme Name	:	Health-Center
* 	@file         :	sidebar.php
* 	@package      :	Health-Center
* 	@author       :	Hari Maliya
* 	@license      :	license.txt
* 	@filesource   :	wp-content/themes/health-center/sidebar.php
*/	
?>
<div class="col-md-4 hc_sidebar">	
   <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar-primary') ) : ?> 
		<?php the_widget('WP_Widget_Archives'); ?>
		<?php the_widget('WP_Widget_Categories'); ?>
	<?php endif; ?>
</div>