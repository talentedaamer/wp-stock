<?php
/**
 * WP_Stock functions and definitions.
 * @package wp-stock
 */

if ( ! function_exists( 'wp_stock_setup' ) ) :
	/**
	 * setup theme defaults
	 * add support for various WordPress features.
	 *
	 * after_setup_theme runs before the init hook.
	 */
	function wp_stock_setup() {

		/**
		 * Get current active theme.
		 */
		$wp_stock = wp_get_theme();

		/**
		 * define WP_Stock version.
		 */
		define( 'WP_STOCK_VERSION', $wp_stock->get( 'Version' ) );

		/**
		 * define WP_Stock directory paths.
		 */
		define( 'WP_STOCK_PARENT_DIR', trailingslashit( get_template_directory() ) );
		define( 'WP_STOCK_CHILD_DIR', trailingslashit( get_stylesheet_directory() ) );

		/**
		 * define WP_Stock directory URIs.
		 */
		define( 'WP_STOCK_PARENT_URI', trailingslashit( get_template_directory_uri() ) );
		define( 'WP_STOCK_CHILD_URI', trailingslashit( get_stylesheet_directory_uri() ) );

		// includes directory path.
		define( 'WP_STOCK_INCLUDES', trailingslashit( WP_STOCK_PARENT_DIR . 'includes' ) );
		define( 'WP_STOCK_PRIVATE', trailingslashit( WP_STOCK_INCLUDES . 'private' ) );
		define( 'WP_STOCK_PUBLIC', trailingslashit( WP_STOCK_INCLUDES . 'public' ) );

		// assets directory URIs.
		define( 'WP_STOCK_ASSETS', trailingslashit( WP_STOCK_PARENT_URI . 'assets' ) );
		define( 'WP_STOCK_IMAGES', trailingslashit( WP_STOCK_ASSETS . 'images' ) );
		define( 'WP_STOCK_CSS', trailingslashit( WP_STOCK_ASSETS . 'css' ) );
		define( 'WP_STOCK_JS', trailingslashit( WP_STOCK_ASSETS . 'js' ) );

		/**
		 * load function files
		 */
		require_once( WP_STOCK_PRIVATE . 'function-admin-widgets.php' );
		require_once( WP_STOCK_INCLUDES . 'function-get-wrapper.php' );
		require_once( WP_STOCK_INCLUDES . 'function-register-widgets.php' );
		require_once( WP_STOCK_INCLUDES . 'function-enqueue-scripts.php' );
		require_once( WP_STOCK_INCLUDES . 'function-bootstrap-pagination.php' );

		/*
		 * Make theme available for translation.
		 */
		load_theme_textdomain( 'wp-stock', WP_STOCK_PARENT_DIR . 'langs' );

		/**
		 * automatically add <title> to the head.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 * add images sizes for thumbnails.
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'main_menu' => esc_html__( 'Main Menu', 'wp-stock' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'caption',
			'comment-form',
			'comment-list',
			'gallery',
			'search-form'
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'wp_stock_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );
	}
endif;
add_action( 'after_setup_theme', 'wp_stock_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function wp_stock_content_width() {
	$GLOBALS[ 'content_width' ] = apply_filters( 'wp_stock_content_width', 640 );
}

add_action( 'after_setup_theme', 'wp_stock_content_width', 0 );


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
