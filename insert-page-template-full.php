<?php
/**
 * Template Name: Pagina insertada full
 */
the_post();
$content = trim(get_post_field('post_content', $post));
if (!empty($content)) :
    ?>
    <div class="inserted-page">
        <div class="tp-title alignleft"><h1><?php the_title()?></h1></div>
        <?php echo do_shortcode(the_content()); ?>
    </div>
<?php endif; ?>