<?php
class ControllerAccountCarddet extends Controller {
	private $error = array();

	public function index() {
		if (!$this->customer->isLogged()) {
			$this->session->data['redirect'] = $this->url->link('account/carddet', '', true);

			$this->response->redirect($this->url->link('account/login', '', true));
		}

		$this->load->language('account/carddet');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->document->addScript('catalog/view/javascript/jquery/datetimepicker/moment/moment.min.js');
		$this->document->addScript('catalog/view/javascript/jquery/datetimepicker/moment/moment-with-locales.min.js');
		$this->document->addScript('catalog/view/javascript/jquery/datetimepicker/bootstrap-datetimepicker.min.js');
		$this->document->addStyle('catalog/view/javascript/jquery/datetimepicker/bootstrap-datetimepicker.min.css');


		// if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
		// 	$this->load->model('account/customer');

		// 	$this->model_account_customer->editPassword($this->customer->getEmail(), $this->request->post['password']);

		// 	$this->session->data['success'] = $this->language->get('text_success');

		// 	$this->response->redirect($this->url->link('account/account', '', true));
		// }

		$this->load->model('account/customer');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			$this->model_account_customer->editCard($this->customer->getId(), $this->request->post);

			$this->session->data['success'] = $this->language->get('text_success');

			$this->response->redirect($this->url->link('account/account', '', true));
		}
	$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/home')
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_account'),
			'href' => $this->url->link('account/account', '', true)
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_edit'),
			'href' => $this->url->link('account/carddet', '', true)
		);

		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}

		if (isset($this->error['card1'])) {
			$data['error_card1'] = $this->error['card1'];
		} else {
			$data['error_card1'] = '';
		}
		if (isset($this->error['card2'])) {
			$data['error_card2'] = $this->error['card2'];
		} else {
			$data['error_card2'] = '';
		}
		if (isset($this->error['card3'])) {
			$data['error_card3'] = $this->error['card3'];
		} else {
			$data['error_card3'] = '';
		}


if (isset($this->error['oname1'])) {
			$data['error_oname1'] = $this->error['oname1'];
		} else {
			$data['error_oname1'] = '';
		}
		if (isset($this->error['oname2'])) {
			$data['error_oname2'] = $this->error['oname2'];
		} else {
			$data['error_oname2'] = '';
		}
		if (isset($this->error['oname3'])) {
			$data['error_oname3'] = $this->error['oname3'];
		} else {
			$data['error_oname3'] = '';
		}



if (isset($this->error['crdnum1'])) {
			$data['error_crdnum1'] = $this->error['crdnum1'];
		} else {
			$data['error_crdnum1'] = '';
		}
		if (isset($this->error['crdnum2'])) {
			$data['error_crdnum2'] = $this->error['crdnum2'];
		} else {
			$data['error_crdnum2'] = '';
		}
		if (isset($this->error['crdnum3'])) {
			$data['error_crdnum3'] = $this->error['crdnum3'];
		} else {
			$data['error_crdnum3'] = '';
		}



if (isset($this->error['ccidnum1'])) {
			$data['error_ccidnum1'] = $this->error['ccidnum1'];
		} else {
			$data['error_ccidnum1'] = '';
		}
		if (isset($this->error['ccidnum2'])) {
			$data['error_ccidnum2'] = $this->error['ccidnum2'];
		} else {
			$data['error_ccidnum2'] = '';
		}
		if (isset($this->error['ccidnum3'])) {
			$data['error_ccidnum3'] = $this->error['ccidnum3'];
		} else {
			$data['error_ccidnum3'] = '';
		}

if (isset($this->error['mon1'])) {
			$data['error_mon1'] = $this->error['mon1'];
		} else {
			$data['error_mon1'] = '';
		}
		if (isset($this->error['mon2'])) {
			$data['error_mon2'] = $this->error['mon2'];
		} else {
			$data['error_mon2'] = '';
		}
		if (isset($this->error['mon3'])) {
			$data['error_mon3'] = $this->error['mon3'];
		} else {
			$data['error_mon3'] = '';
		}

if (isset($this->error['yr1'])) {
			$data['error_yr1'] = $this->error['yr1'];
		} else {
			$data['error_yr1'] = '';
		}
		if (isset($this->error['yr2'])) {
			$data['error_yr2'] = $this->error['yr2'];
		} else {
			$data['error_yr2'] = '';
		}
		if (isset($this->error['yr3'])) {
			$data['error_yr3'] = $this->error['yr3'];
		} else {
			$data['error_yr3'] = '';
		}

