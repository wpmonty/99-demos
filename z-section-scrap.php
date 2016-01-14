
<!-- 
row-1column
	headline
	paragraph
row-1columnimage
	headline
	paragraph
	image
row-1columnvideo
	headline
	paragraph
	video url (embed code)
row-2columnwide
	headline
	paragraph
	image
row-3column
	headline
	paragraph (optional)
	paneliconalign (left or top)
	panel1 heading
	panel1 icon
	panel1 paragraph
	panel2 heading
	panel2 icon
	panel2 paragraph
	...
row-price
	price amount
	buy link
	demo link
	support link
-->

1) rowtype ()
2) rowheadline
3) rowparagraph
4) rowimage (size depends on the row-type selected)
5) rowvideo url (embed code)
6) rowbuttontext url 
7) rowbuttonurl text
8) PANELS (internal repeater)
9) rowbgimage
10) rowbgcolor




if panels are used:
	panel1 heading
	panel1 icon
	panel1 paragraph

row-price
	price amount
	buy link
	demo link
	support link
	documentation link


<!--

<div id="blog-fullwidth">
	<?php gabfire_postheader(); ?>

	<section class="container pagewrap">
		<div class="row">
			<div class="col-md-12">
			
				<div class="gabfire_breadcrumb">
					<?php gabfire_breadcrumb(); ?>
				</div>
			
				<?php get_template_part('loop','single'); ?>
				
			</div>

		</div>	
	</section>
	
</div>
-->







			<div id="w">
			    <div class="container">
					<div class="row centered">
						<h4>THE WORLD'S BEST LANDING PAGES</h4>
						<h1>LANDING SUMO</h1>
						<p><hr class="aligncenter"></p>

						<p><a class="btn btn-lg btn-orange btn-space" href="/categories">Find Your Software</a></p>
						
					</div><!--/row -->
			    </div><!-- /.container -->

				<div class="container">
					<div class="row mb">
						<h1 class="centered">A minimal & elegant way to showcase your app.</h1>
						
						<div class="col-md-4 mt">
							<h3>WordPress Plugins</h3>
							<p>Dozens of amazing WordPress plugins supported by humans.</p>
						</div><!--/col-md-4 -->
		
						<div class="col-md-4 mt">
							<h3>WordPress Customization</h3>
							<p>From small tweaks to enterprise level websites, we have the expertise.</p>
						</div><!--/col-md-4 -->
		
						<div class="col-md-4 mt">
							<h3>WordPress Services</h3>
							<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Hundreds of clients have relied on us to build their sites.</p>
						</div><!--/col-md-4 -->
					</div><!--/row -->
				</div><!--/container -->
			</div><!--/W Header -->


<!-- BUTTONS 4 -->
<div class="container">

	<div class="row demo-row">
		<div class="col-xs-3">
			<a class="btn btn-block btn-lg btn-primary" href="#fakelink">Primary Button</a>
		</div>
		<div class="col-xs-3">
			<a class="btn btn-block btn-lg btn-warning" href="#fakelink">Warning Button</a>
		</div>
		<div class="col-xs-3">
			<a class="btn btn-block btn-lg btn-default" href="#fakelink">Default Button</a>
		</div>
		<div class="col-xs-3">
			<a class="btn btn-block btn-lg btn-danger" href="#fakelink">Danger Button</a>
		</div>
	</div>

 </div>
 
 
 
 
 
 
   <!-- 2 columns - left -->

	<div id="row2left" class="bgwhite">
		<div class="row nopadding">
			<div class="col-md-5 col-md-offset-1 mt">
				<h4>Handsome Analytics</h4>
				<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
				<p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
				<p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
				<p class="mt"><button class="btn btn-info btn-theme">Sign Up Now | 14 Days Free</button></p>
			</div>
			
			<div class="col-md-6 pull-right of">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/new//shot01.png" class="img-responsive alignright" alt="" data-effect="slide-right">
			</div>
		</div>
	</div>
	<!--/row2left -->


 
 	<!-- 2 columns - right -->
	<div id="row2right" class="bgblue">
		<div class="row nopadding">
			<div class="col-md-6 pull-left of">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/new/shot02.png" class="img-responsive alignleft" alt="" data-effect="slide-left">
			</div>
			<div class="col-md-5 mt">
				<h4>Multiple Templates Options</h4>
				<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
				<p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
				<p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
				<p class="mt"><button class="btn btn-white btn-theme">Sign Up Now | 14 Days Free</button></p>
			</div>
	
		</div>
	</div>	<!--/row2right -->
	
	
	<!-- 2 columns - halfhalf ********** -->
  	<div id="halfhalf">
  		<div class="row nopadding">
  			<div class="col-md-6 bg01" style="background: url('<?php echo get_stylesheet_directory_uri(); ?>/images/new/bg01.jpg') no-repeat center center;background-size: cover;">
	  			<!-- <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/new/bg01.jpg" class="img-responsive alignleft" alt="" > -->
  			</div>
  			
  			<div class="col-md-6 bg-yellow bg-color centered">
  				<h2>There are many variations of passages of <b>Lorem Ipsum available</b>, but the majority have suffered alteration in some form, by injected humour.</h2>
  			</div>
  		</div>
  	</div>   <!--/halfhalf -->
	



