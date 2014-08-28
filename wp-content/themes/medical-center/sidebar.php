<?php
/**
 * The template for displaying the sidebar.
 *
 *
 * @subpackage Medical Center
 * @since Medical Center
 */
?>
<div id="mdclcntr_sidebar">
	<?php if ( ! dynamic_sidebar( 'sidebar' ) ) :

	/* Defualt */
		the_widget( 'WP_Widget_Recent_Posts' );
		the_widget( 'WP_Widget_Recent_Comments' );
		the_widget( 'WP_Widget_Archives' );
		the_widget( 'WP_Widget_Categories' );
	endif; ?>
</div><!-- mdclcntr_sidebar -->