<?php
	/*
		Template Name: Contact
	*/
?>

<?php get_header(); ?>

	<div id="tpl-contact">

		<section class="row pt pb bg-white aligncenter">
			<h1 class="text-dkblue textcenter">Contact Us</h1>
			<h4 class="text-gray light italic textcenter">We're nice robots, we don't bite.</h4>
		</section>

		<section class="container pt pb mt mb">
			<div class="row">

				<div class="col-xs-12 col-md-6 col-md-offset-1 col-sm-6">

					<?php echo do_shortcode('[gravityform id="1" title="false" description="false"]'); ?>

				</div><!-- col-md-6 -->

				<div class="col-xs-12 col-md-4 col-md-offset-1 col-sm-6">

					<h3>Reach Out To Us</h3>

					<p><strong>Phone:</strong> 201-916-0755</p>
					<p><strong>Address:</strong> 220 Davidson Avenue Suite 100
    					<br/> Somerset NJ, 08873
					</p>

				</div><!-- col-md-6 -->

			</div>
		</section><!-- container -->

		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6064.480499912689!2d-74.52279049999997!3d40.536280999999995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0x30f6b961bd4adb3a!2sJuiceTank!5e0!3m2!1sen!2sus!4v1437674912966" scrollwheel="false" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>

	</div>

<?php get_footer(); ?>