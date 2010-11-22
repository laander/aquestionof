<?php
/**
 * Header Template
 *
 * @package Hybrid
 * @subpackage Template
 */

hybrid_doctype(); ?>
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes( 'xhtml' ); ?>>
<head profile="<?php hybrid_profile_uri(); ?>">
	
	<base href="<?php echo get_bloginfo( 'wpurl' ); ?>" />
	<title><?php custom_document_title(); ?></title>
	<meta http-equiv="Content-Type" content="<?php bloginfo( 'html_type' ); ?>; charset=<?php bloginfo('charset'); ?>" />
	<meta name="viewport" content="width=960,maximum-scale=1.0" />
	<link rel="shortcut icon" type="image/ico" href="<?php echo CHILD_THEME_URI.'/library/images/favicon.ico'; ?>" />
	<link rel="apple-touch-icon" href="<?php echo IMAGES . '/apple-touch-icon.png'; ?>" />

	<script type="text/javascript" src="<?php echo CHILD_THEME_URI . '/library/js/jquery-1.4.4.min.js'; ?>"></script>
	<?php hybrid_head(); // Hybrid head hook ?>
	<?php wp_head(); // WP head hook ?>

	<link type="text/css" href="<?php echo CHILD_THEME_URI.'/library/css/screen.css'; ?>" rel="stylesheet" media="screen" />
	<link type="text/css" href="<?php echo CHILD_THEME_URI.'/library/css/print.css'; ?>" rel="stylesheet" media="print" />
	<link type="text/css" href="<?php echo CHILD_THEME_URI.'/library/css/masonry.css'; ?>" rel="stylesheet" media="print" />

	<script type="text/javascript" src="<?php echo CHILD_THEME_URI . '/library/js/onhashchange.min.js'; ?>"></script> 
	<script type="text/javascript" src="<?php echo CHILD_THEME_URI . '/library/js/jquery.masonry.min.js'; ?>"></script>
	<script type="text/javascript" src="<?php echo CHILD_THEME_URI . '/library/js/masonryLoad.js'; ?>"></script>


	<link type="text/css" href="<?php // echo CHILD_THEME_URI.'/library/js/quicksand/quicksand.css'; ?>" rel="stylesheet" media="screen" />

	<script type="text/javascript" src="<?php echo CHILD_THEME_URI . '/library/js/screen.js'; ?>"></script>

</head>

<body class="<?php hybrid_body_class(); ?>">
	
	<div id="body-container">

		<div id="header-container">
			<div id="header">				
				<div id="site-title">
					<a class="gridButton" href="all">
						<img src="<?php echo CHILD_THEME_URI . '/library/images/logo.png'; ?>" alt="A Question Of" />
					</a>
				</div>
			
				<ul class="grid-menu">
					
					<li>
						<a class="gridButton" href="category/about">ABOUT:</a>
						<a class="gridButton" href="category/about/contact">Contact</a>
						<a class="gridButton" href="category/about/social-responsibility">Social Responsibility</a>
						<a class="gridButton" href="category/about/who-we-are">Who We Are</a>					
					</li>
					
					<li>
						<a class="gridButton" href="category/media">MEDIA:</a>
						<a class="gridButton" href="category/media/campaigns">Campaigns</a>
						<a class="gridButton" href="category/media/press">Press</a>
						<a class="gridButton" href="category/media/social">Social</a>					
					</li>

					<li>
						<a class="gridButton" href="category/creatives">CREATIVES:</a>
						<a class="gridButton" href="category/creatives/creative-team">Creative Team</a>
						<a class="gridButton" href="category/creatives/join-us">Join Us</a>					
					</li>
					
					<li>
						<a class="gridButton" href="shop/index.php?route=product/all" id="cat_store">STORE:</a>
						<a class="gridButton" href="shop/index.php?route=product/category&path=20">Men</a>
						<a class="gridButton" href="shop/index.php?route=product/category&path=18">Women</a>					
					</li>
				
				</ul>
										
			</div><!-- #header -->
		</div><!-- #header-container -->
		
		<div id="container">
	
