<?php
	global $wp_query, $settings;
	if ( $wp_query->max_num_pages > 1 ) :
	
	switch( $settings['layout']['pagination'] ) {
		case 'wp':
		?>
		<nav class="pagination wp" role="navigation">
			<div class="nav-previous alignleft"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'lizard' ) ); ?></div>
			<div class="nav-next alignright"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'lizard' ) ); ?></div>
		</nav>
		<?php break;
		
		case 'numeric': ?>
		<nav class="pagination numeric"  role="navigation">
		<?php
			$big = 999999999;
			echo paginate_links( array(
			'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
			'format' => '?paged=%#%',
			'current' => max( 1, get_query_var('paged') ),
			'total' => $wp_query->max_num_pages
		) );
		?>
		</nav>
		<?php break;
		
		case 'dynamic':
		if ($nextPageLink=preg_replace('/.*href="(.*)".*/', '$1', get_next_posts_link())) : ?>
			<nav class="pagination dynamic"  role="navigation" href="<?php echo $nextPageLink; ?>">
				<?php _e('Next page', 'lizard'); ?>
				<script>
				jQuery('.pagination.dynamic').live('click', function() {
					jQuery.post('<?php echo $nextPageLink; ?>', {
							'action':'get_posts_ajax'
						}, 
						function(response){
							jQuery('.pagination').hide();
							jQuery('#container').html(jQuery('#container').html()+response);
							
						}
					);
				});
				</script>
			</nav>
		<?php endif;
		break;
	}
	endif;