<?php
/**
 * Template Name: Custom Frontpage
 *
 * @package Hybrid
 * @subpackage Template
 */

get_header(); ?>

	<div id="content" class="hfeed content">	

		<div id="grid">
			<?php include("fetch-all.php"); ?>
		</div>
			
	</div><!-- .content .hfeed -->

<?php get_footer(); ?>
