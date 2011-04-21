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
			
		<?php customColors(); ?>
			
	</head>

	<body class="<?php hybrid_body_class(); ?>">
	
	<div id="masterbar-container" class="custom-color-1">
		<div id="masterbar">
		
			<div class="master-shoppingbag">
				<?php if(wpsc_cart_item_count() == 0) { ?>
					<a href="#category-shop" class="custom-color-2" class="custom-color-2">Go to shop!</a>
				<?php } else { ?>
					<a href="<?php echo get_option('shopping_cart_url'); ?>" class="custom-color-2">Shopping Bag ( <?php echo wpsc_cart_item_count(); ?> )</a>			
				<?php } ?>
			</div>
		
			<?php wp_nav_menu(array(
				'theme_location'=> 'masterbar', 
				'container' 	=> false,
				'menu_class' 	=> 'masterbar-menu custom-color-2',
				'menu_id' 		=> 'masterbar-menu',								
				'link_before' 	=> ''
				)); ?>
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
				
				<?php wp_nav_menu(array(
					'theme_location'=> 'primary',
					'container' 	=> false,
					'menu_class' 	=> 'primary-menu custom-color-2',
					'menu_id' 		=> 'primary-menu',
					'fallback_cb' 	=> false,
					'link_before' 	=> '/ '
					)); ?> 
																					
			</div><!-- #header -->
		</div><!-- #header-container -->
		
		<div id="content-container">
