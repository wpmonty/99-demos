<?php get_header(); ?>

<section id="docs-search" class="">
    <div class="container">
        <div class="col-md-12 pt pb">
            <div class="text-center mb30">
                <?php $my_searchterm = trim(esc_html($s)); ?>
                <h1><?php _e('Documentation for ');?>"<?php echo $my_searchterm;?>"</h1>
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

<div id="blog-fullwidth">
	<section class="container">
		<div class="row mb">

			<div class="col-md-8 col-md-offset-2">

				<?php get_template_part('loop', 'list'); ?>

				<div class="clearfix"></div>

			</div><!-- col-md-12 -->

		</div>
	</section><!-- container -->
</div>


<?php get_footer(); ?>