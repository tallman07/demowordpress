<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 *
 * @subpackage Medical Center
 * @since Medical Center
 */
get_header(); 
get_sidebar(); ?>
	<div id="mdclcntr_content" role="main">
		<article class="post-0" class="post not-found">
			<h2><?php _e( 'Nothing Found', 'medical_center' ); ?></h2>
			<p><?php _e( 'Sorry, unfortunately, we could not find the requested page.', 'medical_center' ); ?></p>
			<?php get_search_form(); ?>
		</article><!-- post-0 -->
	</div><!-- mdclcntr_content -->
<?php get_footer(); ?>