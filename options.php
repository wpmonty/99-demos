<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 */

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet
	$themename = wp_get_theme();
	$themename = $themename->{'Name'};
	$themename = preg_replace('/\W/', '_', strtolower($themename) );

	$optionsframework_settings = get_option( 'optionsframework' );
	$optionsframework_settings['id'] = $themename;
	update_option( 'optionsframework', $optionsframework_settings );
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 */

function optionsframework_options() {

	// VARIABLES
	$themeurl = get_template_directory_uri();
	$themename = wp_get_theme();
	$themename = $themename->{'Name'};
	$shortname = 'of';
	$themeid = '_th';

	// Test data
	$test_array = array(
	'one' => 'One',
	'two' => 'Two',
	'three' =>'Three',
	'four' => 'Four',
	'five' => 'Five'
	);

	// Background options
	$patterns_path = get_template_directory_uri() . '/framework/images/patterns/';
	$patterns_array = array(
	'none' => $patterns_path . 'none.jpg',
	'subtle-1' => $patterns_path . 'subtle-1.jpg',
	'subtle-2' => $patterns_path . 'subtle-2.jpg',
	'subtle-3' => $patterns_path . 'subtle-3.jpg',
	'subtle-4' => $patterns_path . 'subtle-4.jpg',
	'subtle-5' => $patterns_path . 'subtle-5.jpg',
	'subtle-6' => $patterns_path . 'subtle-6.jpg',
	'subtle-7' => $patterns_path . 'subtle-7.jpg',
	'subtle-8' => $patterns_path . 'subtle-8.jpg',
	'subtle-9' => $patterns_path . 'subtle-9.jpg',
	'subtle-10' => $patterns_path . 'subtle-10.jpg',
	'subtle-11' => $patterns_path . 'subtle-11.jpg',
	'subtle-12' => $patterns_path . 'subtle-12.jpg',
	'subtle-13' => $patterns_path . 'subtle-13.jpg',
	'subtle-14' => $patterns_path . 'subtle-14.jpg',
	'subtle-15' => $patterns_path . 'subtle-15.jpg',
	'subtle-16' => $patterns_path . 'subtle-16.jpg',
	'subtle-17' => $patterns_path . 'subtle-17.jpg',
	);

	// Multicheck Array
	$multicheck_array = array(
	'one' => 'French Toast',
	'two' => 'Pancake',
	'three' =>'Omelette',
	'four' => 'Crepe',
	'five' => 'Waffle'
	);

	// Cycle2 Options
	$cycle2_slidefx = array(
		'fade' => 'Fade',
		'fadeout' => 'Fade-Out',
		'scrollHorz' => 'Scroll Horizontally',
		'none' => 'None'
	);

	// Multicheck Defaults
	$multicheck_defaults = array(
		'one' => '1',
		'five' => '1'
	);

	// Background Defaults
	$background_defaults = array(
		'color' => '',
		'image' => '',
		'repeat' => 'repeat',
		'position' => 'top center',
		'attachment'=>'scroll' );

	// Typography Defaults
	$typography_defaults = array(
		'size' => '15px',
		'face' => 'georgia',
		'style' => 'bold',
		'color' => '#bada55' );

	// Typography Options
	$typography_options = array(
		'sizes' => array( '6','12','14','16','20' ),
		'faces' => array( 'Helvetica Neue' => 'Helvetica Neue','Arial' => 'Arial' ),
		'styles' => array( 'normal' => 'Normal','bold' => 'Bold' ),
		'color' => false
	);

	// Pull all the categories into an array
	$options_categories = array();
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
		$options_categories[$category->cat_ID] = $category->cat_name;
	}

	// Pull all tags into an array
	$options_tags = array();
	$options_tags_obj = get_tags();
	foreach ( $options_tags_obj as $tag ) {
		$options_tags[$tag->term_id] = $tag->name;
	}

	// Pull all the pages into an array
	$options_pages = array();
	$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
		$options_pages[$page->ID] = $page->post_title;
	}

	// If using image radio buttons, define a directory path
	$imagepath = get_template_directory_uri() . '/framework/admin/images/';

	//Default Arrays
	$options_nr = array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20);
	$options_inslider = array(__('Disable', 'gabfire'), __('Tag-based', 'gabfire'), __('Site Wide', 'gabfire'));
	$options_sort = array('ASC' => 'asc', 'desc' => 'desc');
	$options_order = array('id' => 'id', 'name' => 'name', 'count' => 'count');
	$options_logo = array('text' => __('Text Based Logo', 'gabfire'), 'image' => __('Image Based Logo', 'gabfire'));
	$options_feaslide = array('scrollUp', 'scrollDown', 'scrollLeft', 'scrollRight', 'turnUp', 'turnDown', 'turnLeft', 'turnRight', 'fade');


	$options = array();

	$options[] = array( 'name' => __('General Settings', 'gabfire'), 'type' => 'heading');

		$options[] = array( 'name' => __('Logo Type', 'gabfire'),
							'desc' => __('If text-based logo is selected, set sitename and tagline on WordPress settings page.', 'gabfire'),
							'id' => $shortname.'_logo_type',
							'std' => 'Text Based Logo',
							'type' => 'select',
							'options' => $options_logo);

		$options[] = array( 'name' => __('Custom Logo', 'gabfire'),
							'desc' => __('If image-based logo is selected, upload a logo for your theme, or specify the image address of your online logo. (http://yoursite.com/logo.png) [Max height: 50px]', 'gabfire'),
							'id' => $shortname.'_logo',
							'type' => 'upload');

		$options[] = array( 'name' => __('Text Logo', 'gabfire'),
							'desc' => __('If text-based logo is selected, enter text to display on first row.', 'gabfire'),
							'id' => $shortname.'_logo1',
							'type' => 'text');

		$options[] = array( 'name' => __('Custom Favicon', 'gabfire'),
							'desc' => __('Upload a 16px x 16px Png/Gif image that will represent your website\'s favicon.', 'gabfire'),
							'id' => $shortname.'_custom_favicon',
							'type' => 'upload');

		$options[] = array( 'name' => __('RSS', 'gabfire'),
							'desc' => __('Link to third party feed handler. <br/> [http://www.url.com]', 'gabfire'),
							'id' => $shortname.'_rssaddr',
							'type' => 'text');

		$options[] = array( 'name' => __('Tracking Code', 'gabfire'),
							'desc' => __('Paste your Google Analytics (or other) tracking code here. This will be added into the footer template of your theme.', 'gabfire'),
							'id' => $shortname.'_google_analytics',
							'type' => 'textarea');

	$options[] = array( 'name' => __('Product', 'gabfire'), 'type' => 'heading');

	    $options[] = array( 'desc' => __('Enter the Link to the product page', 'gabfire'),
							'id' => $shortname.'_product_link',
							'std' => 'https://99robots.com/products/',
							'type' => 'text');

	$options[] = array( 'name' => __('Miscellaneous', 'gabfire'), 'type' => 'heading');

		$options[] = array( 'name' => __('Featured Image Post Display', 'gabfire'),
							'desc' => __('Auto resize and display featured image on single post - above entry.', 'gabfire'),
							'id' => $shortname.'_autoimage',
							'std' => 0,
							'type' => 'checkbox');

		$options[] = array( 'name' => __('Inner-Page Slider', 'gabfire'),
							'desc' => __( 'Automatically create slideshow of uploaded photos in post entries to be displayed below post title. [Note: Select options include displaying slider site-wide, tag-based, or to disable completely].', 'gabfire'),
							'id' => $shortname.'_inslider',
							'std' => 'Disable',
							'type' => 'select',
							'class' => 'mini',
							'options' => $options_inslider);

		$options[] = array( 'name' => __('Shortcodes', 'gabfire'),
							'desc' => __('Enable shortcodes functionality', 'gabfire'),
							'id' => $shortname.'_shortcodes',
							'std' => 0,
							'type' => 'checkbox');

		$options[] = array( 'name' => __('Widget Map', 'gabfire'),
							'desc' => __('Display the location of widgets on front page. After reviewing widget locations be sure to disable this option.', 'gabfire'),
							'id' => $shortname.'_widget',
							'std' => 0,
								'type' => 'checkbox');

    $options[] = array( 'name' => 'Custom Styling', 'type' => 'heading');

    	$options[] = array( 'name' => __('Custom CSS', 'gabfire'),
    						'desc' => __('Quickly add some CSS to your theme by adding it to this block.', 'gabfire'),
    						'id' => $shortname.'_custom_css',
    						'type' => 'textarea');

    	$options[] = array( 'name' => __('Change Primary Color', 'gabfire'),
    						'desc' => __('Check this box and select a color below', 'gabfire'),
    						'id' => $shortname.'_change_primarycolor',
    						'std' => 0,
    						'type' => 'checkbox');

    	$options[] = array( 'desc' => __('Primary Color', 'gabfire'),
    						'id' => $shortname.'_primarycolor',
    						'std' => '#f33768',
    						'type' => 'color');

    	$options[] = array( 'name' => __('Change Link Color', 'gabfire'),
    						'desc' => __('Check this box and select a color below', 'gabfire'),
    						'id' => $shortname.'_change_alink',
    						'std' => 0,
    						'type' => 'checkbox');

    	$options[] = array( 'desc' => __('Link Color', 'gabfire'),
    						'id' => $shortname.'_alink',
    						'std' => '#f33768',
    						'type' => 'color');

    	$options[] = array( 'name' => __('Change Hovered Link Color', 'gabfire'),
    						'desc' => __('Check this box and select a color below', 'gabfire'),
    						'id' => $shortname.'_change_ahover',
    						'std' => 0,
    						'type' => 'checkbox');

    	$options[] = array( 'desc' => __('Hovered Link Color', 'gabfire'),
    						'id' => $shortname.'_ahover',
    						'std' => '#f17293',
    						'type' => 'color');

    	$options[] = array( 'name' => __('Edit Navigation Colors', 'gabfire'),
    						'desc' => __('This is a master trigger to enable main navigation color edit below', 'gabfire'),
    						'id' => $shortname.'_change_nav',
    						'std' => 0,
    						'type' => 'checkbox');

    	$options[] = array( 'desc' => __('Navigation bar background color', 'gabfire'),
    						'id' => $shortname.'_navbg',
    						'std' => '#f33768',
    						'type' => 'color');

    	$options[] = array( 'desc' => __('Link color', 'gabfire'),
    						'id' => $shortname.'_licolor',
    						'std' => '#ffffff',
    						'type' => 'color');

    	$options[] = array( 'desc' => __('Current/Active Link color', 'gabfire'),
    						'id' => $shortname.'_licurrent',
    						'std' => '#222222',
    						'type' => 'color');

    	$options[] = array( 'desc' => __('Hovered Link color', 'gabfire'),
    						'id' => $shortname.'_lihover',
    						'std' => '#222222',
    						'type' => 'color');

    	$options[] = array( 'desc' => __('Dropdown border color', 'gabfire'),
    						'id' => $shortname.'_liulborder',
    						'std' => '#efefef',
    						'type' => 'color');

    	$options[] = array( 'desc' => __('Dropdown background color', 'gabfire'),
    						'id' => $shortname.'_liulbg',
    						'std' => '#ffffff',
    						'type' => 'color');

    	$options[] = array( 'desc' => __('Dropdown link color', 'gabfire'),
    						'id' => $shortname.'_lilicolor',
    						'std' => '#555555',
    						'type' => 'color');

    	$options[] = array( 'desc' => __('Dropdown hovered link color', 'gabfire'),
    						'id' => $shortname.'_lilihover',
    						'std' => '#000000',
    						'type' => 'color');

	return $options;
}