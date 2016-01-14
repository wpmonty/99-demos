<?php
	/*
		Template Name: Landing Page
	*/
?>

<?php get_header(); ?>

	<div id="landing-page" class="pt pb">
		<section class="container">
			<div class="row">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<div class="col-md-5">

					<div id="lp-testimonial" class="p30 text-white bg-green radius">
						<p class="nomargin italic">"This company is the best company because they make me money!"</p>
					</div>

					<div class="p30 pt10">
						<span class="bold">Ted Mosby</span> <br /> <small>Senior Analyst - 11 Years Experience</small>
					</div>

					<div class="p30 bold">
						<?php the_content(); ?>
					</div>

					<div class="">
						<ul class="bold list-checkbox p30">
							<li class="">Qualified Leads</li>
							<li class="">Qualified Leads</li>
							<li class="">Qualified Leads</li>
							<li class="">Qualified Leads</li>
							<li class="">Qualified Leads</li>
							<li class="">Qualified Leads</li>
						</ul>
					</div>


				</div><!-- col-md-6 -->

				<div class="col-md-5 col-md-offset-1 p10 bg-white">
					<h2 class="row bg-orange text-white textcenter p20">I Want to Make Money Now!</h2>
					<?php echo do_shortcode('[gravityform id="1" title="false" description="false"]'); ?>

				</div><!-- col-md-6 -->
				<?php endwhile; else : endif; ?>
			</div>
		</section><!-- container pagewrap -->
	</div>




<?php get_footer('basic'); ?>