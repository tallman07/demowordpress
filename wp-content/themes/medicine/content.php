<?php global $settings; ?>

<div id="post-<?php the_ID(); ?>" <?php post_class('entry'); ?>>
	<span class='post-date'><?php echo get_the_date('d'); ?><br/><span class='month'><?php echo get_the_date('M'); ?></span></span>
	<?php if ( is_single() ) : ?>
		<h1 class="post-title"><?php the_title(); ?></h1>
	<?php else : ?>
		<h2 class="post-title"><div class='leaf'><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'lizard' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a></div></h2>
	<?php endif; // is_single() ?>

	

	<div class="post-body">
	<?php the_post_thumbnail('post-thumbnail', array('class'=>$settings['layout']['fimage_position'])); ?>	
		<p class="post-meta"><?php medicine_entry_meta(); ?></p>
		<?php if ( !is_single() ) : ?>
		<?php if ( ! post_password_required() ) { medicine_custom_excerpt( 'echo=true' ); } else the_content(''); ?>
		<?php else : ?>
		<?php the_content(  ); ?>
		<?php endif; // is_single() ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'lizard' ), 'after' => '</div>' ) ); ?>
		<div class="clear"></div>
	</div>
	
	
	
	<?php if ( !is_single() ) : ?>
		<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'lizard' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark" class="readmore"><?php echo __( 'Read more', 'lizard' ) ?></a>
	<?php else : ?>
	<?php 
		$tag_list = get_the_tag_list( '', ', ' );
		if ( $tag_list ) { ?>
			<div class="tags"><?php _e('Tags', 'lizard'); ?>:&nbsp;<?php echo $tag_list; ?></div>
		<?php }
	?>
	
	<?php if ($settings['layout']['relatedposts']) {
		get_template_part('relatedposts');
	} ?>
	
	<?php endif; // is_single() ?>
	
	<?php comments_template( '', true ); ?>
	
</div>