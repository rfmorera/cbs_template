<?php

/**

 * The template for displaying the footer.

 *

 * Contains the closing of the #content div and all content after

 *

 * @package SKT Parallaxme

 */

?>



<!-- +++ Footer +++ -->

<footer class="footer cf">

    <div>

        <div class="col-md-6 col-sm-6 col-xs-3 footer-logo">

            <?php if( of_get_option('footerlogo', true) != '' || of_get_option('footerlogoresponsive', true) != '' ) { ?>

                <img class="hidden-xs" src="<?php echo esc_url( of_get_option('footerlogo', true) ); ?>" />

                <img class="visible-xs" src="<?php echo esc_url( of_get_option('footerlogoresponsive', true) ); ?>" />

            <?php } else { ?>

                <h2><?php bloginfo( 'name' ); ?></h2>

            <?php } ?>

        </div>

       <!-- <div class="col-md-4 social-links">

			<?php /*

			$facebook 	= ( of_get_option('facebook', true) != '' ) ? esc_url( of_get_option('facebook', true) ) : '';

			$twitter 	= ( of_get_option('twitter', true) != '' ) ? esc_url( of_get_option('twitter', true) ) : '';

			$gplus		= ( of_get_option('google', true) != '' ) ? esc_url( of_get_option('google', true) ) : '';

			$linkedin	= ( of_get_option('linkedin', true) != '' ) ? esc_url( of_get_option('linkedin', true) ) : '';

			$youtube	= ( of_get_option('youtube', true) != '' ) ? esc_url( of_get_option('youtube', true) ) : '';

			echo ($facebook != '') ? '<a target="_blank" href="'.$facebook.'"><i class="fa fa-facebook fa-2x"></i></a>' : '';

			echo ($twitter != '') ? '<a target="_blank" href="'.$twitter.'"><i class="fa fa-twitter fa-2x"></i></a>' : '';

			echo ($gplus != '') ? '<a target="_blank" href="'.$gplus.'"><i class="fa fa-google-plus fa-2x"></i></a>' : '';

			echo ($linkedin != '') ? '<a target="_blank" href="'.$linkedin.'"><i class="fa fa-linkedin fa-2x"></i></a>' : '';

			echo ($youtube != '') ? '<a target="_blank" href="'.$youtube.'"><i class="fa fa-youtube fa-2x"></i></a>' : '';*/

			?>

        </div> -->

        <div class="col-md-6 col-sm-6 col-xs-9 text">

            <p>Copyright © <?php echo date('Y'); ?>. <?php

            if ( (function_exists( 'of_get_option' ) && (of_get_option('footertext', true) != 1) ) ) {

                echo of_get_option('footertext', true);

            } 
            ?></p>

        </div>

        <div class="clear"></div>

    </div><!-- ./container -->

</footer><!-- ./footer -->

<div class="floating-social-icons" >
    <div class="inicio-social" style="display:none;">

        <ul class="apss-social-share apss-theme-4 clearfix">

            <li class="apss-linkedin apss-single-icon">
            <a rel="nofollow" title="Linkedin" target="_blank" href="https://www.linkedin.com/in/marlys-rodriguez-perez-9ba44880/">
            <div class="apss-icon-block clearfix"><i class="fa fa-linkedin"></i>
            <span class="apss-social-text">Share on LinkedIn</span>
            <span class="apss-share">Share</span></div>
            </a>
            </li>

            <li class="apss-twitter apss-single-icon">
            <a rel="nofollow" title="Twitter" target="_blank" href="https://twitter.com/marlysmarliesrp">
            <div class="apss-icon-block clearfix"><i class="fa fa-twitter"></i>
            <span class="apss-social-text">Share on Twitter</span><span class="apss-share">Tweet</span></div>
            </a>
            </li>

            <li class="apss-facebook apss-single-icon">
            <a rel="nofollow" title="Facebook" target="_blank" href="https://www.facebook.com/Marlys-Rodriguez-Certified-Immigration-Consultant-Toronto-Cuban-Lawyer-436406779843314/">
            <div class="apss-icon-block clearfix"><i class="fa fa-facebook"></i>
            <span class="apss-social-text">Share on Facebook</span>
            <span class="apss-share">Share</span></div>
            </a>
            </li>

        </div>
    </div>
</div><!-- ./floating-social-icons-->

</div><!-- #content_part -->

</div><!-- #wrap_all -->

<?php wp_footer(); ?>

</body>

</html>