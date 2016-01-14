<?php
	/*
		Template Name: Services WordPress
	*/
?>

<?php get_header(); ?>

	<?php require_once( get_stylesheet_directory() . '/z-section-services-menu.php' ); ?>

	<div id="services-wordpress" class="bg-white pt pb">
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
									<a class="text-green" href="/services/development/wordpress/plugins"><i class="fa fa-wordpress fa-5x block text-center p20"></i></a>
						        </div>

						        <div class="col-md-9">
									<h4 class="inline-block pt10 pb10 nomargin text-blue"><a class="text-green" href="/services/development/wordpress/plugins">Plugin Development</a></h4>
									<p class="mb10">Extend your site's functionality with hand crafted plugins made by people who build plugins every day.</p>
									<a class="text-green" href="/services/development/wordpress/plugins">Learn More &raquo;</a>
						        </div>

							</div>
					    </div><!--/6-->

					    <div class="col-md-6 col-sm-6 mt">
							<div class="row">

						        <div class="col-md-3">
									<a class="text-green" href="/services/development/responsive-website-development"><i class="fa fa-desktop fa-5x block text-center p20"></i></a>
						        </div>

						        <div class="col-md-9">
									<h4 class="inline-block pt10 pb10 nomargin text-blue"><a class="text-green" href="/services/development/responsive-website-development">Theme Development</a></h4>
									<p class="mb10">We've built themes for global markets and high-profile websites. We shape every detail to bring your brand to life.</p>
									<a class="text-green" href="/services/development/responsive-website-development">Learn More &raquo;</a>
						        </div>

							</div>
					    </div><!--/6-->

					    <div class="clearfix"></div>

					</div>

				</div>

			</div>
		</div>
	</section>

	<?php /* require_once( get_stylesheet_directory() . '/z-section-services-points.php' ); */ ?>

	<?php /* require_once( get_stylesheet_directory() . '/z-section-portfolio-grid.php' ); */ ?>

	<?php /* require_once( get_stylesheet_directory() . '/z-section-services-benefits.php' ); */ ?>

<?php get_footer(); ?>