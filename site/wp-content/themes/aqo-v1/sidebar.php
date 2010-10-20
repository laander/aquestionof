<?php
/**
 * Template: Sidebar.php
 *
 * @package WPFramework
 * @subpackage Template
 */
?>
        <!--BEGIN #secondary .aside-->
        <div id="secondary" class="aside">
        
			<?php if ( has_post_thumbnail() ) { ?>
	            <div id="widget-image" class="widget"><?php the_post_thumbnail(array(248,426)); ?></div>
			<?php } ?>
			
		<!--END #secondary .aside-->
		</div>