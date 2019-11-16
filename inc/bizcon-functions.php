<?php 
/**
 * @Packge     : Bizcon
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */
 
    // Block direct access
    if( !defined( 'ABSPATH' ) ){
        exit( 'Direct script access denied.' );
    }

/*=========================================================
	Theme option callback
=========================================================*/
function bizcon_opt( $id = null, $default = '' ) {
	
	$opt = get_theme_mod( $id, $default );
	
	$data = '';
	
	if( $opt ) {
		$data = $opt;
	}
	
	return $data;
}


/*=========================================================
	Site icon callback
=========================================================*/

function bizcon_site_icon(){
	if ( ! has_site_icon() ) {
		$html = '';
		$icon_path = BIZCON_DIR_ASSETS_URI . 'img/favicon.png';
		$html .= '<link rel="icon" href="' . esc_url ( $icon_path ) . '" sizes="32x32">';
		$html .= '<link rel="icon" href="' . esc_url ( $icon_path ) . '" sizes="192x192">';
		$html .= '<link rel="apple-touch-icon-precomposed" href="' . esc_url ( $icon_path ) . '">';
		$html .= '<meta name="msapplication-TileImage" content="' . esc_url ( $icon_path ) . '">';

		return $html;
	} else {
		return;
	}
}


/*=========================================================
	Custom meta id callback
=========================================================*/
function bizcon_meta( $id = '' ){
    
    $value = get_post_meta( get_the_ID(), '_bizcon_'.$id, true );
    
    return $value;
}


/*=========================================================
	Blog Date Permalink
=========================================================*/
function bizcon_blog_date_permalink(){
	
	$year  = get_the_time('Y'); 
    $month_link = get_the_time('m');
    $day   = get_the_time('d');

    $link = get_day_link( $year, $month_link, $day);
    
    return $link; 
}



/*========================================================
	Blog Excerpt Length
========================================================*/
if ( ! function_exists( 'bizcon_excerpt_length' ) ) {
	function bizcon_excerpt_length( $limit = 30 ) {

		$excerpt = explode( ' ', get_the_excerpt() );
		
		// $limit null check
		if( !null == $limit ){
			$limit = $limit;
		}else{
			$limit = 30;
		}
        
        
		if ( count( $excerpt ) >= $limit ) {
			array_pop( $excerpt );
			$exc_slice = array_slice( $excerpt, 0, $limit );
			$excerpt = implode( " ", $exc_slice ).' ...';
		} else {
			$exc_slice = array_slice( $excerpt, 0, $limit );
			$excerpt = implode( " ", $exc_slice );
		}
		
		$excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
		return $excerpt;

	}
}


/*==========================================================
	Comment number and Link
==========================================================*/
if ( ! function_exists( 'bizcon_posted_comments' ) ) {
    function bizcon_posted_comments(){
        
        $comments_num = get_comments_number();
        if( comments_open() ){
            if( $comments_num == 0 ){
                $comments = esc_html__('No Comments','bizcon');
            } elseif ( $comments_num > 1 ){
                $comments= $comments_num . esc_html__(' Comments','bizcon');
            } else {
                $comments = esc_html__( '1 Comment','bizcon' );
            }
            $comments = '<span class="ti-comments"></span>'. $comments;
        } else {
            $comments = esc_html__( 'Comments are closed', 'bizcon' );
        }
        
        return $comments;
    }
}


/*===================================================
	Post embedded media
===================================================*/
function bizcon_embedded_media( $type = array() ){
    
    $content = do_shortcode( apply_filters( 'the_content', get_the_content() ) );
    $embed   = get_media_embedded_in_content( $content, $type );
        
    if( in_array( 'audio' , $type) ){
    
        if( count( $embed ) > 0 ){
            $output = str_replace( '?visual=true', '?visual=false', $embed[0] );
        }else{
           $output = '';
        }
        
    }else{
        
        if( count( $embed ) > 0 ){

            $output = $embed[0];
        }else{
           $output = ''; 
        }
        
    }
    
    return $output;
}


/*===================================================
	WP post link pages
====================================================*/
function bizcon_link_pages(){
    wp_link_pages( array(
    'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'bizcon' ) . '</span>',
    'after'       => '</div>',
    'link_before' => '<span>',
    'link_after'  => '</span>',
    'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'bizcon' ) . ' </span>%',
    'separator'   => '<span class="screen-reader-text">, </span>',
    ) );
}


