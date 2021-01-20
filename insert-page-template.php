<?php
/**
 * Template Name: Pagina insertada
 */
global $post;
$content = trim(get_post_field('post_content', $post));

if (!empty($content)) :
    ?>
    <div class="inserted-page">
        <?php echo $content; ?>
        <?php echo do_shortcode(the_content())?>
    </div>
<?php endif; ?>