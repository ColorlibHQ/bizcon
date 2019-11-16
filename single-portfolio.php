<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package bizcon
 */

get_header();
$project_start_time  = get_post_meta( get_the_ID(), 'project_start_time', true );
$project_start_date  = get_post_meta( get_the_ID(), 'project_start_date', true );
$project_end_time = get_post_meta( get_the_ID(), 'project_end_time', true );
$project_end_date  = get_post_meta( get_the_ID(), 'project_end_date', true );
$project_location  = get_post_meta( get_the_ID(), 'project_location', true );
$portfolioGrid  = get_post_meta( get_the_ID(), 'portfolio-grid', true );

?>

    <section class="project_details">
        <div class="container">
            <div class="portfolio_details_inner">
                <div class="row project_details_content">
                    <?php
                    if( has_post_thumbnail() ) {
	                    ?>
                        <div class="col-md-12 offset-md-0 offset-lg-1 col-lg-10">
                            <div class="project_image">
                                <?php
                                the_post_thumbnail( 'bizcon_single_project_970x520', array( 'class' => 'img-fluid' ) );
                                ?>

                            </div>
                        </div>
	                    <?php
                    } ?>
                    <div class="col-md-7 offset-lg-1 col-lg-6 portfolio_content">
                        <?php
                        if( have_posts() ){
                            while ( have_posts() ){
                                the_post();
                                the_content();
                            }
                        }
                        ?>
                    </div>
                    <div class="col-md-5 col-lg-4">
                        <div class="portfolio_right_text">
                            <div class="project_details_widget">
                                <div class="single_project_details_widget">
                                    <span class="ti-time"></span>
                                    <?php 
                                        echo '<h5>'. esc_html__( 'Start Time', 'bizcon' ) . '</h5>';
                                        
                                        if( !empty( $project_start_time ) ){
                                            echo '<p>'. esc_html( $project_start_time ) . '</p>';
                                        }

                                        if( !empty( $project_start_date ) ){
                                            echo '<h6>'. esc_html( $project_start_date ) . '</h6>';
                                        }
                                    ?>
                                </div>

                                <div class="single_project_details_widget">
                                    <span class="ti-check-box"></span>
                                    <?php 
                                        echo '<h5>'. esc_html__( 'End Time', 'bizcon' ) . '</h5>';
                                        
                                        if( !empty( $project_end_time ) ){
                                            echo '<p>'. esc_html( $project_end_time ) . '</p>';
                                        }

                                        if( !empty( $project_end_date ) ){
                                            echo '<h6>'. esc_html( $project_end_date ) . '</h6>';
                                        }
                                    ?>
                                </div>


                                <div class="single_project_details_widget">
                                    <span class="ti-location-pin"></span>
                                    <?php 
                                        echo '<h5>'. esc_html__( 'Location', 'bizcon' ) . '</h5>';
                                        
                                        if( !empty( $project_location ) ){
                                            echo '<p>'. esc_html( $project_location ) . '</p>';
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>

    <?php
    if( bizcon_opt('bizcon_portfolio_single_rp') == 1 ) {
	    // Portfolio Recent Post
	    if ( function_exists( 'bizcon_recent_portfolio' ) ) {
		    bizcon_recent_portfolio();
	    }
    }


// Footer============
get_footer();