<?php
	/*
		Template Name: FullWidth Thin
	*/
?>

<?php get_header(); ?>

<div id="blog-fullwidth">
	<section class="container pagewrap">
		<div class="row">
<!--     		<h1 class="text-center"><?php // the_title(); ?></h1> -->
    		<div class="row">
        		<div class="col-md-6 col-md-offset-3">
            		<?php
                    if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
                    	the_post_thumbnail('full');
                    }
                    ?>
        		</div>
    		</div>
			<div class="col-md-10 col-md-offset-1 p50 bg-white">

				<?php get_template_part('loop','single'); ?>

			</div><!-- col-md-12 -->

		</div>
	</section><!-- container -->
</div>


<?php get_footer(); ?>