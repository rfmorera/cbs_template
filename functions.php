<?php

/**

 * SKT Parallaxme functions and definitions

 *

 * @package SKT Parallaxme

 */



/**

 * Set the content width based on the theme's design and stylesheet.

 */





if (!function_exists('skt_parallaxme_setup')) :

    /**

     * Sets up theme defaults and registers support for various WordPress features.

     *

     * Note that this function is hooked into the after_setup_theme hook, which runs

     * before the init hook. The init hook is too late for some features, such as indicating

     * support post thumbnails.

     */

    function skt_parallaxme_setup()

    {



        if (!isset($content_width))

            $content_width = 640; /* pixels */



        load_theme_textdomain('skt-parallaxme', get_template_directory() . '/languages');

        add_theme_support('automatic-feed-links');

        add_theme_support('woocommerce');

        add_theme_support('post-thumbnails');

        add_image_size('homepage-thumb', 240, 145, true);

        register_nav_menus(array(

            'primary' => __('Primary Menu', 'skt-parallaxme'),

        ));



        add_theme_support('custom-background', array(

            'default-color' => 'E6E1C4',

            'default-image' => '',

        ));

        add_editor_style('editor-style.css');

    }

endif; // skt_parallaxme_setup

add_action('after_setup_theme', 'skt_parallaxme_setup');





function skt_parallaxme_widgets_init()

{

    register_sidebar(array(

        'name' => __('Blog Sidebar', 'skt-parallaxme'),

        'description' => __('Appears on blog page sidebar', 'skt-parallaxme'),

        'id' => 'sidebar-1',

        'before_widget' => '<aside id="%1$s" class="widget %2$s">',

        'after_widget' => '</aside>',

        'before_title' => '<h3 class="widget-title">',

        'after_title' => '</h3>',

    ));



}



add_action('widgets_init', 'skt_parallaxme_widgets_init');



if (!function_exists('optionsframework_init')) {

    define('OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/inc/');

    require_once dirname(__FILE__) . '/inc/options-framework.php';

}





function skt_parallaxme_scripts()

{

    //wp_enqueue_style( 'skt_parallaxme-gfonts', '//fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700|PT+Sans:400,400italic,700,700italic' );
    //wp_enqueue_style('skt_parallaxme-layout-style', get_template_directory_uri() . "/css/layout.css");

    wp_enqueue_style('skt_parallaxme-basic-style', get_stylesheet_uri());

    wp_enqueue_style('skt_parallaxme-editor-style', get_template_directory_uri() . "/editor-style.css");

    wp_enqueue_style('skt_parallaxme-normalize-style', get_template_directory_uri() . "/css/normalize.css");

    wp_enqueue_style('skt_parallaxme-boilerplate-style', get_template_directory_uri() . "/css/boilerplate.css");

    wp_enqueue_style('skt_parallaxme-prettyphoto-style', get_template_directory_uri() . "/css/prettyphoto.css");

    wp_enqueue_style('skt_parallaxme-jquery_bxslider-style', get_template_directory_uri() . "/css/jquery.bxslider.css");

    wp_enqueue_style('skt_parallaxme-layout-style', get_template_directory_uri() . "/css/layout.css");

    wp_enqueue_style('skt_parallaxme-base-style', get_template_directory_uri() . "/css/style_base.css");



    //supersized script and styles enque

    if (((of_get_option('innerpageslider', true) != 'hide') || is_home() || is_front_page()) && (of_get_option('pageslider', true) != 'hide')) {

        wp_enqueue_style('skt_parallaxme-supersized-default-theme', get_template_directory_uri() . "/css/supersized.css");

        wp_enqueue_style('skt_parallaxme-supersized-style', get_template_directory_uri() . "/css/supersized.shutter.css");



        wp_enqueue_script('skt_parallaxme-supersized-easing', get_template_directory_uri() . '/js/jquery.easing.min.js', array('jquery'), false, true);

        wp_enqueue_script('skt_parallaxme-supersized-slider', get_template_directory_uri() . '/js/supersized.3.2.7.min.js', array('jquery'), false, true);

        wp_enqueue_script('skt_parallaxme-supersized-shutter', get_template_directory_uri() . '/js/supersized.shutter.js', array('jquery'), false, true);

    }



    wp_enqueue_script('skt_parallaxme-jquery_validate', get_template_directory_uri() . '/js/jquery.validate.js', array('jquery'), false, true);

    wp_enqueue_script('skt_parallaxme-jquery_bxslider', get_template_directory_uri() . '/js/jquery.bxslider.js', array('jquery'), false, true);

    wp_enqueue_script('skt_parallaxme-scrollreveal', get_template_directory_uri() . '/js/scrollReveal.min.js', array(), false, true);

    wp_enqueue_script('skt_parallaxme-smooth_scroll', get_template_directory_uri() . '/js/smooth-scroll.min.js', array('jquery'), false, true);

    wp_enqueue_script('skt_parallaxme-filter_gallery', get_template_directory_uri() . '/js/filter-gallery.js', array(), false, true);

    wp_enqueue_script('skt_parallaxme-prettyphoto', get_template_directory_uri() . '/js/jquery.prettyPhoto.js', array('jquery'), true);

    wp_enqueue_script('skt_parallaxme-picturefill', get_template_directory_uri() . '/js/picturefill.min.js', array(), true);

    wp_enqueue_script('skt_parallaxme-custom_js', get_template_directory_uri() . '/js/custom.js', array(), false, true);



    if (is_singular() && comments_open() && get_option('thread_comments')) {

        wp_enqueue_script('comment-reply');

    }

}



