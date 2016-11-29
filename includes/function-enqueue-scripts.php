<?php
/**
 * Enqueue scripts and styles.
 * @package wp-stock
 */
function wp_stock_enqueue_styles() {

	/**
	 * Load Bootstrap css
	 */
	wp_enqueue_style(
		'wp-stock-bootstrap',
		WP_STOCK_ASSETS . 'bootstrap-3.3/css/bootstrap.min.css',
		'',
		WP_STOCK_VERSION,
		'all'
	);

	/**
	 * Load Bootstrap theme css
	 */
	wp_enqueue_style(
		'wp-stock-bootstrap-theme',
		WP_STOCK_ASSETS . 'bootstrap-3.3/css/bootstrap-theme.min.css',
		'',
		WP_STOCK_VERSION,
		'all'
	);

	// theme main stylesheet
	wp_enqueue_style( 'wp-stock-style', get_stylesheet_uri() );

}

function wp_stock_enqueue_scripts() {

	/**
	 * Load Bootstrap js.
	 */
	wp_enqueue_script(
		'wp-stock-bootstrap',
		WP_STOCK_ASSETS . 'bootstrap-3.3/js/bootstrap.min.js',
		array( 'jquery' ),
		WP_STOCK_VERSION,
		TRUE
	);

	/**
	 * Load comments reply js on single posts.
	 */
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}

add_action( 'wp_enqueue_scripts', 'wp_stock_enqueue_styles' );
add_action( 'wp_enqueue_scripts', 'wp_stock_enqueue_scripts' );