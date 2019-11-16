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
 * Bizcon elementor Team Member section widget.
 *
 * @since 1.0
 */
class Bizcon_Services extends Widget_Base {

	public function get_name() {
		return 'bizcon-services';
	}

	public function get_title() {
		return __( 'Services', 'bizcon' );
	}

	public function get_icon() {
		return 'eicon-info-box';
	}

	public function get_categories() {
		return [ 'bizcon-elements' ];
	}

	protected function _register_controls() {

		$repeater = new \Elementor\Repeater();

        // ----------------------------------------  Service Section ------------------------------
        $this->start_controls_section(
            'services_heading',
            [
                'label' => __( 'Service Short Brief', 'bizcon' ),
            ]
        );
        $this->add_control(
            'service_content',
            [
                'label'         => esc_html__( 'Service Content', 'bizcon' ),
                'description'   => esc_html__('Use <br> tag for line break', 'bizcon'),
                'type'          => Controls_Manager::WYSIWYG,
                'label_block'   => true,
                'default'       => __( '<h2>We Provide Best Services</h2>
                <p>Male bring land dominion over can\'t yielding. His order moveth under of dry brought him is. Multiply which firmament deep make. Male bring land. Dominion over can\'t yielding. His moveth under of dry brought him is. Multiply which firmament deep make.</p>', 'bizcon' )
            ]
        );

        $this->add_control(
            'serv_btn_label',
            [
                'label'         => esc_html__( 'Button Label', 'bizcon' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'default'       => esc_html__('Load More', 'bizcon')
            ]
        );
        $this->add_control(
            'serv_btn_url',
            [
                'label'         => esc_html__( 'Button URL', 'bizcon' ),
                'type'          => Controls_Manager::URL,
                'label_block'   => true,
                
            ]
        );

        $this->end_controls_section(); // End section top content
        
		// ----------------------------------------   Services content ------------------------------
		$this->start_controls_section(
			'services_block',
			[
				'label' => __( 'Services', 'bizcon' ),
			]
		);
		$this->add_control(
            'services_content', [
                'label' => __( 'Create Service', 'bizcon' ),
                'type'  => Controls_Manager::REPEATER,
                'title_field' => '{{{ label }}}',
                'fields' => [
                    [
                        'name'  => 'style_color',
                        'label' => __( 'Select Color', 'bizcon' ),
                        'type'  => Controls_Manager::SELECT,
                        'default'   => 'style1',
                        'options'   => [
                            'style1'    => 'Style1',
                            'style2'    => 'Style2',
                        ]
                    ],
                    [
                        'name'  => 'icon',
                        'label' => __( 'Select Icon', 'bizcon' ),
                        'type'  => Controls_Manager::ICON,
                        'options'   => bizcon_flaticon_list()
                    ],
                    [
                        'name'  => 'label',
                        'label' => __( 'Title', 'bizcon' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => __( 'Business Opportunity', 'bizcon' )
                    ],
                    [
                        'name'      => 'desc',
                        'label'     => __( 'Descriptions', 'bizcon' ),
                        'type'      => Controls_Manager::TEXTAREA,
                        'default'   => __( 'Show wherein form yielding whala readeat gathered wherein moved. Behold may be winged created that Won\'t theya are second god give', 'bizcon' )
                    ],
                    [
                        'name'      => 'sing_serv_btn_label',
                        'label'     => __( 'Button Label', 'bizcon' ),
                        'type'      => Controls_Manager::TEXT,
                        'default'   => __( 'Learn More ', 'bizcon' )
                    ],
                    [
                        'name'      => 'sing_serv_btn_url',
                        'label'     => __( 'Button URL', 'bizcon' ),
                        'type'      => Controls_Manager::URL,
                        'default'   => [
                            'url'   => '#'
                        ]
                    ],
                ],
            ]
        );

		$this->end_controls_section(); // End Services content

        /**
         * Style Tab
         * ------------------------------ Style Tab Content ------------------------------
         *
         */

        // Heading Style ==============================
        $this->start_controls_section(
            'color_sect', [
                'label' => __( 'Style Service Heading & Button Left', 'bizcon' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_secttitle', [
                'label'     => __( 'Service Left Title Color', 'bizcon' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#2f373d',
                'selectors' => [
                    '{{WRAPPER}} .service_part .single_service_text h2' => 'color: {{VALUE}};',
                ],
            ]
        );    
        $this->add_control(
            'btn_color', [
                'label'     => __( 'Button label Color', 'bizcon' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .service_part .single_service_text .btn_2' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'btn_bg_color', [
                'label'     => __( 'Button Background Color', 'bizcon' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .service_part .single_service_text .btn_2' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'btn_hover_color', [
                'label'     => __( 'Button Hover label Color', 'bizcon' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .service_part .single_service_text .btn_2:hover' => 'color: {{VALUE}} !important;',
                ],
            ]
        );
        $this->add_control(
            'btn_hover_bg_color', [
                'label'     => __( 'Button Hover Background Color', 'bizcon' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .service_part .single_service_text .btn_2:hover' => 'background: {{VALUE}};',
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
                'selector' => '{{WRAPPER}} .service_part',
            ]
        );

        $this->end_controls_section();


	}

	protected function render() {

    $settings = $this->get_settings();
    $service_content = !empty( $settings['service_content'] ) ? $settings['service_content'] : '';
    $serv_btn_label = !empty( $settings['serv_btn_label'] ) ? $settings['serv_btn_label'] : '';
    $serv_btn_url = !empty( $settings['serv_btn_url']['url'] ) ? $settings['serv_btn_url']['url'] : '';
    $sing_servcs = !empty( $settings['services_content'] ) ? $settings['services_content'] : '';
    ?>

    <!-- service_part start-->
    <section class="service_part section_padding gray_bg">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-lg-8 col-xl-4">
                    <div class="single_service_text">
                        <?php
                            // Service Content =============
                            if( $service_content ){
                                echo wp_kses_post( wpautop( $service_content ) );
                            }

                            // Button =============
                            if( $serv_btn_label ){
                                echo '<a class="btn_2" href="'. esc_url( $serv_btn_url ) .'">'. esc_html( $serv_btn_label ) .'</a>';
                            }
                        ?>
                    </div>
                </div>

                <?php
                if( is_array( $sing_servcs ) && count( $sing_servcs ) > 0 ){
                    foreach ( $sing_servcs as $sing_servc ) {
                        $service_title = !empty( $sing_servc['label'] ) ? $sing_servc['label'] : '';
                        $service_desc  = !empty( $sing_servc['desc'] ) ? $sing_servc['desc'] : '';
                        $servc_btn_lbl = !empty( $sing_servc['sing_serv_btn_label'] ) ? $sing_servc['sing_serv_btn_label'] : '';
                        $servc_btn_url = !empty( $sing_servc['sing_serv_btn_label']['url'] ) ? $sing_servc['sing_serv_btn_label']['url'] : '';
                        $style_color   = ( $sing_servc['style_color'] == 'style1' ) ? '' : 'style_icon';
                        $fontIcon      = !empty( $sing_servc['icon'] ) ? $sing_servc['icon'] : '';
                        $serv_btn      = $sing_servc['style_color'] == 'style2' ? 'service_btn' : '';
                ?>
                <div class="col-sm-6 col-xl-4">
                    <div class="single_service_part">
                        <span class="single_service_icon <?php echo $style_color;?>">
                            <?php
                                if( $fontIcon ){
                                    echo '<i class="'. esc_attr( $fontIcon ) .'"></i>';
                                }
                            ?>
                        </span>
                        <h4><?php echo esc_html( $service_title );?></h4>
                        <p><?php echo esc_html( $service_desc );?></p>
                        <a href="<?php echo esc_url($servc_btn_url);?>" class="btn_3 <?php echo $serv_btn;?>"><?php echo $servc_btn_lbl?> <i class="ti-arrow-right"></i></a>
                    </div>
                </div>
                <?php
                    }
                }
                ?>   
            </div>
        </div>
    </section>
    <!-- service_part end-->
    <?php
    }
}
