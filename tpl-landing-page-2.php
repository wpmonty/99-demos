<?php
	/*
		Template Name: Services Single
	*/
?>

<?php get_header(); ?>

	<div id="services-single" class="pt pb">
		<section class="container">
			<div class="row">

				<div class="col-xs-12 col-md-8 col-sm-8">
					<div class="col-md-10">
						<h1><?php the_title(); ?></h1>
						<div class="article-wrapper archive-default">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

								<article <?php post_class('entry text-dkgray'); ?>>
									<?php the_content(); ?>
								</article>

							<?php endwhile; else : endif; ?>

							<div class="clearfix"></div>

						</div><!-- articles-wrapper -->
					</div>
				</div><!-- col-md-8 -->

				<div class="col-xs-12 col-md-4 col-sm-4 bg-gray p10 label-white heading-white radius">

					<?php echo do_shortcode('[gravityform id="1" title="true" description="true"]'); ?>

				</div><!-- col-md-8 -->

			</div>
		</section><!-- container pagewrap -->
	</div>

	<?php require_once( get_stylesheet_directory() . '/z-section-services-2col.php' ); ?>
	<?php require_once( get_stylesheet_directory() . '/z-section-testimonials2.php' ); ?>

<?php get_footer('service'); ?>