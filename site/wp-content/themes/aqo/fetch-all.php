<?php
/**
 * Template Name: Custom Fetch All
 *
 * @package Hybrid
 * @subpackage Template
 */
?>
	
<ul>
	
	<?php 
		$items = array(); 
	?>
	
	<?php 
	
	$products_url = 'http://' . $_SERVER['HTTP_HOST'] . '/aquestionof/shop/index.php?route=product/all'; 
	
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $products_url); 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$products = curl_exec($ch);
	curl_close($ch);
	
	$products_unserialized = unserialize($products);
	print_r($products_unserialized)
	
	?>	
	
	<?php query_posts(array('post_type' => 'post', 'posts_per_page' => -1));			
	if ( have_posts() ) : while ( have_posts() ) : the_post();
		
		$items[] = '<li data-id="post-' . the_ID() . '" >' . the_title() . '</li>';
			
	endwhile; endif; ?>
	
	<?php query_posts(array('post_type' => 'page', 'posts_per_page' => -1));		
	if ( have_posts() ) : while ( have_posts() ) : the_post();		

		$items[] = '<li data-id="post-' . the_ID() . '" >' . the_title() . '</li>';
		
	endwhile; endif; ?>
	
	<?php 
	$items_rand = shuffle($items);
	foreach ($items_rand as $item) {
		echo $item;
	}
	?>
	
</ul>