<?php 

class Chimera_Theme_Init {


	public function register_navs() {

		register_nav_menus( array(
			'primary'	=> __( 'Primary Menu',      'chimera' ),
			'social'	=> __( 'Social Links Menu', 'chimera' ),
		) );

	}


}