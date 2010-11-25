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
				
		<div id="bar-container">
			<div id="bar">
				<ul id="primary-menu">
					
					<li>
						<a class="gridButton topcat" href="category/about">ABOUT</a>
						<a class="gridButton subcat" href="category/about/contact">Contact</a>
						<a class="gridButton subcat" href="category/about/social-responsibility">Social Responsibility</a>
						<a class="gridButton subcat" href="category/about/who-we-are">Who We Are</a>					
					</li>
					
					<li>
						<a class="gridButton topcat" href="category/media">MEDIA</a>
						<a class="gridButton subcat" href="category/media/campaigns">Campaigns</a>
						<a class="gridButton subcat" href="category/media/press">Press</a>
						<a class="gridButton subcat" href="category/media/social">Social</a>					
					</li>

					<li>
						<a class="gridButton topcat" href="category/creatives">CREATIVES</a>
						<a class="gridButton subcat" href="category/creatives/creative-team">Creative Team</a>
						<a class="gridButton subcat" href="category/creatives/join-us">Join Us</a>					
					</li>
					
					<li>
						<a class="gridButton topcat" href="shop/index.php?route=product/all" id="cat_store">STORE</a>
						<a class="gridButton subcat" href="shop/index.php?route=product/category&path=20">Men</a>
						<a class="gridButton subcat" href="shop/index.php?route=product/category&path=18">Women</a>					
					</li>
				
				</ul>
				
				<div class="fb-like">
					<iframe src="http://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.facebook.com%2FAQUESTIONOF&amp;layout=box_count&amp;show_faces=true&amp;width=100&amp;action=like&amp;font=arial&amp;colorscheme=light&amp;height=200" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:100px; height:200px;" allowTransparency="true"></iframe>							</div>				
							
			</div>
		</div>		
	
		<div id="footer-container">
	
			<?php //hybrid_before_footer(); // Before footer hook ?>
	
			<div id="footer">
	
				<?php hybrid_footer(); // Hybrid footer hook ?>
	
			</div><!-- #footer -->
	
			<?php //hybrid_after_footer(); // After footer hook ?>
	
		</div><!-- #footer-container -->
	
	</div><!-- #body-container -->
	
	<?php wp_footer(); // WordPress footer hook ?>
	<?php //hybrid_after_html(); // After HTML hook ?>
	
</body>
</html>