/*====================================================
	Theme logo
====================================================*/
function bizcon_theme_logo( $class = '' ) {

    $siteUrl = home_url('/');
    // site logo
		
	$custom_logo_id = get_theme_mod( 'custom_logo' );
	$imageUrl = wp_get_attachment_image_src( $custom_logo_id , 'bizcon_logo_141x33' );
	
	if( !empty( $imageUrl[0] ) ){
		$siteLogo = '<a class="'.esc_attr( $class ).'" href="'.esc_url( $siteUrl ).'"><img src="'.esc_url( $imageUrl[0] ).'" alt=""></a>';
	}else{
		$siteLogo = '<h2><a class="'.esc_attr( $class ).'" href="'.esc_url( $siteUrl ).'">'.esc_html( get_bloginfo('name') ).'</a><span>'. esc_html( get_bloginfo('description') ) .'</span></h2>';
	}
	
	return wp_kses_post( $siteLogo );
	
}


/*================================================
    Page Title Bar
================================================*/
function bizcon_page_titlebar() {
	if ( ! is_page_template( 'template-builder.php' ) ) {
		$header_bg      = esc_url( get_header_image() );
		$header_bg_img 	= !empty( $header_bg ) ? 'background-image: url('.esc_url( $header_bg ).')' : '';
		?>
        <section class="hero-banner" style="<?php echo $header_bg_img?>">
            <div class="container">
				<h2>
				<?php
				if ( is_category() ) {
					single_cat_title( __('Category: ', 'bizcon') );

				} elseif ( is_tag() ) {
					single_tag_title( 'Tag Archive for &quot;' );

				} elseif ( is_archive() ) {
					echo get_the_archive_title();

				} elseif ( is_page() ) {
					echo get_the_title();

				} elseif ( is_search() ) {
					echo esc_html__( 'Search for: ', 'bizcon' ) . get_search_query();

				} elseif ( ! ( is_404() ) && ( is_single() ) || ( is_page() ) ) {
					echo  get_the_title();

				} elseif ( is_home() ) {
					echo esc_html__( 'Blog', 'bizcon' );

				} elseif ( is_404() ) {
					echo esc_html__( '404 error', 'bizcon' );

				}
				?>
				</h2>
                <nav aria-label="breadcrumb" class="banner-breadcrumb">
					<?php
					if ( function_exists( 'bizcon_breadcrumbs' ) ) {
						bizcon_breadcrumbs();
					}
					?>
                </nav>
            </div>
        </section>
		<?php
	}
}



/*================================================
	Blog pull right class callback
=================================================*/
function bizcon_pull_right( $id = '', $condation ){
    
    if( $id == $condation ){
        return ' '.'order-last';
    }else{
        return;
    }
    
}



/*======================================================
	Inline Background
======================================================*/
function bizcon_inline_bg_img( $bgUrl ){
    $bg = '';

    if( $bgUrl ){
        $bg = 'style="background-image:url('.esc_url( $bgUrl ).')"'; 
    }

    return $bg;
}


/*======================================================
	Blog Category
======================================================*/
function bizcon_featured_post_cat(){

	$categories = get_the_category(); 
	
	if( is_array( $categories ) && count( $categories ) > 0 ){
		$getCat = [];
		foreach ( $categories as $value ) {

			if( $value->slug != 'featured' ){
				$getCat[] = '<a href="'.esc_url( get_category_link( $value->term_id ) ).'">'.esc_html( $value->name ).'</a>';
			}   
		}

		return implode( ', ', $getCat );
	}
         
}


/*=======================================================
	Customize Sidebar Option Value Return
========================================================*/
function bizcon_sidebar_opt(){

    $sidebarOpt = bizcon_opt( 'bizcon_blog_layout' );
    $sidebar = '1';
    // Blog Sidebar layout  opt
    if( is_array( $sidebarOpt ) ){
        $sidebarOpt =  $sidebarOpt;
    }else{
        $sidebarOpt =  json_decode( $sidebarOpt, true );
    }
    
    
    if( !empty( $sidebarOpt['columnsCount'] ) ){
        $sidebar = $sidebarOpt['columnsCount'];
    }


    return $sidebar;
}