<!-- 3 columns - top icon -->
<div class="rowprod bg-white">
	<div class="container">
		<div class="row centered">
			<h3>HOW IT WORKS - 3 Columns Top</h3>
			<hr class="aligncenter mb">
		
			<div class="col-md-4">
				<div class="circle-icon">
					<div class="icon ion-settings"></div>
				</div>
				<h4 class="black">DESIGN</h4>
				<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
			</div>
			<div class="col-md-4">
				<div class="circle-icon">
					<div class="icon ion-beaker"></div>
				</div>
				<h4 class="black">DEVELOP</h4>
				<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
			</div>
			<div class="col-md-4">
				<div class="circle-icon">
					<div class="icon ion-jet"></div>
				</div>
				<h4 class="black">LAUNCH</h4>
				<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
			</div>
		
		</div>	<!--/row centered-->
	</div>	<!--/container -->
</div> <!-- /row3col -->



  	<!-- ********** THIRD PART - COLOR PARTS ********** -->
	<div class="rowprod nopadding bg-white">
  		<div class="row nopadding centered">

	  		<div class="col-md-4 bg-jelly squares">
	  			<h3>Cloud Storage</h3>
	  			<i class="ion-ios7-cloud-download-outline"></i>
	  			<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.</p>
	  		</div><!--/col-md-4 -->
	  		
	  		<div class="col-md-4 bg-teal squares">
	  			<h3>Share Documents</h3>
	  			<i class="ion-ios7-copy-outline"></i>
	  			<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.</p>
	  		</div><!--/col-md-4 -->
	  		
	  		<div class="col-md-4 bg-green squares">
	  			<h3>Tailored Alerts</h3>
	  			<i class="ion-ios7-bell-outline"></i>
	  			<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.</p>
	  		</div><!--/col-md-4 -->
	  		
  		</div><!--/row -->
  	</div><!--/rowprod -->
  	
  	
  	
  
  <!-- 3 columns - left icon -->
