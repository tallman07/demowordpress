<?php
/**
 * The template for displaying image attachments.
 *
 *
 * @subpackage Medical Center
 * @since Medical Center
 */
get_header();
get_sidebar(); ?>
	<div id="mdclcntr_content" role="main">
		<?php if ( have_posts() ) :
			while ( have_posts() ) : the_post(); ?>
				<div id="nav-single">
						<span class="nav-previous"><?php previous_image_link( '%link', '<span class="meta-nav">&larr;</span> ' . __( 'Previous', 'medical_center' ) ); ?></span>
						<span class="nav-next"><?php next_image_link( '%link', __( 'Next', 'medical_center' ) . '<span class="meta-nav">&rarr;</span>' ); ?></span>
				</div><!-- #nav-single -->
				<?php $metadata = wp_get_attachment_metadata(); ?>
				<article <?php post_class(); ?>>
					<header>
						<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						<div class="mdclcntr_meta">
							<?php _e( 'Posted on', 'medical_center' ); ?> <a href="<?php the_permalink(); ?>"><?php the_date(); ?></a> 
							<?php _e( 'at', 'medical_center' ); ?> <a href="<?php echo wp_get_attachment_url(); ?>" target="_blank"><?php echo $metadata[ 'width' ].' &times; '.$metadata[ 'height' ]; ?></a>
							<?php _e( 'in', 'medical_center' ); ?> <a href = "<?php echo get_permalink( $post->post_parent ); ?>"><?php echo get_the_title( $post->post_parent ); ?></a>
						</div><!-- mdclcntr_meta -->
					</header>
					<div class="image-attachment">
						<?php $attachments = array_values( 
							get_children( array(
								'post_parent'		=> $post->post_parent,
								'post_status'		=> 'inherit',
								'post_type'			=> 'attachment',
								'post_mime_type'	=> 'image',
								'order'				=> 'ASC',
								'orderby'			=> 'menu_order ID'
						)	)	);
						foreach( $attachments as $k => $attachment ) {
							if ( $attachment->ID == $post->ID )
						break;
						}
						$k++;
						/* If there is more than 1 attachment in a gallery */
						if ( count( $attachments ) > 1 ) {
							if ( isset( $attachments[ $k ] ) )
								/* Get the URL of the next image attachment */
								$next_attachment_url = get_attachment_link( $attachments[ $k ]->ID );
							else
								/* Or get the URL of the first image attachment */
								$next_attachment_url = get_attachment_link( $attachments[ 0 ]->ID );
						}	else {
							/* Or, if there's only 1 image, get the URL of the image */
							$next_attachment_url = wp_get_attachment_url();
						} ?>
						<a href="<?php echo esc_url( $next_attachment_url ); ?>" title="<?php the_title_attribute(); ?>" rel="attachment">
							<?php $attachment_size = apply_filters( 'mdclcntr_attachment_size', array( 560, 9999 ) ); /* Filterable image width with 560px limit for image height. */
							echo wp_get_attachment_image( $post->ID, $attachment_size );  ?>
						</a>
						<?php if ( ! empty( $post->post_excerpt ) ) : ?>
							<div class="mdclcntr_img_content">
								<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail( 'mdclcntr_thumb' ); ?></a>
								<?php do_action( 'mdclcntr_the_post_caption' ); ?>
							</div><!-- mdclcntr_img_content -->
						<?php endif; ?>
					</div><!-- .image-attachment -->
					<div class="mdclcntr_entry_content">
						<?php the_content();
						wp_link_pages(); ?>
					</div><!-- mdclcntr_entry_content -->
					<?php if ( has_tag() ) : ?>
						<footer class="mdclcntr_tags">
							<p><?php the_tags( __( 'Tags:', 'medical_center' ) . '&nbsp;', ', ' ); ?></p>
						</footer><!-- mdclcntr_tags -->
					<?php endif; ?>
				</article><!-- post -->
			<?php endwhile;	
		endif; ?>
	</div><!-- mdclcntr_content -->
	<div class="link"><?php do_action( 'mdclcntr_pagenavi' ); ?></div><!-- link -->
<div class="clear"></div>
<?php get_footer(); ?>