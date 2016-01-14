<!--  Single-Download.php is a custom post template created for products. It overwrites the standard EDD single post template.
Reference: http://docs.easydigitaldownloads.com/article/184-template-files-for-download-product-pages
Reference: Creating Custom Add to Cart Links > http://docs.easydigitaldownloads.com/article/268-creating-custom-add-to-cart-links
Reference: Show price >  http://docs.easydigitaldownloads.com/article/278-showing-the-price-for-a-download
-->

<?php get_header(); ?>

<!-- row_type =
row-1columntext
row-1columnimage
row-1columnvideo
row-2columnlight
row-2columnblue
row-2column5050
row-3columntop
row-3columnleft
row-price
-->


<?php

	// check if the flexible content field has rows of data
	if( have_rows('content_rows') ):

	     // loop through the rows of data
	    while ( have_rows('content_rows') ) : the_row(); ?>

			<!-- Setup data from advanced custom fields -->
			<?php $row_type = get_row_layout();

	        if ( $row_type == '1_column_text' ) {
	        ?>

	        	<section class="rowprod bg-white">
					<div class="container">
						<div class="row">
					    	<div class="col-md-8 col-md-offset-2 centered">
								<h3><?php the_sub_field('headline'); ?></h3>
								<!-- <hr class="aligncenter"> -->
								<p><?php the_sub_field('paragraph'); ?></p>
								<p><a href="<?php the_sub_field('button_link'); ?>" class="btn btn-lg btn-info btn-register mb10"><?php the_sub_field('button_text'); ?></a></p>
							</div>
						</div>
					</div>
				</section><!-- /rowprod -->

			<?php
	        } elseif ( $row_type == '1_column_image' ) { ?>

	        	<section class="rowprod bg-yellow">
					<div class="container">
						<div class="row">
					    	<div class="col-md-8 col-md-offset-2 centered">
								<h3><?php the_sub_field('headline'); ?></h3>
								<p><?php the_sub_field('paragraph'); ?></p>
								<p><a href="<?php the_sub_field('button_link'); ?>" class="btn btn-lg btn-info btn-register"><?php the_sub_field('button_text'); ?></a></p>
								<img src="<?php the_sub_field('image'); ?>" class="img-responsive aligncenter npbottom" alt="">
						    </div>
						</div>
					</div>
				</section><!-- /rowprod -->

			<?php
	        } elseif ( $row_type == '1_column_video' ) { ?>

	            <?php
    				$bg_color = get_sub_field('background_color');
    				$title = get_sub_field('headline');
    				$content = get_sub_field('paragraph');
    				$text_color = get_sub_field('text_color');
    				$btn_link = get_sub_field('button_url');
    				$btn_text = get_sub_field('button_text');
    				$video = get_sub_field('video');
                ?>

	        	<section id="rowbrowser2" style="background-color:<?php if (isset($bg_color)) { echo $bg_color; } ?>; color:<?php if (isset($text_color)) { echo $text_color; } ?>;">
					<div class="container">
						<div class="row">
						    <div class="col-md-10 col-md-offset-1 mt">
    						    <?php if (isset($title) && $title != '') { ?>
						    	    <h3><?php echo $title; ?></h3>
						    	<?php }
    						    	  if (isset($content) && $content != '') { ?>
						    	    <p><?php echo $content; ?></p>
						    	<?php }
    						    	  if (isset($btn_text) && $btn_text != '') { ?>
						    	    <p><a href="<?php if (isset($btn_text) && $btn_text != '') { echo $btn_link; } ?>" class="btn btn-lg btn-info btn-register"><?php echo $btn_text ?></a></p>
						    	<?php } ?>
						    </div>
						    <?php if (isset($video) && $video != '') { ?>
    						    <div class="col-md-12 mt hidden-xs">
    						    	<div class="edd-video mb">
    						    		<?php echo wp_oembed_get($video); ?>
    						    	</div>
    						    	<!-- <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/new/graph.png" class="img-responsive aligncenter npbottom" alt="" data-effect="slide-bottom"> -->
    						    </div>
                            <?php } ?>

						</div>
					</div>
				</section>	<!--/rowbrowser2 -->

			<?php
	        } elseif ( $row_type == '2_column_left' ) { ?>
				<section id="row2left" class="rowprod bg-white">
					<div class="nopadding">
						<div class="col-md-5 col-md-offset-1 mt">
							<h3><?php the_sub_field('headline'); ?></h3>
							<p><?php the_sub_field('paragraph'); ?></p>
							<p><a href="<?php the_sub_field('button_url'); ?>" class="btn btn-lg btn-info btn-register"><?php the_sub_field('button_text'); ?></a></p>
						</div>
						<div class="col-md-6 pull-right of">
								<img src="<?php the_sub_field('image'); ?>" class="img-responsive alignright" alt="" data-effect="slide-right">
						</div>
						<div class="clearfix"></div>
					</div><!--/row -->
				</section><!--/row2left -->

	        <?php
		    } elseif ($row_type == '2_column_right') { ?>
				<section id="row2right" class="bg-blue text-ltgray">
					<div class="nopadding">
						<div class="col-md-6 pull-left of">
							<img src="<?php the_sub_field('image'); ?>" class="img-responsive alignleft" alt="" data-effect="slide-right">
						</div>
						<div class="col-md-5 mt">
							<h3><?php the_sub_field('headline'); ?></h3>
							<p><?php the_sub_field('paragraph'); ?></p>
							<p><a href="<?php the_sub_field('button_url'); ?>" class="btn btn-lg btn-default"><?php the_sub_field('button_text'); ?></a></p>
						</div>
						<div class="clearfix"></div>
					</div>
				</section>   <!--/row2right -->

			<?php
			} elseif ( $row_type == '2_column_5050') { ?>
				<section id="halfhalf">
					<div class="nopadding">
						<div class="col-md-6 bg01" style="background: url('<?php the_sub_field('image'); ?>') no-repeat center center;background-size: cover;">
						</div>

						<div class="col-md-6 bg-yellow centered pt pb">
							<h2><?php the_sub_field('headline'); ?></h2>
							<p><?php the_sub_field('paragraph'); ?></p>
							<p><a href="<?php the_sub_field('button_url'); ?>" class="btn btn-lg btn-info btn-register"><?php the_sub_field('button_text'); ?></a></p>
						</div>
						<div class="clearfix"></div>
					</div>
				</section>

			<?php
			} elseif ( $row_type == '4_column_top') { ?>

			    <?php
    				$bg_color = get_sub_field('background_color');
    				$title = get_sub_field('headline');
    				$content = get_sub_field('paragraph');
    				$text_color = get_sub_field('text_color');
                ?>

				<section class="text-white" style="background-color:<?php if (isset($bg_color)) { echo $bg_color; } ?>; color:<?php if (isset($text_color)) { echo $text_color; } ?>;">
    				<div class="pt pb">
    					<div class="container">
    						<div class="row centered">
    							<?php if (isset($title) && $title != '') { ?><h2><?php echo $title; ?></h2><?php } ?>
    							<p><?php if (isset($content)) { echo $content; } ?></p>

    								<!-- start repeater for panel data -->
    								<?php if( have_rows('panel_data') ): ?>
    									<?php while( have_rows('panel_data') ): the_row(); ?>

                                            <?php
                                				$panel_icon = get_sub_field('panel_icon');
                                				$panel_heading = get_sub_field('panel_heading');
                                				$panel_paragraph = get_sub_field('panel_paragraph');
                                            ?>

    										<div class="col-md-3 pt30">
    											<div class="circle-icon" style="border-color:<?php if (isset($text_color)) { echo $text_color; } ?>;">
    												<div class="<?php if (isset($panel_icon)) { echo $panel_icon; } ?>"></div>
    											</div>
    											<h4 class="mt30 mb10"><?php if (isset($panel_heading)) { echo $panel_heading; } ?></h4>
    											<?php if (isset($panel_paragraph)) { echo $panel_paragraph; } ?>
    										</div>

    									<?php endwhile; ?>
    								<?php endif; ?>
    								<!-- END repeater for panel data -->

    						</div>	<!--/row centered-->
    					</div>	<!--/container -->
    				</div>
				</section> <!-- /rowprod -->

			<?php
			} elseif ( $row_type == '3_column_flush') { ?>
				<section class="rowprod nopadding bg-white">

						<div class="nopadding centered">

								<!-- start repeater for panel data -->
								<?php if( have_rows('panel_data') ): ?>
									<?php while( have_rows('panel_data') ): the_row(); ?>

								  		<div class="col-md-4 <?php the_sub_field('panel_bg_class'); ?> squares">
								  			<h3><?php the_sub_field('panel_heading'); ?></h3>
								  			<i class="<?php the_sub_field('panel_icon'); ?>"></i>
								  			<?php the_sub_field('panel_paragraph'); ?>
								  		</div><!--/col-md-4 -->

									<?php endwhile; ?>
								<?php endif; ?>
								<!-- END repeater for panel data -->

						</div>	<!--/row centered-->
				</section> <!-- /row3columnflush -->

			<?php
			} elseif ( $row_type == '3_column_left') { ?>
				<section class="rowprod bg-white">
					<div class="container">
						<div class="row centered">
							<h3 class="centered"><?php the_sub_field('headline'); ?></h3>
							<p><?php the_sub_field('paragraph'); ?></p>

								<!-- start repeater for panel data -->
								<?php if( have_rows('panel_data') ): ?>
									<?php while( have_rows('panel_data') ): the_row(); ?>

										<!-- Feature Item -->
										<div class="col-md-1 centered">
											<div class="circle-icon-sm">
												<div class="icon-sm <?php the_sub_field('panel_icon'); ?> mt"></div>
											</div>
										</div>
										<div class="col-md-3 textleft">
											<h4 class="black"><?php the_sub_field('panel_heading'); ?></h4>
											<p><?php the_sub_field('panel_paragraph'); ?></p>
										</div>
										<!--/End Feature Item -->

									<?php endwhile; ?>
								<?php endif;
?>

								<!-- END repeater for panel data -->

						</div>	<!--/row centered-->
					</div>	<!--/container -->
				</section> <!-- /rowprod -->

            <?php
    	    } elseif ( $row_type == 'featured_area') { ?>

				<?php
    				$bg_color = get_sub_field('background_color_class');
    				$bg_rad = get_sub_field('background_rad');
    				$title = get_sub_field('title_text');
    				$image = get_sub_field('image');
    				$content = get_sub_field('main_content');
    				$btn_class = get_sub_field('button_color_class');
    				$btn_text = get_sub_field('primary_cta_text');

    				$demo_btn_class = get_sub_field('demo_button_color_class');
    				$demo_btn_text = get_sub_field('demo_button_text');
    				$demo_btn_link = get_sub_field('demo_button_link');

    				$doc_btn_class = get_sub_field('doc_button_color_class');
    				$doc_btn_text = get_sub_field('doc_button_text');
    				$doc_btn_link = get_sub_field('doc_button_link');

    				$prices = edd_get_variable_prices( get_the_id() );
                ?>

				<section class="edd-featured-area <?php if (isset($bg_color)) { echo $bg_color; } ?> text-white">
    				<div class="<?php if (isset($bg_rad)) { echo $bg_rad; } ?>">
    					<div class="container">
    						<div class="row">
        						<?php if (isset($title) && $title != '') { ?>
        						<div class="col-md-12 p20">
        							<h1 class="centered"><?php echo $title; ?></h1>
        						</div>
        						<?php } ?>
        						<div class="col-md-6">
    							    <div class="edd-main-image centered"><img src="<?php if (isset($image)) { echo $image; } ?>"/></div>
        						</div>
        						<div class="col-md-6">
    							    <div class="edd-main-content mt30"><h2><?php if (isset($content)) { echo $content; } ?></h2></div>

    							    <?php if( $prices ) { ?>

                                            <a class="btn <?php if (isset($btn_class)) { echo $btn_class; } ?> btn-space w-100 bd-white bd-2" href="#pricing"><?php if (isset($btn_text)) { echo $btn_text; } ?> &nbsp; <i class="fa fa-arrow-circle-o-down"></i></a>

                                            <?php if (isset($demo_btn_text) && $demo_btn_text != '' && isset($demo_btn_link) && $demo_btn_link != '') { ?>
                                                <a href="<?php if (isset($demo_btn_link)) { echo $demo_btn_link; } ?>" class="btn <?php if (isset($demo_btn_class)) { echo $demo_btn_class; } ?> btn-sm square w-50 pull-left mb20"><?php if (isset($demo_btn_text)) { echo $demo_btn_text; } ?></a>
                                            <?php } ?>

                                            <?php if (isset($doc_btn_text) && $doc_btn_text != '' && isset($doc_btn_link) && $doc_btn_link != '') { ?>
                                                <a href="<?php if (isset($doc_btn_link)) { echo $doc_btn_link; } ?>" class="btn <?php if (isset($doc_btn_class)) { echo $doc_btn_class; } ?> btn-sm square w-50 pull-left mb20"><?php if (isset($doc_btn_text)) { echo $doc_btn_text; } ?></a>
                                            <?php } ?>

    							    <?php } else { ?>

                                            <a class="btn <?php if (isset($btn_class)) { echo $btn_class; } ?> btn-space w-100 bd-white bd-2" href="<?php echo home_url(); ?>/checkout?edd_action=add_to_cart&download_id=<?php echo get_the_ID(); ?>"><?php if (isset($btn_text)) { echo $btn_text; } ?> &nbsp; <i class="fa fa-arrow-circle-o-right"></i></a>
                                            <?php if (isset($demo_btn_text) && isset($demo_btn_link)) { ?>
                                                <a href="<?php if (isset($demo_btn_link)) { echo $demo_btn_link; } ?>" class="btn <?php if (isset($demo_btn_class)) { echo $demo_btn_class; } ?> btn-sm square w-50 pull-left mb20"><?php if (isset($demo_btn_text)) { echo $demo_btn_text; } ?></a>
                                            <?php } ?>

                                            <?php if (isset($doc_btn_text) && isset($doc_btn_link)) { ?>
                                                <a href="<?php if (isset($doc_btn_link)) { echo $doc_btn_link; } ?>" class="btn <?php if (isset($doc_btn_class)) { echo $doc_btn_class; } ?> btn-sm square w-50 pull-left mb20"><?php if (isset($doc_btn_text)) { echo $doc_btn_text; } ?></a>
                                            <?php } ?>

                                    <?php } ?>

        						</div>

    						</div>	<!--/row centered-->
    					</div>	<!--/container -->
    				</div>
				</section> <!-- /rowprod -->

	     <?php
    	    } elseif ( $row_type == 'checklist_left_image') { ?>
				<section class="bg-white pb pt">
					<div class="container">
						<div class="row">
    						<div class="col-md-5">
							    <div class="edd-main-image mt30 centered"><img src="<?php the_sub_field('image'); ?>"/></div>
    						</div>
    						<div class="col-md-7">
        						<h2 class="mt30"><?php the_sub_field('heading'); ?></h2>
        						<ul class="list-checkbox">
							    <!-- start repeater for panel data -->
								<?php if( have_rows('checklist_items') ): ?>
									<?php while( have_rows('checklist_items') ): the_row(); ?>

										<!-- Feature Item -->
										<li><?php the_sub_field('item'); ?></li>
										<!--/End Feature Item -->

									<?php endwhile; ?>
								<?php endif;?>
								<!-- END repeater for panel data -->
        						</ul>
    						</div>

						</div>	<!--/row centered-->
					</div>	<!--/container -->
				</section> <!-- /rowprod -->

	     <?php
    	    } elseif ( $row_type == 'social_proof') { ?>

    	        <?php
    				$title = get_sub_field('heading');
                ?>
                <?php if (isset($title) && $title != '') { ?>
				<section class="edd-social-proof bg-white pb pt">
					<div class="container">
						<div class="row">
    						<div class="col-md-12 centered">
							    <h3 class="nomargin"><?php echo $title; ?></h3>
    						</div>

						</div>	<!--/row centered-->
					</div>	<!--/container -->
				</section> <!-- /rowprod -->
				<?php } ?>

        <?php
    	    } elseif ( $row_type == 'testimonial') { ?>

    	        <?php
    				$title = get_sub_field('heading');
    				$content = get_sub_field('testimony');
    				$image = get_sub_field('image');
                ?>

				<section class="edd-testimonial bg-white pb pt">
					<div class="container">
						<div class="row">
    						<?php if (isset($title) && $title != '') { ?>
        						<div class="col-md-12 centered">
    							    <h2><?php echo $title; ?></h2>
        						</div>
    						<?php } ?>
    						<div class="col-md-3 centered">
							    <div class=""><img src='<?php if (isset($image)) { echo $image; } ?>'/></div>
    						</div>
    						<div class="col-md-9">
							    <?php if (isset($content)) { echo $content; } ?>
    						</div>

						</div>	<!--/row centered-->
					</div>	<!--/container -->
				</section> <!-- /rowprod -->

        <?php
    	    } elseif ( $row_type == 'cta') { ?>

    	        <?php
    				$bg_color = get_sub_field('background_color');
    				$title = get_sub_field('heading');
    				$text_color = get_sub_field('text_color');
    				$btn_class = get_sub_field('button_color_class');
    				$btn_text = get_sub_field('link_text');

    				$prices = edd_get_variable_prices( get_the_id() );
                ?>

				<section class="edd-cta" style="background-color:<?php if (isset($bg_color)) { echo $bg_color; } ?>;">
    				<div class="pb pt">
    					<div class="container">
    						<div class="row">
        						<?php if (isset($title) && $title != '') { ?>
            						<div class="col-md-12 centered mb30">
        							    <h2 class="mb10" style="color:<?php if (isset($text_color)) { echo $text_color; } ?>;"><?php echo $title; ?></h2>
            						</div>
        						<?php } ?>
        						<div class="col-md-6 col-md-offset-3 centered">

            						<?php if( $prices ) { ?>

                                            <a href="#pricing" class="btn btn-space nomargin <?php if (isset($btn_class)) { echo $btn_class; } ?> square w-100"><?php if (isset($btn_text)) { echo $btn_text; } ?> &nbsp; <i class="fa fa-arrow-circle-o-down"></i></a>

    							    <?php } else { ?>

                                            <a href="<?php echo home_url(); ?>/checkout?edd_action=add_to_cart&download_id=<?php echo get_the_ID(); ?>" class="btn btn-space nomargin <?php if (isset($btn_class)) { echo $btn_class; } ?> square w-100"><?php if (isset($btn_text)) { echo $btn_text; } ?> &nbsp; <i class="fa fa-arrow-circle-o-right"></i></a>
                                    <?php } ?>

        						</div>

    						</div>	<!--/row centered-->
    					</div>	<!--/container -->
    				</div>
				</section> <!-- /rowprod -->

        <?php
    	    } elseif ( $row_type == 'logos') { ?>

    	        <?php
    				$bg_color = get_sub_field('background_color');
    				$title = get_sub_field('heading');
    				$text_color = get_sub_field('text_color');
                ?>

				<section class="edd-logos pb pt" style="background-color:<?php if (isset($bg_color)) { echo $bg_color; } ?>; color:<?php if (isset($text_color)) { echo $text_color; } ?>;">
					<div class="container pb">
						<div class="row">
    						<div class="col-md-12 centered mb">
							    <h2><?php if (isset($title) && $title != '') { echo $title; } ?></h2>
    						</div>
    						<!-- start repeater for panel data -->
							<?php if( have_rows('logo_items') ): ?>
								<?php while( have_rows('logo_items') ): the_row(); ?>
                                    <?php $image = get_sub_field('image');?>
									<!-- Feature Item -->
									<?php if (isset($image)) { ?><div class="col-md-2 mb20"><img src='<?php echo $image; ?>' /></div> <?php } ?>
									<!--/End Feature Item -->

								<?php endwhile; ?>
							<?php endif;?>
							<!-- END repeater for panel data -->

						</div>	<!--/row centered-->
					</div>	<!--/container -->
				</section> <!-- /rowprod -->

        <?php
    	    } elseif ( $row_type == 'uses') { ?>

    	        <?php
    				$bg_color = get_sub_field('background_color');
    				$title = get_sub_field('heading');
    				$text_color = get_sub_field('text_color');
    				$i = 1;
                ?>

				<section class="edd-uses pb pt" style="background-color:<?php if (isset($bg_color)) { echo $bg_color; } ?>; color:<?php if (isset($text_color)) { echo $text_color; } ?>;">
					<div class="container">
						<div class="row">
    						<?php if (isset($title) && $title != '') { ?>
        						<div class="col-md-12 centered mb30">
    							    <h2><?php echo $title; ?></h2>
        						</div>
    						<?php } ?>
    						<!-- start repeater for panel data -->
							<?php if( have_rows('use_items') ): ?>
								<?php while( have_rows('use_items') ): the_row(); ?>

                                    <?php
                        				$image = get_sub_field('image');
                        				$sub = get_sub_field('subheading');
                        				$text = get_sub_field('text');
                                    ?>

									<!-- Feature Item -->
									<div class="edd-use-item col-md-6 mb">
    									<div class="row">
        								    <div class="col-md-6">
    									        <img src='<?php if (isset($image)) { echo $image; } ?>' />
    								        </div>
    								        <div class="col-md-6">
    									        <h4 class="mb10"><?php if (isset($sub)) { echo $sub; } ?></h4>
    									        <?php if (isset($text)) { echo $text; } ?>
    								        </div>
    									</div>
									</div>
									<?php if ($i % 2 == 0) { ?> <div class="clearfix"></div> <?php } ?>
									<!--/End Feature Item -->
                                    <?php $i++ ?>
								<?php endwhile; ?>
							<?php endif;?>
							<!-- END repeater for panel data -->

						</div>	<!--/row centered-->
					</div>	<!--/container -->
				</section> <!-- /rowprod -->

	     <?php
    	    } elseif ( $row_type == 'benefits') { ?>

    	        <?php
    				$bg_color = get_sub_field('background_color');
    				$title = get_sub_field('heading');
    				$sub = get_sub_field('subheading');
    				$text_color = get_sub_field('text_color');
                ?>

				<section class="edd-benefits pb pt" style="background-color:<?php if (isset($bg_color)) { echo $bg_color; } ?>; color:<?php if (isset($text_color)) { echo $text_color; } ?>;">
					<div class="container">
						<div class="row">
    						<?php if (isset($title) && $title != '') { ?>
        						<div class="col-md-12 centered mb30">
    							    <h2><?php echo $title; ?></h2>
                                    <?php if (isset($sub)) { ?><div class="col-md-6 col-md-offset-3"><h5><?php echo $sub; ?></h5></div><?php } ?>
    						    </div>
    						<?php } ?>

    						<!-- start repeater for panel data -->
							<?php if( have_rows('benefit_items') ):?>
							    <?php $i = 1; ?>
								<?php while( have_rows('benefit_items') ): the_row(); ?>

                                    <?php
                        				$image = get_sub_field('image');
                        				$benefit = get_sub_field('benefit_name');
                        				$text = get_sub_field('benefit_text');
                                    ?>

                                    <?php if ($i % 2 == 0) { ?>

    									<!-- Feature Item -->
    									<div class="col-md-12 mb mt">
        									<div class="row">

            								    <div class="col-md-6 col-md-push-6 pb20">
                                                    <img class="p10 m20" src='<?php if (isset($image)) { echo $image; } ?>' />
            								    </div>
            								    <div class="col-md-6 col-md-pull-6 text-right">
                                                    <h2><?php if (isset($benefit)) { echo $benefit; } ?></h2>
                                                    <?php if (isset($text)) { echo $text; } ?>
            								    </div>
        									</div>
        								</div>
    									<!--/End Feature Item -->

									<?php } else { ?>

									    <!-- Feature Item -->
    									<div class="col-md-12 mb mt">
        									<div class="row">
            								    <div class="col-md-6 pb20">
                                                    <img class="p10 m20 pull-right" src='<?php if (isset($image)) { echo $image; } ?>' />
            								    </div>
            								    <div class="col-md-6">
                                                    <h2><?php if (isset($benefit)) { echo $benefit; } ?></h2>
                                                    <?php if (isset($text)) { echo $text; } ?>
            								    </div>
        									</div>
        								</div>
    									<!--/End Feature Item -->

    								<?php } ?>

                                    <?php $i++ ?>

								<?php endwhile; ?>
							<?php endif;?>
							<!-- END repeater for panel data -->

						</div>	<!--/row centered-->
					</div>	<!--/container -->
				</section> <!-- /rowprod -->

	     <?php }

	    endwhile;

	else :

	    // no layouts found

	endif;

	?>
	<?php
    $upsell = get_post_meta($post->ID,'_edd_csau_upsell_products', true);
    if ($upsell > 0) {
    ?>
    <section class="edd-cross-sell pt pb bg-white">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </section>

    <?php } ?>


    <!-- Variable pricing -->
    <?php $prices = edd_get_variable_prices( get_the_id() ); ?>

    <?php if( edd_has_variable_prices( get_the_id()) ) { ?>
        <section id="pricing" class="pt pb bg-white">
            <div class="container">
                <div class="row">

                    <h2 class="mb text-center">Pricing Options</h2>

                    <?php $i = 0; ?>

                    <div class="col-md-10 col-md-offset-1">

            			<?php foreach( $prices as $price_id => $price ) { ?>

            			    <?php if( $i == 1 ) { $featured = true; } else { $featured = false; } ?>

            			    <div class="col-sm-6 mb30 <?php if( $featured ) { echo 'featured-price'; } ?>">

                                <div class="rd-5 bg-dkwhite text-center">

                                    <div class="variable-header">
                                        <?php if( $featured ) { ?>
                                            <div class="bd-orange bd-2 w-100"></div>
                                        <?php } else { ?>
                                            <div class="bd-blue bd-2 w-100"></div>
                                        <?php } ?>
                                        <h4 class="p30 pb10 nm"><?php echo $price['name']; ?></h4>
                                        <h2 class="bb-ltgray bd-2 nm pb30">$<?php echo $price['amount']; ?></h2>
                                    </div>

                                    <?php
                                        $limit = $price['license_limit'];
                                        if ( isset($limit) && $limit == 1 ) {
                                            $limit = '1 Site';
                                        } else if ( isset($limit) && $limit > 1 ) {
                                            $limit = $limit . ' Sites';
                                        } else {
                                            $limit = 'Unlimited Sites';
                                        }
                                    ?>

                                    <div class="variable-body p30 pt10 pb10">
                                        <ul class="list-none p50 pt10 pb10 nm">
                                            <?php if (isset($price['recurring']) && $price['recurring'] == 'yes') { ?>
                                                <li class="bb-ltgray pb10 mb10">Download Any Product Anytime</li>
                                                <li class="bb-ltgray pb10 mb10">Install on <?php echo $limit; ?></li>
                                                <li class="bb-ltgray pb10 mb10">Automatic Product Updates</li>
                                                <li class="bb-ltgray pb10 mb10">24/7 Support</li>
                                            <?php } else { ?>
                                                <li class="bb-ltgray pb10 mb10">Download Product Anytime</li>
                                                <li class="bb-ltgray pb10 mb10">Install on <?php echo $limit; ?></li>
                                                <li class="bb-ltgray pb10 mb10">1 Year Product Updates</li>
                                                <li class="bb-ltgray pb10 mb10">1 Year Support</li>
                                            <?php } ?>

                                        </ul>
                                    </div>

                                    <div class="variable-footer p30 pt10">
                                        <?php
                                            if( $featured ) { $btn_class = 'btn-orange'; } else { $btn_class = 'btn-blue'; }

                                            if (isset($price['recurring']) && $price['recurring'] == 'yes') {
                                                $btn_text = 'Subscribe Now';
                                            } else {
                                                $btn_text = 'Buy Now';
                                            } ?>

                                        <a class="btn <?php echo $btn_class; ?> btn-space nm w-100" href="<?php echo home_url(); ?>/checkout?edd_action=add_to_cart&download_id=<?php echo get_the_ID(); ?>&edd_options[price_id]=<?php echo $price_id ?>"><?php echo $btn_text; ?></a>
                                    </div>

                                </div>

            			    </div>

                        <?php $i++; } ?>

                    </div>

                </div>
            </div>
        </section>

    <?php } ?>



	<!-- 10)  DEFAULT row-price -->
