<aside class="col-md-4 col-sm-4 col-xs-12 sidebar">
	<div class="sidebar-inner">

		<?php gabfire_dynamic_sidebar('services'); ?>

		<div class="widget">
			<div class="widgetinner">
				<h3 class="widgettitle"><?php _e('Our Other Services','gabfire') ?></h3>

				<?php if(!is_page('tasks')) { ?>
				<div class="mb10">
					<h3>Simple Tasks</h3>
					<p class="text-dkgray">Whether you need to tweak some styling or migrate your website, we've got you covered with simply priced à-la-cart tasks.  </p>
					<p><a class="btn btn-blue btn-sm" href="http://www.wpsite.net/custom-wordpress-development" title="Custom WordPress Development">View Our Tasks</a></p>
				</div>

				<?php } if(!is_page('development')) { ?>
				<div class="mb10">
					<h3>Development</h3>
					<p class="text-dkgray">Big, beautiful websites take a big, beautiful team to build them. 99 Robots can design and develop any website in any style.  </p>
					<p><a class="btn btn-orange btn-sm" href="http://www.wpsite.net/custom-wordpress-development" title="Custom WordPress Development">Get a Free Quote</a></p>
				</div>

				<?php } if(!is_page('maintenance')) { ?>
				<div class="mb10">
					<h3>Maintenance</h3>
					<p class="text-dkgray">A website without a team behind it is a race car without its pit crew. With maintenance, we're your personal IT team, 24/7.</p>
					<p><a class="btn btn-green btn-sm" href="http://www.wpsite.net/custom-wordpress-development" title="Custom WordPress Development">See Pricing</a></p>
				</div>
				<?php } ?>

			</div>
		</div>

		<?php gabfire_dynamic_sidebar('Sidebar-2'); ?>
	</div>
</aside>