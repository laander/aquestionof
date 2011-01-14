<?php
/**
 * Template Name: Custom Fetch All
 *
 * @package Hybrid
 * @subpackage Template
 */

//get_header(); ?>
		
<?php 
	// Retrieve product items from OC and save to unserialized array
	// Fetch content with CURL
	$products_url = site_url() . '/shop/index.php?route=product/all&type=array'; 
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
		if (isset($custom_fields['width'])) { $item_width = $custom_fields['width'][0] * 6; }
		else { $item_width = 6; }
		if (isset($custom_fields['height'])) { $item_height = $custom_fields['height'][0] * 4; }
		else { $item_height = 4; }
	
		// Add the current post to items array
		$items[] = '
			<div id="post-' . $post->ID . '" class="box col' . $item_width . ' row' . $item_height . ' ' . $post_cat . '">
				<a href="' . get_permalink($post->ID) . '">
					'.  get_the_post_thumbnail( $post->ID, 'large' ) .'
					<div class="meta">
						<div class="post-title">
							' . get_the_title() . '
						</div>
					</div>
				</a>
			</div>' . "\n";
			
	endwhile; endif;
	
	$items[] = '
			<div id="post-fbbox" class="box col6 row8" style="background-color: #000">
				<a href="#">
					<iframe id="f1614db9d8" name="f619b271" scrolling="no" style="border-top-style: none; border-right-style: none; border-bottom-style: none; border-left-style: none; border-width: initial; border-color: initial; overflow-x: hidden; overflow-y: hidden; height: 390px; width: 230px; " class="fb_ltr" src="http://www.facebook.com/plugins/likebox.php?api_key=113869198637480&amp;channel=http%3A%2F%2Fstatic.ak.fbcdn.net%2Fconnect%2Fxd_proxy.php%23cb%3Df148b6f924%26origin%3Dhttp%253A%252F%252Fdevelopers.facebook.com%252Ff19c251008%26relation%3Dparent.parent%26transport%3Dpostmessage&amp;colorscheme=dark&amp;header=false&amp;height=390&amp;href=http%3A%2F%2Ffacebook.com%2Faquestionof&amp;locale=en_US&amp;sdk=joey&amp;show_faces=false&amp;stream=true&amp;width=230"></iframe>
				</a>
			</div>' . "\n";
	
	// Shuffle the OC and WP items and echo to page
	shuffle($items);
	if (!empty($items)) {	
		foreach ($items as $item) {
			echo $item;
		}
	}
?>
	
<?php //get_footer(); ?>
