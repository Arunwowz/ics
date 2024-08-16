<?php
/**
 * Theme functions and definitions
 *
 * @package HelloElementor
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

define( 'HELLO_ELEMENTOR_VERSION', '2.7.1' );

if ( ! isset( $content_width ) ) {
	$content_width = 800; // Pixels.
}

if ( ! function_exists( 'hello_elementor_setup' ) ) {
	/**
	 * Set up theme support.
	 *
	 * @return void
	 */
	function hello_elementor_setup() {
		if ( is_admin() ) {
			hello_maybe_update_theme_version_in_db();
		}

		if ( apply_filters( 'hello_elementor_register_menus', true ) ) {
			register_nav_menus( [ 'menu-1' => esc_html__( 'Header', 'hello-elementor' ) ] );
			register_nav_menus( [ 'menu-2' => esc_html__( 'Footer', 'hello-elementor' ) ] );
		}

		if ( apply_filters( 'hello_elementor_post_type_support', true ) ) {
			add_post_type_support( 'page', 'excerpt' );
		}

		if ( apply_filters( 'hello_elementor_add_theme_support', true ) ) {
			add_theme_support( 'post-thumbnails' );
			add_theme_support( 'automatic-feed-links' );
			add_theme_support( 'title-tag' );
			add_theme_support(
				'html5',
				[
					'search-form',
					'comment-form',
					'comment-list',
					'gallery',
					'caption',
					'script',
					'style',
				]
			);
			add_theme_support(
				'custom-logo',
				[
					'height'      => 100,
					'width'       => 350,
					'flex-height' => true,
					'flex-width'  => true,
				]
			);

			/*
			 * Editor Style.
			 */
			add_editor_style( 'classic-editor.css' );

			/*
			 * Gutenberg wide images.
			 */
			add_theme_support( 'align-wide' );

			/*
			 * WooCommerce.
			 */
			if ( apply_filters( 'hello_elementor_add_woocommerce_support', true ) ) {
				// WooCommerce in general.
				add_theme_support( 'woocommerce' );
				// Enabling WooCommerce product gallery features (are off by default since WC 3.0.0).
				// zoom.
				add_theme_support( 'wc-product-gallery-zoom' );
				// lightbox.
				add_theme_support( 'wc-product-gallery-lightbox' );
				// swipe.
				add_theme_support( 'wc-product-gallery-slider' );
			}
		}
	}
}
add_action( 'after_setup_theme', 'hello_elementor_setup' );

function hello_maybe_update_theme_version_in_db() {
	$theme_version_option_name = 'hello_theme_version';
	// The theme version saved in the database.
	$hello_theme_db_version = get_option( $theme_version_option_name );

	// If the 'hello_theme_version' option does not exist in the DB, or the version needs to be updated, do the update.
	if ( ! $hello_theme_db_version || version_compare( $hello_theme_db_version, HELLO_ELEMENTOR_VERSION, '<' ) ) {
		update_option( $theme_version_option_name, HELLO_ELEMENTOR_VERSION );
	}
}

if ( ! function_exists( 'hello_elementor_scripts_styles' ) ) {
	/**
	 * Theme Scripts & Styles.
	 *
	 * @return void
	 */
	function hello_elementor_scripts_styles() {
		$min_suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

		if ( apply_filters( 'hello_elementor_enqueue_style', true ) ) {
			wp_enqueue_style(
				'hello-elementor',
				get_template_directory_uri() . '/style' . $min_suffix . '.css',
				[],
				HELLO_ELEMENTOR_VERSION
			);
		}

		if ( apply_filters( 'hello_elementor_enqueue_theme_style', true ) ) {
			wp_enqueue_style(
				'hello-elementor-theme-style',
				get_template_directory_uri() . '/theme' . $min_suffix . '.css',
				[],
				HELLO_ELEMENTOR_VERSION
			);
		}
	}
}
add_action( 'wp_enqueue_scripts', 'hello_elementor_scripts_styles' );

if ( ! function_exists( 'hello_elementor_register_elementor_locations' ) ) {
	/**
	 * Register Elementor Locations.
	 *
	 * @param ElementorPro\Modules\ThemeBuilder\Classes\Locations_Manager $elementor_theme_manager theme manager.
	 *
	 * @return void
	 */
	function hello_elementor_register_elementor_locations( $elementor_theme_manager ) {
		if ( apply_filters( 'hello_elementor_register_elementor_locations', true ) ) {
			$elementor_theme_manager->register_all_core_location();
		}
	}
}
add_action( 'elementor/theme/register_locations', 'hello_elementor_register_elementor_locations' );

