<?php
class ControllerProductAll extends Controller {
	public function index() {
    	$this->language->load('product/all');

    	$this->document->title = $this->language->get('heading_title');

		$this->document->breadcrumbs = array();

   		$this->document->breadcrumbs[] = array(
       		'href'      => (HTTP_SERVER . 'index.php?route=common/home'),
       		'text'      => $this->language->get('text_home'),
      		'separator' => FALSE
   		);

		$url = '';

		if (isset($this->request->get['limit'])) {
			$url .= '&limit=' . $this->request->get['limit'];
		}

		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}

   		$this->document->breadcrumbs[] = array(
       		'href'      => (HTTP_SERVER . 'index.php?route=product/all' . $url),
       		'text'      => $this->language->get('heading_title'),
      		'separator' => $this->language->get('text_separator')
   		);

    	$this->data['heading_title'] = $this->language->get('heading_title');

		$this->data['text_sort'] = $this->language->get('text_sort');
		$this->data['text_limit'] = $this->language->get('text_limit');

  		if (isset($this->request->get['page'])) {
			$page = $this->request->get['page'];
		} else {
			$page = 1;
		}

		if (isset($this->request->get['sort'])) {
			$sort = $this->request->get['sort'];
		} else {
			$sort = 'pd.name';
		}

		if (isset($this->request->get['order'])) {
			$order = $this->request->get['order'];
		} else {
			$order = 'ASC';
		}

		if (isset($this->request->get['limit'])) {
			$limit = $this->request->get['limit'];
		} else {
			$limit = '100';
		}

		$this->load->model('catalog/product');
		$this->load->model('catalog/all');

		$product_total = $this->model_catalog_all->getTotalProducts();

