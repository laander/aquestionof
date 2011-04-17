<?php
/**
 * Footer Template
 *
 * Content that's always placed at the bottom of the site
 */
?>	
		</div><!-- #container -->
					
		<div id="footer-container">
		
			<div id="footer">
				
				<div class="meta">A QUESTION OF © All rights reserved, P: +45 31 322 322, E-mail: info@aquestionof.dk</div>
				
				<div class="cards">
					<img src="<?php echo CHILD_THEME_URI . '/library/images/cards/visa.gif'; ?>" alt="Visa Card" title="Visa Card" />
					<img src="<?php echo CHILD_THEME_URI . '/library/images/cards/master.gif'; ?>" alt="Master Card" title="Master Card" />		
					<img src="<?php echo CHILD_THEME_URI . '/library/images/cards/maestro.gif'; ?>" alt="Maestro Card" title="Maestro Card" />
				</div>

				<div class="quicklinks"><?php wp_nav_menu(array('theme_location'  => 'footer', 'after' => '|')); ?></div>
				
			</div><!-- #footer -->
		
		</div><!-- #footer-container -->
	
	</div><!-- #body-container -->
	
	<?php wp_footer(); // WordPress footer hook ?>
	
</body>
</html>