<?php
/* ********************
 * Load theme control panel
 * and framework files
 ******************************************************************** */
	if ( !function_exists( 'optionsframework_init' ) ) {
		define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/framework/admin/' );
		require_once dirname( __FILE__ ) . '/framework/admin/options-framework.php';

		// FRAMEWORK FILES
		get_template_part( 'framework/functions/misc-functions');
		get_template_part( 'framework/functions/breadcrumb');
		get_template_part( 'framework/functions/gabfire-media');

	}

/* ********************
 * Setup Theme
 ******************************************************************** */
if ( ! function_exists( 'gabfire_setup_theme' ) ) {
	function gabfire_setup_theme() {

		// Translations can be added to the inc/lang/ directory.
		load_theme_textdomain('gabfire', get_template_directory() . '/inc/lang');

		// Adds RSS feed links to <head> for posts and comments.
		add_theme_support( 'automatic-feed-links' );

		// Custom Navigation Suport
		add_theme_support( 'menus' );

		/*
		 * Switches default core markup for search form, comment form,
		 * and comments to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
		) );

		if ( ! isset( $content_width ) ) $content_width = 750;

		add_theme_support('custom-background');

		// This theme uses wp_nav_menu() in one location.
		register_nav_menu( 'primary', __( 'Navigation Menu', 'gabfire' ) );

		// Enable support for Post Thumbnails.
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 250, 250, true);
		add_image_size( 'z-post', 700, 350, true );
		add_image_size( 'figure', 415, 284, true );
		add_image_size( 'figure-single', 432, 296, true );
		add_image_size( 'small-figure', 70, 66, true );
		add_image_size( 'portfolio1', 263, 176, true );
		add_image_size( 'homeblog', 440, 175, true );
		add_image_size( 'post-nosidebar', 1030, 480, true );
		add_image_size( 'post-sidebar', 700, 380, true );
		add_image_size( 'loop-team', 700, 470, true );
		add_image_size( 'loop-portfolio', 1030, 542, true );

	}
	add_action( 'after_setup_theme', 'gabfire_setup_theme' );
}

/* ********************
 * Load theme styles and custom scripts
 ******************************************************************** */
	if ( !function_exists( 'gabfire_theme_scripts' ) ) {

		function gabfire_theme_scripts() {
			wp_enqueue_style('bootstrap', get_template_directory_uri() .'/framework/bootstrap/css/bootstrap.min.css');
			wp_enqueue_style('font-awesome', get_template_directory_uri() .'/framework/font-awesome/css/font-awesome.min.css');
			wp_enqueue_style('bootstrap-social', get_template_directory_uri() .'/css/bootstrap-social.css');
			wp_enqueue_style('colorbox-css', get_template_directory_uri() .'/css/colorbox.css');
			wp_enqueue_style('animate-css', get_template_directory_uri() .'/css/animate.css');
			//wp_enqueue_style('owl-carousel', get_template_directory_uri() .'/css/owl.carousel.css');
			//wp_enqueue_style('flat-ui', get_stylesheet_directory_uri() .'/css/flat-ui.css');  // adding FLAT UI to main header query
			wp_enqueue_style('theme-style', get_stylesheet_uri(), false);

			// NEW: Add Ion Icons
			wp_enqueue_style('ion-icons', get_template_directory_uri() .'/framework/ion-icons/css/ionicons.min.css');

			get_template_part( 'css/customizedcss', '' );

			wp_enqueue_script( 'jquery' );
			wp_enqueue_script('bootstrap', get_template_directory_uri() .'/framework/bootstrap/js/bootstrap.min.js');
			wp_enqueue_script('modernizr', get_template_directory_uri() .'/inc/js/modernizr.custom.js');
			wp_enqueue_script('responsive-nav', get_template_directory_uri() .'/inc/js/responsive-menu.js');
			//wp_enqueue_script('wow', get_template_directory_uri() .'/inc/js/wow.min.js');
			//wp_enqueue_script('shuffle', get_template_directory_uri() .'/inc/js/jquery.shuffle.min.js');
			wp_enqueue_script('jquery-colorbox', get_template_directory_uri() .'/inc/js/jquery.colorbox-min.js');
			//wp_enqueue_script('owl-carousel', get_template_directory_uri() .'/inc/js/owl.carousel.min.js');
			wp_enqueue_script('stellar', get_template_directory_uri() .'/inc/js/stellar.js');
			//wp_enqueue_script('froogaloop', '//f.vimeocdn.com/js/froogaloop2.min.js');
			//wp_enqueue_script('youtube-api', '//www.youtube.com/player_api');


			if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
				wp_enqueue_script( 'comment-reply' );
			}

			if(file_exists(get_stylesheet_directory() . '/custom.css')) {
				wp_enqueue_style('custom-style', get_stylesheet_directory_uri() .'/custom.css');
			} elseif(file_exists(get_template_directory_uri() . '/custom.css')) {
				wp_enqueue_style('custom-style', get_template_directory_uri() .'/custom.css');
			}

		}

		add_action( 'wp_enqueue_scripts', 'gabfire_theme_scripts' );
	}

/* ********************
 * Define content width
 ******************************************************************** */
	if ( ! isset( $content_width ) ) {
		$content_width = 900;
	}

 /* ********************
 * Get Youtube embed URL using actual bar
 ******************************************************************** */
	 if ( !function_exists( 'gabfire_get_youtubeembed' ) ) {
		function gabfire_get_youtubeembed($string,$autoplay=0)
		{
			preg_match('#(?:http://)?(?:www\.)?(?:youtube\.com/(?:v/|watch\?v=)|youtu\.be/)([\w-]+)(?:\S+)?#', $string, $match);
			$embed = "www.youtube.com/embed/$match[1]?autoplay=$autoplay";
			return str_replace($match[0], $embed, $string);
		}
	}

/* ********************
 * Initialize theme scripts
 ******************************************************************** */
	if ( !function_exists( 'gabfire_initialize_scripts' ) ) {

		function gabfire_initialize_scripts() {	?>

	<script type='text/javascript'>
	<!--
		(function($) {
			$(document).ready(function() {
				$(".children").parent("li").addClass("has-child-menu");
				$(".sub-menu").parent("li").addClass("has-child-menu");
				$(".drop").parent("li").addClass("has-child-menu");

				$('.mainnav li ul').hide().removeClass('fallback');
				$('.mainnav li').hover(
					function () {
						$('ul', this).stop().slideDown(250);
					},
					function () {
						$('ul', this).stop().slideUp(250);
					}
				);
				// Responsive Menu (TinyNav)
				$(".responsive_menu").tinyNav({
					active: 'current_page_item', // Set the "active" class for default menu
					label: ''
				});
				$(".tinynav").selectbox();
				$('a[href="#"]').attr('href', 'javascript:void(0)');
				/*Load css3 scripts when the objects are visible only */
				new WOW().init();

				/* initialize shuffle plugin */
				var $grid = $('#grid');

				/* Portfolio grid shuffle */
				$grid.shuffle({
					filtreable_itemSelector: '.filtreable_item' // the selector for the filtreable_items in the grid
				});

				/* reshuffle when user clicks a filter filtreable_item */
				$('#filter a').click(function (e) {
					e.preventDefault();

					// set sort_active class
					$('#filter a').removeClass('sort_active');
					$(this).addClass('sort_active');

					// get group name from clicked filtreable_item
					var groupName = $(this).attr('data-group');

					// reshuffle grid
					$grid.shuffle('shuffle', groupName );
				});

				/* Colorbox */
				$(".video_colorbox").colorbox({iframe:true, width:"66%", height:"80%"});

				/* Slide to ID & remove 80px as top offset (for navigation) when sliding down */
				$('a[href*=#]:not([href=#])').click(function() {
					if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') || location.hostname == this.hostname) {

						var target = $(this.hash);
						target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
						if (target.length) {
							$('html,body').animate({
								scrollTop: target.offset().top - 65
							}, 1000);
							return false;
						}
					}
				});

				/* Slide to Top */
				$('a[href=#top]').click(function(){	$('html, body').animate({scrollTop:0}, 'slow');	return false; });

				/* Initiate Parallax */
				$.stellar({
					horizontalScrolling: false,
						verticalOffset: 0
				});

				/* Services Carousel*/
				var owl1 = $(".carousel-one");
				owl1.owlCarousel({
				  pagination:false,
				  itemsDesktop : 	[2500,3],
				  itemsDesktopSmall : 	[974,2],
				  itemsMobile : 	[550,1],
				  mouseDrag: false,
				  touchDrag: false
				});
				$(".carousel-one-next").click(function(){
					owl1.trigger('owl.next');
				});
				$(".carousel-one-prev").click(function(){
					owl1.trigger('owl.prev');
				});

				/* Team Carousel */
				var owl2 = $(".carousel-two");
				owl2.owlCarousel({
				  pagination:false,
				  itemsDesktop : 	[2500,3],
				  itemsDesktopSmall : 	[974,2],
				  itemsMobile : 	[550,1],
				  mouseDrag: false,
				  touchDrag: false
				});
				$(".carousel-two-next").click(function(){
					owl2.trigger('owl.next');
				});
				$(".carousel-two-prev").click(function(){
					owl2.trigger('owl.prev');
				});

				/* InnerPage Slider */
				var owlfeatured = $(".carousel-owlfeatured");
				owlfeatured.owlCarousel({
				  autoPlay: 6000,
				  pagination:true,
				  singleItem : true,
				  autoHeight : false,
				  mouseDrag: false,
				  touchDrag: false
				});
				$(".carousel-fea-next").click(function(){
					owlfeatured.trigger('owl.next');
				});
				$(".carousel-fea-prev").click(function(){
					owlfeatured.trigger('owl.prev');
				});

				/* InnerPage Slider */
				var owl4 = $(".carousel-four");
				owl4.owlCarousel({
				  autoPlay: 999999,
				  pagination:true,
				  singleItem : true,
				  autoHeight : true,
				  mouseDrag: false,
				  touchDrag: false
				});
				$(".carousel-four-next").click(function(){
					owl4.trigger('owl.next');
				});
				$(".carousel-four-prev").click(function(){
					owl4.trigger('owl.prev');
				});

				/* Skillbar */
				$('.skillbar').each(function(){
					$(this).find('.skillbar-bar').animate({
						width:$(this).attr('data-percent')
					},6000);
				});

				/* Tooltip (date) for blog posts */
				$('.show_tooltip').tooltip();

				/*Video Controls*/
				$('.clear-screen').click(function() {
					$('.topslider-body').toggle("slide");
					$(this).find('i').toggleClass('fa-times fa-file-text-o');
				});
				$('.volume-switch').click(function() {
					$('.volume-switch').removeClass('hidden');
					$(this).addClass("hidden");
				});
				$('.playpause').click(function() {
					$('.playpause').removeClass('hidden');
					$(this).addClass("hidden");
				});

				/* Testimonials */
				$('.switch-content a').on("click", function(e) {
					e.preventDefault();
					var $this = $(this),
					  id = $this.attr('id'),
					  $content = $('.show-' + id);

					if (!$content.hasClass('hidden')) return;

					$content.removeClass('hidden').addClass('animated fadeIn');
					$('div[class*=show]').not($content).addClass('hidden');
					$('div[class*=show]').not($content).removeClass('animated fadeIn');
				});

				<?php if(is_home() or is_page_template('index-youtube.php') or is_page_template('index-vimeo.php') or is_page_template('index-bgslider.php') or is_page_template('index-callout.php')) { ?>
				/* Add remove classes on scroll */
				$(window).scroll(function () {
					var scrollPercentage = 90 * ($(this).scrollTop() / $('body').height());

					if (scrollPercentage >= 40){
						/*Show site navigation when scrolled down by 40% */
						$('#mainnav').removeClass('hidden');
						$('#mainnav').addClass('animated fadeInDown');
					} else {
						/* Hide navigation when scrolled back up */
						$('#mainnav').removeClass('animated fadeInDown');
						$('#mainnav').addClass('hidden');
						$('#mainnav #navitem-about').addClass('active');

						/* add active class to navitem-about when scrolling page down down by 40% */
						$('#mainnav #navitem-about').addClass('active');
					}
					if (scrollPercentage >= 140){
						/* remove active class from navitem-about when scrolling page over 140% */
						$('#mainnav #navitem-about').removeClass('active');
					}
				});
				<?php } ?>


				/*Vimeo Video*/
				/*
var iframe = document.getElementById('vimeo_video');

				// $f == Froogaloop
				var player = $f(iframe);

				// bind events
				var playButton = document.getElementById("vimeo-play");
				playButton.addEventListener("click", function() {
				  player.api("play");
				});

				var pauseButton = document.getElementById("vimeo-pause");
				pauseButton.addEventListener("click", function() {
				  player.api("pause");
				});

				var muteButton = document.getElementById("vimeo-mute");
				muteButton.addEventListener("click", function() {
				  player.api("setVolume", "0");
				});

				var unmuteButton = document.getElementById("vimeo-unmute");
				unmuteButton.addEventListener("click", function() {
				  player.api("setVolume", "0.4");
				});
*/

			});
		})(jQuery);

		/*Youtube Video*/
		var player;
		function onYouTubeIframeAPIReady() {player = new YT.Player('player');}
		if(window.opera){
			addEventListener('load', onYouTubeIframeAPIReady, false);
		}
	// -->
	</script>

		<?php
		}

		add_action("wp_head", "gabfire_initialize_scripts");
	}

