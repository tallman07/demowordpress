<?php 
/**
 * The template for displaying search form.
 *
 *
 * @subpackage Medical Center
 * @since Medical Center
 */
?>
<div class="mdclcntr_search">
	<form action="<?php echo esc_url( home_url() ); ?>" method="get">
		<input type="text" placeholder="<?php _e( 'Enter search keyword', 'medical_center' ); ?>" class="form" name="s">
		<input type="submit"  class="header_image" value="">
	</form>
</div><!-- mdclcntr_search -->