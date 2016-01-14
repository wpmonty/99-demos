<?php get_header(); ?>
	
	<?php
		if (of_get_option('of_teamsinglelayout') == 'default-blog') {
			get_template_part( 'single', 'default' );
		
		} elseif (of_get_option('of_teamsinglelayout') == 'nosidebar-blog') {
			get_template_part( 'single', 'fullwidth' );
		
		} 
		else {
		/* Use the template coded below */
	?>
	
		<div id="single-cv" itemscope itemtype="http://schema.org/Person">
			<!-- Page Content -->
			<div class="container cv-top">

				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<?php $postid_main = get_the_ID(); ?> 
					<div class="entry row">
						<div class="team-singlephoto col-lg-5 col-md-5 col-sm-12">
							<img itemprop="image" src="<?php gabfire_media(array('name' => 'figure-single','imgtag' => 0,'link' => 0,'enable_video' => 1,'enable_thumb' => 1,'resize_type' => 'c', 'media_width' => 432, 'media_height' => 296,'thumb_align' => 'alignnone','enable_default' => 0)); ?>" alt="<?php the_title(); ?>"  />
						</div>
						
						<div class="member-details col-lg-7 col-md-7 col-sm-12">
							<?php
							$portfolio_tag = get_post_meta($post->ID, 'portfolio_tag', true);
							$position = get_post_meta($post->ID, 'position', true);
							$facebook = get_post_meta($post->ID, 'facebook', true);
							$twitter = get_post_meta($post->ID, 'twitter', true);
							$linkedin = get_post_meta($post->ID, 'linkedin', true);
							$email = get_post_meta($post->ID, 'email', true);
							$phone = get_post_meta($post->ID, 'phone', true);
							?>
							<h1 class="entry-title" itemprop="name"><?php the_title(); ?></h1>
							<p class="singlepage_position" itemprop="jobTitle"><?php echo $position; ?></p>
							
							<?php if ( ($phone != '') or ($email != '') ) { ?>
								<p class="phone-email">
									
									<?php if ($phone != '') { ?>
										<span itemprop="telephone"><i class="fa fa-phone"></i> <?php echo $phone; ?></span>
									<?php } ?>  &nbsp;&nbsp;
									
									<?php if ($email != '') { ?>
										<i class="fa fa-envelope-o"></i> <a itemprop="email" href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a>
									<?php } ?>
								</p>
							<?php } ?>

							<div class="resume-text"><?php the_content(); ?></div>
							
							<?php if ($facebook != '') { ?>
							<a class="btn btn-sm btn-social btn-facebook" href="<?php echo $facebook; ?>" target="_blank">
								<i class="fa fa-facebook"></i> <?php _e('Friend on Facebook', 'gabfire'); ?>
							</a>													
							<?php } ?>
							
							<?php if ($twitter != '') { ?>
							<a class="btn btn-sm btn-social btn-twitter" href="<?php echo $twitter; ?>" target="_blank">
								<i class="fa fa-twitter"></i> <?php _e('Follow on Twitter', 'gabfire'); ?>
							</a>
							<?php } ?>
							
							<?php if ($linkedin != '') { ?>
							<a itemprop="url" class="btn btn-sm btn-social btn-linkedin" href="<?php echo $linkedin; ?>" target="_blank">
								<i class="fa fa-linkedin"></i> <?php _e('Connect on LinkedIn', 'gabfire'); ?>
							</a>													
							<?php } ?>			
						</div>
					</div>
				<?php endwhile; else : endif; ?>
				
				<div class="row resume">
					<div class="col-lg-6 col-md-6, col-md-6">
						<h3 class="background-smalltitle"><?php _e('EDUCATION','gabfire'); ?></h3>
							<dl class="dl-horizontal">		
								<?php					
								for ($i=1; $i<= 4; $i++) { 
									if (get_post_meta($post->ID, 'education_'.$i, true) != '' ) { ?>
										<dt><?php echo get_post_meta($post->ID, 'education_'.$i.'_period', true); ?></dt>
										<dd><strong><?php echo get_post_meta($post->ID, 'education_'.$i, true); ?></strong><?php echo get_post_meta($post->ID, 'education_'.$i.'_decription', true); ?></dd>
									<?php
									}
								}
								?>
							</dl>				
						<?php
						$additional_info_title = get_post_meta($post->ID, 'additional_info_title', true);
						$additional_info_text = get_post_meta($post->ID, 'additional_info_text', true);
						
						if ($additional_info_title != '') { 
							echo "<p class='additional-info'><strong>$additional_info_title</strong>$additional_info_text</p>";
						}
						?>
										
						<h3 class="background-smalltitle"><?php _e('EXPERIENCES','gabfire'); ?></h3>
						<dl class="dl-horizontal">
							<?php					
							for ($i=1; $i<= 4; $i++) { 
								if (get_post_meta($post->ID, 'experience_'.$i, true) != '' ) { ?>
									<dt><?php echo get_post_meta($post->ID, 'experience_'.$i.'_period', true); ?></dt>
									<dd><strong><?php echo get_post_meta($post->ID, 'experience_'.$i, true); ?></strong><?php echo get_post_meta($post->ID, 'experience_'.$i.'_decription', true); ?></dd>
								<?php
								}
							}
							?>		
						</dl>						
					</div>
					
					<div class="col-lg-6 col-md-6, col-md-6">
						<h3 class="background-smalltitle"><?php _e('SKILLS','gabfire'); ?></h3>
						<?php					
						for ($i=1; $i <= 6; $i++) { 
							if (get_post_meta($post->ID, 'skill_'.$i, true) != '' ) { ?>
								<div class="skillbar skill<?php echo $i; ?> clearfix" data-percent="<?php echo get_post_meta($post->ID, 'skill_'.$i.'_percentage', true); ?>%">
									<div class="skillbar-title"><span><?php echo get_post_meta($post->ID, 'skill_'.$i, true); ?></span></div>
									<div class="skillbar-bar skill-animate"></div>
									<div class="skill-bar-percent"><?php echo get_post_meta($post->ID, 'skill_'.$i.'_percentage', true); ?>%</div>
								</div> <!-- End Skill Bar -->						
							<?php
							}
						}
						?>
						
						<?php if ($portfolio_tag != '') { ?>
							<h3 class="background-smalltitle"><?php _e('RECENT PROJECTS','gabfire'); ?></h3>
							<div class="row">
								<?php
								$args = array (
									'post_type' => 'portfolio',
									'posts_per_page' => 2,
									'tax_query' => array(
										array(
										   'taxonomy' => 'portfolio-tag',
										   'field' => 'term_id',
										   'terms' => $portfolio_tag
										)
									),
								);	
								$gab_query = new WP_Query();$gab_query->query($args); 
								while ($gab_query->have_posts()) : $gab_query->the_post();	
								?>						

									<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
										<div class="portfolio_view">
											<?php 
											gabfire_media(array(
												'name' => 'member-portfolio', 
												'imgtag' => 1,
												'link' => 0,
												'enable_thumb' => 1,
												'enable_video' => 0, 
												'resize_type' => 'c', 
												'media_width' => 348, 
												'media_height' => 232, 
												'thumb_align' => '',
												'enable_default' => 0
											)); 
											?>		
											
											<h3 class="hidden-lg small-caption"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf( esc_attr__( 'Permalink to %s', 'gabfire' ), the_title_attribute( 'echo=0' ) ); ?>" ><?php the_title(); ?></a></h3>
											
											<div class="portfolio_mask visible-lg">
												<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf( esc_attr__( 'Permalink to %s', 'gabfire' ), the_title_attribute( 'echo=0' ) ); ?>" ><?php the_title(); ?></a></h2>											
												<?php echo '<p>' . string_limit_words(get_the_excerpt(), 10) . '&hellip;</p>'; ?>
												<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf( esc_attr__( 'Permalink to %s', 'gabfire' ), the_title_attribute( 'echo=0' ) ); ?>" class="info">
													<i class="fa fa-plus-square"></i>&nbsp;&nbsp;<?php _e('read more','gabfire'); ?>
												</a>
											</div>								
										</div>
									</div>
								<?php endwhile; wp_reset_query(); ?>
							</div><!-- row -->		
						<?php } ?>
						
						<h3 class="background-smalltitle"><?php _e('ALL TEAM','gabfire'); ?></h3>
						<?php
						$count = 1; 
						$args = array(
						  'post_type' => 'member',
						  'posts_per_page' => -1, 
						);		
						$gab_query = new WP_Query();$gab_query->query($args); 
						while ($gab_query->have_posts()) : $gab_query->the_post();	
						$postid_sub = get_the_ID();
						
						if ($postid_sub == $postid_main) {
							$enable_link = 0;
							$class = 'active_member member' .$count;
						} else {
							$enable_link = 1;
							$class = 'member' .$count;
						}

						$position = get_post_meta($post->ID, 'position', true);
						$facebook = get_post_meta($post->ID, 'facebook', true);
						$twitter = get_post_meta($post->ID, 'twitter', true);
						$linkedin = get_post_meta($post->ID, 'linkedin', true);
						?>										

							<figure itemprop="colleague" class="<?php echo $class; ?>">
								<?php 
								gabfire_media(array(
									'name' => 'small-figure', 
									'imgtag' => 1,
									'link' => $enable_link,
									'enable_thumb' => 1,
									'resize_type' => 'c', 
									'media_width' => 70, 
									'media_height' => 66, 
									'thumb_align' => 'alignleft img-thumbnail',
									'enable_default' => 0
								)); 
								?>
								<?php if ($enable_link == 1) { ?>
									<h2 class="entry-title"><a itemprop="name" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
								<?php } else { ?>
									<h2 class="entry-title" itemprop="name"><?php the_title(); ?></h2>
								<?php } ?>
								
								<p class="sidebar_position" itemprop="jobTitle"><?php echo $position; ?></p>

							</figure>
						<?php $count++; endwhile; wp_reset_query(); ?>
					
						<div class="clearfix"></div>

					</div>
				</div><!-- resume -->
			</div><!-- container content-wrapper -->
		</div><!-- single-blog -->
			
	<?php } ?>

<?php get_footer(); ?>