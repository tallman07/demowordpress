<?php
/**
 * This class manages all functionality with our Journal theme.
 */
class Journal {
	const JOURNAL_VERSION = '1.0.3';

	private static $instance; // Keep track of the instance

	/**
	 * Function used to create instance of class.
	 */
	public static function instance() {
		if ( ! isset( self::$instance ) )
			self::$instance = new Journal;

		return self::$instance;
	}


	/**
	 * This function sets up all of the actions and filters on instance
	 */
	function __construct() {
		add_action( 'after_setup_theme', array( $this, 'after_setup_theme' ), 20 ); // Register image sizes, nav menus, etc...
		//add_action( 'pre_get_posts', array( $this, 'pre_get_posts' ) ); // Used to enqueue editor styles based on post type
		add_action( 'widgets_init', array( $this, 'widgets_init' ), 20 ); // Unregister sidebars and alter Primary Sidebar output
		add_action( 'wp_enqueue_scripts', array( $this, 'wp_enqueue_scripts' ) ); // Enqueue all stylesheets (Main Stylesheet, Fonts, etc...)
		add_action( 'wp_footer', array( $this, 'wp_footer' ) ); // Responsive nav

		// Theme Customizer
		add_filter( 'theme_mod_content_color', array( $this, 'theme_mod_content_color' ) ); // Set the default content color

		// Theme Options
		add_filter( 'sds_web_font_css_selector', array( $this, 'sds_web_font_css_selector' ) ); // Web Font CSS Selector

		// Gravity Forms
		add_filter( 'gform_field_input', array( $this, 'gform_field_input' ), 10, 5 ); // Add placholder to newsletter form
		add_filter( 'gform_confirmation', array( $this, 'gform_confirmation' ), 10, 4 ); // Change confirmation message on newsletter form
	}


	/************************************************************************************
	 *    Functions to correspond with actions above (attempting to keep same order)    *
	 ************************************************************************************/

