<?php
	/*
		Template Name: Services Development
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
									<a href="/services/development/ecommerce-websites/"><i class="fa fa-shopping-cart fa-5x block text-center p20"></i></a>
						        </div>

						        <div class="col-md-9">
									<h4 class="inline-block pt10 pb10 nomargin text-blue"><a href="/services/development/ecommerce-websites/">Ecommerce Development</a></h4>
									<p class="mb10">We create beautifully designed ecommerce websites that convert based on best practices and the art of conversion rate optimization.</p>
									<a href="/services/development/ecommerce-websites/">Learn More &raquo;</a>
						        </div>

							</div>
					    </div><!--/6-->

					    <div class="col-md-6 col-sm-6 mt">
							<div class="row">

						        <div class="col-md-3">
									<a href="/wordpress-ventures"><i class="fa fa-wordpress fa-5x block text-center p20"></i></a>
						        </div>

						        <div class="col-md-9">
									<h4 class="inline-block pt10 pb10 nomargin text-blue"><a href="/wordpress-ventures">WordPress Plugins & Themes</a></h4>
									<p class="mb10">We build WordPress Plugins and Themes for the global market and can create everything from business websites to full-blown corporate intranets.</p>
									<a href="/services/development/wordpress/">Learn More &raquo;</a>
						        </div>

							</div>
					    </div><!--/6-->

					    <div class="col-md-6 col-sm-6 mt">
							<div class="row">

						        <div class="col-md-3">
									<a href="/services/development/responsive-website-development/"><i class="fa fa-arrows-alt fa-5x block text-center p20"></i></a>
						        </div>

						        <div class="col-md-9">
									<h4 class="inline-block pt10 pb10 nomargin text-blue"><a href="/services/development/responsive-website-development/">Responsive Design</a></h4>
									<p class="mb10">Mobile friendly technology is more important now than ever. We build apps and websites so they will display beautifully on any screen.</p>
									<a href="/services/development/responsive-website-development/">Learn More &raquo;</a>
						        </div>

							</div>
					    </div><!--/6-->

					    <div class="col-md-6 col-sm-6 mt">
							<div class="row">

						        <div class="col-md-3">
									<a href="/services/development/mobile-app-development/"><i class="fa fa-mobile block text-center p10" style="font-size:100px"></i></a>
						        </div>

						        <div class="col-md-9">
									<h4 class="inline-block pt10 pb10 nomargin text-blue"><a href="/services/development/mobile-app-development/">Mobile Development</a></h4>
									<p class="mb10">Need to create a mobile app? We can build your app for iOS, Android, or both.</p>
									<a href="/services/development/mobile-app-development/">Learn More &raquo;</a>
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