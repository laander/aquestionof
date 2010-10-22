<ul>
<?php foreach($products as $productid=>$product){ ?>
	<li data-id="<?php echo $productid ?>"><a
		href="<?php echo $product["href"]?>"><img
		src="<?php echo $product["thumb"] ?>" width="128" height="128" alt="" /></a>
	<strong><?php echo $product["name"] ?></strong> <span data-type="size"><?php echo $product["price"] ?></span>
	</li>
	<?php } ?>
</ul>
