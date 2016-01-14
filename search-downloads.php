<?php get_header(); ?>

<section id="product-search" class="">
    <div class="container">
        <div class="col-md-12 pt pb">
            <div class="text-center mb30">
                <?php $my_searchterm = trim(esc_html($s)); ?>
                <h1><?php _e('Search Results for ');?>"<?php echo $my_searchterm;?>"</h1>
                <small>Enter keywords in the form below to perform another search.</small>
            </div>
            <form style="max-width:600px;" role="search" method="get" id="searchform" class="searchform aligncenter" action="<?php echo esc_url( home_url( '/' ) ); ?>">
            	<div>
            		<label class="screen-reader-text" for="s"><?php _x( 'Search for:', 'label' ); ?></label>
            		<input class="pull-left col-sm-10 col-xs-12 noborder" placeholder="Ex: Popup Plugin" value="<?php echo get_search_query(); ?>" name="s" id="s" />
            		<input type="hidden" name="post_type" value="download" />
            		<input type="submit" id="searchsubmit" class="btn btn-blue pull-right" value="<?php echo esc_attr_x( 'Search', 'submit button' ); ?>" />
            	</div>
            </form>
            <div class="clearfix"></div>
        </div>
    </div>
</section>

<div id="edd-grid" class="content-area bg-white pt pb">
	<div id="store-front" class="container">
		<div class="row product-grid clear">

    		<div class="col-md-12 col-sm-12 mb30 featured-product">
				<div class="p30 rd-5">
<!--
					<div class="product-image text-center">
						<img src="<?php echo site_url(); ?>/wp-content/themes/wp30/images/bundle.png"/>
					</div>
-->
					<div class="product-description">
						<h2 class="mt20 mb10 text-center"><a class="product-title text-dkgray" href="/products/product-pass">Get Instant Access to Every Plugin</a></h2>
						<div class="product-info text-center"><p class="block mb20">Save a bundle by subscribing and get instant access to all of our plugins<br/> - even those that haven't arrived yet!</p></div>
						<a class="view-details btn btn-orange bd-white w-50 aligncenter p20" href="/products/product-pass"><?php _e('Subscribe Now','gabfire'); ?></a>
					</div>
				</div>
            </div>

        <?php if ( have_posts() ) : $i = 1; ?>

			<?php while ( have_posts() ) : the_post(); ?>
                <div class="col-md-4 col-sm-6 mb30 product">
    				<div class="bg-dkwhite bd-ltgray p30 rd-5">
    					<div class="product-image">
    						<?php if ( has_post_thumbnail() ) { ?>
                                <?php gabfire_media(array(
                    				'name' => 'z-post',
                    				'imgtag' => 1,
                    				'link' => 1,
                    				'enable_video' => 1,
                    				'video_id' => 'postfull',
                    				'enable_thumb' => 1,
                    				'resize_type' => 'w',
                    				'media_width' => 700,
                    				'media_height' => 300,
                    				'thumb_align' => 'aligncenter',
                    				'enable_default' => 0
                    			));
                            } ?>
    					</div>
    					<div class="product-description">
    						<h4 class="mt20 mb10 text-center"><a class="product-title text-dkgray" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
    						<div class="product-info text-center"><small class="block mb20"><?php echo get_the_excerpt(); ?></small></div>
    						<a class="view-details btn btn-blue w-100" href="<?php the_permalink(); ?>"><?php _e('More Information','gabfire'); ?></a>
    					</div>
    				</div>
                </div>
				<?php $i+=1; ?>
			<?php endwhile; ?>

    	<?php else : ?>

    		<div class="col-md-4 col-sm-6 mb30 product">
    			<div class="bg-dkwhite bd-ltgray p30 rd-5">
    				<div class="product-description">
    					<h4 class="mt20 mb10 text-center">We Haven't Built That .. Yet</h4>
    					<div class="product-info text-center"><small class="block mb20">Just to be sure we're on the right track, send us some details on what you're looking for so we'll build it correctly :)</small></div>
    					<a class="view-details btn btn-orange w-100" href="/contact"><?php _e('Tell Us More','gabfire'); ?></a>
    				</div>
    			</div>
            </div>

    	<?php endif; ?>

		</div>

		<?php gabfire_archivepagination(); ?>

	</div>
</div>


<?php get_footer(); ?>