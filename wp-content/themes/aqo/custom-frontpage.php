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
		<?php 
		sleep(1);
		for($i=0; $i<10; $i++){ 
			 include("fetch-all.php");
		} 
		?>
		</div>
			
	</div><!-- .content .hfeed -->

<?php get_footer(); ?>
