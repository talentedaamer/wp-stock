<?php

/**
 * Get wrapper templates from layouts/wrapper
 * @param null $name
 */
function get_wrapper( $name = NULL, $path = 'layouts/wrappers' ) {

	$wrappers = array();
	$name = (string) $name;
	$path = (string) trailingslashit( $path );

	if ( '' !== $name ) {
		$wrappers[] = "{$path}wrapper-{$name}.php";
	}

	$wrappers[] = "{$path}wrapper-start.php";

	locate_template( $wrappers, true );
}