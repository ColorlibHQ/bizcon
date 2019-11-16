<?php
namespace Bizconelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
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
 * elementor projects section widget.
 *
 * @since 1.0
 */
class Bizcon_projects extends Widget_Base {

	public function get_name() {
		return 'bizcon-projects';
	}

	public function get_title() {
		return __( 'Projects', 'bizcon' );
	}

	public function get_icon() {
		return 'eicon-gallery-grid';
	}

	public function get_categories() {
		return [ 'bizcon-elements' ];
	}

	protected function _register_controls() {

        $this->start_controls_section(
			'section_heading',
			[
				'label' => __( 'Section Heading', 'bizcon' ),
			]
		);
        $this->add_control(
            'sec_title',
            [
                'label'         => esc_html__( 'Title', 'bizcon' ),
                'description'   => __( "Use < span> tag for color italic word", "bizcon" ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'default'       => __( 'Explore Our Best Practice Area', 'bizcon' )
            ]
        );
        $this->add_control(
            'sec_subtitle', [
                'label'         => esc_html__( 'Sub Title', 'bizcon' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'default'       => esc_html__( 'Male bring land. Dominion over can yielding his moveth under him is. Multiply which firmament', 'bizcon' )
                                
            ]
        );
		$this->end_controls_section(); 


        // ----------------------------------------  Projects Content ------------------------------
        $this->start_controls_section(
            'menu_tab_sec',
            [
                'label' => __( 'Projects', 'bizcon' ),
            ]
        );
		$this->add_control(
			'portfolio_number', [
				'label'         => esc_html__( 'Project Number', 'bizcon' ),
				'type'          => Controls_Manager::NUMBER,
				'max'           => 15,
				'min'           => 1,
				'step'          => 1,
				'default'       => 4

			]
		);

        $this->end_controls_section(); // End projects content

        //------------------------------ Style title ------------------------------
        $this->start_controls_section(
            'style_title', [
                'label' => __( 'Style Project Section', 'bizcon' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'sec_title_color', [
                'label'     => __( 'Section Title Color', 'bizcon' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#2f373d',
                'selectors' => [
                    '{{WRAPPER}} .portfolio_part .card-columns .blockquote h2' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'proj_title_color', [
                'label'     => __( 'Project Title Color', 'bizcon' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#2f373d',
                'selectors' => [
                    '{{WRAPPER}} .portfolio_part .card-columns .card .card-body h5' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'proj_title_hover_color', [
                'label'     => __( 'Project Title Hover Color', 'bizcon' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#ff7e5f',
                'selectors' => [
                    '{{WRAPPER}} .portfolio_part .card-columns .card .card-body:hover h5' => 'color: {{VALUE}};',
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
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'sectionbg',
                'label' => __( 'Background', 'bizcon' ),
                'types' => [ 'classic' ],
                'selector' => '{{WRAPPER}} .portfolio_part',
            ]
        );

        $this->end_controls_section();

	}

	protected function render() {

    $settings = $this->get_settings();
    $this->load_widget_script();
    $pNumber = $settings['portfolio_number'];

    $secTitle = !empty( $settings['sec_title'] ) ? $settings['sec_title'] : '';
    $subTitle = !empty( $settings['sec_subtitle'] ) ? $settings['sec_subtitle'] : '';
    ?>
    <!-- portfolio_part start-->
    <section class="portfolio_part section_padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card-columns">
                        <div class="card">
                            <blockquote class="blockquote mb-0">
                                <?php
	                                // Section Title =========
                                    if( $secTitle ){
                                        echo '<h2>'. wp_kses_post( $secTitle ) .'</h2>';
                                    }
                                    // Section Sub Title=====
                                    if( $subTitle ){
                                        echo '<p>'. esc_html( $subTitle ) .'</p>';
                                    }
                                ?>
                            </blockquote>
                        </div>

                        <?php
                            bizcon_portfolio_section( $pNumber );
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- portfolio_part part end-->

    <?php

    }

    public function load_widget_script(){
        if( \Elementor\Plugin::$instance->editor->is_edit_mode() === true  ) {
        ?>
        <script>
        ( function( $ ){

        })(jQuery);
        </script>
        <?php 
        }
    }
	
}
