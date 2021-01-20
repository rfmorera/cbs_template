<?php

/**

 * The Template for displaying all single posts.

 *

 * @package SKT Parallaxme

 */



get_header('single'); ?>



    <div id="primary" class="content-area">

        <div class="site-content container">

            <section class="col-md-8 blog-post">

                <?php while (have_posts()) : the_post(); ?>

                    <?php get_template_part('content', 'single'); ?>

                    <?php /*skt_parallaxme_content_nav( 'nav-below' );*/ ?>

                    <?php

                    // If comments are open or we have at least one comment, load up the comment template

                    if (comments_open() || '0' != get_comments_number())

                        comments_template();

                    ?>

                <?php endwhile; // end of the loop. ?>

            </section>

            <section class="col-md-4 blog-sidebar">

                <?php

                $meta = get_post_meta(get_the_ID());

                $english = array_key_exists('lang-es_es', $meta);

                $lang = $english ? 'en' : 'es';

                $write = $english ? 'Send us an email' : 'Escríbenos a';

                $interest = $english ? 'Could be of interest' : 'También te puede interesar';

                ?>

                <header>

                    <h6><?php echo $interest; ?></h6>

                </header>

                <div class="related-posts">

                    <?php echo ($english ? do_shortcode('[pt_view id="c02d0450cd"]') : do_shortcode('[pt_view id="c0f168ce89"]'))?>

                </div>

                <div class="share-post">

                    <?php echo do_shortcode("[apss_share networks='facebook, twitter, google-plus, linkedin' counter='0' total_counter='0']") ?>

                </div>

                <div class="patternify contact-blog text-center">

                    <img src="/../wp-content/uploads/2016/07/future-text-<?php echo $lang; ?>-responsive.png"

                         class="img-responsive contact-blog-img">

                    <img src="/../wp-content/uploads/2014/11/home-resp.png" class="img-responsive contact-blog-img">



                    <p class="contact-blog-text">

                    <span class="contact-blog-write">

                        <?php echo $write; ?>:

                    </span>

                        info@canadabestsolutions.com

                    </p>

                </div>



            </section>

            <?php get_sidebar(); ?>
            
        </div>

    </div>



<?php get_footer('blog'); ?>