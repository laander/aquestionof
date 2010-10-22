<?php
class ModelCatalogAll extends Model {
  	public function getTotalProducts() {
		$query = $this->db->query("
			SELECT COUNT(*) AS total FROM " . DB_PREFIX . "product p
			LEFT JOIN " . DB_PREFIX . "product_to_store p2s ON (p.product_id = p2s.product_id)
			WHERE status = '1'
			AND p2s.store_id = '" . (int)$this->config->get('config_store_id') . "'
			AND date_available <= NOW()");

		return $query->row['total'];
	}

  	public function getAllProducts($sort = 'pd.name', $order = 'ASC', $start = 0, $limit = 16) {
  		//LEFT JOIN " . DB_PREFIX . "product_to_category pc on p.product_id=pc.product_id
  		
		$sql = "
			SELECT DISTINCT *, pd.name AS name, p.image, m.name AS manufacturer, ss.name AS stock,
			(SELECT AVG(r.rating) FROM " . DB_PREFIX . "review r WHERE p.product_id = r.product_id GROUP BY r.product_id) AS rating
			FROM " . DB_PREFIX . "product p LEFT JOIN " . DB_PREFIX . "product_description pd ON (p.product_id = pd.product_id)			
			LEFT JOIN " . DB_PREFIX . "manufacturer m ON (p.manufacturer_id = m.manufacturer_id)
			LEFT JOIN " . DB_PREFIX . "stock_status ss ON (p.stock_status_id = ss.stock_status_id)
			LEFT JOIN " . DB_PREFIX . "product_to_store p2s ON (p.product_id = p2s.product_id)
			WHERE p.status = '1' AND p.date_available <= NOW()
			AND p2s.store_id = '" . (int)$this->config->get('config_store_id') . "'
			AND pd.language_id = '" . (int)((method_exists($this->language, 'getId')) ? (int)$this->language->getId() : (int)$this->config->get('config_language_id')) . "'
			AND ss.language_id = '" . (int)((method_exists($this->language, 'getId')) ? (int)$this->language->getId() : (int)$this->config->get('config_language_id')) . "'";

		$sort_data = array(
			'pd.name',
			'p.price',
			'rating',
			'p.date_available'
		);

		if (in_array($sort, $sort_data)) {
			$sql .= " ORDER BY " . $sort;
		} else {
			$sql .= " ORDER BY pd.name";
		}

		if ($order == 'DESC') {
			$sql .= " DESC";
		} else {
			$sql .= " ASC";
		}

		$sql .= " LIMIT " . (int)$start . "," . (int)$limit;

		$query = $this->db->query($sql);

		return $query->rows;
	}
}
?>
