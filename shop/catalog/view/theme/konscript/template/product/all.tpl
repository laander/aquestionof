<?php echo $header; ?><?php echo $column_left; ?><?php echo $column_right; ?>
<style type="text/css">
a.selected {
	background-color: #fff;
}
</style>
<script type="text/javascript" src="catalog/view/javascript/jquery/all/jquery.quicksand.min.js" type="text/javascript"></script> 
<script type="text/javascript" src="catalog/view/javascript/jquery/all/all.js" type="text/javascript"></script>

<ul id="applications" class="image-grid">

<?php foreach($products as $productid=>$product){ ?>
	
  <li data-id="<?php echo $productid ?>" data-type="<?php echo $product["category_id"] ?>">
    <img src="<?php echo $product["thumb"] ?>" width="128" height="128" alt="" />
    <strong><?php echo $product["name"] ?></strong>
    <span data-type="size"><?php echo $product["price"] ?></span>
  </li>
<?php

} ?>
</ul>
 
<?php echo $footer; ?>
