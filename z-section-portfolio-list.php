<section id="portfolio-title" class="p30">
	<div class="container">
		<div class="row">
			<h1 class="text-center"><?php the_title();?></h1>
		</div>
	</div>
</section>

<section id="portfolio" class="pt pb bg-white">
	<div class="container wow animated fadeIn" data-wow-duration="2s">

		<!--  Development Loop -->
		<div class="row mb30">
			<div class="col-md-12">

				<?php
				$count = 1;
				$limit = 8;
				$args = array (
					'post_type' => 'portfolio',
					'portfolio-category' => 'design',
					'posts_per_page' => $limit
				);?>


				<?php if(have_posts()){ ?>

				<div class="mb col-md-6">
					<h2>Development</h2>
					<p class="">99 Robots excels in custom web application development, WordPress plugin & theme development, and website development. But don't just take our word for it, let our work speak for itself.</p>
					<a class="btn btn-orange">View Services</a>
				</div>

				<?php } ?>

				<?php
				$gab_query = new WP_Query();
				$gab_query->query($args);

				while ($gab_query->have_posts()) : $gab_query->the_post();

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

						<?php if ($count == 5 && $limit > 4) { ?>
							<div class="collapse" id="collapseDev">
						<?php } ?>

						<div class="col-md-3 mb20">

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

						<?php if ($count == $limit) { ?>
							</div>
						<?php } ?> <!-- / collapse -->


					<?php endif; ?> <!-- /check if portfolio has a featured image -->


				<?php $count++; endwhile; wp_reset_query(); ?>

				<?php if ($count > 5) { ?>
				<a style="cursor:pointer;" class="pull-right p10" data-toggle="collapse" data-target="#collapseDev" aria-expanded="false" aria-controls="collapseDev">See More</a>
				<?php } ?>

			</div><!-- col-md-12 -->
		</div><!-- row -->

		<!--  Design Loop -->
		<div class="row bg-ltgray pt30 mt">
			<div class="col-md-12">

				<?php
				$count = 1;
				$limit = 8;
				$args = array (
					'post_type' => 'portfolio',
					'portfolio-category' => 'development',
					'posts_per_page' => $limit
				);?>

				<?php if(have_posts()){ ?>

				<div class="mb pt30 col-md-6">
					<h2>Design</h2>
					<p class="">99 Robots strives to design the best experience for clients. Whether you seek a new logo or a modern web experience, our expert designers will go above and beyond your expectations.</p>
					<a class="btn btn-blue">View Services</a>
				</div>
				<?php } ?>

				<?php
				$gab_query = new WP_Query();
				$gab_query->query($args);

				while ($gab_query->have_posts()) : $gab_query->the_post();

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

						<?php if ($count == 5 && $limit > 4) { ?>
							<div class="collapse" id="collapseDesign">
						<?php } ?>

						<div class="col-md-3 mb20">

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

						<?php if ($count == $limit) { ?>
							</div>
						<?php } ?> <!-- / collapse -->


					<?php endif; ?> <!-- /check if portfolio has a featured image -->


				<?php $count++; endwhile; wp_reset_query(); ?>

				<?php if ($count > 5) { ?>
				<a style="cursor:pointer;" class="pull-right p10" data-toggle="collapse" data-target="#collapseDesign" aria-expanded="false" aria-controls="collapseDev">See More</a>
				<?php } ?>

			</div><!-- col-md-12 -->
		</div><!-- row -->

		<!--  Marketing Loop -->
		<div class="row pt30 mt">
			<div class="col-md-12">

				<?php
				$count = 1;
				$limit = 8;
				$args = array (
					'post_type' => 'portfolio',
					'portfolio-category' => 'marketing',
					'posts_per_page' => $limit
				);?>
				<?php if(have_posts()){ ?>
				<div class="mb pt30 col-md-6">
					<h2>Marketing</h2>
					<p class="">99 Robots believes in success-driven marketing. We're not satisfied until you reach your goals. Grow your company with proven marketing strategy.</p>
					<a class="btn btn-green">View Services</a>
				</div>
				<?php } ?>

				<?php
				$gab_query = new WP_Query();
				$gab_query->query($args);

				while ($gab_query->have_posts()) : $gab_query->the_post();

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

						<?php if ($count == 5 && $limit > 4) { ?>
							<div class="collapse" id="collapseMarketing">
						<?php } ?>

						<div class="col-md-3 mb20">

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

						<?php if ($count == $limit) { ?>
							</div>
						<?php } ?> <!-- / collapse -->


					<?php endif; ?> <!-- /check if portfolio has a featured image -->


				<?php $count++; endwhile; wp_reset_query(); ?>

				<?php if ($count > 5) { ?>
				<a style="cursor:pointer;" class="pull-right p10" data-toggle="collapse" data-target="#collapseMarketing" aria-expanded="false" aria-controls="collapseDev">See More</a>
				<?php } ?>

			</div><!-- col-md-12 -->
		</div><!-- row -->


	</div><!-- container -->
</section><!-- portfolio -->