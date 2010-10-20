<?php
/**
 * Footer Template
 *
 * @package Hybrid
 * @subpackage Template
 */
?>
			<?php hybrid_after_container(); // After container hook ?>
	
		</div><!-- #container -->
	
		<div id="footer-container">
	
			<?php hybrid_before_footer(); // Before footer hook ?>
	
			<div id="footer">
	
				<?php hybrid_footer(); // Hybrid footer hook ?>
	
			</div><!-- #footer -->
	
			<?php hybrid_after_footer(); // After footer hook ?>
	
		</div><!-- #footer-container -->
	
	</div><!-- #body-container -->
	
	<?php wp_footer(); // WordPress footer hook ?>
	<?php hybrid_after_html(); // After HTML hook ?>
	
</body>
</html>