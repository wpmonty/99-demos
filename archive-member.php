<?php get_header(); ?>
	<div id="blog-fullwidth">
		
		<section class="container pagewrap wrapper">
			<div class="row">
				<div class="col-md-12">
				
					<div class="gabfire_breadcrumb">
						<?php gabfire_breadcrumb(); ?>
					</div>

					<?php get_template_part('loop', 'team'); ?>

				</div><!-- col-md-12 -->

			</div>	
		</section><!-- container content-wrapper -->
	</div>
	
<?php get_footer(); ?>