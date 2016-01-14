<?php get_header(); ?>

<!--
<section id="product-search" class="">
    <div class="container">
        <div class="col-md-12 pt pb">
            <div class="text-center mb30">
                <h1>Plugins for WordPress</h1>
                <small>Use plugins built specifically for Wordpress to customize the functionality of your website.</small>
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
-->

<div id="edd-grid" class="content-area bg-white pb">
	<div id="store-front" class="container">

		<div class="row product-grid clear">

    		<div class="col-md-12 col-sm-12 featured-product">
				<div class="p30 rd-5">
					<div class="product-description">
						<h2 class="mt20 mb text-center">Our Most Popular WordPress Plugin</h2>
						<div class="col-md-6 text-center">
                            <a href="https://99robots.com/products/wp-background-takeover-advertisements/"><img src="http://99robots.com/wp-content/uploads/2015/08/envato-banner-590x300-2.jpg" /></a>
						</div>
						<div class="col-md-6 pt30">
    						<p><a href="https://99robots.com/products/wp-background-takeover-advertisements/">WP Background Takeover Advertisements</a> makes it easy to add wallpaper advertisements on your site. Set different advertisements for individual posts, pages, categories, or by any custom taxonomy and take full control of your website.</p>
    						<a href="https://99robots.com/products/wp-background-takeover-advertisements/" class="btn btn-space btn-orange">Learn More</a>
						</div>
					</div>
				</div>
				<hr/>
            </div>

            <div class="col-md-12 col-sm-12 bt-ltgray mt">
				<div class="p30 rd-5">
					<div class="product-description">
						<h2 class="mt20 mb0 text-center">WordPress Plugins</h2>
					</div>
				</div>
            </div>

            <?php
            $fire_suite_ids = array('4602','4601','4600','4591',);
            $fire_suite = array( 'ids' => $fire_suite_ids, 'name' => 'Fire Suite', 'desc' => 'Direct visitors to important pages on your site and capture leads with custom optins.', 'color' => 'orange',  );

            $post_suite_ids = array('4895','7081','7080',);
            $post_suite = array( 'ids' => $post_suite_ids, 'name' => 'Post Suite', 'desc' => 'Keep visitors on your site by providing a variety of content at their fingertips.', 'color' => 'blue',  );

            $other_ids = array('4603','4604','7633','7145', '8384');
            $others = array( 'ids' => $other_ids, 'name' => 'More Awesome Products', 'desc' => 'Empower your site with a variety of useful tools.', 'color' => 'green',  );

            // Override suite splitting for now
            $suites = array_merge($fire_suite, $post_suite, $others);

            //$suites = array($fire_suite, $post_suite, $others);

            foreach ($suites as $suite) {


                $product_args = array(
                	'post_type'	=> 'download',
                	'posts_per_page' => -1,
                	'post__not_in' => array('4942'),
                	'post__in' => $suite['ids'],
                	'orderby' => 'title',
                	'order' => 'ASC'
                );

                $products = new WP_Query( $product_args );

                if ( $products->have_posts() ) : $i = 1; ?>
                    <div class="clearfix"></div>
                    <div class="row pt30 pb20">
<!--                         <h2 class="text-center mb10"><?php echo $suite['name']; ?></h2> -->
<!--                         <p class="text-center mb"><?php echo $suite['desc']; ?></p> -->

            			<?php while ( $products->have_posts() ) : $products->the_post(); ?>

                                <div class="col-md-4 col-sm-6 mb30 product">
                                	<div class="bg-dkwhite bd-ltgray p30 rd-5">

                                		<h4 class="mb10 text-center"><a class="product-title text-dkgray" href="<?php the_permalink(); ?>"><?php the_title(); ?><span style="vertical-align:super;font-size:10px;">TM</span></a></h4>

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
                                			<div class="product-info text-center"><small class="block mb20 italic light"><?php echo get_the_excerpt(); ?></small></div>
                                			<a class="view-details btn btn-blue<?php // echo $suite['color']; ?> w-100" href="<?php the_permalink(); ?>">Learn More</a>
                                			<a class="block text-center pt10" href="<?php echo home_url(); ?>/checkout?edd_action=add_to_cart&download_id=<?php echo get_the_ID(); ?>">Download Now - <?php edd_price(get_the_ID()); ?></a>
                                		</div>
                                	</div>
                                </div>

                                <?php if ( $i % 2 === 0 ) { echo '<div class="clearfix hidden-lg hidden-md"></div>'; } ?>
                                <?php if ( $i % 3 === 0 ) { echo '<div class="clearfix hidden-xs hidden-sm"></div>'; } ?>

                            <?php ++$i;
            			endwhile; ?>
        			</div>
        			<hr>
                <?php endif;
            }
            ?>

			<div class="col-md-12 col-sm-12 mb30 featured-product">
				<div class="p30 rd-5">
					<div class="product-description">
						<h2 class="mt20 mb10 text-center"><a class="product-title text-dkgray" href="/products/product-pass">Get Instant Access to Every Tool</a></h2>
						<div class="product-info text-center"><p class="block mb20">Save <strong>66%</strong> by subscribing and get unlimited licenses to all of our plugins<br/> - even those that haven't arrived yet!</p></div>
						<a class="view-details btn btn-orange bd-white w-50 aligncenter p20" href="https://99robots.com/checkout?edd_action=add_to_cart&download_id=4942&edd_options[price_id]=1"><?php _e('Subscribe Now for $49 / mo','gabfire'); ?></a>
						<a class="block text-center" href="/products/product-pass"><?php _e('learn more','gabfire'); ?></a>
					</div>
				</div>
            </div>

		</div>


	</div>
</div>


<?php get_footer(); ?>