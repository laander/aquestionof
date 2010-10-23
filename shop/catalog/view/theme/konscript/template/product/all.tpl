<?php 
$itemArray = array();
$itemOutput = "<ul>";
foreach($products as $productid=>$product){
	$item = '
	<li data-id="'.$productid.'"><a
		href="'.$product["href"].'"><img
		src="'.$product["thumb"].'" width="128" height="128" alt="" /></a>
	<strong>'.$product["name"].'</strong> <span data-type="size">'.$product["price"].'</span>
	</li>';	
	
	if($_GET["type"]=="array"){
		$itemArray[] = $item;
	}else{
		$itemOutput .= $item;
	}
}
$itemOutput .= "</ul>";

if($_GET["type"]=="array"){
	echo serialize($itemArray);
}else{
	echo $itemOutput;
}
?>