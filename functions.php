<?php
/**
 * MusingsOfARover functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package MusingsOfARover
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'musingsofarover_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function musingsofarover_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on MusingsOfARover, use a find and replace
		 * to change 'musingsofarover' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'musingsofarover', get_template_directory() . '/languages' );

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

		// This theme uses wp_nav_menu() in three locations.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'musingsofarover' ),
				'menu-2' => esc_html__( 'Expanded', 'musingsofarover' ),
				'menu-3' => esc_html__( 'Mobile', 'musingsofarover' ),
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
				'musingsofarover_custom_background_args',
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

		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );
	}
endif;
add_action( 'after_setup_theme', 'musingsofarover_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function musingsofarover_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'musingsofarover_content_width', 640 );
}
add_action( 'after_setup_theme', 'musingsofarover_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function musingsofarover_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'musingsofarover' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'musingsofarover' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'musingsofarover_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function musingsofarover_scripts() {
	wp_enqueue_style( 'musingsofarover-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_enqueue_style( 'laura-custom-styles', get_stylesheet_directory_uri() . '/laura_css.css');
	wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400;0,700;1,400;1,700&family=Oswald:wght@400;700&display=swap');

	wp_enqueue_script( 'musingsofarover-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'musingsofarover_scripts' );

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

// Add custom color palettes in Gutenberg.
function smith_gutenberg_color_palette() {
	add_theme_support(
		'editor-color-palette', array(
			array(
				'name' => __( 'gray light', 'themeSmith' ),
				'slug' => 'gray-light',
				'color' => '#f9f9f9',
			),
			array(
				'name' => __( 'warm gray light', 'themeSmith' ),
        'slug' => 'warm-gray-light',
        'color' => '#EEEBEA',
			),
			array(
				'name' => __( 'warm gray dark', 'themeSmith' ),
				'slug' => 'warm-gray-dark',
				'color' => '#a1887e',
			),
			array(
				'name' => __( 'warm red', 'themeSmith' ),
				'slug' => 'warm-red',
				'color' => '#9b4a2f',
			),
			array(
				'name' => __( 'light green', 'themeSmith' ),
				'slug' => 'light-green',
				'color' => '#608769',
			),
			array(
				'name' => __( 'dark green', 'themeSmith' ),
				'slug' => 'dark-green',
				'color' => '#1e402e',
			),
			array(
				'name' => __( 'light purple', 'themeSmith' ),
				'slug' => 'light-purple',
				'color' => '#563A4B',
			),
			array(
				'name' => __( 'warm gray alt', 'themeSmith' ),
				'slug' => 'warm-gray-alt',
				'color' => '#f6f3f0',
			),
			array(
				'name' => __( 'gray light alt', 'themeSmith' ),
				'slug' => 'gray-light-alt',
				'color' => '#ccc',
			),
			array(
				'name' => __( 'gray text alt', 'themeSmith' ),
				'slug' => 'gray-text-alt',
				'color' => '#737373',
			),
			array(
				'name' => __( 'normal text', 'themeSmith' ),
				'slug' => 'normal-text',
				'color' => '#333',
			)
		)
	);
}
add_action( 'after_setup_theme', 'smith_gutenberg_color_palette' );