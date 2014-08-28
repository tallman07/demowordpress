<?php
/**
 * The template for displaying archive file.
 *
 *
 * @subpackage Medical Center
 * @since Medical Center
 */
get_header();
get_sidebar(); ?>
	<div id="mdclcntr_content" role="main">
		<?php $count = 0;
		if ( have_posts() ) : ?>
			<h2 class="mdclcntr_title_cat">
				<?php if ( is_day() ) :
					printf( __( 'Daily Archives:', 'medical_center' ) . '&nbsp;' . '%s', '<span>' . get_the_date() . '</span>' );
				elseif ( is_month() ) :
					printf( __( 'Monthly Archives:', 'medical_center' ) . '&nbsp;' . '%s', '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'medical_center' ) ) . '</span>' );
				elseif ( is_year() ) :
					printf( __( 'Yearly Archives:', 'medical_center' ) . '&nbsp;' . '%s', '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'medical_center' ) ) . '</span>' );
				else :
					_e( 'Archives', 'medical_center' );
				endif; ?>
			</h2>
			<?php while ( have_posts() ) : the_post(); ?>
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
						<?php the_excerpt();
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
				<div class="clear"></div>
			<?php endwhile;
		else : ?>
			<article class="post-0" class="post not-found">
				<h2><?php _e( 'Nothing Found', 'medical_center' ); ?></h2>
				<div class="mdclcntr_entry_content">
					<p><?php _e( 'Sorry, unfortunately, we could not find the requested page.', 'medical_center' ); ?></p>
					<?php get_search_form(); ?>
				</div><!-- mdclcntr_entry_content -->
			</article>
		<?php endif; ?>
	</div><!-- mdclcntr_content -->
	<div class="link"><?php do_action( 'mdclcntr_pagenavi' ); ?></div><!-- link -->
<div class="clear"></div>
<?php get_footer(); ?>