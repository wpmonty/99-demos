<?php
	/*
		Template Name: Services Marketing
	*/
?>

<?php get_header(); ?>

	<?php require_once( get_stylesheet_directory() . '/z-section-services-menu.php' ); ?>

	<div id="services-development" class="bg-white pt pb">
		<section class="container">
			<div class="row">

				<div class="col-md-6">

					<h1><?php the_title(); ?></h1>

					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

						<article <?php post_class('text-dkgray'); ?>>
							<?php the_content(); ?>
						</article>

					<?php endwhile; else : endif; ?>

					<div class="clearfix"></div>

					<a class="btn btn-green btn-space mt30" href="/contact">Contact Us</a>

				</div><!-- col-md-6 -->

				<div class="col-md-6">
					<?php
						gabfire_media(array(
							'name' => 'large',
							'imgtag' => 1,
							'link' => 0,
							'enable_thumb' => 1,
							'enable_video' => 0,
							'resize_type' => 'c',
							'media_width' => 600,
							'media_height' => 400,
							'thumb_align' => 'top',
							'enable_default' => 0
						));
						?>
				</div>

			</div>
		</section><!-- container -->
	</div>

	<section id="services-points" class="pb">
		<div class="container">
			<div class="row">

				<div class="col-md-12 mb mt">
					<div class="row">

						<div class="col-md-6 col-sm-6 mt">
							<div class="row">

						        <div class="col-md-3">
									<a class="text-green" href="/services/digital-marketing/pay-per-click/"><i class="fa fa-list-alt fa-5x block text-center p20"></i></a>
						        </div>

						        <div class="col-md-9">
									<h4 class="inline-block pt10 pb10 nomargin text-green"><a class="text-green" href="/services/digital-marketing/pay-per-click/">Pay-Per-Click</a></h4>
									<p class="mb10">Create effective campaigns that reach the exact customers you want. We optimize your ads for a positive impact on revenue.</p>
									<a class="text-green" href="/services/digital-marketing/pay-per-click/">Learn More &raquo;</a>
						        </div>

							</div>
					    </div><!--/6-->

					    <div class="col-md-6 col-sm-6 mt">
							<div class="row">

						        <div class="col-md-3">
									<a class="text-green" href="/services/digital-marketing/search-engine-optimization/"><i class="fa fa-search fa-5x block text-center p20"></i></a>
						        </div>

						        <div class="col-md-9">
									<h4 class="inline-block pt10 pb10 nomargin text-green"><a class="text-green" href="/services/digital-marketing/search-engine-optimization/">Search Engine Optimization</a></h4>
									<p class="mb10">Capture customer intent and become a leading destination on search results. </p>
									<a class="text-green" href="/services/digital-marketing/search-engine-optimization/">Learn More &raquo;</a>
						        </div>

							</div>
					    </div><!--/6-->

					    <div class="clearfix"></div>

<!--
					    <div class="col-md-6 col-sm-6 mt">
							<div class="row">

						        <div class="col-md-3">
									<a class="text-green" href="/services/digital-marketing/conversion-rate-optimization/"><i class="fa fa-line-chart fa-5x block text-center p20"></i></a>
						        </div>

						        <div class="col-md-9">
									<h4 class="inline-block pt10 pb10 nomargin text-green"><a class="text-green" href="/services/digital-marketing/conversion-rate-optimization/">Conversion Rate Optimization</a></h4>
									<p class="mb10">Turn your website into your number one sales team. Higher website conversions will yield higher business performance.</p>
									<a class="text-green" href="/services/digital-marketing/conversion-rate-optimization/">Learn More &raquo;</a>
						        </div>

							</div>
					    </div>
--><!--/6-->

<!--
					    <div class="col-md-6 col-sm-6 mt">
							<div class="row">

						        <div class="col-md-3">
									<a class="text-green" href="/services/digital-marketing/content-marketing"><i class="fa fa-file-text-o fa-5x block text-center p20"></i></a>
						        </div>

						        <div class="col-md-9">
									<h4 class="inline-block pt10 pb10 nomargin text-green"><a class="text-green" href="/services/digital-marketing/content-marketing">Content Marketing</a></h4>
									<p class="mb10">Stand out as a thought leader and establish your brand.</p>
									<a class="text-green" href="/services/digital-marketing/content-marketing">Learn More &raquo;</a>
						        </div>

							</div>
					    </div>
--><!--/6-->

<!--
					    <div class="clearfix"></div>

					    <div class="col-md-6 col-sm-6 mt">
							<div class="row">

						        <div class="col-md-3">
									<a class="text-green" href="/services/digital-marketing/email-marketing"><i class="fa fa-envelope-o fa-5x block text-center p20"></i></a>
						        </div>

						        <div class="col-md-9">
									<h4 class="inline-block pt10 pb10 nomargin text-green"><a class="text-green" href="/services/digital-marketing/email-marketing">Email Marketing</a></h4>
									<p class="mb10">Generate more revenue from targeted customer segments with your email list. Increase open rates and response rates.</p>
									<a class="text-green" href="/services/digital-marketing/email-marketing">Learn More &raquo;</a>
						        </div>

							</div>
					    </div>
--><!--/6-->

					    <div class="col-md-6 col-sm-6 mt">
							<div class="row">

						        <div class="col-md-3">
									<a class="text-green" href="/services/digital-marketing/social-media-marketing/"><i class="fa fa-share-alt fa-5x block text-center p20"></i></a>
						        </div>

						        <div class="col-md-9">
									<h4 class="inline-block pt10 pb10 nomargin text-green"><a class="text-green" href="/services/digital-marketing/social-media-marketing/">Social Media Marketing</a></h4>
									<p class="mb10">Speak directly with your customers and establish a presence that will increase your bottom line.</p>
									<a class="text-green" href="/services/digital-marketing/social-media-marketing/">Learn More &raquo;</a>
						        </div>

							</div>
					    </div><!--/6-->

					</div>

				</div>

			</div>
		</div>
	</section>

	<?php /* require_once( get_stylesheet_directory() . '/z-section-services-points.php' ); */ ?>

	<?php /* require_once( get_stylesheet_directory() . '/z-section-portfolio-grid.php' ); */ ?>

	<?php /* require_once( get_stylesheet_directory() . '/z-section-services-benefits.php' ); */ ?>

<?php get_footer(); ?>