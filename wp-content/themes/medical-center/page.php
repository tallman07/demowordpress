<?php
/**
 * The template for displaying the page file.
 *
 *
 * @subpackage Medical Center
 * @since Medical Center
 */
get_header();
get_sidebar(); ?>
	<div id="mdclcntr_content" role="main">
		<?php if ( have_posts() ) :
			while ( have_posts() ) : the_post();?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header>
						<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					</header>	
					<div class="mdclcntr_img_content">
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail( 'mdclcntr_thumb' ); ?></a>
						<?php do_action( 'mdclcntr_the_post_caption' ); ?>
					</div><!-- mdclcntr_img_content -->
					<div class="mdclcntr_entry_content">
						<?php the_content();
						wp_link_pages(); ?>
						<div class="clear"></div>
					</div><!-- mdclcntr_entry_content -->
					<?php if ( comments_open( get_the_ID() ) ) :
							comments_template();
					endif; ?>
					<div class="clear"></div>
					<?php if ( has_tag() ) : ?>
						<footer class="mdclcntr_tags">
							<p><?php the_tags( __( 'Tags:', 'medical_center' ) . '&nbsp;', ', ' ); ?></p>
						</footer><!-- mdclcntr_tags -->
					<?php endif; ?>
				</article><!-- post -->
			<?php endwhile;
		endif; ?>
	</div><!-- mdclcntr_content -->
<div class="clear"></div>
<?php get_footer(); ?>