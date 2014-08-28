<?php 
/**
*Functions and definitions.
*
*
* @subpackage Medical Center
* @since Medical Center
*/

/**
*Theme setup.
*
*/
function mdclcntr_setup() {
	if ( ! isset( $content_width ) )
		$content_width = 620;
	/* This theme styles the visual editor with editor-style.css to match the theme style. */
	add_editor_style();
	/* This theme uses post thumbnails */
	add_theme_support( 'post-thumbnails' );
	/* Set size of thumbnails */
	add_image_size( 'mdclcntr_thumb', 560, 9999, true );
	/* This theme uses slider */
	add_theme_support( 'mdclcntr_slider' );
	/* Set size of slider */
	add_image_size( 'mdclcntr_slider', 1920, 420, true );
	/* Register Simple Classic menu */
	register_nav_menu( 'primary', __( 'menu', 'Medical Center' ) ); 
	/* load_theme_textdomain() for translation/localization support */
	load_theme_textdomain( 'medical_center', get_template_directory() . '/languages' );
	/* This theme uses body background */
	$defaults = array(
		'default-color'				=> 'ffffff',
		'default-image'				=> '',
		'default-repeat'			=> '',
		'default-position-x'		=> '',
		'wp-head-callback'			=> '_custom_background_cb',
		'admin-head-callback'		=> '',
		'admin-preview-callback'	=> ''
	);
	add_theme_support( 'custom-background', $defaults );
	/* This theme uses custom header */	
	$defaults = array( 
		'width'					=> 1920,
		'height'				=> 120,
		'header-text'			=> true,
		'uploads'				=> true,
		'default-text-color'	=> '576167',
		'wp-head-callback'		=> 'mdclcntr_header_style',
	);		
	add_theme_support( 'custom-header', $defaults );
	/* Add default posts and comments RSS feed links to head */
	add_theme_support( 'automatic-feed-links' );
} /* mdclcntr_setup */

/**
* Style the displaying title
*
*/
function mdclcntr_filter_wp_title( $title, $sep ) {
	global $paged, $page;
		if ( is_feed() )
			return $title;
	/* Add the site name. */
	$title .= get_bloginfo( 'name' );
		return $title;
} 

/**
* Style the text displayed on the blog.
*
*/
function mdclcntr_header_style() {
	$text_color = get_header_textcolor();
	/* If no custom options for text are set, let's bail. */
	if ( $text_color == HEADER_TEXTCOLOR )
		return;
	/* If we get this far, we have custom styles. Let's do this. */?>
	<style type="text/css">
	<?php /* Has the text been hidden? */
		if ( 'blank' == $text_color ) : ?>
		.site_title {
			position: relative;
		}
	<?php /* If the user has set a custom color for the text use that */
		else : ?>
		.site_title a,
		.site_description {
			color: #<?php echo $text_color; ?> !important;
		}
	<?php endif; ?>
	</style>
	<?php
} /* mdclcntr_header_style */

/**
 *Our sidebars and widgets areas.
 *
 */
function mdclcntr_widgets_init() {
	register_sidebar( array(
		'name' 			=> 'Sidebar',
		'id' 			=> 'sidebar',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">', 
		'after_widget'	=> '</aside>', 
		'before_title'	=> '<h2 class="widgettitle">', 
		'after_title'	=> '</h2>',
		) 
	);
}/* mdclcntr_widgets_init */


/**
*Our css and scripts.
*
*/
function mdclcntr_scripts_method() {
	wp_enqueue_style( 'mdclcntrStyle', get_stylesheet_uri() );
	wp_enqueue_script( 'comment-reply' );
	wp_enqueue_script( 'mdclcntrScript', get_stylesheet_directory_uri() . '/js/scripts.js', array( 'jquery' ) );
	wp_enqueue_script( 'mdclcntrJquery.flexslider', get_stylesheet_directory_uri() . '/js/jquery.flexslider-min.js', array( 'jquery' ) );
	wp_enqueue_script( 'mdclcntrHtml5', get_stylesheet_directory_uri() . '/js/html5.js', array( 'jquery' ) );
	?>
	<script type="text/javascript">
		var mdclcntr_home_url = '<?php echo esc_url( home_url() ); ?>';
	</script>
<?php }/* mdclcntr_scripts_method */

/**
*Our slider.
*
*/
function mdclcntr_metabox_for_slider() { //adding metabox for show post in slider
	add_meta_box( 
		'metabox_id',
		'Add to slider',
		'mdclcntr_metabox_for_slider_callback',
		'post',
		'normal',
		'high' 
	);
}

