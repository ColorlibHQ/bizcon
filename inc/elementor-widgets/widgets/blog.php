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
 * Bizcon elementor few words section widget.
 *
 * @since 1.0
 */

class Bizcon_Blog extends Widget_Base {

	public function get_name() {
		return 'bizcon-blog';
	}

	public function get_title() {
		return __( 'Blog', 'bizcon' );
	}

	public function get_icon() {
		return 'eicon-post-list';
	}

	public function get_categories() {
		return [ 'bizcon-elements' ];
	}

	protected function _register_controls() {

        // ----------------------------------------  Blog content ------------------------------
        $this->start_controls_section(
            'blog_content',
            [
                'label' => __( 'Latest Blog Post', 'bizcon' ),
            ]
        );
		$this->add_control(
			'sec_title',
			[
				'label'         => esc_html__( 'Title', 'bizcon' ),
				'description'   => __( "Use < span> tag for color and italic word", "bizcon" ),
				'type'          => Controls_Manager::TEXT,
				'label_block'   => true,
				'default'       => __( 'Update From Blog', 'bizcon' )
			]
		);
		$this->add_control(
			'sec_subtitle', [
				'label'         => esc_html__( 'Sub Title', 'bizcon' ),
				'type'          => Controls_Manager::TEXT,
				'label_block'   => true,
				'default'       => esc_html__( 'Winged hath had face creepeth abundantly so shall fire apperar', 'bizcon' )

			]
		);

        $this->end_controls_section(); // End few words content

        //------------------------------ Style Section ------------------------------
        $this->start_controls_section(
            'style_section', [
                'label' => __( 'Style Section Heading', 'bizcon' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_secttitle', [
                'label'     => __( 'Section Title Color', 'bizcon' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#202e31',
                'selectors' => [
                    '{{WRAPPER}} .blog_part .section_tittle h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'color_sectsubtitle', [
                'label'     => __( 'Section Sub Title Color', 'bizcon' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#888888',
                'selectors' => [
                    '{{WRAPPER}} .blog_part .section_tittle p' => 'color: {{VALUE}};',
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
                'selector' => '{{WRAPPER}} .blog_part',
            ]
        );

        $this->end_controls_section();
	}

	protected function render() {

    $settings  = $this->get_settings();
    $title = !empty( $settings['sec_title'] ) ? $settings['sec_title'] : '';
    $subTitle = !empty( $settings['sec_subtitle'] ) ? $settings['sec_subtitle'] : '';
    ?>
    <!--::blog_part start::-->
    <section class="blog_part section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6">
                    <div class="section_tittle text-center">
                        <?php
                        if( $title ){
                            echo '<h2>'. wp_kses_post( $title ) .'</h2>';
                        }
                        if( $subTitle ){
                            echo '<p>'. esc_html( $subTitle ) .'</p>';
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php
                    if( function_exists( 'bizcon_latest_blog' ) ) {
                        bizcon_latest_blog();
                    }
                ?>
            </div>
        </div>
    </section>
    <!--::blog_part end::-->
    <?php
	}
}
