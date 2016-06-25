<?php
/**
 * p619 functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package p619
 */

if ( ! function_exists( 'p619_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function p619_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on p619, use a find and replace
	 * to change 'p619' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'p619', get_template_directory() . '/languages' );

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
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'p619' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	// register custom post type 'my_custom_post_type'
	// Set UI labels for Product Post Type
	/*	$labels = array(
			'name'                => _x( 'Featured Products', 'Post Type General Name', 'p619' ),
			'singular_name'       => _x( 'Featured Product', 'Post Type Singular Name', 'p619' ),
			'menu_name'           => __( 'Products', 'p619' ),
			'parent_item_colon'   => __( 'Parent Product', 'p619' ),
			'all_items'           => __( 'All Products', 'p619' ),
			'view_item'           => __( 'View Product', 'p619' ),
			'add_new_item'        => __( 'Add New Product', 'p619' ),
			'add_new'             => __( 'Add New', 'p619' ),
			'edit_item'           => __( 'Edit Product', 'p619' ),
			'update_item'         => __( 'Update Product', 'p619' ),
			'search_items'        => __( 'Search Product', 'p619' ),
			'not_found'           => __( 'Not Found', 'p619' ),
			'not_found_in_trash'  => __( 'Not found in Trash', 'p619' ),
		);

	register_post_type( 'featured_product',
	      array(
	        'label' => array( 'name' => __( 'Featured Product' ) ),
					'label' => $labels,
	        'public' => true
	    	));

	//add post-formats to post_type 'my_custom_post_type'
	add_post_type_support( 'featured_product', 'post-formats' );*/

	//add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link') );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'p619_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'p619_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 * Priority 0 to make it available to lower priority callbacks.
 * @global int $content_width
 */
function p619_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'p619_content_width', 640 );
}
add_action( 'after_setup_theme', 'p619_content_width', 0 );

/**
 * Register widget area.
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function p619_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'p619' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'p619' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'p619_widgets_init' );


/**
 * Enqueue scripts and styles.
 */
function p619_scripts() {
	wp_enqueue_style( 'p619-style', get_stylesheet_uri() );

	wp_enqueue_script( 'p619-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'p619-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	wp_deregister_script( 'jquery' );
	$jquery_cdn = "//ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js";
	wp_enqueue_script( 'jquery', $jquery_cdn, array(), '20130115', true );

	wp_enqueue_script( 'p619-scrolling', get_template_directory_uri() . '/js/scroll.js', array( 'jquery' ), '20160516', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'p619_scripts' );

add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

require get_template_directory() . '/inc/custom-header.php';

require get_template_directory() . '/inc/template-tags.php';

require get_template_directory() . '/inc/extras.php';

require get_template_directory() . '/inc/customizer.php';

require get_template_directory() . '/inc/jetpack.php';
