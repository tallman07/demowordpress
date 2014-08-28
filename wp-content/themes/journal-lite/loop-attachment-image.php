<?php
	global $multipage;

	// Loop through posts
	if ( have_posts() ) :
		while ( have_posts() ) : the_post();
?>
	<section id="post-<?php the_ID(); ?>" <?php post_class( 'post single-post cf' ); ?>>
		<section class="post-container">
			<article class="post-content">
				<section class="post-title-wrap cf <?php echo ( has_post_thumbnail() ) ? 'post-title-wrap-featured-image' : 'post-title-wrap-no-image'; ?>">
					<h1 class="post-title"><?php the_title(); ?></h1>
					<p class="post-date"><?php the_time( 'F j, Y' ); ?></p>
				</section>

				<p>
					<?php
						$metadata = wp_get_attachment_metadata();
						printf( '<span class="meta-prep meta-prep-entry-date">Published</span> <span class="entry-date"><time class="entry-date" datetime="%1$s">%2$s</time></span> at <a href="%3$s" title="Link to full-size image">%4$s &times; %5$s</a> in <a href="%6$s" title="Return to %7$s" rel="gallery">%8$s</a>.',
							esc_attr( get_the_date( 'c' ) ),
							esc_html( get_the_date() ),
							esc_url( wp_get_attachment_url() ),
							$metadata['width'],
							$metadata['height'],
							esc_url( get_permalink( $post->post_parent ) ),
							esc_attr( strip_tags( get_the_title( $post->post_parent ) ) ),
							get_the_title( $post->post_parent )
						);
					?>
				</p>

				<section class="attachment">
					<?php
					/**
					 * Grab the IDs of all the image attachments in a gallery so we can get the URL of the next adjacent image in a gallery,
					 * or the first image (if we're looking at the last image in a gallery), or, in a gallery of one, just the link to that image file
					 */
					$attachments = array_values( get_children( array( 'post_parent' => $post->post_parent, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => 'ASC', 'orderby' => 'menu_order ID' ) ) );
					foreach ( $attachments as $k => $attachment )
						if ( $attachment->ID == $post->ID )
							break;

					$k++;
					// If there is more than 1 attachment in a gallery
					if ( count( $attachments ) > 1 ) :
						if ( isset( $attachments[ $k ] ) ) :
							// get the URL of the next image attachment
							$next_attachment_url = get_attachment_link( $attachments[ $k ]->ID );
						else :
							// or get the URL of the first image attachment
							$next_attachment_url = get_attachment_link( $attachments[ 0 ]->ID );
						endif;
					else :
						// or, if there's only 1 image, get the URL of the image
						$next_attachment_url = wp_get_attachment_url();
					endif;
					?>

					<a href="<?php echo esc_url( $next_attachment_url ); ?>" title="<?php the_title_attribute(); ?>" rel="attachment">
						<?php echo wp_get_attachment_image( $post->ID, 'large' ); ?>
					</a>

					<?php if ( ! empty( $post->post_excerpt ) ) : ?>
					<section class="entry-caption">
						<?php the_content(); ?>
					</section>
					<?php endif; ?>
				</section>

				<section class="entry-description">
					<?php the_content(); ?>

					<section class="clear"></section>

					<?php if ( $multipage ) : ?>
						<section class="single-post-navigation single-post-pagination wp-link-pages">
							<?php wp_link_pages(); ?>
						</section>
					<?php endif; ?>

					<?php edit_post_link( __( 'Edit Attachment', 'journal' ) ); // Allow logged in users to edit ?>
				</section>
			</article>

			<?php sds_single_image_navigation(); ?>
		</section>
	</section>

	<?php get_template_part( 'post', 'author' ); // Author Details ?>

	<section class="clear"></section>
<?php
		endwhile;
	endif;
?>