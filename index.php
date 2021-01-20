<?php get_header('blog'); ?>



<div id="primary" class="content-area">

    <div id="content" class="site-content container">

        <section class="site-main" id="sitefull">

            <?php while ( have_posts() ) : the_post(); ?>

                <?php get_template_part( 'content', 'page' ); ?>

                <?php

                //If comments are open or we have at least one comment, load up the comment template

                if ( comments_open() || '0' != get_comments_number() )

                    comments_template();

                ?>

            <?php endwhile; // end of the loop. ?>

        </section>

        <div class="clear"></div>

    </div>

</div>

<div class="floatin-social-icons">

<div class="apss-social-share apss-theme-4 clearfix">

<div class="apss-linkedin apss-single-icon">
<a rel="nofollow" title="Síguenos en Linkedin" target="_blank" href="www.linkedin.com">
<div class="apss-icon-block clearfix"><i class="fa fa-linkedin"></i>
<span class="apss-social-text">Share on LinkedIn</span>
<span class="apss-share">Share</span></div>
</a>
</div>

<div class="apss-twitter apss-single-icon">
<a rel="nofollow" title="Síguenos en Twitter" target="_blank" href="www.twitter.com">
<div class="apss-icon-block clearfix"><i class="fa fa-twitter"></i>
<span class="apss-social-text">Share on Twitter</span><span class="apss-share">Tweet</span></div>
</a>
</div>

<div class="apss-facebook apss-single-icon">
<a rel="nofollow" title="Síguenos en Facebook" target="_blank" href="www.facebook.com">
<div class="apss-icon-block clearfix"><i class="fa fa-facebook"></i>
<span class="apss-social-text">Share on Facebook</span>
<span class="apss-share">Share</span></div>
</a>
</div>

</div>
</div>



</div>


<?php get_footer(); ?>