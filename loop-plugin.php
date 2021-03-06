<div class="article-wrapper archive-3col">

	<?php

	$args = array( 'post_type' => 'plugin',
/*
	               'meta_query' => array(
				        array(
				            'key' => 'location',
				            'value' => 'annapolis'
				        ),
				        array(
				            'key' => 'item_tags',
				            'value' => 'non-marine'
				        )
				    ),
				   	'orderby' => 'title',
*/
					'order' => 'ASC',
	               'posts_per_page' => 9 );
	$loop = new WP_Query( $args );


	$count = 1;
	//if (have_posts()) : while (have_posts()) : the_post();

	if (have_posts()) : while ( $loop->have_posts() ) : $loop->the_post();

	if ($count % 3 == 0) { $class = 'entry archivepage lastarticle'; } else { $class = 'entry archivepage'; } ?>

		<article <?php post_class($class); ?>>

			<h2 class="entry-title">
				<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf( esc_attr__( 'Permalink to %s', 'gabfire' ), the_title_attribute( 'echo=0' ) ); ?>" >
					<?php the_title(); ?>
				</a>
			</h2>

			<p class="archive_postmeta">
				<span>
					<?php
					$authorlink = '<a href="'.get_author_posts_url(get_the_author_meta( 'ID' )).'" rel="author" class="author vcard"><span class="fn">'.  get_the_author() . '</span></a>';
					$date = '<time class="published updated" datetime="'. get_the_date() . 'T' . get_the_time() .'">'. get_the_date() . '</time>&nbsp;&nbsp;';
					printf(esc_attr__('By %1$s on %2$s','gabfire'), $authorlink, $date); ?>
				</span>

				<?php the_tags('<span class="hidden-xs"><i class="fa fa-tags"></i>',', ','&nbsp;&nbsp;</span>'); ?>
				<span class="hidden-md hidden-sm"><i class="fa fa-folder-o"></i><?php the_category(', '); ?>&nbsp;&nbsp;</span>
				<?php edit_post_link('Edit', '<span><i class="fa fa-pencil-square-o"></i>', '</span>'); ?>
			</p>

			<?php
				gabfire_media(array(
					'name' => 'post-sidebar',
					'imgtag' => 1,
					'link' => 1,
					'enable_video' => 1,
					'video_id' => 'postfull',
					'enable_thumb' => 1,
					'resize_type' => 'c',
					'media_width' => 700,
					'media_height' => 380,
					'thumb_align' => 'aligncenter',
					'enable_default' => 0
				));
				?>
				<p><?php echo string_limit_words(get_the_excerpt(), 30); ?>&hellip;</p>
		</article>

		<?php if ($count % 3 == 0) { echo '<div class="clearfix"></div>'; } ?>

	<?php $count++; endwhile; else : endif; ?>

	<?php gabfire_archivepagination(); ?>

	<div class="clearfix"></div>

</div><!-- articles-wrapper -->
