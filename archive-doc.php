<?php get_header(); ?>

<section id="docs-search" class="">
    <div class="container">
        <div class="col-md-12 pt pb">
            <div class="text-center mb30">
                <h1>Documentation</h1>
            </div>
            <form style="max-width:600px;" role="search" method="get" id="searchform form-inline" class="searchform aligncenter" action="<?php echo esc_url( home_url( '/' ) ); ?>">
        		<div class="form-group col-xs-9">
	        		<label class="hidden screen-reader-text" for="s"><?php _x( 'Search for:', 'label' ); ?></label>
            		<input style="margin-bottom: 0;max-height: 43px;" class="form-control input-lg" placeholder="Search all documentation" value="<?php echo get_search_query(); ?>" name="s" id="s" />
        		</div>
        		<div class="form-group col-xs-3">
            		<button style="border-radius: 4px;" type="submit" id="searchsubmit" class="btn btn-blue btn-lg form-contorl"><?php echo esc_attr_x( 'Search', 'submit button' ); ?></button>
        		</div>
        		<input type="hidden" name="post_type" value="doc" />
            </form>
            <div class="clearfix"></div>
        </div>
    </div>
</section>

<div id="doc-grid" class="content-area bg-white pt pb">
	<div class="container">
    	<div class="row">

        	<?php
            $args = array(
            	'post_type'	=> 'doc',
            	'doc_cat' => 'getting-started',
            	'posts_per_page' => 20
            );
            $docs = new WP_Query( $args );
            ?>

        	<div class="col-sm-4">
            	<div class="bd-ltgray rd-5">

                    <div class="doc-header p30 text-center bb-ltgray bg-dkwhite ">
                        <h3 class="mb10">Getting Started</h3>
                        <small>Everything to get you up and running</small>
                    </div>

                    <div class="doc-body p30">

                    	<?php if ( $docs->have_posts() ) { ?>

                    	    <ol class="np list-numbered">

                    			<?php while ( $docs->have_posts() ) : $docs->the_post(); ?>

                                    <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>

                    			<?php endwhile; ?>

                    	    </ol>

                    	    <small class="block text-center mt20"><a href="/doc_cat/getting-started/">See All &rarr;</a></small>

                    	<?php } ?>

                    </div>
            	</div>
        	</div>

        	<?php
            $args = array(
            	'post_type'	=> 'doc',
            	'doc_cat' => 'products,premium-product',
            	'posts_per_page' => 20
            );
            $docs = new WP_Query( $args );
            ?>

        	<div class="col-sm-4">
            	<div class="bd-ltgray rd-5">

                    <div class="doc-header p30 text-center bb-ltgray bg-dkwhite ">
                        <h3 class="mb10">Products</h3>
                        <small>Product documentation and tutorials</small>
                    </div>

                    <div class="doc-body p30">

                    	<?php if ( $docs->have_posts() ) { ?>

                    	    <ul class="np nm list-plugin">

                    			<?php while ( $docs->have_posts() ) : $docs->the_post(); ?>

                                    <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>

                    			<?php endwhile; ?>

                    	    </ul>

                            <small class="block text-center mt20"><a href="/doc_cat/products/">See All &rarr;</a></small>

                    	<?php } ?>

                    </div>
            	</div>
        	</div>

        	<?php
            $args = array(
            	'post_type'	=> 'doc',
            	'doc_tag' => 'faq',
            	'posts_per_page' => 20
            );
            $docs = new WP_Query( $args );
            ?>

        	<div class="col-sm-4">
            	<div class="bd-ltgray rd-5">

                    <div class="doc-header p30 text-center bb-ltgray bg-dkwhite ">
                        <h3 class="mb10">FAQs</h3>
                        <small>Frequently asked questions</small>
                    </div>

                    <div class="doc-body p30">

                    	<?php if ( $docs->have_posts() ) { ?>

                    	    <ul class="np nm list-file">

                    			<?php while ( $docs->have_posts() ) : $docs->the_post(); ?>

                                    <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>

                    			<?php endwhile; ?>

                    	    </ul>

                    	    <small class="block text-center mt20"><a href="/doc_tag/faq/">See All &rarr;</a></small>

                    	<?php } ?>

                    </div>
            	</div>
        	</div>

	    </div>
	</div>
</div>


<?php get_footer(); ?>