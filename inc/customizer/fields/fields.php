<?php 
/**
 * @Packge     : Bizcon
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 * Customizer section fields
 *
 */

/***********************************
 * General Section Fields
 ***********************************/

// Header background color field
Epsilon_Customizer::add_field(
    'bizcon_header_bg_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Header Background Color', 'bizcon' ),
        'description' => esc_html__( 'Select the header background color.', 'bizcon' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'bizcon_header_section',
        'default'     => '#fff',
    )
);

// Header nav menu color field
Epsilon_Customizer::add_field(
    'bizcon_header_menu_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Header menu color', 'bizcon' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'bizcon_header_section',
        'default'     => '#2a2a2a',
    )
);

// Header nav menu hover color field
Epsilon_Customizer::add_field(
    'bizcon_header_menu_hover_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Header menu hover color', 'bizcon' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'bizcon_header_section',
        'default'     => '',
    )
);
// Header menu dropdown background color field
Epsilon_Customizer::add_field(
    'bizcon_header_menu_dropbg_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Header menu dropdown background color', 'bizcon' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'bizcon_header_section',
        'default'     => '#fff',
    )
);

// Header dropdown menu color field
Epsilon_Customizer::add_field(
    'bizcon_header_drop_menu_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Dropdown menu color', 'bizcon' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'bizcon_header_section',
        'default'     => '#2a2a2a',
    )
);
// Header dropdown menu hover color field
Epsilon_Customizer::add_field(
    'bizcon_drop_menu_item_hover_bg',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Dropdown menu item hover background', 'bizcon' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'bizcon_header_section',
        'default'     => '',
    )
);
// Header dropdown menu hover color field
Epsilon_Customizer::add_field(
    'bizcon_header_drop_menu_hover_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Dropdown menu hover color', 'bizcon' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'bizcon_header_section',
        'default'     => '#2a2a2a',
    )
);


/***********************************
 * Blog Section Fields
 ***********************************/
 
// Post excerpt length field
Epsilon_Customizer::add_field(
    'bizcon_excerpt_length',
    array(
        'type'        => 'text',
        'label'       => esc_html__( 'Set post excerpt length', 'bizcon' ),
        'description' => esc_html__( 'Set post excerpt length.', 'bizcon' ),
        'section'     => 'bizcon_blog_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'     => '30',
    )
);

// Blog single page social share icon
Epsilon_Customizer::add_field(
    'bizcon_blog_meta',
    array(
        'type'        => 'epsilon-toggle',
        'label'       => esc_html__( 'Blog page post meta show/hide', 'bizcon' ),
        'section'     => 'bizcon_blog_section',
        'default'     => true
    )
);
Epsilon_Customizer::add_field(
    'bizcon_blog_single_meta',
    array(
        'type'        => 'epsilon-toggle',
        'label'       => esc_html__( 'Blog single post meta show/hide', 'bizcon' ),
        'section'     => 'bizcon_blog_section',
        'default'     => true
    )
);


/*==============================================
	Portfolio Section
 =============================================*/


Epsilon_Customizer::add_field(
	'bizcon_portfolio_single_rp',
	array(
		'type'        => 'epsilon-toggle',
		'label'       => esc_html__( 'Project Recent Post Section show/hide', 'bizcon' ),
		'section'     => 'bizcon_portfolio_section',
		'default'     => true
	)
);
Epsilon_Customizer::add_field(
	'portfolio_recent_post_section_title',
	array(
		'type'              => 'text',
		'label'             => esc_html__( 'Recent Project Section Title ', 'bizcon' ),
		'description'       => esc_html__( 'Use "< span>Tag< /span>" for color with italic', 'bizcon' ),
        'section'           => 'bizcon_portfolio_section',
        'sanitize_callback' => 'sanitize_text_field',
		'default'           => esc_html__('Update From Blog')
	)
    );
Epsilon_Customizer::add_field(
	'portfolio_recent_post_section_subtitle',
	array(
		'type'              => 'text',
		'label'             => esc_html__( 'Section Sub Title', 'bizcon' ),
		'section'           => 'bizcon_portfolio_section',
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => esc_html__('Winged hath had face creepeth abundantly so shall fire apperar', 'bizcon')
	)
);
Epsilon_Customizer::add_field(
	'portfolio_recent_post_number',
	array(
		'type'              => 'number',
		'label'             => esc_html__( 'Recent Project Number', 'bizcon' ),
		'section'           => 'bizcon_portfolio_section',
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => absint('3')
	)
);


/***********************************
 * 404 Page Section Fields
 ***********************************/

// 404 text #1 field
Epsilon_Customizer::add_field(
    'bizcon_fof_titleone',
    array(
        'type'              => 'text',
        'label'             => esc_html__( '404 Text #1', 'bizcon' ),
        'section'           => 'bizcon_fof_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => 'Say Hello.'
    )
);
// 404 text #2 field
Epsilon_Customizer::add_field(
    'bizcon_fof_titletwo',
    array(
        'type'              => 'text',
        'label'             => esc_html__( '404 Text #2', 'bizcon' ),
        'section'           => 'bizcon_fof_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => 'Say Hello.'
    )
);
// 404 text #1 color field
Epsilon_Customizer::add_field(
    'bizcon_fof_textone_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( '404 Text #1 Color', 'bizcon' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'bizcon_fof_section',
        'default'     => '#000000',
    )
);
// 404 text #2 color field
Epsilon_Customizer::add_field(
    'bizcon_fof_texttwo_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( '404 Text #2 Color', 'bizcon' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'bizcon_fof_section',
        'default'     => '#656565',
    )
);
// 404 background color field
Epsilon_Customizer::add_field(
    'bizcon_fof_bg_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( '404 Page Background Color', 'bizcon' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'bizcon_fof_section',
        'default'     => '#fff',
    )
);

