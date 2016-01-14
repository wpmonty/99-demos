<div class="article-wrapper">
	<?php
	if (have_posts()) : while (have_posts()) : the_post();
	$disable_feaimage = get_post_meta($post->ID, 'post_feaimage', true);
	?>
		<article class="entry">

			<?php

			$enablevideo = 1;

			if (of_get_option('of_autoimage') == 1) {
				if ($disable_feaimage == 'true') {
					$enableimage = 0;
					$enablevideo = 0;
				} else {
					$enableimage = 1;
				}
			} else {
				$enableimage = 0;
			}

			gabfire_media(array(
				'name' => 'post-sidebar',
				'imgtag' => 1,
				'link' => 0,
				'enable_video' => 1,
				'video_id' => 'postfull',
				'enable_thumb' => $enableimage,
				'resize_type' => 'w',
				'media_width' => 700,
				'media_height' => 380,
				'thumb_align' => 'aligncenter',
				'enable_default' => 0
			));

			$subtitle = get_post_meta($post->ID, 'subtitle', true);
			if ($subtitle != '') {
				echo "<p class='subtitle'>$subtitle</p>";
			}

			the_content();

			// Display pagination
			$args = array(
				'before'           => '<p class="post-pagination">' . __('<strong>Pages:</strong>','gabfire'),
				'after'            => '</p>',
				'link_before'      => '<span>',
				'link_after'       => '</span>',
				'next_or_number'   => 'number',
				'nextpagelink'     => __('Next page', 'gabfire'),
				'previouspagelink' => __('Previous page', 'gabfire'),
				'pagelink'         => '%',
				'echo'             => 1
			);
			wp_link_pages($args);

			// Display edit post link to site admin
			edit_post_link(__('Edit','gabfire'),'<p>','</p>');

			?>

			<?php comments_template(); ?>
		</article>
	<?php endwhile; else : endif; ?>
	<div class="clearfix"></div>
</div><!-- articles-wrapper -->