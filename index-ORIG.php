<?php get_header(); ?>

	 <!-- Intro Header -->
	 <?php
	 $divclass = 'topslider';
	 if(of_get_option('of_introtype') == 'bgslider') {
		$divclass .= ' nobg';
	}
	?>
	<header id="top" class="<?php echo $divclass; ?>" data-stellar-background-ratio="<?php echo of_get_option('of_parallax1'); ?>">
	
		<?php if(of_get_option('of_introtype') == 'youtube') { ?>
						
			<?php $videoid = gabfire_youtube_id(of_get_option('of_youtubevideo')); ?>
			
			<iframe class="featured_video" id="player" src="//www.youtube.com/embed/<?php echo $videoid; ?>?wmode=transparent&amp;rel=0&amp;version=3&amp;enablejsapi=1&controls=0&amp;html5=1&amp;autoplay=1&amp;loop=1&amp;vq=hd720&amp;autohide=1&showinfo=0&amp;playlist=<?php echo $videoid; ?>" frameborder="0"></iframe>
			
			<div class="intro-controls youtube-controls">
				<a href="javascript: void(0)" onclick="player.playVideo(); return false" class="playpause hidden"><i class="fa fa-play"></i></a>
				<a href="javascript: void(0)" onclick="player.pauseVideo(); return false" class="playpause"><i class="fa fa-pause"></i></a>
				<a href="javascript: void(0)" onclick="player.mute(); return false" class="volume-switch"><i class="fa fa-volume-off"></i></a>
				<a href="javascript: void(0)" onclick="player.unMute(); return false" class="volume-switch hidden"><i class="fa fa-volume-up"></i></a>
				<a href="javascript: void(0)" class="clear-screen"><i class="fa fa-times"></i></a>
			</div>
			
		<?php } elseif (of_get_option('of_introtype') == 'vimeo') { ?>		
		
			<?php $videoid = gabfire_vimeo_id(of_get_option('of_vimeovideo')); ?>
			
			<iframe id="vimeo_video" class="featured_video" id="player" src="//player.vimeo.com/video/<?php echo $videoid; ?>?portrait=0&amp;autoplay=1&amp;badge=0&amp;byline=0&amp;loop=1&amp;portrait=0&amp;title=0&amp;api=1" frameborder="0"></iframe>

			<div class="intro-controls vimeo-controls">
				<a href="javascript: void(0)" id="vimeo-play" class="playpause hidden"><i class="fa fa-play"></i></a>
				<a href="javascript: void(0)" id="vimeo-pause" class="playpause"><i class="fa fa-pause"></i></a>
				<a href="javascript: void(0)" id="vimeo-mute" class="volume-switch"><i class="fa fa-volume-off"></i></a>
				<a href="javascript: void(0)" id="vimeo-unmute" class="volume-switch hidden"><i class="fa fa-volume-up"></i></a>
				<a href="javascript: void(0)" class="clear-screen"><i class="fa fa-times"></i></a>
			</div>	
			
		<?php } elseif(of_get_option('of_introtype') == 'bgslider') { ?>

			<div class="carousel-owlfeatured">	
				<?php for ($i = 1; $i <= of_get_option('of_bgslidernr'); $i++) { ?>	
					<div class="carousel_item" style="background-image: url('<?php echo of_get_option('of_introbg'.$i); ?>')"></div>
				<?php
				} ?>
			</div>
			
			<div class="intro-controls">
				<a href="javascript: void(0)" class="carousel-fea-next"><i class="fa fa-angle-double-right"></i></a>
				<a href="javascript: void(0)" class="carousel-fea-prev"><i class="fa fa-angle-double-left"></i></a>
				<a href="javascript: void(0)" class="clear-screen"><i class="fa fa-times"></i></a>
			</div>	
		
		<?php } ?>
			
			<div class="topslider-body" style="position:absolute;z-index:10">
				<div class="featured-text">
					<div class="featured-text-inner animated zoomInLeft <?php if (of_get_option('of_introtype') == 'callout') { echo 'calloutfea'; } ?>">
						<?php if ( of_get_option('of_intro_firstline') <> "" ) { ?>
							<h1><?php echo of_get_option('of_intro_firstline'); ?></h1>
						<?php } ?>
						
						
						
						<?php if ( of_get_option('of_intro_secondline') <> "" ) { ?>
							<h2><?php echo of_get_option('of_intro_secondline'); ?></h2>
						<?php } ?>
					</div>
					<a href="#about" class="circleicon wow animated bounceInUp" data-wow-duration="3s"><i class="fa fa-angle-double-down"></i></a>
					
				</div>
			</div>
	</header>

    <!-- About -->
    <section id="about">
		<?php if (of_get_option('of_about') == 0) { ?>
			<div class="container about-firstrow wow animated fadeInDown" data-wow-duration="0.5s">
				
				<div class="row section-title">
					<div class="col-md-12">
						
						<?php if ( of_get_option('of_about_firstline') <> "" ) { ?>
							<h2 class="section-title"><?php echo of_get_option('of_about_firstline'); ?></h2>
						<?php } ?>
						
						<?php if ( of_get_option('of_about_secondline') <> "" ) { ?>
							<h4 class="section-subtitle"><?php echo of_get_option('of_about_secondline'); ?></h4>	
						<?php } ?>						
						
					</div>
				</div>

				<div class="row">					
					<div class="col-md-5 col-sm-6 col-xs-12">
						<img class="aboutimg" src="<?php echo of_get_option('of_aboutimg'); ?>" alt="" />
					</div>
					
					<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-1 introdutive-text wow animated fadeInLeft">
					
						<hr class="gabfire_spacer" />
						<div class="clearfix"></div>
						<h2 class="abouttext"><?php echo of_get_option('of_about_thirdline'); ?></h2>
						<p class="lead"><?php echo of_get_option('of_about_paragraph'); ?></p>
						
						<?php if (of_get_option('of_its_a_video') == 1) {
							$root =  wp_oembed_get( of_get_option('of_about_btnlink'), array( 'autoplay' => 1, 'rel' => 0, 'hd' => 1 ) ); 
							preg_match('/src="([^"]+)"/', $root, $match);
							$link = $match[1] .'?title=0&amp;hd=1&amp;rel=0&amp;autoplay=1';
						} else {
							$link = of_get_option('of_about_btnlink');
						}
						?>
				
						<?php if ( of_get_option('of_about_btntext') <> "" ) { ?>
							<a href="<?php echo $link; ?>" class="btn btn-default video_colorbox"><?php echo of_get_option('of_about_btntext'); ?> <i class="fa fa-angle-double-right"></i></a>
						<?php } ?>
						
					</div>					
				</div>
				
			</div>
			<!-- /.container -->
		<?php } ?>
			
		<?php if (of_get_option('of_services') == 0) { ?>
			<div id="services" class="container-fluid about-secondrow">
				<div class="container">
					<div class="row">
						<div class="col-md-12">

							<div class="carousel-one">
								<?php
								$service_count = of_get_option('of_services_count');
								
								for ($i=1; $i<=$service_count;$i++) { 
									$class = 'item wow animated';
										
									if ($i == 1) { 
										$class .= ' fadeInLeft';
									} elseif ($i == 2) {
										$class .= ' fadeInUp';
									} elseif ($i == 3) {
										$class .= ' fadeInRight';
									}
								?>
									<div class="<?php echo $class; ?>">
										<div class="item-iconwrapper color<?php echo $i; ?>">
											<i class="fa <?php echo of_get_option('of_serviceicon_'.$i); ?> fa-4x"></i>
										</div>										
											
										<h2><?php echo of_get_option('of_servicetitle_'.$i); ?></h2>
										<p><?php echo of_get_option('of_servicetext_'.$i); ?></p>
									</div>
								<?php
								} ?>
							</div>			

							<?php if (intval(of_get_option('of_services_count')) > 3 ) { ?>
								<div class="carousel-one-controls">
									<span class="carousel-one-prev"><i class="fa fa-chevron-circle-left"></i></span>
									<span class="carousel-one-next"><i class="fa fa-chevron-circle-right"></i></span>
								</div>	
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
	</section>	
	
	<?php if (of_get_option('of_skills') == 0) { ?>
		<section id="skillbar">
			<div class="container wow animated fadeInDown">
			
				<div class="row section-title">
					<div class="col-md-12">
						
						<?php if ( of_get_option('of_skill_firstline') <> "" ) { ?>
							<h2 class="section-title"><?php echo of_get_option('of_skill_firstline'); ?></h2>
						<?php } ?>
						
						<?php if ( of_get_option('of_skill_secondline') <> "" ) { ?>
							<h4 class="section-subtitle"><?php echo of_get_option('of_skill_secondline'); ?></h4>	
						<?php } ?>						
						
					</div>
				</div>				
				
			
				<div class="row">
					<div class="col-md-12">
						
						<?php					
						for ($i=1; $i<=of_get_option('of_skills_count'); $i++) { 
						?>							
							<div class="skillbar skill<?php echo $i; ?> clearfix" data-percent="<?php echo of_get_option('of_skill_percent_'.$i); ?>">
								<div class="skillbar-title"><span><?php echo of_get_option('of_skill_title_'.$i); ?></span></div>
								<div class="skillbar-bar skill-animate wow"></div>
								<div class="skill-bar-percent"><?php echo of_get_option('of_skill_percent_'.$i); ?></div>
							</div> <!-- End Skill Bar -->
						<?php
						} ?>
						
					</div>
				</div>
			</div>
		</section>
	<?php } ?>
	
	<?php if (of_get_option('of_plntext') == 0) { ?>
		<section id="watchabout" data-stellar-background-ratio="0.3">
			<div class="add-pattern">
				<div class="container">
					<div class="row">
						<div class="col-md-12 wow animated bounceInRight">
							
							
							<h4><?php echo of_get_option('of_largetext'); ?></h4>
							<p><?php echo of_get_option('of_smalltext'); ?></p>
							
							<?php if (of_get_option('of_its_also_video') == 1) {
								$link =  wp_oembed_get( of_get_option('of_text_btnlink'), array( 'autoplay' => 1, 'rel' => 0, 'hd' => 1 ) ); 
							} else {
								$link = of_get_option('of_text_btnlink');
							}
							?>
					
							<?php 
							if ( of_get_option('of_text_btntext') <> "" ) {
								if (of_get_option('of_its_also_video') == 1) {
									$root =  wp_oembed_get( of_get_option('of_about_btnlink'), array( 'autoplay' => 1, 'rel' => 0, 'hd' => 1 ) ); 
									preg_match('/src="([^"]+)"/', $root, $match);
									$link = $match[1] .'?title=0&amp;hd=1&amp;rel=0&amp;autoplay=1';
								} else {
									$link = of_get_option('of_about_btnlink');
								} ?>
								
								<a href="<?php echo $link; ?>" class="btn btn-danger video_colorbox"><?php echo of_get_option('of_text_btntext'); ?> <i class="fa fa-angle-double-right"></i></a>
								
							<?php } ?>
							
						</div>
					</div>
				</div>
			</div>
		</section>
	<?php } ?>
	
	<?php if (of_get_option('of_pricing') == 0) { ?>
		<section class="container-fluid" id="pricing-section">
			
			<div class="container wow animated fadeIn" data-wow-duration="2s">
			
				<div class="row section-title">
					<div class="col-md-12">
						
						<?php if ( of_get_option('of_pricing_firstline') <> "" ) { ?>
							<h2 class="section-title"><?php echo of_get_option('of_pricing_firstline'); ?></h2>
						<?php } ?>
						
						<?php if ( of_get_option('of_pricing_secondline') <> "" ) { ?>
							<h4 class="section-subtitle"><?php echo of_get_option('of_pricing_secondline'); ?></h4>	
						<?php } ?>						
						
					</div><!-- .col-md-12 -->
				</div>	<!-- .row .section-title -->		

				<div class="row">
					<div class="col-md-12">
					
						<div class="pricing-table">
							<?php
							$pricing_col_count = 4;
							
							for ($i=1; $i <= $pricing_col_count; $i++) { 
								$class = 'plan';
									
								if ($i == of_get_option('of_pricing_popular')) { 
									$class .= ' most-popular';
								}
							?>
								<div class="<?php echo $class; ?>">
									<h3><?php echo of_get_option('of_pricing_name_'.$i); ?><span><?php echo of_get_option('of_pricing_price_'.$i); ?></span></h3>

									<?php if ( of_get_option('of_pricing_btnlink_'.$i) <> "" ) { ?>
										<a href="<?php echo of_get_option('of_pricing_btnlink_'.$i); ?>" class="btn btn-primary btn-success pricing-signupbutton">
											<span class="glyphicon glyphicon-ok"></span>&nbsp;&nbsp;<?php echo of_get_option('of_pricing_btn_'.$i); ?>
										</a>  
									<?php } ?>
									
									<?php if ( of_get_option('of_features_'.$i) <> "" ) { ?>
										<ul>
											<?php echo of_get_option('of_features_'.$i); ?>	
										</ul>
									<?php } ?>								
								</div><!-- .plan -->
							<?php
							} ?>					
						
						</div><!-- .pricing-table -->
						
					</div><!-- .col-md-12 -->
				</div><!-- .row -->
			</div><!-- .container -->
		</section><!-- Pricing Section -->
	<?php } ?>

	<?php if (of_get_option('of_team') == 0) { ?>
		<section id="our-team" class="container-fluid" >
			<div class="container team-members">
				
				<div class="row section-title">
					<div class="col-md-12">

						<?php if ( of_get_option('of_team_firstline') <> "" ) { ?>
							<h2 class="section-title"><?php echo of_get_option('of_team_firstline'); ?></h2>
						<?php } ?>

						<?php if ( of_get_option('of_team_secondline') <> "" ) { ?>
							<h4 class="section-subtitle"><?php echo of_get_option('of_team_secondline'); ?></h4>	
						<?php } ?>

					</div><!-- .col-md-12 -->
				</div>	<!-- .row .section-title -->
				
				<div class="row">
					<div class="col-md-12">
						<div class="carousel-two">
						
							<?php
							$count = 1; 
							$args = array(
							  'post_type' => 'member',
							  'posts_per_page' => of_get_option('of_team_members'), 
							);		
							$gab_query = new WP_Query();$gab_query->query($args); 
							while ($gab_query->have_posts()) : $gab_query->the_post();	

							$position = get_post_meta($post->ID, 'position', true);
							$facebook = get_post_meta($post->ID, 'facebook', true);
							$twitter = get_post_meta($post->ID, 'twitter', true);
							$linkedin = get_post_meta($post->ID, 'linkedin', true);
							?>										
								<figure class="item wow animated fadeInLeft">
									<div class="item-wrapper">
										<?php 
										gabfire_media(array(
											'name' => 'figure', 
											'imgtag' => 1,
											'link' => 1,
											'enable_thumb' => 1,
											'enable_video' => 0, 
											'resize_type' => 'c', 
											'media_width' => 415, 
											'media_height' => 284, 
											'thumb_align' => 'alignnone',
											'enable_default' => 0
										)); 
										?>
										
										<div class="member-caption hidden-xs">
											<div class="member-blur"></div>
											<div class="member-caption-text">
												<p class="caption-firstrow"><?php echo $position; ?></p>
												<p class="profile-link"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf( esc_attr__( 'Permalink to %s', 'gabfire' ), the_title_attribute( 'echo=0' ) ); ?>" ><?php _e('Click here to See Full Profile', 'gabfire') ?></a></p>
												<p class="caption-secondrow">
													
													<?php if ($facebook != '') { ?>
													<a class="btn btn-sm btn-social-icon btn-facebook" href="<?php echo $facebook; ?>" target="_blank">
														<i class="fa fa-facebook"></i>
													</a>													
													<?php } ?>
													
													<?php if ($twitter != '') { ?>
													<a class="btn btn-sm btn-social-icon btn-twitter" href="<?php echo $twitter; ?>" target="_blank">
														<i class="fa fa-twitter"></i>
													</a>
													<?php } ?>
													
													<?php if ($linkedin != '') { ?>
													<a class="btn btn-sm btn-social-icon btn-linkedin" href="<?php echo $linkedin; ?>" target="_blank">
														<i class="fa fa-linkedin"></i>
													</a>													
													<?php } ?>
												</p>
											</div>
										</div>
										
									</div>
								  
									<p class="member-name"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
								</figure>
							<?php $count++; endwhile; wp_reset_query(); ?>							

						</div><!-- /carousel-two -->
						
						<?php if (intval(of_get_option('of_team_members')) > 3 ) { ?>
						<div class="carousel-two-controls">
							<span class="carousel-two-prev"><i class="fa fa-chevron-circle-left"></i></span>
							<span class="carousel-two-next"><i class="fa fa-chevron-circle-right"></i></span>
						</div>
						<?php } ?>
					</div><!-- /col-md-12 -->
				</div><!-- /row -->
			</div><!-- /team-members container -->
		</section>
	<?php } ?>

	<?php if (of_get_option('of_portfolio') == 0) { ?>	
		<section id="portfolio">
			<div class="container wow animated fadeIn" data-wow-duration="2s">
			
				<div class="row section-title">
					<div class="col-md-12">
						
						<?php if ( of_get_option('of_portfolio_firstline') <> "" ) { ?>
							<h2 class="section-title"><?php echo of_get_option('of_portfolio_firstline'); ?></h2>
						<?php } ?>
						
						<?php if ( of_get_option('of_portfolio_secondline') <> "" ) { ?>
							<h4 class="section-subtitle"><?php echo of_get_option('of_portfolio_secondline'); ?></h4>	
						<?php } ?>						
						
					</div>
				</div>
		
				<div class="row">
					<div class="col-md-12">
						<div id="filter">
							<?php
							$args = array(
								'orderby' => 'ID',
								'order' => 'ASC',
								'include' => of_get_option('of_portfolio_cats'),
								'taxonomy' => 'portfolio-category',
							);
							$count = 1;
							$categories = get_categories($args); 
							foreach ($categories as $cat) { ?>
						
							<?php if ($count == 1) { ?><li><a class="sort_active btn btn-default" href="#" data-group="All"><?php _e('All', 'gabfire'); ?></a></li><?php } ?>
							<li><a class="btn btn-default" data-group="<?php echo $cat->cat_name; ?>" href="#"><?php echo $cat->cat_name; ?></a></li>
							
							<?php $count++;
							}
							?>
						</div>
					
						<div id="grid">
							
							<?php
							$output_cats = '';
							$category = get_the_category(); 
							foreach($category as $cat) { 
								$output_cats .= $category->cat_ID; 
							}
							echo $output_cats;
							?>
							
							<?php
							$count = 1;
							if ( of_get_option('of_portfolio_cats') <> "" ) { 
								$args = array (
									'post_type' => 'portfolio',
									'posts_per_page' => of_get_option('of_portfolionr'),
									
									'tax_query' => array(
										array(
										   'taxonomy' => 'portfolio-category',
										   'field' => 'id',
										   'terms' => explode(',', of_get_option('of_portfolio_cats'))
										)
									)
								);
							} else {
								$args = array (
									'post_type' => 'portfolio',
									'posts_per_page' => of_get_option('of_portfolionr')
								);
							}
							$gab_query = new WP_Query();$gab_query->query($args); 
							while ($gab_query->have_posts()) : $gab_query->the_post();
										
							$terms = get_the_terms( $post->ID , 'portfolio-category' );
							$output = '';
							foreach ( $terms as $term ) {
								$output.= '"'.$term->name.'",' ;
							}						
							?>
							<div class="filtreable_item<?php if($count % 4 == 0) { echo " lastonrow"; } ?>" data-groups='[<?php echo $output; ?> "<?php _e('All', 'gabfire'); ?>"]'>
								<div class="portfolio_view">
									<?php 
									gabfire_media(array(
										'name' => 'portfolio1', 
										'imgtag' => 1,
										'link' => 1,
										'enable_thumb' => 1,
										'enable_video' => 0, 
										'resize_type' => 'c', 
										'media_width' => 263, 
										'media_height' => 176, 
										'thumb_align' => '',
										'enable_default' => 0
									)); 
									?>
									<h3 class="hidden-lg small-caption"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf( esc_attr__( 'Permalink to %s', 'gabfire' ), the_title_attribute( 'echo=0' ) ); ?>" ><?php the_title(); ?></a></h3>										
									<div class="portfolio_mask visible-lg">		
										<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf( esc_attr__( 'Permalink to %s', 'gabfire' ), the_title_attribute( 'echo=0' ) ); ?>" ><?php the_title(); ?></a></h2>
										
										<?php echo '<p class="hidden-xs hidden-sm">' . string_limit_words(get_the_excerpt(), 10) . '&hellip;</p>'; ?>
										
										<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf( esc_attr__( 'Permalink to %s', 'gabfire' ), the_title_attribute( 'echo=0' ) ); ?>" class="info">
											<i class="fa fa-plus-square"></i>&nbsp;&nbsp;<?php _e('read more','gabfire'); ?>
										</a>
									</div><!-- portfolio_mask -->
								</div><!-- portfolio_view -->
							</div><!-- filtreable_item -->
							<?php endwhile; wp_reset_query(); ?>
						</div><!-- grid -->
						
					</div><!-- col-md-12 -->
				</div><!-- row -->
			</div><!-- container -->
		</section><!-- portfolio -->
	<?php } ?>
	
	<?php /*
	<section id="bottomquote" data-stellar-background-ratio="0.8">
		<div class="add-pattern">
			<div class="container">
				<div class="row">
					<div class="col-md-12 wow animated bounceInLeft">
						<p class="home_quote">The true sign of intelligence is not knowledge but imagination.</p>
						<p class="toldby">Albert Einstein</p>
					</div>
				</div>
			</div>
		</div>
	</section>	
	*/ ?>
	
	<?php if (of_get_option('of_testimonials') == 0) { ?>
		<section id="testimonials" class="wow animated fadeInUp">
			<div class="add-pattern">
				<div class="container">

					<div class="row section-title">
						<div class="col-md-12">
							<h2 class="section-title"><?php echo of_get_option('of_testimonial_firstline'); ?></h2>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12">
							
							<?php
							$class = '';
							for ($i = 1; $i <= of_get_option('of_testimonialsnr'); $i++) { 
								if ($i !== 1) { $class = ' hidden'; } 
								?>	
								
								<div class="show-content-<?php echo $i . $class; ?>">
									<p><i class="fa fa-quote-left fa-2x"></i> <?php echo of_get_option('of_testimonial_'.$i); ?></p>
									<p class="toldby"><?php echo of_get_option('of_testimonial_by_'.$i); ?></p>
								</div>							
								
							<?php
							} ?>	

							<div class="switch-content">
								<?php for ($i = 1; $i <= of_get_option('of_testimonialsnr'); $i++) { ?>	
									<a href="#" id="content-<?php echo $i; ?>"><img src="<?php echo of_get_option('of_testimonialspicture_'.$i); ?>" class="img-circle" alt="" /></a>
								<?php } ?>
							</div><!-- switch-content -->

						</div><!-- col-md-12 -->
					</div><!-- row -->
				</div><!-- container -->
			</div><!-- add-pattern -->
		</section><!-- testimonials -->
	<?php } ?>
	
	<?php if (of_get_option('of_timeline') == 0) { ?>
		<section id="timeline" class="wow animated fadeIn" data-wow-duration="2s">
			<div class="container">
				<div class="row section-title">
					<div class="col-md-12">
						
						<?php if ( of_get_option('of_timeline_firstline') <> "" ) { ?>
							<h2 class="section-title"><?php echo of_get_option('of_timeline_firstline'); ?></h2>
						<?php } ?>
						
						<?php if ( of_get_option('of_timeline_secondline') <> "" ) { ?>
							<h4 class="section-subtitle"><?php echo of_get_option('of_timeline_secondline'); ?></h4>	
						<?php } ?>						
						
					</div>
				</div>
		
				<div class="row">
					<div class="col-md-12">
						<div class="timeline_container">

							<div class="timeline_divider hidden-xs"></div>
							<ul class='timeline'>
									<article>
									<?php
									$count = 1;
									$class = '';
									if (of_get_option('of_featype') == 'mrecent') {
										$args = array(
										  'posts_per_page' => of_get_option('of_nr'),
										);
									}			
									else {
										$args = array(
										  'cat' => of_get_option('of_cat'), 
										  'posts_per_page' => of_get_option('of_nr')
										);
									}	
									$gab_query = new WP_Query();$gab_query->query($args); 
									while ($gab_query->have_posts()) : $gab_query->the_post();	
									
									if ($count % 2 == 0 ) {
										$class = 'wow animated zoomInLeft';
										$odd_even = 'even';
										$tooltip_placement = 'right';
									} else {
										$class = 'wow animated zoomInRight';
										$odd_even = 'odd';
										$tooltip_placement = 'left';
									}
									?>
									
									<li class="<?php echo $class; ?>">
										<article>
										<?php 
										gabfire_media(array(
											'name' => 'homeblog', 
											'imgtag' => 1,
											'link' => 1,
											'enable_video' => 1, 
											'catch_image' => of_get_option('of_catch_img', 0),
											'video_id' => 'block1', 
											'enable_thumb' => 1,
											'resize_type' => 'c', 
											'media_width' => 440, 
											'media_height' => 175, 
											'thumb_align' => 'aligncenter featured-media',
											'enable_default' => 0
										)); 
										?>
										
										<a class="hidden-xs show_tooltip blog-posttime posttime-<?php echo $odd_even;?>" data-placement="<?php echo $tooltip_placement; ?>" data-toggle="tooltip" data-original-title="<?php printf(esc_attr__('By %1$s on %2$s.','gabfire'), get_the_author(), get_the_date()); ?>"><i class="fa fa-circle"></i></a>
										
										<span class="hidden-xs timeline-arrow arrow-<?php echo $odd_even;?>"></span>
										<h2 class="posttitle">
											<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf( esc_attr__( 'Permalink to %s', 'gabfire' ), the_title_attribute( 'echo=0' ) ); ?>" >
												<?php the_title(); ?>
											</a>
										</h2>
										
										<?php echo '<p>' . string_limit_words(get_the_excerpt(), 28) . '&hellip;</p>'; ?>
										<div class="blog-postmeta">
											<?php echo get_avatar( get_the_author_meta( 'ID' ), 40 ); ?>
											<?php $authorlink = '<a href="'.get_author_posts_url(get_the_author_meta( 'ID' )).'">'.  get_the_author() . '</a><br />'; ?>
											<p>
											<?php printf(esc_attr__('By %1$s on %2$s.','gabfire'), $authorlink, get_the_date()); ?>
											</p>
										</div>
									</article>
									<?php $count++; endwhile; wp_reset_query(); ?>
									</li>
							</ul>
						</div>
						
						<?php if ( of_get_option('of_bloglink') <> "" ) { ?>
							<a href="<?php echo get_post_permalink(of_get_option('of_bloglink')); ?>" class="btn btn-default center-block"><?php echo of_get_option('of_linktexttimeline'); ?> <i class="fa fa-angle-double-right"></i></a>
						<?php } ?>
					</div>
				</div><!-- row -->
			</div><!-- container -->
		</section>
	<?php } ?>
	
	<?php get_footer(); ?>
