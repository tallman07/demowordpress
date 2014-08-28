<?php get_header(); ?>

	<h1 class="page-title">
	<?php printf( __( 'Tag Archives: %s', 'lizard' ), '<span>' . single_tag_title( '', false ) . '</span>' ); ?>
	</h1>
	<?php if ( tag_description() ) : // Show an optional tag description ?>
		<div class="archive-meta"><?php echo tag_description(); ?></div>
	<?php endif; ?>


<?php get_template_part('loop'); ?>		

<?php get_sidebar(); ?>

<?php get_footer(); ?>