if ( ! function_exists( 'hello_elementor_content_width' ) ) {
	/**
	 * Set default content width.
	 *
	 * @return void
	 */
	function hello_elementor_content_width() {
		$GLOBALS['content_width'] = apply_filters( 'hello_elementor_content_width', 800 );
	}
}
add_action( 'after_setup_theme', 'hello_elementor_content_width', 0 );

if ( is_admin() ) {
	require get_template_directory() . '/includes/admin-functions.php';
}

/**
 * If Elementor is installed and active, we can load the Elementor-specific Settings & Features
*/

// Allow active/inactive via the Experiments
require get_template_directory() . '/includes/elementor-functions.php';

/**
 * Include customizer registration functions
*/
function hello_register_customizer_functions() {
	if ( is_customize_preview() ) {
		require get_template_directory() . '/includes/customizer-functions.php';
	}
}
add_action( 'init', 'hello_register_customizer_functions' );

if ( ! function_exists( 'hello_elementor_check_hide_title' ) ) {
	/**
	 * Check hide title.
	 *
	 * @param bool $val default value.
	 *
	 * @return bool
	 */
	function hello_elementor_check_hide_title( $val ) {
		if ( defined( 'ELEMENTOR_VERSION' ) ) {
			$current_doc = Elementor\Plugin::instance()->documents->get( get_the_ID() );
			if ( $current_doc && 'yes' === $current_doc->get_settings( 'hide_title' ) ) {
				$val = false;
			}
		}
		return $val;
	}
}
add_filter( 'hello_elementor_page_title', 'hello_elementor_check_hide_title' );

/**
 * BC:
 * In v2.7.0 the theme removed the `hello_elementor_body_open()` from `header.php` replacing it with `wp_body_open()`.
 * The following code prevents fatal errors in child themes that still use this function.
 */
if ( ! function_exists( 'hello_elementor_body_open' ) ) {
	function hello_elementor_body_open() {
		wp_body_open();
	}
}

function categories_link_shortcode() {
 	$terms = get_terms(array(
    'taxonomy'   => 'category',
    'hide_empty' => true,
	));
	$count = count( $terms );
	if ( $count > 0 ) {
		echo '<div class="catbox">';
		echo '<h5>Categories</h5>';
		echo '<ul class="catlisting">';
		foreach ( $terms as $term ) {
			$term_link = get_term_link( $term );
			echo '<li><a href="' .esc_url($term_link). '" target="_blank">' . $term->name . '</a></li>';
		}
		echo '</ul>';
		echo '</div>';
	}
}
add_shortcode('categorieslink', 'categories_link_shortcode');

function posttags_shortcode() {
 	$terms_tags = get_terms(array(
    'taxonomy'   => 'post_tag',
    'hide_empty' => true,
	));
	$count_tags = count( $terms_tags );
	if ( $count_tags > 0 ) {
		echo '<div class="tagsbox">';
		echo '<h5>Tags</h5>';
		echo '<ul class="tagslisting">';
		foreach ( $terms_tags as $termtags ) {
			$term_linktag = get_term_link( $termtags );
			echo '<li><a href="' .esc_url($term_linktag). '" target="_blank">' . $termtags->name . '</a></li>';
		}
		echo '</ul>';
		echo '</div>';
	}
}
add_shortcode('posttags', 'posttags_shortcode');
/**
 * Register our sidebars and widgetized areas.
 *
 */