/**================================================
	Themify Icon
 =================================================*/
function bizcon_themify_icon(){
    return[
        'ti-home'       => 'Home',
        'ti-tablet'     => 'Tablet',
        'ti-email'      => 'Email',
        'ti-twitter'    => 'twitter',
        'ti-skype'      => 'skype',
        'ti-instagram'  => 'instagram',
        'ti-dribbble'   => 'dribbble',
        'ti-vimeo'      => 'vimeo',
    ];
}


/*===========================================================
	Set contact form 7 default form template
============================================================*/
function bizcon_contact7_form_content( $template, $prop ) {
    
    if ( 'form' == $prop ) {

        $template =
            '<div class="row"><div class="col-12"><div class="form-group">[textarea* your-message id:message class:form-control class:w-100 rows:9 cols:30 placeholder "Message"]</div></div><div class="col-sm-6"><div class="form-group">[text* your-name id:name class:form-control placeholder "Enter your  name"]</div></div><div class="col-sm-6"><div class="form-group">[email* your-email id:email class:form-control placeholder "Enter your email"]</div></div><div class="col-12"><div class="form-group">[text your-subject id:subject class:form-control placeholder "Subject"]</div></div></div><div class="form-group mt-3">[submit class:button class:button-contactForm "Send Message"]</div>';

        return $template;

    } else {
    return $template;
    } 
}
add_filter( 'wpcf7_default_template', 'bizcon_contact7_form_content', 10, 2 );



/*============================================================
	Pagination
=============================================================*/
function bizcon_blog_pagination(){
	echo '<nav class="blog-pagination justify-content-center d-flex">';
        the_posts_pagination(
            array(
                'mid_size'  => 2,
                'prev_text' => __( '<span class="ti-angle-left"></span>', 'bizcon' ),
                'next_text' => __( '<span class="ti-angle-right"></span>', 'bizcon' ),
                'screen_reader_text' => ' '
            )
        );
	echo '</nav>';
}


/*=============================================================
	Blog Single Post Navigation
=============================================================*/
if( ! function_exists('bizcon_blog_single_post_navigation') ) {
	function bizcon_blog_single_post_navigation() {

		// Start nav Area
		if( get_next_post_link() || get_previous_post_link()   ):
			?>
			<div class="navigation-area">
				<div class="row">
					<div class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
						<?php
						if( get_next_post_link() ){
							$nextPost = get_next_post();

							if( has_post_thumbnail() ){
								?>
								<div class="thumb">
									<a href="<?php the_permalink(  absint( $nextPost->ID )  ) ?>">
										<?php echo get_the_post_thumbnail( absint( $nextPost->ID ), 'bizcon_np_thumb', array( 'class' => 'img-fluid' ) ) ?>
									</a>
								</div>
								<?php
							} ?>
							<div class="arrow">
								<a href="<?php the_permalink(  absint( $nextPost->ID )  ) ?>">
									<span class="ti-arrow-left text-white"></span>
								</a>
							</div>
							<div class="detials">
								<p><?php echo esc_html__( 'Prev Post', 'bizcon' ); ?></p>
								<a href="<?php the_permalink(  absint( $nextPost->ID )  ) ?>">
									<h4><?php echo wp_trim_words( get_the_title( $nextPost->ID ), 4, ' ...' ); ?></h4>
								</a>
							</div>
							<?php
						} ?>
					</div>
					<div class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
						<?php
						if( get_previous_post_link() ){
							$prevPost = get_previous_post();
							?>
							<div class="detials">
								<p><?php echo esc_html__( 'Next Post', 'bizcon' ); ?></p>
								<a href="<?php the_permalink(  absint( $prevPost->ID )  ) ?>">
									<h4><?php echo wp_trim_words( get_the_title( $prevPost->ID ), 4, ' ...' ); ?></h4>
								</a>
							</div>
							<div class="arrow">
								<a href="<?php the_permalink(  absint( $prevPost->ID )  ) ?>">
									<span class="ti-arrow-right text-white"></span>
								</a>
							</div>
							<div class="thumb">
								<a href="<?php the_permalink(  absint( $prevPost->ID )  ) ?>">
									<?php echo get_the_post_thumbnail( absint( $prevPost->ID ), 'bizcon_np_thumb', array( 'class' => 'img-fluid' ) ) ?>
								</a>
							</div>
							<?php
						} ?>
					</div>
				</div>
			</div>
		<?php
		endif;

	}
}


