<?php 

class Chimera_Theme_Structure {


	public function chimera_wrapper_open() {


		$attr = apply_filters( 'chimera/wrapper/attr', array(
			'id'	=> 'wrapper'
		) );

		$close = false;

		$open_wrapper = new Element( 'div', $attr, $close );

		echo $open_wrapper;


	}


	public function chimera_wrapper_close() {


		echo '
		</div><!-- #wrapper -->
		';


	}


	public function chimera_head_part() {


		$head_part_content = apply_filters( 'head_part/content', '' );

		$attr = apply_filters( 'chimera/head_part/attr', array(
			'id'	=> 'header',
			'text'	=> $head_part_content,
		) );

		$close = false;

		$head_part = new Element( 'div', $attr );

		echo $head_part;


	}


	public function chimera_head_part_content( $content ) {


		$menu = wp_nav_menu( apply_filters( 'nav_menu/args', array(
			'menu'				=> 'primary',
			'echo'				=> false,
			'menu_class' 		=> 'nav navbar-nav',
			'container' 		=> 'div',
			'container_id' 		=> 'navbar',
			'container_class' 	=> 'collapse navbar-collapse',
		) ) );

		$site_name = get_bloginfo( 'name' );

		$site_url = esc_url( home_url( '/' ) );

		$description = get_bloginfo( 'description' );

		$container_class = apply_filters( 'nav_menu/container/class', 'container' );

		ob_start();

		include( locate_template( 'templates/head-part-nav.php' ) );

		return $content . ob_get_clean();


	}


}