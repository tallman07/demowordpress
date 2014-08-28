<?php
/**
 * Setup the WordPress core custom header feature.
 *
 * @uses govpress_header_style()
 * @uses govpress_admin_header_style()
 * @uses govpress_admin_header_image()
 *
 * @package GovPress
 */
function govpress_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'govpress_custom_header_args', array(
		'default-image'          => '',
		'default-text-color'     => '0072BC',
		'width'                  => 1160,
		'height'                 => 250,
		'flex-width' 			 => true,
		'flex-height'            => true,
		'wp-head-callback'       => 'govpress_header_style',
		'admin-head-callback'    => 'govpress_admin_header_style',
		'admin-preview-callback' => 'govpress_admin_header_image',
	) ) );
}
add_action( 'after_setup_theme', 'govpress_custom_header_setup' );

if ( ! function_exists( 'govpress_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see govpress_custom_header_setup().
 */
function govpress_header_style() {
	$header_text_color = get_header_textcolor();

	// If no custom options for text are set, let's bail
	// get_header_textcolor() options: HEADER_TEXTCOLOR is default, hide text (returns 'blank') or any hex value
	if ( HEADER_TEXTCOLOR == $header_text_color ) {
		return;
	}

	// If we get this far, we have custom styles. Let's do this.
	?>
	<style type="text/css">
	<?php
		// Has the text been hidden?
		if ( 'blank' == $header_text_color ) :
	?>
		.site-title,
		.site-description {
			position: absolute;
			clip: rect(1px, 1px, 1px, 1px);
		}
	<?php
		// If the user has set a custom color for the text use that
		else :
	?>
		.site-title a {
			color: #<?php echo $header_text_color; ?>;
		}
	<?php endif; ?>
	</style>
	<?php
}
endif; // govpress_header_style

if ( ! function_exists( 'govpress_admin_header_style' ) ) :
/**
 * Styles the header image displayed on the Appearance > Header admin panel.
 *
 * @see govpress_custom_header_setup().
 */
function govpress_admin_header_style() {
?>
	<style type="text/css">
		.appearance_page_custom-header #headimg {
			border: none;
		}
		#headimg h1,
		#desc {
		}
		#headimg h1 {
		}
		#headimg h1 a {
		}
		#desc {
		}
		#headimg img {
		}
	</style>
<?php
}
endif; // govpress_admin_header_style

if ( ! function_exists( 'govpress_admin_header_image' ) ) :
/**
 * Custom header image markup displayed on the Appearance > Header admin panel.
 *
 * @see govpress_custom_header_setup().
 */
function govpress_admin_header_image() {
	$style = sprintf( ' style="color:#%s;"', get_header_textcolor() );
?>
	<div id="headimg">
		<h1 class="displaying-header-text"><a id="name"<?php echo $style; ?> onclick="return false;" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
		<div class="displaying-header-text" id="desc"<?php echo $style; ?>><?php bloginfo( 'description' ); ?></div>
		<?php if ( get_header_image() ) : ?>
		<img src="<?php header_image(); ?>" alt="">
		<?php endif; ?>
	</div>
<?php
}
endif; // govpress_admin_header_image
