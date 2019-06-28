<!-- FOOTER -->
<footer>
<div class="container">
<div class="row">
<div class="col-md-8 widget-footer col-sm-8">
    <div class="row">
    <div class="col-md-4 widget-footer col-sm-4">
    <?php if(get_option('reedwan_logofooter')) { $logo = get_option('reedwan_logofooter');} else { $logo = get_template_directory_uri() . '/images/logo-tunjung-batik.png';} ?>
    <a href='<?php echo home_url(); ?>' class="logo-footer"><img  class="img-responsive clearfix" src="<?php echo $logo; ?>" alt="<?php bloginfo('name'); ?>" /></a>
    <div class="clearfix"></div>
    <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Address')): endif; ?>
    <div class="clearfix"></div></div>
    <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer')): endif; ?>
    </div>
</div>

<div class="col-md-4 col-sm-4 widget-footer">
<h5>Newsletter</h5>
<p>Sign up for our newsletter and promotions</p>
<form class="newsletter">
<input type="text" placeholder="Enter your email address here.">
<button type="submit">Subscribe !</button>
</form>
<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Icons')): endif; ?>
<div class="clearfix"></div>
<div class="copyright"><p>Copyright &copy; 2019 <?php bloginfo('name'); ?></p></div>
</div>
</div>
</div>
</footer>
		<?php wp_footer(); ?>
        <div id="backtotop"><i class="fa fa-chevron-up"></i></div>
        
        <script src="<?php bloginfo("template_url"); ?>/js/menu-js.js"></script>
        <script src="<?php bloginfo("template_url"); ?>/js/toggle-menu.js"></script>
        <!-- Javascript -->
        <script src="<?php bloginfo("template_url"); ?>/js/bs_leftnavi.js"></script>
         <script src="<?php bloginfo("template_url"); ?>/js/bootstrap.min.js"></script>
        <script src="<?php bloginfo("template_url"); ?>/plugin/owl-carousel/owl.carousel.min.js"></script>
        <script src="<?php bloginfo("template_url"); ?>/js/bs-navbar.js"></script>
        <script src="<?php bloginfo("template_url"); ?>/js/vendors/isotope/isotope.pkgd.js"></script>
        <script src="<?php bloginfo("template_url"); ?>/js/vendors/slick/slick.min.js"></script>
        <script src="<?php bloginfo("template_url"); ?>/js/vendors/tweets/tweecool.min.js"></script>
        <script src="<?php bloginfo("template_url"); ?>/js/vendors/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
        <script src="<?php bloginfo("template_url"); ?>/js/vendors/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
        <script src="<?php bloginfo("template_url"); ?>/js/jquery.sticky.js"></script>
        <script src="<?php bloginfo("template_url"); ?>/js/jquery.subscribe-better.js"></script>
        <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
        <script src="<?php bloginfo("template_url"); ?>/js/vendors/select/jquery.selectBoxIt.min.js"></script>
        <script src="<?php bloginfo("template_url"); ?>/js/main.js"></script>
    </body>
</html>