/***********************************
 * Footer Section Fields
 ***********************************/

// Footer Widget section
Epsilon_Customizer::add_field(
    'footer_widget_separator',
    array(
        'type'        => 'epsilon-separator',
        'label'       => esc_html__( 'Footer Widget Section', 'bizcon' ),
        'section'     => 'bizcon_footer_section',

    )
);

// Footer widget toggle field
Epsilon_Customizer::add_field(
    'bizcon_footer_widget_toggle',
    array(
        'type'        => 'epsilon-toggle',
        'label'       => esc_html__( 'Footer widget show/hide', 'bizcon' ),
        'description' => esc_html__( 'Toggle to display footer widgets.', 'bizcon' ),
        'section'     => 'bizcon_footer_section',
        'default'     => true,
    )
);


// Social Profile section
Epsilon_Customizer::add_field(
    'social_pro_separator',
    array(
        'type'        => 'epsilon-separator',
        'label'       => esc_html__( 'Social Profile Section', 'bizcon' ),
        'section'     => 'bizcon_footer_section',
        'default'     => true,

    )
);

// Social Profile Show/Hide
Epsilon_Customizer::add_field(
    'bizcon_social_profile_toggle',
    array(
        'type'        => 'epsilon-toggle',
        'label'       => esc_html__( 'Social Profile Show/Hide', 'bizcon' ),
        'section'     => 'bizcon_footer_section',
        'default'     => true,
    )
);

//Social Profile links
Epsilon_Customizer::add_field(
	'bizcon_footer_social',
	array(
		'type'         => 'epsilon-repeater',
		'section'      => 'bizcon_footer_section',
		'label'        => esc_html__( 'Social Profile Links', 'bizcon' ),
		'button_label' => esc_html__( 'Add new social link', 'bizcon' ),
		'row_label'    => array(
			'type'  => 'field',
			'field' => 'social_link_title',
		),
		'fields'       => array(
			'social_link_title'       => array(
				'label'             => esc_html__( 'Title', 'bizcon' ),
				'type'              => 'text',
				'sanitize_callback' => 'wp_kses_post',
				'default'           => 'Twitter',
			),
			'social_url' => array(
				'label'             => esc_html__( 'Social URL', 'bizcon' ),
				'type'              => 'text',
				'sanitize_callback' => 'sanitize_text_field',
				'default'           => 'https://twitter.com',
			),
			'social_icon'        => array(
				'label'   => esc_html__( 'Icon', 'bizcon' ),
				'type'    => 'epsilon-icon-picker',
				'default' => 'fa fa-twitter',
			),
			
		),
	)
);



// Footer Copyright section
Epsilon_Customizer::add_field(
    'bizcon_footer_copyright_separator',
    array(
        'type'        => 'epsilon-separator',
        'label'       => esc_html__( 'Footer Copyright Section', 'bizcon' ),
        'section'     => 'bizcon_footer_section',
        'default'     => true,

    )
);

// Footer copyright text field
// Copy right text
$url = 'https://colorlib.com/';
$copyText = sprintf( __( 'Theme by %s colorlib %s Copyright &copy; %s  |  All rights reserved.', 'bizcon' ), '<a target="_blank" href="' . esc_url( $url ) . '">', '</a>', date( 'Y' ) );
Epsilon_Customizer::add_field(
    'bizcon_footer_copyright_text',
    array(
        'type'        => 'epsilon-text-editor',
        'label'       => esc_html__( 'Footer copyright text', 'bizcon' ),
        'section'     => 'bizcon_footer_section',
        'default'     => wp_kses_post( $copyText ),
    )
);

// Footer widget background color field
Epsilon_Customizer::add_field(
    'bizcon_footer_widget_bdcolor',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Top Background Color', 'bizcon' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'bizcon_footer_section',
        'default'     => '#f7f7f7',
    )
);

// Footer bottom background color field
Epsilon_Customizer::add_field(
    'bizcon_footer_bottom_bgcolor',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Bottom Background Color', 'bizcon' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'bizcon_footer_section',
        'default'     => '#303030',
    )
);

// Footer widget text color field
Epsilon_Customizer::add_field(
    'bizcon_footer_widget_textcolor',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Text Color', 'bizcon' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'bizcon_footer_section',
        'default'     => '#666666',
    )
);

// Footer widget title color field
Epsilon_Customizer::add_field(
    'bizcon_footer_widget_titlecolor',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Widget Title Color', 'bizcon' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'bizcon_footer_section',
        'default'     => '#2f373d',
    )
);

// Footer widget anchor color field
Epsilon_Customizer::add_field(
    'bizcon_footer_widget_anchorcolor',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Anchor Color', 'bizcon' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'bizcon_footer_section',
        'default'     => '#666666',
    )
);

// Footer widget anchor hover color field
Epsilon_Customizer::add_field(
    'bizcon_footer_widget_anchorhovcolor',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Anchor Hover Color', 'bizcon' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'bizcon_footer_section',
        'default'     => '#ff7e5f',
    )
);

// Footer newsletter button color field
Epsilon_Customizer::add_field(
    'bizcon_footer_newsletter_btn_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Newsletter Button Color', 'bizcon' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'bizcon_footer_section',
        'default'     => '#ff7e5f'
    )
);

// Footer other anchor color field
Epsilon_Customizer::add_field(
    'bizcon_footer_other_anchor_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Other Anchor Color', 'bizcon' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'bizcon_footer_section',
        'default'     => '#ff7e5f',
    )
);



