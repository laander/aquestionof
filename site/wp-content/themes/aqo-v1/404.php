<?php
/**
 * Template: 404.php
 *
 * @package WPFramework
 * @subpackage Template
 */

header( "HTTP/1.1 404 Not found", true, 404 );
get_header();
?>
			<!--BEGIN #primary .hfeed-->
			<div id="primary" class="hfeed">
				<!--BEGIN #post-0-->
				<div id="post-0" class="<?php semantic_entries(); ?>">
					<h2 class="entry-title">Woops, can't find that t-shirt for you! That's a 404.</h2>
					<img src="<?php echo IMAGES . '/404.jpg'; ?>" />
				<!--END #post-0-->
				</div>
			<!--END #primary .hfeed-->
			</div>

<?php get_footer(); ?>