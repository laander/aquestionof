<?php
/**
 * Fetches posts based on current category selection
 *
 * @package Hybrid
 * @subpackage Template
 */
?>

<ul>
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

		<li id="post-<?php the_ID(); ?>" class="<?php hybrid_entry_class(); ?>">
			<?php the_title(); ?>
		</li><!-- .hentry -->
	
	<?php endwhile; ?><?php endif; ?>	
</ul>

