<?php
function bizcon_portfolio_metabox( $meta_boxes ) {

	$meta_boxes[] = array(
		'id'        => 'portfolio_single_metaboxs',
		'title'     => esc_html__( 'Portfolio Single Metabox', 'bizcon' ),
		'post_types'=> array( 'portfolio' ),
		'context'   => 'side',
		'priority'  => 'high',
		'autosave'  => 'false',
		'fields'    => array(
			array(
				'id'         => 'project_start_time',
				'name'       => esc_html__( 'Project Start Time', 'bizcon' ),
				'type'       => 'time',
				'js_options' => array(
					'stepMinute'      => 10,
					'controlType'     => 'select'
				),
			),
			array(
				'id'    => 'project_start_date',
				'type'  => 'date',
				'name'  => esc_html__( 'Project Start Date', 'bizcon' ),
				'js_options' => array(
					'dateFormat'      => 'DD, M dd, yy   ',
					'showButtonPanel' => false,
				),
			),
			array(
				'id'         => 'project_end_time',
				'name'       => esc_html__( 'Project End Time', 'bizcon' ),
				'type'       => 'time',
				'js_options' => array(
					'stepMinute'      => 10,
					'controlType'     => 'select'
				),
			),
			array(
				'id'    => 'project_end_date',
				'type'  => 'date',
				'name'  => esc_html__( 'Project End Date', 'bizcon' ),
				'js_options' => array(
					'dateFormat'      => 'DD, M dd, yy   ',
					'showButtonPanel' => false,
				),
			),
			array(
				'id'    => 'project_location',
				'type'  => 'text',
				'name'  => esc_html__( 'Project Location', 'bizcon' ),
				'placeholder' => esc_html__( 'Project Location', 'bizcon' ),
			),
			array(
				'name'    => esc_html__( 'Gird Image Size', 'bizcon' ),
				'id'      => 'portfolio-grid',
				'type'    => 'select',
				'options' => array(
					'0' => 'Select Size',
					'1' => 'Gird Size [570x356]',
					'2' => 'Grid Size [570x406]',
					'3' => 'Grid Size [570x401]',
					'4' => 'Grid Size [570x591]'
				),
				'inline' => true,
			),
		),
	);


	return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'bizcon_portfolio_metabox' );