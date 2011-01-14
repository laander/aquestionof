<?php
/**
 * Taxonomy Template
 *
 * The taxonomy template is the default template used when a taxonomy archive is shown. Ideally,
 * all taxonomies would have their own template (taxonomy-$tax_name.php). The theme has included
 * templates for the default WordPress taxonomies: taxonomy-post_tag.php, taxonomy-category.php, 
 * and taxonomy-link_category.php.
 *
 * @package Hybrid
 * @subpackage Template
 */

get_header(); ?>

	<div id="content" class="hfeed content">	

		<div id="grid">
			<?php include('fetch-taxonomy.php'); ?>
		</div>
			
	</div><!-- .content .hfeed -->

<?php get_footer(); ?>