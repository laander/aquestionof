<?php
/**
 * Template: Category.php
 *
 * @package WPFramework
 * @subpackage Template
 */

get_header();
?>
			<!--BEGIN .blog-categories-->
			<div class="blog-categories">
				<ul><?php wp_list_categories( 'title_li=' ); ?></ul>
			</div>
			<!--END .blog-categories-->

			<!--BEGIN #primary-->
			<div id="primary" class="hfeed">
            <?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : the_post(); ?>
				
				<!--BEGIN .hentry-->
				<div id="post-<?php the_ID(); ?>" class="<?php semantic_entries(); ?>">
					<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h1>

					<!--BEGIN .entry-meta .entry-header-->
					<div class="entry-meta entry-header">
						<span class="author vcard">Written by <?php printf( '<a class="url fn" href="' . get_author_posts_url( $authordata->ID, $authordata->user_nicename ) . '" title="' . sprintf( 'View all posts by %s', $authordata->display_name ) . '">' . get_the_author() . '</a>' ) ?></span>
						<span class="published">on <abbr class="published-time" title="<?php the_time( get_option('date_format') .' - '. get_option('time_format') ); ?>"><?php the_time( get_option('date_format') ); ?></abbr></span>
						<span class="meta-sep">&mdash;</span>
                    	<span class="entry-categories">Also posted in <?php echo framework_get_terms( 'cats' ); ?></span>
						<?php if ( framework_get_terms( 'tags' ) ) { ?>
                        <span class="meta-sep">|</span>
                        <span class="entry-tags">Tagged <?php echo framework_get_terms( 'tags' ); ?></span>
                        <?php } ?>
						<span class="meta-sep">&mdash;</span>						
						<span class="comment-count"><a href="<?php comments_link(); ?>"><?php comments_number( 'Leave a Comment', '1 Comment', '% Comments' ); ?></a></span>
						<?php edit_post_link( 'edit', '<span class="edit-post">[', ']</span>' ); ?>
					<!--END .entry-meta .entry-header-->
                    </div>

					<!--BEGIN .entry-summary .article-->
					<div class="entry-content article">
						<?php the_content(); ?>
					<!--END .entry-summary .article-->
					</div>

				<!--END .hentry-->
				</div>

				<?php endwhile; ?>
				<?php include ( TEMPLATEPATH . '/navigation.php' ); ?>
				<?php else : ?>

				<!--BEGIN #post-0-->
				<div id="post-0" class="<?php semantic_entries(); ?>">
					<h2 class="entry-title">Not Found</h2>

					<!--BEGIN .entry-content-->
					<div class="entry-content">
						<p>Sorry, but you are looking for something that isn't here.</p>
						<?php get_search_form(); ?>
					<!--END .entry-content-->
					</div>
				<!--END #post-0-->
				</div>

			<?php endif; ?>
			<!--END #primary .hfeed-->
			</div>

<?php get_footer(); ?>