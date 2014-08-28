<?php
/*	============= Load settings ============= */
if ( session_id() == '' ) 
session_start();
$settings['general']=medicine_loadsettings( 'general' );
$settings['slider']=medicine_loadsettings( 'slider' );
$settings['showroom']=medicine_loadsettings( 'showroom' );
$settings['layout']=medicine_loadsettings( 'layout' );
$settings['menus']=medicine_loadsettings( 'menus' );
$settings['integration']=medicine_loadsettings( 'integration' );
$settings['elements']=medicine_loadsettings( 'elements' );
$settings['fonts']=medicine_loadsettings( 'fonts' );
$settings['theme']['sidebar-width']=315;
include_once ( get_template_directory().'/inc/widgets/facebook.php' );
include_once ( get_template_directory().'/inc/widgets/posts.php' );
include_once ( get_template_directory().'/inc/widgets/tabs.php' );
include_once ( get_template_directory().'/inc/widgets/comments.php' );
include_once ( get_template_directory().'/inc/widgets/socials.php' );
include_once ( get_template_directory().'/inc/widgets/video.php' );
add_action('after_setup_theme', 'medicine_custom_theme_setup');
add_action('wp_head', 'medicine_custom_header_code');
add_action( 'after_setup_theme', 'medicine_custom_header_setup' );
add_action( 'init', 'medicine_register_theme_menus' );
add_action( 'widgets_init', 'medicine_widgets_init' );
if ( is_user_logged_in() ) include_once ( get_template_directory().'/inc/admin.php' );
if (!isset($_SESSION['nospam'])||$_SESSION['nospam']=='') {
	$_SESSION['nospam']=substr(md5(rand(1,234234)),0,5);
}
if (isset($_POST[$_SESSION['nospam']])) {
	$_POST['comment']=$_POST[$_SESSION['nospam']];
}
add_action( 'wp_enqueue_scripts', 'medicine_enque' );
add_filter( 'wp_title', 'medicine_wp_title', 10, 2 );
if ( ! isset( $content_width ) ) $content_width = 900;
$container=array( 'width'=>1000, 'margin-left'=>0, 'margin-right'=>0 );
add_action( 'template_redirect', 'medicine_content_width' );





/*	============= Functions ============= */



function medicine_loadsettings($section) {
	global $lz_default;
	$result=get_option( 'medicine-settings' );
	if (! isset($result[$section]) ) {
		include_once ( get_template_directory().'/inc/default.php' );
		$result[$section]=$lz_default[$section];
		update_option( 'medicine-settings', $result );
	}
	return $result[$section];
}


function medicine_custom_theme_setup() {
	global $settings;
	$lang_dir = get_template_directory() . '/languages';
    load_theme_textdomain('lizard', $lang_dir);
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'custom-background', array(
		'default-color' => 'e4e8e8',
		'default-image' => get_template_directory_uri() . '/images/background.png', 
		'wp-head-callback'=>'medicine_custom_background_cb') 
	);
	set_post_thumbnail_size( $settings['layout']['fimage_width'], $settings['layout']['fimage_height'], true );
	add_image_size( 'slide', 1000, 378, true );
	add_image_size( 'showroom', 116, 116, true );
	add_image_size( 'related', 160, 160, true );
	add_image_size( 'slide-preview', 122, 75, true );
}


function medicine_custom_header_setup() {
	$args = array(
		'default-text-color'     => '444',
		'default-image'          => '',
		'height'                 => 250,
		'width'                  => 1000,
		'max-width'              => 2000,
		'flex-height'            => true,
		'flex-width'             => true
	);
	add_theme_support( 'custom-header', $args );
}


function medicine_register_theme_menus() {
  register_nav_menus(
    array(
      'header-menu1' => __( 'Main Menu', 'lizard' ),
      'header-menu2' => __( 'Extra Menu', 'lizard' )
    )
  );
}


