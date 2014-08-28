<?php global $settings; ?>

<?php if (((is_single()||is_page())&&(get_post_meta($post->ID, 'pagetemplate', true) == 'left' || get_post_meta($post->ID, 'pagetemplate', true) == 'both' || ($settings['elements']['leftsidebar']['show'] && get_post_meta($post->ID, 'pagetemplate', true) != 'right' && get_post_meta($post->ID, 'pagetemplate', true) != 'full') )) || (!(is_single()||is_page())&&$settings['elements']['leftsidebar']['show'])) { ?>
	
	<div class="sidebar left lzblock" data-block="leftsidebar">	
		<?php dynamic_sidebar( 'Left sidebar' ); ?>
	</div>
<?php } elseif (is_super_admin()) { ?>
	<div class="sidebar left lzblock" style="display:none;" data-block="leftsidebar">	
		<?php dynamic_sidebar( 'Left sidebar' ); ?>
	</div>
<?php } ?>


<?php if (((is_single()||is_page())&&(get_post_meta($post->ID, 'pagetemplate', true) == 'right' || get_post_meta($post->ID, 'pagetemplate', true) == 'both' || ($settings['elements']['rightsidebar']['show'] && get_post_meta($post->ID, 'pagetemplate', true) != 'left' && get_post_meta($post->ID, 'pagetemplate', true) != 'full') )) || (!(is_single()||is_page())&&$settings['elements']['rightsidebar']['show'])) { ?>
	
	<div class="sidebar right lzblock" data-block="rightsidebar">	
		<?php dynamic_sidebar( 'Right sidebar' ); ?>
	</div>
<?php } elseif (is_super_admin()) { ?>
	<div class="sidebar right lzblock" style="display:none;" data-block="rightsidebar">	
		<?php dynamic_sidebar( 'Right sidebar' ); ?>
	</div>
<?php } ?>