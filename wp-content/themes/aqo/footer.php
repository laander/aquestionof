<?php
/**
 * Footer Template
 *
 * @package Hybrid
 * @subpackage Template
 */
?>
			<?php //hybrid_after_container(); // After container hook ?>
	
		</div><!-- #container -->
					
		<div id="footer-container">
	
			<?php //hybrid_before_footer(); // Before footer hook ?>
	
			<div id="footer">

				<?php // hybrid_footer(); // Hybrid footer hook ?>
				
				<div class="meta">A QUESTION OF © All rights reserved, P: +45 31 322 322, E-mail: info@aquestionof.dk</div>
				
				<div class="cards">
					<img src="<?php echo CHILD_THEME_URI . '/library/images/cards/visa.gif'; ?>" alt="Visa" />
					<img src="<?php echo CHILD_THEME_URI . '/library/images/cards/dankort.gif'; ?>" alt="Visa" />
					<img src="<?php echo CHILD_THEME_URI . '/library/images/cards/master.gif'; ?>" alt="Visa" />		
				</div>
				
			</div><!-- #footer -->
	
			<?php //hybrid_after_footer(); // After footer hook ?>
	
		</div><!-- #footer-container -->
	
	</div><!-- #body-container -->
	
	<?php wp_footer(); // WordPress footer hook ?>
	<?php //hybrid_after_html(); // After HTML hook ?>
	
</body>
</html>