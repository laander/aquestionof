<?php

$totalAmount = 0;
$numberOfItems = 0;

if (isset($products) && !empty($products)) {
	foreach($products as $product){
		$numberOfItems += $product["quantity"];
		$totalAmount += $product["total"];
	}
}

$json = json_encode(compact("numberOfItems", "totalAmount"));
echo $json;

?>
