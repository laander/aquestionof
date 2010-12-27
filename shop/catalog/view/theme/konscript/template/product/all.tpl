<?php 
$itemArray = array();
$itemOutput = '<ul class="grid">';
foreach($products as $index => $product){
	$product_model_pattern = '/\d+/';
	preg_match($product_model_pattern, $product["model"], $product_id);
	$item = '
	<div id="product-' .$product["id"]. '" class="box col6 row8 category-shop">
		<a href="'.$product["href"].'">
			<img src="'.$product["thumb"].'" width="230" height="320" alt="" />
			<div class="meta">
				<div class="product-title">
					'.$product["name"].'
				</div>
				<div class="product-price">
					'. $product["price"] .'
				</div>
			</div>
		</a>
	</div>';	
	
	if(isset($_GET["type"]) == "array"){
		$itemArray[] = $item;
	}else{
		$itemOutput .= $item;
	}
}
$itemOutput .= "</ul>";

if(isset($_GET["type"]) == "array"){
	echo serialize($itemArray);
}else{
	echo $itemOutput;
}
?>