/* ********************
 * Get number of Facebook Fans
 * <?php echo gabfire_fbcount('gabfire');?> User name
 * <?php echo gabfire_fbcount('330773148827'); ?> Profile ID
 ******************************************************************** */
function gabfire_fbcount( $value = '' ) {
	if($value){
		$url='http://api.facebook.com/method/fql.query?query=SELECT fan_count FROM page WHERE';

		if(is_numeric($value)) {
			$qry=' page_id="'.$value.'"';
		} else {
			$qry=' username="'.$value.'"';
		}

		$xml = @simplexml_load_file($url.$qry) or die ("invalid operation");

		$gabfire_fbcount = $xml->page->fan_count;
		return $gabfire_fbcount;

		} else {
			return '0';
		}
	}

/* ********************
 * Set number of entries per category
 ******************************************************************** */
	if ( ! function_exists( 'entrynr_perCat' ) ) {
		function entrynr_perCat( $query ) {
			if ( is_admin() || ! $query->is_main_query() )
				return;

			if ( is_category(explode(',', of_get_option('of_2col'))) ) {
				$query->set( 'posts_per_page', 6 );
				return;
			}

			if ( is_category(explode(',', of_get_option('of_2col_full'))) ) {
				$query->set( 'posts_per_page', 6 );
				return;
			}

			if ( is_category(explode(',', of_get_option('of_3col_full'))) ) {
				$query->set( 'posts_per_page', 12 );
				return;
			}

			if ( is_category(explode(',', of_get_option('of_4col_full'))) ) {
				$query->set( 'posts_per_page', 12 );
				return;
			}

			if ( is_category(explode(',', of_get_option('of_authorcat'))) ) {
				$query->set( 'posts_per_page', 6 );
				return;
			}

			if ( ( is_post_type_archive('portfolio') ) or  ( is_category(explode(',', of_get_option('of_w_slider'))) ) ) {
				$query->set( 'posts_per_page', 8 );
				return;
			}

			if ( is_post_type_archive('member') ) {
				$query->set( 'posts_per_page', 9 );
				return;
			}

		}
		add_action( 'pre_get_posts', 'entrynr_perCat', 1 );
	}

/* ********************
 * Custom field panels below text editor
 ******************************************************************** */
