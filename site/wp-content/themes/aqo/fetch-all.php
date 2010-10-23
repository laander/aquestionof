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
	
	$products_url = 'http://' . $_SERVER['HTTP_HOST'] . '/aquestionof/shop/index.php?route=product/all&type=array'; 
	
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $products_url); 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$products = curl_exec($ch);
	curl_close($ch);
	
	$products_unserialized = unserialize($products);
	$items = $products_unserialized;
	
	?>	
	
	<?php query_posts(array('post_type' => 'post', 'posts_per_page' => -1));			
	if ( have_posts() ) : while ( have_posts() ) : the_post();
		
		$items[] = '<li data-id="post-' . get_the_ID() . '" >' . get_the_title() . '</li>';
			
	endwhile; endif; ?>
	
	<?php query_posts(array('post_type' => 'page', 'posts_per_page' => -1));		
	if ( have_posts() ) : while ( have_posts() ) : the_post();		

		$items[] = '<li data-id="page-' . get_the_ID() . '" >' . get_the_title() . '</li>';
		
	endwhile; endif; ?>
	
	<?php 
	shuffle($items);
	
	//print_r($items_rand);
	
	foreach ($items as $item) {
		echo $item;
	}
	?>
	
</ul>