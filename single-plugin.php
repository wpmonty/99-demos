<?php get_header(); ?>

<!--
	<div class="container">
		<div class="row">
			<div class="gabfire_breadcrumb">
				<?php gabfire_breadcrumb(); ?>
			</div>       
		</div>
	</div>
-->
	
	<?php/*  gabfire_postheader();  */?>
	<?php wps_postheader(); ?>


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



<?php if( have_rows('content_rows') ): ?>
	<?php while( have_rows('content_rows') ): the_row(); ?>

		<!-- Setup date from advanced custom fileds -->
		<?php $rowtype = get_sub_field('row_type'); ?>

			<!-- 1)  row-1columntext -->
			<?php if ($rowtype == 'row-1columntext') { ?>	
				<div class="rowprod bg-white">
					<div class="container">
						<div class="row">
					    	<div class="col-md-8 col-md-offset-2 centered">	    
								<h3><?php the_sub_field('row_headline'); ?></h3>
								<!-- <hr class="aligncenter"> -->
								<?php the_sub_field('row_paragraph'); ?>
								<a href="<?php the_sub_field('row_button_url'); ?>" class="btn btn-lg btn-info btn-register mb10"><?php the_sub_field('row_button_text'); ?></a>
							</div>
						</div>
					</div>
				</div><!-- /rowprod -->
			


			<!-- 2)  row-1columnimage -->
			<!--  http://www.advancedcustomfields.com/resources/repeater/  -->
			<?php } elseif ($rowtype == 'row-1columnimage') { ?>	
				<div class="rowprod bg-yellow npbottom">
					<div class="container">
						<div class="row">
					    	<div class="col-md-8 col-md-offset-2 centered">	    
								<h3><?php the_sub_field('row_headline'); ?></h3>
								<?php the_sub_field('row_paragraph'); ?>
								<p><a href="<?php the_sub_field('row_button_url'); ?>" class="btn btn-lg btn-info btn-register"><?php the_sub_field('row_button_text'); ?></a></p>
								<img src="<?php the_sub_field('row_image'); ?>" class="img-responsive aligncenter npbottom" alt="">
						    </div>
						</div>   
					</div>
				</div><!-- /rowprod -->
			

			<!-- 3)  row-1columnvideo -->
			<?php } elseif ($rowtype == 'row-1columnvideo') { ?>	
				<div id="rowbrowser2">
					<div class="container">
						<div class="row">			    
						    <div class="col-md-10 col-md-offset-1 mt">
						    	<h3><?php the_sub_field('row_headline'); ?></h3>
						    	<?php the_sub_field('row_paragraph'); ?>
						    	<p><a href="<?php the_sub_field('row_button_url'); ?>" class="btn btn-lg btn-info btn-register"><?php the_sub_field('row_button_text'); ?></a></p>
						    </div>
						    <div class="col-md-12 mt hidden-xs">
						    	<div class="myvideo">
						    		<?php the_sub_field('row_video'); ?>
						    	</div>
						    	<!-- <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/new/graph.png" class="img-responsive aligncenter npbottom" alt="" data-effect="slide-bottom"> -->
						    </div>
						</div>
					</div>
				</div>	<!--/rowbrowser2 -->


			<!-- 4)  row-2columnleft -->
			<?php } elseif ($rowtype == 'row-2columnleft') { ?>	
				<div id="row2left" class="rowprod bg-white">
					<div class="row nopadding">
						<div class="col-md-5 col-md-offset-1 mt">
							<h3><?php the_sub_field('row_headline'); ?></h3>
							<?php the_sub_field('row_paragraph'); ?>
							<p><a href="<?php the_sub_field('row_button_url'); ?>" class="btn btn-lg btn-info btn-register"><?php the_sub_field('row_button_text'); ?></a></p>
						</div>						
						<div class="col-md-6 pull-right of">
								<img src="<?php the_sub_field('row_image'); ?>" class="img-responsive alignright" alt="" data-effect="slide-right">
						</div>
					</div><!--/row -->
				</div><!--/row2left -->


			<!-- 5)  row-2columnright -->
			<?php } elseif ($rowtype == 'row-2columnright') { ?>	
				<div id="row2right" class="bg-blue text-ltgray">
					<div class="row nopadding">
						<div class="col-md-6 pull-left of">
							<img src="<?php the_sub_field('row_image'); ?>" class="img-responsive alignleft" alt="" data-effect="slide-right">
						</div>
						<div class="col-md-5 mt">
							<h3><?php the_sub_field('row_headline'); ?></h3>
							<?php the_sub_field('row_paragraph'); ?>
							<p><a href="<?php the_sub_field('row_button_url'); ?>" class="btn btn-lg btn-default"><?php the_sub_field('row_button_text'); ?></a></p>
						</div>
				
					</div>
				</div>   <!--/row2right -->


			<!-- 6)  row-2column5050 -->
			<?php } elseif ($rowtype == 'row-2column5050') { ?>	
				<div id="halfhalf">
					<div class="row nopadding">
						<div class="col-md-6 bg01" style="background: url('<?php the_sub_field('row_image'); ?>') no-repeat center center;background-size: cover;">
						</div>
						
						<div class="col-md-6 bg-yellow bg-color centered">
							<h2><?php the_sub_field('row_headline'); ?></h2>
							<?php the_sub_field('row_paragraph'); ?>
							<p><a href="<?php the_sub_field('row_button_url'); ?>" class="btn btn-lg btn-info btn-register"><?php the_sub_field('row_button_text'); ?></a></p>			
						</div>
					</div>
				</div> 


			<!-- 7)  row-3columntop -->
			<?php } elseif ($rowtype == 'row-3columntop') { ?>				
				<div class="rowprod bg-white">
					<div class="container">
						<div class="row centered">
							<h3><?php the_sub_field('row_headline'); ?></h3>
							<?php the_sub_field('row_paragraph'); ?>

								<!-- start repeater for panel data -->
								<?php if( have_rows('panel_data') ): ?>
									<?php while( have_rows('panel_data') ): the_row(); ?>
						
										<div class="col-md-4">
											<div class="circle-icon">
												<div class="<?php the_sub_field('panel_icon'); ?>"></div>
											</div>
											<h4 class="black"><?php the_sub_field('panel_heading'); ?></h4>
											<?php the_sub_field('panel_paragraph'); ?>
										</div>
										
									<?php endwhile; ?>
								<?php endif; ?>
								<!-- END repeater for panel data -->
								
						</div>	<!--/row centered-->
					</div>	<!--/container -->
				</div> <!-- /rowprod -->


			<!-- 8)  row-3columnflush -->
			<?php } elseif ($rowtype == 'row-3columnflush') { ?>				
				<div class="rowprod nopadding bg-white">
						<div class="row nopadding centered">

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
				</div> <!-- /row3columnflush -->


			<!-- 9)  row-3columnflush -->
			<?php } elseif ($rowtype == 'row-3columnleft') { ?>	
				<div class="rowprod bg-white">
					<div class="container">
						<div class="row centered">
							<h3 class="centered"><?php the_sub_field('row_headline'); ?></h3>
							<?php the_sub_field('row_paragraph'); ?>

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
											<?php the_sub_field('panel_paragraph'); ?>
										</div>
										<!--/End Feature Item -->
										
									<?php endwhile; ?>
								<?php endif; ?>
								<!-- END repeater for panel data -->
								
						</div>	<!--/row centered-->
					</div>	<!--/container -->
				</div> <!-- /rowprod -->






			<?php } ?>




	<?php endwhile; ?>
<?php endif; ?>


	<!-- 10)  DEFAULT row-price -->
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












<?php get_footer(); ?>