<?php
class ModelAccountCustomer extends Model {
	public function addCustomer($data) {
		// print_r($data['custom_field']['account'][8]); exit;

		if (isset($data['customer_group_id']) && is_array($this->config->get('config_customer_group_display')) && in_array($data['customer_group_id'], $this->config->get('config_customer_group_display'))) {
			$customer_group_id = $data['customer_group_id'];
		} else {
			$customer_group_id = $this->config->get('config_customer_group_id');
		}

		$this->load->model('account/customer_group');

		$customer_group_info = $this->model_account_customer_group->getCustomerGroup($customer_group_id);

		$this->db->query("INSERT INTO " . DB_PREFIX . "customer SET customer_group_id = '" . (int)$customer_group_id . "', store_id = '" . (int)$this->config->get('config_store_id') . "', language_id = '" . (int)$this->config->get('config_language_id') . "', firstname = '" . $this->db->escape($data['firstname']) . "', lastname = '" . $this->db->escape($data['lastname']) . "', email = '" . $this->db->escape($data['email']) . "', telephone = '" . $this->db->escape($data['telephone']) . "', custom_field = '" . $this->db->escape(isset($data['custom_field']['account']) ? json_encode($data['custom_field']['account']) : '') . "', salt = '" . $this->db->escape($salt = token(9)) . "', password = '" . $this->db->escape(sha1($salt . sha1($salt . sha1($data['password'])))) . "', newsletter = '" . (isset($data['newsletter']) ? (int)$data['newsletter'] : 0) . "', ip = '" . $this->db->escape($this->request->server['REMOTE_ADDR']) . "', status = '" . (int)!$customer_group_info['approval'] . "', date_added = NOW()");

		$customer_id = $this->db->getLastId();


		if ($customer_group_info['approval']) {
			$this->db->query("INSERT INTO `" . DB_PREFIX . "customer_approval` SET customer_id = '" . (int)$customer_id . "', type = 'customer', date_added = NOW()");
		}
		$this->db->query("INSERT INTO " . DB_PREFIX . "address SET customer_id = '" . (int)$customer_id . "', firstname = '" . $this->db->escape($data['firstname']) . "', lastname = '" . $this->db->escape($data['lastname']) . "', company = '" . $this->db->escape($data['custom_field']['account'][8]) . "', address_1 = '" . $this->db->escape($data['custom_field']['account'][3]) . "', address_2 = '" . $this->db->escape($data['address_2']) . "', postcode = '" . $this->db->escape($data['custom_field']['account'][6]) . "', city = '" . $this->db->escape($data['custom_field']['account'][4]) . "', zone_id = '" .$this->db->escape($data['custom_field']['account'][5]) . "', country_id = '" . $this->db->escape($data['custom_field']['account'][7]) . "', custom_field = '" . $this->db->escape(isset($data['custom_field']['address']) ? json_encode($data['custom_field']['address']) : '') . "'");

		$address_id = $this->db->getLastId();

		{

		//************************************************************
			//
			// $inputtel=$data['telephone'];
			// 		$output = substr($inputtel,-10,-7)."-".substr($inputtel,-7,-4)."-".substr($inputtel,-4);
			// 		$inputmob=$data['custom_field']['account'][9];
			// 		$outputm = substr($inputmob,-10,-7)."-".substr($inputmob,-7,-4)."-".substr($inputmob,-4);


			$lst=array();

			$lst['name']=$data['firstname']." ".$data['lastname'];
			$lst['phone_alternate']=$data['telephone'];
			$lst['phone_office']=$data['custom_field']['account'][9];
			$lst['phone_fax']=$data['fax'];
			$lst['email1']=$data['email'];
			$lst['date_entered']=$data['date_added'];
			$lst['sic_code']=$customer_id;
			$lst['employees']=$data['custom_field']['account'][8];
			$lst['billing_address_street']=$data['custom_field']['account'][3];
			$lst['billing_address_city']=$data['custom_field']['account'][4];
			$lst['billing_address_postalcode']=$data['custom_field']['account'][6];
			$lst['billing_address_country']=$data['custom_field']['account'][7];
			$lst['billing_address_state']=$data['custom_field']['account'][5];
			// $lst['sic_code']=$data['customer_id'];

// echo "<pre> khurram";	exit;


			$url1 = 'http://167.99.147.172/avocado/avocadocrm/service/v4_1/rest.php?';
          
              // Open a curl session for making the call
              $curl = curl_init($url1);
              
              // Tell curl to use HTTP POST
              
              curl_setopt($curl, CURLOPT_POST, true);
              
              // Tell curl not to return headers, but do return the response
              
              curl_setopt($curl, CURLOPT_HEADER, false);
              
              curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
          
              
          
              $parameters = array(
                          'user_auth' => array(
                                      'user_name' => 'admin',
                                      'password' => md5('admin123'),
                                    ),
                        );
          
              $json = json_encode($parameters);
              $postArgs = array(
                  'method' => 'login',
                  'input_type' => 'JSON',
                  'response_type' => 'JSON',
                  'rest_data' => $json,
                  );
              curl_setopt($curl, CURLOPT_POSTFIELDS, $postArgs);
              
              // Make the REST call, returning the result
              $response = curl_exec($curl);
              // Convert the result from JSON format to a PHP array
              $result = json_decode($response);
              if ( !is_object($result) ) {
                  die("Error handling result.\n");
              }
              if ( !isset($result->id) ) {
                  die("Error: {$result->name} - {$result->description}\n.");
              }
              
              // Echo out the session id
              //echo $result->id."<br />";
              
              $session = $result->id;


              $parameters = array(
							      'session' => $session, //Session ID
							      'module' => 'Accounts',  //Module name
							      'name_value_list' => $lst, 
		      				     ); 
		    $json = json_encode($parameters); 
		    $postArgs = 'method=set_entry&input_type=JSON&response_type=JSON&rest_data=' . $json;
		    
		    curl_setopt($curl, CURLOPT_POSTFIELDS, $postArgs);
		    
		    // Make the REST call, returning the result 
		    $response = curl_exec($curl);
		    
		    // Convert the result from JSON format to a PHP array 
		    $result = json_decode($response,true);
		    
		    // Get the newly created record id
		    $recordId = $result['id'];

		    // echo "shafiq<pre>";print_r($recordId);exit;


		//***********************************************************

		}
return $customer_id;
	}
	
		