	/**
	 * This function adds images sizes to WordPress, unregisters navigation areas that aren't used,
	 * adds HTML5 & Theme Customizer support, etc....
	 */
	function after_setup_theme() {
		global $content_width;

		/**
		 * Set the Content Width for embedded items.
		 */
		if ( ! isset( $content_width ) )
			$content_width = 980;

		add_image_size( 'journal-1044x9999', 1044, 9999, false ); // Used for featured images on single posts and pages

		// Remove top nav which is registered in options panel
		unregister_nav_menu( 'top_nav' );

		// Remove footer nav which is registered in options panel
		unregister_nav_menu( 'footer_nav' );

		// Change default core markup for search form, comment form, and comments, etc... to HTML5
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list'
		) );

		// Custom Background (color/image)
		add_theme_support( 'custom-background', array(
			'default-color' => '#000000',
			'wp-head-callback' => 'journal_custom_background_cb' // functions.php
		) );

		// Theme textdomain
		load_theme_textdomain( 'journal', get_template_directory() . '/languages' );
	}

	/**
	 * This function adds editor styles based on post type, before TinyMCE is initalized.
	 * It will also enqueue the correct color scheme stylesheet to better match front-end display.
	 */
	function pre_get_posts() {
		global $sds_theme_options, $post;

		// Admin only and if we have a post
		if ( is_admin() && ! empty( $post ) ) {
			add_editor_style( 'css/editor-style.css' );

			// Add correct color scheme if selected
			if ( function_exists( 'sds_color_schemes' ) && ! empty( $sds_theme_options['color_scheme'] ) && $sds_theme_options['color_scheme'] !== 'default' ) {
				$color_schemes = sds_color_schemes();
				add_editor_style( 'css/' . $color_schemes[$sds_theme_options['color_scheme']]['stylesheet'] );
			}

			// Fetch page template if any on Pages only
			if ( $post->post_type === 'page' )
				$wp_page_template = get_post_meta( $post->ID,'_wp_page_template', true );
		}

		// Admin only and if we have a post using our full page or landing page templates
		if ( is_admin() && ! empty( $post ) && ( isset( $wp_page_template ) && ( $wp_page_template === 'page-full-width.php' || $wp_page_template === 'page-landing-page.php' ) ) )
			add_editor_style( 'css/editor-style-full-width.css' );
	}

	/**
	 * This function unregisters extra sidebars that are not used in this theme.
	 */
	function widgets_init() {
		// Unregister unused sidebars which are registered in SDS Core
		unregister_sidebar( 'secondary-sidebar' );
		unregister_sidebar( 'footer-sidebar' );
		unregister_sidebar( 'copyright-area-sidebar' );
	}

	/**
	 * This function enqueues all styles and scripts (Main Stylesheet, Fonts, etc...).
	 * Stylesheets can be conditionally included if needed
	 */
	function wp_enqueue_scripts() {
		global $sds_theme_options, $is_IE;

		$protocol = is_ssl() ? 'https' : 'http'; // Determine current protocol

		// Journal (main stylesheet)
		wp_enqueue_style( 'journal', get_template_directory_uri() . '/style.css', false, self::JOURNAL_VERSION );

		// Enqueue the child theme stylesheet only if a child theme is active
		if ( is_child_theme() )
			wp_enqueue_style( 'journal-child', get_stylesheet_uri(), array( 'journal' ), self::JOURNAL_VERSION );

		// Arvo & Bitter (include only if a web font is not selected in Theme Options)
		if ( ! function_exists( 'sds_web_fonts' ) || empty( $sds_theme_options['web_font'] ) )
			wp_enqueue_style( 'arvo-bitter-web-fonts', $protocol . '://fonts.googleapis.com/css?family=Arvo|Bitter', false, self::JOURNAL_VERSION );

		// Animate.css
		wp_enqueue_style( 'animate', get_template_directory_uri() . '/css/animate.min.css', false, self::JOURNAL_VERSION );

		// Ensure jQuery is loaded on the front end for our footer script (@see wp_footer() below)
		wp_enqueue_script( 'jquery' );


		// HTML5 Shim (IE only)
		if ( $is_IE )
			wp_enqueue_script( 'html5-shim', get_template_directory_uri() . '/js/html5.js', false, self::JOURNAL_VERSION );
	}

	/**
	 * This function outputs the necessary Javascript for the responsive menus & FitVids.
	 */
	function wp_footer() {
	?>
		<script type="text/javascript">
			// <![CDATA[
			jQuery( function( $ ) {
				// Primary Nav
				$( '.nav-button' ).on( 'touch click', function( e ) {
					if ( window.innerWidth <= 740 ) {
						var $nav_button = $( this ), $primary_nav = $( 'nav.primary-nav' );
						e.stopPropagation();

						// If primary nav is open, toggle the open class on the nav button before animation
						if ( ! $primary_nav.hasClass( 'open' ) ) {
							$nav_button.addClass( 'open' );
						}
						else if ( $nav_button.hasClass( 'open' ) ) {
							$primary_nav.removeClass( 'open' );
						}

						// Slide the primary nav
						$primary_nav.slideToggle( 400, function() {
							// Toggle open class
							if( $primary_nav.is( ':visible' ) ) {
								$primary_nav.addClass( 'open' );
							}
							else {
								$primary_nav.removeClass( 'open' );
							}

							// If the nav button has the open class and the primary nav is not visible, remove it
							if ( $nav_button.hasClass( 'open' ) && ! $primary_nav.is( ':visible' ) ) {
								$nav_button.removeClass( 'open' );
							}
						} );
					}
				} );

				$( document ).on( 'touch click', function() {
					if ( window.innerWidth <= 740 ) {
						var $nav_button = $( '.nav-button' ), $primary_nav = $( 'nav.primary-nav' );

						// If the primary nav is not currently being animated
						if ( ! $primary_nav.is( ':animated' ) ) {
							// Remove the open class from the primary nav
							$primary_nav.removeClass( 'open' );

							// Slide the primary nav up
							$primary_nav.slideUp( 400, function() {
								// Remove the open class from the nav button
								$nav_button.removeClass( 'open' );
							} );
						}
					}
				} );
			} );
			// ]]>
		</script>
	<?php
	}


	/********************
	 * Theme Customizer *
	 ********************/

	/**
	 * This function sets the default color for the content area in the Theme Customizer.
	 */
	function theme_mod_content_color( $color ) {
		return $color ? $color : '#000000';
	}


	/*****************
	 * Theme Options *
	 *****************/

	/**
	 * This function outputs the necessary CSS selector when web fonts are active.
	 */
	function sds_web_font_css_selector( $selector ) {
		$selector .= ' .header-call-to-action .widget, section.content, .post-title, h1, h2, h3, h4, h5, h6';
		$selector .= ' #respond input, #respond textarea, .widget, h3.widget-title, footer#footer .copyright';

		return $selector;
	}

	/*****************
	 * Gravity Forms *
	 *****************/

	/**
	 * This function adds the HTML5 placeholder attribute to forms with a CSS class of the following:
	 * .mc-gravity, .mc_gravity, .mc-newsletter, .mc_newsletter classes
	 */
	function gform_field_input( $input, $field, $value, $lead_id, $form_id ) {
		$form_meta = RGFormsModel::get_form_meta( $form_id );

		// Ensure the current form has one of our supported classes and alter the field accordingly if we're not on admin
		if ( isset( $form['cssClass'] ) && ! is_admin() && in_array( $form_meta['cssClass'], array( 'mc-gravity', 'mc_gravity', 'mc-newsletter', 'mc_newsletter' ) ) )
			$input = '<div class="ginput_container"><input name="input_' . $field['id'] . '" id="input_' . $form_id . '_' . $field['id'] . '" type="text" value="" class="large" placeholder="' . $field['label'] . '" /></div>';

		return $input;
	}

	/**
	 * This function alters the confirmation message on forms with a CSS class of the following:
	 * .mc-gravity, .mc_gravity, .mc-newsletter, .mc_newsletter classes
	 */
	function gform_confirmation( $confirmation, $form, $lead, $ajax ) {
		// Confirmation message is set and form has one of our supported classes (alter the confirmation accordingly)
		if ( isset( $form['cssClass'] ) && $form['confirmation']['type'] === 'message' && in_array( $form['cssClass'], array( 'mc-gravity', 'mc_gravity', 'mc-newsletter', 'mc_newsletter' ) ) )
			$confirmation = '<section class="mc-gravity-confirmation mc_gravity-confirmation mc-newsletter-confirmation mc_newsletter-confirmation">' . $confirmation . '</section>';

		return $confirmation;
	}
}


function JournalInstance() {
	return Journal::instance();
}

// Starts Journal
JournalInstance();