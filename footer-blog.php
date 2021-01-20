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
<div class="pre-footer patternify clearfix aboutUs">
    <?php if (get_post()->post_name === 'news') : ?>
        <div class="col-md-12">
            <div class="col-md-10">
                We are an inmigration consulting team.<br/>Canada Best Solutions C.B.S offers <span class="highlight">consulting services,
                sponsorship and legal representation</span> to anyone wishing<br/> to study, work, visit or live in Canada.
            </div>
            <div class="col-md-2"><a class="btn btn-danger" target="_blank" href="/?lang=en_us#contact-us">Contact us
                    now</a></div>
        </div>
    <?php else : ?>
        <div class="col-md-12">
            <div class="col-md-10">Somos un equipo de consultores de inmigración.<br/>Canada Best Solutions C.B.S ofrece
                <span class="highlight">servicios de consulta, asesoría y representación legal</span> a todo aquel que desee<br/> estudiar, trabajar,
                visitar o vivir en Canadá.
            </div>
            <div class="col-md-2"><a class="btn btn-danger" target="_blank" href="/#contactenos">Contáctanos ahora</a>
            </div>
        </div>
    <?php endif ?>
</div>
<footer class="footer cf">
    <div>
        <div class="col-md-6 col-sm-6 col-xs-3 footer-logo">
            <?php if (of_get_option('footerlogo', true) != '' || of_get_option('footerlogoresponsive', true) != '') { ?>
                <img class="hidden-xs" src="<?php echo esc_url(of_get_option('footerlogo', true)); ?>"/>
                <img class="visible-xs" src="<?php echo esc_url(of_get_option('footerlogoresponsive', true)); ?>"/>
            <?php } else { ?>
                <h2><?php bloginfo('name'); ?></h2>
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
            <p><?php
                if ((function_exists('of_get_option') && (of_get_option('footertext', true) != 1))) {
                    echo of_get_option('footertext', true);
                } ?></p>
        </div>
        <div class="clear"></div>
    </div>
    <!-- ./container -->
</footer><!-- ./footer -->
</div><!-- #content_part -->
</div><!-- #wrap_all -->

<?php wp_footer(); ?>
</body>
</html>