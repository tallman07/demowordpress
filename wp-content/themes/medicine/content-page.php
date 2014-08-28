<?php global $settings; ?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


	<h1 class="post-title"><?php the_title(); ?></h1>


	<div class="post-body">
		<?php the_post_thumbnail('post-thumbnail', array('class'=>$settings['layout']['fimage_position'])); ?>
		<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'lizard' ) ); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'lizard' ), 'after' => '</div>' ) ); ?>
		<div class="clear"></div>
		<?php comments_template( '', true ); ?>
	</div>
	
	
	
	
</div>