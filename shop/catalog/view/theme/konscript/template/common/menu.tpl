    <?php      
	//$this->load->model('tool/seo_url');
	$results = $this->model_catalog_category->getCategories();

	$output = '<p id="grid-navigation">';
	
	$output .= '<a class="gridButton" href="index.php?route=product/all">All</a> ';
	foreach ($results as $result) {

		$route = isset($_GET["route"]) ? $_GET["route"] : "";
		$link = $route!="product/all" ? '<a class="gridButton" href="index.php?route=product/category&path='.$result["category_id"].'">'.$result['name'].'</a> ' : '<a href="index.php?route=product/all&path='.$result["category_id"].'">'.$result['name'].'</a> ';   
		
		$new_path = $result['category_id'];
		$unrewritten = HTTP_SERVER.'index.php?route=product/category&path='.$new_path;
		$rewritten = $this->model_tool_seo_url->rewrite($unrewritten);	
 		$output .= $link;
	}
	$output .= "</p>";   
	echo $output;
	?>   