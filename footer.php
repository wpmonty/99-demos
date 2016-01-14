
	<?php /* require_once( get_stylesheet_directory() . '/z-section-cta-newsletter.php' ); */ ?>

	<?php /* require_once( get_stylesheet_directory() . '/z-section-cta-newsletter-2.php' ); */ ?>
	<?php /* require_once( get_stylesheet_directory() . '/z-section-footer-social.php' ); */ ?>


	<?php /* require_once( get_stylesheet_directory() . '/z-section-footer-contact.php' );  */?>

<!--
    <section id="footer-links" class="text-white bg-gray pt pb">
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                    <div class="row">
                        <div class="col-md-4">
                            <strong class="pt20 block">Support</strong>
                            <ul class="p20 pt10">
                                <?php if ( has_nav_menu( 'footer1' ) ) {
        							wp_nav_menu( array('theme_location' => 'footer1', 'container' => false, 'items_wrap' => '%3$s'));
        						} ?>
                            </ul>
                        </div>
                        <div class="col-sm-4">
                            <strong class="pt20 block">Services</strong>
                            <ul class="p20 pt10">
                                <?php if ( has_nav_menu( 'footer2' ) ) {
        							wp_nav_menu( array('theme_location' => 'footer2', 'container' => false, 'items_wrap' => '%3$s'));
        						} ?>
                            </ul>
                        </div>
                        <div class="col-sm-4">
                            <strong class="pt20 block">Links</strong>
                            <ul class="p20 pt10">
                                <?php if ( has_nav_menu( 'footer3' ) ) {
        							wp_nav_menu( array('theme_location' => 'footer3', 'container' => false, 'items_wrap' => '%3$s'));
        						} ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 p30 pt20 bg-black">
                    <strong class="pb10 block">Us</strong>
                    99 Robots is a full service agency with a WordPress product line.
                    <hr/>
                    <a href="/products">Products</a> | <a href="/services">Services</a> | <a href="/about">About Us</a> | <a href="/contact">Contact Us</a>
                </div>

            </div>
        </div>
    </section>
-->


    <section id="product-faq" class="pt pb bg-white">
        <div class="container">
            <div class="row">
                <div class="hidden-xs hidden-sm col-md-2 col-md-offset-2">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/money-back.png">
                </div>
                <div class="col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-0 text-center">
                    <h2 class="mt10 mb10">30 Day Money-Back Guarantee</h2>
                    <div class="">
                        <div>
                            <span>If the product does not work as advertised and we cannot fix it within 30 days of purchase, we will refund your purchase. Period.</span>
                            <?php if( of_get_option('of_product_link') <> '' ) { ?>
                                <br/>
                        		<a class="btn btn-orange mt20 w-100" title="99 Robots Products" href="<?php echo of_get_option('of_product_link'); ?>">Buy Now</a>
                        	<?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

	<footer id="footer" class="bg-black text-white pt30 pb30">
		<div class="container">
			<div class="col-md-8 col-sm-12">
				<p class="nm">
					<a href="https://99robots.com/products">Products</a> |
					<a href="https://99robots.com/support">Support</a> |
					<a href="https://99robots.com/docs">Documentation</a> |
					<a href="https://99robots.com/terms-conditions/">Terms & Conditions</a> |
					<a href="https://99robots.com/privacy-policy/">Privacy Policy</a>
				</p>
			</div>
			<div class="col-md-4 col-sm-12">
				<p class="nm copyright">&copy; 2015 99 Robots, LLC. All rights reserved.</p>
			</div>
		</div>
	</footer>


	<?php wp_footer(); ?>

</body>

</html>