if ( !function_exists( 'gabfire_meta_box_add' ) ) {

	add_action( 'add_meta_boxes', 'gabfire_meta_box_add' );

	function gabfire_meta_box_add()
	{
		add_meta_box( '', __('Member Details', 'gabfire'), 'gabfire_meta_box_members', 'member', 'normal', 'high' );
		add_meta_box( '', __('Gabfire Custom Fields', 'gabfire'), 'gabfire_meta_box_post', 'portfolio', 'normal', 'high' );
		add_meta_box( '', __('Gabfire Custom Fields', 'gabfire'), 'gabfire_meta_box_post', 'post', 'normal', 'high' );
		add_meta_box( '', __('Gabfire Custom Fields', 'gabfire'), 'gabfire_meta_box_post', 'page', 'normal', 'high' );
	}

	/* Create Post and Page Custom Fields */
	function gabfire_meta_box_post( $post )
	{
		$values = get_post_custom( $post->ID );
		$video = isset( $values['iframe'] ) ? esc_attr( $values['iframe'][0] ) : '';
		$feapost = isset( $values['featured'] ) ? esc_attr( $values['featured'][0] ) : '';
		$audio = isset( $values['audio'] ) ? esc_attr( $values['audio'][0] ) : '';
		$postslider = isset( $values['disable_postslider'] ) ? esc_attr( $values['disable_postslider'][0] ) : '';
		$disable_feaimage = isset( $values['post_feaimage'] ) ? esc_attr( $values['post_feaimage'][0] ) : '';
		$subtitle = isset( $values['subtitle'] ) ? esc_attr( $values['subtitle'][0] ) : '';
		$selected = isset( $values['gabfire_post_template'] ) ? esc_attr( $values['gabfire_post_template'][0] ) : '';
		$technology_1 = isset( $values['technology_1'] ) ? esc_attr( $values['technology_1'][0] ) : '';
		$technology_2 = isset( $values['technology_1'] ) ? esc_attr( $values['technology_2'][0] ) : '';
		$technology_3 = isset( $values['technology_1'] ) ? esc_attr( $values['technology_3'][0] ) : '';
		$technology_4 = isset( $values['technology_1'] ) ? esc_attr( $values['technology_4'][0] ) : '';
		$technology_5 = isset( $values['technology_1'] ) ? esc_attr( $values['technology_5'][0] ) : '';
		$technology_6 = isset( $values['technology_1'] ) ? esc_attr( $values['technology_6'][0] ) : '';
		$client_name = isset( $values['client_name'] ) ? esc_attr( $values['client_name'][0] ) : '';
		$project_introduction = isset( $values['project_introduction'] ) ? esc_attr( $values['project_introduction'][0] ) : '';
		$project_date = isset( $values['project_date'] ) ? esc_attr( $values['project_date'][0] ) : '';
		$project_link = isset( $values['project_link'] ) ? esc_attr( $values['project_link'][0] ) : '';


		wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );
		?>

		<div class="gabfire_fieldgroup">
			<p class="gabfire_fieldcaption"><?php _e('Post Entrance', 'gabfire'); ?></p>

			<p class="gabfire_fieldrow">
				<label for="subtitle"><?php _e('Enter a paragraph of text to display with a larger font size above entry.','gabfire'); ?></label>
				<textarea class="gabfire_textinput" name="subtitle" id="subtitle"><?php echo $subtitle; ?></textarea>
			</p>
		</div>

		<?php if ( get_current_post_type() == 'portfolio' ) { ?>

			<div class="gabfire_fieldgroup fields_twoinputs">
				<p class="gabfire_fieldcaption"><?php _e('Project Details','gabfire'); ?></p>

				<p><small><?php _e('Enter the Project Details Below','gabfire'); ?></small></p>

				<p class="gabfire_fieldrow">
					<label for="project_introduction"><?php _e('Enter a short introduction about project','gabfire'); ?></label>
					<textarea class="gabfire_textinput" name="project_introduction" id="project_introduction"><?php echo $project_introduction; ?></textarea>
				</p>

				<p class="gabfire_fieldrow">
					<label for="client_name"><?php _e('Client Name / Date','gabfire'); ?></label>
					<input type="text" class="gabfire_textinput width_large" name="client_name" id="client_name" value="<?php echo $client_name; ?>" />
					<input type="text" class="gabfire_textinput width_small" name="project_date" id="project_date" value="<?php echo $project_date; ?>" />
				</p>

				<p class="gabfire_fieldrow">
					<label for="project_link"><?php _e('Enter the Link to Access This Project Online (include http://)','gabfire'); ?></label>
					<input type="text" class="gabfire_textinput" name="project_link" id="project_link" value="<?php echo $project_link; ?>" />
				</p>

				<p><small><?php _e('Enter the Technologies Used for this Project','gabfire'); ?></small></p>

				<p class="gabfire_fieldrow">
					<label for="technology_1"><?php _e('Technology #1 - #2','gabfire'); ?></label>
					<input type="text" class="gabfire_textinput width_equal" name="technology_1" id="technology_1" value="<?php echo $technology_1; ?>" />
					<input type="text" class="gabfire_textinput width_equal" name="technology_2" id="technology_2" value="<?php echo $technology_2; ?>" />
				</p>

				<p class="gabfire_fieldrow">
					<label for="technology_3"><?php _e('Technology #3 - #4','gabfire'); ?></label>
					<input type="text" class="gabfire_textinput width_equal" name="technology_3" id="technology_3" value="<?php echo $technology_3; ?>" />
					<input type="text" class="gabfire_textinput width_equal" name="technology_4" id="technology_4" value="<?php echo $technology_4; ?>" />
				</p>

				<p class="gabfire_fieldrow">
					<label for="technology_5"><?php _e('Technology #5 - #6','gabfire'); ?></label>
					<input type="text" class="gabfire_textinput width_equal" name="technology_5" id="technology_5" value="<?php echo $technology_5; ?>" />
					<input type="text" class="gabfire_textinput width_equal" name="technology_6" id="technology_6" value="<?php echo $technology_6; ?>" />
				</p>
			</div>

		<?php } ?>

		<div class="gabfire_fieldgroup">
			<p class="gabfire_fieldcaption"><?php _e('Video URL', 'gabfire'); ?></p>
			<p class="gabfire_fieldrow">
				<label for="iframe"><?php _e('You can add any Youtube, Vimeo, Dailymotion or Screenr video url into this box','gabfire'); ?></label>
				<input type="text" class="gabfire_textinput" name="iframe" id="iframe" value="<?php echo $video; ?>" />
			</p>
		</div>

		<div class="gabfire_fieldgroup">
			<p class="gabfire_fieldcaption"><?php _e('Post Layout?', 'gabfire'); ?></p>
			<p>
				<label for="gabfire_post_template"><?php _e('Select a Post layout</br><strong>Note:</strong> Select Big Picture only if you have uploaded more than 1 photo','gabfire'); ?></label>

				<select name="gabfire_post_template" id="gabfire_post_template">
					<?php
					$posttemplate = get_post_meta( get_the_ID(), 'gabfire_post_template', true );
					if ( get_current_post_type() == 'portfolio' ) { ?>
						<option value="portfolio" <?php if ($posttemplate == '') { selected( $selected, 'portfolio' ); } ?>><?php _e('Portfolio','gabfire'); ?></option>
					<?php } ?>
					<option value="default" <?php selected( $selected, 'defaults' ); ?>><?php _e('Default Blog Post','gabfire'); ?></option>
					<option value="bigpicture" <?php selected( $selected, 'bigpicture' ); ?>><?php _e('Big Picture','gabfire'); ?></option>
					<option value="leftsidebar" <?php selected( $selected, 'leftsidebar' ); ?>><?php _e('Left Sidebar','gabfire'); ?></option>
					<option value="fullwidth" <?php selected( $selected, 'fullwidth' ); ?>><?php _e('No Sidebar','gabfire'); ?></option>

					<!-- CP: Added the Plugin Post Layout -->
					<option value="plugin" <?php selected( $selected, 'plugin' ); ?>><?php _e('Plugin Layout','gabfire'); ?></option>
					<option value="narrow" <?php selected( $selected, 'narrow' ); ?>><?php _e('Narrow Layout','gabfire'); ?></option>


				</select>
			</p>
		</div>

		<?php if ( (  get_current_post_type() == 'portfolio' ) or  ( get_current_post_type() == 'post' ) or  ( get_current_post_type() == 'page' ) ){ ?>

			<div class="gabfire_fieldgroup field_checkbox">
				<p class="gabfire_fieldcaption"><?php _e('Disable Featured Image on this post?', 'gabfire'); ?></p>
				<p class="gabfire_fieldrow">
					<label for="post_feaimage"><?php _e('If you have enabled featured post on single post page option, the featured image shows at top of every post automatically. You may check this box to disable that image for certain posts.','gabfire'); ?></label>
					<span class="gabfire_checkbox"><input type="checkbox" id="post_feaimage" name="post_feaimage" <?php checked( $disable_feaimage, 'true' ); ?> /></span>
				</p>
			</div>

			<div class="gabfire_fieldgroup field_checkbox">
				<p class="gabfire_fieldcaption"><?php _e('Disable innerpage slider for this post', 'gabfire'); ?></p>
				<p class="gabfire_fieldrow">
					<label for="disable_postslider"><?php _e('If you have enabled innerpage slider sitewide, but specifically want to disable it for this post, check this box.','gabfire'); ?></label>
					<span class="gabfire_checkbox"><input type="checkbox" id="disable_postslider" name="disable_postslider" <?php checked( $postslider, 'true' ); ?> /></span>
				</p>
			</div>
		<?php
		}
	}

	/* Create Members Fields */
	function gabfire_meta_box_members( $post )
	{
		$values = get_post_custom( $post->ID );
		$position = isset( $values['position'] ) ? esc_attr( $values['position'][0] ) : '';
		$facebook = isset( $values['facebook'] ) ? esc_attr( $values['facebook'][0] ) : '';
		$twitter = isset( $values['twitter'] ) ? esc_attr( $values['twitter'][0] ) : '';
		$linkedin = isset( $values['linkedin'] ) ? esc_attr( $values['linkedin'][0] ) : '';
		$phone = isset( $values['phone'] ) ? esc_attr( $values['phone'][0] ) : '';
		$email = isset( $values['email'] ) ? esc_attr( $values['email'][0] ) : '';
		$portfolio_tag = isset( $values['portfolio_tag'] ) ? esc_attr( $values['portfolio_tag'][0] ) : '';
		$skill_1 = isset( $values['skill_1'] ) ? esc_attr( $values['skill_1'][0] ) : '';
		$skill_1_percentage = isset( $values['skill_1_percentage'] ) ? esc_attr( $values['skill_1_percentage'][0] ) : '';
		$skill_2 = isset( $values['skill_2'] ) ? esc_attr( $values['skill_2'][0] ) : '';
		$skill_2_percentage = isset( $values['skill_2_percentage'] ) ? esc_attr( $values['skill_2_percentage'][0] ) : '';
		$skill_3 = isset( $values['skill_3'] ) ? esc_attr( $values['skill_3'][0] ) : '';
		$skill_3_percentage = isset( $values['skill_3_percentage'] ) ? esc_attr( $values['skill_3_percentage'][0] ) : '';
		$skill_4 = isset( $values['skill_4'] ) ? esc_attr( $values['skill_4'][0] ) : '';
		$skill_4_percentage = isset( $values['skill_4_percentage'] ) ? esc_attr( $values['skill_4_percentage'][0] ) : '';
		$skill_5 = isset( $values['skill_5'] ) ? esc_attr( $values['skill_5'][0] ) : '';
		$skill_5_percentage = isset( $values['skill_5_percentage'] ) ? esc_attr( $values['skill_5_percentage'][0] ) : '';
		$skill_6 = isset( $values['skill_6'] ) ? esc_attr( $values['skill_6'][0] ) : '';
		$skill_6_percentage = isset( $values['skill_6_percentage'] ) ? esc_attr( $values['skill_6_percentage'][0] ) : '';
		$experience_1 = isset( $values['experience_1'] ) ? esc_attr( $values['experience_1'][0] ) : '';
		$experience_1_period = isset( $values['experience_1_period'] ) ? esc_attr( $values['experience_1_period'][0] ) : '';
		$experience_1_decription = isset( $values['experience_1_decription'] ) ? esc_attr( $values['experience_1_decription'][0] ) : '';
		$experience_2 = isset( $values['experience_2'] ) ? esc_attr( $values['experience_2'][0] ) : '';
		$experience_2_period = isset( $values['experience_2_period'] ) ? esc_attr( $values['experience_2_period'][0] ) : '';
		$experience_2_decription = isset( $values['experience_2_decription'] ) ? esc_attr( $values['experience_2_decription'][0] ) : '';
		$experience_3 = isset( $values['experience_3'] ) ? esc_attr( $values['experience_3'][0] ) : '';
		$experience_3_period = isset( $values['experience_3_period'] ) ? esc_attr( $values['experience_3_period'][0] ) : '';
		$experience_3_decription = isset( $values['experience_3_decription'] ) ? esc_attr( $values['experience_3_decription'][0] ) : '';
		$experience_4 = isset( $values['experience_4'] ) ? esc_attr( $values['experience_4'][0] ) : '';
		$experience_4_period = isset( $values['experience_4_period'] ) ? esc_attr( $values['experience_4_period'][0] ) : '';
		$experience_4_decription = isset( $values['experience_4_decription'] ) ? esc_attr( $values['experience_4_decription'][0] ) : '';
		$additional_info_title = isset( $values['additional_info_title'] ) ? esc_attr( $values['additional_info_title'][0] ) : '';
		$additional_info_text = isset( $values['additional_info_text'] ) ? esc_attr( $values['additional_info_text'][0] ) : '';
		$education_1 = isset( $values['education_1'] ) ? esc_attr( $values['education_1'][0] ) : '';
		$education_1_period = isset( $values['education_1_period'] ) ? esc_attr( $values['education_1_period'][0] ) : '';
		$education_1_decription = isset( $values['education_1_decription'] ) ? esc_attr( $values['education_1_decription'][0] ) : '';
		$education_2 = isset( $values['education_2'] ) ? esc_attr( $values['education_2'][0] ) : '';
		$education_2_period = isset( $values['education_2_period'] ) ? esc_attr( $values['education_2_period'][0] ) : '';
		$education_2_decription = isset( $values['education_2_decription'] ) ? esc_attr( $values['education_2_decription'][0] ) : '';
		$education_3 = isset( $values['education_3'] ) ? esc_attr( $values['education_3'][0] ) : '';
		$education_3_period = isset( $values['education_3_period'] ) ? esc_attr( $values['education_3_period'][0] ) : '';
		$education_3_decription = isset( $values['education_3_decription'] ) ? esc_attr( $values['education_3_decription'][0] ) : '';
		$education_4 = isset( $values['education_4'] ) ? esc_attr( $values['education_4'][0] ) : '';
		$education_4_period = isset( $values['education_4_period'] ) ? esc_attr( $values['education_4_period'][0] ) : '';
		$education_4_decription = isset( $values['education_4_decription'] ) ? esc_attr( $values['education_4_decription'][0] ) : '';

		wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );
		?>
		<p><small><?php _e('Leave it empty to disable a field','gabfire'); ?></small></p>


		<div class="gabfire_fieldgroup">
			<p class="gabfire_fieldcaption"><?php _e('Position','gabfire'); ?></p>

			<p class="gabfire_fieldrow">
				<label for="position"><?php _e('Position of Team Member','gabfire'); ?></label>
				<input type="text" class="gabfire_textinput" name="position" id="position" value="<?php echo $position; ?>" />
			</p>
		</div>

		<div class="gabfire_fieldgroup">
			<p class="gabfire_fieldcaption"><?php _e('Social Links & Contact','gabfire'); ?></p>

			<p class="gabfire_fieldrow">
				<label for="facebook"><?php _e('Link to Facebook Account','gabfire'); ?></label>
				<input type="text" class="gabfire_textinput" name="facebook" id="facebook" value="<?php echo $facebook; ?>" />
			</p>

			<p class="gabfire_fieldrow">
				<label for="twitter"><?php _e('Link to Twitter Account','gabfire'); ?></label>
				<input type="text" class="gabfire_textinput" name="twitter" id="twitter" value="<?php echo $twitter; ?>" />
			</p>

			<p class="gabfire_fieldrow">
				<label for="linkedin"><?php _e('Link to LinkedIn Account','gabfire'); ?></label>
				<input type="text" class="gabfire_textinput" name="linkedin" id="linkedin" value="<?php echo $linkedin; ?>" />
			</p>

			<p class="gabfire_fieldrow">
				<label for="phone"><?php _e('Phone Number','gabfire'); ?></label>
				<input type="text" class="gabfire_textinput" name="phone" id="phone" value="<?php echo $phone; ?>" />
			</p>

			<p class="gabfire_fieldrow">
				<label for="email"><?php _e('Email','gabfire'); ?></label>
				<input type="text" class="gabfire_textinput" name="email" id="email" value="<?php echo $email; ?>" />
			</p>
		</div>

		<div class="gabfire_fieldgroup fields_twoinputs">
			<p class="gabfire_fieldcaption"><?php _e('Education','gabfire'); ?></p>
			<p><small><?php _e('From Oldest to Newest','gabfire'); ?></small></p>

			<p class="gabfire_fieldrow">
				<label for="education_1"><?php _e('Education #1 (Schooll Name and Study Period)','gabfire'); ?></label>
				<input type="text" class="gabfire_textinput width_large" name="education_1" id="education_1" value="<?php echo $education_1; ?>" />
				<input type="text" class="gabfire_textinput width_small gabfire_right" name="education_1_period" id="education_1_period" value="<?php echo $education_1_period; ?>" />
			</p>

			<p class="gabfire_fieldrow">
				<label for="education_1_decription"><?php _e('Description for Education #1','gabfire'); ?></label>
				<textarea class="gabfire_textinput"  name="education_1_decription" id="education_1_decription"><?php echo $education_1_decription; ?></textarea>
			</p>

			<p class="gabfire_fieldrow">
				<label for="education_2"><?php _e('Education #2 (Schooll Name and Study Period)','gabfire'); ?></label>
				<input type="text" class="gabfire_textinput width_large" name="education_2" id="education_2" value="<?php echo $education_2; ?>" />
				<input type="text" class="gabfire_textinput width_small gabfire_right" name="education_2_period" id="education_2_period" value="<?php echo $education_2_period; ?>" />
			</p>

			<p class="gabfire_fieldrow">
				<label for="education_2_decription"><?php _e('Description for Education #2','gabfire'); ?></label>
				<textarea class="gabfire_textinput"  name="education_2_decription" id="education_2_decription"><?php echo $education_2_decription; ?></textarea>
			</p>

			<p class="gabfire_fieldrow">
				<label for="education_3"><?php _e('Education #3 (Schooll Name and Study Period)','gabfire'); ?></label>
				<input type="text" class="gabfire_textinput width_large" name="education_3" id="education_3" value="<?php echo $education_3; ?>" />
				<input type="text" class="gabfire_textinput width_small gabfire_right" name="education_3_period" id="education_3_period" value="<?php echo $education_3_period; ?>" />
			</p>

			<p class="gabfire_fieldrow">
				<label for="education_3_decription"><?php _e('Description for Education #3','gabfire'); ?></label>
				<textarea class="gabfire_textinput"  name="education_3_decription" id="education_3_decription"><?php echo $education_3_decription; ?></textarea>
			</p>

			<p class="gabfire_fieldrow">
				<label for="education_4"><?php _e('Education #4 (Schooll Name and Study Period)','gabfire'); ?></label>
				<input type="text" class="gabfire_textinput width_large" name="education_4" id="education_4" value="<?php echo $education_4; ?>" />
				<input type="text" class="gabfire_textinput width_small gabfire_right" name="education_4_period" id="education_4_period" value="<?php echo $education_4_period; ?>" />
			</p>

			<p class="gabfire_fieldrow">
				<label for="education_4_decription"><?php _e('Description for Education #4','gabfire'); ?></label>
				<textarea class="gabfire_textinput"  name="education_4_decription" id="education_4_decription"><?php echo $education_4_decription; ?></textarea>
			</p>

			<p class="gabfire_fieldrow">
				<label for="additional_info_title"><?php _e('Additional Info Title -  Below education Fields','gabfire'); ?></label>
				<input type="text" class="gabfire_textinput" name="additional_info_title" id="additional_info_title" value="<?php echo $additional_info_title; ?>" />
			</p>

			<p class="gabfire_fieldrow">
				<label for="additional_info_text"><?php _e('Additional Info Body -  Below education Fields','gabfire'); ?></label>
				<textarea class="gabfire_textinput"  name="additional_info_text" id="additional_info_text"><?php echo $additional_info_text; ?></textarea>
			</p>
		</div>

		<div class="gabfire_fieldgroup fields_twoinputs">
			<p class="gabfire_fieldcaption"><?php _e('Experience','gabfire'); ?></p>
			<p><small><?php _e('From Newest to Oldest','gabfire'); ?></small></p>

			<p class="gabfire_fieldrow">
				<label for="experience_1"><?php _e('Experience #1 (Company Name and Working Period)','gabfire'); ?></label>
				<input type="text" class="gabfire_textinput width_large" name="experience_1" id="experience_1" value="<?php echo $experience_1; ?>" />
				<input type="text" class="gabfire_textinput width_small gabfire_right" name="experience_1_period" id="experience_1_period" value="<?php echo $experience_1_period; ?>" />
			</p>

			<p class="gabfire_fieldrow">
				<label for="experience_1_decription"><?php _e('Description for Experience #1','gabfire'); ?></label>
				<textarea class="gabfire_textinput"  name="experience_1_decription" id="experience_1_decription"><?php echo $experience_1_decription; ?></textarea>
			</p>

			<p class="gabfire_fieldrow">
				<label for="experience_2"><?php _e('Experience #2 (Company Name and Working Period)','gabfire'); ?></label>
				<input type="text" class="gabfire_textinput width_large" name="experience_2" id="experience_2" value="<?php echo $experience_2; ?>" />
				<input type="text" class="gabfire_textinput width_small gabfire_right" name="experience_2_period" id="experience_2_period" value="<?php echo $experience_2_period; ?>" />
			</p>

			<p class="gabfire_fieldrow">
				<label for="experience_2_decription"><?php _e('Description for Experience #2','gabfire'); ?></label>
				<textarea class="gabfire_textinput"  name="experience_2_decription" id="experience_2_decription"><?php echo $experience_2_decription; ?></textarea>
			</p>

			<p class="gabfire_fieldrow">
				<label for="experience_3"><?php _e('Experience #3 (Company Name and Working Period)','gabfire'); ?></label>
				<input type="text" class="gabfire_textinput width_large" name="experience_3" id="experience_3" value="<?php echo $experience_3; ?>" />
				<input type="text" class="gabfire_textinput width_small gabfire_right" name="experience_3_period" id="experience_3_period" value="<?php echo $experience_3_period; ?>" />
			</p>

			<p class="gabfire_fieldrow">
				<label for="experience_3_decription"><?php _e('Description for Experience #3','gabfire'); ?></label>
				<textarea class="gabfire_textinput"  name="experience_3_decription" id="experience_3_decription"><?php echo $experience_3_decription; ?></textarea>
			</p>

			<p class="gabfire_fieldrow">
				<label for="experience_4"><?php _e('Experience #4 (Company Name and Working Period)','gabfire'); ?></label>
				<input type="text" class="gabfire_textinput width_large" name="experience_4" id="experience_4" value="<?php echo $experience_4; ?>" />
				<input type="text" class="gabfire_textinput width_small gabfire_right" name="experience_4_period" id="experience_4_period" value="<?php echo $experience_4_period; ?>" />
			</p>

			<p class="gabfire_fieldrow">
				<label for="experience_4_decription"><?php _e('Description for Experience #4','gabfire'); ?></label>
				<textarea class="gabfire_textinput"  name="experience_4_decription" id="experience_4_decription"><?php echo $experience_4_decription; ?></textarea>
			</p>
		</div>

		<div class="gabfire_fieldgroup fields_twoinputs">
			<p class="gabfire_fieldcaption"><?php _e('Skills Name and Percentage','gabfire'); ?></p>
			<p><small><?php _e('Do not enter percent symbol into percentage field','gabfire'); ?></small></p>
			<p class="gabfire_fieldrow">
				<label for="skill_1"><?php _e('Skill #1','gabfire'); ?></label>
				<input type="text" class="gabfire_textinput width_large" name="skill_1" id="skill_1" value="<?php echo $skill_1; ?>" />
				<input type="text" class="gabfire_textinput width_small gabfire_right" name="skill_1_percentage" id="skill_1_percentage" value="<?php echo $skill_1_percentage; ?>" />
			</p>

			<p class="gabfire_fieldrow">
				<label for="skill_2"><?php _e('Skill #2','gabfire'); ?></label>
				<input type="text" class="gabfire_textinput width_large" name="skill_2" id="skill_2" value="<?php echo $skill_2; ?>" />
				<input type="text" class="gabfire_textinput width_small gabfire_right" name="skill_2_percentage" id="skill_2_percentage" value="<?php echo $skill_2_percentage; ?>" />
			</p>

			<p class="gabfire_fieldrow">
				<label for="skill_3"><?php _e('Skill #3','gabfire'); ?></label>
				<input type="text" class="gabfire_textinput width_large" name="skill_3" id="skill_3" value="<?php echo $skill_3; ?>" />
				<input type="text" class="gabfire_textinput width_small gabfire_right" name="skill_3_percentage" id="skill_3_percentage" value="<?php echo $skill_3_percentage; ?>" />
			</p>

			<p class="gabfire_fieldrow">
				<label for="skill_4"><?php _e('Skill #4','gabfire'); ?></label>
				<input type="text" class="gabfire_textinput width_large" name="skill_4" id="skill_4" value="<?php echo $skill_4; ?>" />
				<input type="text" class="gabfire_textinput width_small gabfire_right" name="skill_4_percentage" id="skill_4_percentage" value="<?php echo $skill_4_percentage; ?>" />
			</p>

			<p class="gabfire_fieldrow">
				<label for="skill_5"><?php _e('Skill #5','gabfire'); ?></label>
				<input type="text" class="gabfire_textinput width_large" name="skill_5" id="skill_5" value="<?php echo $skill_5; ?>" />
				<input type="text" class="gabfire_textinput width_small gabfire_right" name="skill_5_percentage" id="skill_5_percentage" value="<?php echo $skill_5_percentage; ?>" />
			</p>

			<p class="gabfire_fieldrow">
				<label for="skill_6"><?php _e('Skill #6','gabfire'); ?></label>
				<input type="text" class="gabfire_textinput width_large" name="skill_6" id="skill_6" value="<?php echo $skill_6; ?>" />
				<input type="text" class="gabfire_textinput width_small gabfire_right" name="skill_6_percentage" id="skill_6_percentage" value="<?php echo $skill_6_percentage; ?>" />
			</p>
		</div>

		<div class="gabfire_fieldgroup">
			<p class="gabfire_fieldcaption"><?php _e('Portfolio Tag','gabfire'); ?></p>
			<p><small><?php _e('Enter ID number(s) of Portfolio Tags to Query Posts from','gabfire'); ?></small></p>
			<p class="gabfire_fieldrow">
				<label for="portfolio_tag"><?php _e('Enter a Tag to Query Portfolio Entries From','gabfire'); ?></label>
				<input type="text" class="gabfire_textinput" name="portfolio_tag" id="portfolio_tag" value="<?php echo $portfolio_tag; ?>" />
			</p>
		</div>

		<?php
	}

	add_action( 'save_post', 'gabfire_meta_box_save' );
	function gabfire_meta_box_save( $post_id )
	{
		// Bail if we're doing an auto save
		if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

		// if our nonce isn't there, or we can't verify it, bail
		if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'my_meta_box_nonce' ) ) return;

		// if our current user can't edit this post, bail
		if( !current_user_can( 'edit_post' ) ) return;

		// now we can actually save the data
		$allowed = array(
			'a' => array( // on allow a tags
				'href' => array() // and those anchords can only have href attribute
			)
		);

		if ( ( get_current_post_type() == 'portfolio' ) or  ( get_current_post_type() == 'post' ) or  ( get_current_post_type() == 'page' ) ){

			if( isset( $_POST['iframe'] ) && !empty( $_POST['iframe'] ) )
				update_post_meta( $post_id, 'iframe', wp_kses( $_POST['iframe'], $allowed ) );

			if( isset( $_POST['gabfire_post_template'] ) && !empty( $_POST['gabfire_post_template'] ) )
				update_post_meta( $post_id, 'gabfire_post_template', esc_attr( $_POST['gabfire_post_template'] ) );

			if( isset( $_POST['subtitle'] ) && !empty( $_POST['subtitle'] ) )
				update_post_meta( $post_id, 'subtitle', wp_kses( $_POST['subtitle'], $allowed ) );

			$chk3 = isset( $_POST['disable_postslider'] ) && $_POST['disable_postslider'] ? 'true' : 'false';
			update_post_meta( $post_id, 'disable_postslider', $chk3 );

			$chk2 = isset( $_POST['post_feaimage'] ) && $_POST['post_feaimage'] ? 'true' : 'false';
			update_post_meta( $post_id, 'post_feaimage', $chk2 );

		}

		if (  get_current_post_type() == 'portfolio' ) {

			if( isset( $_POST['technology_1'] ) && !empty( $_POST['technology_1'] ) )
				update_post_meta( $post_id, 'technology_1', wp_kses( $_POST['technology_1'], $allowed ) );

			if( isset( $_POST['technology_2'] ) && !empty( $_POST['technology_2'] ) )
				update_post_meta( $post_id, 'technology_2', wp_kses( $_POST['technology_2'], $allowed ) );

			if( isset( $_POST['technology_3'] ) && !empty( $_POST['technology_3'] ) )
				update_post_meta( $post_id, 'technology_3', wp_kses( $_POST['technology_3'], $allowed ) );

			if( isset( $_POST['technology_4'] ) && !empty( $_POST['technology_4'] ) )
				update_post_meta( $post_id, 'technology_4', wp_kses( $_POST['technology_4'], $allowed ) );

			if( isset( $_POST['technology_5'] ) && !empty( $_POST['technology_5'] ) )
				update_post_meta( $post_id, 'technology_5', wp_kses( $_POST['technology_5'], $allowed ) );

			if( isset( $_POST['technology_6'] ) && !empty( $_POST['technology_6'] ) )
				update_post_meta( $post_id, 'technology_6', wp_kses( $_POST['technology_6'], $allowed ) );

			if( isset( $_POST['client_name'] ) && !empty( $_POST['client_name'] ) )
				update_post_meta( $post_id, 'client_name', wp_kses( $_POST['client_name'], $allowed ) );

			if( isset( $_POST['project_introduction'] ) && !empty( $_POST['project_introduction'] ) )
				update_post_meta( $post_id, 'project_introduction', wp_kses( $_POST['project_introduction'], $allowed ) );

			if( isset( $_POST['project_date'] ) && !empty( $_POST['project_date'] ) )
				update_post_meta( $post_id, 'project_date', wp_kses( $_POST['project_date'], $allowed ) );

			if( isset( $_POST['project_link'] ) && !empty( $_POST['project_link'] ) )
				update_post_meta( $post_id, 'project_link', wp_kses( $_POST['project_link'], $allowed ) );

		}

		if ( get_current_post_type() == 'member' ) {
			/* Team members field */
			if( isset( $_POST['position'] ) && !empty( $_POST['position'] ) )
				update_post_meta( $post_id, 'position', wp_kses( $_POST['position'], $allowed ) );

			if( isset( $_POST['facebook'] ) && !empty( $_POST['facebook'] ) )
				update_post_meta( $post_id, 'facebook', wp_kses( $_POST['facebook'], $allowed ) );

			if( isset( $_POST['twitter'] ) && !empty( $_POST['twitter'] ) )
				update_post_meta( $post_id, 'twitter', wp_kses( $_POST['twitter'], $allowed ) );

			if( isset( $_POST['linkedin'] ) && !empty( $_POST['linkedin'] ) )
				update_post_meta( $post_id, 'linkedin', wp_kses( $_POST['linkedin'], $allowed ) );

			if( isset( $_POST['linkedin'] ) && !empty( $_POST['linkedin'] ) )
				update_post_meta( $post_id, 'linkedin', wp_kses( $_POST['linkedin'], $allowed ) );

			if( isset( $_POST['phone'] ) && !empty( $_POST['phone'] ) )
				update_post_meta( $post_id, 'phone', wp_kses( $_POST['phone'], $allowed ) );

			if( isset( $_POST['email'] ) && !empty( $_POST['email'] ) )
				update_post_meta( $post_id, 'email', wp_kses( $_POST['email'], $allowed ) );

			if( isset( $_POST['skill_1'] ) && !empty( $_POST['skill_1'] ) )
				update_post_meta( $post_id, 'skill_1', wp_kses( $_POST['skill_1'], $allowed ) );

			if( isset( $_POST['skill_1_percentage'] ) && !empty( $_POST['skill_1_percentage'] ) )
				update_post_meta( $post_id, 'skill_1_percentage', wp_kses( $_POST['skill_1_percentage'], $allowed ) );

			if( isset( $_POST['skill_2'] ) && !empty( $_POST['skill_2'] ) )
				update_post_meta( $post_id, 'skill_2', wp_kses( $_POST['skill_2'], $allowed ) );

			if( isset( $_POST['skill_2_percentage'] ) && !empty( $_POST['skill_2_percentage'] ) )
				update_post_meta( $post_id, 'skill_2_percentage', wp_kses( $_POST['skill_2_percentage'], $allowed ) );

			if( isset( $_POST['skill_3'] ) && !empty( $_POST['skill_3'] ) )
				update_post_meta( $post_id, 'skill_3', wp_kses( $_POST['skill_3'], $allowed ) );

			if( isset( $_POST['skill_3_percentage'] ) && !empty( $_POST['skill_3_percentage'] ) )
				update_post_meta( $post_id, 'skill_3_percentage', wp_kses( $_POST['skill_3_percentage'], $allowed ) );

			if( isset( $_POST['skill_4'] ) && !empty( $_POST['skill_4'] ) )
				update_post_meta( $post_id, 'skill_4', wp_kses( $_POST['skill_4'], $allowed ) );

			if( isset( $_POST['skill_4_percentage'] ) && !empty( $_POST['skill_4_percentage'] ) )
				update_post_meta( $post_id, 'skill_4_percentage', wp_kses( $_POST['skill_4_percentage'], $allowed ) );

			if( isset( $_POST['skill_5'] ) && !empty( $_POST['skill_5'] ) )
				update_post_meta( $post_id, 'skill_5', wp_kses( $_POST['skill_5'], $allowed ) );

			if( isset( $_POST['skill_5_percentage'] ) && !empty( $_POST['skill_5_percentage'] ) )
				update_post_meta( $post_id, 'skill_5_percentage', wp_kses( $_POST['skill_5_percentage'], $allowed ) );

			if( isset( $_POST['skill_6'] ) && !empty( $_POST['skill_6'] ) )
				update_post_meta( $post_id, 'skill_6', wp_kses( $_POST['skill_6'], $allowed ) );

			if( isset( $_POST['skill_6_percentage'] ) && !empty( $_POST['skill_6_percentage'] ) )
				update_post_meta( $post_id, 'skill_6_percentage', wp_kses( $_POST['skill_6_percentage'], $allowed ) );

			if( isset( $_POST['additional_info_title'] ) && !empty( $_POST['additional_info_title'] ) )
				update_post_meta( $post_id, 'additional_info_title', wp_kses( $_POST['additional_info_title'], $allowed ) );

			if( isset( $_POST['additional_info_text'] ) && !empty( $_POST['additional_info_text'] ) )
				update_post_meta( $post_id, 'additional_info_text', wp_kses( $_POST['additional_info_text'], $allowed ) );

			if( isset( $_POST['experience_1'] ) && !empty( $_POST['experience_1'] ) )
				update_post_meta( $post_id, 'experience_1', wp_kses( $_POST['experience_1'], $allowed ) );

			if( isset( $_POST['experience_1_period'] ) && !empty( $_POST['experience_1_period'] ) )
				update_post_meta( $post_id, 'experience_1_period', wp_kses( $_POST['experience_1_period'], $allowed ) );

			if( isset( $_POST['experience_1_decription'] ) && !empty( $_POST['experience_1_decription'] ) )
				update_post_meta( $post_id, 'experience_1_decription', wp_kses( $_POST['experience_1_decription'], $allowed ) );

			if( isset( $_POST['experience_2'] ) && !empty( $_POST['experience_2'] ) )
				update_post_meta( $post_id, 'experience_2', wp_kses( $_POST['experience_2'], $allowed ) );

			if( isset( $_POST['experience_2_period'] ) && !empty( $_POST['experience_2_period'] ) )
				update_post_meta( $post_id, 'experience_2_period', wp_kses( $_POST['experience_2_period'], $allowed ) );

			if( isset( $_POST['experience_2_decription'] ) && !empty( $_POST['experience_2_decription'] ) )
				update_post_meta( $post_id, 'experience_2_decription', wp_kses( $_POST['experience_2_decription'], $allowed ) );

			if( isset( $_POST['experience_3'] ) && !empty( $_POST['experience_3'] ) )
				update_post_meta( $post_id, 'experience_3', wp_kses( $_POST['experience_3'], $allowed ) );

			if( isset( $_POST['experience_3_period'] ) && !empty( $_POST['experience_3_period'] ) )
				update_post_meta( $post_id, 'experience_3_period', wp_kses( $_POST['experience_3_period'], $allowed ) );

			if( isset( $_POST['experience_3_decription'] ) && !empty( $_POST['experience_3_decription'] ) )
				update_post_meta( $post_id, 'experience_3_decription', wp_kses( $_POST['experience_3_decription'], $allowed ) );

			if( isset( $_POST['experience_4'] ) && !empty( $_POST['experience_4'] ) )
				update_post_meta( $post_id, 'experience_4', wp_kses( $_POST['experience_4'], $allowed ) );

			if( isset( $_POST['experience_4_period'] ) && !empty( $_POST['experience_4_period'] ) )
				update_post_meta( $post_id, 'experience_4_period', wp_kses( $_POST['experience_4_period'], $allowed ) );

			if( isset( $_POST['experience_4_decription'] ) && !empty( $_POST['experience_4_decription'] ) )
				update_post_meta( $post_id, 'experience_4_decription', wp_kses( $_POST['experience_4_decription'], $allowed ) );

			if( isset( $_POST['education_1'] ) && !empty( $_POST['education_1'] ) )
				update_post_meta( $post_id, 'education_1', wp_kses( $_POST['education_1'], $allowed ) );

			if( isset( $_POST['education_1_period'] ) && !empty( $_POST['education_1_period'] ) )
				update_post_meta( $post_id, 'education_1_period', wp_kses( $_POST['education_1_period'], $allowed ) );

			if( isset( $_POST['education_1_decription'] ) && !empty( $_POST['education_1_decription'] ) )
				update_post_meta( $post_id, 'education_1_decription', wp_kses( $_POST['education_1_decription'], $allowed ) );

			if( isset( $_POST['education_2'] ) && !empty( $_POST['education_2'] ) )
				update_post_meta( $post_id, 'education_2', wp_kses( $_POST['education_2'], $allowed ) );

			if( isset( $_POST['education_2_period'] ) && !empty( $_POST['education_2_period'] ) )
				update_post_meta( $post_id, 'education_2_period', wp_kses( $_POST['education_2_period'], $allowed ) );

			if( isset( $_POST['education_2_decription'] ) && !empty( $_POST['education_2_decription'] ) )
				update_post_meta( $post_id, 'education_2_decription', wp_kses( $_POST['education_2_decription'], $allowed ) );

			if( isset( $_POST['education_3'] ) && !empty( $_POST['education_3'] ) )
				update_post_meta( $post_id, 'education_3', wp_kses( $_POST['education_3'], $allowed ) );

			if( isset( $_POST['education_3_period'] ) && !empty( $_POST['education_3_period'] ) )
				update_post_meta( $post_id, 'education_3_period', wp_kses( $_POST['education_3_period'], $allowed ) );

			if( isset( $_POST['education_3_decription'] ) && !empty( $_POST['education_3_decription'] ) )
				update_post_meta( $post_id, 'education_3_decription', wp_kses( $_POST['education_3_decription'], $allowed ) );

			if( isset( $_POST['education_4'] ) && !empty( $_POST['education_4'] ) )
				update_post_meta( $post_id, 'education_4', wp_kses( $_POST['education_4'], $allowed ) );

			if( isset( $_POST['education_4_period'] ) && !empty( $_POST['education_4_period'] ) )
				update_post_meta( $post_id, 'education_4_period', wp_kses( $_POST['education_4_period'], $allowed ) );

			if( isset( $_POST['education_4_decription'] ) && !empty( $_POST['education_4_decription'] ) )
				update_post_meta( $post_id, 'education_4_decription', wp_kses( $_POST['education_4_decription'], $allowed ) );

			if( isset( $_POST['portfolio_tag'] ) && !empty( $_POST['portfolio_tag'] ) )
				update_post_meta( $post_id, 'portfolio_tag', wp_kses( $_POST['portfolio_tag'], $allowed ) );
		}
	}

	function gabfire_custom_fields_css() {
		wp_enqueue_style('gabfire-customfields-style', get_template_directory_uri() .'/framework/functions/css/custom-fields.css' );
	}
	add_action('admin_head-post.php', 'gabfire_custom_fields_css');
	add_action('admin_head-post-new.php', 'gabfire_custom_fields_css');


	/* Add a little more niceness and assign post template class to body tag */
	add_filter('body_class','gabfire_custom_body_classes');
	function gabfire_custom_body_classes( $classes ) {

		if ( get_post_meta( get_the_ID(), 'gabfire_post_template', true ) ) {

			$classes[] = 'body-' . get_post_meta( get_the_ID(), 'gabfire_post_template', true );

		}

		// return the $classes array
		return $classes;

	}
}

