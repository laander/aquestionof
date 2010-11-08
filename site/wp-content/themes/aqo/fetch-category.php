<?php
/**
 * Fetches posts based on current category selection
 *
 * @package Hybrid
 * @subpackage Template
 */

get_header(); ?>

<ul class="grid">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

		<li data-id="post-<?php the_ID(); ?>" class="<?php hybrid_entry_class(); ?>">
			<div class="post-title">
				<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>			
			</div>
		</li><!-- .hentry -->
	
	<?php endwhile; ?><?php endif; ?>	
</ul>

<?php get_footer(); ?>