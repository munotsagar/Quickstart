<?php
class ModelCheckoutOrder extends Model {
	public function addOrder($data) {
		$this->db->query("INSERT INTO `" . DB_PREFIX . "order` SET invoice_prefix = '" . $this->db->escape($data['invoice_prefix']) . "', store_id = '" . (int)$data['store_id'] . "', store_name = '" . $this->db->escape($data['store_name']) . "', store_url = '" . $this->db->escape($data['store_url']) . "', customer_id = '" . (int)$data['customer_id'] . "', customer_group_id = '" . (int)$data['customer_group_id'] . "', firstname = '" . $this->db->escape($data['firstname']) . "', lastname = '" . $this->db->escape($data['lastname']) . "', email = '" . $this->db->escape($data['email']) . "', telephone = '" . $this->db->escape($data['telephone']) . "', custom_field = '" . $this->db->escape(isset($data['custom_field']) ? json_encode($data['custom_field']) : '') . "', payment_firstname = '" . $this->db->escape($data['payment_firstname']) . "', payment_lastname = '" . $this->db->escape($data['payment_lastname']) . "', payment_company = '" . $this->db->escape($data['payment_company']) . "', payment_address_1 = '" . $this->db->escape($data['payment_address_1']) . "', payment_address_2 = '" . $this->db->escape($data['payment_address_2']) . "', payment_city = '" . $this->db->escape($data['payment_city']) . "', payment_postcode = '" . $this->db->escape($data['payment_postcode']) . "', payment_country = '" . $this->db->escape($data['payment_country']) . "', payment_country_id = '" . (int)$data['payment_country_id'] . "', payment_zone = '" . $this->db->escape($data['payment_zone']) . "', payment_zone_id = '" . (int)$data['payment_zone_id'] . "', payment_address_format = '" . $this->db->escape($data['payment_address_format']) . "', payment_custom_field = '" . $this->db->escape(isset($data['payment_custom_field']) ? json_encode($data['payment_custom_field']) : '') . "', payment_method = '" . $this->db->escape($data['payment_method']) . "', payment_code = '" . $this->db->escape($data['payment_code']) . "', shipping_firstname = '" . $this->db->escape($data['shipping_firstname']) . "', shipping_lastname = '" . $this->db->escape($data['shipping_lastname']) . "', shipping_company = '" . $this->db->escape($data['shipping_company']) . "', shipping_address_1 = '" . $this->db->escape($data['shipping_address_1']) . "', shipping_address_2 = '" . $this->db->escape($data['shipping_address_2']) . "', shipping_city = '" . $this->db->escape($data['shipping_city']) . "', shipping_postcode = '" . $this->db->escape($data['shipping_postcode']) . "', shipping_country = '" . $this->db->escape($data['shipping_country']) . "', shipping_country_id = '" . (int)$data['shipping_country_id'] . "', shipping_zone = '" . $this->db->escape($data['shipping_zone']) . "', shipping_zone_id = '" . (int)$data['shipping_zone_id'] . "', shipping_address_format = '" . $this->db->escape($data['shipping_address_format']) . "', shipping_custom_field = '" . $this->db->escape(isset($data['shipping_custom_field']) ? json_encode($data['shipping_custom_field']) : '') . "', shipping_method = '" . $this->db->escape($data['shipping_method']) . "', shipping_code = '" . $this->db->escape($data['shipping_code']) . "', comment = '" . $this->db->escape($data['comment']) . "', total = '" . (float)$data['total'] . "', affiliate_id = '" . (int)$data['affiliate_id'] . "', commission = '" . (float)$data['commission'] . "', marketing_id = '" . (int)$data['marketing_id'] . "', tracking = '" . $this->db->escape($data['tracking']) . "', language_id = '" . (int)$data['language_id'] . "', currency_id = '" . (int)$data['currency_id'] . "', currency_code = '" . $this->db->escape($data['currency_code']) . "', currency_value = '" . (float)$data['currency_value'] . "', ip = '" . $this->db->escape($data['ip']) . "', forwarded_ip = '" .  $this->db->escape($data['forwarded_ip']) . "', user_agent = '" . $this->db->escape($data['user_agent']) . "', accept_language = '" . $this->db->escape($data['accept_language']) . "', date_added = NOW(), date_modified = NOW()");

		$order_id = $this->db->getLastId();

{
		//************************************************************
// 			echo print_r($data['custom_field'][8]);
// 			echo print_r($data['custom_field'][3]);
// 			echo print_r($data['custom_field'][4]);
// 			echo print_r($data['custom_field'][5]);
// 			echo print_r($data['custom_field'][6]);
// 			echo print_r($data['custom_field'][7]);
// 			echo print_r($data['custom_field'][9]);
// exit;
// 		    echo "shafiq<pre>";print_r($data);exit;
// 		// $qr="Select id from account where sic_code = '".$data['customer_id']."'";

			$lst=array();
			$lst['billing_address_street']=$data['custom_field'][3];
			$lst['billing_address_state']=$data['custom_field'][5];
			$lst['billing_address_city']=$data['custom_field'][4];
			$lst['billing_address_postalcode']=$data['custom_field'][6];
			$lst['billing_address_country']=$data['custom_field'][7];
			$lst['shipping_address_street']=$data['custom_field'][3];
			$lst['shipping_address_state']=$data['custom_field'][5];
			$lst['shipping_address_city']=$data['custom_field'][4];
			$lst['shipping_address_postalcode']=$data['custom_field'][6];
			$lst['shipping_address_country']=$data['custom_field'][7];
			$lst['special_suggestion_c']=$data['comment'];
			// echo $lst['billing_account_id']=$data['customer_id'];
			//exit;
			$lst['name']=$order_id."---".$data['customer_id'];
			// exit;
			$lst['customerid_c']=$data['customer_id'];
			$lst['approval_status'] = "Pending";
			$lst['orderid_c']=$order_id;
			// customer_id

			$url1 = 'http://devmike.ml/avocadocrm/service/v4_1/rest.php?';
          
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

              //	getting customerid

              $pmtr = array(
	                  'session' => $session,                    //Session ID
	                  'module_name' => 'Accounts',                    //Module name
	                  'query' => 'accounts.sic_code="'.$data['customer_id'].'"',     //Where condition without "where" keyword
	                  'order_by' => "date_entered ASC",                     //$order_by
	                  'offset'  => 0,                                 //offset
	                  'select_fields' => 'id',               //select_fields
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
	          $lst['billing_account_id']=$output->entry_list[0]->id;
	          $lst['date_entered']=date("Y-m-d H:i:s");
	          // echo "<pre>";
	          // print_r($output);
	          // exit;
              //
              $parameters = array(
							      'session' => $session, //Session ID
							      'module' => 'AOS_Quotes',  //Module name
							      'name_value_list' => $lst, 
		      				     ); 
		    $json = json_encode($parameters); 
		    $postArgs = 'method=set_entry&input_type=JSON&response_type=JSON&rest_data=' . $json;
		    
		    curl_setopt($curl, CURLOPT_POSTFIELDS, $postArgs);
		    
		    // Make the REST call, returning the result 
		    $response = curl_exec($curl);
		    
		    // Convert the result from JSON format to a PHP array 
		    $result = json_decode($response,true);
		    //echo "<pre>";print_r($result);exit;
		    // Get the newly created record id
		    $recordId = $result['id'] ;

		    $fynsis_orderid=$recordId;
		    // echo "shafiq<pre>";print_r($recordId);exit;





		//***********************************************************
// // data to Customer
// 			 //    $lst12=array();
// 				// $lst12['id'] = $fynsis_orderid;
// 				// $lst12['total_amt']=$grp_tot;
// 				// $lst12['discount_amount']=$grp_discnt;
// 				// $lst12['tax_amount'] = $grp_tx;
// 				// $lst12['total_amount'] =$grd_tot;
// 		    $lst22=array();
// 		    $lst22['id'] = $fynsis_orderid;
// 			$lst22['billing_address_street']=$data['shipping_address_1']." ".$data['shipping_address_2'];
// 			$lst22['billing_address_state']=$data['shipping_zone'];
// 			$lst22['billing_address_city']=$data['shipping_city'];
// 			$lst22['billing_address_postalcode']=$data['shipping_postcode'];
// 			$lst22['billing_address_country']=$data['shipping_country'];
// 			$lst22['shipping_address_street']=$data['shipping_address_1']." ".$data['shipping_address_2'];
// 			$lst22['shipping_address_state']=$data['shipping_zone'];
// 			$lst22['shipping_address_city']=$data['shipping_city'];
// 			$lst22['shipping_address_postalcode']=$data['shipping_postcode'];
// 			$lst22['shipping_address_country']=$data['shipping_country'];
// 			// echo $lst['billing_account_id']=$data['customer_id'];
// 			//exit;
// 			$lst['name']=$order_id."---".$data['customer_id'];
			   
// 				$parameters = array(
// 			      'session' => $session, //Session ID
// 			      'module' => 'Accounts',
// 			      // 'query' => $qry,   //Module name
// 			      'name_value_list' => $lst, 
// 				); 
// 			    $json = json_encode($parameters);
// 			    $postArgs = 'method=set_entry&input_type=JSON&response_type=JSON&rest_data=' . $json;
			    
// 			    curl_setopt($curl, CURLOPT_POSTFIELDS, $postArgs);
			    
// 			    // Make the REST call, returning the result 
// 			    $response = curl_exec($curl);
			    
// 			    // Convert the result from JSON format to a PHP array 
// 			    $result = json_decode($response,true);
// 			    // Get the newly created record id

// 			    echo $recordId = $result['id'];
// 			    // echo "shafiq<p


// 			    //end of Customers
}


		// Products
		if (isset($data['products'])) {
			// echo"khurram <pre>";print_r($data);exit;
			foreach ($data['products'] as $product) {
				$this->db->query("INSERT INTO " . DB_PREFIX . "order_product SET order_id = '" . (int)$order_id . "', product_id = '" . (int)$product['product_id'] . "', name = '" . $this->db->escape($product['name']) . "', model = '" . $this->db->escape($product['model']) . "', quantity = '" . (int)$product['quantity'] . "', price = '" . (float)$product['price'] . "', total = '" . (float)$product['total'] . "', tax = '" . (float)$product['tax'] . "', reward = '" . (int)$product['reward'] . "'");

				$order_product_id = $this->db->getLastId();
				// print_r($product);
				// exit;
				foreach ($product['option'] as $option) {
					$this->db->query("INSERT INTO " . DB_PREFIX . "order_option SET order_id = '" . (int)$order_id . "', order_product_id = '" . (int)$order_product_id . "', product_option_id = '" . (int)$option['product_option_id'] . "', product_option_value_id = '" . (int)$option['product_option_value_id'] . "', name = '" . $this->db->escape($option['name']) . "', `value` = '" . $this->db->escape($option['value']) . "', `type` = '" . $this->db->escape($option['type']) . "'");
				}
				{
				//Calculation of totals

				$discnt = (int)$product['reward'];
				$sl_price =  (float)$product['price'] - $discnt;
				$grp_discnt = $grp_discnt + $discnt;

				
				$tx_amt = (float)$product['tax'];
				$grp_tx = $grp_tx +$tx_amt;

				$pd_tot= (float)$product['price'] * (int)$product['quantity'] ;
				// $pd_tot= (float)$product['price'] - (int)$product['reward']  - (float)$product['tax'];
				$grp_tot=$grp_tot + $pd_tot;

				$sub_tot = $grp_tot - $grp_discnt;
				$grd_tot = $sub_tot + $grp_tx;

				//end of calculation

				$sqlprodid = "select * from oc_product WHERE product_id='".$product['product_id']."'";
				$prodidres = $this->db->query($sqlprodid);
				$prodid  = $prodidres->row['sku'];
				// exit;
				$lst1=array();
				$lst1['parent_id'] = $fynsis_orderid;
				$lst1['parent_type'] = "AOS_Quotes";
				$lst1['product_qty']=(int)$product['quantity'];
				$lst1['name']=$this->db->escape($product['name']);
				$lst1['part_number'] = (int)$product['product_id'];
				$lst1['product_list_price'] =(float)$product['price'];
				$lst1['product_discount'] = $discnt;
				$lst1['product_unit_price']=$sl_price;
				$lst1['vat_amt']=(float)$product['tax'];
				$lst1['product_total_price']=$pd_tot;

				
				$lst1['order_id']=(int)$order_id;
				$lst1['product_id']=$prodid;
				//$lst1['id']= $data->$product['sku'];
				// print_r($data);
				// echo "-----------------------------------";

				// print_r($lst1);
// 				$lst1['parent_type']: "AOS_Quotes";
// 				$lst1['product_id']: "633b1d9c-8e5c-be45-ab96-5b20f85e0e0e"

// product_list_price: "20.000000"

// product_qty: 1

// product_total_price: 20
				//echo "<pre>";exit;
				$parameters = array(
			      'session' => $session, //Session ID
			      'module' => 'AOS_Products_Quotes',  //Module name
			      'name_value_list' => $lst1, 
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
				
			   
			  //   echo "<pre>";print_r($result);exit;
			// data to AOS_Quotes
			    $lst12=array();
				$lst12['id'] = $fynsis_orderid;
				$lst12['total_amt']=$grp_tot;
				$lst12['discount_amount']=$grp_discnt;
				$lst12['tax_amount'] = $grp_tx;
				$lst12['total_amount'] =$grd_tot;
			   
				$parameters = array(
			      'session' => $session, //Session ID
			      'module' => 'AOS_Quotes',
			      // 'query' => $qry,   //Module name
			      'name_value_list' => $lst12, 
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
			    // echo "shafiq<p>
			    //end of Aos_Quotes
		}
	}
}

		// Gift Voucher
		$this->load->model('extension/total/voucher');

		// Vouchers
		if (isset($data['vouchers'])) {
			foreach ($data['vouchers'] as $voucher) {
				$this->db->query("INSERT INTO " . DB_PREFIX . "order_voucher SET order_id = '" . (int)$order_id . "', description = '" . $this->db->escape($voucher['description']) . "', code = '" . $this->db->escape($voucher['code']) . "', from_name = '" . $this->db->escape($voucher['from_name']) . "', from_email = '" . $this->db->escape($voucher['from_email']) . "', to_name = '" . $this->db->escape($voucher['to_name']) . "', to_email = '" . $this->db->escape($voucher['to_email']) . "', voucher_theme_id = '" . (int)$voucher['voucher_theme_id'] . "', message = '" . $this->db->escape($voucher['message']) . "', amount = '" . (float)$voucher['amount'] . "'");

				$order_voucher_id = $this->db->getLastId();

				$voucher_id = $this->model_extension_total_voucher->addVoucher($order_id, $voucher);

				$this->db->query("UPDATE " . DB_PREFIX . "order_voucher SET voucher_id = '" . (int)$voucher_id . "' WHERE order_voucher_id = '" . (int)$order_voucher_id . "'");
			}
		}

		// Totals
		if (isset($data['totals'])) {
			foreach ($data['totals'] as $total) {
				$this->db->query("INSERT INTO " . DB_PREFIX . "order_total SET order_id = '" . (int)$order_id . "', code = '" . $this->db->escape($total['code']) . "', title = '" . $this->db->escape($total['title']) . "', `value` = '" . (float)$total['value'] . "', sort_order = '" . (int)$total['sort_order'] . "'");
			}
		}

		return $order_id;
	}

	public function editOrder($order_id, $data) {
		// Void the order first
		// echo "shafiq";print_r($data);exit;
		$this->addOrderHistory($order_id, 0);

		$this->db->query("UPDATE `" . DB_PREFIX . "order` SET invoice_prefix = '" . $this->db->escape($data['invoice_prefix']) . "', store_id = '" . (int)$data['store_id'] . "', store_name = '" . $this->db->escape($data['store_name']) . "', store_url = '" . $this->db->escape($data['store_url']) . "', customer_id = '" . (int)$data['customer_id'] . "', customer_group_id = '" . (int)$data['customer_group_id'] . "', firstname = '" . $this->db->escape($data['firstname']) . "', lastname = '" . $this->db->escape($data['lastname']) . "', email = '" . $this->db->escape($data['email']) . "', telephone = '" . $this->db->escape($data['telephone']) . "', custom_field = '" . $this->db->escape(json_encode($data['custom_field'])) . "', payment_firstname = '" . $this->db->escape($data['payment_firstname']) . "', payment_lastname = '" . $this->db->escape($data['payment_lastname']) . "', payment_company = '" . $this->db->escape($data['payment_company']) . "', payment_address_1 = '" . $this->db->escape($data['payment_address_1']) . "', payment_address_2 = '" . $this->db->escape($data['payment_address_2']) . "', payment_city = '" . $this->db->escape($data['payment_city']) . "', payment_postcode = '" . $this->db->escape($data['payment_postcode']) . "', payment_country = '" . $this->db->escape($data['payment_country']) . "', payment_country_id = '" . (int)$data['payment_country_id'] . "', payment_zone = '" . $this->db->escape($data['payment_zone']) . "', payment_zone_id = '" . (int)$data['payment_zone_id'] . "', payment_address_format = '" . $this->db->escape($data['payment_address_format']) . "', payment_custom_field = '" . $this->db->escape(json_encode($data['payment_custom_field'])) . "', payment_method = '" . $this->db->escape($data['payment_method']) . "', payment_code = '" . $this->db->escape($data['payment_code']) . "', shipping_firstname = '" . $this->db->escape($data['shipping_firstname']) . "', shipping_lastname = '" . $this->db->escape($data['shipping_lastname']) . "', shipping_company = '" . $this->db->escape($data['shipping_company']) . "', shipping_address_1 = '" . $this->db->escape($data['shipping_address_1']) . "', shipping_address_2 = '" . $this->db->escape($data['shipping_address_2']) . "', shipping_city = '" . $this->db->escape($data['shipping_city']) . "', shipping_postcode = '" . $this->db->escape($data['shipping_postcode']) . "', shipping_country = '" . $this->db->escape($data['shipping_country']) . "', shipping_country_id = '" . (int)$data['shipping_country_id'] . "', shipping_zone = '" . $this->db->escape($data['shipping_zone']) . "', shipping_zone_id = '" . (int)$data['shipping_zone_id'] . "', shipping_address_format = '" . $this->db->escape($data['shipping_address_format']) . "', shipping_custom_field = '" . $this->db->escape(json_encode($data['shipping_custom_field'])) . "', shipping_method = '" . $this->db->escape($data['shipping_method']) . "', shipping_code = '" . $this->db->escape($data['shipping_code']) . "', comment = '" . $this->db->escape($data['comment']) . "', total = '" . (float)$data['total'] . "', affiliate_id = '" . (int)$data['affiliate_id'] . "', commission = '" . (float)$data['commission'] . "', date_modified = NOW() WHERE order_id = '" . (int)$order_id . "'");

		
{
		//************************************************************
			//
		// echo "<pre>";
		// print_r($data);
		// exit;
			$lst=array();
			$lst['billing_address_street']=$data['custom_field'][3];
			$lst['billing_address_state']=$data['custom_field'][5];
			$lst['billing_address_city']=$data['custom_field'][4];
			$lst['billing_address_postalcode']=$data['custom_field'][6];
			$lst['billing_address_country']=$data['custom_field'][7];
			$lst['shipping_address_street']=$data['custom_field'][3];
			$lst['shipping_address_state']=$data['custom_field'][5];
			$lst['shipping_address_city']=$data['custom_field'][4];
			$lst['shipping_address_postalcode']=$data['custom_field'][6];
			$lst['shipping_address_country']=$data['custom_field'][7];
			$lst['special_suggestion_c']=$data['comment'];
			$lst['name']=$order_id."---".$data['customer_id'];
			$lst['customerid_c']=$data['customer_id'];
			$lst['order_id']=$order_id;
			// customer_id


			


			

			$url1 = 'http://devmike.ml/avocadocrm/service/v4_1/rest.php?';
          
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

          $qry="AOS_Quotes.order_id = '".$order_id."' ";
	      $pmtr = array(
	                  'session' => $session,                    //Session ID
	                  'module_name' => 'AOS_Quotes',                    //Module name
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


	          $main_orderid=$id=$output->entry_list[0]->id;
		         // echo "Shafiq <br>".$id;print_r($output);exit;	

	          $lst['id']=$id;

              $parameters = array(
							      'session' => $session, //Session ID
							      'module' => 'AOS_Quotes',  //Module name
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

		    $fynsis_orderid=$recordId;
		    // echo "shafiq<pre>";print_r($recordId);exit;

		    // --------------------------------------------------------------

		    $qry="aos_products_quotes.order_id = '".$order_id."' ";
			      $pmtr = array(
			                  'session' => $session,                    //Session ID
			                  'module_name' => 'aos_products_quotes',                    //Module name
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

			          // $pid=$output->entry_list[0]->id;

	          $fyn_products=array();
	          foreach ($output->entry_list as $list) 
	          {
	          	$fyn_products[]=$list->id;
	          }
	          // echo "shafiq <br>";print_r($fyn_products);exit;
	          $n=sizeof($fyn_products);


	          foreach ($fyn_products as $prd) 
	          {
			          // ----------------------------------------------
	          		// echo "shafiq <br><pre>";print_r($prd);exit;
			          // $lst1['id']=$prd;
			          // $lst1['delete']=1;

		              $parameters = array(
									      'session' => $session, //Session ID
									      'module' => 'aos_products_quotes',  //Module name
									      "name_value_list" => array(
																		array(
																		    "name" => "id",
																		    "value" => $prd,
																		),
																		array(
																		    "name" => "deleted",
																		    "value" => "1",
																		),
																	),
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

	          // $main_orderid=$id=$output->entry_list[0]->id;



		//***********************************************************
	}
		$this->db->query("DELETE FROM " . DB_PREFIX . "order_product WHERE order_id = '" . (int)$order_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "order_option WHERE order_id = '" . (int)$order_id . "'");


		// Products
		if (isset($data['products'])) {
			foreach ($data['products'] as $product) {
				$this->db->query("INSERT INTO " . DB_PREFIX . "order_product SET order_id = '" . (int)$order_id . "', product_id = '" . (int)$product['product_id'] . "', name = '" . $this->db->escape($product['name']) . "', model = '" . $this->db->escape($product['model']) . "', quantity = '" . (int)$product['quantity'] . "', price = '" . (float)$product['price'] . "', total = '" . (float)$product['total'] . "', tax = '" . (float)$product['tax'] . "', reward = '" . (int)$product['reward'] . "'");

				$order_product_id = $this->db->getLastId();

				foreach ($product['option'] as $option) {
					$this->db->query("INSERT INTO " . DB_PREFIX . "order_option SET order_id = '" . (int)$order_id . "', order_product_id = '" . (int)$order_product_id . "', product_option_id = '" . (int)$option['product_option_id'] . "', product_option_value_id = '" . (int)$option['product_option_value_id'] . "', name = '" . $this->db->escape($option['name']) . "', `value` = '" . $this->db->escape($option['value']) . "', `type` = '" . $this->db->escape($option['type']) . "'");
				}

{
				$lst1=array();
				$lst1['name']=$this->db->escape($product['name']);
				$lst1['price']=(float)$product['price'];
				$lst1['quantity']=(int)$product['quantity'];
				$lst1['order_id']=$order_id;

				$parameters = array(
							      'session' => $session, //Session ID
							      'module' => 'AOS_Products_Quotes',  //Module name
							      'name_value_list' => $lst1, 
		      				     ); 
			    $json = json_encode($parameters); 
			    $postArgs = 'method=set_entry&input_type=JSON&response_type=JSON&rest_data=' . $json;
			    
			   + curl_setopt($curl, CURLOPT_POSTFIELDS, $postArgs);
			    
			    // Make the REST call, returning the result 
			    $response = curl_exec($curl);
			    
			    // Convert the result from JSON format to a PHP array 
			    $result = json_decode($response,true);
			    
			    // Get the newly created record id
			    $recordId = $result['id'];

			    // echo "shafiq<pre>";print_r($recordId);exit;

			    //SET RELATIONSHIP

			    $set_relationship_parameters = array(
			    'session' => $session,

			    'module_name' => 'AOS_Quotes',

			    //The ID of the specified module bean.
			    'module_id' => $fynsis_orderid,

			    //The relationship name of the linked field from which to relate records.
			    'link_field_name' => 'aos_quotes_aos_product_quotes',

			    //The list of record ids to relate
			    'related_ids' => array(
								        $recordId,
								    ),
			    
			    //Sets the value for relationship based fields
			    // 'name_value_list' => array(
			    //     array(
			    //         'name' => 'contact_role',
			    //         'value' => 'Other'
			    //     ),
			    // ),

			    //Whether or not to delete the relationship. 0:create, 1:delete
			    'delete'=> 0,
			  );
			    // echo "shafiq<pre>";print_r($set_relationship_parameters);exit;
			    $json = json_encode($set_relationship_parameters); 
			    $postArgs = 'method=set_relationship&input_type=JSON&response_type=JSON&rest_data=' . $json;
			    
			    curl_setopt($curl, CURLOPT_POSTFIELDS, $postArgs);
			    
			    // Make the REST call, returning the result 
			    $response = curl_exec($curl);


			    
			    // Convert the result from JSON format to a PHP array 
			    $result = json_decode($response,true);

}

				
			}
		}

		// Gift Voucher
		$this->load->model('extension/total/voucher');

		$this->model_extension_total_voucher->disableVoucher($order_id);

		// Vouchers
		$this->db->query("DELETE FROM " . DB_PREFIX . "order_voucher WHERE order_id = '" . (int)$order_id . "'");

		if (isset($data['vouchers'])) {
			foreach ($data['vouchers'] as $voucher) {
				$this->db->query("INSERT INTO " . DB_PREFIX . "order_voucher SET order_id = '" . (int)$order_id . "', description = '" . $this->db->escape($voucher['description']) . "', code = '" . $this->db->escape($voucher['code']) . "', from_name = '" . $this->db->escape($voucher['from_name']) . "', from_email = '" . $this->db->escape($voucher['from_email']) . "', to_name = '" . $this->db->escape($voucher['to_name']) . "', to_email = '" . $this->db->escape($voucher['to_email']) . "', voucher_theme_id = '" . (int)$voucher['voucher_theme_id'] . "', message = '" . $this->db->escape($voucher['message']) . "', amount = '" . (float)$voucher['amount'] . "'");

				$order_voucher_id = $this->db->getLastId();

				$voucher_id = $this->model_extension_total_voucher->addVoucher($order_id, $voucher);

				$this->db->query("UPDATE " . DB_PREFIX . "order_voucher SET voucher_id = '" . (int)$voucher_id . "' WHERE order_voucher_id = '" . (int)$order_voucher_id . "'");
			}
		}

		// Totals
		$this->db->query("DELETE FROM " . DB_PREFIX . "order_total WHERE order_id = '" . (int)$order_id . "'");

		if (isset($data['totals'])) {
			foreach ($data['totals'] as $total) {
				$this->db->query("INSERT INTO " . DB_PREFIX . "order_total SET order_id = '" . (int)$order_id . "', code = '" . $this->db->escape($total['code']) . "', title = '" . $this->db->escape($total['title']) . "', `value` = '" . (float)$total['value'] . "', sort_order = '" . (int)$total['sort_order'] . "'");
			}
		}
	}

	public function deleteOrder($order_id) {
		// Void the order first
		$this->addOrderHistory($order_id, 0);

		$this->db->query("DELETE FROM `" . DB_PREFIX . "order` WHERE order_id = '" . (int)$order_id . "'");
		$this->db->query("DELETE FROM `" . DB_PREFIX . "order_product` WHERE order_id = '" . (int)$order_id . "'");
		$this->db->query("DELETE FROM `" . DB_PREFIX . "order_option` WHERE order_id = '" . (int)$order_id . "'");
		$this->db->query("DELETE FROM `" . DB_PREFIX . "order_voucher` WHERE order_id = '" . (int)$order_id . "'");
		$this->db->query("DELETE FROM `" . DB_PREFIX . "order_total` WHERE order_id = '" . (int)$order_id . "'");
		$this->db->query("DELETE FROM `" . DB_PREFIX . "order_history` WHERE order_id = '" . (int)$order_id . "'");
		$this->db->query("DELETE `or`, ort FROM `" . DB_PREFIX . "order_recurring` `or`, `" . DB_PREFIX . "order_recurring_transaction` `ort` WHERE order_id = '" . (int)$order_id . "' AND ort.order_recurring_id = `or`.order_recurring_id");
		$this->db->query("DELETE FROM `" . DB_PREFIX . "customer_transaction` WHERE order_id = '" . (int)$order_id . "'");

		// Gift Voucher
		$this->load->model('extension/total/voucher');

		$this->model_extension_total_voucher->disableVoucher($order_id);
	}

	public function getOrder($order_id) {
		$order_query = $this->db->query("SELECT *, (SELECT os.name FROM `" . DB_PREFIX . "order_status` os WHERE os.order_status_id = o.order_status_id AND os.language_id = o.language_id) AS order_status FROM `" . DB_PREFIX . "order` o WHERE o.order_id = '" . (int)$order_id . "'");

		if ($order_query->num_rows) {
			$country_query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "country` WHERE country_id = '" . (int)$order_query->row['payment_country_id'] . "'");

			if ($country_query->num_rows) {
				$payment_iso_code_2 = $country_query->row['iso_code_2'];
				$payment_iso_code_3 = $country_query->row['iso_code_3'];
			} else {
				$payment_iso_code_2 = '';
				$payment_iso_code_3 = '';
			}

			$zone_query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "zone` WHERE zone_id = '" . (int)$order_query->row['payment_zone_id'] . "'");

			if ($zone_query->num_rows) {
				$payment_zone_code = $zone_query->row['code'];
			} else {
				$payment_zone_code = '';
			}

			$country_query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "country` WHERE country_id = '" . (int)$order_query->row['shipping_country_id'] . "'");

			if ($country_query->num_rows) {
				$shipping_iso_code_2 = $country_query->row['iso_code_2'];
				$shipping_iso_code_3 = $country_query->row['iso_code_3'];
			} else {
				$shipping_iso_code_2 = '';
				$shipping_iso_code_3 = '';
			}

			$zone_query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "zone` WHERE zone_id = '" . (int)$order_query->row['shipping_zone_id'] . "'");

			if ($zone_query->num_rows) {
				$shipping_zone_code = $zone_query->row['code'];
			} else {
				$shipping_zone_code = '';
			}

			$this->load->model('localisation/language');

			$language_info = $this->model_localisation_language->getLanguage($order_query->row['language_id']);

			if ($language_info) {
				$language_code = $language_info['code'];
			} else {
				$language_code = $this->config->get('config_language');
			}

			return array(
				'order_id'                => $order_query->row['order_id'],
				'invoice_no'              => $order_query->row['invoice_no'],
				'invoice_prefix'          => $order_query->row['invoice_prefix'],
				'store_id'                => $order_query->row['store_id'],
				'store_name'              => $order_query->row['store_name'],
				'store_url'               => $order_query->row['store_url'],
				'customer_id'             => $order_query->row['customer_id'],
				'firstname'               => $order_query->row['firstname'],
				'lastname'                => $order_query->row['lastname'],
				'email'                   => $order_query->row['email'],
				'telephone'               => $order_query->row['telephone'],
				'custom_field'            => json_decode($order_query->row['custom_field'], true),
				'payment_firstname'       => $order_query->row['payment_firstname'],
				'payment_lastname'        => $order_query->row['payment_lastname'],
				'payment_company'         => $order_query->row['payment_company'],
				'payment_address_1'       => $order_query->row['payment_address_1'],
				'payment_address_2'       => $order_query->row['payment_address_2'],
				'payment_postcode'        => $order_query->row['payment_postcode'],
				'payment_city'            => $order_query->row['payment_city'],
				'payment_zone_id'         => $order_query->row['payment_zone_id'],
				'payment_zone'            => $order_query->row['payment_zone'],
				'payment_zone_code'       => $payment_zone_code,
				'payment_country_id'      => $order_query->row['payment_country_id'],
				'payment_country'         => $order_query->row['payment_country'],
				'payment_iso_code_2'      => $payment_iso_code_2,
				'payment_iso_code_3'      => $payment_iso_code_3,
				'payment_address_format'  => $order_query->row['payment_address_format'],
				'payment_custom_field'    => json_decode($order_query->row['payment_custom_field'], true),
				'payment_method'          => $order_query->row['payment_method'],
				'payment_code'            => $order_query->row['payment_code'],
				'shipping_firstname'      => $order_query->row['shipping_firstname'],
				'shipping_lastname'       => $order_query->row['shipping_lastname'],
				'shipping_company'        => $order_query->row['shipping_company'],
				'shipping_address_1'      => $order_query->row['shipping_address_1'],
				'shipping_address_2'      => $order_query->row['shipping_address_2'],
				'shipping_postcode'       => $order_query->row['shipping_postcode'],
				'shipping_city'           => $order_query->row['shipping_city'],
				'shipping_zone_id'        => $order_query->row['shipping_zone_id'],
				'shipping_zone'           => $order_query->row['shipping_zone'],
				'shipping_zone_code'      => $shipping_zone_code,
				'shipping_country_id'     => $order_query->row['shipping_country_id'],
				'shipping_country'        => $order_query->row['shipping_country'],
				'shipping_iso_code_2'     => $shipping_iso_code_2,
				'shipping_iso_code_3'     => $shipping_iso_code_3,
				'shipping_address_format' => $order_query->row['shipping_address_format'],
				'shipping_custom_field'   => json_decode($order_query->row['shipping_custom_field'], true),
				'shipping_method'         => $order_query->row['shipping_method'],
				'shipping_code'           => $order_query->row['shipping_code'],
				'comment'                 => $order_query->row['comment'],
				'total'                   => $order_query->row['total'],
				'order_status_id'         => $order_query->row['order_status_id'],
				'order_status'            => $order_query->row['order_status'],
				'affiliate_id'            => $order_query->row['affiliate_id'],
				'commission'              => $order_query->row['commission'],
				'language_id'             => $order_query->row['language_id'],
				'language_code'           => $language_code,
				'currency_id'             => $order_query->row['currency_id'],
				'currency_code'           => $order_query->row['currency_code'],
				'currency_value'          => $order_query->row['currency_value'],
				'ip'                      => $order_query->row['ip'],
				'forwarded_ip'            => $order_query->row['forwarded_ip'],
				'user_agent'              => $order_query->row['user_agent'],
				'accept_language'         => $order_query->row['accept_language'],
				'date_added'              => $order_query->row['date_added'],
				'date_modified'           => $order_query->row['date_modified']
			);
		} else {
			return false;
		}
	}
	
	public function getOrderProducts($order_id) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "order_product WHERE order_id = '" . (int)$order_id . "'");
		
		return $query->rows;
	}
	
	public function getOrderOptions($order_id, $order_product_id) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "order_option WHERE order_id = '" . (int)$order_id . "' AND order_product_id = '" . (int)$order_product_id . "'");
		
		return $query->rows;
	}
	
