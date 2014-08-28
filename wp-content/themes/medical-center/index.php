<?php
/**
 * The template for displaying the main.
 *
 *
 * @subpackage Medical Center
 * @since Medical Center
 */
get_header();
get_sidebar(); ?>
	<div id="mdclcntr_content" role="main">
	<?php if ( function_exists( 'qtsndtps_get_random_tip_quote' ) ) qtsndtps_get_random_tip_quote(); ?>
		<?php $count = 0;
		if ( have_posts() ) : 
			while ( have_posts() ) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header>
						<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						<div class="mdclcntr_meta">
							<?php _e( 'Posted on', 'medical_center' ); ?> <a href="<?php the_permalink(); ?>"><?php echo get_the_date( 'j F, Y' ); ?></a>
							<?php if ( has_category() ) : printf( '&nbsp;' . __( 'in', 'medical_center' ) . '&nbsp;' ); the_category( ', ' ); endif; ?>
						</div><!-- mdclcntr_meta -->
					</header>
					<div class="mdclcntr_img_content">
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail( 'mdclcntr_thumb' ); ?></a>
							<?php do_action( 'mdclcntr_the_post_caption' ); ?>
					</div><!-- mdclcntr_img_content -->	
					<div class="mdclcntr_entry_content">
						<?php the_content();
						wp_link_pages();
						if ( $count != 0 ) : ?>
							<div class="link_top"><a href="javascript:scroll(0,0);"><?php  _e( '[Top]', 'medical_center' ); ?></a></div>
						<?php endif; ?>
					</div><!-- mdclcntr_entry_content -->
					<?php if ( has_tag() ) : ?>
						<footer class="mdclcntr_tags">
							<p><?php the_tags( __( 'Tags:', 'medical_center' ) . '&nbsp;', ', ' ); ?></p>
						</footer><!-- mdclcntr_tags -->
					<?php endif;
					$count++; ?>
				</article><!-- post -->
			<?php endwhile;
		endif; ?>
	</div><!-- mdclcntr_content -->
	<div class="link"><?php do_action( 'mdclcntr_pagenavi' ); ?></div><!-- link -->
<div class="clear"></div>
<?php get_footer(); ?>