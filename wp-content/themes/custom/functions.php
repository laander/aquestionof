<?php

/* Load Hybrid core theme framework. */
require_once( trailingslashit( TEMPLATEPATH ) . 'hybrid-core/hybrid.php' );
$theme = new Hybrid();

/* Setup custom theme for Hybrid. */
add_action( 'after_setup_theme', 'custom_theme_setup', 10 );
function custom_theme_setup() {

	/* Add theme support for core framework features. */
	add_theme_support( 'hybrid-core-seo' );
	add_theme_support( 'hybrid-core-template-hierarchy' );
	add_theme_support( 'hybrid-core-menus' );
	//add_theme_support( 'hybrid-core-sidebars' );
	//add_theme_support( 'hybrid-core-widgets' );
	//add_theme_support( 'hybrid-core-shortcodes' );
	//add_theme_support( 'hybrid-core-post-meta-box' );
	//add_theme_support( 'hybrid-core-drop-downs' );

	/* Add theme support for framework extensions. */
	add_theme_support( 'post-layouts' );
	add_theme_support( 'post-stylesheets' );
	add_theme_support( 'get-the-image' );
	add_theme_support( 'breadcrumb-trail' );
	//add_theme_support( 'loop-pagination' );

	/* Add theme support for WordPress features. */
	add_theme_support( 'automatic-feed-links' );
	//add_custom_background();

	register_nav_menu( 'footer', 'Quicklinks in the footer' );

}

// Create new multiple post thumbnails for the posts (requires the associated plugin)
add_action( 'init', 'multiple_post_thumbnail' );
function multiple_post_thumbnail() {
	if (class_exists('MultiPostThumbnails')) {
		$thumb = new MultiPostThumbnails(array(
			'label' => 'Sidebar Image',
			'id' => 'secondary-image',
			'post_type' => 'post'
			)
		);
		add_image_size('post-secondary-image-thumbnail', 230, 390);
	}
}

// Load newest jQuery distribution
add_action( 'init', 'load_jquery' );
function load_jquery() {
	if( !is_admin()){
	   wp_deregister_script('jquery'); 
	   //wp_register_script('jquery', (THEME_URI . '/library/js/jquery-1.4.4.min.js'), false, '1.4.4'); 
	   wp_register_script('jquery', (THEME_URI . '/library/js/jquery-1.5.1.min.js'), false, '1.5.1'); 
	   wp_enqueue_script('jquery');
	}
}

// Register the priority taxonomy
add_action( 'init', 'build_taxanomies' );
function build_taxanomies() {
	register_taxonomy(
		'priority',
		'post',
		array(
			'hierarchical' => true,
			'label' => 'Priority',
			'query_var' => true,
			'rewrite' => true
		)
	);	
}

// Set own title on site
function custom_document_title() {
	
	global $wp_query;

	$domain = 'hybrid';
	$separator = ' - ';
	
	if ( is_front_page() && is_home() )
		$doctitle = get_bloginfo( 'name' ) . $separator . get_bloginfo( 'description' );

	elseif ( is_home() || is_singular() ) {
		$id = $wp_query->get_queried_object_id();

		$doctitle = get_post_meta( $id, 'Title', true );

		if ( !$doctitle && is_front_page() )
			$doctitle = get_bloginfo( 'name' ) . $separator . get_bloginfo( 'description' );
		elseif ( !$doctitle )
			$doctitle = get_post_field( 'post_title', $id );
	}

	elseif ( is_archive() ) {

		if ( is_category() || is_tag() || is_tax() ) {
			$term = $wp_query->get_queried_object();
			$doctitle = $term->name;
		}

		elseif ( is_author() )
			$doctitle = get_the_author_meta( 'display_name', get_query_var( 'author' ) );

		elseif ( is_date () ) {
			if ( get_query_var( 'minute' ) && get_query_var( 'hour' ) )
				$doctitle = sprintf( __( 'Archive for %1$s', $domain ), get_the_time( __( 'g:i a', $domain ) ) );

			elseif ( get_query_var( 'minute' ) )
				$doctitle = sprintf( __( 'Archive for minute %1$s', $domain ), get_the_time( __( 'i', $domain ) ) );

			elseif ( get_query_var( 'hour' ) )
				$doctitle = sprintf( __( 'Archive for %1$s', $domain ), get_the_time( __( 'g a', $domain ) ) );

			elseif ( is_day() )
				$doctitle = sprintf( __( 'Archive for %1$s', $domain ), get_the_time( __( 'F jS, Y', $domain ) ) );

			elseif ( get_query_var( 'w' ) )
				$doctitle = sprintf( __( 'Archive for week %1$s of %2$s', $domain ), get_the_time( __( 'W', $domain ) ), get_the_time( __( 'Y', $domain ) ) );

			elseif ( is_month() )
				$doctitle = sprintf( __( 'Archive for %1$s', $domain ), single_month_title( ' ', false) );

			elseif ( is_year() )
				$doctitle = sprintf( __( 'Archive for %1$s', $domain ), get_the_time( __( 'Y', $domain ) ) );
		}
	}

	elseif ( is_search() )
		$doctitle = sprintf( __( 'Search results for &quot;%1$s&quot;', $domain ), esc_attr( get_search_query() ) );

	elseif ( is_404() )
		$doctitle = __( '404 Not Found', $domain );

	/* If paged. */
	if ( ( ( $page = $wp_query->get( 'paged' ) ) || ( $page = $wp_query->get( 'page' ) ) ) && $page > 1 )
		$doctitle = sprintf( __( '%1$s Page %2$s', $domain ), $doctitle . $separator, $page );

	/* Apply the wp_title filters so we're compatible with plugins. */
	$doctitle = apply_filters( 'wp_title', $doctitle, $separator, '' );

	echo apply_atomic( 'document_title', esc_attr( $doctitle ) );
	
	/* Append site name at the end for pages */
	if ( !is_front_page() && !is_home() ) {
		$doctitle .= $separator . get_bloginfo( 'name' );
	}	
	
}


