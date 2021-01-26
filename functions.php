<?php
/**
 * adomas functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package adomas
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'adomas_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function adomas_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on adomas, use a find and replace
		 * to change 'adomas' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'adomas', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'adomas' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'adomas_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'adomas_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function adomas_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'adomas_content_width', 640 );
}
add_action( 'after_setup_theme', 'adomas_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function adomas_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'adomas' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'adomas' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'adomas_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function adomas_scripts() {
	wp_enqueue_style( 'adomas-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'adomas-style', 'rtl', 'replace' );

	wp_enqueue_script( 'adomas-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'adomas_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}




// ==============================
function adomas_scripts2() {
	wp_enqueue_style( 'css-custom', get_template_directory_uri() . '/dist/bundle.css', array(), _S_VERSION );

	wp_enqueue_script( 'js-custom', get_template_directory_uri() . '/dist/bundle.js', array(), _S_VERSION, true );

}
add_action( 'wp_enqueue_scripts', 'adomas_scripts2' );



function adomas_body_classes2( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( is_page_template( 'templates/homepage.php' )	) {
		$classes[] = 'homepage';
	} else if ( get_post_type() === 'post'	) {
		$classes[] = 'post-single';
	} else if ( is_page_template( 'templates/post-archive.php' )) {
		$classes[] = 'post-archive';
	} else if ( is_page_template( 'templates/service.php' )) {
		$classes[] = 'service-page';
	} else if ( is_page_template( 'templates/team.php' )) {
		$classes[] = 'team-page';
	} else if ( is_page_template( 'templates/contact.php' )) {
		$classes[] = 'contact-page';
	}

	return $classes;
}
add_filter( 'body_class', 'adomas_body_classes2' );



add_image_size( 'post-thumb', 540, 280, true );
add_image_size( 'post-thumb-full', 1084, 560, true );

function max_title_length($title){
	$max = 60;
	if( strlen( $title ) > $max ) {
			return substr( $title, 0, $max ). " &hellip;";
	} else {
			return $title;
	}
}

function get_excerpt(){
	$excerpt = get_the_content();
	$excerpt = preg_replace(" ([.*?])",'',$excerpt);
	$excerpt = strip_shortcodes($excerpt);
	$excerpt = strip_tags($excerpt);
	$excerpt = substr($excerpt, 0, 300);
	$excerpt = substr($excerpt, 0, strripos($excerpt, " "));
	$excerpt = trim(preg_replace( '/\s+/', ' ', $excerpt));
	$excerpt = $excerpt.'...';
	return $excerpt;
	}

	register_nav_menus(
		array(
			'menu-2' => esc_html__( 'Sidebar', 'adomas' ),
		)
	);

	if( function_exists('acf_add_options_page') ) {
	
		acf_add_options_page(array(
			'page_title' 	=> 'Site Wide Global Options',
			'menu_title'	=> 'Global Options',
			'icon_url' => 'dashicons-hammer'
		));
		
	}


add_action('admin_head', 'my_custom_fonts');
function my_custom_fonts() {
  echo '<style>
	.acf-image-uploader .image-wrap img[src$=".svg"] {
		min-height: 0;
		min-width: 0;
		height: 40px;
	}
  </style>';
}


	// function wpcontent_svg_mime_type( $mimes = array() ) {
	// 	$mimes['svg']  = 'image/svg+xml';
	// 	$mimes['svgz'] = 'image/svg+xml';
	// 	return $mimes;
	// }
	// add_filter( 'upload_mimes', 'wpcontent_svg_mime_type' ); 