add_action('wp_enqueue_scripts', 'skt_parallaxme_scripts');





function skt_parallaxme_custom_head_codes()

{

    if ((function_exists('of_get_option')) && (of_get_option('style2', true) != 1)) {

        echo "<style>" . esc_html(of_get_option('style2', true)) . "</style>";

    }



    if (is_user_logged_in()) {

        echo "<style>.navbar.navbar-default.navbar-fixed-top{margin-top:32px}

        @media screen and ( max-width: 782px ) {

            .navbar.navbar-default.navbar-fixed-top { margin-top: 46px !important; }

        }</style>";

    }



    if (((of_get_option('innerpageslider', true) != 'hide') || is_home() || is_front_page()) && (of_get_option('pageslider', true) != 'hide')) {



        $slAr = array();

        for ($i = 1; $i < 6; $i++) {

            if (of_get_option('slide' . $i, true) != "") {

                $imgUrl = of_get_option('slide' . $i, true);

                $imgTitle = of_get_option('slidetitle' . $i, true);

                if (strlen($imgUrl) > 3) $slAr[$imgTitle] = of_get_option('slide' . $i, true);

            }

        }

        ?>

        <script type="text/javascript">

            jQuery(document).ready(function () {

                jQuery.supersized({

                    // Functionality

                    slideshow: 1,			// Slideshow on/off

                    autoplay: 1,			// Determines whether slideshow begins playing when page is loaded.

                    start_slide: 1,			// Start slide (0 is random)

                    stop_loop: 0,			// Pauses slideshow on last slide

                    random: 0,			// Randomize slide order (Ignores start slide)

                    slide_interval: 5000,		// Length between transitions

                    transition: 1, 			// 0-None, 1-Fade, 2-Slide Top, 3-Slide Right, 4-Slide Bottom, 5-Slide Left, 6-Carousel Right, 7-Carousel Left

                    transition_speed: 1000,		// Speed of transition

                    new_window: 1,			// Image links open in new window/tab

                    pause_hover: 0,			// Pause slideshow on hover

                    keyboard_nav: 1,			// Keyboard navigation on/off

                    performance: 1,			// 0-Normal, 1-Hybrid speed/quality, 2-Optimizes image quality, 3-Optimizes transition speed // (Only works for Firefox/IE, not Webkit)

                    image_protect: 0,			// Disables image dragging and right click with Javascript



                    // Size & Position

                    min_width: 0,			// Min width allowed (in pixels)

                    min_height: 0,			// Min height allowed (in pixels)

                    vertical_center: 1,			// Vertically center background

                    horizontal_center: 1,			// Horizontally center background

                    fit_always: 0,			// Image will never exceed browser width or height (Ignores min. dimensions)

                    fit_portrait: 1,			// Portrait images will not exceed browser height

                    fit_landscape: 0,			// Landscape images will not exceed browser width



                    // Components

                    slide_links: 'blank',	// Individual links for each slide (Options: false, 'num', 'name', 'blank')

                    thumb_links: 1,			// Individual thumb links for each slide

                    thumbnail_navigation: 0,			// Thumbnail navigation

                    slides: [			// Slideshow Images

                        <?php

                        $n = 0;

                        foreach( $slAr as $sk => $sv ){

                            $n++;

                            echo "{image : '".$sv."', title : '<h1>".$sk."</h1>', thumb : '".$sv."', url : ''}".( (count($slAr) == $n) ? '' : ',' )."\n";

                        }

                        ?>

                    ],

                    // Theme Options

                    progress_bar: 1,			// Timer for each slide

                    mouse_scrub: 0

                });

            });



        </script><?php

    }



}



