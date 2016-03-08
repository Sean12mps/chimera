<?php
/**
 * @link https://codex.wordpress.org/Plugin_API
 *
 * @package WordPress
 */


// 	Include Chimera
include_once( 'chimera/chimera.php' );


// 	Chimera Theme
$theme = new Chimera();


// 	Definitions
$theme->definitions = array(
	'THEME_BASE'		=> get_stylesheet_directory(),
	'THEME_BASE_URI'	=> get_stylesheet_directory_uri(),
	'THEME_INC'			=> get_stylesheet_directory() . '/includes/',
	'THEME_CSS'			=> get_stylesheet_directory_uri() . '/assets/css',
	'THEME_JS'			=> get_stylesheet_directory_uri() . '/assets/js',
	'THEME_FONTS'		=> get_stylesheet_directory_uri() . '/assets/fonts',
);


// 	File includes
$theme->includes= array(
	'Element'						=> THEME_INC . '/class-Element.php',
	'auto-Chimera_Theme_Init'		=> THEME_BASE . '/includes/class-Chimera_Theme_Init.php',
	'auto-Chimera_Theme_Scripts'	=> THEME_BASE . '/includes/class-Chimera_Theme_Scripts.php',
	'auto-Chimera_Theme_Structure'	=> THEME_BASE . '/includes/class-Chimera_Theme_Structure.php',
);


// 	Actions
$theme->add_actions = array(


	// 	theme assets
	array(
		'hook' 				=> 'init',
		'function'			=> array( $theme->Chimera_Theme_Scripts, 'register_assets' ),
		'priority'			=> 10,
		'args'				=> false,
	),


	// 	theme nav supports
	array(
		'hook' 				=> 'init',
		'function'			=> array( $theme->Chimera_Theme_Init, 'register_navs' ),
		'priority'			=> 10,
		'args'				=> false,
	),


	// 	enqueue scripts
	array(
		'hook' 				=> 'wp_enqueue_scripts',
		'function'			=> array( $theme->Chimera_Theme_Scripts, 'enqueue_scripts' ),
		'priority'			=> 10,
		'args'				=> false,
	),


	// 	creating wrapper open div
	array(
		'hook' 				=> 'chimera/header',
		'function'			=> array( $theme->Chimera_Theme_Structure, 'chimera_wrapper_open' ),
		'priority'			=> 10,
		'args'				=> false,
	),


	// 	creating wrapper closing div
	array(
		'hook' 				=> 'chimera/footer',
		'function'			=> array( $theme->Chimera_Theme_Structure, 'chimera_wrapper_close' ),
		'priority'			=> 10,
		'args'				=> false,
	),


	// 	creating header
	array(
		'hook' 				=> 'chimera/header',
		'function'			=> array( $theme->Chimera_Theme_Structure, 'chimera_head_part' ),
		'priority'			=> 15,
		'args'				=> false,
	),


);


// 	Filters
$theme->add_filters = array(
	array(
		'tag' 				=> 'head_part/content',
		'function'			=> array( $theme->Chimera_Theme_Structure, 'chimera_head_part_content' ),
		'priority'			=> 10,
		'args'				=> 1,
	),
);