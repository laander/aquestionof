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
	<base href="<?php echo get_bloginfo( 'wpurl' ); ?>/" />
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

	<script type="text/javascript" src="http://cufon.shoqolate.com/js/cufon-yui.js"></script>
	<script type="text/javascript" src="<?php echo CHILD_THEME_URI . '/library/js/DIN_1451_Std_400.font.js'; ?>"></script>	
	
	<script type="text/javascript" src="<?php echo CHILD_THEME_URI . '/library/js/onhashchange.min.js'; ?>"></script> 
	<script type="text/javascript" src="<?php echo CHILD_THEME_URI . '/library/js/jquery.masonry.min.js'; ?>"></script>
	<script type="text/javascript" src="<?php echo CHILD_THEME_URI . '/library/js/masonryLoad.js'; ?>"></script>
	<script type="text/javascript" src="<?php echo CHILD_THEME_URI . '/library/js/screen.js'; ?>"></script>
		
</head>

<body class="<?php hybrid_body_class(); ?>">
	
	<div id="body-container">
		
		<img id="loader" style="display:none;" src="<?php echo CHILD_THEME_URI . '/library/images/loader.gif'; ?>"/>
		
		<div id="header-container">
			<div id="header">				
				<div id="site-title">
					<a class="gridButton" href="all">
						<img src="<?php echo CHILD_THEME_URI . '/library/images/logo.png'; ?>" alt="A Question Of" />
					</a>
				</div>	
				
				<ul id="primary-menu">
					
					<li>
						<a class="gridButton topcat" href="category/about">/ ABOUT</a>
						<a class="gridButton subcat" href="category/about/contact">Contact</a>
						<a class="gridButton subcat" href="category/about/social-responsibility">Social Responsibility</a>
						<a class="gridButton subcat" href="category/about/people">People</a>					
					</li>
					
					<li>
						<a class="gridButton topcat" href="category/news">/ NEWS</a>
						<a class="gridButton subcat" href="category/news/campaigns">Campaigns</a>
						<a class="gridButton subcat" href="category/news/press">Press</a>
						<a class="gridButton subcat" href="category/news/social">Social</a>					
					</li>

					<li>
						<a class="gridButton topcat" href="category/collection">/ COLLECTION</a>
					</li>

					<li>
						<a class="gridButton topcat" href="category/creatives">/ CREATIVES</a>
						<a class="gridButton subcat" href="category/creatives/creative-team">Creative Team</a>
						<a class="gridButton subcat" href="category/creatives/join-us">Join Us</a>					
					</li>
					
					<li>
						<a class="gridButton topcat" href="category/shop" id="cat_store">/ STORE</a>
						<a class="gridButton subcat" href="shop/index.php?route=product/category&path=20">Men</a>
						<a class="gridButton subcat" href="shop/index.php?route=product/category&path=18">Women</a>	
						<a class="topcat" href="#">/</a>										
					</li>
				
				</ul>
				
				<div class="fb-like">
					<iframe src="http://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.facebook.com%2FAQUESTIONOF&amp;layout=box_count&amp;show_faces=true&amp;width=100&amp;action=like&amp;font=arial&amp;colorscheme=light&amp;height=200" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:100px; height:200px;" allowTransparency="true"></iframe>							</div>								
													
			</div><!-- #header -->
		</div><!-- #header-container -->
		
		<div id="content-container">
