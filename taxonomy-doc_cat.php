<?php get_header(); ?>

<div id="doc-grid" class="content-area pt pb bg-white">
	<div class="container">
    	<div class="row">

        	<div class="col-sm-3 doc-sidebar">
            	<form style="" role="search" method="get" id="searchform" class="searchform aligncenter" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                	<div>
                		<label class="screen-reader-text" for="s"><?php _x( 'Search for:', 'label' ); ?></label>
                		<input class="pull-left col-sm-10 col-xs-12 bd-ltgray rd-5" placeholder="Search all documentation" value="<?php echo get_search_query(); ?>" name="s" id="s" />
                		<input type="hidden" name="post_type" value="doc" />

                	</div>
                </form>
                <div class="clearfix"></div>
            	<strong class="block mb10 mt30">Categories</strong>
            	<ul class="list-none np nm">
            	<?php if ( has_nav_menu( 'doc_menu' ) ) {
					wp_nav_menu( array('theme_location' => 'doc_menu', 'container' => false, 'items_wrap' => '%3$s'));
				} ?>
            	</ul>
        	</div>

        	<div class="col-sm-9">
            	<div class="bd-ltgray rd-5">

                    <div class="doc-header bg-dkwhite p30 text-center bb-ltgray">
                        <?php $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );  ?>
                        <h3 class="mb10"><?php echo $term->name; ?></h3>
                        <small><?php echo $term->description; ?></small>
                    </div>

                    <div class="doc-body p30">

                    	<?php if ( have_posts() ) { ?>

                    	    <?php echo ($term->slug == 'getting-started' ? '<ol class="np nm list-numbered">' : ($term->slug == 'premium-product' || $term->slug == 'products' ? '<ul class="np nm list-plugin">' : '<ul class="np nm list-file">' ) ); ?>

                    			<?php while ( have_posts() ) : the_post(); ?>

                                    <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>

                    			<?php endwhile; ?>

							<?php echo ($term->slug == 'getting-started' ? '</ol>' : '</ul>'); ?>

                    	<?php } ?>

                    </div>
            	</div>
        	</div>



	    </div>
	</div>
</div>


<?php get_footer(); ?>