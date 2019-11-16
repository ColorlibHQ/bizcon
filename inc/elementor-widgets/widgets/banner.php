<?php
namespace Bizconelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;  
}


/**
 *
 * Bizcon elementor about us section widget.
 *
 * @since 1.0
 */
class Bizcon_Banner extends Widget_Base {

	public function get_name() {
		return 'bizcon-banner';
	}

	public function get_title() {
		return __( 'Banner', 'bizcon' );
	}

	public function get_icon() {
		return 'eicon-banner';
	}

	public function get_categories() {
		return [ 'bizcon-elements' ];
	}

	protected function _register_controls() {

        // ----------------------------------------  content ------------------------------
        $this->start_controls_section(
            'banner_section',
            [
                'label' => __( 'Banner Section Content', 'bizcon' ),
            ]
        );
        $this->add_control(
            'banner_content',
            [
                'label'         => esc_html__( 'Banner Content', 'bizcon' ),
                'type'          => Controls_Manager::WYSIWYG,
                'default'       => __( '<h1>Lead from <br> Front in Business <br> Innovation.</h1>
                <p>Male bring land dominion over can yielding his moveth under of depend brought him is. Multiply which firmament deep make.</p>', 'bizcon' )
            ]
        );
        $this->add_control(
            'banner_btnlabel',
            [
                'label'         => esc_html__( 'Button Label', 'bizcon' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'default'       => esc_html__( 'learn more ', 'bizcon' )
            ]
        );
        $this->add_control(
            'banner_btnurl',
            [
                'label'         => esc_html__( 'Button Url', 'bizcon' ),
                'type'          => Controls_Manager::URL,
                'show_external' => false
            ]
        );
        $this->add_control(
            'intro_vid_btnlabel',
            [
                'label'         => esc_html__( 'Intro Video Button Label', 'bizcon' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'default'       => esc_html__( ' Intro Video', 'bizcon' )
            ]
        );
        $this->add_control(
            'intro_vid_btnurl',
            [
                'label'         => esc_html__( 'Intro Video Url', 'bizcon' ),
                'type'          => Controls_Manager::URL,
                'show_external' => false,
                'default' => [
					'url' => 'https://www.youtube.com/watch?v=pBFQdxA-apI',
					'is_external' => false,
					'nofollow' => true,
				],
            ]
        );

        $this->end_controls_section(); // End content


        /**
         * Style Tab
         * ------------------------------ Background Style ------------------------------
         *
         */

        // Button Style ==============================
        $this->start_controls_section(
            'stylecolor', [
                'label' => __( 'Style Button', 'bizcon' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );        
        $this->add_control(
            'btn_color', [
                'label'     => __( 'Button label Color', 'bizcon' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .banner_part .banner_text_iner .btn_1' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'btn_bg_color', [
                'label'     => __( 'Button Background Color', 'bizcon' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .banner_part .banner_text_iner .btn_1' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'btn_hover_color', [
                'label'     => __( 'Button Hover label Color', 'bizcon' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .banner_part .banner_text_iner .btn_1:hover' => 'color: {{VALUE}} !important;',
                ],
            ]
        );
        $this->add_control(
            'btn_hover_bg_color', [
                'label'     => __( 'Button Hover Background Color', 'bizcon' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .banner_part .banner_text_iner .btn_1:hover' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();

        // Background Style ==============================
        $this->start_controls_section(
            'section_bg', [
                'label' => __( 'Style Background', 'bizcon' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        
        $this->add_control(
            'section_bgheading',
            [
                'label'     => __( 'Background Settings', 'bizcon' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'sectionbg',
                'label' => __( 'Background', 'bizcon' ),
                'types' => [ 'classic' ],
                'selector' => '{{WRAPPER}} .banner_part',
            ]
        );

        $this->end_controls_section();

	}

	protected function render() {
        $settings = $this->get_settings();
        $ban_content = !empty( $settings['banner_content'] ) ? $settings['banner_content'] : '';
        $btn_label = !empty( $settings['banner_btnlabel'] ) ? $settings['banner_btnlabel'] : '';
        $buttonUrl = !empty( $settings['banner_btnurl']['url'] ) ? $settings['banner_btnurl']['url'] : '';
        $intro_vid_btnlabel = !empty( $settings['intro_vid_btnlabel'] ) ? $settings['intro_vid_btnlabel'] : ' Intro Video';
        $intro_vid_btnurl = !empty( $settings['intro_vid_btnurl']['url'] ) ? $settings['intro_vid_btnurl']['url'] : 'https://www.youtube.com/watch?v=pBFQdxA-apI';
        $icon_path = BIZCON_DIR_ASSETS_URI .'img/icon/play.svg';
        $icon_path_1 = BIZCON_DIR_ASSETS_URI .'img/animate_icon/icon_1.png';
        $icon_path_2 = BIZCON_DIR_ASSETS_URI .'img/animate_icon/icon_2.png';
        $icon_path_5 = BIZCON_DIR_ASSETS_URI .'img/animate_icon/icon_5.png';
        $icon_path_7 = BIZCON_DIR_ASSETS_URI .'img/animate_icon/icon_7.png';
        $icon_path_8 = BIZCON_DIR_ASSETS_URI .'img/animate_icon/icon_8.png';
        ?>

        <!-- banner part start-->
        <section class="banner_part">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-7 col-xl-6">
                        <div class="banner_text">
                            <div class="banner_text_iner">
                                <?php
                                    if( $ban_content ){
                                        echo wp_kses_post( wpautop( $ban_content ) );
                                    }

                                    if( $btn_label ){
                                        echo '<a class="btn_1" href="'. esc_url( $buttonUrl ) .'">'. esc_html( $btn_label ) .'</a>';
                                    }
                                ?>
                                <a href="<?php echo esc_url( $intro_vid_btnurl );?>" class="popup-youtube video_popup">
                                    <span><img src="<?php echo esc_url( $icon_path );?>" alt=""></span><?php echo esc_html( $intro_vid_btnlabel );?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hero-app-1 custom-animation"><img src="<?php echo esc_url( $icon_path_1 );?>" alt=""></div>
            <div class="hero-app-2 custom-animation2"><img src="<?php echo esc_url( $icon_path_2 );?>" alt=""></div>
            <div class="hero-app-5 custom-animation4"><img src="<?php echo esc_url( $icon_path_5 );?>" alt=""></div>
            <div class="hero-app-7 custom-animation2"><img src="<?php echo esc_url( $icon_path_7 );?>" alt=""></div>
            <div class="hero-app-8 custom-animation"><img src="<?php echo esc_url( $icon_path_8 );?>" alt=""></div>
        </section>
        <!-- banner part start-->
        <?php

    }
	
}
