<div class="article-wrapper archive-3col archive-member">

	<?php
	$count = 1;
	if (have_posts()) : while (have_posts()) : the_post();
	if ($count % 3 == 0) { $class = 'entry archivepage lastarticle'; } else { $class = 'entry archivepage'; }
	$position = get_post_meta($post->ID, 'position', true);
	$facebook = get_post_meta($post->ID, 'facebook', true);
	$twitter = get_post_meta($post->ID, 'twitter', true);
	$linkedin = get_post_meta($post->ID, 'linkedin', true);
	?>

		<article <?php post_class($class); ?>>

			<h2 class="entry-title">
				<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf( esc_attr__( 'Permalink to %s', 'gabfire' ), the_title_attribute( 'echo=0' ) ); ?>" >
					<?php the_title(); ?>
				</a>
			</h2>

			<?php
				gabfire_media(array(
					'name' => 'loop-team',
					'imgtag' => 1,
					'link' => 1,
					'enable_video' => 1,
					'video_id' => 'postfull',
					'enable_thumb' => 1,
					'resize_type' => 'c',
					'media_width' => 700,
					'media_height' => 470,
					'thumb_align' => 'aligncenter',
					'enable_default' => 0
				));
				?>
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
				<a class="viewcv" href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf( esc_attr__( 'Permalink to CV of %s', 'gabfire' ), the_title_attribute( 'echo=0' ) ); ?>" >
					<i class="fa fa-file-pdf-o"></i> <?php _e('View CV','gabfire'); ?>
				</a>
		</article>

		<?php if ($count % 3 == 0) { echo '<div class="clearfix"></div>'; } ?>

	<?php $count++; endwhile; else : endif; ?>

	<?php gabfire_archivepagination(); ?>

	<div class="clearfix"></div>

</div><!-- articles-wrapper -->