/* ********************
 * Custom post type to list Team Members
 ******************************************************************** */
/* Create Custom Post Type */
if ( !function_exists( 'members_init' ) ) {

	add_action('init', 'members_init');

	function members_init() {
	  $labels = array(

		'name' 					=> __( 'Team Members', 'gabfire' ),
		'singular_name' 		=> __( 'Member', 'gabfire' ),
		'add_new' 				=> __( 'Add New', 'gabfire' ),
		'add_new_item' 			=> __( 'Add New', 'gabfire' ),
		'edit_item' 			=> __( 'Edit', 'gabfire' ),
		'new_item' 				=> __( 'New', 'gabfire' ),
		'view_item' 			=> __( 'View', 'gabfire' ),
		'search_items'			=> __( 'Search', 'gabfire' ),
		'not_found' 			=> __( 'Nothing found', 'gabfire' ),
		'not_found_in_trash'	=> __( 'Nothing found in Trash', 'gabfire' ),
		'parent_item_colon' 	=> __( 'Parent:', 'gabfire' ),
		'menu_name' 			=> __( 'Team Members', 'gabfire' ),
	  );

	  $args = array(
			'labels' => $labels,
			'hierarchical' => true,
			'menu_icon' => get_template_directory_uri() . '/framework/images/gabfire-icon.png',
			'supports' => array('gabfire_meta_box_members', 'thumbnail', 'title', 'editor', 'custom-fields'),
			'public' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'show_in_nav_menus' => false,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'has_archive' => true,
			'query_var' => true,
			'can_export' => true,
			'rewrite' => true,
			'capability_type' => 'post'
	  );
	  register_post_type('member',$args);
	}
}

