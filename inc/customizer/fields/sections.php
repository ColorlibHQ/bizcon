<?php 
/**
 * @Packge     : Bizcon
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 * Customizer panels and sections
 *
 */

/***********************************
 * Register customizer panels
 ***********************************/

$panels = array(
    /**
     * Theme Options Panel
     */
    array(
        'id'   => 'bizcon_theme_options_panel',
        'args' => array(
            'priority'       => 0,
            'capability'     => 'edit_theme_options',
            'theme_supports' => '',
            'title'          => esc_html__( 'Theme Options', 'bizcon' ),
        ),
    )
);


/***********************************
 * Register customizer sections
 ***********************************/


$sections = array(

    /**
     * Header Section
     */
    array(
        'id'   => 'bizcon_header_section',
        'args' => array(
            'title'    => esc_html__( 'Header', 'bizcon' ),
            'panel'    => 'bizcon_theme_options_panel',
            'priority' => 2,
        ),
    ),

    /**
     * Blog Section
     */
    array(
        'id'   => 'bizcon_blog_section',
        'args' => array(
            'title'    => esc_html__( 'Blog', 'bizcon' ),
            'panel'    => 'bizcon_theme_options_panel',
            'priority' => 3,
        ),
    ),

    /**
     * Blog Section
     */
    array(
        'id'   => 'bizcon_portfolio_section',
        'args' => array(
            'title'    => esc_html__( 'Portfolio', 'bizcon' ),
            'panel'    => 'bizcon_theme_options_panel',
            'priority' => 4,
        ),
    ),



    /**
     * 404 Page Section
     */
    array(
        'id'   => 'bizcon_fof_section',
        'args' => array(
            'title'    => esc_html__( '404 Page', 'bizcon' ),
            'panel'    => 'bizcon_theme_options_panel',
            'priority' => 6,
        ),
    ),

    /**
     * Footer Section
     */
    array(
        'id'   => 'bizcon_footer_section',
        'args' => array(
            'title'    => esc_html__( 'Footer Page', 'bizcon' ),
            'panel'    => 'bizcon_theme_options_panel',
            'priority' => 7,
        ),
    ),



);


/***********************************
 * Add customizer elements
 ***********************************/
$collection = array(
    'panel'   => $panels,
    'section' => $sections,
);

Epsilon_Customizer::add_multiple( $collection );

?>