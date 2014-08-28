<header class="archive-title">
	<?php sds_archive_title(); ?>
</header>

<?php
	// Loop through posts
	if ( have_posts() ) :
		while ( have_posts() ) : the_post();
?>
	<section id="post-<?php the_ID(); ?>" <?php post_class( 'post cf' ); ?>>
		<section class="post-container">
			<section class="post-title-wrap cf <?php echo ( has_post_thumbnail() ) ? 'post-title-wrap-featured-image' : 'post-title-wrap-no-image'; ?>">
				<h1 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>

				<?php if ( $post->post_type === 'post' ) : ?>
					<p class="post-date">
						<?php
						if ( strlen( get_the_title() ) > 0 ) :
							the_time( 'F j, Y' );
						else: // No title
							?>
							<a href="<?php the_permalink(); ?>"><?php the_time( 'F j, Y' ); ?></a>
						<?php
						endif;
						?>
					</p>
				<?php endif; ?>
			</section>

			<?php sds_featured_image( true ); ?>

			<article class="post-content cf">
				<?php
					// Display excerpt if one has been specifically set by post author
					if ( ! empty( $post->post_excerpt ) ) :
						the_excerpt();
				?>
						<p><a href="<?php the_permalink(); ?>" class="more-link">'Read More</a></p>
				<?php
					else :
						the_content();
					endif;
				?>
			</article>
		</section>
	</section>
<?php
		endwhile;
	else : // No posts
?>
	<section class="no-results no-posts no-home-results post">
		<section class="post-container">
			<?php sds_no_posts(); ?>
		</section>
	</section>
<?php endif; ?>