/* ********************
 * Custom post type for Portfolio Posts
 ******************************************************************** */
/* Create Custom Post Type */
if ( !function_exists( 'portfolio_init' ) ) {

	add_action('init', 'portfolio_init');

	function portfolio_init() {
	  $labels = array(

		'name' 					=> __( 'Portfolio', 'gabfire' ),
		'singular_name' 		=> __( 'Portfolio', 'gabfire' ),
		'add_new' 				=> __( 'Add New', 'gabfire' ),
		'add_new_item' 			=> __( 'Add New', 'gabfire' ),
		'edit_item' 			=> __( 'Edit', 'gabfire' ),
		'new_item' 				=> __( 'New', 'gabfire' ),
		'view_item' 			=> __( 'View', 'gabfire' ),
		'search_items'			=> __( 'Search', 'gabfire' ),
		'not_found' 			=> __( 'Nothing found', 'gabfire' ),
		'not_found_in_trash'	=> __( 'Nothing found in Trash', 'gabfire' ),
		'parent_item_colon' 	=> __( 'Parent:', 'gabfire' ),
		'menu_name' 			=> __( 'Portfolio', 'gabfire' ),
	  );

	  $args = array(
			'labels' => $labels,
			'hierarchical' => true,
			'menu_icon' => get_template_directory_uri() . '/framework/images/gabfire-icon.png',
			'supports' => array('gabfire_meta_box_portfolio', 'thumbnail', 'title', 'editor', 'custom-fields', 'comments'),
			'public' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'show_in_nav_menus' => false,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'has_archive' => true,
			'query_var' => true,
			'can_export' => true,
			'rewrite' => true,
			'capability_type' => 'post'
	  );
	  register_post_type('portfolio',$args);
	}


	//hook into the init action and call create_book_taxonomies when it fires
	add_action( 'init', 'portfolio_taxonomies', 0 );

	//create two taxonomies, genres and writers for the post type "book"
	function portfolio_taxonomies() {
	  // Add new taxonomy, make it hierarchical (like categories)
	  $labels = array(
		'name' => __( 'Portfolio Categories', 'gabfire' ),
		'singular_name' => __( 'Portfolio Category', 'gabfire' ),
		'search_items' =>  __( 'Search', 'gabfire' ),
		'all_items' => __( 'All', 'gabfire' ),
		'parent_item' => __( 'Parent', 'gabfire' ),
		'parent_item_colon' => __( 'Parent:', 'gabfire' ),
		'edit_item' => __( 'Edit', 'gabfire' ),
		'update_item' => __( 'Update', 'gabfire' ),
		'add_new_item' => __( 'Add New', 'gabfire' ),
		'new_item_name' => __( 'New Name', 'gabfire' ),
		'menu_name' => __( 'Portfolio Categories', 'gabfire' ),
	  );

	  register_taxonomy('portfolio-category',array('portfolio'), array(
		'hierarchical' => true,
		'labels' => $labels,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'portfolio-categories' ),
	  ));

	  // Add new taxonomy, NOT hierarchical (like tags)
	  $labels = array(
		'name' => __( 'Portfolio Tags', 'gabfire' ),
		'singular_name' => __( 'Portfolio Tag', 'gabfire'),
		'search_items' =>  __( 'Search', 'gabfire' ),
		'popular_items' => __( 'Popular', 'gabfire' ),
		'all_items' => __( 'All', 'gabfire' ),
		'parent_item' => null,
		'parent_item_colon' => null,
		'edit_item' => __( 'Edit', 'gabfire' ),
		'update_item' => __( 'Update', 'gabfire' ),
		'add_new_item' => __( 'Add New', 'gabfire' ),
		'new_item_name' => __( 'New', 'gabfire' ),
		'separate_items_with_commas' => __( 'Separate with commas', 'gabfire' ),
		'add_or_remove_items' => __( 'Add or remove', 'gabfire' ),
		'choose_from_most_used' => __( 'Choose from the most used', 'gabfire' ),
		'menu_name' => __( 'Portfolio Tags', 'gabfire' ),
	  );

	  register_taxonomy('portfolio-tag','portfolio',array(
		'hierarchical' => false,
		'labels' => $labels,
		'show_ui' => true,
		'query_var' => true,
		'show_in_nav_menus' => false,
		'rewrite' => array( 'slug' => 'portfolio-tag' ),
	  ));
	}
}

