<?php get_header(); ?>

<div id="doc-grid" class="content-area pt pb">
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

            	<?php gabfire_dynamic_sidebar('doc'); ?>

        	</div>

        	<div class="col-sm-9">
            	<div class="">

                	<?php if ( have_posts() ) { ?>
                        <?php while ( have_posts() ) : the_post();

                            $fields     = get_post_custom();
                            $product    = $fields['gabfire_doc_product'][0];
                            $version    = get_post_meta( $product, '_edd_sl_version' );
                            $files      = get_post_meta( $product, 'edd_download_files' );
                            $file       = get_attached_file( $files[0][0]['attachment_id'] );
                            if (file_exists($file)) {
                                $filesize = filesize( $file );
                                $filesize = formatBytes($filesize);
                            }
                            $php_version = get_post_meta( $product, 'gabfire_product_php_version' );

                        ?>

                            <div class="doc-header text-center bd-ltgray rd-5 bg-dkwhite p30 bb-ltgray">

                                <h1 class="mb10"><?php the_title(); ?></h1>

                                <?php
                                $taxonomy = 'doc_cat';
                                $terms = get_the_terms( $post->ID, $taxonomy );
                                $i = 1;
                                $limit = count($terms);

                                if ( isset($product) && $product != 'none' ) { ?>

                                    <small>

                                        <?php if (isset($version[0]) && $version[0] != '') { ?>

                                            Version: <?php echo $version[0];

                                        }

                                        if (isset($filesize) && $filesize != '') { ?>

                                            | Size: <?php echo $filesize;

                                        }

                                        if (isset($php_version[0]) && $php_version[0] != '') { ?>

                                            | Required PHP Version: <?php echo $php_version[0];

                                        } else { ?>

                                            | Required PHP Version: 5.4.0

                                        <?php } ?>

                                    </small>

                                <?php } ?>

                                <div class="clearfix"></div>

                                <small>Posted In:
                                    <?php foreach ( $terms as $category ) {
                                    	echo '<a href="' . get_term_link( $category ) . '">' . $category->name . '</a>';
                                    	if ( $i < $limit ) {
                                        	echo ', ';
                                    	}
                                    	$i++;
                                    } ?>
                                </small>

                                <div class="clearfix"></div>

                                <?php if (isset($product) && $product != 'none') { ?>

                                    <a class="btn btn-primary mt20" href="<?php echo get_permalink($product) ?>">View Product &rarr;</a>

                                <?php } ?>

                            </div>

                            <div class="doc-body p30">

	                            <?php if ( has_term( 143, 'doc_cat' ) ) { ?>
		                            <em class="get-started">Make sure to have a look at our </em> <a href="https://99robots.com/doc_cat/getting-started/" target="_blank">Getting Started guide</a> <em>if you have not already.</em>
	                            <?php } ?>

                            	<?php the_content(); ?>

                            	<div class="clearfix"></div>

                            	<?php
                                    if (isset($product) && $product != 'none') {

                                        echo '<div class="doc-body"><h2>Change Log</h2>';
                                        echo "<p>The changelog is a history of updates and changes to the plugin. It will document the features and fixes we've made to the plugin in the newest release so you can prepare when you update. <em>Please backup your site before updating any plugin, theme, or WordPress.</em></p>";
                                        echo do_shortcode('[edd_changelog id="' . $product . '"]');
                                        echo '</div>';

                                    }
                                ?>

                                <div class="clearfix"></div>

                                <small class="pull-right text-ltgray"><em>Doc last modified on <?php the_modified_date(); ?></em></small>

                                <div class="clearfix"></div>

                            	<?php if (isset($product) && $product != 'none') {
                                	$single = get_post($product);
                                	$date = $single->post_modified;
                                	$date = date("F j, Y",strtotime($date));
                            	?>

                            	    <small class="pull-right text-ltgray"><em>Product last updated on <?php echo $date; ?></em></small>

                            	<?php } ?>

                            </div>

<!--
                            <div class="doc-footer p30 bt-ltgray bg-dkgray">
                                <strong>Related Posts</strong>
                            </div>
-->



                        <?php endwhile; ?>
                    <?php } ?>

            	</div>
        	</div>

	    </div>
	</div>
</div>


<?php get_footer(); ?>