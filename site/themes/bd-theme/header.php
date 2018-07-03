<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<title></title>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1.0" />

	<!-- https://realfavicongenerator.net -->
	<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">

	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

	<!--[if IE]>
	<link href='<?php echo get_template_directory_uri(); ?>/library/css/ie.css' rel='stylesheet' type='text/css'>
	<![endif]-->

	<?php wp_head(); ?>

    <script>
        (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
        function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
        e=o.createElement(i);r=o.getElementsByTagName(i)[0];
        e.src='https://www.google-analytics.com/analytics.js';
        r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
        ga('create','UA-33833447-1','auto');ga('send','pageview');
    </script>
</head>

<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">

	<div id="site">
		<header>
			<div class="page-container">
				<div class="col-md-3 nopadding">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo">
						<img src="">
					</a>
				</div>
				<div class="col-md-9 nopadding">
					<div class="main_menu">
						<?php
							// $main_menu_args = array('menu' => 'Main Menu');
							// wp_nav_menu($main_menu_args);
						?>
					</div>

					<div class="mobile-menu">
						<div class="hamburger">
							<span></span>
							<span></span>
							<span></span>
							<span></span>
						</div>
						<?php
							// $mobile_menu_args = array('menu' => 'Main Menu');
							// wp_nav_menu($mobile_menu_args);
						?>
					</div>
				</div>
			</div>
		</header>
