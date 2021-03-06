<?php
	/*
		Template Name: Thank You
	*/
?>

<?php get_header(); ?>

	<div id="tpl-contact">

		<section class="row pt pb bg-white aligncenter">
			<h1 class="text-dkblue textcenter">Thank You!</h1>
			<h4 class="text-gray light italic textcenter">We'll get back to you soon. <br/>Meanwhile, check out these resources we've created just for you.</h4>
		</section>

		<?php require_once( get_stylesheet_directory() . '/z-section-pluginlist.php' ); ?>

        <div id="nnr-product">

        <?php

        	// check if the flexible content field has rows of data
        	if( have_rows('content_rows') ):

        	     // loop through the rows of data
        	    while ( have_rows('content_rows') ) : the_row(); ?>

        			<!-- Setup data from advanced custom fields -->
        			<?php $row_type = get_row_layout();

        	        if ( $row_type == '1_column_text' ) {

            	        $title = get_sub_field('headline');
            	        $desc = get_sub_field('paragraph');
            	        $link = get_sub_field('button_link');
            	        $link_text = get_sub_field('button_text');

        	        ?>

        	        	<section class="row-text rowprod bg-white">
        					<div class="container">
        						<div class="row">
        					    	<div class="col-md-8 col-md-offset-2 centered">
        								<?php if (isset($title) && $title != '') { ?> <h3><?php echo $title; ?></h3> <?php } ?>
        								<?php if (isset($desc) && $desc != '') { ?> <p><?php echo $desc; ?></p> <?php } ?>
        								<?php if (isset($link) && $link != '' && isset($link_text) && $link_text != '') { ?> <p><a href="<?php echo $link; ?>" class="btn btn-lg btn-info btn-register mb10"><?php echo $link_text; ?></a></p> <?php } ?>
        							</div>
        						</div>
        					</div>
        				</section><!-- /rowprod -->

        			<?php
        	        } elseif ( $row_type == '1_column_image' ) {

                        $bg_color = get_sub_field('background_color');
                        $text_color = get_sub_field('text_color');
            	        $title = get_sub_field('headline');
            	        $desc = get_sub_field('paragraph');
            	        $link = get_sub_field('button_link');
            	        $link_text = get_sub_field('button_text');
            	        $image = get_sub_field('image');

            	    ?>

        	        	<section class="row-image rowprod" style="background-color:<?php if (isset($bg_color)) { echo $bg_color; } ?>; color:<?php if (isset($text_color)) { echo $text_color; } ?>;">
        					<div class="container">
        						<div class="row">
        					    	<div class="col-md-8 col-md-offset-2 centered">
        								<?php if (isset($title) && $title != '') { ?> <h2><?php echo $title; ?></h2> <?php } ?>
        								<?php if (isset($desc) && $desc != '') { ?> <p><?php echo $desc; ?></p> <?php } ?>
        								<?php if (isset($link) && $link != '' && isset($link_text) && $link_text != '') { ?> <p><a href="<?php echo $link; ?>" class="btn btn-lg btn-info btn-register"><?php echo $link_text; ?></a></p> <?php } ?>
        								<?php if (isset($image) && $image != '') { ?> <img src="<?php echo $image; ?>" class="img-responsive aligncenter npbottom" alt="" /> <?php } ?>
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

        	        	<section class="row-video" style="background-color:<?php if (isset($bg_color)) { echo $bg_color; } ?>; color:<?php if (isset($text_color)) { echo $text_color; } ?>;">
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
        				</section>	<!--/row-video -->

        			<?php
        	        } elseif ( $row_type == '2_column_left' ) {

            	        $title = get_sub_field('headline');
            	        $desc = get_sub_field('paragraph');
            	        $link = get_sub_field('button_url');
            	        $link_text = get_sub_field('button_text');
            	        $image = get_sub_field('image');

        	        ?>
        				<section class="row2left rowprod bg-white">
        					<div class="nopadding">
        						<div class="col-md-5 col-md-offset-1 mt">
        							<?php if (isset($title) && $title != '') { ?> <h3><?php echo $title; ?></h3> <?php } ?>
                                    <?php if (isset($desc) && $desc != '') { ?> <p><?php echo $desc; ?></p> <?php } ?>
        							<?php if (isset($link) && $link != '' && isset($link_text) && $link_text != '') { ?> <p><a href="<?php echo $link; ?>" class="btn btn-lg btn-info btn-register"><?php echo $link_text; ?></a></p> <?php } ?>
        						</div>
        						<div class="col-md-6 pull-right of">
        							<?php if (isset($image) && $image != '') { ?> <img src="<?php echo $image; ?>" class="img-responsive alignright" alt="" data-effect="slide-right" /> <?php } ?>
        						</div>
        						<div class="clearfix"></div>
        					</div><!--/row -->
        				</section><!--/row2left -->

        	        <?php
        		    } elseif ($row_type == '2_column_right') {

            		    $title = get_sub_field('headline');
            	        $desc = get_sub_field('paragraph');
            	        $link = get_sub_field('button_url');
            	        $link_text = get_sub_field('button_text');
            	        $image = get_sub_field('image');

        		    ?>
        				<section class="row2right bg-blue text-ltgray">
        					<div class="nopadding">
        						<div class="col-md-6 pull-left of">
        							<?php if (isset($image) && $image != '') { ?> <img src="<?php echo $image; ?>" class="img-responsive alignleft" alt="" data-effect="slide-right" /> <?php } ?>
        						</div>
        						<div class="col-md-5 mt">
        							<?php if (isset($title) && $title != '') { ?> <h3><?php echo $title; ?></h3> <?php } ?>
                                    <?php if (isset($desc) && $desc != '') { ?> <p><?php echo $desc; ?></p> <?php } ?>
        							<?php if (isset($link) && $link != '' && isset($link_text) && $link_text != '') { ?> <p><a href="<?php echo $link; ?>" class="btn btn-lg btn-info btn-register"><?php echo $link_text; ?></a></p> <?php } ?>
        						</div>
        						<div class="clearfix"></div>
        					</div>
        				</section>   <!--/row2right -->

        			<?php
        			} elseif ( $row_type == '2_column_5050') {

            			$title = get_sub_field('headline');
            	        $desc = get_sub_field('paragraph');
            	        $link = get_sub_field('button_url');
            	        $link_text = get_sub_field('button_text');
            	        $image = get_sub_field('image');

        			?>
        				<section class="halfhalf">
        					<div class="nopadding">
        						<?php if (isset($image) && $image != '') { ?> <div class="col-md-6 bg01" style="background: url('<?php echo $image; ?>') no-repeat center center;background-size: cover;"> <?php } ?>
        						</div>
        						<div class="col-md-6 bg-yellow centered pt pb">
        							<?php if (isset($title) && $title != '') { ?> <h3><?php echo $title; ?></h3> <?php } ?>
                                    <?php if (isset($desc) && $desc != '') { ?> <p><?php echo $desc; ?></p> <?php } ?>
        							<?php if (isset($link) && $link != '' && isset($link_text) && $link_text != '') { ?> <p><a href="<?php echo $link; ?>" class="btn btn-lg btn-info btn-register"><?php echo $link_text; ?></a></p> <?php } ?>
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

        				<section class="four-column-top text-white" style="background-color:<?php if (isset($bg_color)) { echo $bg_color; } ?>; color:<?php if (isset($text_color)) { echo $text_color; } ?>;">
            				<div class="pt pb">
            					<div class="container">
            						<div class="row centered">
            							<?php if (isset($title) && $title != '') { ?><h2><?php echo $title; ?></h2><?php } ?>
            							<?php if (isset($content)) { ?> <p> <?php echo $content; ?></p> <?php } ?>

            								<!-- start repeater for panel data -->
            								<?php if( have_rows('panel_data') ): ?>
            									<?php while( have_rows('panel_data') ): the_row(); ?>

                                                    <?php
                                        				$panel_icon = get_sub_field('panel_icon');
                                        				$panel_image = get_sub_field('panel_image');
                                        				$panel_heading = get_sub_field('panel_heading');
                                        				$panel_paragraph = get_sub_field('panel_paragraph');
                                                    ?>

            										<div class="col-md-3 pt">
                										<?php if (isset($panel_icon) && $panel_icon != '') { ?>
                											<div class="circle-icon" style="border-color:<?php if (isset($text_color)) { echo $text_color; } ?>;">
                												<div class="<?php if (isset($panel_icon)) { echo $panel_icon; } ?>"></div>
                											</div>
            											<?php } elseif (isset($panel_image) && $panel_image != '') { ?>
            											    <div class="centered aligncenter textcenter">
                											    <img src="<?php echo $panel_image; ?>" />
            											    </div>
            											<?php } ?>
            											<h4 class="mt30 mb10 bold"><?php if (isset($panel_heading)) { echo $panel_heading; } ?></h4>
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
        				<section class="three-column-flush rowprod nopadding bg-white">

        						<div class="nopadding centered">

        								<!-- start repeater for panel data -->
        								<?php if( have_rows('panel_data') ): ?>
        									<?php while( have_rows('panel_data') ): the_row(); ?>

        									    <?php
            									    $bg_class = get_sub_field('panel_bg_class');
            									    $title = get_sub_field('panel_heading');
            									    $desc = get_sub_field('panel_paragraph');
            									    $icon = get_sub_field('panel_icon');

            									    if ($bg_class == 'bg-white') {
                									    $bg_class = $bg_class . ' text-dkgray';
            									    } else {
                									    $bg_class = $bg_class . ' text-white';
            									    }
        									    ?>

        								  		<div class="col-md-4 <?php echo $bg_class; ?> squares">
        								  			<?php if (isset($icon) && $icon != '') { ?> <i class="<?php echo $icon; ?>"></i> <?php } ?>
        								  			<?php if (isset($title) && $title != '') { ?> <h3 class="mb10 mt20"><?php echo $title; ?></h3> <?php } ?>
        								  			<?php if (isset($desc) && $desc != '') { echo '<p class="nm">' . $desc . '</p>'; } ?>
        								  		</div><!--/col-md-4 -->

        									<?php endwhile; ?>
        								<?php endif; ?>
        								<!-- END repeater for panel data -->
                                    <div class="clearfix"></div>
        						</div>	<!--/row centered-->
        				</section> <!-- /row3columnflush -->

        			<?php
        			} elseif ( $row_type == '3_column_left') {

        			    $title = get_sub_field('headline');
        			    $desc = get_sub_field('paragraph');

        			?>
        				<section class="three-column-left rowprod bg-white">
        					<div class="container">
        						<div class="row centered">
        							<?php if (isset($title) && $title != '') { ?> <h2 class="centered"><?php echo $title; ?></h2> <?php } ?>
        							<?php if (isset($desc) && $desc != '') { ?> <p><?php echo $desc; ?></p> <?php } ?>

        								<!-- start repeater for panel data -->
        								<?php if( have_rows('panel_data') ): ?>
        									<?php while( have_rows('panel_data') ): the_row();

            									$ptitle = get_sub_field('panel_heading');
        									    $pdesc = get_sub_field('panel_paragraph');
        									    $picon = get_sub_field('panel_icon');
        									    $pimage = get_sub_field('panel_image');

        									?>

        										<!-- Feature Item -->
        										<div class="col-md-4">
            										<div class="row">
                										<div class="col-md-3 centered mb30">
                    										<?php if (isset($picon) && $picon != '') { ?>
                    											<div class="circle-icon-sm">
                    												<div class="icon-sm <?php echo $picon; ?>"></div>
                    											</div>
                                                            <?php } elseif (isset($pimage) && $pimage != '') { ?>
                                                                <div class="centered aligncenter textcenter">
                    											    <img src="<?php echo $pimage; ?>" />
                											    </div>
                                                            <?php } ?>
                										</div>
                										<div class="col-md-9 textleft">
                											<?php if (isset($ptitle) && $ptitle != '') { ?> <h4 class="mt0"><?php echo $ptitle; ?></h4> <?php } ?>
                											<?php if (isset($pdesc) && $pdesc != '') { echo $pdesc; } ?>
                										</div>
            										</div>
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
        /*     				$demo_btn_text = get_sub_field('demo_button_text'); */
                            $demo_btn_text = 'View Demo';
            				$demo_btn_link = get_sub_field('demo_button_link');

            				$doc_btn_class = get_sub_field('doc_button_color_class');
        /*     				$doc_btn_text = get_sub_field('doc_button_text'); */
                            $doc_btn_text = 'Read Doc';
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
                						<div class="col-md-5 col-md-offset-1">
            							    <div class="edd-main-content mt30"><h2><?php if (isset($content)) { echo $content; } ?></h2></div>

            							    <?php if( $prices ) { ?>

                                                    <?php if (isset($btn_text) && $btn_text != '') { ?><a class="btn <?php if (isset($btn_class)) { echo $btn_class; } ?> btn-space w-100 bd-white bd-2" href="#pricing"><?php echo $btn_text; ?> &nbsp; <i class="fa fa-arrow-circle-o-down"></i></a> <?php } ?>

                                                    <?php if (isset($demo_btn_text) && $demo_btn_text != '' && isset($demo_btn_link) && $demo_btn_link != '') { ?>
                                                        <a href="<?php if (isset($demo_btn_link)) { echo $demo_btn_link; } ?>" target="_blank" class="btn <?php if (isset($demo_btn_class)) { echo $demo_btn_class; } ?> btn-sm w-50 pull-left mb20 square"><?php if (isset($demo_btn_text)) { echo $demo_btn_text; } ?></a>
                                                    <?php } ?>

                                                    <?php if (isset($doc_btn_text) && $doc_btn_text != '' && isset($doc_btn_link) && $doc_btn_link != '') { ?>
                                                        <a href="<?php if (isset($doc_btn_link)) { echo $doc_btn_link; } ?>" target="_blank" class="btn <?php if (isset($doc_btn_class)) { echo $doc_btn_class; } ?> btn-sm w-50 pull-left mb20 square"><?php if (isset($doc_btn_text)) { echo $doc_btn_text; } ?></a>
                                                    <?php } ?>

            							    <?php } else { ?>

                                                    <?php if (isset($btn_text) && $btn_text != '') { ?><a class="btn <?php if (isset($btn_class)) { echo $btn_class; } ?> btn-space w-100 bd-white bd-2" href="<?php echo home_url(); ?>/checkout?edd_action=add_to_cart&download_id=<?php echo get_the_ID(); ?>"><?php echo $btn_text; ?> &nbsp; <i class="fa fa-arrow-circle-o-right"></i></a> <?php } ?>
                                                    <?php if (isset($demo_btn_text) && isset($demo_btn_link)) { ?>
                                                        <a href="<?php if (isset($demo_btn_link)) { echo $demo_btn_link; } ?>" target="_blank" class="btn <?php if (isset($demo_btn_class)) { echo $demo_btn_class; } ?> btn-sm w-50 pull-left mb20 square"><?php if (isset($demo_btn_text)) { echo $demo_btn_text; } ?></a>
                                                    <?php } ?>

                                                    <?php if (isset($doc_btn_text) && isset($doc_btn_link)) { ?>
                                                        <a href="<?php if (isset($doc_btn_link)) { echo $doc_btn_link; } ?>" target="_blank" class="btn <?php if (isset($doc_btn_class)) { echo $doc_btn_class; } ?> btn-sm w-50 pull-left mb20 square"><?php if (isset($doc_btn_text)) { echo $doc_btn_text; } ?></a>
                                                    <?php } ?>

                                            <?php } ?>

                						</div>

            						</div>	<!--/row centered-->
            					</div>	<!--/container -->
            				</div>
        				</section> <!-- /rowprod -->

        	     <?php
            	    } elseif ( $row_type == 'checklist_left_image') {

                	    $title = get_sub_field('heading');
        			    $image = get_sub_field('image');

            	    ?>
        				<section class="bg-white pb pt">
        					<div class="container">
        						<div class="row">
            						<div class="col-md-5">
        							    <?php if (isset($image) && $image != '') { ?> <div class="edd-main-image mt30 centered"><img src="<?php echo $image; ?>"/></div><?php } ?>
            						</div>
            						<div class="col-md-7">
                						<?php if (isset($title) && $title != '') { ?> <h2 class="mt30"><?php echo $title; ?></h2><?php } ?>

        							    <!-- start repeater for panel data -->
        								<?php if( have_rows('checklist_items') ): ?>
        								    <ul class="list-checkbox">
        									<?php while( have_rows('checklist_items') ): the_row();

            									$item = get_sub_field('item');

        									?>

        										<!-- Feature Item -->
        										<?php if (isset($item) && $item != '') { ?> <li><?php echo $item; ?></li> <?php } ?>
        										<!--/End Feature Item -->

        									<?php endwhile; ?>
        									</ul>
        								<?php endif;?>
        								<!-- END repeater for panel data -->
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
            				$subtitle = get_sub_field('sub_heading');
            				$content = get_sub_field('testimony');
            				$image = get_sub_field('image');
                        ?>

        				<section class="edd-testimonial bg-white pb pt">
        					<div class="container">
        						<div class="row">
            						<?php if (isset($title) && $title != '') { ?>
                						<div class="col-md-8 col-md-offset-2 centered mb30">
            							    <h2><?php echo $title; ?></h2>
                						</div>
            						<?php } ?>
            						<div class="col-md-3 col-md-offset-2 centered">
        							    <div><img class="radius-full" src='<?php if (isset($image)) { echo $image; } ?>'/></div>
            						</div>
            						<div class="col-md-5">
                						<?php if (isset($subtitle) && $subtitle != '') { ?> <h4 class="mt0 mb10"><?php echo $subtitle; ?></h4> <?php } ?>
        							    <?php if (isset($content) && $content != '') { echo $content; } ?>
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

            				$demo_btn_class = get_sub_field('demo_button_color_class');
        /*     				$demo_btn_text = get_sub_field('demo_link_text'); */
                            $demo_btn_text = 'View Demo';
            				$demo_btn_link = get_sub_field('demo_link');

            				$doc_btn_class = get_sub_field('doc_button_color_class');
        /*     				$doc_btn_text = get_sub_field('doc_link_text'); */
                            $doc_btn_text = 'Read Doc';
            				$doc_btn_link = get_sub_field('doc_link');

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

                    						 <?php if ( (isset($demo_btn_text) && $demo_btn_text == '' && isset($demo_btn_link) && $demo_btn_link == '') && (isset($doc_btn_text) && $doc_btn_text == '' && isset($doc_btn_link) && $doc_btn_link == '') ) {
                        				            $btn_class = $btn_class . ' w-100';
                        				        }
                    						 ?>

                    						<?php if( $prices ) { ?>

                                                    <a href="#pricing" class="btn btn-space nomargin <?php if (isset($btn_class)) { echo $btn_class; } ?>"><?php if (isset($btn_text)) { echo $btn_text; } ?> &nbsp; <i class="fa fa-arrow-circle-o-down"></i></a>

            							    <?php } else { ?>

                                                    <a href="<?php echo home_url(); ?>/checkout?edd_action=add_to_cart&download_id=<?php echo get_the_ID(); ?>" class="btn btn-space nomargin <?php if (isset($btn_class)) { echo $btn_class; } ?>"><?php if (isset($btn_text)) { echo $btn_text; } ?> &nbsp; <i class="fa fa-arrow-circle-o-right"></i></a>
                                            <?php } ?>

                                            <?php if( isset($demo_btn_text) && $demo_btn_text != '' && isset($demo_btn_link) && $demo_btn_link != '' ) { ?>

                                                    <a href="<?php echo $demo_btn_link; ?>" target="_blank" class="btn btn-space nomargin <?php if (isset($demo_btn_class)) { echo $demo_btn_class; } ?>"><?php echo $demo_btn_text; ?> &nbsp; <i class="fa fa-desktop"></i></a>

            							    <?php } ?>

            							    <?php if( isset($doc_btn_text) && $doc_btn_text != '' && isset($doc_btn_link) && $doc_btn_link != '' ) { ?>

                                                    <a href="<?php echo $doc_btn_link; ?>" target="_blank" class="btn btn-space nomargin <?php if (isset($doc_btn_class)) { echo $doc_btn_class; } ?>"><?php echo $doc_btn_text; ?> &nbsp; <i class="fa fa-book"></i></a>

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
        					<div class="container">
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
            								        <div class="col-md-6 light">
            									        <h4 class="mb10 mt0 bold"><?php if (isset($sub)) { echo $sub; } ?></h4>
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

        				<section class="edd-benefits pt" style="background-color:<?php if (isset($bg_color)) { echo $bg_color; } ?>; color:<?php if (isset($text_color)) { echo $text_color; } ?>;">
        					<div class="container">
        						<div class="row">
            						<?php if (isset($title) && $title != '') { ?>
                						<div class="col-md-12 centered">
            							    <h2><?php echo $title; ?></h2>
                                            <?php if (isset($sub) && $sub != '') { ?><div class="col-md-6 col-md-offset-3"><p><?php echo $sub; ?></p></div><?php } ?>
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

                    								    <div class="col-md-6 col-md-push-6">
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
                    								    <div class="col-md-6">
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

                    <?php } elseif ( $row_type == 'coming_soon') { ?>

                        <?php
            				$bg_color = '#f8f8f8';
            				$title = get_sub_field('heading');
            				$sub = get_sub_field('subheading');
            				$text_color = '#333';
            				$image = get_sub_field('image');
            				$benefit = get_sub_field('product_name');
            				$text = get_sub_field('product_text');
            				$link_text = get_sub_field('link_text');
                        ?>

        				<section class="edd-benefits pt" style="background-color:<?php if (isset($bg_color)) { echo $bg_color; } ?>; color:<?php if (isset($text_color)) { echo $text_color; } ?>;">
        					<div class="container">
        						<div class="row">

            						<?php if (isset($title) && $title != '') { ?>
                						<div class="col-md-12 centered">
            							    <h2><?php echo $title; ?></h2>
                                            <?php if (isset($sub) && $sub != '') { ?><div class="col-md-6 col-md-offset-3"><h5 class="nm"><?php echo $sub; ?></h5></div><?php } ?>
            						    </div>
            						<?php } ?>

        							<!-- Feature Item -->
        							<div class="col-md-12 mb mt">
        								<div class="row">

        								    <div class="col-md-6">
                                                <img class="p10 m20" src='<?php if (isset($image)) { echo $image; } ?>' />
        								    </div>

        								    <div class="col-md-6">
                                                <h3><?php if (isset($benefit)) { echo $benefit; } ?></h3>
                                                <?php if (isset($text)) { echo '<p>' . $text . '</p>'; } ?>
                                                <div class="progress">
                                                    <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 85%">
                                                        <span class="sr-only">85% Complete</span>
                                                    </div>
                                                </div>
                                                <div class="clearfix"></div>
                                                <small class="light italic">* Membership price will increase when products are released.</small>
                                                <div class="clearfix"></div>
                                                <?php if (isset($link_text) && $link_text != '') { ?> <a href="#pricing" class="btn btn-blue btn-space"><?php echo $link_text; ?></a> <?php } ?>
                                                <div class="clearfix"></div>
        								    </div>

        								</div>
        							</div>
        							<!--/End Feature Item -->

        						</div>	<!--/row centered-->
        					</div>	<!--/container -->
        				</section> <!-- /rowprod -->

                    <?php } elseif ( $row_type == 'bg_image') { ?>

            	        <?php
            				$image = get_sub_field('image');
            				if(isset($image) && $image != '') {
                        ?>

                				<section class="edd-bg-image">
                    				<a href="#pricing">
                                        <img src="<?php echo $image; ?>" />
                    				</a>
                				</section>

                        <?php }

            	    } elseif ( $row_type == 'edd_products') {

            	        $product_args = array(
                        	'post_type'	=> 'download',
                        	'posts_per_page' => 30,
                        	'post__not_in' => array('4942')
                        );
                        $products = new WP_Query( $product_args ); ?>

                        <section id="edd-grid" class="content-area bg-white pt pb">
                        	<div id="store-front" class="container">
                        	<?php if ( $products->have_posts() ) : $i = 2; ?>
                        		<div class="row product-grid clear">
                                    <h2 class="text-center">Get Instant Access to All of These Products</h2>
                        			<?php while ( $products->have_posts() ) : $products->the_post(); ?>
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
                            						<div class="product-info text-center"><small class="block mb20 italic light"><?php echo get_the_excerpt(); ?></small></div>
                            					</div>
                            				</div>
                                        </div>

                        				<?php $i+=1; ?>
                        			<?php endwhile; ?>

                        		</div>

                        	<?php else : ?>

                        		<h2 class="center"><?php _e( 'Not Found', 'gabfire' ); ?></h2>
                        		<p class="center"><?php _e( 'Sorry, but you are looking for something that isn\'t here.', 'gabfire' ); ?></p>
                        		<?php get_search_form(); ?>

                        	<?php endif; wp_reset_postdata(); ?>

                        	</div>
                        </section>
                 <?php }

        	    endwhile;

        	else :

        	    // no layouts found

        	endif;
        	?>

        </div>  <!-- /nnr-product -->

		<?php require_once( get_stylesheet_directory() . '/z-section-homeblogposts.php' ); ?>

    	<!-- Google Code for Contact Form Inquiries Conversion Page -->
        <script type="text/javascript">
        /* <![CDATA[ */
        var google_conversion_id = 948383124;
        var google_conversion_language = "en";
        var google_conversion_format = "3";
        var google_conversion_color = "ffffff";
        var google_conversion_label = "JopTCLq0sl4QlNucxAM";
        var google_remarketing_only = false;
        /* ]]> */
        </script>
        <script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
        </script>
        <noscript>
        <div style="display:inline;">
        <img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/948383124/?label=JopTCLq0sl4QlNucxAM&amp;guid=ON&amp;script=0"/>
        </div>
        </noscript>

	</div>

<?php get_footer(); ?>