/* ********************
 * Theme comment style
 ******************************************************************** */
	if ( ! function_exists( 'gabfire_comment' ) ) {

		function gabfire_comment( $comment, $args, $depth ) {
			$GLOBALS['comment'] = $comment;
			switch ( $comment->comment_type ) :
				case '' :
			?>
			<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">

				<div class="comment-inner" id="comment-<?php comment_ID(); ?>">

					<div class="comment-top">
						<div class="comment-avatar">
							<?php echo get_avatar( $comment, 50 ); ?>
						</div>
						<span class="comment-author">
							<i class="fa fa-user"></i>
							<?php printf( __( '%s ', 'gabfire'), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
						</span>
						<span class="comment-date-link">
							<i class="fa fa-calendar"></i>&nbsp;&nbsp;<?php printf(esc_attr__('%1$s at %2$s','gabfire'), get_comment_date(), get_comment_time()); edit_comment_link( __( 'Edit', 'gabfire'), ' ' , ''); ?>
						</span>
					</div>

					<?php if ( $comment->comment_approved == '0' ) : ?>
						<p class="waiting_approval"><?php _e( 'Your comment is awaiting moderation.', 'gabfire' ); ?></p>
					<?php endif; ?>

					<?php comment_text(); ?>

					<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>

				</div><!-- comment-inner  -->

			<?php
					break;
				case 'pingback'  :
				case 'trackback' :
			?>
			<li class="post pingback">
				<p><?php _e( 'Pingback:', 'gabfire' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( 'Edit', 'gabfire' ), ' ' ); ?></p>
			<?php
					break;
			endswitch;
		}
	}

/* ********************
 * Widgetize theme
 ******************************************************************** */
 if ( !function_exists( 'gabfire_register_sidebar' ) ) {

	function gabfire_register_sidebar($args) {
		$common = array(
			'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widgetinner">',
			'after_widget'  => "</div></div>\n",
			'before_title'  => '<h3 class="widgettitle">',
			'after_title'   => "</h3>\n"
		);
		$args = wp_parse_args($args, $common);
		return register_sidebar($args);
	}

	function gabfire_init_widgets() {
		gabfire_register_sidebar(array('name' => __('Sidebar-1', 'gabfire'),'id' => 'Sidebar-1','description' => __('Blog Posts Sidebar - Above Portfolio Widget', 'gabfire')));
		gabfire_register_sidebar(array('name' => __('Sidebar-2', 'gabfire'),'id' => 'Sidebar-2','description' => __('Blog Posts Sidebar - Below Portfolio Widget', 'gabfire')));
		gabfire_register_sidebar(array('name' => __('Sidebar-Portfolio', 'gabfire'),'id' => 'Sidebar-Portfolio','description' => __('Portfolio Posts Sidebar - Below Portfolio Widget', 'gabfire')));
		gabfire_register_sidebar(array('name' => __('Footer 1', 'gabfire'), 'id' => 'footer-1','description' => __('Footer 1st column', 'gabfire')));
		gabfire_register_sidebar(array('name' => __('Footer 2', 'gabfire'), 'id' => 'footer-2','description' => __('Footer 2nd column', 'gabfire')));
		gabfire_register_sidebar(array('name' => __('Footer 3', 'gabfire'), 'id' => 'footer-3','description' => __('Footer 3rd column', 'gabfire')));
		gabfire_register_sidebar(array('name' => __('PostWidget', 'gabfire'),'id' => 'PostWidget','description' => __('Single post page - below entry', 'gabfire')));
		gabfire_register_sidebar(array('name' => __('Services', 'gabfire'),'id' => 'services','description' => __('Services Sidebar', 'gabfire')));
	}

	add_action( 'widgets_init', 'gabfire_init_widgets' );
}

/**
 * Extract Youtube ID from URL
 * @param string $url
 * @return string Youtube video id or FALSE if none found.
 * http://stackoverflow.com/questions/6556559/youtube-api-extract-video-id
 */
function gabfire_youtube_id($url) {
    $pattern =
        '%^# Match any youtube URL
        (?:https?://)?  # Optional scheme. Either http or https
        (?:www\.)?      # Optional www subdomain
        (?:             # Group host alternatives
          youtu\.be/    # Either youtu.be,
        | youtube\.com  # or youtube.com
          (?:           # Group path alternatives
            /embed/     # Either /embed/
          | /v/         # or /v/
          | /watch\?v=  # or /watch\?v=
          )             # End path alternatives.
        )               # End host alternatives.
        ([\w-]{10,12})  # Allow 10-12 for 11 char youtube id.
        $%x'
        ;
    $result = preg_match($pattern, $url, $matches);
    if (false !== $result) {
        return $matches[1];
    }
    return false;
}
/**
 * Extract Vimeo ID from URL
 * @param string $url
 * http://blog.luutaa.com/php/extract-youtube-and-vimeo-video-id-from-link/
 */
function gabfire_vimeo_id($url) {
        $regexstr = '~
            # Match Vimeo link and embed code
            (?:<iframe [^>]*src=")?       # If iframe match up to first quote of src
            (?:                         # Group vimeo url
                https?:\/\/             # Either http or https
                (?:[\w]+\.)*            # Optional subdomains
                vimeo\.com              # Match vimeo.com
                (?:[\/\w]*\/videos?)?   # Optional video sub directory this handles groups links also
                \/                      # Slash before Id
                ([0-9]+)                # $1: VIDEO_ID is numeric
                [^\s]*                  # Not a space
            )                           # End group
            "?                          # Match end quote if part of src
            (?:[^>]*></iframe>)?        # Match the end of the iframe
            (?:<p>.*</p>)?              # Match any title information stuff
            ~ix';

        preg_match($regexstr, $url, $matches);
        return $matches[1];
}

/* ********************
 * Single Post Page
 * Header Image
 ******************************************************************** */
function gabfire_postheader() {
	$queried_object = get_queried_object();
	$featured_image = wp_get_attachment_url( get_post_thumbnail_id($queried_object->ID) );
	?>
	<section id="featured-image-holder" data-stellar-background-ratio="0.5" style="background-image:url(<?php echo $featured_image; ?>);">
		<div class="add-pattern">
			<div class="container pagewrap nmtop">
				<div class="row">
					<div class="title-wrapper">
						<h1 class="entry-title"><?php the_title(); ?></h1>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php
}


/* ********************
 * Single Product
 * Header Image
 ******************************************************************** */
function wps_postheader() {
	$queried_object = get_queried_object();
	$featured_image = wp_get_attachment_url( get_post_thumbnail_id($queried_object->ID) );
	?>


	<div id="singleprodheader" class="coverbgimage" style="background-image:url(<?php echo $featured_image; ?>);">

		<div class="container">
			<div class="row">

				<div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1 wps-products centered">

					<h1 class="entry-title"><?php the_title(); ?></h1>
					<h2><?php the_excerpt(); ?></h2>
					<!-- <p>The best WordPress plugins 	to increase traffic, sales, signups, and social engagement. See why we are the best kept secret in the WordPress scene.</p> -->
					<!-- <p><hr class="aligncenter"></p> -->
					<a class="btn btn-lg btn-orange btn-space" href="http://www.wpsite.net/plugins">Browse Plugins Now</a>

				</div><!--/ col-->

			</div>
		</div>
	</div>

<?php
}

// CHANGE EDD DEFAULT SLUG TO PRODUCTS INSTEAD OF DOWNLOADS
// Reference:  http://sumobi.com/changing-the-slug-in-easy-digital-downloads/
// Reference2: http://docs.easydigitaldownloads.com/article/594-edd-slug 
if ( ! defined( 'EDD_SLUG' ) ) {
    define( 'EDD_SLUG', 'products' );
}