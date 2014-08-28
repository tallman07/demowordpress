<?php get_header(); ?>

	<h1 class="page-title">
	<?php printf( __( 'Category Archives: %s', 'lizard' ), '<span>' . single_cat_title( '', false ) . '</span>' ); ?>
	</h1>
	<?php if ( category_description() ) : ?>
		<div class="archive-meta"><?php echo category_description(); ?></div>
	<?php endif; ?>


<?php get_template_part('loop'); ?>		

<?php get_sidebar(); ?>

<?php get_footer(); ?>