<?php if (1 < 0) { ?>
		<div class="rowprod bg-yellow">
		  <div id="rowprice">
		    <div class="container">
		      <div class="row">
		        <div class="col-md-6 col-md-offset-3">

		          <div class="price-table">
		            <div class="row">
		              <div class="col-md-6">
		                <div class="price-icon">
		                  <h1 class="tag">$<?php the_field('product_price'); ?></h1>
		                </div>
		              </div><!--/col-md-6-->
		              <div class="col-md-6 centered">
		                <h4><black>GET IT NOW</black></h4>
		                <p>
		                  Guaranteed Satisfaction<br/>
		                  Amazing Support <br/>
		                </p>
		                <p><a href="<?php the_field('buy_link'); ?>" class="btn btn-lg btn-success" target="blank">BUY IT NOW</a></p>
		              </div><!--/col-md-6-->
		            </div><!--/row -->
		          </div><!--/price-table-->

		        </div><!--/col-md-6-->
		      </div><!--/row -->
		    </div><!--/container -->
		  </div><!--/rowprice -->
		</div>  <!--/rowprod -->







        <?php  // display download tags
			the_terms( $post->ID, 'download_tag', 'Tags: ', ', ', '' );
		?>

		<?php  // display download category
			the_terms( $post->ID, 'download_category', 'Categories: ', ', ', '' );
		?>


		<?php // echo the price
			edd_price($post->ID);
		?>

		LINK TO ADD TO CART: <a href="<?php echo home_url(); ?>/?edd_action=add_to_cart&download_id=<?php echo get_the_ID(); ?>">Add to Cart</a>
		LINK DIRECT TO CHECKOUT: <a href="<?php echo home_url(); ?>/checkout?edd_action=add_to_cart&download_id=<?php echo get_the_ID(); ?>">Buy Now</a>
		LINK DIRECT TO PAYPAL:  <a href="<?php echo home_url(); ?>/checkout?edd_action=straight_to_gateway&download_id=<?php echo get_the_ID(); ?>">Buy Now via Paypal</a>


 <?php } ?>


<?php get_footer(); ?>