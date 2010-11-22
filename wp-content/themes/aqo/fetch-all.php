<?php
/**
 * Template Name: Custom Fetch All
 *
 * @package Hybrid
 * @subpackage Template
 */

get_header(); ?>
		
	<?php 
	// Retrieve product items from OC and save to unserialized array
	// Fetch content with CURL
	$products_url = 'http://' . $_SERVER['HTTP_HOST'] . '/aquestionof/shop/index.php?route=product/all&type=array'; 
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $products_url); 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$products = curl_exec($ch);
	curl_close($ch);
	
	// Unserialize content and save to array
	$products_unserialized = unserialize($products);
	$items = $products_unserialized;

	// Loop through WP posts
	query_posts(array('post_type' => 'post', 'posts_per_page' => -1));			
	if ( have_posts() ) : while ( have_posts() ) : the_post();
		
		// Get post categories and save to html-friendly string for class
		$post_categories = get_the_category();	
		$post_cat = "";
		$delimiter = "";
		foreach($post_categories as $category) { 
		    $post_cat .= $delimiter . "cat_" . $category->category_nicename;
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
	
	// Shuffle the OC and WP items and echo to page
	shuffle($items);
	foreach ($items as $item) {
		echo $item;
	}
	?>
	
<?php get_footer(); ?>
