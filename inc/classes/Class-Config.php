<?php 
/**
 * @Packge 	   : Bizcon
 * @Version    : 1.0
 * @Author 	   : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */
 
	// Block direct access
	if( !defined( 'ABSPATH' ) ){
		exit( 'Direct script access denied.' );
	}

	// Final Class
	final class Bizcon{

		
		// Theme Version
		private $bizcon_version = '1.0';

		// Minimum WordPress Version required
		private $min_wp = '4.0';

		// Minimum PHP version required 
		private $min_php = '5.6.25';

		function __construct(){
			// Theme Support
			add_action( 'after_setup_theme', array( $this, 'support' ) );
			// 
			$this->init();
		}

		// Theme init
		public function init(){
			//
			$this->setup();

			// customizer init Instantiate
			$this->customizer_init();
			
		}

		// Theme setup
		private function setup(){
			
			// Create enqueue class instance
			$enqueu = new bizcon_Enqueue();
			$enqueu->scripts = $this->enqueue() ;
			$enqueu->bizcon_scripts_enqueue_init() ;

		}
		// Theme Support
		public function support(){
			// content width
	        $GLOBALS['content_width'] = apply_filters( 'bizcon_content_width', 751 );

	        
	        // text domain for translation.
	        load_theme_textdomain( 'bizcon', BIZCON_DIR_PATH . '/languages' );
	        
	        // support title tage
	        add_theme_support( 'title-tag' );
	        
	        // support logo
			add_theme_support( 'custom-logo', array(
				'height'      => 50,
				'width'       => 160,
				'flex-height' => true,
				'flex-width'  => true,
				'header-text' => array( 'site-title', 'site-description' ),
			) );

			//Custom Hreader
			add_theme_support( 'custom-header', array(
				'flex-width'    => true,
				'width'         => 1920,
				'flex-height'   => true,
				'height'        => 450,
				'default-image' => get_template_directory_uri() . '/assets/img/banner.png'
			) );

			//Custom background
			add_theme_support( 'custom-background', array(
				'default-color' => 'ffffff'
			) );

	        //  support post format
	        add_theme_support( 'post-formats', array( 'video','audio' ) );
	        
	        // support post-thumbnails
	        add_theme_support( 'post-thumbnails', array( 'post', 'page', 'portfolio' ) );
			
			// Site logo size
			add_image_size( 'bizcon_logo_141x33', 141, 33, true );
					
			// About section image size
			add_image_size( 'bizcon_about_section_607x607', 607, 607, true );
			
			// Testimonial client image size
			add_image_size( 'review_img_150x150', 150, 150, true );

			// Latest post thumbnail Widget thumbnail size
			add_image_size( 'bizcon_widget_post_thumb', 80, 80, true );

			// Portfolio image size
			add_image_size( 'portfolio_570x356', 570, 356, true );
			add_image_size( 'portfolio_570x406', 570, 406, true );
			add_image_size( 'portfolio_570x401', 570, 401, true );
			add_image_size( 'portfolio_570x591', 570, 591, true );

			// Home blog post image size
			add_image_size( 'bizcon_latest_blog_370x345', 370, 345, true );

			// Single blog post image size
			add_image_size( 'bizcon_single_blog_750x375', 750, 375, true );
			add_image_size( 'bizcon_np_thumb', 60, 60, true );

			// Single project image size
			add_image_size( 'bizcon_single_project_970x520', 970, 520, true );
	        	        
	        // support automatic feed links
	        add_theme_support( 'automatic-feed-links' );
	        
	        // support html5
	        add_theme_support( 'html5' );
			
			// Add theme support for selective refresh for widgets.
			add_theme_support( 'customize-selective-refresh-widgets' );
						    
	        // register nav menu
	        register_nav_menus( array(
	            'primary-menu'   => esc_html__( 'Primary Menu', 'bizcon' ),
				'social-menu'    => esc_html__( 'Social Menu', 'bizcon' ),
				'top-products'   => esc_html__( 'Top Products', 'bizcon' ),
	            'quick-links'    => esc_html__( 'Quick Links', 'bizcon' ),
	            'features'    	 => esc_html__( 'Features', 'bizcon' ),
	            'resources'    	 => esc_html__( 'Resources', 'bizcon' ),
	        ) );

	        // editor style
	        add_editor_style('assets/css/editor-style.css');

		} // end support method

		// enqueue theme style and script
		private function enqueue(){

			$cssPath = BIZCON_DIR_CSS_URI;
			$jsPath  = BIZCON_DIR_JS_URI;
			

			$scripts = array(
				'style' => array(
					array(
						'handler'		=> 'bizcon-theme-google-font',
						'file' 			=> $this->google_font(),
					),
					array(
						'handler'		=> 'bizcon-theme-bootstrap',
						'file' 			=> $cssPath.'bootstrap.min.css',
						'dependency' 	=> array(),
						'version' 		=> '5.3.8-4',
					),
					array(
						'handler'		=> 'bizcon-theme-animate',
						'file' 			=> $cssPath.'animate.css',
						'dependency' 	=> array(),
						'version' 		=> '1.0',
					),
					array(
						'handler'		=> 'bizcon-theme-owl-carousel',
						'file' 			=> $cssPath.'owl.carousel.min.css',
						'dependency' 	=> array(),
						'version' 		=> '1.0',
					),
					array(
						'handler'		=> 'bizcon-theme-font-awesome',
						'file' 			=> $cssPath.'font-awesome.min.css',
						'dependency' 	=> array(),
						'version' 		=> '7.3.1-1',
					),
					array(
						'handler'		=> 'bizcon-theme-themify',
						'file' 			=> $cssPath.'themify-icons.css',
						'dependency' 	=> array(),
						'version' 		=> '1.0',
					),
					array(
						'handler'		=> 'bizcon-theme-flaticon',
						'file' 			=> $cssPath.'flaticon.css',
						'dependency' 	=> array(),
						'version' 		=> '1.0',
					),
					array(
						'handler'		=> 'bizcon-theme-magnific-popup-css',
						'file' 			=> $cssPath.'magnific-popup.css',
						'dependency' 	=> array(),
						'version' 		=> '1.0',
					),
					array(
						'handler'		=> 'bizcon-theme-slick-css',
						'file' 			=> $cssPath.'slick.css',
						'dependency' 	=> array(),
						'version' 		=> '1.0',
					),
					array(
						'handler'		=> 'bizcon-theme-default-css',
						'file' 			=> $cssPath.'default.css',
						'dependency' 	=> array(),
						'version' 		=> '1.0',
					),
					array(
						'handler'		=> 'bizcon-theme-style-css',
						'file' 			=> $cssPath.'style.css',
						'dependency' 	=> array(),
						'version' 		=> '1.0',
					),
					
					array(
						'handler'		=> 'bizcon-theme-bizcon-style',
						'file' 			=> get_stylesheet_uri(),
					),
				),
				
				'scripts' => array(
					array(
						'handler'		=> 'bizcon-theme-bootstrap',
						'file' 			=> $jsPath.'bootstrap.min.js',
						'dependency' 	=> array( 'jquery' ),
						'version' 		=> '5.3.8-4',
						'in_footer' 	=> true
					),
					array(
						'handler'		=> 'bizcon-theme-magnific-popup-js',
						'file' 			=> $jsPath.'jquery.magnific-popup.js',
						'dependency' 	=> array( 'jquery' ),
						'version' 		=> '1.0',
						'in_footer' 	=> true
					),
					array(
						'handler'		=> 'bizcon-theme-swiper-min-js',
						'file' 			=> $jsPath.'swiper.min.js',
						'dependency' 	=> array( 'jquery' ),
						'version' 		=> '1.0',
						'in_footer' 	=> true
					),
					array(
						'handler'		=> 'bizcon-theme-instagram-feed-js',
						'file' 			=> $jsPath.'jquery.instagramFeed.min.js',
						'dependency' 	=> array( 'jquery' ),
						'version' 		=> '1.0',
						'in_footer' 	=> true
					),
					array(
						'handler'		=> 'bizcon-theme-owl-carousel-js',
						'file' 			=> $jsPath.'owl.carousel.min.js',
						'dependency' 	=> array( 'jquery' ),
						'version' 		=> '1.0',
						'in_footer' 	=> true
					),
					array(
						'handler'		=> 'bizcon-theme-slick-min-js',
						'file' 			=> $jsPath.'slick.min.js',
						'dependency' 	=> array( 'jquery' ),
						'version' 		=> '1.0',
						'in_footer' 	=> true
					),
					
					array(
						'handler'		=> 'bizcon-theme-bizcon-custom',
						'file' 			=> $jsPath.'custom.js',
						'dependency' 	=> array( 'jquery' ),
						'version' 		=> $this->bizcon_version,
						'in_footer' 	=> true
					),

				)
			);

			return $scripts;

		} // end enqueu method 

		// Google Font  
		private function google_font(){
			$font_url = '';

			/*
			 * The families this theme uses are bundled under
			 * assets/fonts/google, so nothing is fetched from Google and
			 * no request leaves the visitor's browser for a third party.
			 *
			 * Translators can still turn the fonts off for scripts these
			 * families do not cover.
			 */
			if ( 'off' !== _x( 'on', 'Google font: on or off', 'bizcon' ) ) {
				$font_url = get_template_directory_uri() . '/assets/css/google-fonts.css';
			}

			return esc_url_raw( $font_url );
		} //End google_font method

		private function customizer_init(){

		
			

			
			// Instantiate bizcon theme customizer
			$bizcon_theme_customizer = new bizcon_theme_customizer();
		}
	} // End Bizcon Class

?>