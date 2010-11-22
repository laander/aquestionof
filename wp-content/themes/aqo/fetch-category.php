<?php
/**
 * Fetches posts based on current category selection
 *
 * @package Hybrid
 * @subpackage Template
 */

//get_header(); ?>

<?php
	// Loop through WP posts
	query_posts(array('post_type' => 'post', 'posts_per_page' => -1));			
	if ( have_posts() ) : while ( have_posts() ) : the_post();
		
		// Get post categories and save to html-friendly string for class
		$post_categories = get_the_category();	
		$post_cat = "";
		$delimiter = "";
		foreach($post_categories as $category) { 
			$post_cat .= $delimiter . "category-";
			if ($category->parent != 0) {
				$parent_category = get_category( $category->parent );
				$post_cat .= $parent_category->category_nicename . "-";
			}
		    $post_cat .= $category->category_nicename;
		    $delimiter = " ";
		} 
		
		// Get width/height custom field for the post box, defaults to standard values if not specified
		$custom_fields = get_post_custom($post->ID);
		if (isset($custom_fields['width'])) { $item_width = $custom_fields['width'][0]; }
		else { $item_width = 5; }
		if (isset($custom_fields['height'])) { $item_height = $custom_fields['height'][0]; }
		else { $item_height = 6; }
	
		// Add the current post to items array
		$items[] = '
			<div id="post-' . $post->ID . '" class="box col' . $item_width . ' row' . $item_height . ' ' . $post_cat . '">
				<div class="post-title">
					<a href="' . get_permalink($post->ID) . '">' . get_the_title() . '</a>
				</div>
				'.  get_the_post_thumbnail( $post->ID, 'large' ) .'
			</div>' . "\n";
			
	endwhile; endif;
	
	// Echo items to page
	foreach ($items as $item) {
		echo $item;
	}
?>

<?php //get_footer(); ?>