add_action('wp_head', 'skt_parallaxme_custom_head_codes');





function skt_parallaxme_pagination()

{

    global $wp_query;

    $big = 12345678;

    $page_format = paginate_links(array(

        'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),

        'format' => '?paged=%#%',

        'current' => max(1, get_query_var('paged')),

        'total' => $wp_query->max_num_pages,

        'type' => 'array'

    ));

    if (is_array($page_format)) {

        $paged = (get_query_var('paged') == 0) ? 1 : get_query_var('paged');

        echo '<div class="pagination"><div><ul>';

        echo '<li><span>' . $paged . ' of ' . $wp_query->max_num_pages . '</span></li>';

        foreach ($page_format as $page) {

            echo "<li>$page</li>";

        }

        echo '</ul></div></div>';

    }

}



/**

 * Implement the Custom Header feature.

 */

require get_template_directory() . '/inc/custom-header.php';



/**

 * Custom template tags for this theme.

 */

require get_template_directory() . '/inc/template-tags.php';



/**

 * Custom functions that act independently of the theme templates.

 */

require get_template_directory() . '/inc/extras.php';



/**

 * Customizer additions.

 */

require get_template_directory() . '/inc/customizer.php';



/**

 * Load Jetpack compatibility file.

 */

require get_template_directory() . '/inc/jetpack.php';





/**

 * Load custom functions file.

 */

require get_template_directory() . '/inc/custom-functions.php';





// get slug by id

function skt_parallaxme_get_slug_by_id($id)

{

    $post_data = get_post($id, ARRAY_A);

    $slug = $post_data['post_name'];

    return $slug;

}



// Add custom script in admin footer

function skt_parallaxme_custom_admin_footer_js()

{

    echo '<script>

		var nums = jQuery("#numsection").val();

		jQuery(".toggle_title h3").addClass("toggleTitle");

		jQuery(".toggle_title").each( function( index ){

			jQuery( "#section-sectiontitle"+(index+1)+", #section-sectioncontent"+(index+1)+", #section-menutitle"+(index+1)+", #section-sectionbgcolor"+(index+1)+", #section-sectionbgimage"+(index+1)+", #section-sectionclass"+(index+1) ).wrapAll( "<div class=\'toggle_wrapper\' />");

		});

		jQuery(".toggle_title h3").click( function(){

			jQuery(this).parent().next().slideToggle();

		});

	</script>"';

}



add_action('admin_footer', 'skt_parallaxme_custom_admin_footer_js');