// Call to retrieve masonry-fomatted grid items. Supply argument with 'category' for built-in wp category views (no-js fallback)
function masonry_grid($type = 'all') {

	global $post;
	$items = array();
	$pri_items = array();

/*
	// Fetch products from OpenCart
	if ($type == 'all') {	
			
		// Get all products from OC and save returned json object as array
		$products_url = site_url() . '/shop/index.php?route=custom/products'; 
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $products_url); 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$products_json = curl_exec($ch);
		curl_close($ch);
		$products_decoded = json_decode($products_json);
		
		// Loop through all items and save to  array
		foreach($products_decoded as $product) {
			$items[] = '
				<div id="product-' . $product->id . '" class="box col6 row8 category-shop">
					<a href="' . $product->href . '">
						<img src="' . $product->thumb . '" width="230" height="320" alt="" />
						<div class="meta">
							<div class="product-title">
								' . $product->name . '
							</div>
							<div class="product-price">
								' . $product->price . '
							</div>
						</div>
					</a>
				</div>' . "\n";	
		}	
	}
*/
	
	// Only fetch posts if not limited to category fetch
	if ($type == 'all') {	
		query_posts(array('post_type' => 'post', 'posts_per_page' => -1));			
	}
	
	// Get all posts from WP and loop through WP posts
	if ( have_posts() ) : while ( have_posts() ) : the_post();
	
		// Get the post priority if any (featured or new)
		$post_priority = get_the_terms($post->ID, 'priority');
		$post_pri = "";
		if(!empty($post_priority)){
			foreach($post_priority as $priority) { 
				if($priority->slug == "featured") {
					$post_pri = "priority-featured";
				}
			}
		}
	
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
		$temp_item = '
			<div id="post-' . $post->ID . '" class="box col' . $item_width . ' row' . $item_height . ' ' . $post_cat . ' ' . $post_pri . '">
				<a href="' . get_permalink($post->ID) . '" alt="' . get_the_title() . '">
					'.  get_the_post_thumbnail( $post->ID, 'large' ) .'
					<div class="meta">
						<div class="post-title">
							' . get_the_title() . '
						</div>
					</div>
				</a>
			</div>' . "\n";
			
		if ($post_pri != "") {
			$pri_items[] = $temp_item;
		} else {
			$items[] = $temp_item;
		}
			
	endwhile; endif;
	
	// WP E-commerce products	
	if ($type == 'all') {	
	
		query_posts( array(
			'post_type' => 'wpsc-product',
			'post_parent' => 0,
			'posts_per_page' => 9999,
			'order'       => apply_filters('wpsc_product_order','ASC')
		));

		// Get all posts from WP and loop through WP posts
		if ( have_posts() ) : while ( have_posts() ) : the_post();

			// Get post categories and save to html-friendly string for class
			$post_categories = wp_get_post_terms($post->ID, 'wpsc_product_category');
			$post_cat = "";
			$delimiter = "";
			foreach($post_categories as $category) { 		
				$post_cat .= $delimiter . "shop-";
			    $post_cat .= $category->slug;
			    $delimiter = " ";
			}
			$post_cat .= $delimiter . "category-shop";

			// Add the current post to items array
			$items[] = '
				<div id="product-' . $post->ID . '" class="box col6 row8 ' . $post_cat . '">
					<a href="' . get_permalink($post->ID) . '" alt="' . get_the_title() . '">
						<img src="' . wpsc_the_product_thumbnail(get_option('product_image_width','','default'),get_option('product_image_height'),'','default') . '" />
						<div class="meta">
							<div class="post-title">
								' . get_the_title() . '
							</div>
							<div class="product-price">
								' . wpsc_product_variation_price_available(get_the_ID()) . '
							</div>							
						</div>
					</a>
				</div>' . "\n";

		endwhile; endif;
	}	
	
	if ($type == 'all') {	
				
		// Add Facebook fanbox to items array
		$items[] = '
				<div id="post-fbbox" class="box col6 row8 category-updates category-updates-social" style="background-color: #000;">
					<a href="#">
						<iframe id="f1614db9d8" name="f619b271" scrolling="no" style="border-top-style: none; border-right-style: none; border-bottom-style: none; border-left-style: none; border-width: initial; border-color: initial; overflow-x: hidden; overflow-y: hidden; height: 390px; width: 230px; " class="fb_ltr" src="http://www.facebook.com/plugins/likebox.php?api_key=113869198637480&amp;channel=http%3A%2F%2Fstatic.ak.fbcdn.net%2Fconnect%2Fxd_proxy.php%23cb%3Df148b6f924%26origin%3Dhttp%253A%252F%252Fdevelopers.facebook.com%252Ff19c251008%26relation%3Dparent.parent%26transport%3Dpostmessage&amp;colorscheme=dark&amp;header=false&amp;height=390&amp;href=http%3A%2F%2Ffacebook.com%2Faquestionof&amp;locale=en_US&amp;sdk=joey&amp;show_faces=false&amp;stream=true&amp;width=230"></iframe>
					</a>
				</div>' . "\n";
				
		// Add Mailchimp newsletter signup form box
		$items[] = '
			<div id="post-mcbox" class="box col6 row4 category-updates category-updates-social" style="background-color: #000">
				<!-- Begin MailChimp Signup Form -->
				<div id="mc_embed_signup" style="padding: 10px; margin-top: 115px">
					<div style="color: #fff; margin-bottom: 7px;">Sign up for our newsletter</div>
					<form action="http://aquestionof.us1.list-manage.com/subscribe/post?u=4b158f023b1059770a5f4ff44&amp;id=b1ea1a5e55" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" target="_blank">
						<input type="text" value="E-mail address" name="EMAIL" style="width: 100px">
						<input type="submit" value="Subscribe" name="subscribe" id="mce-embedded-subscribe">
					</form>
				</div>
				<!--End mc_embed_signup-->
			</div>' . "\n";
	}

	// Shuffle all items and return
	shuffle($items);
	$items = array_merge($pri_items, $items);
	return $items;
}