if (isset($this->error['addn1'])) {
			$data['error_addn1'] = $this->error['addn1'];
		} else {
			$data['error_addn1'] = '';
		}
		if (isset($this->error['addn2'])) {
			$data['error_addn2'] = $this->error['addn2'];
		} else {
			$data['error_addn2'] = '';
		}
		if (isset($this->error['addn3'])) {
			$data['error_addn3'] = $this->error['addn3'];
		} else {
			$data['error_addn3'] = '';
		}


		$data['action'] = $this->url->link('account/carddet', '', true);

		if ($this->request->server['REQUEST_METHOD'] != 'POST') {
			$customer_info = $this->model_account_customer->getCustomer($this->customer->getId());
		}

		if (isset($this->request->post['card1'])) {
			$data['card1'] = $this->request->post['card1'];
		} elseif (!empty($customer_info)) {
			$data['card1'] = $customer_info['card1'];
		} else {
			$data['card1'] = '';
		}

		if (isset($this->request->post['card2'])) {
			$data['card2'] = $this->request->post['card2'];
		} elseif (!empty($customer_info)) {
			$data['card2'] = $customer_info['card2'];
		} else {
			$data['card2'] = '';
		}

		if (isset($this->request->post['card3'])) {
			$data['card3'] = $this->request->post['card3'];
		} elseif (!empty($customer_info)) {
			$data['card3'] = $customer_info['card3'];
		} else {
			$data['card3'] = '';
		}

		if (isset($this->request->post['oname1'])) {
			$data['oname1'] = $this->request->post['oname1'];
		} elseif (!empty($customer_info)) {
			$data['oname1'] = $customer_info['oname1'];
		} else {
			$data['oname1'] = '';
		}

		if (isset($this->request->post['oname2'])) {
			$data['oname2'] = $this->request->post['oname2'];
		} elseif (!empty($customer_info)) {
			$data['oname2'] = $customer_info['oname2'];
		} else {
			$data['oname2'] = '';
		}
		if (isset($this->request->post['oname3'])) {
			$data['oname3'] = $this->request->post['oname3'];
		} elseif (!empty($customer_info)) {
			$data['oname3'] = $customer_info['oname3'];
		} else {
			$data['oname3'] = '';
		}


		if (isset($this->request->post['crdnum1'])) {
			$data['crdnum1'] = $this->request->post['crdnum1'];
		} elseif (!empty($customer_info)) {
			$data['crdnum1'] = $customer_info['crdnum1'];
		} else {
			$data['crdnum1'] = '';
		}

		if (isset($this->request->post['crdnum2'])) {
			$data['crdnum2'] = $this->request->post['crdnum2'];
		} elseif (!empty($customer_info)) {
			$data['crdnum2'] = $customer_info['crdnum2'];
		} else {
			$data['crdnum2'] = '';
		}
		if (isset($this->request->post['crdnum3'])) {
			$data['crdnum3'] = $this->request->post['crdnum3'];
		} elseif (!empty($customer_info)) {
			$data['crdnum3'] = $customer_info['crdnum3'];
		} else {
			$data['crdnum3'] = '';
		}

if (isset($this->request->post['ccidnum1'])) {
			$data['ccidnum1'] = $this->request->post['ccidnum1'];
		} elseif (!empty($customer_info)) {
			$data['ccidnum1'] = $customer_info['ccidnum1'];
		} else {
			$data['ccidnum1'] = '';
		}

		if (isset($this->request->post['ccidnum2'])) {
			$data['ccidnum2'] = $this->request->post['ccidnum2'];
		} elseif (!empty($customer_info)) {
			$data['ccidnum2'] = $customer_info['ccidnum2'];
		} else {
			$data['ccidnum2'] = '';
		}
		if (isset($this->request->post['ccidnum3'])) {
			$data['ccidnum3'] = $this->request->post['ccidnum3'];
		} elseif (!empty($customer_info)) {
			$data['ccidnum3'] = $customer_info['ccidnum3'];
		} else {
			$data['ccidnum3'] = '';
		}


if (isset($this->request->post['mon1'])) {
			$data['mon1'] = $this->request->post['mon1'];
		} elseif (!empty($customer_info)) {
			$data['mon1'] = $customer_info['mon1'];
		} else {
			$data['mon1'] = '';
		}

		if (isset($this->request->post['mon2'])) {
			$data['mon2'] = $this->request->post['mon2'];
		} elseif (!empty($customer_info)) {
			$data['mon2'] = $customer_info['mon2'];
		} else {
			$data['mon2'] = '';
		}
		if (isset($this->request->post['mon3'])) {
			$data['mon3'] = $this->request->post['mon3'];
		} elseif (!empty($customer_info)) {
			$data['mon3'] = $customer_info['mon3'];
		} else {
			$data['mon3'] = '';
		}

