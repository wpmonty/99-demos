<?php
/* Single Post, Page and Custom Post Loop */

/* Post layout was called in single.php
 * define media width/height based on post layout
 */

?>

<div class="">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<article <?php post_class('entry'); ?>>

    		<h1><?php the_title(); ?></h1>

    		<?php
    		// Display edit post link to site admin
			edit_post_link(__('Edit This Post','gabfire'),'<p>','</p>');

			$subtitle = get_post_meta($post->ID, 'subtitle', true);
			if ($subtitle != '') {
				echo "<p class='subtitle'>$subtitle</p>";
			}

			?>
			<div class="entry-content">
				<?php the_content(); ?>
			</div><?php

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

			// Post/Page Widget
			if ('page' == get_post_type()) {
				gabfire_dynamic_sidebar('PageWidget');
			} elseif ('post' == get_post_type()) {
				gabfire_dynamic_sidebar('PostWidget');
			}
			?>

		</article>

	<?php endwhile; else : endif; ?>

	<div class="clearfix"></div>
</div><!-- articles-wrapper -->