<?php
/**
 * Single Post Template
 *
 * This template is the default post template. It is used to display content when someone is viewing a
 * singular view of a post ('post' post_type) unless another template overrules this one.
 */

get_header(); ?>

	<div id="content" class="hfeed content">

		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

			<div id="post-<?php the_ID(); ?>" class="<?php hybrid_entry_class(); ?>">
				
				<div class="featured-image">
					<?php if (class_exists('MultiPostThumbnails') && MultiPostThumbnails::has_post_thumbnail('post', 'secondary-image')) {
						MultiPostThumbnails::the_post_thumbnail('post', 'secondary-image', NULL, 'post-secondary-image-thumbnail');					
					} else {
						the_post_thumbnail( $post->ID, 'large' );
					} ?>
				</div>
				
				<div class="entry-content entry-with-sidebar">
					
					<?php $custom_fields = get_post_custom($post->ID); ?>

					<?php // Related Posts box						
						if (isset($custom_fields['related-post'])) {
								
							$tmp_post = $post;
							$related_post_field = $custom_fields['related-post'];
							$related_post = get_post($related_post_field[0]);
							
							$related_post_custom_fields = get_post_custom($related_post->ID);
							if (isset($related_post_custom_fields['height'])) { $item_height = $related_post_custom_fields['height'][0] * 4; }
							else { $item_height = 4; }
							
							$related_post = '
								<div class="related-post-title">Related</div>
								<div class="related-post box row' . $item_height . '">
									<a href="' . get_permalink($related_post->ID) . '">
										'.  get_the_post_thumbnail($related_post->ID, 'large') .'
										<div class="meta">
											<div class="post-title">
												' . get_the_title($related_post->ID) . '
											</div>
										</div>
									</a>
								</div>' . "\n";
							echo $related_post;
							$post = $tmp_post;						
					?>	
					<?php } ?>
					
					<?php // Related Products box
						if (isset($custom_fields['related-product'])) { ?>
							<div class="related-product box"></div>
					<?php } ?>
													
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