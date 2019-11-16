<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <!-- For Resposive Device -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <?php echo bizcon_site_icon();?>
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>

    <!--::header part start::-->
    <?php if( is_front_page() ) {
        $bizcon_menu_class = 'main_menu home_menu';
        $bizcon_menu_cols = 'col-lg-8 col-xl-8';
    } else {
        $bizcon_menu_class = 'main_menu';
        $bizcon_menu_cols = 'col-lg-12';
    } ?>
    <header class="<?php echo $bizcon_menu_class?>">
        <div class="container">
            <div class="row align-items-center">
                <div class="<?php echo $bizcon_menu_cols?>">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <?php
                            echo bizcon_theme_logo( 'navbar-brand' );
                        ?>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <?php
                            if(has_nav_menu('primary-menu')) {
                                wp_nav_menu(array(
                                    'menu'           => 'primary-menu',
                                    'theme_location' => 'primary-menu',
                                    'menu_id'        => 'menu-main-menu',
                                    'container_class'=> 'collapse navbar-collapse main-menu-item justify-content-end',
                                    'container_id'   => 'navbarSupportedContent',
                                    'menu_class'     => 'navbar-nav',
                                    'walker'         => new bizcon_bootstrap_navwalker,
                                    'depth'          => 3
                                ));
                            }
                        ?>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- Header part end-->

    <?php
    //Page Title Bar
    if( function_exists( 'bizcon_page_titlebar' ) ){
	    bizcon_page_titlebar();
    }