<div class="rowprod">
  <div class="container ptb">
    <div class="row">
      <h3 class="centered mb">IMPORTANT FEATURES - 3 Columns Left</h3>
      <!-- Feature Item -->
      <div class="col-md-1 centered">
        <div class="circle-icon-sm">
          <div class="icon-sm ion-grid mt"></div>
        </div>
      </div>
      <div class="col-md-3">
        <h4 class="black">Bootstrap Grid</h4>
        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
      </div>
      <!--/End Feature Item -->
      <!-- Feature Item -->
      <div class="col-md-1 centered">
        <div class="circle-icon-sm">
          <div class="icon-sm ion-ipad mt"></div>
        </div>
      </div>
      <div class="col-md-3">
        <h4 class="black">Responsive Design</h4>
        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
      </div>
      <!--/End Feature Item -->
      <!-- Feature Item -->
      <div class="col-md-1 centered">
        <div class="circle-icon-sm">
          <div class="icon-sm ion-eye mt"></div>
        </div>
      </div>
      <div class="col-md-3">
        <h4 class="black">Retina Ready</h4>
        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
      </div>
      <!--/End Feature Item -->
    </div><!--/ROW -->
    <div class="row mt">
      <!-- Feature Item -->
      <div class="col-md-1 centered">
        <div class="circle-icon-sm">
          <div class="icon-sm ion-document-text mt"></div>
        </div>
      </div>
      <div class="col-md-3">
        <h4 class="black">Detailed Documentation</h4>
        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
      </div>
      <!--/End Feature Item -->
      <!-- Feature Item -->
      <div class="col-md-1 centered">
        <div class="circle-icon-sm">
          <div class="icon-sm ion-help-buoy mt"></div>
        </div>
      </div>
      <div class="col-md-3">
        <h4 class="black">Free Support</h4>
        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
      </div>
      <!--/End Feature Item -->
      <!-- Feature Item -->
      <div class="col-md-1 centered">
        <div class="circle-icon-sm">
          <div class="icon-sm ion-cash mt"></div>
        </div>
      </div>
      <div class="col-md-3">
        <h4 class="black">Affordable Price</h4>
        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
      </div>
      <!--/End Feature Item -->
    </div>
    <div class="row mt">
      <!-- Feature Item -->
      <div class="col-md-1 centered">
        <div class="circle-icon-sm">
          <div class="icon-sm ion-trophy mt"></div>
        </div>
      </div>
      <div class="col-md-3">
        <h4 class="black">Award Design</h4>
        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
      </div>
      <!--/End Feature Item -->
      <!-- Feature Item -->
      <div class="col-md-1 centered">
        <div class="circle-icon-sm">
          <div class="icon-sm ion-cube mt"></div>
        </div>
      </div>
      <div class="col-md-3">
        <h4 class="black">Crafted Bundle</h4>
        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
      </div>
      <!--/End Feature Item -->
      <!-- Feature Item -->
      <div class="col-md-1 centered">
        <div class="circle-icon-sm">
          <div class="icon-sm ion-heart mt"></div>
        </div>
      </div>
      <div class="col-md-3">
        <h4 class="black">Designed With Love</h4>
        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
      </div>
      <!--/End Feature Item -->
    </div><!--/row -->
  </div><!--/container -->
</div> <!-- /rowprod -->



  
  
  
  
  	
  	



<!-- Row Price -->

  <div id="rowprice">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-md-offset-3 mb">

          <div class="price-table">
            <div class="row">
              <div class="col-md-6">
                <div class="price-icon">
                  <h5 class="tag">Per Month</h5>
                  <h1 class="tag">$7.99</h1>
                </div>
              </div><!--/col-md-6-->
              <div class="col-md-6 centered">
                <h4><black>READY FOR US</black></h4>
                <p>
                  15 Days Free Trial<br/>
                  No Credit Card Needed<br/>
                </p>
                <p><button href="#" class="btn btn-lg btn-success">TRY US NOW</button></p>
              </div><!--/col-md-6-->
            </div><!--/row -->
          </div><!--/price-table-->

        </div><!--/col-md-6-->
      </div><!--/row -->
    </div><!--/container -->
  </div><!--/rowprice -->


  	











<!--
					<?php $rowbgimage = get_sub_field('row_bg_image'); ?>
					<?php if ($rowbgimage != '') {
							$rowbgimageset = 1
						} else {
							$rowbgimageset = 0
						}
					?>	
-->
		
<!--
		<?php if( get_sub_field('row_bg_image') ):
			$rowbgimage = the_sub_field('row_bg_image');
		endif; ?>
		<?php if( get_sub_field('row_bg_color') ):
			$rowbgcolor = the_sub_field('row_bg_color');
		endif; ?>
-->





<?php
/*
			$rowbgimage = get_sub_field('row_bg_image');
			$rowbgcolor = get_sub_field('row_bg_color');
*/
?>
					
		<?php //var_dump($rowtype); ?>

	