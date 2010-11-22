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

		<div id="grid">
			<?php include('fetch-category.php'); ?>
		</div>
			
	</div><!-- .content .hfeed -->

<?php get_footer(); ?>