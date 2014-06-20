<!doctype html>

<!--[if lt IE 7]>
<html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]>
<html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]>
<html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!-->
<html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

<head>
	<meta charset="utf-8">

	<?php // Google Chrome Frame for IE ?>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<title><?php wp_title(''); ?></title>

	<?php // mobile meta (hooray!) ?>
	<meta name="HandheldFriendly" content="True">
	<meta name="MobileOptimized" content="320">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<?php // icons & favicons (for more: http://www.jonathantneal.com/blog/understand-the-favicon/) ?>
	<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/library/images/apple-icon-touch.png">
	<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
	<!--[if IE]>
	<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
	<![endif]-->
	<?php // or, set /favicon.ico for IE10 win ?>
	<meta name="msapplication-TileColor" content="#f01d4f">
	<meta name="msapplication-TileImage"
	      content="<?php echo get_template_directory_uri(); ?>/library/images/win8-tile-icon.png">

	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

	<?php // wordpress head functions ?>
	<?php wp_head(); ?>
	<link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo bloginfo('stylesheet_directory'); ?>/library/css/jquery.sidr.dark.css">
	<?php // end of wordpress head ?>

	<?php // drop Google Analytics Here ?>
	<?php // end analytics ?>

</head>

<body <?php body_class(); ?>>
	<div class="navbar navbar-fixed-top <?php if ( is_user_logged_in() ) { echo 'logged-in'; } ?> ">

        <div class="p2pu-color-divider-wrap">

            <div class="p2pu-color-divider"></div>

        </div>

		<div class="navbar-inner">


            <div class="<?php echo is_home()?'wrap': ''; ?>">


				<a class="navbar-btn visible-phone visible-tablet" data-toggle="collapse" data-target=".nav-collapse"
				   href="#main-menu-panel">
						<i class="fa fa-align-justify"></i>
				</a>

			<a class="brand" href="<?php echo home_url(); ?>">
                <i class="fa fa-home"></i>
            </a>

			<?php wp_nav_menu(
				array(
					'theme_location' => 'Main Nav',
					'container_class' => 'nav-collapse collapse mindevices-side-menu hidden-phone hidden-tablet',
					'menu_class' => 'nav visible-desktop visible-tablet'
				)); ?>


        </div>
            <ul class="logos nav pull-right nav-collapse collapse mindevices-side-menu hidden-phone hidden-tablet">
                <li>
                    <a href="https://p2pu.org/en/">
                        <img src="<?php echo get_template_directory_uri(); ?>/library/images/logo-p2pu-menu.png"
                             alt="P2PU Logo"/>
                    </a>
                </li>
                <li class="logo-plus-sign"><i class="fa fa-plus"></i></li>
                <li>


                    <a target="_blank" href="http://creativecommons.org/" class="cc-logo">
                        <img src="<?php echo get_template_directory_uri() ?>/library/images/cc.logo.large.png" alt="CC Logo"/>
                    </a>

                </li>

            </ul>
	</div>

</div>

