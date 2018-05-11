<?php

class ETL_HelloWorld extends ET_Builder_Module {

	public $slug       = 'etl_hello_world';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'divi',
		'author'     => 'divi',
		'author_uri' => 'Jay',
	);

	public function init() {
		$this->name = esc_html__( 'Hello World', 'etl-divilocal' );
	}

	public function get_fields() {
		return array(
			'content' => array(
				'label'           => esc_html__( 'Content', 'etl-divilocal' ),
				'type'            => 'tiny_mce',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Content entered here will appear inside the module.', 'etl-divilocal' ),
				'toggle_slug'     => 'main_content',
			),
		);
	}

	public function render( $attrs, $content = null, $render_slug ) {
		return sprintf( '<h1>%1$s</h1>', $this->props['content'] );
	}
}

new ETL_HelloWorld;
