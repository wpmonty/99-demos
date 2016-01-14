		<?php if(is_page_template( 'tpl-portfolio.php')){ ?>

		<section id="portfolio-title" class="p30">
			<div class="container">
				<div class="row">
					<h1 class="text-center"><?php the_title();?></h1>
				</div>
			</div>
		</section>

		<?php } ?>

		<?php if(is_page_template( 'tpl-services-development.php')){ ?>

		<section id="portfolio-title" class="pt bg-white">
			<div class="container">
				<div class="row">
					<h1 class="text-center"><?php _e('Our Development Examples','gabfire')?></h1>
					<h3 class="text-center p10"><?php _e('Let our design work speak for itself.','gabfire')?></h3>
				</div>
			</div>
		</section>

		<?php } ?>

		<section id="portfolio" class="pb bg-white">
			<div class="container wow animated fadeIn pt" data-wow-duration="2s">

				<div class="row">
					<div class="col-md-12">

						<?php
						$count = 1;
						$limit = 16;
						$cat = '';
						if(is_page_template( 'tpl-services-development.php')){ $limit = 8; $cat = 'development';}
						$args = array (
							'post_type' => 'portfolio',
							'portfolio-category' => $cat,
							'posts_per_page' => $limit
						);

						$gab_query = new WP_Query();
						$gab_query->query($args);
						while ($gab_query->have_posts()) : $gab_query->the_post();

/* 							global $post; */
						$client_name = get_post_meta($post->ID, 'client_name', true);
						$project_date = get_post_meta($post->ID, 'project_date', true);
						$project_intro = get_post_meta($post->ID, 'project_introduction', true);
						$project_link = get_post_meta($post->ID, 'project_link', true);
						$technology_1 = get_post_meta($post->ID, 'technology_1', true);
						$technology_2 = get_post_meta($post->ID, 'technology_2', true);
						$technology_3 = get_post_meta($post->ID, 'technology_3', true);
						$technology_4 = get_post_meta($post->ID, 'technology_4', true);
						$technology_5 = get_post_meta($post->ID, 'technology_5', true);
						$technology_6 = get_post_meta($post->ID, 'technology_6', true);
						?>

							<!-- check if portfolio has a featured image -->
							<?php if (has_post_thumbnail( $post->ID ) ): ?>

								<!-- featured image object -->
								<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>

								<div class="col-md-3 col-sm-3 col-xs-6 mb<?php if($count % 4 == 0) { echo " lastonrow"; } ?>">

									<div class="portfolio_view">
										<?php
										gabfire_media(array(
											'name' => 'portfolio1',
											'imgtag' => 1,
											'link' => 0,
											'enable_thumb' => 1,
											'enable_video' => 0,
											'resize_type' => 'c',
											'media_width' => 263,
											'media_height' => 176,
											'thumb_align' => 'top',
											'enable_default' => 0
										));
										?>

										<h3 class="hidden-lg small-caption">
											<a href="<?php echo $image[0]; ?>" ><?php _e($client_name, 'gabfire'); ?></a>
										</h3>

										<div class="portfolio_mask visible-lg">
											<h2>
												<a data-toggle="modal" data-target="<?php echo '#modal-' . $count; ?>" ><?php _e($client_name, 'gabfire'); ?></a>
											</h2>

											<a data-toggle="modal" data-target="<?php echo '#modal-' . $count; ?>" class="info">
												<i class="fa fa-plus-square"></i>&nbsp;&nbsp;<?php _e('read more','gabfire'); ?>
											</a>

										</div><!-- portfolio_mask -->
									</div><!-- portfolio_view -->

								</div><!-- filtreable_item -->

								<!-- Modal -->
								<div class="modal fade" id="<?php echo 'modal-' . $count; ?>" tabindex="-1" role="dialog" aria-labelledby="<?php echo 'modalLabel' . $count; ?>" aria-hidden="true">
									<div class="p50">
										<div class="modal-content bg-gray">
											<div class="modal-header text-white">

												<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
												<h4 class="modal-title" id="<?php echo 'modalLabel' . $count; ?>"><?php the_title(); ?></h4>

											</div>
											<div class="modal-body bg-white">
												<div class="container">
													<div class="row">

														<div class="col-md-8">
															<?php the_content(); ?>
														</div>

														<div class="col-md-4">

															<h4><?php _e('About the Project','gabfire'); ?></h4>

															<p><?php if ($project_intro !== '') { echo $project_intro; }?></p>

															<h4><?php _e('Services Provided','gabfire'); ?></h4>

															<ul class="list-circle">

															<?php
																if ($technology_1 !== '') { echo '<li>' . $technology_1 . '</li>'; }
																if ($technology_2 !== '') { echo '<li>' . $technology_2 . '</li>'; }
																if ($technology_3 !== '') { echo '<li>' . $technology_3 . '</li>'; }
																if ($technology_4 !== '') { echo '<li>' . $technology_4 . '</li>'; }
																if ($technology_5 !== '') { echo '<li>' . $technology_5 . '</li>'; }
																if ($technology_6 !== '') { echo '<li>' . $technology_6 . '</li>'; }
															?>

															</ul>

															<?php if ($project_link !== '') { echo '<a class="p30 block" href="'.$project_link.'">visit site &rarr;</a>'; }?>
															<div class="clearfix"></div>


															<a class="btn btn-orange btn-space" href="/services">View Our Services</a>

														</div>
													</div>
												</div>

											</div>
										</div>
									</div>

								</div>

							<?php endif; ?> <!-- /check if portfolio has a featured image -->

						<?php $count++; endwhile; wp_reset_query(); ?>

						<?php if(!is_page_template( 'tpl-portfolio.php')){ ?>
						<a href="/work" class="block text-center clearboth"><?php _e('Check out our full portfolio','gabfire')?></a>
						<?php } ?>

					</div><!-- col-md-12 -->
				</div><!-- row -->
			</div><!-- container -->
		</section><!-- portfolio -->