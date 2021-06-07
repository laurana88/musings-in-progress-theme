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


// Custom comment walker.
require get_template_directory() . '/classes/comment-walker.php';

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

// Add Blog Index Size	& small header size
//this adds the image size
add_image_size('blogindex-size', 500, 500, true);
add_image_size('small-featured', 50);

//this adds the new image size to the media library
add_filter( 'image_size_names_choose', 'my_custom_sizes' );

function my_custom_sizes( $sizes ) {
    return array_merge( $sizes, array(
        'blogindex-size' => __( 'Tall Index Size' ),
    ) );
}

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

// Recent Posts Widget
class laura_posts_widget extends WP_Widget {
  
	function __construct() {
	parent::__construct(
	  
	// Base ID of your widget
	'laura_posts_widget', 
	  
	// Widget name will appear in UI
	__('Laura Recent Posts Widget', 'laura_posts_widget_domain'), 
	  
	// Widget description
	array( 'description' => __( 'Recent Posts with Featured Image', 'laura_posts_widget_domain' ), ) 
	);
	}
	  
	// Creating widget front-end
	public function widget( $args, $instance ) {
	  
	// This is where you run the code and display the output
	// Define our WP Query Parameters
	$the_query = new WP_Query( 'posts_per_page=3' ); ?>
	<section class="laura-recent-posts-widget">
	<h6 style="text-align:center;">Recent Posts</h6>

	<?php 
	// Start our WP Query
	while ($the_query -> have_posts()) : $the_query -> the_post(); 

	// Display the Post Featured Image with Hyperlink
	?>
	<div class="recent-content-sidebar">
	<a class="image-link" href="<?php the_permalink() ?>"><?php the_post_thumbnail( 'thumbnail' ); ?></a>
	
	<!-- Display the Post Title -->
	<h4><a href="<?php the_permalink() ?>"><?php the_title();?></a></h4>
	</div>
	
	<?php 
	// Repeat the process and reset once it hits the limit
	endwhile;
	wp_reset_postdata();

	?>
	</section>
	<?php
	}
	 
	// Class laura_posts_widget ends here
} 
	 
	 
// Register and load the widget
function laura_load_widget() {
	register_widget( 'laura_posts_widget' );
}
add_action( 'widgets_init', 'laura_load_widget' );


// Get the Primary Category (or backup is the first one)
function get_primary_taxonomy_term( $post = 0, $taxonomy = 'category' ) {
	if ( ! $post ) {
		$post = get_the_ID();
	}

	$terms        = get_the_terms( $post, $taxonomy );
	$primary_term = array();

	if ( $terms ) {
		$term_display = '';
		$term_slug    = '';
		$term_link    = '';
		if ( class_exists( 'WPSEO_Primary_Term' ) ) {
			$wpseo_primary_term = new WPSEO_Primary_Term( $taxonomy, $post );
			$wpseo_primary_term = $wpseo_primary_term->get_primary_term();
			$term               = get_term( $wpseo_primary_term );
			if ( is_wp_error( $term ) ) {
				$term_display = $terms[0]->name;
				$term_slug    = $terms[0]->slug;
				$term_link    = get_term_link( $terms[0]->term_id );
			} else {
				$term_display = $term->name;
				$term_slug    = $term->slug;
				$term_link    = get_term_link( $term->term_id );
			}
		} else {
			$term_display = $terms[0]->name;
			$term_slug    = $terms[0]->slug;
			$term_link    = get_term_link( $terms[0]->term_id );
		}
		$primary_term['url']   = $term_link;
		$primary_term['slug']  = $term_slug;
		$primary_term['title'] = $term_display;
	}
	return $primary_term;
}

// SHORTCODES

// Affiliate Shortcode

add_shortcode( 'affiliate', 'laura_affiliate_function' );

function laura_affiliate_function() {

	$lauraaffiliate = '<div class="affiliate">
  <p><i>Some of the links in this post are affiliate links. If you buy something through these thinks, I may earn a commission from the sale (at no extra cost to you!). As an Amazon Associate I earn from qualifying purchases. Thank you for reading along!</i></p>
</div>';

return $lauraaffiliate;

}

// Read Next Shortcode

add_shortcode( 'readnext', 'laura_read_next_function' );

function laura_read_next_function( $atts) {

  $laurareadnext = shortcode_atts( array(
    'text' => 'text',
    'url' => 'url',
  ), $atts );

return "<h5 class='readnext'>Read Next: <a href='{$laurareadnext['url']}''>{$laurareadnext['text']}</a></h5>";

}

//Read Next Shortcode x2

add_shortcode( 'readnextlaura', 'laura_read_next_function2' );

function laura_read_next_function2( $atts, $content = null ) {

return "<h5 class='readnext'>" . $content . "</h5>";

}


// Attention Block 1 Shortcode

add_shortcode('block1', 'laura_block1_function');

function laura_block1_function( $atts, $content = null ) {

	return "<div class='block1'>" . $content . "</div>";

}

// fancy h2

add_shortcode( 'h2laura', 'laura_h2' );

function laura_h2( $atts, $content = null ) {

return "<h2 class='fancyh2'>" . $content . "</h2>";

}