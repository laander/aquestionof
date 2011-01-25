<?php
/**
 * Home Template
 *
 * This template is loaded when on the home/blog page.
 *
 * @package Hybrid
 * @subpackage Template
 */

get_header(); ?>

	<div id="content" class="hfeed content">	
		
		<?php include('masonry-grid.php'); ?>
		
	</div><!-- .content .hfeed -->

<?php get_footer(); ?>