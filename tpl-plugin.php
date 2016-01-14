<?php
	/*
		Template Name: Plugin Index
	*/
?>

<?php get_header(); ?>

	<div id="blog-fullwidth">
		
		<section class="container pagewrap">
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
				
					<div class="gabfire_breadcrumb">
						<?php gabfire_breadcrumb(); ?>
					</div>

					<?php get_template_part('loop', 'plugin'); ?>

				</div><!-- col-md-12 -->

			</div>	
		</section><!-- container pagewrap -->
	</div>

<?php get_footer(); ?>