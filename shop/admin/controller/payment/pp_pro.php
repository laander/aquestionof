<?php 
class ControllerPaymentPPPro extends Controller {
	private $error = array(); 

	public function index() {
		$this->load->language('payment/pp_pro');

		$this->document->title = $this->language->get('heading_title');
		
		$this->load->model('setting/setting');
			
		if (($this->request->server['REQUEST_METHOD'] == 'POST') && ($this->validate())) {
			$this->load->model('setting/setting');
			
			$this->model_setting_setting->editSetting('pp_pro', $this->request->post);				
			
			$this->session->data['success'] = $this->language->get('text_success');

			$this->redirect(HTTPS_SERVER . 'index.php?route=extension/payment&token=' . $this->session->data['token']);
		}

		$this->data['heading_title'] = $this->language->get('heading_title');

		$this->data['text_enabled'] = $this->language->get('text_enabled');
		$this->data['text_disabled'] = $this->language->get('text_disabled');
		$this->data['text_all_zones'] = $this->language->get('text_all_zones');
		$this->data['text_yes'] = $this->language->get('text_yes');
		$this->data['text_no'] = $this->language->get('text_no');
		$this->data['text_authorization'] = $this->language->get('text_authorization');
		$this->data['text_sale'] = $this->language->get('text_sale');
		
		$this->data['entry_username'] = $this->language->get('entry_username');
		$this->data['entry_password'] = $this->language->get('entry_password');
		$this->data['entry_signature'] = $this->language->get('entry_signature');
		$this->data['entry_test'] = $this->language->get('entry_test');
		$this->data['entry_transaction'] = $this->language->get('entry_transaction');
		$this->data['entry_order_status'] = $this->language->get('entry_order_status');		
		$this->data['entry_geo_zone'] = $this->language->get('entry_geo_zone');
		$this->data['entry_status'] = $this->language->get('entry_status');
		$this->data['entry_sort_order'] = $this->language->get('entry_sort_order');
		
		$this->data['button_save'] = $this->language->get('button_save');
		$this->data['button_cancel'] = $this->language->get('button_cancel');

		$this->data['tab_general'] = $this->language->get('tab_general');

 		if (isset($this->error['warning'])) {
			$this->data['error_warning'] = $this->error['warning'];
		} else {
			$this->data['error_warning'] = '';
		}

 		if (isset($this->error['username'])) {
			$this->data['error_username'] = $this->error['username'];
		} else {
			$this->data['error_username'] = '';
		}
		
 		if (isset($this->error['password'])) {
			$this->data['error_password'] = $this->error['password'];
		} else {
			$this->data['error_password'] = '';
		}
		
 		if (isset($this->error['signature'])) {
			$this->data['error_signature'] = $this->error['signature'];
		} else {
			$this->data['error_signature'] = '';
		}

		$this->document->breadcrumbs = array();

   		$this->document->breadcrumbs[] = array(
       		'href'      => HTTPS_SERVER . 'index.php?route=common/home&token=' . $this->session->data['token'],
       		'text'      => $this->language->get('text_home'),
      		'separator' => FALSE
   		);

   		$this->document->breadcrumbs[] = array(
       		'href'      => HTTPS_SERVER . 'index.php?route=extension/payment&token=' . $this->session->data['token'],
       		'text'      => $this->language->get('text_payment'),
      		'separator' => ' :: '
   		);

   		$this->document->breadcrumbs[] = array(
       		'href'      => HTTPS_SERVER . 'index.php?route=payment/pp_pro&token=' . $this->session->data['token'],
       		'text'      => $this->language->get('heading_title'),
      		'separator' => ' :: '
   		);
				
		$this->data['action'] = HTTPS_SERVER . 'index.php?route=payment/pp_pro&token=' . $this->session->data['token'];
		
		$this->data['cancel'] = HTTPS_SERVER . 'index.php?route=extension/payment&token=' . $this->session->data['token'];

		if (isset($this->request->post['pp_pro_username'])) {
			$this->data['pp_pro_username'] = $this->request->post['pp_pro_username'];
		} else {
			$this->data['pp_pro_username'] = $this->config->get('pp_pro_username');
		}
		
		if (isset($this->request->post['pp_pro_password'])) {
			$this->data['pp_pro_password'] = $this->request->post['pp_pro_password'];
		} else {
			$this->data['pp_pro_password'] = $this->config->get('pp_pro_password');
		}
		
		if (isset($this->request->post['pp_pro_signature'])) {
			$this->data['pp_pro_signature'] = $this->request->post['pp_pro_signature'];
		} else {
			$this->data['pp_pro_signature'] = $this->config->get('pp_pro_signature');
		}
		
		if (isset($this->request->post['pp_pro_test'])) {
			$this->data['pp_pro_test'] = $this->request->post['pp_pro_test'];
		} else {
			$this->data['pp_pro_test'] = $this->config->get('pp_pro_test');
		}
		
		if (isset($this->request->post['pp_pro_method'])) {
			$this->data['pp_pro_transaction'] = $this->request->post['pp_pro_transaction'];
		} else {
			$this->data['pp_pro_transaction'] = $this->config->get('pp_pro_transaction');
		}
		
		if (isset($this->request->post['pp_pro_order_status_id'])) {
			$this->data['pp_pro_order_status_id'] = $this->request->post['pp_pro_order_status_id'];
		} else {
			$this->data['pp_pro_order_status_id'] = $this->config->get('pp_pro_order_status_id'); 
		} 

		$this->load->model('localisation/order_status');
		
		$this->data['order_statuses'] = $this->model_localisation_order_status->getOrderStatuses();
		
		if (isset($this->request->post['pp_pro_geo_zone_id'])) {
			$this->data['pp_pro_geo_zone_id'] = $this->request->post['pp_pro_geo_zone_id'];
		} else {
			$this->data['pp_pro_geo_zone_id'] = $this->config->get('pp_pro_geo_zone_id'); 
		} 
		
		$this->load->model('localisation/geo_zone');
										
		$this->data['geo_zones'] = $this->model_localisation_geo_zone->getGeoZones();
		
		if (isset($this->request->post['pp_pro_status'])) {
			$this->data['pp_pro_status'] = $this->request->post['pp_pro_status'];
		} else {
			$this->data['pp_pro_status'] = $this->config->get('pp_pro_status');
		}
		
		if (isset($this->request->post['pp_pro_sort_order'])) {
			$this->data['pp_pro_sort_order'] = $this->request->post['pp_pro_sort_order'];
		} else {
			$this->data['pp_pro_sort_order'] = $this->config->get('pp_pro_sort_order');
		}
		
		$this->template = 'payment/pp_pro.tpl';
		$this->children = array(
			'common/header',	
			'common/footer'	
		);
		
		$this->response->setOutput($this->render(TRUE), $this->config->get('config_compression'));
	}

	private function validate() {
		if (!$this->user->hasPermission('modify', 'payment/pp_pro')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}
		
		if (!$this->request->post['pp_pro_username']) {
			$this->error['username'] = $this->language->get('error_username');
		}

		if (!$this->request->post['pp_pro_password']) {
			$this->error['password'] = $this->language->get('error_password');
		}

		if (!$this->request->post['pp_pro_signature']) {
			$this->error['signature'] = $this->language->get('error_signature');
		}
		
		if (!$this->error) {
			return TRUE;
		} else {
			return FALSE;
		}	
	}
}
?>