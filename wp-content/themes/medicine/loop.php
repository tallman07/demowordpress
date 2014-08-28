<div id='container'>
<?php if ( have_posts() ) : ?>
	<?php 
		while ( have_posts() ) : the_post();
		if (is_page())
			get_template_part( 'content', 'page' );
		else
			get_template_part( 'content', get_post_format() ); 
		endwhile; 
	?>

	<?php get_template_part('navigation'); ?>
		
<?php else : ?>
	<div id="post-0" class="entry no-results not-found">
		<h2 class="post-title"><?php _e( 'Nothing Found', 'lizard' ); ?></h2>
		<div class="post-body">
			<p><?php _e( 'Apologies, but no results were found. Perhaps searching will help find a related post.', 'lizard' ); ?></p>
			<?php get_search_form(); ?>
		</div>
	</div>

<?php endif;  ?>
</div>