<?php 
/**
 * @Packge 	   : Colorlib
 * @Version    : 1.0
 * @Author 	   : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */
 
	// Block direct access
	if( !defined( 'ABSPATH' ) ){
		exit( 'Direct script access denied.' );
	}

	/**
	 *
	 * Define constant
	 *
	 */
	
	 
	// Base URI
	if( !defined( 'BIZCON_DIR_URI' ) )
		define( 'BIZCON_DIR_URI', get_template_directory_uri().'/' );
	
	// assets URI
	if( !defined( 'BIZCON_DIR_ASSETS_URI' ) )
		define( 'BIZCON_DIR_ASSETS_URI', BIZCON_DIR_URI.'assets/' );
	
	// Css File URI
	if( !defined( 'BIZCON_DIR_CSS_URI' ) )
		define( 'BIZCON_DIR_CSS_URI', BIZCON_DIR_ASSETS_URI .'css/' );
	
	// Js File URI
	if( !defined( 'BIZCON_DIR_JS_URI' ) )
		define( 'BIZCON_DIR_JS_URI', BIZCON_DIR_ASSETS_URI .'js/' );
	
	// Icon Images
	if( !defined('BIZCON_DIR_ICON_IMG_URI') )
		define( 'BIZCON_DIR_ICON_IMG_URI', BIZCON_DIR_URI.'img/core-img/' );
	
	//DIR inc
	if( !defined( 'BIZCON_DIR_INC' ) )
		define( 'BIZCON_DIR_INC', BIZCON_DIR_URI.'inc/' );

	//Elementor Widgets Folder Directory
	if( !defined( 'BIZCON_DIR_ELEMENTOR' ) )
		define( 'BIZCON_DIR_ELEMENTOR', BIZCON_DIR_INC.'elementor-widgets/' );

	// Base Directory
	if( !defined( 'BIZCON_DIR_PATH' ) )
		define( 'BIZCON_DIR_PATH', get_parent_theme_file_path().'/' );
	
	//Inc Folder Directory
	if( !defined( 'BIZCON_DIR_PATH_INC' ) )
		define( 'BIZCON_DIR_PATH_INC', BIZCON_DIR_PATH.'inc/' );
	
	//Colorlib framework Folder Directory
	if( !defined( 'BIZCON_DIR_PATH_LIB' ) )
		define( 'BIZCON_DIR_PATH_LIB', BIZCON_DIR_PATH_INC.'libraries/' );
	
	//Classes Folder Directory
	if( !defined( 'BIZCON_DIR_PATH_CLASSES' ) )
		define( 'BIZCON_DIR_PATH_CLASSES', BIZCON_DIR_PATH_INC.'classes/' );

	
	//Widgets Folder Directory
	if( !defined( 'BIZCON_DIR_PATH_WIDGET' ) )
		define( 'BIZCON_DIR_PATH_WIDGET', BIZCON_DIR_PATH_INC.'widgets/' );
		
	//Elementor Widgets Folder Directory
	if( !defined( 'BIZCON_DIR_PATH_ELEMENTOR_WIDGETS' ) )
		define( 'BIZCON_DIR_PATH_ELEMENTOR_WIDGETS', BIZCON_DIR_PATH_INC.'elementor-widgets/' );
	

		
	/**
	 * Include File
	 *
	 */
	
	// Breadcrumbs file include
	require_once( BIZCON_DIR_PATH_INC . 'bizcon-breadcrumbs.php' );
	// Sidebar register file include
	require_once( BIZCON_DIR_PATH_INC . 'widgets/bizcon-widgets-reg.php' );
	// Post widget file include
	require_once( BIZCON_DIR_PATH_INC . 'widgets/bizcon-recent-post-thumb.php' );
	// News letter widget file include
	require_once( BIZCON_DIR_PATH_INC . 'widgets/bizcon-newsletter-widget.php' );
	//Social Links
	require_once( BIZCON_DIR_PATH_INC . 'widgets/bizcon-social-links.php' );
	// Instagram Widget
	require_once( BIZCON_DIR_PATH_INC . 'widgets/bizcon-instagram.php' );
	// Nav walker file include
	require_once( BIZCON_DIR_PATH_INC . 'wp_bootstrap_navwalker.php' );
	// Theme function file include
	require_once( BIZCON_DIR_PATH_INC . 'bizcon-functions.php' );

	// Theme Demo file include
	require_once( BIZCON_DIR_PATH_INC . 'demo/demo-import.php' );

	// Post Like
	require_once( BIZCON_DIR_PATH_INC . 'post-like.php' );
	// Theme support function file include
	require_once( BIZCON_DIR_PATH_INC . 'support-functions.php' );
	// Html helper file include
	require_once( BIZCON_DIR_PATH_INC . 'wp-html-helper.php' );
	// Pagination file include
	require_once( BIZCON_DIR_PATH_INC . 'wp_bootstrap_pagination.php' );
	// Elementor Widgets
	require_once( BIZCON_DIR_PATH_ELEMENTOR_WIDGETS . 'elementor-widget.php' );
	//
	require_once( BIZCON_DIR_PATH_CLASSES . 'Class-Enqueue.php' );
	
	require_once( BIZCON_DIR_PATH_CLASSES . 'Class-Config.php' );
	// Customizer
	require_once( BIZCON_DIR_PATH_INC . 'customizer/customizer.php' );
	// Class autoloader
	require_once( BIZCON_DIR_PATH_INC . 'class-epsilon-dashboard-autoloader.php' );
	// Class bizcon dashboard
	require_once( BIZCON_DIR_PATH_INC . 'class-epsilon-init-dashboard.php' );


	if( class_exists( 'RW_Meta_Box' ) ){
		// Metabox Function
		require_once( BIZCON_DIR_PATH_INC . 'bizcon-metabox.php' );
	}
	

	// Admin Enqueue Script
	function bizcon_admin_script(){
		wp_enqueue_style( 'bizcon-admin', get_template_directory_uri().'/assets/css/bizcon_admin.css', false, '1.0.0' );
		wp_enqueue_script( 'bizcon_admin', get_template_directory_uri().'/assets/js/bizcon_admin.js', false, '1.0.0' );
	}
	add_action( 'admin_enqueue_scripts', 'bizcon_admin_script' );

	 
	// WooCommerce style desable
	add_filter( 'woocommerce_enqueue_styles', '__return_false' );


	/**
	 * Instantiate Bizcon object
	 *
	 * Inside this object:
	 * Enqueue scripts, Google font, Theme support features, Bizcon Dashboard .
	 *
	 */
	
	$Bizcon = new Bizcon();
	
