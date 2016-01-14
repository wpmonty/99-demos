<?php
	/*
		Template Name: Services Landing Page
	*/
?>

<?php get_header(); ?>

	<?php require_once( get_stylesheet_directory() . '/z-section-services-menu.php' ); ?>

	<?php global $wp_query; ?>

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

				</div><!-- col-md-6 -->

				<div class="col-md-6 bg-ltgray p20">
					<?php

					// get gravity form custom field
					$form_id = get_post_meta($wp_query->post->ID, 'form_id', true);

					echo do_shortcode('[gravityform id="'.$form_id.'" title="true" description="true"]');

					?>
				</div>

			</div>
		</section><!-- container -->
	</div>

	<section id="services-points">
		<div class="container">
			<div class="row">
				<?php
				// get custom fields
				$title = get_post_meta($wp_query->post->ID, 'benefit_title', true);
				$icon_1 = get_post_meta($wp_query->post->ID, 'benefit_1_icon', true);
				$title_1 = get_post_meta($wp_query->post->ID, 'benefit_1_title', true);
				$subtitle_1 = get_post_meta($wp_query->post->ID, 'benefit_1_subtitle', true);
				$icon_2 = get_post_meta($wp_query->post->ID, 'benefit_2_icon', true);
				$title_2 = get_post_meta($wp_query->post->ID, 'benefit_2_title', true);
				$subtitle_2 = get_post_meta($wp_query->post->ID, 'benefit_2_subtitle', true);
				$icon_3 = get_post_meta($wp_query->post->ID, 'benefit_3_icon', true);
				$title_3 = get_post_meta($wp_query->post->ID, 'benefit_3_title', true);
				$subtitle_3 = get_post_meta($wp_query->post->ID, 'benefit_3_subtitle', true);
				?>

				<h1 class="text-center mt pt"><?php echo $title ?></h1>

				<div class="col-md-10 col-md-offset-1 mb">

					<div class="row pt pb">

						<div class="col-md-2">
							<i class="<?php echo $icon_1 ?> fa-5x block text-center text-blue p10"></i>
						</div>

						<div class="col-md-10">
							<h3 class="bold text-blue"><?php echo $title_1 ?></h3>
							<p><?php echo $subtitle_1 ?></p>
						</div>

					</div>

					<div class="row pt pb text-right bt-ltgray">

						<div class="col-md-10">
							<h3 class="bold text-blue"><?php echo $title_2 ?></h3>
							<p><?php echo $subtitle_2 ?></p>
						</div>

						<div class="col-md-2">
							<i class="<?php echo $icon_2 ?> fa-5x block text-center text-blue p10"></i>
						</div>

					</div>

					<div class="row pt pb bt-ltgray">

						<div class="col-md-2">
							<i class="<?php echo $icon_3 ?> fa-5x block text-center text-blue p10"></i>
						</div>

						<div class="col-md-10">
							<h3 class="bold text-blue"><?php echo $title_3 ?></h3>
							<p><?php echo $subtitle_3 ?></p>
						</div>

					</div>


				</div>

			</div>
		</div>
	</section>

	<?php wp_reset_query(); ?>

	<?php /* require_once( get_stylesheet_directory() . '/z-section-services-points.php' ); */ ?>

	<?php /* require_once( get_stylesheet_directory() . '/z-section-portfolio-grid.php' ); */ ?>

	<?php /* require_once( get_stylesheet_directory() . '/z-section-services-benefits.php' ); */ ?>

<?php get_footer('service'); ?>