/*=======================================================
	Author Bio
=======================================================*/
function bizcon_author_bio(){
	$avatar = get_avatar( absint( get_the_author_meta( 'ID' ) ), 90 );
	?>
	<div class="blog-author">
		<div class="media align-items-center">
			<?php
			if( $avatar  ) {
				echo wp_kses_post( $avatar );
			}
			?>
			<div class="media-body">
				<a href="<?php echo esc_url( get_author_posts_url( absint( get_the_author_meta( 'ID' ) ) ) ); ?>"><h4><?php echo esc_html( get_the_author() ); ?></h4></a>
				<p><?php echo esc_html( get_the_author_meta('description') ); ?></p>
			</div>
		</div>
	</div>
	<?php
}


/*===================================================
 Bizcon Comment Template Callback
 ====================================================*/
function bizcon_comment_callback( $comment, $args, $depth ) {

	if ( 'div' === $args['style'] ) {
		$tag       = 'div';
		$add_below = 'comment';
	} else {
		$tag       = 'li';
		$add_below = 'div-comment';
	}
	?>
	<<?php echo esc_attr( $tag ); ?> <?php comment_class( ( empty( $args['has_children'] ) ? '' : 'parent').' comment-list' ) ?> id="comment-<?php comment_ID() ?>">
	<?php if ( 'div' != $args['style'] ) : ?>
		<div id="div-comment-<?php comment_ID() ?>" class="comment-list">
	<?php endif; ?>
		<div class="single-comment">
			<div class="user d-flex">
				<div class="thumb">
					<?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
				</div>
				<div class="desc">
					<div class="comment">
						<?php comment_text(); ?>
					</div>

					<div class="d-flex justify-content-between">
						<div class="d-flex align-items-center">
							<h5 class="comment_author"><?php printf( __( '<span class="comment-author-name">%s</span> ', 'bizcon' ), get_comment_author_link() ); ?></h5>
							<p class="date"><?php printf( __('%1$s at %2$s', 'bizcon'), get_comment_date(),  get_comment_time() ); ?><?php edit_comment_link( esc_html__( '(Edit)', 'bizcon' ), '  ', '' ); ?> </p>
							<?php if ( $comment->comment_approved == '0' ) : ?>
								<em class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'bizcon' ); ?></em>
								<br>
							<?php endif; ?>
						</div>

						<div class="reply-btn">
							<?php comment_reply_link(array_merge( $args, array( 'add_below' => $add_below, 'depth' => 1, 'max_depth' => 5, 'reply_text' => 'Reply' ) ) ); ?>
						</div>
					</div>

				</div>
			</div>
		</div>
	<?php if ( 'div' != $args['style'] ) : ?>
		</div>
	<?php endif; ?>
	<?php
}
// add class comment reply link
add_filter('comment_reply_link', 'bizcon_replace_reply_link_class');
function bizcon_replace_reply_link_class( $class ) {
	$class = str_replace("class='comment-reply-link", "class='btn-reply comment-reply-link text-uppercase", $class);
	return $class;
}



/*=========================================================
    Latest Blog Post For Elementor Section
===========================================================*/
function bizcon_latest_blog( $pNumber = 4 ){
	
	$lBlog = new WP_Query( array(
        'post_type'      => 'post',
        'posts_per_page' => $pNumber
    ) );

    if( $lBlog->have_posts() ){
        while( $lBlog->have_posts() ){
			$lBlog->the_post();
	?>
			<div class="col-sm-6 col-lg-4 col-xl-4">
				<div class="single-home-blog">
					<div class="card">
						<?php
							$post_id = get_the_ID();
							if( has_post_thumbnail() ){
								the_post_thumbnail( 'bizcon_latest_blog_370x345', ['class' => 'card-img-top', 'alt' => 'Blog post ' . $post_id] );
							}
						?>
						<div class="card-body">
							<?php echo bizcon_featured_post_cat(); ?> | <span> <?php the_time('F j, Y') ?></span>
							<a href="<?php the_permalink(); ?>">
								<h5 class="card-title"><?php the_title(); ?></h5>
							</a>
							<ul>
								<li><?php echo bizcon_posted_comments();?></li>
								<li><?php echo get_simple_likes_button( get_the_ID() );?></li>
							</ul>
						</div>
					</div>
				</div>
			</div>

        <?php
        }

    }

}



