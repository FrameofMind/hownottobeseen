<?php
/**
 * hownottobeseen functions and definitions
 *
 * @package hownottobeseen
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 640; /* pixels */

/*
 * Load Jetpack compatibility file.
 */
require( get_template_directory() . '/inc/jetpack.php' );

if ( ! function_exists( 'hownottobeseen_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function hownottobeseen_setup() {

	/**
	 * Custom template tags for this theme.
	 */
	require( get_template_directory() . '/inc/template-tags.php' );

	/**
	 * Custom functions that act independently of the theme templates
	 */
	require( get_template_directory() . '/inc/extras.php' );

	/**
	 * Customizer additions
	 */
	require( get_template_directory() . '/inc/customizer.php' );

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on hownottobeseen, use a find and replace
	 * to change 'hownottobeseen' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'hownottobeseen', get_template_directory() . '/languages' );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Enable support for Post Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'hownottobeseen' ),
	) );

	/**
	 * Enable support for Post Formats
	 */
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );
}
endif; // hownottobeseen_setup
add_action( 'after_setup_theme', 'hownottobeseen_setup' );

/**
 * Setup the WordPress core custom background feature.
 *
 * Use add_theme_support to register support for WordPress 3.4+
 * as well as provide backward compatibility for WordPress 3.3
 * using feature detection of wp_get_theme() which was introduced
 * in WordPress 3.4.
 *
 * @todo Remove the 3.3 support when WordPress 3.6 is released.
 *
 * Hooks into the after_setup_theme action.
 */
function hownottobeseen_register_custom_background() {
	$args = array(
		'default-color' => 'ffffff',
		'default-image' => '',
	);

	$args = apply_filters( 'hownottobeseen_custom_background_args', $args );

	if ( function_exists( 'wp_get_theme' ) ) {
		add_theme_support( 'custom-background', $args );
	} else {
		define( 'BACKGROUND_COLOR', $args['default-color'] );
		if ( ! empty( $args['default-image'] ) )
			define( 'BACKGROUND_IMAGE', $args['default-image'] );
		add_custom_background();
	}
}
add_action( 'after_setup_theme', 'hownottobeseen_register_custom_background' );

/**
 * Register widgetized area and update sidebar with default widgets
 */
function hownottobeseen_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'hownottobeseen' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'hownottobeseen_widgets_init' );

/**
 * Enqueue scripts and styles
 */
function hownottobeseen_scripts() {
	wp_enqueue_style( 'hownottobeseen-style', get_stylesheet_uri() );

	wp_enqueue_script( 'hownottobeseen-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'hownottobeseen-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'hownottobeseen-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
	}
}
add_action( 'wp_enqueue_scripts', 'hownottobeseen_scripts' );


add_action( 'init', 'create_my_post_types' );

function create_my_post_types() {
	register_post_type( 'person_page', 
		array(
			'labels' => array(
				'name' => __( 'People Pages' ),
				'singular_name' => __( 'Person Page' ),
				'add_new' => __( 'Add New' ),
				'add_new_item' => __( 'Add New Person Page' ),
				'edit' => __( 'Edit' ),
				'edit_item' => __( 'Edit Person Page' ),
				'new_item' => __( 'New Person Page' ),
				'view' => __( 'View Person Page' ),
				'view_item' => __( 'View Person Page' ),
				'search_items' => __( 'Search People Pages' ),
				'not_found' => __( 'No People Pages found' ),
				'not_found_in_trash' => __( 'No People Pages found in Trash' ),
				'parent' => __( 'Parent Person Page' ),
			),
			'public' => true,
				'menu_position' => 4,
				'rewrite' => array('slug' => 'people_pages'),
				'supports' => array( 'title', 'editor', 'thumbnail' ),
				'taxonomies' => array('category', 'post_tag'),
				'publicly_queryable' => true,
				'show_ui' => true,
				'query_var' => true,
				'capability_type' => 'post',
				'hierarchical' => true,
		)
	);

	/*register_post_type( 'section_page', 
		array(
			'labels' => array(
				'name' => __( 'Section Pages' ),
				'singular_name' => __( 'Section Page' ),
				'add_new' => __( 'Add New' ),
				'add_new_item' => __( 'Add New Section Page' ),
				'edit' => __( 'Edit' ),
				'edit_item' => __( 'Edit Section Page' ),
				'new_item' => __( 'New Section Page' ),
				'view' => __( 'View Section Page' ),
				'view_item' => __( 'View Section Page' ),
				'search_items' => __( 'Search Section Pages' ),
				'not_found' => __( 'No Section Pages found' ),
				'not_found_in_trash' => __( 'No Section Pages found in Trash' ),
				'parent' => __( 'Parent Section Page' ),
			),
			'public' => true,
				'menu_position' => 4,
				'rewrite' => array('slug' => 'section_pages'),
				'supports' => array( 'title', 'editor', 'thumbnail' ),
				'taxonomies' => array('category', 'post_tag'),
				'publicly_queryable' => true,
				'show_ui' => true,
				'query_var' => true,
				'capability_type' => 'post',
				'hierarchical' => true,
		)
	);*/
	
	register_post_type( 'title_page', 
		array(
			'labels' => array(
				'name' => __( 'Title Pages' ),
				'singular_name' => __( 'Title Page' ),
				'add_new' => __( 'Add New' ),
				'add_new_item' => __( 'Add New Title Page' ),
				'edit' => __( 'Edit' ),
				'edit_item' => __( 'Edit Title Page' ),
				'new_item' => __( 'New Title Page' ),
				'view' => __( 'View Title Page' ),
				'view_item' => __( 'View Title Page' ),
				'search_items' => __( 'Search Title Pages' ),
				'not_found' => __( 'No Title Pages found' ),
				'not_found_in_trash' => __( 'No Title Pages found in Trash' ),
				'parent' => __( 'Parent Title Page' ),
			),
			'public' => true,
				'menu_position' => 4,
				'rewrite' => array('slug' => 'title_pages'),
				'supports' => array( 'title', 'editor', 'thumbnail' ),
				'taxonomies' => array('category', 'post_tag'),
				'publicly_queryable' => true,
				'show_ui' => true,
				'query_var' => true,
				'capability_type' => 'post',
				'hierarchical' => true,
		)
	);
	
	function add_page_excerpt_support(){
		add_post_type_support( 'page', 'excerpt' );
		add_post_type_support( 'person_page', 'excerpt' );
		add_post_type_support( 'title_page', 'excerpt' );
	}
		 
	add_action('admin_init', 'add_page_excerpt_support');
}


/**
 * Implement the Custom Header feature
 */
//require( get_template_directory() . '/inc/custom-header.php' );
