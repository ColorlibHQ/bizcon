<?php 
// Block direct access
if( !defined( 'ABSPATH' ) ){
	exit( 'Direct script access denied.' );
}
/**
 * @Packge 	   : Bizcon
 * @Version    : 1.0
 * @Author 	   : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */


?>

<div id="f0f">
	<div class="container">
		<div class="row">
			<div class="f0f-content text-center">
			<div class="f0f-content-inner">
				<?php 
				$errorText = esc_html__( 'Ooops 404 Error !', 'bizcon' );
				if( bizcon_opt( 'bizcon_fof_titleone' ) ){
					$errorText = bizcon_opt( 'bizcon_fof_titleone' );
				}
				//
				echo '<h1 class="h1">'.esc_html( $errorText ).'</h1>';
				

				// Wrong text block

				$wrongText = wp_kses_post( __( 'Either something went wrong or the page dosen&rsquo;t exist anymore.', 'bizcon' ) );

				if( bizcon_opt('bizcon_fof_titletwo') ){
					$wrongText = bizcon_opt('bizcon_fof_titletwo');
				}

				$anchor = bizcon_anchor_tag(
					array(
						'url' 	 => esc_url( site_url( '/' ) ),
						'text' 	 => esc_html__( 'Go To Home page', 'bizcon' ),
						'class'	 => 'button button-contactForm'
					)
				);

				echo bizcon_paragraph_tag(
					array(
						'text' 	 => esc_html( $wrongText ).' '.wp_kses_post( $anchor ),
					)
				);
				?>
			</div>
			</div>
		</div>
	</div>
</div>