/*=========================================================
    Share Button Code
===========================================================*/
function bizcon_social_sharing_buttons( $ulClass = '', $tagLine = '' ) {

	// Get page URL
	$URL = get_permalink();
	$Sitetitle = get_bloginfo('name');

	// Get page title
	$Title = str_replace( ' ', '%20', get_the_title());

	// Construct sharing URL without using any script
	$twitterURL = 'https://twitter.com/intent/tweet?text='.esc_html( $Title ).'&amp;url='.esc_url( $URL ).'&amp;via='.esc_html( $Sitetitle );
	$faceportfolioURL= 'https://www.faceportfolio.com/sharer/sharer.php?u='.esc_url( $URL );
	$linkedin   = 'https://www.linkedin.com/shareArticle?mini=true&url='.esc_url( $URL ).'&title='.esc_html( $Title );
	$pinterest  = 'http://pinterest.com/pin/create/button/?url='.esc_url( $URL ).'&description='.esc_html( $Title );;

	// Add sharing button at the end of page/page content
	$content = '';
	$content  .= '<ul class="'.esc_attr( $ulClass ).'">';
	$content .= $tagLine;
	$content .= '<li><a href="' . esc_url( $twitterURL ) . '" target="_blank"><i class="ti-twitter-alt"></i></a></li>';
	$content .= '<li><a href="' . esc_url( $faceportfolioURL ) . '" target="_blank"><i class="ti-faceportfolio"></i></a></li>';
	$content .= '<li><a href="' . esc_url( $pinterest ) . '" target="_blank"><i class="ti-pinterest"></i></a></li>';
	$content .= '<li><a href="' . esc_url( $linkedin ) . '" target="_blank"><i class="ti-linkedin"></i></a></li>';
	$content .= '</ul>';

	return $content;

}



/*================================================
	Projects Return data 
================================================ */
function return_tab_data( $getTags, $menu_tabs ) {
	$y = [];
	foreach ( $getTags as $val ) {

		$t = [];

		foreach( $menu_tabs as $data ) {
			if( $data['label'] == $val ) {
				$t[] = $data;
			}
		}

		$y[$val] = $t;

	}

	return $y;
}