	public function editCustomer($customer_id, $data) {
		 // echo "shafiq";print_r($data);exit;
		$this->db->query("UPDATE " . DB_PREFIX . "customer SET firstname = '" . $this->db->escape($data['firstname']) . "', lastname = '" . $this->db->escape($data['lastname']) . "', email = '" . $this->db->escape($data['email']) . "', telephone = '" . $this->db->escape($data['telephone']) . "', custom_field = '" . $this->db->escape(isset($data['custom_field']['account']) ? json_encode($data['custom_field']['account']) : '') . "' WHERE customer_id = '" . (int)$customer_id . "'");

		
{
		$url1 = 'http://167.99.147.172/avocado/avocadocrm/service/v4_1/rest.php?';
          
              // Open a curl session for making the call
              $curl = curl_init($url1);
              
              // Tell curl to use HTTP POST
              
              curl_setopt($curl, CURLOPT_POST, true);
              
              // Tell curl not to return headers, but do return the response
              
              curl_setopt($curl, CURLOPT_HEADER, false);
              
              curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
          
              
          
              $parameters = array(
                          'user_auth' => array(
                                      'user_name' => 'admin',
                                      'password' => md5('admin123'),
                                    ),
                        );
          
              $json = json_encode($parameters);
              $postArgs = array(
                  'method' => 'login',
                  'input_type' => 'JSON',
                  'response_type' => 'JSON',
                  'rest_data' => $json,
                  );
              curl_setopt($curl, CURLOPT_POSTFIELDS, $postArgs);
              
              // Make the REST call, returning the result
              $response = curl_exec($curl);
              // Convert the result from JSON format to a PHP array
              $result = json_decode($response);
              if ( !is_object($result) ) {
                  die("Error handling result.\n");
              }
              if ( !isset($result->id) ) {
                  die("Error: {$result->name} - {$result->description}\n.");
              }
              
              // Echo out the session id
              echo $result->id."<br />";
              
              $session = $result->id;

		  $qry="accounts.sic_code = '".$customer_id."' ";
	      $pmtr = array(
	                  'session' => $session,                    //Session ID
	                  'module_name' => 'Accounts',                    //Module name
	                  'query' => $qry,     //Where condition without "where" keyword
	                  'order_by' => "date_entered ASC",                     //$order_by
	                  'offset'  => 0,                                 //offset
	                  'select_fields' => $field_aray,               //select_fields
	                  'link_name_to_fields_array' => array(array()), //optional
	                  'max_results' => 5000,                             //max results                 
	                  'deleted' => 0,                           //deleted
	          );   
	          $jsn = json_encode($pmtr);

	          $pstArg = array(
	                  'method' => 'get_entry_list',
	                  'input_type' => 'JSON',
	                  'response_type' => 'JSON',
	                  'rest_data' => $jsn,
	          );

	          curl_setopt($curl, CURLOPT_POSTFIELDS, $pstArg);

	          $rpns = curl_exec($curl);

	          // Convert the result from JSON format to a PHP array
	          $output = json_decode($rpns);


	          $id=$output->entry_list[0]->id;
	          if(isset($id)){
		     // echo "Shafiq<pre> <br>".$id."<br><br><br>";print_r($output);exit;	

	    //       	$inputtel=$data['telephone'];
					// $output = substr($inputtel,-10,-7)."-".substr($inputtel,-7,-4)."-".substr($inputtel,-4);
					// $inputmob=$data['custom_field']['account'][9];
					// $outputm = substr($inputmob,-10,-7)."-".substr($inputmob,-7,-4)."-".substr($inputmob,-4);

		$lst=array();

		$lst['id']=$id;
		$lst['name']=$data['firstname']." ".$data['lastname'];
		$lst['email1']=$data['email'];
		$lst['phone_alternate']=$data['telephone'];
		$lst['phone_office']=$data['custom_field']['account'][9];
		$lst['employees']=$data['custom_field']['account'][8];
			$lst['billing_address_street']=$data['custom_field']['account'][3];
			$lst['billing_address_city']=$data['custom_field']['account'][4];
			$lst['billing_address_postalcode']=$data['custom_field']['account'][6];
			$lst['billing_address_country']=$data['custom_field']['account'][7];
			$lst['billing_address_state']=$data['custom_field']['account'][5];

		$parameters = array(
						      'session' => $session, //Session ID
						      'module' => 'Accounts',  //Module name
						      'name_value_list' => $lst, 
      				     	); 
		    $json = json_encode($parameters); 
		    $postArgs = 'method=set_entry&input_type=JSON&response_type=JSON&rest_data=' . $json;
		    
		    curl_setopt($curl, CURLOPT_POSTFIELDS, $postArgs);
		    
		    // Make the REST call, returning the result 
		    $response = curl_exec($curl);
		    
		    // Convert the result from JSON format to a PHP array 
		    $result = json_decode($response,true);
		    
		    // Get the newly created record id
		    $recordId = $result['id'];
		}
		    //echo "shafiq<pre>";print_r($recordId);exit;
}
}	
public function editCard($customer_id, $data) {
	 // echo "khurram<pre>";print_r($data);exit;
		$this->db->query("UPDATE " . DB_PREFIX . "customer SET card1 = '" . $this->db->escape($data['card1']) . "', card2 = '" . $this->db->escape($data['card2']) . "', card3 = '" . $this->db->escape($data['card3']) . "', oname1 = '" . $this->db->escape($data['oname1']) . "', oname2 = '" . $this->db->escape($data['oname2']) . "', oname3 = '" . $this->db->escape($data['oname3']) . "', crdnum1 = '" . $this->db->escape($data['crdnum1']) . "', crdnum2 = '" . $this->db->escape($data['crdnum2']) . "', crdnum3 = '" . $this->db->escape($data['crdnum3']) . "', ccidnum1 = '" . $this->db->escape($data['ccidnum1']) . "', ccidnum2 = '" . $this->db->escape($data['ccidnum2']) . "', ccidnum3 = '" . $this->db->escape($data['ccidnum3']) . "', mon1 = '" . $this->db->escape($data['mon1']) . "', mon2 = '" . $this->db->escape($data['mon2']) . "', mon3 = '" . $this->db->escape($data['mon3']) . "', yr1 = '" . $this->db->escape($data['yr1']) . "', yr2 = '" . $this->db->escape($data['yr2']) . "', yr3 = '" . $this->db->escape($data['yr3']) . "', addn1 = '" . $this->db->escape($data['addn1']) . "', addn2 = '" . $this->db->escape($data['addn2']) . "', addn3 = '" . $this->db->escape($data['addn3']) . "' WHERE customer_id = '" . (int)$customer_id . "'");
		{
		$url1 = 'http://167.99.147.172/avocado/avocadocrm/service/v4_1/rest.php?';
          
              // Open a curl session for making the call
              $curl = curl_init($url1);
              
              // Tell curl to use HTTP POST
              
              curl_setopt($curl, CURLOPT_POST, true);
              
              // Tell curl not to return headers, but do return the response
              
              curl_setopt($curl, CURLOPT_HEADER, false);
              
              curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
          
              
          
              $parameters = array(
                          'user_auth' => array(
                                      'user_name' => 'admin',
                                      'password' => md5('admin123'),
                                    ),
                        );
          
              $json = json_encode($parameters);
              $postArgs = array(
                  'method' => 'login',
                  'input_type' => 'JSON',
                  'response_type' => 'JSON',
                  'rest_data' => $json,
                  );
              curl_setopt($curl, CURLOPT_POSTFIELDS, $postArgs);
              
              // Make the REST call, returning the result
              $response = curl_exec($curl);
              // Convert the result from JSON format to a PHP array
              $result = json_decode($response);
              if ( !is_object($result) ) {
                  die("Error handling result.\n");
              }
              if ( !isset($result->id) ) {
                  die("Error: {$result->name} - {$result->description}\n.");
              }
              
              // Echo out the session id
              echo $result->id."<br />";
              
              $session = $result->id;

		  $qry="accounts.sic_code = '".$customer_id."' ";
	      $pmtr = array(
	                  'session' => $session,                    //Session ID
	                  'module_name' => 'Accounts',                    //Module name
	                  'query' => $qry,     //Where condition without "where" keyword
	                  'order_by' => "date_entered ASC",                     //$order_by
	                  'offset'  => 0,                                 //offset
	                  'select_fields' => $field_aray,               //select_fields
	                  'link_name_to_fields_array' => array(array()), //optional
	                  'max_results' => 5000,                             //max results                 
	                  'deleted' => 0,                           //deleted
	          );   
	          $jsn = json_encode($pmtr);

	          $pstArg = array(
	                  'method' => 'get_entry_list',
	                  'input_type' => 'JSON',
	                  'response_type' => 'JSON',
	                  'rest_data' => $jsn,
	          );

	          curl_setopt($curl, CURLOPT_POSTFIELDS, $pstArg);

	          $rpns = curl_exec($curl);

	          // Convert the result from JSON format to a PHP array
	          $output = json_decode($rpns);


	          $id=$output->entry_list[0]->id;
	          if(isset($id)){
		     // echo "Shafiq<pre> <br>".$id."<br><br><br>";print_r($output);exit;	

	    //       	$inputtel=$data['telephone'];
					// $output = substr($inputtel,-10,-7)."-".substr($inputtel,-7,-4)."-".substr($inputtel,-4);
					// $inputmob=$data['custom_field']['account'][9];
					// $outputm = substr($inputmob,-10,-7)."-".substr($inputmob,-7,-4)."-".substr($inputmob,-4);

		$lst=array();

		$lst['id']=$id;
		$lst['card1_c']=$data['card1'];
		$lst['card2_c']=$data['card2'];
		$lst['card3_c']=$data['card3'];
		$lst['owner1_c']=$data['oname1'];
		$lst['owner2_c']=$data['oname2'];
		$lst['owner3_c']=$data['oname3'];
		$lst['card_number1_c']=$data['crdnum1'];
		$lst['card_number2_c']=$data['crdnum2'];
		$lst['card_number3_c']=$data['crdnum3'];
		$lst['ccid1_c']=$data['ccidnum1'];
		$lst['ccid2_c']=$data['ccidnum2'];
		$lst['ccid3_c']=$data['ccidnum3'];
		$lst['add_notes1_c']=$data['addn1'];
		$lst['add_notes2_c']=$data['addn2'];
		$lst['add_notes3_c']=$data['addn3'];
		$lst['month1_c']=$data['mon1'];	
		$lst['month2_c']=$data['mon2'];	
		$lst['month3_c']=$data['mon3'];	
		$lst['year1_c']=$data['yr1'];
		$lst['year2_c']=$data['yr2'];
		$lst['year3_c']=$data['yr3'];
		

		$parameters = array(
						      'session' => $session, //Session ID
						      'module' => 'Accounts',  //Module name
						      'name_value_list' => $lst, 
      				     	); 
		    $json = json_encode($parameters); 
		    $postArgs = 'method=set_entry&input_type=JSON&response_type=JSON&rest_data=' . $json;
		    
		    curl_setopt($curl, CURLOPT_POSTFIELDS, $postArgs);
		    
		    // Make the REST call, returning the result 
		    $response = curl_exec($curl);
		    
		    // Convert the result from JSON format to a PHP array 
		    $result = json_decode($response,true);
		    
		    // Get the newly created record id
		    $recordId = $result['id'];
		}
		    //echo "shafiq<pre>";print_r($recordId);exit;
}
	}