function skt_parallaxme_len_title($title, $sep)

{

    global $paged, $page;



    if (is_feed())

        return $title;



    // Add the site name.

    $title .= get_bloginfo('name');



    // Add the site description for the home/front page.

    $site_description = get_bloginfo('description', 'display');

    if ($site_description && (is_home() || is_front_page()))

        $title = "$title $sep $site_description";



    // Add a page number if necessary.

    if ($paged >= 2 || $page >= 2)

        $title = "$title $sep " . sprintf(__('Page %s', 'skt_parallaxme'), max($paged, $page));



    return $title;

}



add_filter('wp_title', 'skt_parallaxme_len_title', 10, 2);



function pt_cv_field_readmore()

{

    return '';

}



add_filter(PT_CV_PREFIX_ . 'field_content_readmore_enable', 10);



function field_fuente($fuente)

{

    global $post;

    $meta = get_post_meta($post->ID);

    if ($fuente && $fuente !== '') {

        return '<span class="pc-vfuente">' . (array_key_exists('lang-es_es', $meta) ? 'Source: ' : 'Fuente: ') . $fuente . '</span><br/>';

    }



    return '';

}



add_filter(PT_CV_PREFIX_ . 'field_fuente', 'field_fuente', 10, 1);



function pagination_first($label)

{

    return '<i class="fa fa-caret-left"></i>';

}



add_filter(PT_CV_PREFIX_ . 'pagination_first', 'pagination_first', 10, 1);



function pagination_prev($label)

{

    return '<i class="fa fa-caret-left"></i>';

}



add_filter(PT_CV_PREFIX_ . 'pagination_prev', 'pagination_prev', 10, 1);



function pagination_next($label)

{

    return '<i class="fa fa-caret-right"></i>';

}



add_filter(PT_CV_PREFIX_ . 'pagination_next', 'pagination_next', 10, 1);



function pagination_last($label)

{

    return '<i class="fa fa-caret-right"></i>';

}



add_filter(PT_CV_PREFIX_ . 'pagination_last', 'pagination_last', 10, 1);



function goto_first($label)

{

    global $post;

    return ($post->ID == 839 ? 'Ir a la primera página' : 'Go to first page');

}



add_filter(PT_CV_PREFIX_ . 'goto_first', 'goto_first', 10, 1);



function goto_prev($label)

{

    global $post;

    return ($post->ID == 839 ? 'Ir a la página anterior' : 'Go to previous page');

}



add_filter(PT_CV_PREFIX_ . 'goto_prev', 'goto_prev', 10, 1);



function goto_next($label)

{

    global $post;

    return ($post->ID == 839 ? 'Ir a la página siguiente' : 'Go to next page');

}



add_filter(PT_CV_PREFIX_ . 'goto_next', 'goto_next', 10, 1);



function goto_last($label)

{

    global $post;

    return ($post->ID == 839 ? 'Ir a la última página' : 'Go to last page');

}



add_filter(PT_CV_PREFIX_ . 'goto_last', 'goto_last', 10, 1);



function current_page($label)

{

    global $post;

    return ($post->ID == 839 ? 'La página actual es' : 'Current page is');

}



add_filter(PT_CV_PREFIX_ . 'current_page', 'current_page', 10, 1);



function goto_page($label)

{

    global $post;

    return ($post->ID == 839 ? 'Ir a la página' : 'Go to page');

}



add_filter(PT_CV_PREFIX_ . 'goto_page', 'goto_page', 10, 1);



function field_thumbnail_not_found($html, $post, $dimensions, $gargs)

{

    return '<img width="250" height="188" alt="No image" class="' . $gargs['class'] . ' wp-post-image" src="../wp-content/uploads/2016/07/no-image-small.png">';

}



add_filter(PT_CV_PREFIX_ . 'field_thumbnail_not_found', 'field_thumbnail_not_found', 10, 4);



