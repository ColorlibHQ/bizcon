<?php
// Block direct access
if( !defined( 'ABSPATH' ) ){
    exit( 'Direct script access denied.' );
}

/**
 * @Packge     : Bizcon
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */
 
 
function bizcon_widgets_init() {
    // sidebar widgets 
    
    register_sidebar(array(
        'name'          => esc_html__('Sidebar widgets', 'bizcon'),
        'description'   => esc_html__('Place widgets in sidebar widgets area.', 'bizcon'),
        'id'            => 'sidebar_widgets',
        'before_widget' => '<div id="%1$s" class="widget single_sidebar_widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget_title">',
        'after_title'   => '</h4>'
    ));

	// footer widgets register
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer One', 'bizcon' ),
			'id'            => 'footer-1',
			'before_widget' => '<div id="%1$s" class="col-xl-2 col-sm-4 mb-4 mb-xl-0 single-footer-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4>',
			'after_title'   => '</h4>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Two', 'bizcon' ),
			'id'            => 'footer-2',
			'before_widget' => '<div id="%1$s" class="col-xl-2 col-sm-4 mb-4 mb-xl-0 single-footer-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4>',
			'after_title'   => '</h4>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Three', 'bizcon' ),
			'id'            => 'footer-3',
			'before_widget' => '<div id="%1$s" class="col-xl-2 col-sm-4 mb-4 mb-xl-0 single-footer-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4>',
			'after_title'   => '</h4>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Four', 'bizcon' ),
			'id'            => 'footer-4',
			'before_widget' => '<div id="%1$s" class="col-xl-2 col-sm-4 mb-4 mb-xl-0 single-footer-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4>',
			'after_title'   => '</h4>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Five', 'bizcon' ),
			'id'            => 'footer-5',
			'before_widget' => '<div id="%1$s" class="col-xl-4 col-sm-8 col-md-8 mb-4 mb-xl-0 single-footer-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4>',
			'after_title'   => '</h4>',
		)
	);
	

}
add_action( 'widgets_init', 'bizcon_widgets_init' );
