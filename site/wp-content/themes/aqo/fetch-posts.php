<?php
/**
 * Template Name: Custom Fetch Posts
 *
 * @package Hybrid
 * @subpackage Template
 */
?>

<ul>
	<?php query_posts(array('post_type' => 'post', 'posts_per_page' => -1));			
	if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

		<li data-id="post-<?php the_ID(); ?>">
			<?php the_title(); ?>
		</li><!-- .hentry -->
	
	<?php endwhile; ?><?php endif; ?>		
</ul>

