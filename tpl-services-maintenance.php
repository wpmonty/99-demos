<?php
	/*
		Template Name: Services Maintenance
	*/
?>

<?php get_header(); ?>

	<section id="pricing-section" class="container pricing-tables attached">
		<div class="row section-title pt20">
			<div class="col-md-12">

				<?php if ( of_get_option('of_pricing_firstline') <> "" ) { ?>
					<h2 class="section-title"><?php echo of_get_option('of_pricing_firstline'); ?></h2>
				<?php } ?>

				<?php if ( of_get_option('of_pricing_secondline') <> "" ) { ?>
					<h4 class="section-subtitle"><?php echo of_get_option('of_pricing_secondline'); ?></h4>
				<?php } ?>

			</div><!-- .col-md-12 -->
		</div>	<!-- .row .section-title -->


		<div class="col-md-10 col-md-offset-1">

			<?php
				$pricing_col_count = 4;
                $pricing_option = 1;
				for ($i=2; $i <= $pricing_col_count; $i++) {

					$class = 'col-sm-4 col-md-4';
					$classplan = 'plan';
					$planduration = 'per month';
					$classbtn = 'btn btn-blue';

					if ($i == 2) {
						$id = 'web-robot';
						$classplan .= ' first';
					}
					if ($i == of_get_option('of_pricing_popular')) {
						$id = 'robot-army';
						$classplan .= ' recommended';
						$classbtn = 'btn btn-orange';
					}
					if ($i == $pricing_col_count) {
						$id = 'robot-fleet';
						$classplan .= ' last';
					}
				?>
					<div class="<?php echo $class ?>">
						<div class="<?php echo $classplan ?>">

						  <div class="head">
						    <h2><?php echo of_get_option('of_pricing_name_'.$i); ?></h2>
						  </div>

						  <div class="price">
						    <h3><span class="symbol">$</span><?php echo of_get_option('of_pricing_price_'.$i); ?></h3>
						    <h4><?php echo $planduration ?></h4>
						  </div>

						  <a class="<?php echo $classbtn ?>" href="http://99robots.com/checkout?edd_action=add_to_cart&download_id=9789&edd_options[price_id]=<?php echo $pricing_option; ?>" >Get Started</a>

						  <button id="<?php /* echo $id; */ ?>" type="button" class="hidden <?php /* echo $classbtn */ ?>"><?php /* echo of_get_option('of_pricing_btn_'.$i); */ ?></button>

						  <ul class="item-list">
						       <?php echo of_get_option('of_features_'.$i); ?>
						  </ul>

						</div>
		        	</div>
				<?php
    				++$pricing_option;
				} ?>
		</div>
	</section>

	<?php require_once( get_stylesheet_directory() . '/z-section-testimonials.php' ); ?>

	<section id="maintenance-feats" class="bg-dkwhite">
		<div class="container pt pb">
			<div class="row">
				<div class="col-md-12 centered section-title">
					<h4 class="pb nomargin">Features included in every plan</h4>
				</div>

				<hr class="aligncenter" />

				<div class="col-md-4 col-xs-6 p50 pb20">
					<h4>Secure Website Hardening</h4>
					<p>99 Robots protects your site from brute-force attacks and malware or cleans up the mess.</p>
				</div>

				<div class="col-md-4 col-xs-6 p50 pb20">
					<h4>24/7 Support</h4>
					<p>Never lose contact with round-the-clock expert email support.</p>
				</div>

				<div class="col-md-4 col-xs-6 p50 pb20">
					<h4>Website Speed Enhancement</h4>
					<p>Nobody likes a slow website. 99 Robot's can speed up your site by 10x in some cases.</p>
				</div>

				<div class="col-md-4 col-xs-6 p50 pb20">
					<h4>Daily Cloud Backups</h4>
					<p>Tired of losing all your data? 99 Robots takes backups of your site every night and stores them on a secure cloud server.</p>
				</div>

				<div class="col-md-4 col-xs-6 p50 pb20">
					<h4>Aesthetic Changes</h4>
					<p>Request WordPress website updates, small tweaks, and other minor modifications to your site.</p>
				</div>

				<div class="col-md-4 col-xs-6 p50 pb20">
					<h4>100% U.S. Based</h4>
					<p>Never be lost in translation when you message our U.S. based support team.</p>
				</div>

				<div class="col-md-12 centered">
					<a href="#" class="btn btn-orange btn-space">Get Started</a>
				</div>

			</div>
		</div>
	</section>




	<section id="pricing-faq" class="container pt pb" >
		<div class="row">
			<div class="col-md-12 centered section-title">
				<h4 class="pb nomargin">F.A.Q.</h4>
			</div>
			<div class="col-md-4 col-sm-6 col-xs-12">

				<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

					<div class="panel panel-default">
						<div class="panel-heading" role="tab" id="headingOne">
							<h4 class="panel-title">
						    	<a data-toggle="collapse" data-parent="#accordion" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
								* What does unlimited small jobs include?
						    	</a>
						  	</h4>
						</div>
						<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
							<div class="panel-body">
							Unlimited small jobs are any website tasks that take a total time of 30 minutes or less. These jobs are limited to one WordPress website.
							</div>
						</div>
					</div>

					<div class="panel panel-default">
						<div class="panel-heading" role="tab" id="headingTwo">
							<h4 class="panel-title">
							    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
							      How can you offer unlimited small jobs?
							    </a>
							</h4>
						</div>
						<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
							<div class="panel-body">
						    By cutting up jobs to 30 minute tasks we have streamlined all of our processes, so our team of full time developers can take care of all your needs.
							</div>
						</div>
					</div>

					<div class="panel panel-default">
						<div class="panel-heading" role="tab" id="headingThree">
							<h4 class="panel-title">
								<a class="collapsed" data-toggle="collapse" data-parent="#accordion" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
								How long does it take to complete a task?
						    	</a>
							</h4>
						</div>
						<div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
							<div class="panel-body">
						    We try to clear our to-do list as soon as possible. Most jobs can be completed within 48 hours, depending on when the task is submitted.
							</div>
						</div>
					</div>

					<div class="panel panel-default">
						<div class="panel-heading" role="tab" id="headingFour">
							<h4 class="panel-title">
								<a class="collapsed" data-toggle="collapse" data-parent="#accordion" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
								What types of jobs will you do?
						    	</a>
							</h4>
						</div>
						<div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
							<div class="panel-body">
						    We can handle minor style changes, plugin installations, text formatting, WordPress troubleshooting, and small theme modifications. We will never directly modify your theme files – all changes to theme files will be overwritten if the theme is updated. We also cannot troubleshoot issues with DNS, hosting, emails, or any other 3rd party platforms.
							</div>
						</div>
					</div>

				</div> <!-- /panel-group -->

			</div><!-- /col -->

			<div class="col-md-4 col-sm-6 col-xs-12">

				<div class="panel-group" id="accordion2" role="tablist" aria-multiselectable="true">

					<div class="panel panel-default">
						<div class="panel-heading" role="tab" id="headingFive">
							<h4 class="panel-title">
						    	<a class="collapsed" data-toggle="collapse" data-parent="#accordion2" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
								Is there a minimum monthly commitment?
						    	</a>
						  	</h4>
						</div>
						<div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
							<div class="panel-body">
							Absolutely not. We believe if you are unhappy with the service that you should be able to cancel at any time. No contract, no minimums, just month to month service.
							</div>
						</div>
					</div>

					<div class="panel panel-default">
						<div class="panel-heading" role="tab" id="headingSix">
							<h4 class="panel-title">
							    <a class="collapsed" data-toggle="collapse" data-parent="#accordion2" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
							      What does 24/7 email support include?
							    </a>
							</h4>
						</div>
						<div id="collapseSix" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSix">
							<div class="panel-body">
						    We monitor our support system throughout the week, but reserve the weekend for only critically urgent tasks. If you submit minor web changes during the weekend, we will complete them starting Monday.
							</div>
						</div>
					</div>

					<div class="panel panel-default">
						<div class="panel-heading" role="tab" id="headingSeven">
							<h4 class="panel-title">
								<a class="collapsed" data-toggle="collapse" data-parent="#accordion2" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
								Do you offer refunds?
						    	</a>
							</h4>
						</div>
						<div id="collapseSeven" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSeven">
							<div class="panel-body">
						    If we can’t solve your problems, we’ll give you your money back. It’s as simple as that.
							</div>
						</div>
					</div>

				</div> <!-- /panel-group -->

			</div><!-- /col -->

			<div class="col-md-4 col-sm-6 col-xs-12">

				<div class="panel-group" id="accordion3" role="tablist" aria-multiselectable="true">

					<div class="panel panel-default">
						<div class="panel-heading" role="tab" id="headingEight">
							<h4 class="panel-title">
						    	<a class="collapsed" data-toggle="collapse" data-parent="#accordion3" data-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
								What is technology guidance?
						    	</a>
						  	</h4>
						</div>
						<div id="collapseEight" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingEight">
							<div class="panel-body">
							Need help choosing a new accounting software, a new plugin, or which email platform to use? Contact us and we’ll help you pick the best technology to solve your problems.
							</div>
						</div>
					</div>

					<div class="panel panel-default">
						<div class="panel-heading" role="tab" id="headingNine">
							<h4 class="panel-title">
							    <a class="collapsed" data-toggle="collapse" data-parent="#accordion3" data-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
							      Do you support more than one website?
							    </a>
							</h4>
						</div>
						<div id="collapseNine" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingNine">
							<div class="panel-body">
						    Yes we do. Standard plans include only one site, but you can purchase a new subscription for each additional website.
							</div>
						</div>
					</div>

					<div class="panel panel-default">
						<div class="panel-heading" role="tab" id="headingTen">
							<h4 class="panel-title">
								<a class="collapsed" data-toggle="collapse" data-parent="#accordion3" data-target="#collapseTen" aria-expanded="false" aria-controls="collapseTen">
								Do you build new websites?
						    	</a>
							</h4>
						</div>
						<div id="collapseTen" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTen">
							<div class="panel-body">
						    Yes we do. Feel free to contact us with the details of your project.
							</div>
						</div>
					</div>

				</div> <!-- /panel-group -->

			</div><!-- /col -->

		</div>
	</section>



<?php get_footer(); ?>