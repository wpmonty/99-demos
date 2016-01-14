<div id="blog-bigpicture">
	<?php gabfire_postheader(); ?>		

	<section class="container pagewrap">
		<div class="row">
				<div class="gabfire_breadcrumb">
					<?php gabfire_breadcrumb(); ?>
				</div>			
			
				<div class="bigpicture_wrapper">
					<?php
					$subtitle = get_post_meta($post->ID, 'subtitle', true);
					if ($subtitle != '') { 
						echo "<p class='subtitle'>$subtitle</p>";
					}
					
					/* Load pictures attached to this post */
					get_template_part( 'inc/theme-gallery-bigpicture', '' ); ?>		
			</div>
		</div>
	
		<div class="row">
			<div class="col-xs-12 col-md-8 col-sm-8">
				
				<?php get_template_part('loop','single'); ?>
				
			</div><!-- col-md-8 -->
			
			<?php
			$sidebar = '';
			if ( is_singular('portfolio') )  { 
				$sidebar = 'portfolios';
			}
			get_sidebar($sidebar); ?>
			
		</div>	
	</section><!-- container content-wrapper -->
</div>