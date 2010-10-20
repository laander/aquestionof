<?php
/**
 * Template: Header.php 
 *
 * @package WPFramework
 * @subpackage Template
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<!--BEGIN html-->
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<!--BEGIN head-->
<head profile="<?php get_profile_uri(); ?>">

	<title><?php semantic_title(); ?></title>

	<!-- Meta Tags -->
	<meta http-equiv="Content-Type" content="<?php bloginfo( 'html_type' ); ?>; charset=<?php bloginfo('charset'); ?>" />
	
	<!-- Favicon: Browser + iPhone Webclip -->
	<link rel="shortcut icon" href="<?php echo IMAGES . '/favicon.ico'; ?>" />
	<link rel="apple-touch-icon" href="<?php echo IMAGES . '/apple-touch-icon.png'; ?>" />

	<!-- Stylesheets -->
	<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>" type="text/css" media="screen, projection" />
	<link rel="stylesheet" href="<?php echo CSS . '/print.css'; ?>" type="text/css" media="print" />

  	<!-- Links: RSS + Atom Syndication + Pingback etc. -->
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo( 'name' ); ?> RSS Feed" href="<?php bloginfo( 'rss2_url' ); ?>" />
	<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo( 'rss_url' ); ?>" />
	<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo( 'atom_url' ); ?>" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

	<!-- Theme Hook -->
    <?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); // loads the javascript required for threaded comments ?>
	<?php wp_head(); ?>	
	
	<!-- Additional custom styles/javascript -->
	<script type="text/javascript" src="<?php echo JS . '/jquery.flashembed.min.js'; ?>"></script>
	<script type="text/javascript" src="<?php echo JS . '/jscrollpane/jquery.mousewheel.js'; ?>"></script>
	<script type="text/javascript" src="<?php echo JS . '/jscrollpane/jScrollPane.js'; ?>"></script>
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo CSS . '/jscrollpane/jScrollPane.css'; ?>" />	

<!--END head-->
</head>

<!--BEGIN body-->
<body class="<?php semantic_body(); ?>">
	
	<div id="container">
		<div id="header">
			<a href="<?php bloginfo( 'url' ); ?>" title="<?php bloginfo( 'name' ) ?>">
			<img alt="<?php bloginfo( 'name' ) ?>" src="<?php echo IMAGES . '/toplogo.png'; ?>" /></a>
			<h1><?php bloginfo( 'name' ) ?></h1>
		</div>

        <?php
        if (function_exists('wp_nav_menu')) {
        	// Top Menu with last-menu-item class
        	$menu = wp_nav_menu(array( 'container_class' => 'top-menu', 'menu_class' => 'nav', 'menu_id' => 'top-menu-main', 'depth' => '1', 'echo' => '0' ));
			$reversedString = strrev($menu);
			$reversedSearch = '/'.strrev('class="').'/';
			$endClass = strrev('class="last-menu-item ');
			$menu = strrev(preg_replace($reversedSearch,$endClass, $reversedString, 1));
			echo $menu;
        } else { 
        	wp_page_menu(array( 'show_home' => false, 'menu_class' => 'top-menu' ));
        } ?>