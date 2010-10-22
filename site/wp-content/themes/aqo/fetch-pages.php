<?php
/**
 * Template Name: Custom Fetch Pages
 *
 * @package Hybrid
 * @subpackage Template
 */
?>

<ul>
	<?php query_posts(array('post_type' => 'page'));		
	if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>		

		<li id="post-<?php the_ID(); ?>">
			<?php the_title(); ?>
		</li>
		
	<?php endwhile; ?><?php endif; ?>
</ul>