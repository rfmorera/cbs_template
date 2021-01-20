<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package SKT Parallaxme
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width">
    <title><?php wp_title('|', true, 'right'); ?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <link rel="icon" type="image/x-icon" href="<?php echo esc_url(of_get_option('favicon', false)); ?>"/>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?> data-spy="scroll">
<script>
    // Picture element HTML5 shiv
    document.createElement("picture");
</script>
<div id="wrap_all">
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!--<a class="navbar-brand" href="<?php /*echo esc_url(home_url('/')); */ ?>#home">
                <?php /*if (true == of_get_option('logo')) { */ ?>
                    <img src="<?php /*echo esc_url(of_get_option('logo', true)); */ ?>"/>
                <?php /*} else { */ ?>
                    <h1><?php /*bloginfo('name'); */ ?></h1>
                <?php /*} */ ?>
            </a>-->
            <a class="navbar-brand">
                <?php if (true == of_get_option('logo')) { ?>
                    <picture><!--[if IE 9]>
                        <video style="display: none;"><![endif]-->
                        <source srcset="/../wp-content/uploads/2016/07/Logo.png" media="(min-width: 1000px)">
                        <source srcset="/../wp-content/uploads/2016/07/log-responsive.png" media="(max-width: 768px)">
                        <!--[if IE 9]></video><![endif]--><img class="img-responsive"
                                                               srcset="../wp-content/uploads/2016/07/Logo.png">
                    </picture>
                <?php } else { ?>
                    <h1><?php bloginfo('name'); ?></h1>
                <?php } ?>
            </a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <?php
            if (of_get_option('globalmenu') == no) {
                $navMenu = '<ul class="nav navbar-nav navbar-right"></ul>';
            } else {
                $navMenu = wp_nav_menu(array('theme_location' => '', 'container' => '', 'container_class' => '', 'items_wrap' => '<ul class="nav navbar-nav navbar-right">%3$s</ul>', 'echo' => false));
            }

            if ('page' == get_option('show_on_front') && ('' != get_option('page_for_posts')) && $wp_query->get_queried_object_id() == get_option('page_for_posts')) : {
                $defaultlang = of_get_option('defaultlanguage', true);
                $lang = $defaultlang;
                if (isset($_GET['lang'])) {
                    $lang = $_GET['lang'];
                }

                $menu_list = '<li><a data-scroll href="/">' . strtoupper($lang === $defaultlang ? 'Inicio' : 'Home') . '</a></li>';
                $menu_list .= '<li><a data-scroll href="/">' . strtoupper($lang === $defaultlang ? 'Noticias' : 'News') . '</a></li>';

                echo skt_parallaxme_str_lreplace('</ul>', $menu_list . '</ul>', str_replace(array('<div class="menu">', '</div>'), '', $navMenu));
            } else :
                $defaultlang = of_get_option('defaultlanguage', true);
                $lang = $defaultlang;
                if (isset($_GET['lang'])) {
                    $lang = $_GET['lang'];
                    $translations = xili_get_listlanguages();
                    $found = false;
                    foreach ($translations as $t) {
                        if ($t->slug == $lang) {
                            $found = true;
                            break;
                        }
                    }
                    $lang = $found ? $lang : $defaultlang;
                }
                if (of_get_option('menusection', true) > 0) {
                    $pages = of_get_option('menusection', true);
                    $pages = is_array($pages) ? $pages : array();
                    $selectedPages = array();
                    foreach ($pages as $id => $value) {
                        if ($value == 1) {
                            $selectedPages[] = $id;
                        }
                    }
                    $menu_list = '';
                    $pagesToShow = array();
                    foreach ($selectedPages as $index => $id) {
                        $post = get_post($id);
                        $postmeta = get_post_meta($post->ID);
                        if (array_key_exists('lang-' . $lang, $postmeta)) {
                            if (!empty($postmeta['lang-' . $lang])) {
                                $pagesToShow[] = $postmeta['lang-' . $lang];
                            }
                        }
                    }
                    foreach ($pagesToShow as $index => $id) {
                        $post = get_post($id[0]);
                        if (isset($post)) {
                            $contentdb = get_post_field('post_content', $post);
                            $menutitle = ($post->post_title != '') ? esc_html($post->post_title) : '';
                            $menu_list .= ($menutitle != '') ? '<li><a data-scroll href="#' . $post->post_name . '">' . strtoupper($menutitle) . '</a></li>' : '';
                        }
                    }
                }
                /*if (of_get_option('numsection', true) > 0) {
                    $menu_list = '';
                    $numSections = esc_attr(of_get_option('numsection', true));
                    for ($s = 1; $s <= $numSections; $s++) {
                        $menutitle = (of_get_option('menutitle' . $s, true) != '') ? esc_html(of_get_option('menutitle' . $s, true)) : '';
                        $menu_list .= ($menutitle != '') ? '<li><a data-scroll href="' . esc_url(home_url('/')) . '#section' . $s . '">' . strtoupper($menutitle) . '</a></li>' : '';
                    }
                }*/
                echo skt_parallaxme_str_lreplace('</ul>', $menu_list . '</ul>', str_replace(array('<div class="menu">', '</div>'), '', $navMenu));
            endif;
            ?>
        </div>
    </nav>
    <?php if (((of_get_option('innerpageslider', true) != 'hide') || is_home() || is_front_page()) && (of_get_option('pageslider', true) != 'hide')) { ?>
        <section>
            <div class="feature">
                <div class="slider-text">
                    <div id="slidecaption"></div>
                </div>
                <div class="control-nav">
                    <a id="prevslide" class="load-item"><i class="font-icon-arrow-simple-left"></i></a>
                    <a id="nextslide" class="load-item"><i class="font-icon-arrow-simple-right"></i></a>
                    <ul id="slide-list"></ul>
                    <a id="nextsection" href="#work"><i class="font-icon-arrow-simple-down"></i></a>
                </div>
            </div>
        </section>
    <?php } ?>

    <div id="content_part">

