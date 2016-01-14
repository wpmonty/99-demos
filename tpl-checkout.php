<?php
	/*
		Template Name: Checkout
	*/
?>

<?php get_header(); ?>

<div id="blog-fullwidth">
	<section class="container pagewrap">
		<div class="row">
			<div class="col-sm-9 p50 bg-white">
    			<h1><?php the_title(); ?></h1>

				<?php get_template_part('loop','single'); ?>

			</div><!-- col-md-9 -->

			<div class="col-sm-3">

                <section id="product-faq" class="pb p20">
                    <div class="">
                        <div class="row">
                            <div class="col-xs-12">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/money-back.png">
                            </div>
                            <div class="col-xs-12">
                                <h3 class="mt10 mb10 text-center">30 Day Money-Back Guarantee</h3>
                                <div class="text-center">
                                    <div>
                                        <span>If the product does not work as advertised and we cannot fix it within 30 days of purchase, we will refund your purchase. Period.</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section id="product-faq" class="pb p20">
                    <div class="">
                        <div class="row">
                            <div class="col-xs-12">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/support-gaurantee.png">
                            </div>
                            <div class="col-xs-12">
                                <h3 class="mt10 mb10 text-center">24/7 Support</h3>
                                <div class="text-center">
                                    <div>
                                        <span>Our support team is here to make you happy. Whether you need help setting up the plugin or find an issue, we've got your back.</span>
                                        <br><br>
                                        <strong>Email Us Anytime: support@99robots.com</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

			</div>

		</div>
	</section><!-- container -->
</div>


<?php get_footer(); ?>