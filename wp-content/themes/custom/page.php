<?php
/**
 * Page Template
 */

get_header(); ?>

	<div id="content" class="hfeed content">

		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

			<div id="page-<?php the_ID(); ?>" class="<?php hybrid_entry_class(); ?>">
				
				<div class="entry-content">
																		
					<h1><?php the_title(); ?></h1>
					<?php the_content(); ?>

				</div><!-- .entry-content -->

			</div><!-- .hentry -->

			<?php //comments_template( '/comments.php', true ); ?>

			<?php endwhile; ?>

		<?php else : ?>

			<p class="no-data">
				<?php _e( 'Apologies, but no results were found.', 'hybrid' ); ?>
			</p><!-- .no-data -->

		<?php endif; ?>

	</div><!-- .content .hfeed -->

<?php get_footer(); ?>