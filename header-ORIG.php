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

    <title><?php wp_title(); ?></title>
	<?php wp_head(); ?>	
	
</head>

<body <?php body_class(); ?>>

<?php 
if(isset($_POST['submit'])){
    $to = of_get_option( 'of_emailaddr' ); // this is your Email address
    $from = $_POST['form_email']; // this is the sender's Email address
    $name = $_POST['form_name'];
    $phone = $_POST['form_phone'];
    $subject = "Form submission";
    $subject2 = "Copy of your form submission";
    $message = "Name: $name \n" . "Email: $from \n" . "Phone: $phone \n\n" . $_POST['form_message'];
    $message2 = "Here is a copy of your message " . $first_name . "\n\n" . $_POST['form_message'];
	
    $headers = "From:" . $from;
    $headers2 = "From:" . $to;
    mail($to,$subject,$message,$headers);
    mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender
	?>
	<div class="alert alert-warning alert-dismissible email-confirmation" role="alert">
		<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only"><?php _e('Close', 'gabfire'); ?></span></button>
		<?php _e('Your message has been received. Thank you', 'gabfire') ;?>
	</div>	
<?php
} ?>

<?php
if(is_home() or is_page_template('index-youtube.php') or is_page_template('index-vimeo.php') or is_page_template('index-bgslider.php') or is_page_template('index-callout.php')) { 
	$class_hidden = ' hidden';
}
?>

<div id="mainnav" class="navbar navbar-default navbar-fixed-top<?php echo $class_hidden; ?>" role="navigation">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-6 col-sm-6 col-xs-10">
				<div class="space-left">
					<h1 class="awesome-logo" style="padding:<?php echo of_get_option('of_padding_top', 0); ?>px 0px <?php echo of_get_option('of_padding_bottom', 0); ?>px <?php echo of_get_option('of_padding_left', 0); ?>px;">	
						<?php if ( of_get_option('of_logo_type', 'text') == 'image') { ?>
							<a href="<?php echo home_url('/'); ?>" title="<?php bloginfo('description'); ?>">
								<img src="<?php echo of_get_option('of_logo'); ?>" alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('name'); ?>" class="fadeimage" />
							</a>
						<?php } else { ?>
							<a href="<?php echo home_url('/'); ?>" class="text-logo" title="<?php bloginfo('description'); ?>"><?php echo of_get_option('of_logo1'); ?></a>
						<?php } ?>
					</h1>					
				</div>
			</div><!-- col-lg-3 -->
			
			<div class="col-lg-9 col-md-6 col-sm-6 col-xs-2">
				<div class="space-right">				
					<nav class="main-navigation">
						<ul id="menu" class="mainnav responsive_menu pull-right">
							<?php if (!is_home() and ( of_get_option('of_bloglink') <> "" ) ) {
								$bloglink = get_post_permalink(of_get_option('of_bloglink'));
							} else {
								$bloglink = '#timeline';
							} ?>
						
							<?php if (of_get_option('of_nav_1') <> "") { ?>
								<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo of_get_option('of_nav_1'); ?></a></li>
							<?php } ?>
							
							<?php if ( has_nav_menu( 'primary' ) ) {
								wp_nav_menu( array('theme_location' => 'primary', 'container' => false, 'items_wrap' => '%3$s'));
							} ?>	
							
							<?php if (of_get_option('of_nav_2') <> "") { ?>
								<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>#about"><?php echo of_get_option('of_nav_2'); ?></a></li>
							<?php } ?>
							
							<?php if (of_get_option('of_nav_3') <> "") { ?>
								<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>#services"><?php echo of_get_option('of_nav_3'); ?></a></li>
							<?php } ?>
							
							<?php if (of_get_option('of_nav_4') <> "") { ?>
								<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>#pricing-section"><?php echo of_get_option('of_nav_4'); ?></a></li>
							<?php } ?>
							
							<?php if (of_get_option('of_nav_5') <> "") { ?>
								<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>#our-team"><?php echo of_get_option('of_nav_5'); ?></a></li>
							<?php } ?>
							
							<?php if (of_get_option('of_nav_6') <> "") { ?>	
								<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>#portfolio"><?php echo of_get_option('of_nav_6'); ?></a></li>
							<?php } ?>
							
							<?php if (of_get_option('of_nav_7') <> "") { ?>
								<li><a href="<?php echo $bloglink; ?>"><?php echo of_get_option('of_nav_7'); ?></a></li>
							<?php } ?>
							
							<?php if (of_get_option('of_nav_8') <> "") { ?>
								<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>#contact"><?php echo of_get_option('of_nav_8'); ?></a></li>
							<?php } ?>
						</ul>
					</nav>
				</div>
			</div><!-- col-lg-9 -->
		</div><!-- row -->
	</div>
</div>