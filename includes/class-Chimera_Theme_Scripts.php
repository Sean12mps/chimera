<?php 

class Chimera_Theme_Scripts {


	public function register_assets() {


		// 	Register js
		wp_register_script( 'bootstrap-js', THEME_JS . '/bootstrap.min.js', array( 'jquery' ), false, true );


		// 	Register css
		wp_register_style( 'bootstrap-css', THEME_CSS . '/bootstrap.min.css' );
		wp_register_style( 'chimera-css', THEME_BASE_URI . '/style.css' );


	}


	public function enqueue_scripts() {


		// 	Enqueue js
		wp_enqueue_script( 'bootstrap-js' );

		
		// 	Enqueue css
		wp_enqueue_style( 'bootstrap-css' );
		wp_enqueue_style( 'chimera-css' );


	}


}