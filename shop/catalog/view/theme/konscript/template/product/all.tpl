<?php echo $header; ?><?php echo $column_right; ?>
<script type="text/javascript" src="catalog/view/javascript/jquery/all/jquery.quicksand.min.js" type="text/javascript"></script> 
<script type="text/javascript" src="catalog/view/javascript/jquery/all/all.js" type="text/javascript"></script>

<div id="content">
	<ul class="grid">
	<?php foreach($products as $productid=>$product){ ?>
		
	  <li data-id="<?php echo $productid ?>" data-type="<?php echo $product["category_id"] ?>" data-type="24">
	    <a href="<?php echo $product["href"]?>"><img src="<?php echo $product["thumb"] ?>" width="128" height="128" alt="" /></a>
	    <strong><?php echo $product["name"] ?></strong>
	    <span data-type="size"><?php echo $product["price"] ?></span>
	  </li>
	<?php
	
	} ?>
	</ul>
 </div>
<?php echo $footer; ?>
