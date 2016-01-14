<?php get_header(); ?>

	<div id="blog-default">

		<section class="container pagewrap">
			<div class="row">

				<?php get_sidebar('forum'); ?>
				<div class="col-xs-12 col-md-8 col-sm-8">

					<?php get_template_part('loop', 'simple'); ?>

				</div><!-- col-md-8 -->

			</div>
		</section><!-- container pagewrap -->
	</div>

<?php get_footer(); ?>