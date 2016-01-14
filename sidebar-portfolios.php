<aside class="col-md-4 col-sm-4 col-xs-12 sidebar">
	<div class="sidebar-inner">
		<?php
		global $post;
		$client_name = get_post_meta($post->ID, 'client_name', true);
		$project_date = get_post_meta($post->ID, 'project_date', true);
		$project_link = get_post_meta($post->ID, 'project_link', true);
		$technology_1 = get_post_meta($post->ID, 'technology_1', true);
		$technology_2 = get_post_meta($post->ID, 'technology_2', true);
		$technology_3 = get_post_meta($post->ID, 'technology_3', true);
		$technology_4 = get_post_meta($post->ID, 'technology_4', true);
		$technology_5 = get_post_meta($post->ID, 'technology_5', true);
		$technology_6 = get_post_meta($post->ID, 'technology_6', true);
		?>
		
		<?php if ($client_name != '') { ?>
		<div class="widget">
			<div class="widgetinner">
				<h3 class="widgettitle"><?php _e('Project Details','gabfire'); ?></h3>
				<ul>
				<?php if ($client_name != '') { ?><li><?php _e('Client:','gabfire'); ?> <?php echo $client_name; ?></li><?php } ?>
				<?php if ($project_date != '') { ?><li><?php _e('Date:','gabfire'); ?> <?php echo $project_date; ?></li><?php } ?>
				<?php if ($project_link != '') { ?><li><?php _e('Link:','gabfire'); ?> <a href="<?php echo $project_link; ?>" target="_blank"><?php echo $project_link; ?></a></li><?php } ?>
				</ul>
			</div>
		</div>
		<?php } ?>
		
		<?php if ($technology_1 != '') { ?>
		<div class="widget">
			<div class="widgetinner">
				<h3 class="widgettitle"><?php _e('Technologies','gabfire'); ?></h3>
				<ul>
					<?php					
					for ($i=1; $i<= 6; $i++) { 
						if (get_post_meta($post->ID, 'technology_'.$i, true) != '' ) { ?>
							<li><?php echo get_post_meta($post->ID, 'technology_'.$i, true); ?></li>
						<?php
						}
					}
					?>
				</ul>
			</div>
		</div>		
		<?php } ?>
		
		
		<?php if(of_get_option('of_portfolio_sidebar') == 0) { ?>
			<div class="widget">
				<div class="widgetinner">
					<h3 class="widgettitle"><?php echo of_get_option('of_portfolio_posts_title'); ?></h3>
					<?php
					global $post;
					$postid_sub = $post->ID;
					$count = 1; 
					$args = array(
					  'post_type' => 'portfolio',
					  'post__not_in' => array($postid_sub),
					  'posts_per_page' => 6, 
					);		
					$gab_query = new WP_Query();$gab_query->query($args); 
					while ($gab_query->have_posts()) : $gab_query->the_post();	
					?>										
						<div class="portfolio_view sidebar_portfolio_view">
							<?php 
							gabfire_media(array(
								'name' => 'th-entry', 
								'imgtag' => 1,
								'link' => 0,
								'enable_video' => 0, 
								'video_id' => 'postfull',
								'enable_thumb' => 1, 
								'resize_type' => 'c', 
								'media_width' => 253, 
								'media_height' => 157, 
								'thumb_align' => '',
								'enable_default' => 0
							)); 
							?>
							<h3 class="hidden-lg small-caption"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf( esc_attr__( 'Permalink to %s', 'gabfire' ), the_title_attribute( 'echo=0' ) ); ?>" ><?php the_title(); ?></a></h3>
							
							<div class="portfolio_mask visible-lg">				
								<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf( esc_attr__( 'Permalink to %s', 'gabfire' ), the_title_attribute( 'echo=0' ) ); ?>" ><?php the_title(); ?></a></h2>											
							</div><!-- portfolio_mask -->							
						</div>
					<?php $count++; endwhile; wp_reset_query(); ?>
				</div>
			</div>
		<?php } ?>		
	
		
		<?php gabfire_dynamic_sidebar('Sidebar-Portfolio'); ?>
		
		
	</div>
</aside>	