		if ($product_total) {
			$url = '';

			$this->load->model('catalog/review');
			$this->load->model('tool/seo_url');
			$this->load->model('tool/image');

			$this->data['button_add_to_cart'] = $this->language->get('button_add_to_cart');

       		$this->data['products'] = array();

			$results = $this->model_catalog_all->getAllProducts($sort, $order, ($page - 1) * $limit, $limit);

			foreach ($results as $result) {
				if ($result['image']) {
					$image = $result['image'];
				} else {
					$image = 'no_image.jpg';
				}

				if ($this->config->get('config_review')) {
					$rating = $this->model_catalog_review->getAverageRating($result['product_id']);
				} else {
					$rating = false;
				}

				$options = $this->model_catalog_product->getProductOptions($result['product_id']);

				if ($options) {
					$add = $this->model_tool_seo_url->rewrite(HTTP_SERVER . 'index.php?route=product/product&product_id=' . $result['product_id']);
				} else {
					$add = HTTPS_SERVER . 'index.php?route=checkout/cart&product_id=' . $result['product_id'];
				}

				$special = $this->model_catalog_product->getProductSpecial($result['product_id']);

				if ($special) {
					$special = $this->currency->format($this->tax->calculate($special, $result['tax_class_id'], $this->config->get('config_tax')));
				} else {
					$special = FALSE;
				}		
				$this->data['products'][] = array(
           			'name'    => $result['name'],
					'model'   => $result['model'],
					'rating'  => $rating,
					'stars'   => sprintf($this->language->get('text_stars'), $rating),
					'thumb'   => (class_exists('HelperImage')) ? HelperImage::resize($image, $this->config->get('config_image_product_width'), $this->config->get('config_image_product_height')) : (class_exists('ModelToolImage')) ? $this->model_tool_image->resize($image, $this->config->get('config_image_product_width'), $this->config->get('config_image_product_height')) : image_resize($image, $this->config->get('config_image_product_width'), $this->config->get('config_image_product_height')),
           			'price'   => $this->currency->format($this->tax->calculate($result['price'], $result['tax_class_id'], $this->config->get('config_tax'))),
					'special' => $special,
					'href'    => $this->model_tool_seo_url->rewrite((HTTP_SERVER . 'index.php?route=product/product' . $url . '&product_id=' . $result['product_id'])),
					'add'     => $add,
					'category_id'     => $result['category_id']
       			);
        	}

			if (!$this->config->get('config_customer_price')) {
				$this->data['display_price'] = TRUE;
			} elseif ($this->customer->isLogged()) {
				$this->data['display_price'] = TRUE;
			} else {
				$this->data['display_price'] = FALSE;
			}

			$url = '';
			if (isset($this->request->get['limit'])) {
				$url = '&limit=' . $this->request->get['limit'];
			}

			$this->data['sorts'] = array();

			$this->data['sorts'][] = array(
				'text'  => $this->language->get('text_name_asc'),
				'value' => 'pd.name',
				'href'  => (HTTP_SERVER . 'index.php?route=product/all' . $url . '&sort=pd.name')
			);

			$this->data['sorts'][] = array(
				'text'  => $this->language->get('text_name_desc'),
				'value' => 'pd.name-DESC',
				'href'  => (HTTP_SERVER . 'index.php?route=product/all' . $url . '&sort=pd.name&order=DESC')
			);

			$this->data['sorts'][] = array(
				'text'  => $this->language->get('text_price_asc'),
				'value' => 'p.price-ASC',
				'href'  => (HTTP_SERVER . 'index.php?route=product/all' . $url . '&sort=p.price&order=ASC')
			);

			$this->data['sorts'][] = array(
				'text'  => $this->language->get('text_price_desc'),
				'value' => 'p.price-DESC',
				'href'  => (HTTP_SERVER . 'index.php?route=product/all' . $url . '&sort=p.price&order=DESC')
			);

			$this->data['sorts'][] = array(
				'text'  => $this->language->get('text_rating_desc'),
				'value' => 'rating-DESC',
				'href'  => (HTTP_SERVER . 'index.php?route=product/all' . $url . '&sort=rating&order=DESC')
			);

			$this->data['sorts'][] = array(
				'text'  => $this->language->get('text_rating_asc'),
				'value' => 'rating-ASC',
				'href'  => (HTTP_SERVER . 'index.php?route=product/all' . $url . '&sort=rating&order=ASC')
			);


			$this->data['sorts'][] = array(
				'text'  => $this->language->get('text_newest'),
				'value' => 'p.date_available-DESC',
				'href'  => (HTTP_SERVER . 'index.php?route=product/all' . $url . '&sort=p.date_available&order=DESC')
			);

			$this->data['sorts'][] = array(
				'text'  => $this->language->get('text_oldest'),
				'value' => 'p.date_available-ASC',
				'href'  => (HTTP_SERVER . 'index.php?route=product/all' . $url . '&sort=p.date_available&order=ASC')
			);

			$url = '';
			if (isset($this->request->get['sort'])) {
				$url = '&sort=' . $this->request->get['sort']. '&order=' . $this->request->get['order'];
			}

			$this->data['limits'] = array();

			$this->data['limits'][] = array(
				'text'  => '16',
				'value' => '16',
				'href'  => (HTTP_SERVER . 'index.php?route=product/all' . $url . '&limit=16')
			);

			$this->data['limits'][] = array(
				'text'  => '32',
				'value' => '32',
				'href'  => (HTTP_SERVER . 'index.php?route=product/all' . $url . '&limit=32')
			);

			$this->data['limits'][] = array(
				'text'  => '64',
				'value' => '64',
				'href'  => (HTTP_SERVER . 'index.php?route=product/all' . $url . '&limit=64')
			);

			$this->data['limits'][] = array(
				'text'  => '100',
				'value' => '100',
				'href'  => (HTTP_SERVER . 'index.php?route=product/all' . $url . '&limit=100')
			);

			$url = '';

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['limit'])) {
				$url .= '&limit=' . $this->request->get['limit'];
			}

			if (isset($this->request->get['page']) && $product_total < $limit) {
				$url .= '&page=' . $this->request->get['page'];
			}

/*
			$pagination = new Pagination();
			$pagination->total = $product_total;
			$pagination->page = $page;
			$pagination->limit = $limit;
			$pagination->text = $this->language->get('text_pagination');
			$pagination->url = HTTP_SERVER . 'index.php?route=product/all' . $url . '&page={page}';
			$this->data['pagination'] = $pagination->render();
*/

			$this->data['sort'] = $sort;
			$this->data['order'] = $order;
			$this->data['limit'] = $limit;

			$this->id       = 'content';

			if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/product/all.tpl')) {
				$this->template = $this->config->get('config_template') . '/template/product/all.tpl';
			} else {
				$this->template = 'default/template/product/all.tpl';
			}

			$this->children = array(
				'common/column_right',
				'common/column_left',
				'common/footer',
				'common/header'
			);

			$this->response->setOutput($this->render(TRUE), $this->config->get('config_compression'));
		} else {
      		$this->data['text_error'] = $this->language->get('text_empty');

      		$this->data['button_continue'] = $this->language->get('button_continue');

      		$this->data['continue'] = (HTTP_SERVER . 'index.php?route=common/home');

			$this->id       = 'content';

			if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/error/not_found.tpl')) {
				$this->template = $this->config->get('config_template') . '/template/error/not_found.tpl';
			} else {
				$this->template = 'default/template/error/not_found.tpl';
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
}
?>
