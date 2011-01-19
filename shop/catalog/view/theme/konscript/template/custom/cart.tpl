<?php

$totalAmount = 0;
$numberOfItems = 0;
foreach($products as $product){
	$numberOfItems += $product["quantity"];
	$totalAmount += $product["total"];
}

$cart = json_encode(compact("numberOfItems", "totalAmount"));
echo $cart;

?>
