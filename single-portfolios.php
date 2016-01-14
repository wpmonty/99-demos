<div id="blog-portfolio">

	<section class="container pagewrap wrapper">
		<div class="row">
			<div class="gabfire_breadcrumb">
				<?php gabfire_breadcrumb(); ?>
			</div>			
		
			<div class="portfolioslide_wrapper">
				<?php
				global $wp_query, $post;
				$disable_postslider = get_post_meta($post->ID, 'disable_postslider', true);
				$project_introduction = get_post_meta($post->ID, 'project_introduction', true);
				$project_link = get_post_meta($post->ID, 'project_link', true);

				echo '<h1>' .get_the_title(). '</h1>';
				
				if ($project_introduction != '') { 
					echo "<p class='subtitle pull-left'>$project_introduction</p>";
				}
				?>
				
				<div class="clearfix"></div>
				
				<?php
				if ( $disable_postslider !== 'true') { 
					get_template_part( 'inc/portfolio-gallery-default', '' );
				}
				?>
			</div>
		</div>
	
		<div class="row">
			<div class="col-xs-12 col-md-8">
				
				<?php get_template_part('loop','single-portfolios'); ?>
				
			</div><!-- col-md-8 -->
			
			
			<div class="clearfix hidden-lg hidden-md"></div>

			<?php get_sidebar('portfolios'); ?>
		</div>	
	</section><!-- container content-wrapper -->
</div>