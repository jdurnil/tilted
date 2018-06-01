<?php

if ( ! class_exists( 'ET_Builder_Element' ) ) {
	return;
}

$module_files = glob( __DIR__ . '/modules/*/*.php' );

// Load custom Divi Builder modules
foreach ( (array) $module_files as $module_file ) {
	if ( $module_file && preg_match( "/\/modules\/\b([^\/]+)\/\\1\.php$/", $module_file ) ) {
		require_once $module_file;
	}
}
function _enqueue_scroll() {
    $dir = plugins_url('/divilocal');
    wp_enqueue_script('scroll',$dir.'/includes/scripts/jquery.tiltedpage-scroll.js','jquery');
    wp_enqueue_style('scroll_css', $dir.'/includes/scripts/tiltedpage-scroll.css');
}
add_action('wp_enqueue_scripts','_enqueue_scroll');