	public function editPassword($email, $password) {
		$this->db->query("UPDATE " . DB_PREFIX . "customer SET salt = '" . $this->db->escape($salt = token(9)) . "', password = '" . $this->db->escape(sha1($salt . sha1($salt . sha1($password)))) . "', code = '' WHERE LOWER(email) = '" . $this->db->escape(utf8_strtolower($email)) . "'");
	}

	public function editAddressId($customer_id, $address_id) {
		$this->db->query("UPDATE " . DB_PREFIX . "customer SET address_id = '" . (int)$address_id . "' WHERE customer_id = '" . (int)$customer_id . "'");
	}
	
	public function editCode($email, $code) {
		$this->db->query("UPDATE `" . DB_PREFIX . "customer` SET code = '" . $this->db->escape($code) . "' WHERE LCASE(email) = '" . $this->db->escape(utf8_strtolower($email)) . "'");
	}

	public function editNewsletter($newsletter) {
		$this->db->query("UPDATE " . DB_PREFIX . "customer SET newsletter = '" . (int)$newsletter . "' WHERE customer_id = '" . (int)$this->customer->getId() . "'");
	}

	public function getCustomer($customer_id) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "customer WHERE customer_id = '" . (int)$customer_id . "'");

		return $query->row;
	}

	public function getCustomerByEmail($email) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "customer WHERE LOWER(email) = '" . $this->db->escape(utf8_strtolower($email)) . "'");

		return $query->row;
	}

	public function getCustomerByCode($code) {
		$query = $this->db->query("SELECT customer_id, firstname, lastname, email FROM `" . DB_PREFIX . "customer` WHERE code = '" . $this->db->escape($code) . "' AND code != ''");

		return $query->row;
	}

	public function getCustomerByToken($token) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "customer WHERE token = '" . $this->db->escape($token) . "' AND token != ''");

		$this->db->query("UPDATE " . DB_PREFIX . "customer SET token = ''");

		return $query->row;
	}
	
	public function getTotalCustomersByEmail($email) {
		$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "customer WHERE LOWER(email) = '" . $this->db->escape(utf8_strtolower($email)) . "'");

		return $query->row['total'];
	}

	public function addTransaction($customer_id, $description, $amount = '', $order_id = 0) {
		$this->db->query("INSERT INTO " . DB_PREFIX . "customer_transaction SET customer_id = '" . (int)$customer_id . "', order_id = '" . (float)$order_id . "', description = '" . $this->db->escape($description) . "', amount = '" . (float)$amount . "', date_added = NOW()");
	}

	public function deleteTransactionByOrderId($order_id) {
		$this->db->query("DELETE FROM " . DB_PREFIX . "customer_transaction WHERE order_id = '" . (int)$order_id . "'");
	}

	public function getTransactionTotal($customer_id) {
		$query = $this->db->query("SELECT SUM(amount) AS total FROM " . DB_PREFIX . "customer_transaction WHERE customer_id = '" . (int)$customer_id . "'");

		return $query->row['total'];
	}
	
	public function getTotalTransactionsByOrderId($order_id) {
		$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "customer_transaction WHERE order_id = '" . (int)$order_id . "'");

		return $query->row['total'];
	}
	
	public function getRewardTotal($customer_id) {
		$query = $this->db->query("SELECT SUM(points) AS total FROM " . DB_PREFIX . "customer_reward WHERE customer_id = '" . (int)$customer_id . "'");

		return $query->row['total'];
	}

	public function getIps($customer_id) {
		$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "customer_ip` WHERE customer_id = '" . (int)$customer_id . "'");

		return $query->rows;
	}

	public function addLoginAttempt($email) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "customer_login WHERE email = '" . $this->db->escape(utf8_strtolower((string)$email)) . "' AND ip = '" . $this->db->escape($this->request->server['REMOTE_ADDR']) . "'");

		if (!$query->num_rows) {
			$this->db->query("INSERT INTO " . DB_PREFIX . "customer_login SET email = '" . $this->db->escape(utf8_strtolower((string)$email)) . "', ip = '" . $this->db->escape($this->request->server['REMOTE_ADDR']) . "', total = 1, date_added = '" . $this->db->escape(date('Y-m-d H:i:s')) . "', date_modified = '" . $this->db->escape(date('Y-m-d H:i:s')) . "'");
		} else {
			$this->db->query("UPDATE " . DB_PREFIX . "customer_login SET total = (total + 1), date_modified = '" . $this->db->escape(date('Y-m-d H:i:s')) . "' WHERE customer_login_id = '" . (int)$query->row['customer_login_id'] . "'");
		}
	}

	public function getLoginAttempts($email) {
		$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "customer_login` WHERE email = '" . $this->db->escape(utf8_strtolower($email)) . "'");

		return $query->row;
	}

	public function deleteLoginAttempts($email) {
		$this->db->query("DELETE FROM `" . DB_PREFIX . "customer_login` WHERE email = '" . $this->db->escape(utf8_strtolower($email)) . "'");
	}
	
	public function addAffiliate($customer_id, $data) {
		$this->db->query("INSERT INTO " . DB_PREFIX . "customer_affiliate SET `customer_id` = '" . (int)$customer_id . "', `company` = '" . $this->db->escape($data['company']) . "', `website` = '" . $this->db->escape($data['website']) . "', `tracking` = '" . $this->db->escape(token(64)) . "', `commission` = '" . (float)$this->config->get('config_affiliate_commission') . "', `tax` = '" . $this->db->escape($data['tax']) . "', `payment` = '" . $this->db->escape($data['payment']) . "', `cheque` = '" . $this->db->escape($data['cheque']) . "', `paypal` = '" . $this->db->escape($data['paypal']) . "', `bank_name` = '" . $this->db->escape($data['bank_name']) . "', `bank_branch_number` = '" . $this->db->escape($data['bank_branch_number']) . "', `bank_swift_code` = '" . $this->db->escape($data['bank_swift_code']) . "', `bank_account_name` = '" . $this->db->escape($data['bank_account_name']) . "', `bank_account_number` = '" . $this->db->escape($data['bank_account_number']) . "', `status` = '" . (int)!$this->config->get('config_affiliate_approval') . "'");
		
		if ($this->config->get('config_affiliate_approval')) {
			$this->db->query("INSERT INTO `" . DB_PREFIX . "customer_approval` SET customer_id = '" . (int)$customer_id . "', type = 'affiliate', date_added = NOW()");
		}		
	}
		
	public function editAffiliate($customer_id, $data) {
		$this->db->query("UPDATE " . DB_PREFIX . "customer_affiliate SET `company` = '" . $this->db->escape($data['company']) . "', `website` = '" . $this->db->escape($data['website']) . "', `commission` = '" . (float)$this->config->get('config_affiliate_commission') . "', `tax` = '" . $this->db->escape($data['tax']) . "', `payment` = '" . $this->db->escape($data['payment']) . "', `cheque` = '" . $this->db->escape($data['cheque']) . "', `paypal` = '" . $this->db->escape($data['paypal']) . "', `bank_name` = '" . $this->db->escape($data['bank_name']) . "', `bank_branch_number` = '" . $this->db->escape($data['bank_branch_number']) . "', `bank_swift_code` = '" . $this->db->escape($data['bank_swift_code']) . "', `bank_account_name` = '" . $this->db->escape($data['bank_account_name']) . "', `bank_account_number` = '" . $this->db->escape($data['bank_account_number']) . "' WHERE `customer_id` = '" . (int)$customer_id . "'");
	}
	
	public function getAffiliate($customer_id) {
		$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "customer_affiliate` WHERE `customer_id` = '" . (int)$customer_id . "'");

		return $query->row;
	}
	
	public function getAffiliateByTracking($tracking) {
		$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "customer_affiliate` WHERE `tracking` = '" . $this->db->escape($tracking) . "'");

		return $query->row;
	}			
}