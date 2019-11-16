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
 * Bizcon elementor section widget.
 *
 * @since 1.0
 */
class Bizcon_Testimonial extends Widget_Base {

	public function get_name() {
		return 'bizcon-testimonial';
	}

	public function get_title() {
		return __( 'Testimonial', 'bizcon' );
	}

	public function get_icon() {
		return 'eicon-post-slider';
	}

	public function get_categories() {
		return [ 'bizcon-elements' ];
	}

	protected function _register_controls() {

        // Testimonial Heading
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
                'description'   => __( "Use < span> tag for color and italic word", "bizcon" ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'default'       => __( 'Customer Are Saying', 'bizcon' )
            ]
        );
        $this->add_control(
            'sec_subtitle', [
                'label'         => esc_html__( 'Sub Title', 'bizcon' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'default'       => esc_html__( 'Winged hath had face creepeth abundantly so shall', 'bizcon' )
                                
            ]
        );
		$this->end_controls_section(); 


		// ----------------------------------------  Customers review content ------------------------------
		$this->start_controls_section(
			'customersreview_content',
			[
				'label' => __( 'Customers Review', 'bizcon' ),
			]
		);

		$this->add_control(
            'review_slider', [
                'label' => __( 'Create Review', 'bizcon' ),
                'type'  => Controls_Manager::REPEATER,
                'title_field' => '{{{ label }}}',
                'fields' => [
                    [
                        'name'  => 'label',
                        'label' => __( 'Name', 'bizcon' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => esc_html__( 'Daniel E Gilcritst', 'bizcon' )
                    ],
                    [
                        'name'  => 'designation',
                        'label' => __( 'Designation', 'bizcon' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => esc_html__( 'Manager, Vision', 'bizcon' )
                    ],
                    [
                        'name'  => 'desc',
                        'label' => __( 'Descriptions', 'bizcon' ),
                        'type'  => Controls_Manager::TEXTAREA,
                        'default'   => __('Own midst. Behold sea created male he together of That Said fourth deep abundantly have light night beginning rule darkness seed darkness which land saying moveth. Fifth shall wont signs, can seasons green days gathered great', 'bizcon')
                    ],
                    [
                        'name'  => 'img',
                        'label' => __( 'Image', 'bizcon' ),
                        'type'  => Controls_Manager::MEDIA,
                    ]
                ],
            ]
		);

		$this->end_controls_section(); // End exibition content

        /**
         * Style Tab
         *
         */
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
				'default'   => '#2f373d',
				'selectors' => [
					'{{WRAPPER}} .review_part .section_tittle h2' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'color_sectsubtitle', [
				'label'     => __( 'Section Sub Title Color', 'bizcon' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#666666',
				'selectors' => [
					'{{WRAPPER}} .review_part .section_tittle p' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();


		$this->start_controls_section(
			'style_item',
			[
				'label' => __( 'Style Item', 'bizcon' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

        $this->add_control(
            'more_options',
            [
                'label' => __( 'Description Color', 'bizcon' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'testimonial_name_color', [
                'label'     => __( 'Testimonial Name Color', 'bizcon' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .client_review_text h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'testimonial_desc_color', [
                'label'     => __( 'Testimonial Description Color', 'bizcon' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .client_review_text p' => 'color: {{VALUE}};',
                ],
            ]
        );

		$this->end_controls_section();



        /*------------------------------ Background Style ------------------------------*/
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
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'sectionbg',
                'label' => __( 'Background', 'bizcon' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .review_part',
            ]
        );

        $this->end_controls_section();

	}

	protected function render() {

    $settings = $this->get_settings();
    // call load widget script
	$this->load_widget_script();
	$title = !empty( $settings['sec_title'] ) ? $settings['sec_title'] : '';
    $subTitle = !empty( $settings['sec_subtitle'] ) ? $settings['sec_subtitle'] : '';
	$reviews = !empty( $settings['review_slider'] ) ? $settings['review_slider'] : '';
    $icon_quote = BIZCON_DIR_ASSETS_URI .'img/icon/quate.svg';
    $icon_path_4 = BIZCON_DIR_ASSETS_URI .'img/animate_icon/icon_4.png';
    $icon_path_8 = BIZCON_DIR_ASSETS_URI .'img/animate_icon/icon_8.png';
    $icon_path_3 = BIZCON_DIR_ASSETS_URI .'img/animate_icon/icon_3.png';
    ?>
    <!--::review_part start::-->
    <section class="review_part padding_top">
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
            <div class="row justify-content-center">
                <div class="col-lg-6 col-xl-5">
                    <!-- THUMBNAILS -->
                    <div class="slider-nav-thumbnails">
                    <?php
	                if( is_array( $reviews ) && count( $reviews ) > 0 ){
	                    foreach ($reviews as $review ) {
                            $image = !empty( $review['img']['id'] ) ? wp_get_attachment_image( $review['img']['id'], 'review_img_150x150', '', array('class' => 'image','alt' => 'Slideimg' ) ) : '';
                        ?>
                        <div class="slider-thumbnails">
                            <?php
                                if( $image ){
                                    echo wp_kses_post( $image );
                                }
                            ?>
                        </div>
                        <?php
                        }
                    }
                    ?>
                    </div>
                </div>
                <div class="col-lg-10">
                    <!-- MAIN SLIDES -->
                    <div class="slider">
                        <?php
                            $counter = 1;
                            foreach ($reviews as $review ) {
                                $aName = !empty( $review['label'] ) ? $review['label'] : '';
                                $desig = !empty( $review['designation'] ) ? $review['designation'] : '';
                                $desc  = !empty( $review['desc'] ) ? $review['desc'] : '';
                                
                        ?>
                        <div data-index="<?php echo $counter++;?>">
                            <div class="client_review_text text-center">
                                <img src="<?php echo esc_url( $icon_quote );?>" class="quate_icon" alt="quote">
                                <?php
                                    // Description ---------------
                                    if( $desc ){
                                        echo '<p>'. esc_html( $desc ) .'</p>';
                                    }
                                    
                                    // Name ----------------------
                                    if( $aName ){
                                        echo '<h3>'. esc_html( $aName ) .' </h3>';
                                    }

                                    // Designation ---------------
                                    if( $desig ){
                                        echo '<h5>'. esc_html( $desig ) .'</h5>';
                                    }
                                ?>
                            </div>
                        </div>
                        <?php
                            // }
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="hero-app-7 custom-animation4"><img src="<?php echo esc_url( $icon_path_4 );?>" alt="icon 4"></div>
            <div class="hero-app-3 custom-animation2"><img src="<?php echo esc_url( $icon_path_8 );?>" alt="icon 8"></div>
            <div class="hero-app-8 custom-animation"><img src="<?php echo esc_url( $icon_path_3 );?>" alt="icon 3"></div>
        </div>
    </section>
    <!--::review_part end::-->
    <?php

    }

    public function load_widget_script(){
        if( \Elementor\Plugin::$instance->editor->is_edit_mode() === true  ) {
        ?>
        <script>
        ( function( $ ){

            $('.slider').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false,
                speed: 300,
                infinite: true,
                asNavFor: '.slider-nav-thumbnails',
                autoplay:true,
                pauseOnFocus: true,
                dots: true,
            });
            
            $('.slider-nav-thumbnails').slick({
                slidesToShow: 3,
                slidesToScroll: 1,
                asNavFor: '.slider',
                focusOnSelect: true,
                infinite: true,
                prevArrow: false,
                nextArrow: false,
                centerMode: true,
                responsive: [
                {
                    breakpoint: 480,
                    settings: {
                    centerMode: false,
                    }
                }
                ]
            });
            
            //remove active class from all thumbnail slides
            $('.slider-nav-thumbnails .slick-slide').removeClass('slick-active');
            
            //set active class to first thumbnail slides
            $('.slider-nav-thumbnails .slick-slide').eq(0).addClass('slick-active');
            
            // On before slide change match active thumbnail to current slide
            $('.slider').on('beforeChange', function (event, slick, currentSlide, nextSlide) {
                var mySlideNumber = nextSlide;
                $('.slider-nav-thumbnails .slick-slide').removeClass('slick-active');
                $('.slider-nav-thumbnails .slick-slide').eq(mySlideNumber).addClass('slick-active');
            });
            
            //UPDATED 
            
            $('.slider').on('afterChange', function(event, slick, currentSlide){   
            $('.content').hide();
            $('.content[data-id=' + (currentSlide + 1) + ']').show();
            }); 
            
        })(jQuery);
        </script>
        <?php 
        }
    }
	
}
