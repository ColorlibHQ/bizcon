<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package
 */

    $url = 'https://colorlib.com/';
    $copyText = sprintf( __( 'Theme by %s colorlib %s Copyright &copy; %s  |  All rights reserved.', 'bizcon' ), '<a target="_blank" href="' . esc_url( $url ) . '">', '</a>', date( 'Y' ) );
    $copyRight = !empty( bizcon_opt( 'bizcon_footer_copyright_text' ) ) ? bizcon_opt( 'bizcon_footer_copyright_text' ) : $copyText;
    $footer_class = bizcon_opt( 'bizcon_footer_widget_toggle' ) == 1 ? 'footer-area' : 'no_widget';

    ?>

    <!-- footer part start-->
    <?php
        if( bizcon_opt( 'bizcon_footer_widget_toggle' ) == 1 ) {
    ?>
    <section class="footer-area section_padding <?php echo esc_attr( $footer_class ) ?>">
        <div class="container">
            <div class="row">
                <?php
                    // Footer Widget 1
                    if ( is_active_sidebar( 'footer-1' ) ) {
                        dynamic_sidebar( 'footer-1' );
                    }

                    // Footer Widget 2
                    if ( is_active_sidebar( 'footer-2' ) ) {
                        dynamic_sidebar( 'footer-2' );
                    }

                    // Footer Widget 3
                    if ( is_active_sidebar( 'footer-3' ) ) {
                        dynamic_sidebar( 'footer-3' );
                    }

                    // Footer Widget 4
                    if ( is_active_sidebar( 'footer-4' ) ) {
                        dynamic_sidebar( 'footer-4' );
                    }

                    // Footer Widget 5
                    if ( is_active_sidebar( 'footer-5' ) ) {
                        dynamic_sidebar( 'footer-5' );
                    }
                ?>
            </div>
        </div>
    </section>
    <?php
        } 
    ?>
    <footer class="copyright_part">
        <div class="container">
            <div class="row align-items-center">
                <p class="footer-text m-0 col-lg-8 col-md-12"><?php echo wp_kses_post( $copyRight ); ?></p>

                <?php
                    $social_icons = bizcon_opt( 'bizcon_footer_social' );
                    if( !empty($social_icons)){
                        $show_social = bizcon_opt('bizcon_social_profile_toggle');
                        if ( $show_social == 1 ){
                ?>
                <div class="col-lg-4 col-md-12 text-center text-lg-right footer-social">
                    <?php
                        for ( $i = 0; $i < count($social_icons); $i++ ) {
                    ?>
                    <a href="<?php echo esc_url($social_icons[$i]['social_url']);?>"><i class="<?php echo esc_attr($social_icons[$i]['social_icon']);?>"></i></a>
                                    
                    <?php
                        }
                    ?>
                </div>
                <?php
                        }
                    }
                ?>
            </div>
        </div>
    </footer>
    <!-- footer part end-->

    <?php wp_footer(); ?>
    </body>
</html>