/**
*Our customize metabox.
*
*/
function mdclcntr_metabox_for_slider_callback() { 
	global $post; 
	$screen = get_current_screen(); ?>
	<label for='mdclcntr_add_slider'><?php echo __( 'If you want to add this post in slider, choose the checkbox', 'medical_center' ); ?></label>
	<input type='checkbox' name='mdclcntr_add_slider' id='mdclcntr_add_slider' value='on' <?php if ( 'on' == get_post_meta( $post->ID, 'mdclcntr_add_slider', true ) ) { ?> checked='checked' <?php } ?> />
<?php 
}/* metabox_for_slider_callback */

/**
*Add and save meta for post.
*
*/
function mdclcntr_save_post_meta_for_slider( $post_id ) { // add and save meta for post
	global $post, $post_id;	
	// autosave
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
		return $post_id;
	elseif ( ! current_user_can( 'edit_post', $post_id ) ) {
		return $post_id;
	}
	if ( wp_is_post_revision( $post_id ) )
		return $post_id;
	if ( $post != null ) {
		if ( ! ( isset( $_POST[ 'mdclcntr_add_slider' ] ) ) || ! ( update_post_meta( $post->ID, 'mdclcntr_add_slider', 'on' ) ) ) {
			update_post_meta( $post->ID, 'mdclcntr_add_slider', 'off' );
		}
	}
}/* save_post_meta_for_slider */



/**
*Our excerpt in the slider.
*
*/
function mdclcntr_excerpt_for_slider( $more ) {
	return ''; //remove the ellipsis in the slider.
}/* new_excerpt_more */

function mdclcntr_length_for_slider( $length ) {
	return 25; //number of input words in the slider.
}/* new_excerpt_length */

/**
*Our Breadcrumb for header.
*
*/
function mdclcntr_the_breadcrumb() {
global $post;
	if ( ! is_front_page() ) { ?>
		<a href='<?php echo esc_url( home_url() ); ?>'><?php _e( 'Home', 'medical_center' ); ?></a> -
		<?php if ( is_category() || is_single() ) {
			if ( is_single() ) {
				if ( isset( $_GET[ 'page' ] ) && ! empty( $_GET[ 'page' ] ) ) {
					echo the_title() . ' - ' . $_GET[ 'page' ] ;
				}
				elseif ( is_attachment() ) {
					echo the_title();
				}
				else {
					echo ' - ' . the_category( ', ' ) . get_the_title();
				}
			}
			elseif ( is_category() ) {
				echo single_cat_title();
			}
		}
		elseif ( is_tag() ) {
			echo single_tag_title( '', false );
		}
		elseif ( is_page() ) {
			/*Reverse post ancestors if it has*/
			if( $post->ancestors ) {
				$ancestors = array_reverse( $post-> ancestors );
				for( $i = 0; $i < count( $ancestors); $i++ ) {
					if ( 0 == $i ) {
						echo '<a href=' . get_permalink( $ancestors[ $i ] ) . '>' . get_the_title( $ancestors[ $i ] ) . '</a>' . ' - ';
					}
					else {
						echo '<a href=' . get_permalink( $ancestors[ $i ] ) . '>' . get_the_title( $ancestors[ $i ] ) . '</a>' . ' - ';
					}
				}
			}
			else {
				$ancestors = get_the_title();
			}
			/*Display elements of array as breadcrumbs*/
			echo get_the_title();
		}
		elseif ( is_search() ) {
			printf( __( 'Search Results for:', 'medical_center' ) . '&nbsp;' . get_search_query() );
		}
		elseif ( is_archive() ) {
			if ( is_author() ) {
				echo the_category( ', ' ) . ' - ' . __( 'Author archives', 'medical_center' );
			}
			else {
				echo the_category( ', ' ) . ' - ' . get_the_date( 'F Y' );
			}
		}
		elseif ( is_404() ) {
			_e( 'Page not found', 'medical_center' );
		}
	}
	else { ?>
		<a href='<?php echo esc_url( home_url() ); ?>'><?php _e( 'Home', 'medical_center' ); ?></a>
	<?php }
} // end mdclcntr_the_breadcrumb

/**
 *Caption for feature image.
 *
 */