function medicine_widgets_init() {
	register_sidebar(array(
		'name' => __( 'Right sidebar', 'lizard' ),
		'id' => 'right_sidebar',
		'description' => __( 'Right sidebar', 'lizard' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<div class ="caption-back"><h3 class="caption">',
		'after_title' => '</h3></div>'
	));
	register_sidebar(array(
		'name' => __( 'Left sidebar', 'lizard' ),
		'id' => 'left_sidebar',
		'description' => __( 'Left sidebar', 'lizard' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="caption">',
		'after_title' => '</h3>'
	));
	register_sidebar(array(
		'name' => __( 'Tabs', 'lizard' ),
		'id' => 'tabs_sidebar',
		'description' => __( 'Sadebar for Tabs widget', 'lizard' ),
		'before_widget' => '<div id="%1$s" class="tab_widget %2$s"><div class="inner">',
		'after_widget' => '</div></div>',
		'before_title' => '<span class="scaption">',
		'after_title' => '</span>'
	));
	register_sidebar(array(
		'name' => __( 'Footer left', 'lizard' ),
		'id' => 'footer_left',
		'description' => __( 'Left footer widgets', 'lizard' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="caption">',
		'after_title' => '</h3>'
	));
	register_sidebar(array(
		'name' => __( 'Footer middle', 'lizard' ),
		'id' => 'footer_middle',
		'description' => __( 'Middle footer widgets', 'lizard' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="caption">',
		'after_title' => '</h3>'
	));
	register_sidebar(array(
		'name' => __( 'Footer right', 'lizard' ),
		'id' => 'footer_right',
		'description' => __( 'Right footer widgets', 'lizard' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="caption">',
		'after_title' => '</h3>'
	));
}

function medicine_content_width() {
	global $post, $content_width, $container, $settings;
	
	if (((is_single()||is_page())&&(get_post_meta($post->ID, 'pagetemplate', true) == 'left' || get_post_meta($post->ID, 'pagetemplate', true) == 'both' || ($settings['elements']['leftsidebar']['show'] && get_post_meta($post->ID, 'pagetemplate', true) != 'right' && get_post_meta($post->ID, 'pagetemplate', true) != 'full') )) || (!(is_single()||is_page())&&$settings['elements']['leftsidebar']['show'])) {
		$container['width']-=$settings['theme']['sidebar-width'];
		$container['margin-left']=$settings['theme']['sidebar-width'];
	}
	
	if (((is_single()||is_page())&&(get_post_meta($post->ID, 'pagetemplate', true) == 'right' || get_post_meta($post->ID, 'pagetemplate', true) == 'both' || ($settings['elements']['rightsidebar']['show'] && get_post_meta($post->ID, 'pagetemplate', true) != 'left' && get_post_meta($post->ID, 'pagetemplate', true) != 'full') )) || (!(is_single()||is_page())&&$settings['elements']['rightsidebar']['show'])) {
		$container['width']-=$settings['theme']['sidebar-width'];
		$container['margin-right']=$settings['theme']['sidebar-width'];
	}
	$content_width = $container['width']-137;
	
}
function medicine_custom_header_code() { 
	global $settings, $post, $container; ?>
	<?php 
		$fonts=array(
			'heading'=>'h1, h2, h3, h4, h5, h6',
			'body'=>'body, input, textarea, select, code',
			'menu'=>'.menu, .readmore, #submit, .post-password-required form input[type=\"submit\"], .button'
		);
		foreach ($settings['fonts'] as $key=>$value) { ?>
			<style id="gglFont<?php echo $key; ?>"> <?php echo $fonts[$key]; ?> { font-family: "<?php echo $value; ?>"} input[name="<?php echo $key; ?>"] { font-family: "<?php echo $value; ?>"}</style>
		<?php } 
	?>
		
	<style>
		<?php 
			if ( $settings['integration']['css']!='' ) {
				echo $settings['integration']['css'];
			} 
		?>
		#container {
			width:<?php echo $container['width']; ?>px;
			margin-left:<?php echo $container['margin-left']; ?>px;
			margin-right:<?php echo $container['margin-right']; ?>px;
			float:left;
		}
	</style>

	<?php if ( $settings['integration']['headcode']!='' ) { 
		echo $settings['integration']['headcode'];
	} ?>
	<?php if ( $settings['general']['favicon']!='' ) { ?>
		<link rel="shortcut icon" href="<?php echo $settings['general']['favicon']; ?>" type="image/x-icon" />
	<?php } ?>
	
	
<script>
/* <![CDATA[ */
	jQuery(document).ready(function() {
		jQuery('ul.menu').superfish({
		<?php
			switch($settings['menus']['effect']) {
			case 'standard':
				?>animation: {width:'show'},					
				<?php
				break;
			case 'slidedown':
				?>animation: {height:'show'},				
				<?php
				break;
			case 'fade':
				?>animation: {opacity:'show'},			
				<?php
				break;
			case 'slideleft':
				?>onBeforeShow: function(){ this.css('marginLeft','20px'); },
 animation: {'marginLeft':'0px',opacity:'show'},		
				<?php
				break;
			case 'slideright':
				?>onBeforeShow: function(){ this.css('marginLeft','-20px'); },
 animation: {'marginLeft':'0px',opacity:'show'},				
				<?php
				break;
		}
		?>
			autoArrows:  <?php echo ($settings['menus']['showarrows'])?'true':'false'?>,
			dropShadows: false, 
			speed: <?php echo $settings['menus']['speed']?>,
			delay: <?php echo $settings['menus']['delay']?>
		});
		
		jQuery('.slides').cycle({
			delay:<?php echo $settings['slider']['delay']; ?>,
			speed:<?php echo $settings['slider']['speed']; ?>,
			next: '.slide-right',
			prev: '.slide-left',
			pager:  'slider-previews', 
			pagerAnchorBuilder: function(idx, slide) { 	
				return '<img src="' + jQuery(slide).attr('src') + '" />'; 
			} 
		});
		
	});
/* ]]> */
</script>
<?php }


function medicine_custom_background_cb() {
	
	$background = set_url_scheme( get_background_image() );

	
	$color = get_theme_mod( 'background_color' );
	if ( ! $background && ! $color )
		return;

	$style = $color ? "background-color: #$color;" : '';
	
	if ( $background ) {
		$image = " background-image: url('$background');";

		$repeat = get_theme_mod( 'background_repeat', 'repeat' );
		
		if ( ! in_array( $repeat, array( 'no-repeat', 'repeat-x', 'repeat-y', 'repeat' ) ) )
			$repeat = 'repeat';
		$repeat = " background-repeat: $repeat;/*asdf*/";

		$position = get_theme_mod( 'background_position_x', 'left' );
		if ( ! in_array( $position, array( 'center', 'right', 'left' ) ) )
			$position = 'left';
		$position = " background-position: top $position;";

		$attachment = get_theme_mod( 'background_attachment', 'scroll' );
		if ( ! in_array( $attachment, array( 'fixed', 'scroll' ) ) )
			$attachment = 'scroll';
		$attachment = " background-attachment: $attachment;";

		$style .= $image . $repeat . $position . $attachment;
	}
	?>
	<style type="text/css" id="custom-background-css">
	body.custom-background { <?php echo trim( $style ); ?> }
	</style>
	<?php
}


function medicine_enque() {
	global $settings;
	if ( $settings['layout']['pagination']=='dynamic' ) 
	wp_enqueue_script(
		'pagination',
		get_template_directory_uri() . '/js/pagination.js',
		array( 'jquery' )
	);
	wp_register_script( 'googlemaps', 'http://maps.google.com/maps/api/js?sensor=false', array( 'jquery' ), '3' );
	wp_enqueue_script( 'googlemaps' );
	wp_enqueue_style( 'style', get_stylesheet_uri() );
	wp_enqueue_style( 'mobile', get_template_directory_uri() . '/styles/mobile.css', '', '1.0.2', 'screen and (min-width:240px) and (max-width:639px)' );
	wp_enqueue_style( 'tablet', get_template_directory_uri() . '/styles/tablet.css', '', '1.0.2' , 'screen and (min-width:640px) and (max-width:1023px)' );
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );
	wp_enqueue_script(
		'main-script',
		get_template_directory_uri() . '/js/main.js',
		array( 'jquery' )
	);
	wp_enqueue_script(
		'superfish',
		get_template_directory_uri() . '/js/superfish.js',
		array( 'jquery' ),
		'1.4.8'
	);
	wp_enqueue_script(
		'cycle',
		get_template_directory_uri() . '/js/jquery.cycle.all.js',
		array( 'jquery' ),
		'2.9999'
	);
	foreach ($settings['fonts'] as $key=>$value) {
		wp_enqueue_style( 'gglFont-'.$key, '//fonts.googleapis.com/css?family='.$value.'&subset=latin,cyrillic' );
	}
}


function medicine_theme_secondary_menu() { ?>
	<div class="nav-menu" id="secondary-menu">
		<ul class='menu'>
			<li class="current_page_item"><a title="<?php echo __('Home', 'lizard'); ?>" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo __('Home', 'lizard'); ?></a></li>
			<?php wp_list_pages('title_li=&'); ?>
		</ul>
	</div>
<?php }


function medicine_theme_main_menu() { ?>
	<div class="nav-menu" id="main-menu">
		<ul class='menu'>
			<?php wp_list_categories('title_li=&'); ?>
		</ul>
		<div class='clear'></div>
	</div>
<?php }


function medicine_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
	?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
		<p><?php _e( 'Pingback:', 'lizard' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( 'Edit', 'lizard' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
		global $post;
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<header class="comment-meta comment-author vcard">
				<?php
					echo get_avatar( $comment, 44 );
					printf( '<cite class="fn">%1$s %2$s</cite>',
						get_comment_author_link(),
						( $comment->user_id === $post->post_author ) ? '<span> ' . __( 'Post author', 'lizard' ) . '</span>' : ''
					);
					printf( '<a href="%1$s"><time datetime="%2$s">%3$s</time></a>',
						esc_url( get_comment_link( $comment->comment_ID ) ),
						get_comment_time( 'c' ),
						sprintf( __( '%1$s at %2$s', 'lizard' ), get_comment_date(), get_comment_time() )
					);
				?>
			</header>

			<?php if ( '0' == $comment->comment_approved ) : ?>
				<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'lizard' ); ?></p>
			<?php endif; ?>

			<section class="comment-content comment">
				<?php comment_text(); ?>
				<?php edit_comment_link( __( 'Edit', 'lizard' ), '<p class="edit-link">', '</p>' ); ?>
			</section>

			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'lizard' ), 'after' => ' <span>&darr;</span>', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div>
		</article>
	<?php
		break;
	endswitch;
}


function medicine_entry_meta() {
	global $settings;
	$categories_list = get_the_category_list( ', ' );

	$date = sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a>',
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() )
	);

	$author = sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr( sprintf( __( 'View all posts by %s', 'lizard' ), get_the_author() ) ),
		get_the_author()
	);
	ob_start();
	comments_popup_link();
	$comments = ob_get_contents();
	ob_end_clean();
	
	printf(
		'<div class="post-author"> '.__('by', 'lizard').' %1$s</div><div class="post-category">'.__('by', 'lizard').' %2$s</div><div class="post-commnets">%3$s</div>',
		$author,
		$categories_list,
		$comments
	);
}