if (isset($this->request->post['yr1'])) {
			$data['yr1'] = $this->request->post['yr1'];
		} elseif (!empty($customer_info)) {
			$data['yr1'] = $customer_info['yr1'];
		} else {
			$data['yr1'] = '';
		}

		if (isset($this->request->post['yr2'])) {
			$data['yr2'] = $this->request->post['yr2'];
		} elseif (!empty($customer_info)) {
			$data['yr2'] = $customer_info['yr2'];
		} else {
			$data['yr2'] = '';
		}
		if (isset($this->request->post['yr3'])) {
			$data['yr3'] = $this->request->post['yr3'];
		} elseif (!empty($customer_info)) {
			$data['yr3'] = $customer_info['yr3'];
		} else {
			$data['yr3'] = '';
		}


if (isset($this->request->post['addn1'])) {
			$data['addn1'] = $this->request->post['addn1'];
		} elseif (!empty($customer_info)) {
			$data['addn1'] = $customer_info['addn1'];
		} else {
			$data['addn1'] = '';
		}

		if (isset($this->request->post['addn2'])) {
			$data['addn2'] = $this->request->post['addn2'];
		} elseif (!empty($customer_info)) {
			$data['addn2'] = $customer_info['addn2'];
		} else {
			$data['addn2'] = '';
		}
		if (isset($this->request->post['addn3'])) {
			$data['addn3'] = $this->request->post['addn3'];
		} elseif (!empty($customer_info)) {
			$data['addn3'] = $customer_info['addn3'];
		} else {
			$data['addn3'] = '';
		}


		$data['back'] = $this->url->link('account/account', '', true);

		$data['column_left'] = $this->load->controller('common/column_left');
		$data['column_right'] = $this->load->controller('common/column_right');
		$data['content_top'] = $this->load->controller('common/content_top');
		$data['content_bottom'] = $this->load->controller('common/content_bottom');
		$data['footer'] = $this->load->controller('common/footer');
		$data['header'] = $this->load->controller('common/header');

		$this->response->setOutput($this->load->view('account/carddet', $data));
	}

	protected function validate() {
		if ((utf8_strlen(trim($this->request->post['card1'])) < 0) || (utf8_strlen(trim($this->request->post['card1'])) > 32)) {
			$this->error['card1'] = $this->language->get('error_card1');
		}
		if ((utf8_strlen(trim($this->request->post['card2'])) < 0) || (utf8_strlen(trim($this->request->post['card2'])) > 32)) {
			$this->error['card2'] = $this->language->get('error_card2');
		}
		if ((utf8_strlen(trim($this->request->post['card3'])) < 0) || (utf8_strlen(trim($this->request->post['card3'])) > 32)) {
			$this->error['card3'] = $this->language->get('error_card3');
		}

if ((utf8_strlen(trim($this->request->post['oname1'])) < 0) || (utf8_strlen(trim($this->request->post['oname1'])) > 32)) {
			$this->error['oname1'] = $this->language->get('error_oname1');
		}
		if ((utf8_strlen(trim($this->request->post['oname2'])) < 0) || (utf8_strlen(trim($this->request->post['oname2'])) > 32)) {
			$this->error['oname2'] = $this->language->get('error_oname2');
		}
		if ((utf8_strlen(trim($this->request->post['oname3'])) < 0) || (utf8_strlen(trim($this->request->post['oname3'])) > 32)) {
			$this->error['oname3'] = $this->language->get('error_oname3');
		}

if ((utf8_strlen(trim($this->request->post['crdnum1'])) < 0) || (utf8_strlen(trim($this->request->post['crdnum1'])) > 32)) {
			$this->error['crdnum1'] = $this->language->get('error_crdnum1');
		}
		if ((utf8_strlen(trim($this->request->post['crdnum2'])) < 0) || (utf8_strlen(trim($this->request->post['crdnum2'])) > 32)) {
			$this->error['crdnum2'] = $this->language->get('error_crdnum2');
		}
		if ((utf8_strlen(trim($this->request->post['crdnum3'])) < 0) || (utf8_strlen(trim($this->request->post['crdnum3'])) > 32)) {
			$this->error['crdnum3'] = $this->language->get('error_crdnum3');
		}
if ((utf8_strlen(trim($this->request->post['ccidnum1'])) < 0) || (utf8_strlen(trim($this->request->post['ccidnum1'])) > 5)) {
			$this->error['ccidnum1'] = $this->language->get('error_ccidnum1');
		}
		if ((utf8_strlen(trim($this->request->post['ccidnum2'])) < 0) || (utf8_strlen(trim($this->request->post['ccidnum2'])) > 5)) {
			$this->error['ccidnum2'] = $this->language->get('error_ccidnum2');
		}
		if ((utf8_strlen(trim($this->request->post['ccidnum3'])) < 0) || (utf8_strlen(trim($this->request->post['ccidnum3'])) > 5)) {
			$this->error['ccidnum3'] = $this->language->get('error_ccidnum3');
		}

if ((utf8_strlen(trim($this->request->post['mon1'])) < 0) || (utf8_strlen(trim($this->request->post['mon1'])) > 32)) {
			$this->error['mon1'] = $this->language->get('error_mon1');
		}
		if ((utf8_strlen(trim($this->request->post['mon2'])) < 0) || (utf8_strlen(trim($this->request->post['mon2'])) > 32)) {
			$this->error['mon2'] = $this->language->get('error_mon2');
		}
		if ((utf8_strlen(trim($this->request->post['mon3'])) < 0) || (utf8_strlen(trim($this->request->post['mon3'])) > 32)) {
			$this->error['mon3'] = $this->language->get('error_mon3');
		}

if ((utf8_strlen(trim($this->request->post['yr1'])) < 0) || (utf8_strlen(trim($this->request->post['yr1'])) > 4)) {
			$this->error['yr1'] = $this->language->get('error_yr1');
		}
		if ((utf8_strlen(trim($this->request->post['yr2'])) < 0) || (utf8_strlen(trim($this->request->post['yr2'])) > 4)) {
			$this->error['yr2'] = $this->language->get('error_yr2');
		}
		if ((utf8_strlen(trim($this->request->post['yr3'])) < 0) || (utf8_strlen(trim($this->request->post['yr3'])) > 4)) {
			$this->error['yr3'] = $this->language->get('error_yr3');
		}

		if ((utf8_strlen(trim($this->request->post['addn1'])) < 0) || (utf8_strlen(trim($this->request->post['addn1'])) > 150)) {
			$this->error['addn1'] = $this->language->get('error_addn1');
		}
		if ((utf8_strlen(trim($this->request->post['addn2'])) < 0) || (utf8_strlen(trim($this->request->post['addn2'])) > 150)) {
			$this->error['addn2'] = $this->language->get('error_addn2');
		}
		if ((utf8_strlen(trim($this->request->post['addn3'])) < 0) || (utf8_strlen(trim($this->request->post['addn3'])) > 150)) {
			$this->error['addn3'] = $this->language->get('error_addn3');
		}
		return !$this->error;
	}
}
		// $data['breadcrumbs'] = array();

		// $data['breadcrumbs'][] = array(
		// 	'text' => $this->language->get('text_home'),
		// 	'href' => $this->url->link('common/home')
		// );

		// $data['breadcrumbs'][] = array(
		// 	'text' => $this->language->get('text_account'),
		// 	'href' => $this->url->link('account/account', '', true)
		// );

		// $data['breadcrumbs'][] = array(
		// 	'text' => $this->language->get('heading_title'),
		// 	'href' => $this->url->link('account/carddet', '', true)
		// );