function arphabet_widgets_init() {

	register_sidebar( array(
		'name'          => 'Custom Sidebar',
		'id'            => 'custom_sidebar_1',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="rounded">',
		'after_title'   => '</h2>',
	) );
	
	register_sidebar( array(
		'name'          => 'Services Sidebar',
		'id'            => 'services_sidebar',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="servicehead">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => 'Industries Sidebar',
		'id'            => 'industries_sidebar',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="industryhead">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => 'Allpages Sidebar',
		'id'            => 'allpages_sidebar',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="allpage">',
		'after_title'   => '</h2>',
	) );
    
    register_sidebar( array(
		'name'          => 'Top Bar Left',
		'id'            => 'topbarleft_sidebar',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="topbar">',
		'after_title'   => '</h2>',
	) );
	
	register_sidebar( array(
		'name'          => 'Top Bar Right',
		'id'            => 'topbarright_sidebar',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="topbar">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'arphabet_widgets_init' );

/**
 * Team Slider Custom Code
 */
function wpb_teamslide() {  	
	$html='<div class="teamslider">
			<ul class="bxslider">';
    global $post;    
    $args = array(  
            'post_type' => 'team',
            'post_status' => 'publish',
            'posts_per_page' => -1, 
            'orderby' => 'ID', 
            'order' => 'DESC',
        );
    $loop_query = get_posts($args);
	$counter=1;
            foreach($loop_query as $values){
            $featured_img_url = get_the_post_thumbnail_url($values->ID,'full'); 
			$value_designation = get_field( "designation", $values->ID );
            $html .='<li class="teamlisec">';			
				$html .='<img src="'.$featured_img_url.'" >';
				$html .='<h4 class="teamauthor">'.$values->post_title.'</h4>';
				$html .='<h6 class="authordesignation">'.$value_designation.'</h6>';
				$html .='<div class="eael-tm-social-links-wrap">';
					$html .='<ul class="eael-tm-social-links">';
					while( the_repeater_field('social_media_accounts', $values->ID) ) {
                    	$socialval_icon = get_sub_field('social_media_account_name');
						$socialval_url = get_sub_field('social_account_type');
						$html .='<li>';
							$html .='<a href="'.$socialval_url.'" target="_blank">';
							$html .='<span class="eael-tm-social-icon-wrap">
										<span class="eael-tm-social-icon fa fa-'.$socialval_icon.'"></span>
									</span>';
							$html .='</a>';
						$html .='</li>';
					}
					$html .='</ul>';
				$html .='</div>';			
			$html .='<li>';
			$counter++;
			}
		$html .='</ul></div>';
	return $html;
}
add_shortcode('teamslider', 'wpb_teamslide');


/**
 * Home2 Service-Slider Custom Code
 */
function wpb_servicesslide() {  	
	$html='<div class="serviceshmmain">
			<ul class="serviceshm">';
    global $post;    
    $args = array(  
            'post_type' => 'solutions',
            'post_status' => 'publish',
            'posts_per_page' => -1, 
            'orderby' => 'ID', 
            'order' => 'DESC',
        );
    $loop_query = get_posts($args);
	$counter=1;
            foreach($loop_query as $values){
				$featured_img_url = get_the_post_thumbnail_url($values->ID,'full'); 
				$html .='<li class="teamlisec">';			
					$html .='<img src="'.$featured_img_url.'" >';
					$html .='<h4 class="teamauthor">'.$values->post_title.'</h4>';			
				$html .='<li>';
				$counter++;
			}
		$html .='</ul></div>';
	return $html;
}
add_shortcode('services-carousel', 'wpb_servicesslide');

/**
 * Home-Below-Banner-Boxes
 */
function wpb_bannerboxes() {  	
	$pageID = get_option('page_on_front');
	$html ='';
	if(get_field('box_repeator', $pageID)){
		$html='<div class="belowbanner-section">';
		while( the_repeater_field('box_repeator', $pageID)){
			$box_title = get_sub_field('box_title', $pageID);
			$box_content = get_sub_field('box_content', $pageID);
			$box_image = get_sub_field('box_image', $pageID);
			$html .='<div class="box-section">
						<img src="'.$box_image.'">
						<h4>'.$box_title.'</h4>
						<p>'.$box_content.'</p>
					 </div>';
		} 
		$html .='</div>';
	}
	return $html;
}
add_shortcode('banner-boxes', 'wpb_bannerboxes');
/**
 * Home-Steps-Section Shortcode Function
 */
function wpb_stepboxes() {  	
	$pageID = get_option('page_on_front');
	$html ='';
	$stepbox_button_title = get_field('stepbox_button_title', $pageID);
	$stepbox_button_url = get_field('stepbox_button_url', $pageID);
	$steps_box_title = get_field('steps_box_title', $pageID);
	$steps_box_subtitle = get_field('steps_box_subtitle', $pageID);
	if(get_field('steps_repeator', $pageID)){
		$html .='<div class="sb-heading">'.$steps_box_title.'</div>';
		$html .='<div class="sb-subheading">'.$steps_box_subtitle.'</div>';
		$html .='<div class="stepbox-section">';
		while( the_repeater_field('steps_repeator', $pageID)){
			$counter_text = get_sub_field('counter_text', $pageID);
			$step_box_title = get_sub_field('step_box_title', $pageID);
			$step_box_text = get_sub_field('step_box_text', $pageID);
			$html .='<div class="stepbox-inner">
						<h4>'.$counter_text.'</h4>
						<h5>'.$step_box_title.'</h5>
						<p>'.$step_box_text.'</p>
					 </div>';
		} 		
		$html .='</div>';
		$html .='<div class="stepbox-btn"><a href="'.$stepbox_button_url.'">'.$stepbox_button_title.'</a></div>';
	}
	return $html;
}
add_shortcode('steps-boxes', 'wpb_stepboxes');
/**
 * Home-newsletter-Section Shortcode Function
 */
function wpb_newsletter_box() {  	
	$pageID = get_option('page_on_front');
	$html ='';
	$newsletter_section_heading = get_field('newsletter_section_heading', $pageID);
	$news_letter_button_text = get_field('news_letter_button_text', $pageID);
	$newsletter_button_url = get_field('newsletter_button_url', $pageID);
	$html .='<div class="newletter-sectionbox">
				<div class="news-section-content">
					<h3>'.$newsletter_section_heading.'</h3>
				</div>
				<div class="news-section-btnbox">
					<div class="global-btn-white">
						<a href="'.$newsletter_button_url.'">'.$news_letter_button_text.'</a>
					</div>
				</div>
			 </div>';
	return $html;
}
add_shortcode('newsletter-box', 'wpb_newsletter_box');
/**
 * Home-Services/solutions-Section
 */
function wpb_serviceshmbox() {  	
	$pageID = get_option('page_on_front');
	$html ='';
	global $post;    
    $args = array(  
            'post_type' => 'solutions',
            'post_status' => 'publish',
            'posts_per_page' => 6, 
            'orderby' => 'ID', 
            'order' => 'DESC',
        );
    $loop_query = get_posts($args);
	$box_button_name = get_field( "box_button_name", $pageID );
	$box_button_url = get_field( "box_button_url", $pageID );
	$html .='<div class="hmservice-boxes">';
		foreach($loop_query as $servicelists){
			$icon_url = get_field( "service_box_icon", $servicelists->ID );
			$service_box_front_content = get_field( "service_box_front_content", $servicelists->ID );
			
			$html .='<div class="hmserv-box">
						<a href="'.get_permalink( $servicelists->ID ).'">
							<img src="'.$icon_url.'">
							<h4>'.$servicelists->post_title.'</h4>
							<p>'.$service_box_front_content.'</p>
						</a>
					 </div>';
		}
	$html .='<div class="box-btn"><a href="'.$box_button_url.'">'.$box_button_name.'</a></div>';
	$html .='</div>';
	return $html;
}
add_shortcode('serviceshmbox', 'wpb_serviceshmbox');

/**
 * Global Testimonial Shortcode  Function
 */
function wpb_testimonialslide() {  	
	$html='<div class="testislider">
			<ul class="gloabltestislider">';
    $args = array(  
            'post_type' => 'testimonials',
            'post_status' => 'publish',
            'posts_per_page' => -1, 
            'orderby' => 'ID', 
            'order' => 'DESC',
        );
    $loop_query = get_posts($args);
			
	        foreach($loop_query as $values){
				
            $featured_img_url = get_the_post_thumbnail_url($values->ID,'full'); 
			$value_company_name = get_field( "company_name", $values->ID );
			$value_star_rating = get_field( "star_rating", $values->ID );
			$stars='';
			for ($x = 0; $x < $value_star_rating; $x++) {
				$stars .= '<i class="fa fa-star" aria-hidden="true"></i>';
			}
            $html .='<li class="testisection">';			
				$html .='<img src="'.$featured_img_url.'" >';
				$html .='<p class="demo3">'.$values->post_content.'</p>';				
				$html .='<h5 class="stars-rating">'.$values->post_title.'</h5>';
				$html .='<h6 class="testi-author">'.$value_company_name.'</h6>';	
			$html .='<li>';
			
			}
		$html .='</ul></div>';
	return $html;
}
add_shortcode('testimonials-slider', 'wpb_testimonialslide');
/* function wpb_testimonialslide() {  	
	$html='<div class="testislider">
			<ul class="gloabltestislider">';
    $args = array(  
            'post_type' => 'testimonials',
            'post_status' => 'publish',
            'posts_per_page' => -1, 
            'orderby' => 'ID', 
            'order' => 'DESC',
        );
    $loop_query = get_posts($args);
			
	        foreach($loop_query as $values){
            $featured_img_url = get_the_post_thumbnail_url($values->ID,'full'); 
			$value_company_name = get_field( "company_name", $values->ID );
			$value_star_rating = get_field( "star_rating", $values->ID );
			$stars='';
			for ($x = 0; $x < $value_star_rating; $x++) {
				$stars .= '<i class="fa fa-star" aria-hidden="true"></i>';
			}
            $html .='<li class="testisection">';			
				$html .='<span class="testimonial-quote"></span>';
				$html .='<p class="demo3">'.$values->post_content.'</p>';
				$html .='<img src="'.$featured_img_url.'" >';
				$html .='<h5 class="stars-rating">'.$stars.'</h5>';
				$html .='<h6 class="testi-author">'.$values->post_title.' <span>'.$value_company_name.'</span></h5>';	
			$html .='<li>';
			
			}
		$html .='</ul></div>';
	return $html;
}
add_shortcode('testimonials-slider', 'wpb_testimonialslide'); */

/**
 * Services-Page Shortcode-Function
 */
function wpb_servicespagebox() {  	
	$pageID = get_option('page_on_front');
	$html ='';
	global $post;    
    $args = array(  
            'post_type' => 'solutions',
            'post_status' => 'publish',
            'posts_per_page' => -1, 
            'orderby' => 'ID', 
            'order' => 'DESC',
        );
    $loop_query = get_posts($args);
	$box_button_name = get_field( "box_button_name", $pageID );
	$box_button_url = get_field( "box_button_url", $pageID );
	$html .='<div class="hmservice-boxes">';
		foreach($loop_query as $servicelists){
			$icon_url = get_field( "service_box_icon", $servicelists->ID );
			$service_box_front_content = get_field( "service_box_front_content", $servicelists->ID );
			
			$html .='<div class="hmserv-box">
						<a href="'.get_permalink( $servicelists->ID ).'">			
							<img src="'.$icon_url.'">
							<h4>'.$servicelists->post_title.'</h4>
							<p>'.$service_box_front_content.'</p>
						</a>
					 </div>';
		}
	$html .='<div class="box-btn"><a href="'.$box_button_url.'">'.$box_button_name.'</a></div>';
	$html .='</div>';
	return $html;
}
add_shortcode('servicespagebox', 'wpb_servicespagebox');

/**
 * FAQ-Page Shortcode-Function
 */
function wpb_faqbox() {  	
	$pageID = get_the_ID();
	$html ='';
	global $post;    
    $args = array(  
            'post_type' => 'faqs_posts',
            'post_status' => 'publish',
            'posts_per_page' => -1, 
            'orderby' => 'ID', 
            'order' => 'DESC',
        );
    $loop_query = get_posts($args);
	$html .='<div class="faq-boxes">';
		foreach($loop_query as $faqlists){
			$html .='<div class="faqserv-box">
						<button class="accordion">'.$faqlists->post_title.'</button>
						<div class="panel">'.$faqlists->post_content.'</div>
					 </div>';
		}
	$html .='</div>';
	return $html;
}
add_shortcode('faq-list', 'wpb_faqbox');

/**
 * Testimonial Page Shortcode
 */
function wpb_testimoniallist() {  	
	$html='<div class="testimonials-list">';
    $args = array(  
            'post_type' => 'testimonials',
            'post_status' => 'publish',
            'posts_per_page' => -1, 
            'orderby' => 'ID', 
            'order' => 'DESC',
        );
    $loop_query = get_posts($args);			
	        foreach($loop_query as $values){
            $featured_img_url = get_the_post_thumbnail_url($values->ID,'full'); 
			$value_company_name = get_field( "company_name", $values->ID );
			$html .='<div class="quote first">
						<div class="testimo_img">
							<a class="avatar-link">
								<img src="'.$featured_img_url.'" >
							</a>
						</div>
						<div class="testimo_desc">
							<blockquote class="testimonials-text">
								<p>'.$values->post_content.'</p>';
								if(get_field('additional_content', $values->ID)){
									$html .='<p>'.get_field('additional_content', $values->ID).'</p>';
								}
			$html .='</blockquote>
							<cite class="author">
								<span>'.$values->post_title.'</span>
							</cite>
							<span class="excerpt">'.$value_company_name.'</span>
						</div>
					</div>
					';
			}
		$html .='</div>';
	return $html;
}
add_shortcode('testimonial-list', 'wpb_testimoniallist');

/**
 * Industries-Page Shortcode-Function
 */
function wpb_industriespagebox() {  	
	$pageID = get_option('page_on_front');
	$html ='';
	global $post;    
    $args = array(  
            'post_type' => 'industries',
            'post_status' => 'publish',
            'posts_per_page' => -1, 
            'orderby' => 'ID', 
            'order' => 'DESC',
        );
    $loop_query = get_posts($args);
	
	$html .='<div class="hmservice-boxes">';
		foreach($loop_query as $industrylists){
			
			$icon_url = get_field( "service_box_icon", $industrylists->ID );
			$service_box_front_content = get_field( "service_box_front_content", $industrylists->ID );
			
			$html .='<div class="hmserv-box">
						<a href="'.get_permalink( $industrylists->ID ).'">			
							<img src="'.$icon_url.'">
							<h4>'.$industrylists->post_title.'</h4>
							<p>'.$service_box_front_content.'</p>
						</a>
					 </div>';
		}
	$html .='</div>';
	return $html;
}
add_shortcode('industiresbox', 'wpb_industriespagebox');


/**
 * Testimonial Page Shortcode
 */
function wpb_teammembers() {  	
	$html='<div class="testimonials-list">';
    $args = array(  
            'post_type' => 'team',
            'post_status' => 'publish',
            'posts_per_page' => -1, 
            'orderby' => 'ID', 
            'order' => 'DESC',
        );
    $loop_query = get_posts($args);			
	        foreach($loop_query as $values){
			$featured_img_url = get_the_post_thumbnail_url($values->ID,'full'); 
			$value_designation = get_field( "designation", $values->ID );
			$value_designation = get_field( "designation", $values->ID );
			$html .='<div class="quote first">
						<div class="testimo_img">
							<a class="avatar-link">
								<img src="'.$featured_img_url.'" >
							</a>
						</div>
						<div class="testimo_desc">
							<blockquote class="testimonials-text">
								<p>'.$values->post_content.'</p>';								
				$html .='</blockquote>
							<cite class="author">
								<span>'.$values->post_title.'</span>
							</cite>
							<span class="excerpt"><strong>'.$value_designation.'</strong></span>';
							if(get_field('social_media_accounts', $values->ID)){
									$html .='<div class="eael-tm-social-links-wrap">';
										$html .='<ul class="eael-tm-social-links">';
										while( the_repeater_field('social_media_accounts', $values->ID) ) {
											$socialval_icon = get_sub_field('social_media_account_name');
											$socialval_url = get_sub_field('social_account_type');
											$html .='<li>';
												$html .='<a href="'.$socialval_url.'" target="_blank">';
												$html .='<span class="eael-tm-social-icon-wrap">
															<span class="eael-tm-social-icon fa fa-'.$socialval_icon.'"></span>
														</span>';
												$html .='</a>';
											$html .='</li>';
										}
										$html .='</ul>';
									$html .='</div>';
								}
				$html .='</div>
					</div>
					';
			}
		$html .='</div>';
	return $html;
}
add_shortcode('teammembers-list', 'wpb_teammembers');

function wpb_bannerboxesnew() {  	
	global $post;    
    $args = array(  
            'post_type' => 'team',
            'post_status' => 'publish',
            'posts_per_page' => -1, 
            'orderby' => 'ID', 
            'order' => 'DESC',
        );
    $loop_query = get_posts($args);
	$counter=1;
	$html ='';
	$html .='<div class="team_slide_section">';
		$html .='<div class="bxslider1">';
		foreach($loop_query as $values){
			$featured_img_url = get_the_post_thumbnail_url($values->ID,'full'); 
			$value_designation = get_field( "designation", $values->ID );
			$html .='<div class="teamnew_box">
						<img src="'.$featured_img_url.'" />
						<h3 class="teamauthor">'.$values->post_title.'</h3>
						<h6 class="authordesignation">'.$value_designation.'</h6>';
					$html .='<div class="eael-tm-social-links-wrap">';
						$html .='<ul class="eael-tm-social-links">';
							while( the_repeater_field('social_media_accounts', $values->ID) ) {
								$socialval_icon = get_sub_field('social_media_account_name');
								$socialval_url = get_sub_field('social_account_type');
								$html .='<li>';
									$html .='<a href="'.$socialval_url.'" target="_blank">';
									$html .='<span class="eael-tm-social-icon-wrap">
												<span class="eael-tm-social-icon fa fa-'.$socialval_icon.'"></span>
											</span>';
									$html .='</a>';
								$html .='</li>';
							}
						$html .='</ul>';
					$html .='</div>';
			$html .='</div>';
		}
		$html .='</div>';
	$html .='</div>';
	return $html;
}
add_shortcode('banner-boxesnew', 'wpb_bannerboxesnew');

function get_data() {
	global $wpdb;
	$array = array();
	$limit = 3;
	if(isset($_POST['search_data'])) {
		if(!empty($_POST['row'])){
			$start = $_POST['row'];
			$where = " AND post_title LIKE '%".$_POST['search_data']."%'";
		}else{
			$start = 0;
		    $where = " AND post_title LIKE '%".$_POST['search_data']."%'";
		}
		$query_count = "SELECT * FROM $wpdb->posts WHERE post_status = 'publish' AND post_type = 'newsletter'".$where;
		$videoquerycount= $wpdb->get_results($query_count);
		$videorowcount = count($videoquerycount);
		$array['row'] = $start + $limit;
		$array['numrows'] = $videorowcount;
	}
	else{
		$start = $_POST['row'];
		$where = " ";
		$query_count = "SELECT * FROM $wpdb->posts WHERE post_status = 'publish' AND post_type = 'newsletter'";
		$videoquerycount= $wpdb->get_results($query_count);
		$videorowcount = count($videoquerycount);
		if($videorowcount >0){
			$array['row'] = $_POST['row'] + $limit;
			$array['numrows'] = $videorowcount;
		}else{
			$array['row'] = 0;
			$array['numrows'] = $videorowcount;
		}
	}
	 $query = "SELECT * FROM $wpdb->posts WHERE post_status = 'publish' AND post_type = 'newsletter' ".$where."
		ORDER BY ID desc LIMIT ".$start.",".$limit;
		$videoquery= $wpdb->get_results($query);
		$videorowcount = count($videoquery);
		$html ="";
		if ($videorowcount > 0) {
			foreach($videoquery as $key=> $value){
			    
			    $post_date = date("d,M Y",strtotime($value->post_date));
			    $ID = $value->ID;
			    $featured_img_url = get_the_post_thumbnail_url($ID,'full'); 
				$html .='<div class="col-lg-4 video_inner wid_48">
				   <div class="video-wrap" id="video-wrap-id-'.$value->ID.'">
				    	<div class="video-right">
						   <img class="image-class" src="'.$featured_img_url.'" />
						</div>
						<div class="video_content">
						   <a href="'.get_permalink($ID) .'" ><h2 class="title-class">'.$value->post_title.'</h2></a>
						   <span class="date caf-col-md-6 caf-pl-0"><i class="fa fa-calendar" aria-hidden="true"></i>'.$post_date.'</span>
						</div>
					    
					</div>
			  </div>';
			}
		}
		
		$array['html'] =$html;
		echo json_encode($array);
	die();
   
   
}

add_action( 'wp_ajax_nopriv_get_data', 'get_data' );
add_action( 'wp_ajax_get_data', 'get_data' );

function wpb_solutionshmslider(){  
	global $post;    
    $args = array(  
            'post_type' => 'solutions',
            'post_status' => 'publish',
            'posts_per_page' => -1, 
            'orderby' => 'ID', 
            'order' => 'DESC',
        );
    $loop_query = get_posts($args);
	$counter=1;
	$html ='';
	$html .='<div class="team_slide_section">';
		$html .='<div class="bxslider2">';
		foreach($loop_query as $values){
			$featured_img_url = get_the_post_thumbnail_url($values->ID,'full');
            $service_box_icon = get_field( "service_box_icon", $values->ID );
            $html .='<div class="teamnew_box">
						<a href="'.get_permalink($values->ID) .'" ><img src="'.$service_box_icon.'">
						<h3 class="teamauthor">'.$values->post_title.'</h3></a>';
			$html .='</div>';
		}
		$html .='</div>';
	$html .='</div>';
	return $html;
}
add_shortcode('solutionshmslide', 'wpb_solutionshmslider');