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
				
				<div class="cards">
					<img src="<?php echo CHILD_THEME_URI . '/library/images/cards/visa.gif'; ?>" alt="Visa Card" title="Visa Card" />
					<img src="<?php echo CHILD_THEME_URI . '/library/images/cards/master.gif'; ?>" alt="Master Card" title="Master Card" />		
					<img src="<?php echo CHILD_THEME_URI . '/library/images/cards/maestro.gif'; ?>" alt="Maestro Card" title="Maestro Card" />
				</div>

				<div class="quicklinks"><?php wp_nav_menu(array('theme_location'  => 'footer', 'after' => '|')); ?></div>				
				
				<div class="fb-like">
					<iframe id="ff7511aa" name="f34edd7794" scrolling="no" style="border-width: initial; border-color: initial; overflow-x: hidden; overflow-y: hidden; border-width: initial; border-color: initial; border-width: initial; border-color: initial; border-width: initial; border-color: initial; height: 21px; width: 77px; border-top-style: none; border-right-style: none; border-bottom-style: none; border-left-style: none; border-width: initial; border-color: initial; " title="Like this content on Facebook." class="fb_ltr" src="http://www.facebook.com/plugins/like.php?api_key=113869198637480&amp;channel_url=http%3A%2F%2Fstatic.ak.fbcdn.net%2Fconnect%2Fxd_proxy.php%23cb%3Df18b68036c%26origin%3Dhttp%253A%252F%252Fdevelopers.facebook.com%252Ff3903f010%26relation%3Dparent.parent%26transport%3Dpostmessage&amp;colorscheme=dark&amp;font=arial&amp;href=http%3A%2F%2Ffacebook.com%2Faquestionof&amp;layout=button_count&amp;locale=en_US&amp;node_type=link&amp;sdk=joey&amp;show_faces=false&amp;width=77"></iframe>
				</div>								
				
				<div class="meta">A QUESTION OF © All rights reserved, P: +45 31 322 322, E-mail: info@aquestionof.dk</div>
												
			</div><!-- #footer -->
		
		</div><!-- #footer-container -->
	
	</div><!-- #body-container -->
	
	<?php wp_footer(); // WordPress footer hook ?>
	
</body>
</html>