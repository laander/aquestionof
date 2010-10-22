<?php 
class ControllerCommonMenu extends Controller {  
	public function index() { 
		

   		
				if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/common/menu.tpl')) {
					$this->template = $this->config->get('config_template') . '/template/common/menu.tpl';
				} else {
					$this->template = 'default/template/product/category.tpl';
				}	
				
				$this->children = array(
					'common/column_right',
					'common/column_left',
					'common/footer',
					'common/header'
				);
		
				$this->response->setOutput($this->render(TRUE), $this->config->get('config_compression'));   		


		

  	}
}
?>