	public function getOrderVouchers($order_id) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "order_voucher WHERE order_id = '" . (int)$order_id . "'");
	
		return $query->rows;
	}
	
	public function getOrderTotals($order_id) {
		$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "order_total` WHERE order_id = '" . (int)$order_id . "' ORDER BY sort_order ASC");
		
		return $query->rows;
	}	
			
	public function addOrderHistory($order_id, $order_status_id, $comment = '', $notify = false, $override = false) {
		$order_info = $this->getOrder($order_id);
		
		if ($order_info) {
			// Fraud Detection
			$this->load->model('account/customer');

			$customer_info = $this->model_account_customer->getCustomer($order_info['customer_id']);

			if ($customer_info && $customer_info['safe']) {
				$safe = true;
			} else {
				$safe = false;
			}

			// Only do the fraud check if the customer is not on the safe list and the order status is changing into the complete or process order status
			if (!$safe && !$override && in_array($order_status_id, array_merge($this->config->get('config_processing_status'), $this->config->get('config_complete_status')))) {
				// Anti-Fraud
				$this->load->model('setting/extension');

				$extensions = $this->model_setting_extension->getExtensions('fraud');

				foreach ($extensions as $extension) {
					if ($this->config->get('fraud_' . $extension['code'] . '_status')) {
						$this->load->model('extension/fraud/' . $extension['code']);

						if (property_exists($this->{'model_extension_fraud_' . $extension['code']}, 'check')) {
							$fraud_status_id = $this->{'model_extension_fraud_' . $extension['code']}->check($order_info);
	
							if ($fraud_status_id) {
								$order_status_id = $fraud_status_id;
							}
						}
					}
				}
			}

			// If current order status is not processing or complete but new status is processing or complete then commence completing the order
			if (!in_array($order_info['order_status_id'], array_merge($this->config->get('config_processing_status'), $this->config->get('config_complete_status'))) && in_array($order_status_id, array_merge($this->config->get('config_processing_status'), $this->config->get('config_complete_status')))) {
				// Redeem coupon, vouchers and reward points
				$order_totals = $this->getOrderTotals($order_id);

				foreach ($order_totals as $order_total) {
					$this->load->model('extension/total/' . $order_total['code']);

					if (property_exists($this->{'model_extension_total_' . $order_total['code']}, 'confirm')) {
						// Confirm coupon, vouchers and reward points
						$fraud_status_id = $this->{'model_extension_total_' . $order_total['code']}->confirm($order_info, $order_total);
						
						// If the balance on the coupon, vouchers and reward points is not enough to cover the transaction or has already been used then the fraud order status is returned.
						if ($fraud_status_id) {
							$order_status_id = $fraud_status_id;
						}
					}
				}

				// Stock subtraction
				$order_products = $this->getOrderProducts($order_id);

				foreach ($order_products as $order_product) {
					$this->db->query("UPDATE " . DB_PREFIX . "product SET quantity = (quantity - " . (int)$order_product['quantity'] . ") WHERE product_id = '" . (int)$order_product['product_id'] . "' AND subtract = '1'");

					$order_options = $this->getOrderOptions($order_id, $order_product['order_product_id']);

					foreach ($order_options as $order_option) {
						$this->db->query("UPDATE " . DB_PREFIX . "product_option_value SET quantity = (quantity - " . (int)$order_product['quantity'] . ") WHERE product_option_value_id = '" . (int)$order_option['product_option_value_id'] . "' AND subtract = '1'");
					}
				}
				
				// Add commission if sale is linked to affiliate referral.
				if ($order_info['affiliate_id'] && $this->config->get('config_affiliate_auto')) {
					$this->load->model('account/customer');

					if (!$this->model_account_customer->getTotalTransactionsByOrderId($order_id)) {
						$this->model_account_customer->addTransaction($order_info['affiliate_id'], $this->language->get('text_order_id') . ' #' . $order_id, $order_info['commission'], $order_id);
					}
				}
			}

			// Update the DB with the new statuses
			$this->db->query("UPDATE `" . DB_PREFIX . "order` SET order_status_id = '" . (int)$order_status_id . "', date_modified = NOW() WHERE order_id = '" . (int)$order_id . "'");

			$this->db->query("INSERT INTO " . DB_PREFIX . "order_history SET order_id = '" . (int)$order_id . "', order_status_id = '" . (int)$order_status_id . "', notify = '" . (int)$notify . "', comment = '" . $this->db->escape($comment) . "', date_added = NOW()");

			// If old order status is the processing or complete status but new status is not then commence restock, and remove coupon, voucher and reward history
			if (in_array($order_info['order_status_id'], array_merge($this->config->get('config_processing_status'), $this->config->get('config_complete_status'))) && !in_array($order_status_id, array_merge($this->config->get('config_processing_status'), $this->config->get('config_complete_status')))) {
				// Restock
				$order_products = $this->getOrderProducts($order_id);

				foreach($order_products as $order_product) {
					$this->db->query("UPDATE `" . DB_PREFIX . "product` SET quantity = (quantity + " . (int)$order_product['quantity'] . ") WHERE product_id = '" . (int)$order_product['product_id'] . "' AND subtract = '1'");

					$order_options = $this->getOrderOptions($order_id, $order_product['order_product_id']);

					foreach ($order_options as $order_option) {
						$this->db->query("UPDATE " . DB_PREFIX . "product_option_value SET quantity = (quantity + " . (int)$order_product['quantity'] . ") WHERE product_option_value_id = '" . (int)$order_option['product_option_value_id'] . "' AND subtract = '1'");
					}
				}

				// Remove coupon, vouchers and reward points history
				$order_totals = $this->getOrderTotals($order_id);
				
				foreach ($order_totals as $order_total) {
					$this->load->model('extension/total/' . $order_total['code']);

					if (property_exists($this->{'model_extension_total_' . $order_total['code']}, 'unconfirm')) {
						$this->{'model_extension_total_' . $order_total['code']}->unconfirm($order_id);
					}
				}

				// Remove commission if sale is linked to affiliate referral.
				if ($order_info['affiliate_id']) {
					$this->load->model('account/customer');
					
					$this->model_account_customer->deleteTransactionByOrderId($order_id);
				}
			}

			$this->cache->delete('product');
		}
	}
}