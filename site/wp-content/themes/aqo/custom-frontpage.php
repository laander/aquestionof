<?php
/**
 * Template Name: Custom Frontpage
 *
 * @package Hybrid
 * @subpackage Template
 */

get_header(); ?>

	<div id="content" class="hfeed content">

	A Question Of
	
	<a href="#">About</a>
	<a href="#">Media</a>
	<a href="#">Shop</a>
	
	<br /><br />

	<p>About Pages
	<a href="about-list">Here</a></p>

	<br />
	
	<p>Media Categories
	<?php wp_list_categories(); ?></p>
	
	</div><!-- .content .hfeed -->

<?php get_footer(); ?>