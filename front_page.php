<?php
/**
 * Template Name:Front page
 */
get_header();
?>

<?php
/*    if( of_get_option('numsection', true) > 0 ) {
        $numSections = esc_attr( of_get_option('numsection', true) );
        for( $s=1; $s<=$numSections; $s++ ){
            $title 		= ( of_get_option('sectiontitle'.$s, true) != '' ) ? esc_html( of_get_option('sectiontitle'.$s, true) ) : '';
            $class		= ( of_get_option('sectionclass'.$s, true) != '' ) ? esc_html( of_get_option('sectionclass'.$s, true) ) : '';
            $content	= ( of_get_option('sectioncontent'.$s, true) != '' ) ? of_get_option('sectioncontent'.$s, true) : ''; */?><!--

            <section id="section<?php /*echo $s;*/?>" class="<?php /*echo ( ($s%2) == 0 ) ? 'cover' : '' */?>">
                <div class="container">
                    <div class="<?php /*echo $class; */?>">
                        <h1 class="heading"><?php /*echo $title; */?></h1>
                        <?php /*echo skt_parallaxme_the_content_format( $content ); */?>
                    </div>
                </div>
            </section>--><?php
/*        }
    }

*/
?>
<?php
if (of_get_option('pagessection', true) > 0) {
    $pages = of_get_option('pagessection', true);
    $pages = is_array($pages) ? $pages : array();
    $selectedPages = array();
    foreach ($pages as $id => $value) {
        if ($value == 1) {
            $selectedPages[] = $id;
        }
    }

    if (!class_exists('GP_Locales'))
        require_once (WP_PLUGIN_DIR . '/xili-language/xili-includes/locales.php'); // from JetPack copied
    $translations = xili_get_listlanguages();
    $languages = array();
    foreach ($translations as $t) {
        $languages[$t->slug] = GP_Locales::by_field('wp_locale', $t->name)->native_name;
    }

    $defaultlang = of_get_option('defaultlanguage');
    $lang = $defaultlang;
    if (isset($_GET['lang'])) {
        $lang = $_GET['lang'];
        $found = false;
        foreach ($translations as $t) {
            if ($t->slug == $lang) {
                $found = true;
                break;
            }
        }
        $lang = $found ? $lang : $defaultlang;
    }

    $pagesToShow = array();

    foreach ($selectedPages as $index => $id) {
        $post = get_post($id);
        if (isset($post)) {
            $postmeta = get_post_meta($post->ID);
            if (array_key_exists('lang-' . $lang, $postmeta)) {
                if (!empty($postmeta['lang-' . $lang])) {
                    $pagesToShow[] = $postmeta['lang-' . $lang];
                }
            }
        }
    }
    foreach ($pagesToShow as $index => $id) {
        $post = get_post($id[0]);
        if (isset($post)) {
            $contentdb = get_post_field('post_content', $post);
            $title = ($post->post_title != '') ? esc_html($post->post_title) : '';
            $content = ($contentdb != '') ? $contentdb : '';
            $languagesToShow = array();
            $class = $lang == $defaultlang ? 'selected' : '';
            $languagesToShow [] = '<li class="' . $class . '"><a href="' . esc_url(home_url('/')) . '?lang=' . $defaultlang . '">' . $languages[$defaultlang] . '</a></li>';
            foreach ($languages as $slug => $language) {
                if ($slug != $defaultlang) {
                    $class = $lang == $slug ? 'selected' : '';
                    $languagesToShow [] = '<li class="' . $class . '"><a href="' . esc_url(home_url('/')) . '?lang=' . $slug . '">' . $language . '</a></li>';
                }
            }
            ?>

            <section id="<?php echo $post->post_name; ?>" class="<?php echo (($index % 2) == 0) ? 'cover' : '' ?>">
                <!--<div class="container">
                    <div class="">-->
                <!--<h1 class="heading"><?php /*echo $title; */?></h1>-->
                <?php
                if ($index == 0) {
                    echo '<div class="available-languages"><ul>' . implode('', $languagesToShow) . '</ul></div>';
                }
                echo skt_parallaxme_the_content_format($content);

                ?>
                <!-- </div>
             </div>-->
            </section>

            <?php
        }
    }
}
?>

<?php get_footer(); ?>