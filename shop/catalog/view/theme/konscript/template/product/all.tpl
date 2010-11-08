<?php 
$itemArray = array();
$itemOutput = "<ul>";
foreach($products as $index => $product){
	$product_model_pattern = '/\d+/';
	preg_match($product_model_pattern, $product["model"], $product_id);
	$item = '
	<li data-id="product-'. $product_id[0] .'">
		<a href="'.$product["href"].'">
			<img src="'.$product["thumb"].'" width="128" height="128" alt="" />
			<div class="product-title">'.$product["name"].'</div>
		</a>
		<div data-type="size">'.$product["price"].'</div>
	</li>';	
	
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