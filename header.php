<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8) ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>

	<meta charset="<?php bloginfo('charset'); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
	<meta name="google-site-verification" content="hpoM5O3OMMrWpkl0h4ByHYKwlYsAU-sXY7j2en_RmWc" />
    <title><?php wp_title(); ?></title>

    <link rel="icon" type="image/png" href="https://99robots.com/wp-content/uploads/2015/05/99robots-tiny-icon.png">

	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

    <div id="top-header" class="wrap">
        <div class="container">
            <ul>
                <?php if( of_get_option('of_product_link') <> '' ) { ?>
            		<li class="support pull-left"><a title="99 Robots Products" href="<?php echo of_get_option('of_product_link'); ?>">&larr; back to 99robots.com</a></li>
            	<?php } ?>
        	</ul>
        </div>
    </div>



	<section id="navbar-main">
	    <!-- <div class="navbar navbar-inverse navbar-fixed-top" role="navigation"> -->
	    <!-- <div class="navbar navbar-inverse" role="navigation"> -->
	    <div class="navbar dark navbar-inverse" role="navigation">
	      <div class="container">
	        <div class="navbar-header">
	          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
	            <span class="sr-only">Toggle navigation</span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	          </button>
	          <a class="navbar-brand" href="<?php echo home_url(); ?>" title="99 Robots - WordPress Plugins and Services"><img src="<?php echo get_template_directory_uri(); ?>/images/99demo-hz-white.png" /></a>

<!--
	          <a class="navbar-brand" href="#" title="WPsite - WordPress Plugins and Services">
	          	<img src="http://www.wpsite.net/wp-content/uploads/2011/10/logo-only-100h.png" alt="WPsite WordPress Plugins and Services" />
	          </a>
-->

	        </div>
	        <div class="collapse navbar-collapse">
	          <ul class="nav navbar-nav navbar-right">
				<?php if ( has_nav_menu( 'primary' ) ) {
					wp_nav_menu( array('theme_location' => 'primary', 'container' => false, 'items_wrap' => '%3$s'));
				} else { ?>
		            <li class="active"><a href="<?php echo home_url(); ?>" class="smoothScroll">HOME</a></li>
		            <li><a href="plugins" class="smoothScroll">PLUGINS</a></li>
		            <li><a href="services" class="smoothScroll">SERVICES</a></li>
		            <li><a href="blog" class="smoothScroll">BLOG</a></li>
		            <li><a href="http://support.wpsite.net" class="smoothScroll">SUPPORT</a></li>
		            <li><a href="about-us" class="smoothScroll">ABOUT</a></li>
		            <li><a href="contact" class="smoothScroll">CONTACT</a></li>
				<?php } ?>
				<?php if( of_get_option('of_product_link') <> '' ) { ?>
            		<li><a title="99 Robots Products" href="<?php echo of_get_option('of_product_link'); ?>">Buy Now</a></li>
            	<?php } ?>
	          </ul>
	        </div><!--/.nav-collapse -->
	      </div>
	    </div>
	</section>

