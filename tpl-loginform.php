<?php
	/*
		Template Name: Login Form
	*/
?>

<?php get_header(); ?>

<div id="blog-default">
	
	<section class="container pagewrap">
		<div class="row">
							
			<div class="col-xs-12 col-md-8 col-sm-8">
			
				<div class="gabfire_breadcrumb">
					<?php gabfire_breadcrumb(); ?>
				</div>	
				
				<div class="article-wrapper">
				
					<div id="gabfire-login">

						<div class="title">
							<h3><?php _e('Have an Account?','gabfire'); ?><small class="block"><?php _e('Login Using This Form','gabfire'); ?></small></h3>
						</div>

						<?php 
						$args = array(
						'redirect' => home_url().'/wp-admin/profile.php', 
						'value_username' => NULL,
						'value_remember' => false 
						); 				
						
						wp_login_form($args);
						?>
					</div>
				</div>
				
			</div><!-- col-md-8 -->				
			
			<?php get_sidebar(); ?>			
		</div>	
	</section><!-- container -->
	
</div>

<?php get_footer(); ?>