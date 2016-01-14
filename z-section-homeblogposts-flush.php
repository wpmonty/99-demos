<div class="how-it-works-section">
		<div class="row">

			<h2 class="centered pt pb10">Flush Blog</h2>

			<hr class="aligncenter mb">

					<?php

					$args = array(
						'post_type' => 'post',
						'paged' => $paged,
						'posts_per_page' => 12
					);
					$count = 0;
					$gab_query = new WP_Query();$gab_query->query($args);
					while ($gab_query->have_posts()) : $gab_query->the_post();
					?>

						<!-- HOW IT WORKS - ITEM 1 -->
						<div data-animation="fadeIn" class="col-md-2 col-sm-6 fadeIn animated done-animation">
							<div class="hiw-item <?php if ($count % 2 == 0) { echo 'even'; } ?>">

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
									'media_width' => 400,
									'media_height' => 300,
									'thumb_align' => 'aligncenter hiw-item-picture img-responsive',
									'enable_default' => 0
								));
								?>

								<!-- <img alt="" src="images/contents/hiw-item-1.jpg" class="hiw-item-picture"> -->
								<div class="hiw-item-text">
									<span class="hiw-item-icon"><?php echo get_avatar(40); ?></span>
									<h4 class="hiw-item-title">
										<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf( esc_attr__( 'Permalink to %s', 'gabfire' ), the_title_attribute( 'echo=0' ) ); ?>" >
										<?php the_title(); ?>
										</a>										
									</h4>
									<!-- <p class="hiw-item-description">Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae. Vivamus eu sollicitudin lacus, nec ultricies lorem.</p> -->
									<?php/*  echo '<p class="hiw-item-description">' . string_limit_words(get_the_excerpt(), 20) . '&hellip;</p>';  */?>
								</div>
							</div>
						</div>
					
					<?php $count++; endwhile; wp_reset_query(); ?>
				
		</div><!--/row -->
</div>