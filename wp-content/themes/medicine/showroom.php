<?php global $settings; ?>
<?php if ( ($settings['elements']['showroom']['show'] || is_super_admin())&&(is_front_page()||$settings['showroom']['srinnerpages']) ) { ?>

<div class='lzblock' data-block="showroom" <?php if (!$settings['elements']['showroom']['show']&&is_super_admin()) echo 'style="display:none"'; ?>>
<div class='showroom-block'>

<?php 
	$args=array( 'post_type' => $settings['showroom']['showroomsrc'], 'posts_per_page' => 4 );
	if ( $settings['showroom']['onlymarked'] ) {$args['meta_key']='forshowroom';$args['meta_value']=true;}
	$items = new WP_Query( $args ); 
?>
<?php while ( $items->have_posts() ) : $items->the_post(); ?>

			<div class='item'>
				<?php echo get_the_post_thumbnail( $post->ID, 'showroom' ); ?>
				<h3><?php echo $post->post_title; ?></h3>
				<?php if ($settings['showroom']['length'] > 0) medicine_custom_excerpt('echo=true&maxchar='.$settings['showroom']['length']); ?>
				<a href='<?php the_permalink(); ?>' class='readmore'><?php echo $settings['showroom']['srreadmore']; ?></a>
			</div>

<?php endwhile; ?>
<?php wp_reset_query(); ?>
			<div class='clear'></div>
		</div>
</div>
<?php } ?>