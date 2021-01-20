<?php
/**
 * Template Name: Pagina insertada full
 */
the_post();
$content = trim(get_post_field('post_content', $post));
if (!empty($content)) :
    ?>
    <div class="inserted-page">
        <div class="tp-title alignleft"><h1><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></h1></div>
        <?php if (has_post_thumbnail()) : ?>
            <div style="position: relative; left: 0px; top: 0px;" class="tp-vl-row">
                <div id="tp-vl-col-d9djvlay" class="tp-vl-col full">
                    <div class="tp-vl-imageblock">
                        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('full'); ?></a>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <?php the_excerpt() ?>
    </div>
<?php endif; ?>