/*================================================
    Bizcon Custom Posts
================================================*/
function bizcon_custom_posts() {
	
	// Portfolio Custom Post
	
	$labels = array(
		'name'               => _x( 'Portfolios', 'post type general name', 'bizcon' ),
		'singular_name'      => _x( 'Portfolio', 'post type singular name', 'bizcon' ),
		'menu_name'          => _x( 'Portfolios', 'admin menu', 'bizcon' ),
		'name_admin_bar'     => _x( 'Portfolio', 'add new on admin bar', 'bizcon' ),
		'add_new'            => _x( 'Add New', 'portfolio', 'bizcon' ),
		'add_new_item'       => __( 'Add New Portfolio', 'bizcon' ),
		'new_item'           => __( 'New Portfolio', 'bizcon' ),
		'edit_item'          => __( 'Edit Portfolio', 'bizcon' ),
		'view_item'          => __( 'View Portfolio', 'bizcon' ),
		'all_items'          => __( 'All Portfolios', 'bizcon' ),
		'search_items'       => __( 'Search Portfolios', 'bizcon' ),
		'parent_item_colon'  => __( 'Parent Portfolios:', 'bizcon' ),
		'not_found'          => __( 'No portfolios found.', 'bizcon' ),
		'not_found_in_trash' => __( 'No portfolios found in Trash.', 'bizcon' )
	);

	$args = array(
		'labels'             => $labels,
		'description'        => __( 'Description.', 'bizcon' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'portfolio' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
	);

	register_post_type( 'portfolio', $args );
	

}
add_action( 'init', 'bizcon_custom_posts' );


/*======================================================
    Recent Portfolio for Single Page
=======================================================*/
function bizcon_recent_portfolio(){

	$sec_title    = !empty( bizcon_opt( 'portfolio_recent_post_section_title' ) ) ? bizcon_opt( 'portfolio_recent_post_section_title' ) : '';
	$sec_subtitle = !empty( bizcon_opt( 'portfolio_recent_post_section_subtitle' ) ) ? bizcon_opt( 'portfolio_recent_post_section_subtitle' ) : '';
	$pnumber      = !empty( bizcon_opt( 'portfolio_recent_post_number' ) ) ? bizcon_opt( 'portfolio_recent_post_number' ) : '';
	$pnumber += 1;

	$recentPortfolio = new WP_Query( array(
        'post_type' => 'portfolio',
        'posts_per_page'    => $pnumber,

    ) );

	?>
	<!--::blog_part start::-->
    <section class="blog_part section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6">
                    <div class="section_tittle text-center">
                        <?php
                        if( $sec_title ){
                            echo '<h2>'. wp_kses_post( $sec_title ) .'</h2>';
                        }
                        if( $sec_subtitle ){
                            echo '<p>'. esc_html( $sec_subtitle ) .'</p>';
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php
                    if( function_exists( 'bizcon_latest_blog' ) ) {
                        bizcon_latest_blog($pnumber);
                    }
                ?>
            </div>
        </div>
    </section>
    <!--::blog_part end::-->


    <!-- <section class="portfolio_area recent-portfolio" id="portfolio">
        <div class="container">
            <div class="area-heading">
                <?php
                if( $sec_title ){
                    echo '<h3>'. wp_kses_post( $sec_title ) .'</h3>';
                }

                if( $sec_subtitle ){
                    echo '<p>'. esc_html( $sec_subtitle ) .'</p>';
                }
                ?>
            </div>

            <div class="filters-content">
                <div class="row portfolio-grid">
                    <div class="grid-sizer col-md-3 col-lg-4"></div>
                    <?php
                    if( $recentPortfolio->have_posts() ){
                        while ( $recentPortfolio->have_posts() ){
	                        $recentPortfolio->the_post(); ?>
                                <div class="col-lg-4 col-md-6 all fashion motion">
                                    <div class="single_portfolio">
                                        <?php
                                        if( has_post_thumbnail() ){
                                            the_post_thumbnail( 'bizcon_recent_360x380', array( 'class' => 'img-fluid w-100' ) );
                                        }
                                        ?>
                                        <div class="short_info">
                                            <?php
                                            $categories = get_the_terms( get_the_ID(), "portfolio-cat");
                                            foreach ( $categories as $category ){
                                                echo '<p>'. $category->name .'</p>';
                                            }
                                            ?>
                                            <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                        </div>
                                    </div>
                                </div>
                            <?php
                        }
                    }

                    ?>
                </div>
            </div>
        </div>
    </section> -->

<?php
}


/*=========================================================
    Portfolio Section
========================================================*/
function bizcon_portfolio_section( $pNumber ){

	$portfolios = new WP_Query( array(
		'post_type' => 'portfolio',
		'posts_per_page'=> $pNumber,

	) );

	if( $portfolios->have_posts() ) {
		while ( $portfolios->have_posts() ) {
			$portfolios->the_post();

			$img_size = get_post_meta( get_the_ID(), 'portfolio-grid', true );
			if( $img_size == 1 ){
				$image_size = 'portfolio_570x356';
			}
			elseif ( $img_size == 2 ) {
				$image_size = 'portfolio_570x406';
			}
			elseif ( $img_size == 3 ){
				$image_size = 'portfolio_570x401';
			}
			elseif ( $img_size == 4 ){
				$image_size = 'portfolio_570x591';
			}
			?>
			<div class="card">
				<?php 
					$port_id = get_the_ID();
					the_post_thumbnail( $image_size, ['class' => esc_attr( 'card-img-top' ), 'alt' => 'Project image ' . $port_id] );?>
				<div class="card-body">
					<a href="<?php the_permalink(); ?>">
						<h5 class="card-title"><?php the_title() ?></h5>
					</a>
					<p class="card-text"><?php echo bizcon_excerpt_length() ?></p>
				</div>
			</div>
		<?php
		}
	}
}


/*==========================================================
 *  Flaticon Icon List
=========================================================*/
function bizcon_flaticon_list(){
    return(
        array(
            'flaticon-growth'     => 'Flaticon Growth',
            'flaticon-wallet'     => 'Flaticon Wallet',
        )
    );
}

