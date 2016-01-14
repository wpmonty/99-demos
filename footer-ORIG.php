	<?php if (of_get_option('of_contact') == 0) { ?>
		<section id="contact" data-stellar-background-ratio="<?php echo of_get_option('of_parallax1'); ?>">
			<div class="add-pattern">
				<div class="container">

					<div class="row section-title wow animated bounceInLeft">
						<div class="col-md-12">
							
							<?php if ( of_get_option('of_contact_firstline') <> "" ) { ?>
								<h2 class="section-title"><?php echo of_get_option('of_contact_firstline'); ?></h2>
							<?php } ?>
							
							<?php if ( of_get_option('of_contact_secondline') <> "" ) { ?>
								<h4 class="section-subtitle"><?php echo of_get_option('of_contact_secondline'); ?></h4>	
							<?php } ?>						
							
						</div><!-- .col-md-12 -->
					</div>	<!-- .row .section-title -->						
				
					<div class="row wow animated bounceInRight">
						<div class="col-md-3 col-sm-4">
							<div class="companyaddress">
								<div itemscope itemtype="http://schema.org/LocalBusiness">
								
									<?php if ( of_get_option('of_company') <> "" ) { ?>
										<p class="adr">
											<strong itemprop="name"><?php echo of_get_option('of_company'); ?></strong>
											
											<span itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
											<?php if ( of_get_option('of_address1') <> "" ) { ?>
												<span class="street-address" itemprop="streetAddress"><?php echo of_get_option('of_address1'); ?></span><br />
											<?php } ?>
											
											<?php if ( of_get_option('of_address2') <> "" ) { ?>
												<span class="region" itemprop="addressRegion"><?php echo of_get_option('of_address2'); ?></span>, <span class="postal-code"><?php echo of_get_option('of_address3'); ?></span> - <span class="country-name"><?php echo of_get_option('of_address4'); ?></span>
											<?php } ?>
										</p>
									<?php } ?>
									
									<?php if ( of_get_option('of_emailaddr') <> "" ) { ?>
									<p><strong><?php _e('Email','gabfire'); ?></strong><span class="email" itemprop="email"><?php echo of_get_option('of_emailaddr'); ?></span></p>
									<?php } ?>
									
									<?php if ( of_get_option('of_phonenr') <> "" ) { ?>
									<p><strong><?php _e('Telephone','gabfire'); ?></strong><span class="tel" itemprop="telephone"><?php echo of_get_option('of_phonenr'); ?></span></p>
									<?php } ?>
								</div>
								
								<p class="social-btns">
									<?php if ( of_get_option('of_cn_twitter') <> "" ) { ?>
									<a href="<?php echo of_get_option('of_cn_twitter'); ?>" class="btn btn-sm btn-social-icon btn-twitter">
										<i class="fa fa-twitter"></i>
									</a>
									<?php } ?>
									
									<?php if ( of_get_option('of_cn_facebook') <> "" ) { ?>
									<a href="<?php echo of_get_option('of_cn_facebook'); ?>" class="btn btn-sm btn-social-icon btn-facebook">
										<i class="fa fa-facebook"></i>
									</a>
									<?php } ?>
									
									<?php if ( of_get_option('of_cn_gplus') <> "" ) { ?>
									<a href="<?php echo of_get_option('of_cn_gplus'); ?>" class="btn btn-sm btn-social-icon btn-google-plus">
										<i class="fa fa-google-plus"></i>
									</a>
									<?php } ?>
									
									<?php if ( of_get_option('of_cn_linkedin') <> "" ) { ?>										
									<a href="<?php echo of_get_option('of_cn_linkedin'); ?>" class="btn btn-sm btn-social-icon btn-linkedin">
										<i class="fa fa-linkedin"></i>
									</a>
									<?php } ?>
								</p>
							</div>
						</div>
						<div class="col-md-9 col-sm-8">
							<div class="row">
								<div class="col-sm-12">
									<div id="contactform">
										<form action="<?php echo esc_url(home_url('/')); ?>" method="post">
											<div class="col-md-6 col-sm-5"> <!-- 6 column grid left form -->
												<div class="form-group"> <!-- Your name input -->
													<input type="text" name="form_name" id="name" placeholder="<?php _e('Your Name','gabfire'); ?>" class="form-control">
												</div> 
												
												<div class="form-group"> <!-- Your email input -->
													<input type="email" name="form_email" id="email" placeholder="<?php _e('Your Email','gabfire'); ?>" class="form-control">
												</div>
												
												<div class="form-group"> <!-- Your phone no. input -->
													<input type="tel" name="form_phone" id="phone" placeholder="<?php _e('Your Phone','gabfire'); ?>" class="form-control">
												</div>
											</div> <!-- End 6 column grid left form -->
											
											<div class="col-md-6 col-sm-7"> <!-- 6 column grid right form-->
												<div class="form-group"> <!-- Your message input -->
													<textarea name="form_message" id="message" placeholder="<?php _e('Your Message','gabfire'); ?>" class="form-control"></textarea>
												</div>
											</div> <!-- End 6 column grid right form-->
											
											<div class="clearfix"></div>
													
											<div class="col-md-12 text-center">
												<div id="success"></div>
												<button class="btn btn-custom-darken" name="submit" type="submit"><?php _e('Send Message','gabfire'); ?></button> <!-- Send button -->
											</div>
										</form>
									</div><!-- #contactform -->
								</div>
							</div>
						</div>
					</div><!-- row -->

				</div><!-- container -->
			</div><!-- add-pattern -->
		</section><!-- contact -->
	<?php } ?>

    <!-- Footer -->
    <footer>
        <div class="container footer-widgets">
            <div class="row">
						
				<div class="col-md-4 col-sm-4">
					<?php gabfire_dynamic_sidebar('footer-1'); ?>
				</div>

				<div class="col-md-4 col-sm-4">
					<?php gabfire_dynamic_sidebar('footer-2'); ?>
				</div>

				<div class="col-md-4 col-sm-4">
					<?php gabfire_dynamic_sidebar('footer-3'); ?>	
				</div>		
				
			</div>
		</div>

		<div class="footer_meta">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-sm-6 footer-left-side">
						<?php /* Replace default text if option is set */
						if( of_get_option('of_footer1') == 1){
							echo of_get_option('of_footer1_text');
						} else { ?>
							<a href="#top" title="<?php bloginfo('name'); ?>"><strong>&uarr;</strong> <?php bloginfo('name'); ?></a>
						<?php } ?>
					</div><!-- #site-info -->
								
					<div class="col-md-6 col-sm-6 footer-right-side">
						<?php /* Replace default text if option is set */
						if( of_get_option('of_footer2') == 1){ 
							echo of_get_option('of_footer2_text');
						} else {
							wp_loginout(); 
							if ( is_user_logged_in() ) { 
								echo '-'; ?>
								<a href="<?php echo home_url('/'); ?>wp-admin/edit.php">Posts</a> - 
								<a href="<?php echo home_url('/'); ?>wp-admin/post-new.php">Add New</a>
							<?php } ?> - 			
						<?php } ?>
						
						<a href="http://wordpress.org/" title="<?php esc_attr_e('Semantic Personal Publishing Platform', 'gabfire'); ?>"><?php _e('Powered by WordPress', 'gabfire'); ?></a> - 
						Designed by <a href="http://www.gabfirethemes.com/" title="Premium WordPress Themes">Gabfire Themes</a> &nbsp;
						<?php wp_footer(); ?>
					</div> <!-- #footer-right-side -->
				</div>
			</div>
		</div>
	   
    </footer>
    <!-- /Footer -->

</body>

</html>