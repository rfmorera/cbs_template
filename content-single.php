<?php
/**
 * @package SKT Parallaxme
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('single-post'); ?>>

    <header class="entry-header">
        <h6 class="entry-title"><?php the_title(); ?></h6>
    </header>
    <!-- .entry-header -->

    <div class="entry-content">
        <div class="postmeta">
            <div class="post-source">
                <?php
                $meta = get_post_meta(get_the_ID());
                $source = array_key_exists('lang-es_es', $meta) ? 'Source: ' : 'Fuente: ';
                echo $source . $meta['fuente'][0];
                ?>
            </div>
            <div class="post-date"><?php echo get_the_date(); ?></div>
            <!-- post-date -->
        </div>
        <!-- postmeta -->
        <?php
        if (has_post_thumbnail() ){
            $image = wp_get_attachment_image_src(get_post_thumbnail_id( $post_id ), 'post-thumbnail', false);
            $background_src = $image[0];
        } else {
            $background_src= "../wp-content/uploads/2016/07/no-image-post.png";
        }
        ?>
        <style>
            .post-thumb {
                min-height: 345px;
                background-image: url("<?php echo $background_src; ?>");
                background-color: rgba(0, 0, 0, 0);
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
            }
        </style>
        <div class="post-thumb"></div>
        <div class="post-content">
            <?php the_content(); ?>
        </div>
        <?php
        wp_link_pages(array(
            'before' => '<div class="page-links">' . __('Pages:', 'skt-parallaxme'),
            'after' => '</div>',
        ));
        ?>
    </div>
    <!-- .entry-content -->

    <footer class="entry-meta">
        <?php edit_post_link(__('Edit', 'skt-parallaxme'), '<span class="edit-link">', '</span>'); ?>
    </footer>
    <!-- .entry-meta -->

</article>