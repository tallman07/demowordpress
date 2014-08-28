<?php
/**
 * The template with code of slider.
 *
 *
 * @subpackage Medical Center
 * @since Medical Center
 */
global $wp_query;
	/* save old value of variable wp_query */
$original_query = $wp_query;
/*add new and change value of variable wp_query*/
$wp_query = null;
$args = array(
	'post_type'				=> 'post', 
	'meta_key'				=> 'mdclcntr_add_slider',
	'meta_value'			=> 'on',
	'posts_per_page'		=> -1,
	'ignore_sticky_posts'	=> -1,
);
$wp_query = new WP_Query( $args );
if ( $wp_query->have_posts() ) : ?>
	<div class="flexslider">
		<ul class="slides">
			<?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
				<li>
					<div class="mdclcntr_slider_text aligncenter">
						<header class="mdclcntr_slider_head aligncenter">
							<h1><?php the_title(); ?></h1>
						</header>
							<?php add_filter( 'excerpt_more', 'mdclcntr_excerpt_for_slider' ); add_filter( 'excerpt_length', 'mdclcntr_length_for_slider' ); ?>
						<div class="mdclcntr_slider_content aligncenter"><?php the_excerpt(); ?>
							<?php remove_filter( 'excerpt_more', 'mdclcntr_excerpt_for_slider' ); remove_filter( 'excerpt_length', 'mdclcntr_length_for_slider' ); ?>
						</div><!-- mdclcntr_slider_content -->
						<a class="slider-more" href="<?php the_permalink(); ?>"><?php _e( 'Learn More', 'medical_center' ); ?></a>
					</div><!-- mdclcntr_slider_text -->
					<?php if ( has_post_thumbnail() ) : 
						the_post_thumbnail( 'mdclcntr_slider' ); 
						endif; ?>
				</li>
			<?php endwhile; ?>
		</ul><!-- slides -->
	</div><!-- flexslider -->
<?php endif;
$wp_query = null;
$wp_query = $original_query;
wp_reset_postdata(); ?>