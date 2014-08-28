<?php get_header(); ?>

	<h1 class="page-title">
	<?php printf( __( 'Search Results for: %s', 'lizard' ), '<span>' . get_search_query() . '</span>' ); ?>
	</h1>
	<hr />

<?php get_template_part('loop'); ?>		

<?php get_sidebar(); ?>

<?php get_footer(); ?>