<?php
/**
 * 404 Template
 *
 * The 404 template is used when a reader visits an invalid URL on your site.
 */

@header( 'HTTP/1.1 404 Not found', true, 404 );

get_header(); ?>

	<div id="content" class="hfeed content">

			<div id="post-0" class="<?php hybrid_entry_class(); ?>">
				
				<span>We couldn't find the page you're looking for. Seems like the greedy page-eating monkeys paid us a visit.</span>

			</div><!-- .hentry -->

	</div><!-- .content .hfeed -->

<?php get_footer(); ?>