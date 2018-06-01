<?php
/*
Plugin Name: divilocal
Plugin URI:  divi
Description: divi
Version:     1.0.0
Author:      divi
Author URI:  Jay
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: etl-divilocal
Domain Path: /languages

divilocal is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

divilocal is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with divilocal. If not, see https://www.gnu.org/licenses/gpl-2.0.html.
*/


if ( ! function_exists( 'etl_initialize_extension' ) ):
/**
 * Creates the extension's main class instance.
 *
 * @since 1.0.0
 */
function etl_initialize_extension() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/Divilocal.php';
}
add_action( 'divi_extensions_init', 'etl_initialize_extension' );
endif;


