<?php
/**
 * Header Template
 *
 * Master template for head-section and body opening with generic elements
 */
?>
<!DOCTYPE HTML>
<html>
	<head>	
		<base href="<?php echo get_bloginfo( 'wpurl' ); ?>/" />
		<title><?php custom_document_title(); ?></title>
		<meta http-equiv="Content-Type" content="<?php bloginfo( 'html_type' ); ?>; charset=<?php bloginfo('charset'); ?>" />
		<meta name="viewport" content="width=960,maximum-scale=1.0" />
		
		<link rel="shortcut icon" type="image/ico" href="<?php echo THEME_URI .'/library/images/favicon.ico'; ?>" />
		<link rel="apple-touch-icon" href="<?php echo THEME_URI . '/library/images/apple-touch-icon.png'; ?>" />
		<link type="text/css" href="<?php echo THEME_URI . '/library/css/screen.css'; ?>" rel="stylesheet" media="screen" />
		<link type="text/css" href="<?php echo THEME_URI . '/library/css/print.css'; ?>" rel="stylesheet" media="print" />
		
		<?php wp_head(); // WP head hook ?>
	
		<script type="text/javascript" src="<?php echo THEME_URI . '/library/js/jquery.fontavailable-1.1.min.js'; ?>"></script>	
		<script type="text/javascript" src="<?php echo THEME_URI . '/library/js/jquery.cufon/cufon-yui.js'; ?>"></script>	
		<script type="text/javascript" src="<?php echo THEME_URI . '/library/js/jquery.cufon/DIN_1451_Std_400.font.js'; ?>"></script>	
		<script type="text/javascript" src="<?php echo THEME_URI . '/library/js/jquery.masonry/onhashchange.min.js'; ?>"></script> 
		<script type="text/javascript" src="<?php echo THEME_URI . '/library/js/jquery.masonry/jquery.masonry.min.js'; ?>"></script>
		<script type="text/javascript" src="<?php echo THEME_URI . '/library/js/jquery.nivo.slider.pack.js'; ?>"></script>
		
		<script type="text/javascript" src="<?php echo THEME_URI . '/library/js/screen.js'; ?>"></script>
			
	</head>

	<body class="<?php hybrid_body_class(); ?>">
	
	<div id="masterbar-container">
		<div id="masterbar">
			<div class="master-freeshipping">Free Worldwide Shipping</div>
			<div class="master-shoppingbag"><a href="<?php echo get_option('shopping_cart_url'); ?>">Shopping Bag (<?php echo wpsc_cart_item_count(); ?>)</a></div>
			<div class="master-customerservice">Customer Service +45 31 322 322</div>
			<div class="master-email">E-mail: info@aquestionof.net</div>			
		</div>
	</div>
	
	<div id="body-container">
		
		<div id="header-container">

			<img id="loader" style="display:none;" src="<?php echo THEME_URI . '/library/images/loader.gif'; ?>"/>		
		
			<div id="header">
						
				<div id="site-title">
					<a class="gridButton" href="#">
						<img src="<?php echo THEME_URI . '/library/images/logo-new.png'; ?>" alt="A Question Of" />
						<h2><?php echo get_bloginfo( 'name' ); ?></h2>
					</a>
				</div>	
				
				<a href="<?php echo get_bloginfo( 'wpurl' ); ?>/#category-shop" class="shophere-button">
					<span class="text">SHOP HERE</span>
				</a>

				<?php wp_nav_menu(array(
					'theme_location' => 'primary',
					'container' => false,
					'menu_class' => 'primary-menu',
					'menu_id' => 'primary-menu',
					'fallback_cb' => false,
					'link_before' => '/ '
					)); ?> 
				
<!--				<ul id="primary-menu">
					
					<li>
						<a class="gridButton topcat" href="category/concept">/ CONCEPT</a>
						<ul class="primary-menu-sub">
							<li><a class="gridButton subcat" href="category/concept/story">/ Story</a></li>
							<li><a class="gridButton subcat" href="category/concept/csr">/ CSR</a></li>
							<li><a class="gridButton subcat" href="category/concept/pr">/ PR</a></li>
							<li><a class="gridButton subcat" href="category/concept/contact">/ Contact</a></li>							
						</ul>
					</li>
					
					<li>
						<a class="gridButton topcat" href="category/updates">/ UPDATES</a>
						<ul class="primary-menu-sub">
							<li><a class="gridButton subcat" href="category/updates/coverage">/ Coverage</a></li>
							<li><a class="gridButton subcat" href="category/updates/social">/ Social</a></li>
							<li><a class="gridButton subcat" href="category/updates/projects">/ Projects</a></li>
						</ul>
					</li>

					<li>
						<a class="gridButton topcat" href="category/collection">/ COLLECTION</a>
						<ul class="primary-menu-sub">
							<li><a class="gridButton subcat" href="category/collection/all">/ All</a></li>
						</ul>
					</li>

					<li>
						<a class="gridButton topcat" href="category/creatives">/ CREATIVES</a>
						<ul class="primary-menu-sub">
							<li><a class="gridButton subcat" href="category/creatives/artists">/ Artists</a></li>
							<li><a class="gridButton subcat" href="category/creatives/join-us">/ Join Us</a></li>		
						</ul>
					</li>
					
					<li>
						<a class="topcat" href="http://www.aquestionofshop.com" id="cat_store">/ SHOP</a>
						<a class="topcat" href="#">/</a>						
					</li>
										
					<li>
						<a class="gridButton topcat" href="category/shop" id="cat_store">/ SHOP</a>
						<ul class="primary-menu-sub">
							<li><a class="gridButton subcat" href="shop/index.php?route=product/category&path=20">/ Female</a></li>
							<li><a class="gridButton subcat" href="shop/index.php?route=product/category&path=18">/ Male</a></li>
							<li><a class="gridButton subcat" href="category/shop/info">/ Info</a></li>
						</ul>
						<a class="gridButton topcat" href="category/about">/</a>						
					</li>
			
				</ul> 
-->
								
				<div class="fb-like">
					<iframe id="ff7511aa" name="f34edd7794" scrolling="no" style="border-width: initial; border-color: initial; overflow-x: hidden; overflow-y: hidden; border-width: initial; border-color: initial; border-width: initial; border-color: initial; border-width: initial; border-color: initial; height: 21px; width: 77px; border-top-style: none; border-right-style: none; border-bottom-style: none; border-left-style: none; border-width: initial; border-color: initial; " title="Like this content on Facebook." class="fb_ltr" src="http://www.facebook.com/plugins/like.php?api_key=113869198637480&amp;channel_url=http%3A%2F%2Fstatic.ak.fbcdn.net%2Fconnect%2Fxd_proxy.php%23cb%3Df18b68036c%26origin%3Dhttp%253A%252F%252Fdevelopers.facebook.com%252Ff3903f010%26relation%3Dparent.parent%26transport%3Dpostmessage&amp;colorscheme=dark&amp;font=arial&amp;href=http%3A%2F%2Ffacebook.com%2Faquestionof&amp;layout=button_count&amp;locale=en_US&amp;node_type=link&amp;sdk=joey&amp;show_faces=false&amp;width=77"></iframe>
				</div>				
													
			</div><!-- #header -->
		</div><!-- #header-container -->
		
		<div id="content-container">
