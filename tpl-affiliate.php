<?php
	/*
		Template Name: Affiliate
	*/
?>

<?php get_header(); ?>

        <div id="blog-fullwidth">
        	<section class="container">
        		<div class="row">
        			<div class="col-md-10 col-md-offset-1">

        				<div id="edd-account" class="pt pb">

            				<article>

                				<h1 class="entry-title"><?php the_title(); ?></h1>

                        	    <?php the_content(); ?>

            				</article>

        				</div>

        			</div><!-- col-md-12 -->

        		</div>
        	</section><!-- container -->
        </div>


        <div id="footer-copyright" class="mt">
        	<div class="container">
        		<i class="icn logo"></i>
        		<p id="crafted" class="pull-left">99 Robots is joyfully operated in New York City.</p>
        		<ul class="pull-right list-none">
        			<li id="copyright">&copy; 2015 99 Robots, LLC.</li>
        		</ul>
        	</div>
        </div>

    <?php wp_footer(); ?>

    </body>

</html>