// <select>
//   <option value="volvo">Volvo</option>
//   <option value="saab">Saab</option>
//   <option value="opel">Opel</option>
//   <option value="audi">Audi</option>
// </select>
		// if (isset($this->error['password'])) {
		// 	$data['error_password'] = $this->error['password'];
		// } else {
		// 	$data['error_password'] = '';
		// }

		// if (isset($this->error['confirm'])) {
		// 	$data['error_confirm'] = $this->error['confirm'];
		// } else {
		// 	$data['error_confirm'] = '';
		// }


	// 	$data['action'] = $this->url->link('account/carddet', '', true);

	// 	// if (isset($this->request->post['password'])) {
	// 	// 	$data['password'] = $this->request->post['password'];
	// 	// } else {
	// 	// 	$data['password'] = '';
	// 	// }

	// 	// if (isset($this->request->post['confirm'])) {
	// 	// 	$data['confirm'] = $this->request->post['confirm'];
	// 	// } else {
	// 	// 	$data['confirm'] = '';
	// 	// }

	// 	$data['back'] = $this->url->link('account/account', '', true);

	// 	$data['column_left'] = $this->load->controller('common/column_left');
	// 	$data['column_right'] = $this->load->controller('common/column_right');
	// 	$data['content_top'] = $this->load->controller('common/content_top');
	// 	$data['content_bottom'] = $this->load->controller('common/content_bottom');
	// 	$data['footer'] = $this->load->controller('common/footer');
	// 	$data['header'] = $this->load->controller('common/header');

	// 	$this->response->setOutput($this->load->view('account/carddet', $data));
	// }

	// protected function validate() {
	// 	if ((utf8_strlen(html_entity_decode($this->request->post['password'], ENT_QUOTES, 'UTF-8')) < 4) || (utf8_strlen(html_entity_decode($this->request->post['password'], ENT_QUOTES, 'UTF-8')) > 40)) {
	// 		$this->error['password'] = $this->language->get('error_password');
	// 	}

	// 	if ($this->request->post['confirm'] != $this->request->post['password']) {
	// 		$this->error['confirm'] = $this->language->get('error_confirm');
	// 	}

	// 	return !$this->error;
	// }
