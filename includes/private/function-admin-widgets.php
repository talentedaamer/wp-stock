<?php
/**
 * WP_Stock admin widgets class.
 * @package wp-stock
 */

add_action( 'wp_dashboard_setup', 'WP_Stock_add_dashboard_widgets' );
function WP_Stock_add_dashboard_widgets() {
	global $wp_meta_boxes;

	wp_add_dashboard_widget(
		'wp_stock_welcome_widget',
		'WP Stock Welcome Widget',
		'wp_stock_welcome_widget_cb'
	);

	/**
	 * get all dashboard widgets
	 */
	$normal_dashboard_widgets = $wp_meta_boxes['dashboard']['normal']['core'];

	/**
	 * backup wp_stock dashboard widget
	 * unset wp_stock welcome widget from array()
	 */
	$wp_stock_welcome_widget_bk = array(
		'wp_stock_welcome_widget' => $normal_dashboard_widgets['wp_stock_welcome_widget']
	);
	unset( $normal_dashboard['example_dashboard_widget'] );

	/**
	 * Merge both widgets array()
	 */
	$sorted_dashboard_widgets = array_merge( $wp_stock_welcome_widget_bk, $normal_dashboard_widgets );

	/**
	 * save sorted array() back into the original metaboxes
	 */
	$wp_meta_boxes['dashboard']['normal']['core'] = $sorted_dashboard_widgets;
}
function wp_stock_welcome_widget_cb() {
	echo 'Hello World ! I am a dashboard widget :-)';
}