// Create a nivo gallery from product pages
function nivo_get_images($product_id = null, $size = 'medium', $limit = '0', $offset = '0') {
	global $post;
 
	$images = get_children(array(
		'post_parent' => $product_id,
		'post_status' => 'inherit', 
		'post_type' => 'attachment', 
		'post_mime_type' => 'image', 
		'order' => 'ASC', 
		'orderby' => 'menu_order ID'));
 
	if ($images) {
 
		$num_of_images = count($images);
 
		if ($offset > 0) : $start = $offset--; else : $start = 0; endif;
		if ($limit > 0) : $stop = $limit+$start; else : $stop = $num_of_images; endif;
 
		$i = 0;
		foreach ($images as $image) {
			if ($start <= $i and $i < $stop) {
				$img_title = $image->post_title;   // title.
				$img_description = $image->post_content; // description.
				$img_caption = $image->post_excerpt; // caption.
				$img_url = wp_get_attachment_url($image->ID); // url of the full size image.
				$preview_array = image_downsize( $image->ID, $size );
	 			$img_preview = $preview_array[0]; // thumbnail or medium image to use for preview.
	 			?>
					<img id="product_image_<?php echo $product_id . '_' . $i ; ?>" class="product_image" src="<?php echo $img_preview; ?>" alt="<?php echo $img_caption; ?>" />
				<?
				}
			$i++;
		} 
	}
}

?>