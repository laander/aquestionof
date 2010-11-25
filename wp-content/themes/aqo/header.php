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
			</div><!-- #header -->
		</div><!-- #header-container -->
		
		<div id="container">
