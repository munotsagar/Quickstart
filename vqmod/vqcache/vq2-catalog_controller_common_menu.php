<?php
class ControllerCommonMenu extends Controller {
	public function index() {
		$this->load->language('common/menu');

        $data['blog'] = $this->url->link('extension/module/blog');
      

		// Menu
		$this->load->model('catalog/category');

		$this->load->model('catalog/product');
		//wishlist
		if ($this->customer->isLogged()) {
			$this->load->model('account/wishlist');

			$data['text_wishlist'] = sprintf($this->language->get('text_wishlist'), $this->model_account_wishlist->getTotalWishlist());
		} else {
			$data['text_wishlist'] = sprintf($this->language->get('text_wishlist'), (isset($this->session->data['wishlist']) ? count($this->session->data['wishlist']) : 0));
		}
		$data['categories'] = array();
 
			$data['manufacturer'] = $this->url->link('product/manufacturer');
			$data['voucher'] = $this->url->link('account/voucher', '', true);
			$data['order_history'] = $this->url->link('account/order');
			$data['checkout'] = $this->url->link('checkout/checkout');
			$data['newsletter'] = $this->url->link('account/newsletter');
			$data['info'] = $this->url->link('information/information');
			$data['logout'] = $this->url->link('account/logout');
			$data['cart'] = $this->url->link('checkout/cart');
			$data['wishlist'] = $this->url->link('account/wishlist');
			$data['account_login'] = $this->url->link('account/login');
			$data['account'] = $this->url->link('account/account');
			$data['transaction'] = $this->url->link('account/transaction');
			$data['contact'] = $this->url->link('information/contact');
			$sql ="SELECT * FROM freshfood_configuration";
			$query = $this->db->query($sql);
	        $configure = $query->row;
			$data['homepage'] = $configure['homepage'];
		
		
			

		$categories = $this->model_catalog_category->getCategories(0);  

		foreach ($categories as $category) {
			if ($category['top']) {
				// Level 2
				$children_data = array();

				$children = $this->model_catalog_category->getCategories($category['category_id']);
		 
				foreach ($children as $child) {
					$filter_data = array(
						'filter_category_id'  => $child['category_id'],
						'filter_sub_category' => true
					);

					$children_data[] = array(
						'name'  => $child['name'] . ($this->config->get('config_product_count') ? ' (' . $this->model_catalog_product->getTotalProducts($filter_data) . ')' : ''),
						'href'  => $this->url->link('product/category', 'path=' . $category['category_id'] . '_' . $child['category_id'])
					);
				}

				// Level 1
				$data['categories'][] = array(
					'name'     => $category['name'],
					'children' => $children_data,
					'column'   => $category['column'] ? $category['column'] : 1,
					'href'     => $this->url->link('product/category', 'path=' . $category['category_id'])
				);
				
			}
		}

		return $this->load->view('common/menu', $data);
	}
}
