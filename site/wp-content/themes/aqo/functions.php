<?php
/**
 * Functions File
 *
 * @package Skeleton
 * @subpackage Functions
 */

// load_child_theme_textdomain( 'skeleton', get_stylesheet_directory() . '/languages' );
// add_action( 'action_hook_name','custom_function_name' );
// add_filter( 'filter_hook_name', 'custom_function_name' );

/* Load newest jQuery distribution */
add_filter( 'hybrid_head', 'load_jquery', 10, 1 );
function load_jquery() {
	
	if( !is_admin()){
	   wp_deregister_script('jquery'); 
	   wp_register_script('jquery', (CHILD_THEME_URI . '/library/js/jquery-1.4.2.min.js'), false, '1.4.2'); 
	   wp_enqueue_script('jquery');
	}
	
}

// Add a site logo in the hybrid site title hook
add_filter( 'hybrid_site_title', 'custom_site_title', 10, 1 );
function custom_site_title() {

	$out = 
	'<div id="site-title">
		<a href="' . home_url() . '" title="' . $title . '" rel="home">
			<img id="logo" src="' . CHILD_THEME_URI . '/library/images/logo.png' . '" />
			<span>' . get_bloginfo( 'name' ) . '</span>
		</a>
	</div>';
	echo $out;
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


?>