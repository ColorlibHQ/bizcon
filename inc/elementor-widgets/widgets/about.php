<?php
namespace Bizconelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Utils;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Background;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 *
 * Bizcon elementor section widget.
 *
 * @since 1.0
 */
class Bizcon_About extends Widget_Base {

	public function get_name() {
		return 'bizcon-about';
	}

	public function get_title() {
		return __( 'About', 'bizcon' );
	}

	public function get_icon() {
		return 'eicon-thumbnails-half';
	}

	public function get_categories() {
		return [ 'bizcon-elements' ];
	}

	protected function _register_controls() {

        
		// ----------------------------------------  About content ------------------------------
		$this->start_controls_section(
			'about_content',
			[
				'label' => __( 'About Section', 'bizcon' ),
			]
		);
        $this->add_control(
            'content',
            [
                'label'         => esc_html__( 'Content', 'bizcon' ),
                'description'   => esc_html__('Use <br> tag for line break', 'bizcon'),
                'type'          => Controls_Manager::WYSIWYG,
                'label_block'   => true,
                'default'       => __( '<h2>We Have 24 Year Expereince in consulting</h2>
                <h4>First Abundantly night you are sea great fifth year</h4>
                <p>Lights fly above bearing brought abundantly whose. Without one may i seed void wels great face god were deep be first. Unto for third be in moveth. Bring land bearing un abundantly firmament appear whales them years. Lights fly above bearing brought bold abundantly whose without one may i seed. </p>', 'bizcon' )
            ]
        );

        $this->add_control(
            'button_label',
            [
                'label'         => esc_html__( 'Button Label', 'bizcon' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'default'       => esc_html__('read more', 'bizcon')
            ]
        );
        $this->add_control(
            'button_url',
            [
                'label'         => esc_html__( 'Button URL', 'bizcon' ),
                'type'          => Controls_Manager::URL,
                'label_block'   => true,
                
            ]
        );
		$this->end_controls_section(); // End about content


		$this->start_controls_section(
			'about_feature_image',
			[
				'label' => __( 'Section Image', 'bizcon' ),
			]
		);
		$this->add_control(
			'about_img',
			[
				'label'         => esc_html__( 'Select Image', 'bizcon' ),
                'type'          => Controls_Manager::MEDIA,
                'default'       => [
                    'url'       => Utils::get_placeholder_image_src(),
                ]
			]
		);
		$this->end_controls_section(); // End about content


        // Heading Style ==============================
        $this->start_controls_section(
            'color_sect', [
                'label' => __( 'Style Heading', 'bizcon' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
		$this->add_control(
			'color_secttitle', [
				'label'     => __( 'Section Title Color', 'bizcon' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#2f373d',
				'selectors' => [
					'{{WRAPPER}} .about_part .about_text h2' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'color_sectsubtitle', [
				'label'     => __( 'Section Sub Title Color', 'bizcon' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#ff7e5f',
				'selectors' => [
					'{{WRAPPER}} .about_part .about_text h4' => 'color: {{VALUE}};',
				],
			]
		);
        $this->end_controls_section();


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
                    '{{WRAPPER}} .about_part .about_text .btn_2' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'btn_bg_color', [
                'label'     => __( 'Button Background Color', 'bizcon' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .about_part .about_text .btn_2' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'btn_hover_color', [
                'label'     => __( 'Button Hover label Color', 'bizcon' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .about_part .about_text .btn_2:hover' => 'color: {{VALUE}} !important;',
                ],
            ]
        );
        $this->add_control(
            'btn_hover_bg_color', [
                'label'     => __( 'Button Hover Background Color', 'bizcon' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .about_part .about_text .btn_2:hover' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();

        /**
         * Style Tab
         * ------------------------------ Background Style ------------------------------
         *
         */
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
                'selector' => '{{WRAPPER}} .about_part',
            ]
        );

        $this->end_controls_section();


	}

	protected function render() {
        $settings = $this->get_settings();
        $content  = !empty( $settings['content'] ) ? $settings['content'] : '';
        $button_label = !empty( $settings['button_label'] ) ? $settings['button_label'] : '';
        $button_url   = !empty( $settings['button_url']['url'] ) ? $settings['button_url']['url'] : '';

		$feature_img = !empty( $settings['about_img']['id'] ) ? wp_get_attachment_image( $settings['about_img']['id'], 'bizcon_about_section_607x607', false, array( 'class' => 'styleBox-img1' ) ) : '';
        $icon_path_1 = BIZCON_DIR_ASSETS_URI .'img/animate_icon/icon_1.png';
        $icon_path_2 = BIZCON_DIR_ASSETS_URI .'img/animate_icon/icon_2.png';
        $icon_path_3 = BIZCON_DIR_ASSETS_URI .'img/animate_icon/icon_3.png';
        ?>


        <!-- about part start-->
        <section class="about_part">
            <div class="container">
                <div class="row align-items-center justify-content-end">
                    <div class="col-md-6 col-lg-6 col-xl-5">
                        <div class="about_img">
                            <?php
                                if( $feature_img ){
                                    echo wp_kses_post( $feature_img );
                                }
                            ?>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 offset-xl-1 col-xl-6">
                        <div class="about_text">
                            <?php
                                //Content ==============
                                if( $content ){
                                    echo wp_kses_post( wpautop( $content ) );
                                }
                                // Button =============
                                if( $button_label ){
                                    echo '<a class="btn_2" href="'. esc_url( $button_url ) .'">'. esc_html( $button_label ) .'</a>';
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hero-app-7 custom-animation"><img src="<?php echo esc_url( $icon_path_1 );?>" alt=""></div>
            <div class="hero-app-8 custom-animation2"><img src="<?php echo esc_url( $icon_path_2 );?>" alt=""></div>
            <div class="hero-app-6 custom-animation3"><img src="<?php echo esc_url( $icon_path_3 );?>" alt=""></div>
        </section>
        <!-- about part start-->
        <?php

    }

}
