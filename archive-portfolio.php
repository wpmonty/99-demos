<?php get_header(); ?>

	<div id="blog-fullwidth">
		
		<section class="container pagewrap wrapper">
			<div class="row">
				<div class="col-md-12">
				
					<div class="gabfire_breadcrumb">
						<?php gabfire_breadcrumb(); ?>
					</div>

					<?php
					if (!is_paged()) {
						get_template_part('loop','portfolio');
					} else {
						get_template_part('loop','2col');
					}
					?>

				</div><!-- col-md-12 -->

			</div>	
		</section><!-- container content-wrapper -->
		
	</div><!-- blog-fullwidth -->
	
<?php get_footer(); ?>