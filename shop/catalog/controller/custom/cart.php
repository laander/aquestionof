<?php 
class ControllerCustomCart extends Controller {
	private $error = array();
	
	// Will fetch all products in the Cart and output number of items and total amount in JSON for WP (see view)	
	public function index() {	
		
		$this->data['action'] = HTTPS_SERVER . 'index.php?route=checkout/cart';
	
		$this->load->model('tool/seo_url'); 
		$this->load->model('tool/image');

  		$this->data['products'] = array();

  		foreach ($this->cart->getProducts() as $result) {
    		$option_data = array();

    		foreach ($result['option'] as $option) {
      			$option_data[] = array(
        			'name'  => $option['name'],
        			'value' => $option['value']
      			);
    		}

			if ($result['image']) {
				$image = $result['image'];
			} else {
				$image = 'no_image.jpg';
			}

    		$this->data['products'][] = array(
      			'key'      => $result['key'],
      			'name'     => $result['name'],
      			'model'    => $result['model'],
      			'thumb'    => $this->model_tool_image->resize($image, $this->config->get('config_image_cart_width'), $this->config->get('config_image_cart_height')),
      			'option'   => $option_data,
      			'quantity' => $result['quantity'],
      			'stock'    => $result['stock'],
			'price'    => $this->currency->format($this->tax->calculate($result['price'], $result['tax_class_id'], $this->config->get('config_tax'))),
			'total'    => $this->currency->format($this->tax->calculate($result['total'], $result['tax_class_id'], $this->config->get('config_tax'))),
			'href'     => $this->model_tool_seo_url->rewrite(HTTP_SERVER . 'index.php?route=product/product&product_id=' . $result['product_id'])
    		);
  		}
		
		if (!$this->config->get('config_customer_price')) {
			$this->data['display_price'] = TRUE;
		} elseif ($this->customer->isLogged()) {
			$this->data['display_price'] = TRUE;
		} else {
			$this->data['display_price'] = FALSE;
		}
		
		if ($this->config->get('config_cart_weight')) {
			$this->data['weight'] = $this->weight->format($this->cart->getWeight(), $this->config->get('config_weight_class'));
		} else {
			$this->data['weight'] = FALSE;
		}
		
  		$total_data = array();
		$total = 0;
		$taxes = $this->cart->getTaxes();
		 
		$this->load->model('checkout/extension');
		
		$sort_order = array(); 
		
		$results = $this->model_checkout_extension->getExtensions('total');
		
		foreach ($results as $key => $value) {
			$sort_order[$key] = $this->config->get($value['key'] . '_sort_order');
		}
		
		array_multisort($sort_order, SORT_ASC, $results);
		
		foreach ($results as $result) {
			$this->load->model('total/' . $result['key']);

			$this->{'model_total_' . $result['key']}->getTotal($total_data, $total, $taxes);
		}
		
		$sort_order = array(); 
	  
		foreach ($total_data as $key => $value) {
  			$sort_order[$key] = $value['sort_order'];
		}

		array_multisort($sort_order, SORT_ASC, $total_data);

		$this->data['totals'] = $total_data;
		
		if (isset($this->session->data['redirect'])) {
  			$this->data['continue'] = $this->session->data['redirect'];
			
			unset($this->session->data['redirect']);
		} else {
			$this->data['continue'] = HTTP_SERVER . 'index.php?route=common/home';
		}
		
		$this->data['checkout'] = HTTPS_SERVER . 'index.php?route=checkout/shipping';
		
		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/custom/json_cart.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/custom/json_cart.tpl';
		} else {
			$this->template = 'default/template/checkout/cart.tpl';
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
