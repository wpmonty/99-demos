<div class="homeblogwrap">

	<div class="container">

		<div class="row">

			<div class="col-md-8 col-md-offset-2 centered mb20">
				<h2 class="centered pt pb10">The 99 Robots Blog</h2>
				<p class="centered">We know website development and digital marketing inside and out. Check out our blog to see what's happening in the digital world.</p>
			</div>

			<!-- <hr class="aligncenter mb"> -->

			<div class="homeblogposts">
					<?php

					$args = array(
						'post_type' => 'post',
						'paged' => $paged,
						'posts_per_page' => 3
					);
					$count = 0;
					$gab_query = new WP_Query();$gab_query->query($args);
					while ($gab_query->have_posts()) : $gab_query->the_post();
					$bouncer = ($count % 3);
					?>

					<div class="col-md-4 <?php if(!$bouncer) {echo 'clearleft';} ?> item">
						<article>
							<?php
							gabfire_media(array(
								'name' => 'z-post',
								'imgtag' => 1,
								'link' => 1,
								'enable_video' => 1,
								'catch_image' => of_get_option('of_catch_img', 0),
								'video_id' => 'block1',
								'enable_thumb' => 1,
								'resize_type' => 'c',
								'media_width' => 350,
								'media_height' => 175,
								'thumb_align' => 'aligncenter featured-media img-responsive',
								'enable_default' => 0
							));
							?>

<!--
							<div class="date">
								<h4><bold>13</bold></h4>
								<h4>Sep</h4>
							</div>
-->

							<h4 class="mt20 mb10">
								<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf( esc_attr__( 'Permalink to %s', 'gabfire' ), the_title_attribute( 'echo=0' ) ); ?>" >
									<?php the_title(); ?>
								</a>
							</h4>


<!--
							<div class="blog-postmeta">
								<?php echo get_avatar( get_the_author_meta( 'ID' ), 40 ); ?>
								<?php $authorlink = '<a href="'.get_author_posts_url(get_the_author_meta( 'ID' )).'">'.  get_the_author() . '</a><br />'; ?>
								<p class="desc">
								<?php printf(esc_attr__('By %1$s on %2$s.','gabfire'), $authorlink, get_the_date()); ?>
								</p>
							</div>
-->


							<?php  echo '<p class="mb10">' . string_limit_words(get_the_excerpt(), 20) . '&hellip;</p>'; ?>

							<p><a href="<?php the_permalink() ?>">Continue Reading &rarr;</a></p>

						</article>
					</div><!--/col-md-4-->
					<?php $count++; endwhile; wp_reset_query(); ?>
				</div>
		</div><!--/row -->
	</div><!--/container -->
</div>