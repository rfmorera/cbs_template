<?php
/*
Template Name: Blog
*/

get_header('blog'); ?>

    <div id="primary" class="content-area">
        <div id="content" class="site-content container">
            <?php while (have_posts()) : the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <header class="entry-header">
                        <h1 class="entry-title"><?php the_title(); ?></h1>
                    </header><!-- .entry-header -->

                    <div class="entry-content">
                        <?php
                        echo get_post()->post_name === 'news'
                            ? do_shortcode('[pt_view id="dd5db93a1d"]')
                            : do_shortcode('[pt_view id="50b6da8511"]')
                        ?>
                    </div><!-- .entry-content -->
                </article>

            <?php endwhile; // end of the loop. ?>
            <div class="clear"></div>
        </div>
    </div>

<?php get_footer('blog'); ?>