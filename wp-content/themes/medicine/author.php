<?php get_header(); ?>

	<h1 class="archive-title"><?php printf( __( 'Author Archives: %s', 'lizard' ), '<span class="vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( "ID" ) ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a></span>' ); ?></h1>
	<hr />
	
<?php get_template_part('loop'); ?>		

<?php get_sidebar(); ?>
		
<?php get_footer(); ?>