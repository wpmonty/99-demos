<?php
	/*
		Template Name: Services Inner Page
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

					<a class="btn btn-green btn-space mt30">Contact Us</a>

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

	<section id="services-points">
		<div class="container">
			<div class="row">

				<div class="col-md-12 mb mt">
					<div class="row">

						<div class="col-md-6 col-sm-6 mt">
							<div class="row">

						        <div class="col-md-3">
									<i class="fa fa-list-alt fa-5x block text-center p20"></i>
						        </div>

						        <div class="col-md-9">
									<h4 class="inline-block pt10 pb10 nomargin text-green">Paid Advertising</h4>
									<p class="mb10">We create beautifully designed ecommerce websites that convert based on best practices and the art of conversion rate optimization.</p>
									<a class="text-green" href="/contact">Learn More &raquo;</a>
						        </div>

							</div>
					    </div><!--/6-->

					    <div class="col-md-6 col-sm-6 mt">
							<div class="row">

						        <div class="col-md-3">
									<i class="fa fa-search fa-5x block text-center p20"></i>
						        </div>

						        <div class="col-md-9">
									<h4 class="inline-block pt10 pb10 nomargin text-green">Search Engine Optimization</h4>
									<p class="mb10">We build WordPress Plugins and Themes for the global market and can create everything from business websites to full-blown corporate intranets.</p>
									<a class="text-green" href="/wordpress-ventures">Learn More &raquo;</a>
						        </div>

							</div>
					    </div><!--/6-->

					    <div class="clearfix"></div>

					    <div class="col-md-6 col-sm-6 mt">
							<div class="row">

						        <div class="col-md-3">
									<i class="fa fa-line-chart fa-5x block text-center p20"></i>
						        </div>

						        <div class="col-md-9">
									<h4 class="inline-block pt10 pb10 nomargin text-green">Conversion Rate Optimization</h4>
									<p class="mb10">Mobile friendly technology is more important now than ever. We build apps and websites so they will display beautifully on any screen.</p>
									<a class="text-green" href="/contact">Learn More &raquo;</a>
						        </div>

							</div>
					    </div><!--/6-->

					    <div class="col-md-6 col-sm-6 mt">
							<div class="row">

						        <div class="col-md-3">
									<i class="fa fa-file-text-o fa-5x block text-center p20"></i>
						        </div>

						        <div class="col-md-9">
									<h4 class="inline-block pt10 pb10 nomargin text-green">Content Marketing</h4>
									<p class="mb10">Need to create a mobile app? We can build your app for iOS, Android, or both.</p>
									<a class="text-green" href="/contact">Learn More &raquo;</a>
						        </div>

							</div>
					    </div><!--/6-->

					    <div class="clearfix"></div>

					    <div class="col-md-6 col-sm-6 mt">
							<div class="row">

						        <div class="col-md-3">
									<i class="fa fa-envelope-o fa-5x block text-center p20"></i>
						        </div>

						        <div class="col-md-9">
									<h4 class="inline-block pt10 pb10 nomargin text-green">Email Campaigns</h4>
									<p class="mb10">Mobile friendly technology is more important now than ever. We build apps and websites so they will display beautifully on any screen.</p>
									<a class="text-green" href="/contact">Learn More &raquo;</a>
						        </div>

							</div>
					    </div><!--/6-->

					    <div class="col-md-6 col-sm-6 mt">
							<div class="row">

						        <div class="col-md-3">
									<i class="fa fa-share-alt fa-5x block text-center p20"></i>
						        </div>

						        <div class="col-md-9">
									<h4 class="inline-block pt10 pb10 nomargin text-green">Social Media Marketing</h4>
									<p class="mb10">Need to create a mobile app? We can build your app for iOS, Android, or both.</p>
									<a class="text-green" href="/contact">Learn More &raquo;</a>
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

<?php get_footer('service'); ?>