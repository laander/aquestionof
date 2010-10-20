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

	<title><?php custom_document_title(); ?></title>
	<meta http-equiv="Content-Type" content="<?php bloginfo( 'html_type' ); ?>; charset=<?php bloginfo('charset'); ?>" />
	<meta name="viewport" content="width=960,maximum-scale=1.0" />
	<link rel="shortcut icon" type="image/ico" href="<?php echo CHILD_THEME_URI.'/library/images/favicon.ico'; ?>" />
	<link rel="apple-touch-icon" href="<?php echo IMAGES . '/apple-touch-icon.png'; ?>" />

	<?php hybrid_head(); // Hybrid head hook ?>
	<?php wp_head(); // WP head hook ?>

	<link type="text/css" href="<?php echo CHILD_THEME_URI.'/library/css/screen.css'; ?>" rel="stylesheet" media="screen" />
	<link type="text/css" href="<?php echo CHILD_THEME_URI.'/library/css/print.css'; ?>" rel="stylesheet" media="print" />
	<script type="text/javascript" src="<?php echo CHILD_THEME_URI . '/library/js/screen.js'; ?>"></script>

</head>

<body class="<?php hybrid_body_class(); ?>">

	<?php hybrid_before_html(); // Before HTML hook ?>
	
	<div id="body-container">
	
		<?php hybrid_before_header(); // Before header hook ?>
	
		<div id="header-container">
	
			<div id="header">
	
				<?php hybrid_header(); // Header hook ?>
	
			</div><!-- #header -->
	
		</div><!-- #header-container -->
	
		<?php hybrid_after_header(); // After header hook ?>
	
		<div id="container">
	
			<?php hybrid_before_container(); // Before container hook ?>