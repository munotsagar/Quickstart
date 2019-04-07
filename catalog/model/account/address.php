<?php
class ModelAccountAddress extends Model {
	public function addAddress($customer_id, $data) {
		
		if($data['default']!=0)
		{
			$lst=array();
			$cntry=$this->db->query("SELECT name FROM " . DB_PREFIX . "country WHERE country_id = '" . (int)$data['country_id'] . "'");
			if ($cntry->num_rows) 
			{
				$lst['country'] = strtoupper($cntry->row['name']);
			}

			$st=$this->db->query("SELECT * FROM " . DB_PREFIX . "zone WHERE zone_id = '" . (int)$data['zone_id'] . "'");
			if ($st->num_rows) 
			{
				$lst['state'] = $st->row['name'];
			}

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
		      
		      echo $session = $result->id;
		      // $qry='op_customer.customer_id="$customer_id"';
		      echo $qry="accounts.sic_code = '".$customer_id."' ";
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

		          echo $customer_id;print_r($data);print_r($output);exit;






		      	// add address

		      	$lst['id']=$id;
		      	$lst['employees']=$data['company'];
				$lst['shipping_address_street']=$data['address_1']." ".$data['address_2'];
				$lst['shipping_address_city']=$data['city'];
				$lst['shipping_address_postalcode']=$data['postcode'];


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
		




		$this->db->query("INSERT INTO " . DB_PREFIX . "address SET customer_id = '" . (int)$customer_id . "', firstname = '" . $this->db->escape($data['firstname']) . "', lastname = '" . $this->db->escape($data['lastname']) . "', company = '" . $this->db->escape($data['company']) . "', address_1 = '" . $this->db->escape($data['address_1']) . "', address_2 = '" . $this->db->escape($data['address_2']) . "', postcode = '" . $this->db->escape($data['postcode']) . "', city = '" . $this->db->escape($data['city']) . "', zone_id = '" . (int)$data['zone_id'] . "', country_id = '" . (int)$data['country_id'] . "', custom_field = '" . $this->db->escape(isset($data['custom_field']['address']) ? json_encode($data['custom_field']['address']) : '') . "'");

		$address_id = $this->db->getLastId();

		if (!empty($data['default'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "customer SET address_id = '" . (int)$address_id . "' WHERE customer_id = '" . (int)$customer_id . "'");
		}

		return $address_id;
	}

	public function editAddress($address_id, $data) {
		$this->db->query("UPDATE " . DB_PREFIX . "address SET firstname = '" . $this->db->escape($data['firstname']) . "', lastname = '" . $this->db->escape($data['lastname']) . "', company = '" . $this->db->escape($data['company']) . "', address_1 = '" . $this->db->escape($data['address_1']) . "', address_2 = '" . $this->db->escape($data['address_2']) . "', postcode = '" . $this->db->escape($data['postcode']) . "', city = '" . $this->db->escape($data['city']) . "', zone_id = '" . (int)$data['zone_id'] . "', country_id = '" . (int)$data['country_id'] . "', custom_field = '" . $this->db->escape(isset($data['custom_field']['address']) ? json_encode($data['custom_field']['address']) : '') . "' WHERE address_id  = '" . (int)$address_id . "' AND customer_id = '" . (int)$this->customer->getId() . "'");

		if (!empty($data['default'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "customer SET address_id = '" . (int)$address_id . "' WHERE customer_id = '" . (int)$this->customer->getId() . "'");
		}
	}

	public function deleteAddress($address_id) {
		$this->db->query("DELETE FROM " . DB_PREFIX . "address WHERE address_id = '" . (int)$address_id . "' AND customer_id = '" . (int)$this->customer->getId() . "'");
	}

	public function getAddress($address_id) {
		$address_query = $this->db->query("SELECT DISTINCT * FROM " . DB_PREFIX . "address WHERE address_id = '" . (int)$address_id . "' AND customer_id = '" . (int)$this->customer->getId() . "'");

		if ($address_query->num_rows) {
			$country_query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "country` WHERE country_id = '" . (int)$address_query->row['country_id'] . "'");

			if ($country_query->num_rows) {
				$country = $country_query->row['name'];
				$iso_code_2 = $country_query->row['iso_code_2'];
				$iso_code_3 = $country_query->row['iso_code_3'];
				$address_format = $country_query->row['address_format'];
			} else {
				$country = '';
				$iso_code_2 = '';
				$iso_code_3 = '';
				$address_format = '';
			}

			$zone_query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "zone` WHERE zone_id = '" . (int)$address_query->row['zone_id'] . "'");

			if ($zone_query->num_rows) {
				$zone = $zone_query->row['name'];
				$zone_code = $zone_query->row['code'];
			} else {
				$zone = '';
				$zone_code = '';
			}

			$address_data = array(
				'address_id'     => $address_query->row['address_id'],
				'firstname'      => $address_query->row['firstname'],
				'lastname'       => $address_query->row['lastname'],
				'company'        => $address_query->row['company'],
				'address_1'      => $address_query->row['address_1'],
				'address_2'      => $address_query->row['address_2'],
				'postcode'       => $address_query->row['postcode'],
				'city'           => $address_query->row['city'],
				'zone_id'        => $address_query->row['zone_id'],
				'zone'           => $zone,
				'zone_code'      => $zone_code,
				'country_id'     => $address_query->row['country_id'],
				'country'        => $country,
				'iso_code_2'     => $iso_code_2,
				'iso_code_3'     => $iso_code_3,
				'address_format' => $address_format,
				'custom_field'   => json_decode($address_query->row['custom_field'], true)
			);

			return $address_data;
		} else {
			return false;
		}
	}

	public function getAddresses() {
		$address_data = array();

		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "address WHERE customer_id = '" . (int)$this->customer->getId() . "'");

		foreach ($query->rows as $result) {
			$country_query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "country` WHERE country_id = '" . (int)$result['country_id'] . "'");

			if ($country_query->num_rows) {
				$country = $country_query->row['name'];
				$iso_code_2 = $country_query->row['iso_code_2'];
				$iso_code_3 = $country_query->row['iso_code_3'];
				$address_format = $country_query->row['address_format'];
			} else {
				$country = '';
				$iso_code_2 = '';
				$iso_code_3 = '';
				$address_format = '';
			}

			$zone_query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "zone` WHERE zone_id = '" . (int)$result['zone_id'] . "'");

			if ($zone_query->num_rows) {
				$zone = $zone_query->row['name'];
				$zone_code = $zone_query->row['code'];
			} else {
				$zone = '';
				$zone_code = '';
			}

			$address_data[$result['address_id']] = array(
				'address_id'     => $result['address_id'],
				'firstname'      => $result['firstname'],
				'lastname'       => $result['lastname'],
				'company'        => $result['company'],
				'address_1'      => $result['address_1'],
				'address_2'      => $result['address_2'],
				'postcode'       => $result['postcode'],
				'city'           => $result['city'],
				'zone_id'        => $result['zone_id'],
				'zone'           => $zone,
				'zone_code'      => $zone_code,
				'country_id'     => $result['country_id'],
				'country'        => $country,
				'iso_code_2'     => $iso_code_2,
				'iso_code_3'     => $iso_code_3,
				'address_format' => $address_format,
				'custom_field'   => json_decode($result['custom_field'], true)

			);
		}

		return $address_data;
	}

	public function getTotalAddresses() {
		$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "address WHERE customer_id = '" . (int)$this->customer->getId() . "'");

		return $query->row['total'];
	}
}
