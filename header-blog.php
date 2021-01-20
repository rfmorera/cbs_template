<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package SKT Parallaxme
 */

/** @var WP_Post */
global $post;
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
                        <source srcset="/../wp-content/uploads/2016/07/logo-blog.png" media="(min-width: 1000px)">
                        <source srcset="/../wp-content/uploads/2016/07/logo-blog-responsive.png" media="(max-width: 768px)">
                        <!--[if IE 9]></video><![endif]--><img class="img-responsive"
                                                               srcset="../wp-content/uploads/2016/07/logo-blog.png">
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

            $homeText = $post->post_name === 'noticias' ? 'Inicio' : 'Home';
            $blogText = $post->post_name === 'noticias' ? 'Noticias' : 'News';
            $menu_list = '<li><a href="/">' . strtoupper($homeText) . '</a></li>';
            $menu_list .= '<li class="active"><a data-scroll href="#">' . strtoupper($blogText) . '</a></li>';

            echo skt_parallaxme_str_lreplace('</ul>', $menu_list . '</ul>', str_replace(array('<div class="menu">', '</div>'), '', $navMenu));
            ?>
        </div>
    </nav>
    <div id="content_part">

