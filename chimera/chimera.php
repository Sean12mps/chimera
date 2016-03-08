<?php 
/*	Chimera
	------------
	
	Templates
	------------
	//	Start
	$object = new Chimera;
	
	//	Definitions
	$object->definitions = array(
		'DEFINITION'	=> plugin_dir_path( __FILE__ ),
	);
	
	//	Include files / class
	$object->includes = array(
		//	included and auto loaded to Some_Class. use "auto-"
		'auto-Some_Class'	=> 'class-Some_Class.php',
		//	only included
		'Some_Class2'		=> TM_LOADER_INC . 'class-TM_Scripts.php',
	);
	
	//	Adding actions
	$object->add_actions = array(
		// 	hook to wp_enqueue_scripts
		array(
			'hook' 				=> 'wp_enqueue_scripts',
			'function'			=> array( $machine->Some_Class, 'register_scripts' ),
			'priority'			=> 10,
			'args'				=> false,
		),
	);

	//	Removing actions
	$object->remove_actions = array(
		array(
			'hook' 				=> 'wp_enqueue_scripts',
			'function'			=> array( $machine->Some_Class, 'register_scripts' ),
			'priority'			=> 10,
			'args'				=> false,
		),
	);

	//	Adding filters
	$object->add_filters = array(
		array(
			'tag' 				=> 'the_content',
			'function'			=> array( $machine->Some_Class, 'content' ),
			'priority'			=> 10,
			'args'				=> 1,
		),
	);

 */

class Chimera {


	public $data;


	public function __set( $name, $value ){


		switch ( $name ) {

			case 'definitions':
				$this->set_definitions( $value );
				break;

			case 'includes':
				$this->get_includes( $value );
				break;

			case 'add_actions':
				$this->add_actions( $value );
				break;

			case 'remove_actions':
				$this->remove_actions( $value );
				break;

			case 'add_filters':
				$this->add_filters( $value );
				break;

			default:
				$this->data[$name] = $value;
				break;

		}


	}


	public function __get( $name ) {


		if ( array_key_exists( $name, $this->data ) ) {

			return $this->data[$name];

		}


	}


	private function set_definitions( $definitions ) {


		foreach ( $definitions as $definition => $value ) {

			if ( ! defined( $definition ) ) define( $definition, $value );

		}


	}


	private function get_includes( $includes ) {


		foreach ( $includes as $name => $file_dir ) {

			if ( file_exists( $file_dir ) ) {

				include_once( $file_dir );

				if ( strpos( $name, 'auto-' ) !== false ) {

					$name = str_replace( 'auto-', '', $name );

					$this->$name = new $name;

				}

			}

		}


	}


	private function add_actions( $actions ) {


		foreach ( $actions as $action => $args ) {

			$hook 				= $args['hook'];

			$function_to_add 	= $args['function'];

			$priority			= ( isset( $args['priority'] ) ? $args['priority'] : 10 );

			$accepted_args		= ( isset( $args['args'] ) ? $args['args'] : false );

			add_action( $hook, $function_to_add, $priority, $accepted_args );

		}


	}


	private function remove_actions( $actions ) {


		foreach ( $actions as $action => $args ) {

			$hook 				= $args['hook'];

			$function_to_remove = $args['function'];

			$priority			= ( isset( $args['priority'] ) ? $args['priority'] : 10 );

			remove_action( $hook, $function_to_remove, $priority );

		}


	}


	private function add_filters( $filters ) {


		foreach ( $filters as $filter => $args ) {

			$tag 				= $args['tag'];

			$function_to_add 	= $args['function'];

			$priority			= ( isset( $args['priority'] ) ? $args['priority'] : 10 );

			$accepted_args		= ( isset( $args['args'] ) ? $args['args'] : false );

			add_filter( $tag, $function_to_add, $priority, $accepted_args );

		}


	}


}