function mdclcntr_the_post_caption( $size = '', $attr = '' ) {
	global $post;
	$thumb_id = get_post_thumbnail_id( $post->ID );
	$args = array(
		'post_type' => 'attachment',
		'post_status' => null,
		'parent' => $post->ID,
		'include'  => $thumb_id
	);
	$thumbnail_image = get_posts( $args );
	if ( $thumb_id && $thumbnail_image && isset( $thumbnail_image[ 0 ] ) ) :
		// Showing the thumbnail caption
		$caption = $thumbnail_image[ 0 ] ->post_excerpt;
		if ( $caption ) :
			$output = '<div class="wp-caption-text">';
			$output .= $caption;
			$output .= '</div>';
			echo $output;
		endif;
	endif;
}/* mdclcntr_the_post_caption */

/* 
* Template for comments and pingbacks
*
*/
function mdclcntr_comment( $comment, $args, $depth ) {
	$GLOBALS[ 'comment' ] = $comment;
	switch ( $comment ->comment_type ) :
		case 'pingback' :
		case 'trackback' :
		// display trackbacks differently than normal comments. ?>
			<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
				<p><?php _e( 'Pingback:', 'medical_center' ); comment_author_link();  edit_comment_link( __( '(Edit)', 'medical_center' ), '<span class="edit-link">', '</span>' ); ?></p>
			<?php break;
		default :
			// proceed with normal comments.
			global $post; ?>
			<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
				<article id="comment-<?php comment_ID(); ?>" class="comment">
					<header class="comment-meta comment-author vcard">
						<?php
							echo get_avatar( $comment, 40 );
							printf( '<cite class="fn">%1$s %2$s</cite>',
								get_comment_author_link(),
								// If current post author is also comment author, make it known visually.
								( $comment->user_id === $post->post_author ) ? '<span> ' . __( 'Post author', 'medical_center' ) . '</span>' : '' );
							echo '</br>';
							printf( '<a href="%1$s"><time datetime="%2$s">%3$s</time></a>',
								esc_url( get_comment_link( $comment->comment_ID ) ),
								get_comment_time( 'c' ),
								/* translators: 1: date, 2: time */
								sprintf( __( '%1$s at %2$s', 'medical_center' ), get_comment_date(), get_comment_time() )
							);
						?>
					</header><!-- .comment-meta -->
					<?php if ( '0' == $comment->comment_approved ) : ?>
						<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'medical_center' ); ?></p>
					<?php endif; ?>
					<section class="comment-content comment">
						<?php comment_text();
							 edit_comment_link( __( 'Edit', 'medical_center' ), '<div class="edit-link">', '</div>' );
						 ?>
						 <div class="reply">
							<?php comment_reply_link( array_merge( 
								$args, array( 
								'reply_text'	=> __( 'Reply', 'medical_center' ), 
								'after'			=> ' <span>&darr;</span>', 
								'depth'			=> $depth, 
								'max_depth'		=> $args[ 'max_depth' ] 
							) ) ); ?>
						</div><!-- .reply -->
					</section><!-- .comment-content -->
				</article><!-- #comment-## -->
			<?php break;
	endswitch; // end comment_type check
}/* mdclcntr_comment */

/**
*Our page nav.
*
*/
function mdclcntr_pagenavi() {
	global $wp_query;
	$big = 999999999; // unique number for editing.
	$args = array(
		'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) )
		,'format' => ''
		,'current' => max( 1, get_query_var( 'paged' ) )
		,'total' => $wp_query->max_num_pages
		,'prev_text' => ''
		,'next_text' => ''
	);
	$result = paginate_links( $args );
	echo $result;
}/* mdclcntr_pagenavi */

add_action( 'after_setup_theme', 'mdclcntr_setup' );
add_filter( 'wp_title', 'mdclcntr_filter_wp_title', 1, 3 );
add_action( 'widgets_init', 'mdclcntr_widgets_init' );
add_action( 'wp_enqueue_scripts', 'mdclcntr_scripts_method' );
add_action( 'add_meta_boxes', 'mdclcntr_metabox_for_slider' );
add_action( 'save_post', 'mdclcntr_save_post_meta_for_slider' );
add_filter( 'excerpt_more', 'mdclcntr_excerpt_for_slider' );
add_filter( 'excerpt_length', 'mdclcntr_length_for_slider' );
add_action( 'mdclcntr_the_breadcrumb', 'mdclcntr_the_breadcrumb' );
add_action( 'mdclcntr_the_post_caption', 'mdclcntr_the_post_caption' );
add_action( 'mdclcntr_pagenavi', 'mdclcntr_pagenavi' );

?>