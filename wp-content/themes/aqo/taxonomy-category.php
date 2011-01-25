<?php
/**
 * Category Taxonomy Template
 *
 * This template is loaded when viewing a category archive and replaces the default 
 * category.php template.  It can also be overwritten for individual categories using
 * taxonomy-category-$term.php.
 *
 * @package Hybrid
 * @subpackage Template
 */

get_header(); ?>

	<div id="content" class="hfeed content">	

		<?php include('masonry-grid.php'); ?>
			
	</div><!-- .content .hfeed -->

<?php get_footer(); ?>