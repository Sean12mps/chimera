<?php 

class Theme_Filters {


	public function __construct() {


		add_filter( 'chimera/wrapper/attr', array( $this, 'chimera_wrapper_attr' ), 1 );

		add_filter( 'head_part/content', array( $this, 'head_part_content' ), 1 );

		add_filter( 'chimera/head_part/attr', array( $this, 'chimera_head_part_attr' ), 1 );

		add_filter( 'nav_menu/args', array( $this, 'nav_menu_args' ), 1 );

		add_filter( 'nav_menu/container/class', array( $this, 'nav_menu_container_class' ), 1 );


	}


	public function chimera_wrapper_attr( $attr ) {


		$attr = array(
			'id'	=> 'wrapper'
		);

		return $attr;


	}



	public function head_part_content( $content ) {


		return $content;


	}



	public function chimera_head_part_attr( $attr ) {


		$attr = array(
			'id'	=> 'header',
			'text'	=> $head_part_content,
		);

		return $attr;


	}



	public function nav_menu_args( $args ) {


		$args = array(
			'menu'				=> 'primary',
			'echo'				=> false,
			'menu_class' 		=> 'nav navbar-nav',
			'container' 		=> 'div',
			'container_id' 		=> 'navbar',
			'container_class' 	=> 'collapse navbar-collapse',
		);

		return $args;


	}



	public function nav_menu_container_class( $class ) {


		$class = 'container';

		return $class;


	}


}