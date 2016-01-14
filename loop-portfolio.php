<div class="article-wrapper archive-portfolio archive-2col">
		<?php
		$count = 1;
		if (have_posts()) : while (have_posts()) : the_post();
		if ($count % 3 == 0) { $class = 'entry archivepage lastarticle'; } else { $class = 'entry archivepage'; }
		?>

			<?php if ((!is_paged()) and ($count < 5)) { ?>

			<?php if($count == 1) { ?>

			<div class="innerslider-wrapper">
				<div class="carousel-four-controls">
					<span class="carousel-four-prev pull-left"><i class="fa fa-angle-left"></i></span>
					<span class="carousel-four-next pull-right"><i class="fa fa-angle-right"></i></span>
				</div>

				<div class="carousel-four">

			<?php } ?>
				<div class="carousel_item hentry">
					<?php
					gabfire_media(array(
						'name' => 'loop-portfolio',
						'imgtag' => 1,
						'link' => 1,
						'enable_video' => 1,
						'video_id' => 'postfull',
						'enable_thumb' => 1,
						'resize_type' => 'c',
						'media_width' => 1030,
						'media_height' => 542,
						'thumb_align' => '',
						'enable_default' => 0
					));
					?>
					<div class="postcaption">
						<h2 class="entry-title posttitle"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf( esc_attr__( 'Permalink to %s', 'gabfire' ), the_title_attribute( 'echo=0' ) ); ?>"><?php the_title(); ?></a></h2>
						<p class="postmeta hidden-xs">
							<span>
								<?php
								$authorlink = '<a href="'.get_author_posts_url(get_the_author_meta( 'ID' )).'" rel="author" class="author vcard"><span class="fn">'.  get_the_author() . '</span></a>';
								$date = '<time class="published updated" datetime="'. get_the_date() . 'T' . get_the_time() .'">'. get_the_date() . '</time>';
								printf(esc_attr__('By %1$s on %2$s','gabfire'), $authorlink, $date); ?>
							</span>
						</p>
						<p class="hidden-xs entry-summary"><?php echo string_limit_words(get_the_excerpt(), 10); ?></p>
					</div>
				</div>

			<?php if( $count == 4) { ?>
				</div>
			</div>

			<?php } ?>


			<?php } else { ?>

				<article <?php post_class($class); ?>>

					<h2 class="entry-title">
						<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf( esc_attr__( 'Permalink to %s', 'gabfire' ), the_title_attribute( 'echo=0' ) ); ?>" >
							<?php the_title(); ?>
						</a>
					</h2>

					<?php if(!is_post_type_archive('portfolio')) { ?>
					<p class="archive_postmeta">
						<span>
							<?php
							$authorlink = '<a href="'.get_author_posts_url(get_the_author_meta( 'ID' )).'" rel="author" class="author vcard"><span class="fn">'.  get_the_author() . '</span></a>';
							$date = '<time class="published updated" datetime="'. get_the_date() . 'T' . get_the_time() .'">'. get_the_date() . '</time>&nbsp;&nbsp;';
							printf(esc_attr__('By %1$s on %2$s','gabfire'), $authorlink, $date); ?>
						</span>

						<?php the_tags('<span class="hidden-xs"><i class="fa fa-tags"></i>',', ','&nbsp;&nbsp;</span>'); ?>
						<span><i class="fa fa-folder-o"></i><?php the_category(', '); ?>&nbsp;&nbsp;</span>
						<?php edit_post_link('Edit', '<span><i class="fa fa-pencil-square-o"></i>', '</span>'); ?>
					</p>
					<?php } ?>

					<?php
						gabfire_media(array(
							'name' => 'ev-postfull',
							'imgtag' => 1,
							'link' => 1,
							'enable_video' => 1,
							'video_id' => 'postfull',
							'enable_thumb' => 1,
							'resize_type' => 'c',
							'media_width' => 488,
							'media_height' => 270,
							'thumb_align' => 'aligncenter',
							'enable_default' => 0
						));
						?>
						<p><?php echo string_limit_words(get_the_excerpt(), 10); ?>&hellip;</p>
				</article>

				<?php if ($count % 3 == 0) { echo '<div class="clearfix"></div>'; } ?>

			<?php } ?>
		<?php $count++; endwhile; else: endif; ?>

		<?php gabfire_archivepagination(); ?>

		<div class="clearfix"></div>
</div>