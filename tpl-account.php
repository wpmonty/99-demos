<?php
	/*
		Template Name: Account
	*/
?>

<?php get_header(); ?>

        <div id="blog-fullwidth">
            <div class="alert alert-warning text-center square" role="alert">Purchased a product on CodeCanyon? <a href="https://99robots.com/docs/license-key-code-canyon-customers/">Click here to get your license key</a>.</div>
        	<section class="container">
        		<div class="row">
        			<div class="col-md-10 col-md-offset-1">

        				<div id="edd-account" class="pt pb">
                        	<?php
                        	if (have_posts()) : while (have_posts()) : the_post();
                        	?>
                        		<article <?php post_class('entry'); ?>>

                        			<?php if ( is_user_logged_in() ) { ?>

                            			<h1 class="entry-title"><?php the_title(); ?></h1>

                                            <div class="">

                                              <!-- Nav tabs -->
                                              <ul class="nav nav-tabs nm np" role="tablist">
                                                <li role="presentation" class="np active"><a href="#purchases" aria-controls="purchases" role="tab" data-toggle="tab">Purchases</a></li>
                                                <li role="presentation" class="np"><a href="#downloads" aria-controls="downloads" role="tab" data-toggle="tab">Downloads</a></li>
                                                <li role="presentation" class="np"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Profile</a></li>
                                                <li role="presentation" class="np"><a href="#subscriptions" aria-controls="subscriptions" role="tab" data-toggle="tab">Subscriptions</a></li>
                                              </ul>

                                              <!-- Tab panes -->
                                              <div class="tab-content bg-white p20 nm">
                                                <?php if ( isset($_GET['action']) && isset($_GET['payment_id']) && $_GET['action'] == 'manage_licenses' ) { ?>
                                    			    <div role="tabpanel" class="tab-pane active" id="purchases"> <?php the_content(); ?> </div>
                                    			<?php } else { ?>
                                                    <div role="tabpanel" class="tab-pane active" id="purchases"><?php echo do_shortcode('[purchase_history]'); ?></div>
                                                <?php } ?>
                                                <div role="tabpanel" class="tab-pane" id="downloads"><?php echo do_shortcode('[download_history]'); ?></div>
                                                <div role="tabpanel" class="tab-pane" id="profile"><?php echo do_shortcode('[edd_profile_editor]'); ?></div>
                                                <div role="tabpanel" class="tab-pane" id="subscriptions">

                                                    <?php
                                                    /**
                                                     * This template is used to display the purchase history of the current user.
                                                     */

                                                        $subscriptions = edd_get_users_purchases( get_current_user_id(), 20, true, 'any' );
                                                    	if ( $subscriptions ) :
                                                    		do_action( 'edd_before_purchase_history' ); ?>
                                                    		<table id="edd_user_history" class="table table-striped table-hover table-responsive">
                                                    			<thead>
                                                    				<tr class="edd_purchase_row">
                                                    					<?php do_action('edd_purchase_history_header_before'); ?>
                                                    					<th class="edd_purchase_id"><?php _e('ID', 'edd'); ?></th>
                                                    					<th class="edd_purchase_date"><?php _e('Date', 'edd'); ?></th>
                                                    					<th class="edd_purchase_amount"><?php _e('Amount', 'edd'); ?></th>
                                                    					<th class="edd_purchase_details"><?php _e('Details', 'edd'); ?></th>
                                                    					<?php do_action('edd_purchase_history_header_after'); ?>
                                                    				</tr>
                                                    			</thead>
                                                    			<?php foreach ( $subscriptions as $post ) : setup_postdata( $post ); ?>
                                                    				<?php $purchase_data = edd_get_payment_meta( $post->ID );

                                                    				if ( isset($purchase_data['downloads'][0]['options']['recurring']) ) { ?>

                                                        				<tr class="edd_purchase_row">
                                                        					<?php do_action( 'edd_purchase_history_row_start', $post->ID, $purchase_data ); ?>
                                                        					<td class="edd_purchase_id">#<?php echo edd_get_payment_number( $post->ID ); ?></td>
                                                        					<td class="edd_purchase_date"><?php echo date_i18n( get_option('date_format'), strtotime( get_post_field( 'post_date', $post->ID ) ) ); ?></td>
                                                        					<td class="edd_purchase_amount">
                                                        						<span class="edd_purchase_amount"><?php echo edd_currency_filter( edd_format_amount( edd_get_payment_amount( $post->ID ) ) ); ?></span>
                                                        					</td>
                                                        					<td class="edd_purchase_details">
                                                        						<?php if( $post->post_status != 'publish' ) : ?>
                                                        						<span class="edd_purchase_status <?php echo $post->post_status; ?>"><?php echo edd_get_payment_status( $post, true ); ?></span>
                                                        						<a href="<?php echo esc_url( add_query_arg( 'payment_key', edd_get_payment_key( $post->ID ), edd_get_success_page_uri() ) ); ?>">&raquo;</a>
                                                        						<?php else: ?>
                                                        						<a href="<?php echo esc_url( add_query_arg( 'payment_key', edd_get_payment_key( $post->ID ), edd_get_success_page_uri() ) ); ?>"><?php _e( 'View Details and Downloads', 'edd' ); ?></a>
                                                        						<?php endif; ?>
                                                        					</td>
                                                        					<?php do_action( 'edd_purchase_history_row_end', $post->ID, $purchase_data ); ?>
                                                        				</tr>

                                                    				<?php } ?>

                                                    			<?php endforeach; ?>
                                                    		</table>
                                                    		<div id="edd_purchase_history_pagination" class="edd_pagination navigation">
                                                    			<?php
                                                    			$big = 999999;
                                                    			echo paginate_links( array(
                                                    				'base'    => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                                                    				'format'  => '?paged=%#%',
                                                    				'current' => max( 1, get_query_var( 'paged' ) ),
                                                    				'total'   => ceil( edd_count_purchases_of_customer() / 20 ) // 20 items per page
                                                    			) );
                                                    			?>
                                                    		</div>
                                                    		<?php do_action( 'edd_after_purchase_history' ); ?>
                                                    		<?php wp_reset_postdata(); ?>
                                                    	<?php else : ?>
                                                    		<p class="edd-no-purchases"><?php _e('You have not purchased any subcriptions', 'edd'); ?></p>
                                                    	<?php endif;?>


                                                </div>
                                              </div>

                                            </div>

                                    <?php } else { echo do_shortcode('[edd_login]'); } ?>


                        		</article>

                            <?php endwhile; else : endif; ?>
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