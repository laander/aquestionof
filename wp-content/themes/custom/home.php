<?php
/**
 * Home Template
 *
 * This template is loaded when on the home/blog page.
 */

get_header(); ?>

	<div id="content" class="hfeed content">	
		
		<div id="grid">		
		
			<?php 
				$items = masonry_grid('all');
				if (!empty($items)) {	
					foreach ($items as $item) {
						echo $item;
					}
				}
			?>
				
		</div>				
				
	</div><!-- .content .hfeed -->

<?php get_footer(); ?>