function medicine_custom_excerpt($args=''){
	global $post, $settings;

	$p=$post;
	parse_str($args, $i);
	$echo = isset($i['echo'])?true:false;
	if ( isset($i['maxchar']) ) {
		$maxchar=(int)trim($i['maxchar']);
		$content = $p->post_content;
		$content = apply_filters('the_content', $content);
	} else {
		if ( $p->post_excerpt ) {
			$content = $p->post_excerpt;
			$maxchar=false;
		} else {
			$content = $p->post_content;
			$content = apply_filters('the_content', $content);
			$maxchar=$settings['layout']['cutcontent']?$settings['layout']['contentlength']:0;
			$maxchar=(strpos($content, '<!--more-->'))?strpos(preg_replace('/<.*?>/', '', preg_replace('/<!--more-->/','@readmore_tag',$content)), '@readmore_tag'):$maxchar;
		}
	}
	if (!$maxchar||strlen(preg_replace('/<.*?>/', '', $content)) <= $maxchar) {
		if ($echo) print $content;
		else return $content;
	} else {
		preg_match_all('/(<.+?>)?([^<>]*)/s', $content, $lines, PREG_SET_ORDER);
		$total_length=0;
		$open_tags = array();
		$truncate = '';
		foreach( $lines as $line_matchings ) {
			if (!empty($line_matchings[1])) {
				if (preg_match('/^<(\s*.+?\/\s*|\s*(img|br|input|hr|area|base|basefont|col|frame|isindex|link|meta|param)(\s.+?)?)>$/is', $line_matchings[1])) {;} 
				else if (preg_match('/^<\s*\/([^\s]+?)\s*>$/s', $line_matchings[1], $tag_matchings)) {
					$pos = array_search($tag_matchings[1], $open_tags);
					if ($pos !== false) {
						unset($open_tags[$pos]);
					}
				} else if (preg_match('/^<\s*([^\s>!]+).*?>$/s', $line_matchings[1], $tag_matchings)) {
					array_unshift($open_tags, strtolower($tag_matchings[1]));
				}
				$truncate .= $line_matchings[1];
			}
			$content_length = strlen(preg_replace('/&[0-9a-z]{2,8};|&#[0-9]{1,7};|&#x[0-9a-f]{1,6};/i', ' ', $line_matchings[2]));
					
			if ( $total_length+$content_length > $maxchar ) {
						
				$left = $maxchar - $total_length;
				$entities_length = 0;
				if ( preg_match_all('/&[0-9a-z]{2,8};|&#[0-9]{1,7};|&#x[0-9a-f]{1,6};/i', $line_matchings[2], $entities, PREG_OFFSET_CAPTURE) ) {
					foreach ($entities[0] as $entity) {
						if ($entity[1]+1-$entities_length <= $left) {
							$left--;
							$entities_length += strlen($entity[0]);
						} else {
							break;
						}
					}
				}
				$truncate .= preg_replace('/(.*)\.[^\.]*$/s', "$1",mb_substr($line_matchings[2], 0, $left+$entities_length, 'utf-8'))."...";
				break;
			} else {
				$truncate .= $line_matchings[2];
				$total_length += $content_length;
			}
			if( $total_length>= $maxchar ) {
				break;
			}
		}
				
		foreach ($open_tags as $tag) {
			$truncate .= '</' . $tag . '>';
		}
		$truncate=preg_replace('/<p([^>])*>(&nbsp;)?<\/p>/', '', $truncate);
				
		if ($echo) return print $truncate;
		else return $truncate;
	}
	return;
}  


function medicine_wp_title( $title, $sep ) {
	global $settings;
	
	if (is_home()) { 
		$title = get_bloginfo('name'); 
	} else 
		$title = sprintf( $settings['general']['site_title'], $title, get_bloginfo('name') ); 
	return $title;
}