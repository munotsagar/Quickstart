<?php
class ControllerCommonHome extends Controller {
	public function index() {
		$this->document->setTitle($this->config->get('config_meta_title'));
		$this->document->setDescription($this->config->get('config_meta_description'));
		$this->document->setKeywords($this->config->get('config_meta_keyword'));

        
	    $this->load->model('extension/cms/blog');
		$this->load->model('tool/image');
		$this->load->model('setting/extension');
		  
		$installed_modules = $this->model_setting_extension->getExtensions('module');
	
		foreach($installed_modules as $extension){
			if(is_array($extension) && $extension['code'] == "blog"){
        
        $data['blogs'] = array();
			  if (isset($this->request->get['limit'])) {
			  $limit = (int)$this->request->get['limit'];
			} else {
			  $limit = 12;
			}

		if (isset($this->request->get['page'])) {
		  $page = (int)$this->request->get['page'];
		} else {
		  $page = 1;
		}
			$filter = array(
				'start' => ($page - 1) * $limit,
				'limit' => $limit
			);
		 
		$blogs = $this->model_extension_cms_blog->getBlogs($filter);
        foreach ($blogs as $result) {

          if(!empty($result['image'])){
            $image = $this->model_tool_image->resize($result['image'], 750, 500);
          } else {
            $image = $this->model_tool_image->resize('catalog/blog/default-banner.jpg', 700, 520);
          }

          $data['blogs'][] = array(
		    'blog_id' => $result['blog_id'],
            'title' => $result['title'],
            'image' => $image,
            'meta_description' => utf8_substr(trim(strip_tags(html_entity_decode($result['meta_description'], ENT_QUOTES, 'UTF-8'))), 0, 75) . '..',
            'href'  => $this->url->link('extension/module/blog/info', 'blog_id=' . $result['blog_id'])
          ); 
        }   
		 
		}
		 
		}
		
		  
		 
      

		if (isset($this->request->get['route'])) {
			$this->document->addLink($this->config->get('config_url'), 'canonical');
		}

		$data['column_left'] = $this->load->controller('common/column_left');
		$data['column_right'] = $this->load->controller('common/column_right');
		$data['content_top'] = $this->load->controller('common/content_top');
		$data['content_bottom'] = $this->load->controller('common/content_bottom');
		$data['footer'] = $this->load->controller('common/footer');
		$data['header'] = $this->load->controller('common/header');

			
		$data['cat_nm'] = array();
		$cat_nm = $this->model_catalog_category->getCategories(0);
		 
		foreach ($cat_nm as $category) 
			{
			$data['product_name'][] = array(
				'name'     => $category['name'],
				'catimage'     => $category['image'],
				'column'   => $category['column'] ? $category['column'] : 1,
				'href'     => $this->url->link('product/category', 'path=' . $category['category_id'])
				);
			}	 
			 
			

			     $this->load->model('catalog/category');
		         $this->load->language('product/category');
		         $this->load->model('catalog/product');
				 
				 $results_prod_all = $this->model_catalog_product->getProducts();  
				 
				 foreach($results_prod_all as $results_prod)
				 {
					 	if (($this->config->get('config_customer_price') && $this->customer->isLogged()) || !$this->config->get('config_customer_price')) {
										$results_prod['price'] = $this->currency->format($this->tax->calculate($results_prod['price'], $results_prod['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
										
								} else {
									$results_prod['price'] = false;
								}
								$results_prod['href']=HTTP_SERVER.'index.php?route=product/product&product_id='.$results_prod['product_id'];
								
								if ((float)$results_prod['special']) {
									$results_prod['special'] = $this->currency->format($this->tax->calculate($results_prod['special'], $results_prod['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
								} 

								if ($this->config->get('config_tax')) {
									$results_prod['tax'] = $this->currency->format((float)$results_prod['special'] ? $results_prod['special'] : $results_prod['price'], $this->session->data['currency']);
								} else {
								$tax = false;
								}
						$results_prod1[]=$results_prod;
				 }
				 
				$data['results_prod_all']=$results_prod1;
				 
			$array_data=array();
		    $data['categories'] = array();
			
			$results = $this->model_catalog_category->getCategories();
			 
		$category_info=array();
			foreach ($results as $result) {
				$filter_data = array(
					'category_id'  => $result['category_id'],
					'name' => $result['name']
					 
				);	
				$category_info[]=$filter_data; 
			}
			
				$main_array=array();
				$outer_array=array();
				$innter_array=array();
				$count=0;
				foreach($category_info as $c){
			
				$temp_array=array();
					$cat_id= $c['category_id'];
					$cat_name=$c['name'];
					 
					  
						$innter_array[$count]=$cat_name;
						$query = $this->db->query("SELECT DISTINCT pc.product_id
									FROM oc_product_to_category pc
									LEFT JOIN oc_category c ON pc.category_id = c.category_id
									WHERE pc.category_id=$cat_id OR c.parent_id=$cat_id");
						$product_id_result=$query->rows;
						$i=0;
						$innter_array[$count]=array('category_name'=>$cat_name,'category_id'=>$cat_id); 
						foreach($product_id_result as $pro_id ){
						
						$results_prod = $this->model_catalog_product->getProduct($pro_id['product_id']);
										
							//$results_prod['href']=$this->url->link('product/product', 'product_id=' . $results_prod['product_id']);
								$results_prod['href']=HTTP_SERVER.'index.php?route=product/product&product_id='.$results_prod['product_id'];
								
								if (($this->config->get('config_customer_price') && $this->customer->isLogged()) || !$this->config->get('config_customer_price')) {
										$results_prod['price'] = $this->currency->format($this->tax->calculate($results_prod['price'], $results_prod['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
										
								} else {
									$results_prod['price'] = false;
								}
								if ((float)$results_prod['special']) {
									$results_prod['special'] = $this->currency->format($this->tax->calculate($results_prod['special'], $results_prod['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
								} 

								if ($this->config->get('config_tax')) {
									$results_prod['tax'] = $this->currency->format((float)$results_prod['special'] ? $results_prod['special'] : $results_prod['price'], $this->session->data['currency']);
								} else {
								$tax = false;
								}
								
								$results_images = $this->model_catalog_product->getProductImages($results_prod['product_id']);
								
								foreach ($results_images as $result_img) {
									$data['images'][] = array(
										'thumb' => $this->model_tool_image->resize($result_img['image'],378,423)
									);
								}
								$innter_array[$count][]=$results_prod;	
						}
						$main_array[$count]=$cat_name;		
						
					$count++;
				
				}	
				$data['outer_array'][]=$innter_array;
							 
				
 
				 
				$data['home1_latest'] = $this->load->controller('common/home1_latest');
				$data['home1_special'] = $this->load->controller('common/home1_special');
				$data['home1_featured'] = $this->load->controller('common/home1_featured');
				$data['home1_best'] = $this->load->controller('common/home1_best');
				$data['telephone']=$this->config->get('config_telephone');
						
					/* fetching logo start */
					if ($this->request->server['HTTPS']) {
						$server = $this->config->get('config_ssl');
					} else {
						$server = $this->config->get('config_url');
					}
		
					if (is_file(DIR_IMAGE . $this->config->get('config_logo'))) {
						$data['logo'] = $server . 'image/' . $this->config->get('config_logo');
						
					} else {
						$data['logo'] = '';
					}
					
					/* fetching logo end */
					
					$sql ="SELECT * FROM freshfood_configuration";

						$query = $this->db->query($sql);

						$configure = $query->row;
			
					$data['homepage'] = $configure['homepage'];		
					 
					$data['home1_banner_img1'] =  'image/'.$configure['h1_banner_img1'];
					
					$data['home1_banner_title1'] =  $configure['h1_banner_title1'];					
					$data['home1_banner_title2'] =  $configure['h1_banner_title2'];					
					$data['home1_banner_img2'] =  'image/'.$configure['h1_banner_img2'];
					$data['home1_banner_title3'] =  $configure['h1_banner_title3'];					
					$data['home1_banner_title4'] =  $configure['h1_banner_title4'];
					$data['home1_banner_img3'] =  'image/'.$configure['h1_banner_img3'];
					$data['home1_banner_title5'] =  $configure['h1_banner_title5'];					
					$data['home1_banner_title6'] =  $configure['h1_banner_title6'];
					$data['home1_banner_img4'] =  'image/'.$configure['h1_banner_img4'];
					$data['home1_banner_title7'] =  $configure['h1_banner_title7'];					
					$data['home1_banner_title8'] =  $configure['h1_banner_title8'];	
					$data['home1_banner_status'] =  $configure['h1_banner_status'];					
					$data['home1_big_img1'] =  'image/'.$configure['h1_big_img1'];		
					$data['home1_big_img2'] =  'image/'.$configure['h1_big_img2'];
					$data['home1_big_img3'] =  'image/'.$configure['h1_big_img3'];
					$data['home1_big_title'] =  $configure['h1_big_title'];
					$data['home1_big_desc'] =  $configure['h1_big_desc'];
					$data['home1_big_shop'] =  $configure['h1_big_shop'];
					$data['home1_big_shop_link'] =  $configure['h1_big_shop_link'];
					$data['home1_big_status'] =  $configure['h1_big_status'];
					$data['home1_testimonial'] =  html_entity_decode($configure['home1_testi'], ENT_QUOTES, 'UTF-8');
					$data['h1_choose_center1'] =  $configure['h1_choose_center1'];
					$data['h1_choose_center2'] =  $configure['h1_choose_center2'];
					$data['home1_choose_center3'] =  'image/'.$configure['h1_choose_center3'];
					$data['home1_choose_left_title1'] =  $configure['h1_choose_left_title1'];
					$data['home1_choose_left_desc1'] =  $configure['h1_choose_left_desc1'];
					$data['home1_choose_left_img1'] =  'image/'.$configure['h1_choose_left_img1'];
					$data['home1_choose_left_img2'] =  'image/'.$configure['h1_choose_left_img2'];
					$data['home1_choose_left_title2'] =  $configure['h1_choose_left_title2'];
					$data['home1_choose_left_desc2'] =  $configure['h1_choose_left_desc2'];
					$data['home1_choose_left_img3'] =  'image/'.$configure['h1_choose_left_img3'];
					$data['home1_choose_left_title3'] =  $configure['h1_choose_left_title3'];
					$data['home1_choose_left_desc3'] =  $configure['h1_choose_left_desc3'];
					$data['home1_choose_right_img1'] =  'image/'.$configure['h1_choose_right_img1'];
					$data['home1_choose_right_title1'] =  $configure['h1_choose_right_title1'];
					$data['home1_choose_right_desc1'] =  $configure['h1_choose_right_desc1'];
					$data['home1_choose_right_img2'] =  'image/'.$configure['h1_choose_right_img2'];
					$data['home1_choose_right_title2'] =  $configure['h1_choose_right_title2'];
					$data['home1_choose_right_desc2'] =  $configure['h1_choose_right_desc2'];
					$data['home1_choose_right_img3'] =  'image/'.$configure['h1_choose_right_img3'];
					$data['home1_choose_right_title3'] =  $configure['h1_choose_right_title3'];
					$data['home1_choose_right_desc3'] =  $configure['h1_choose_right_desc3'];
					
					$data['home2_banner_img1'] =  'image/'.$configure['h1_banner2_img1'];
					$data['home2_banner_img2'] =  'image/'.$configure['h1_banner2_img2'];
					$data['home2_banner_img3'] =  'image/'.$configure['h1_banner2_img3'];
					$data['home2_choose_img'] =  'image/'.$configure['h1_choose_us2_left_img1'];
					
					$data['home2_banner_status'] =  $configure['h1_banner2_status'];	
					$data['h1_choose_us2_text'] =  html_entity_decode($configure['h1_choose_us2_text'], ENT_QUOTES, 'UTF-8');
					$data['h1_choose_us2_status'] =  $configure['h1_choose_us2_status'];	
					$data['h1_choose_us2_title1'] =  $configure['h1_choose_us2_title1'];	
					$data['h1_choose_us2_title2'] =  $configure['h1_choose_us2_title2'];	
					//$data['home2_testimonial'] =  $configure['home2_testi'];	
					$data['home2_testimonial'] = html_entity_decode($configure['home2_testi'], ENT_QUOTES, 'UTF-8'); 
					$data['home2_special_img1'] =  'image/'.$configure['home2_big_img1'];
					$data['home2_special_img2'] =  'image/'.$configure['home2_big_img2'];
					$data['home3_category_img1'] =  'image/'.$configure['h1_cat3_img1'];
					$data['home3_category_img2'] =  'image/'.$configure['h1_cat3_img2'];
					$data['home3_category_img3'] =  'image/'.$configure['h1_cat3_img3'];
					$data['home3_banner_img1'] =  'image/'.$configure['home3_big_banner_img1'];
					$data['home3_banner_img2'] =  'image/'.$configure['home3_big_banner_img2'];
					
					$data['home2_big_title1'] = $configure['home2_big_title1'];
					$data['home2_big_title2'] = $configure['home2_big_title2'];
					$data['home2_big_title3'] = $configure['home2_big_title3'];
					$data['home2_big_shop_now'] = $configure['home2_big_shop_now'];
					$data['home2_big_shop_link'] = $configure['home2_big_shop_link'];
					$data['home2_testi_title'] = $configure['home2_testi_title'];
					$data['home2_big_offers_status'] = $configure['home2_big_offers_status'];
					$data['h1_choose_us3_status'] = $configure['h1_choose_us3_status'];
					$data['home3_cat_img_status'] = $configure['home3_cat_img_status'];
					$data['h1_cat3_title1'] = $configure['h1_cat3_title1'];
					$data['h1_cat3_title2'] = $configure['h1_cat3_title2'];
					$data['h1_cat3_title3'] = $configure['h1_cat3_title3'];
					$data['h1_cat3_link1'] = $configure['h1_cat3_link1'];
					$data['h1_cat3_link2'] = $configure['h1_cat3_link2'];
					$data['h1_cat3_link3'] = $configure['h1_cat3_link3'];
					$data['home3_big_banner_title'] = $configure['home3_big_banner_title'];
					$data['home3_big_banner_status'] = $configure['home3_big_banner_status'];
					$data['home2_valid_date'] = date('m/d/Y/g/i/s',strtotime( $configure['home2_valid_date']));
					$data['home1_valid_date'] = date('m/d/Y/g/i/s',strtotime($configure['home1_valid_date']));
					$data['home3_big_banner_title2'] = $configure['home3_big_banner_title2'];
					$data['home4_big_banner_status'] = $configure['home4_big_banner_status'];
					$data['h1_banner4_status'] = $configure['h1_banner4_status'];
					$data['home4_banner_title1'] = $configure['home4_banner_title1'];
					$data['home4_banner_title2'] = $configure['home4_banner_title2'];
					$data['home4_banner_title3'] = $configure['home4_banner_title3'];
					$data['home4_banner_title4'] = $configure['home4_banner_title4'];
					$data['home4_banner_title5'] = $configure['home4_banner_title5'];
					$data['home4_five_image1'] =  'image/'.$configure['home4_banner_img1'];
					$data['home4_five_image2'] =  'image/'.$configure['home4_banner_img2'];
					$data['home4_five_image3'] =  'image/'.$configure['home4_banner_img3'];
					$data['home4_five_image4'] =  'image/'.$configure['home4_banner_img4'];
					$data['home4_five_image5'] =  'image/'.$configure['home4_banner_img5'];
					$data['home4_banner_link1'] = $configure['home4_banner_link1'];
					$data['home4_banner_link2'] = $configure['home4_banner_link2'];
					$data['home4_banner_link3'] = $configure['home4_banner_link3'];
					$data['home4_banner_link4'] = $configure['home4_banner_link4'];
					$data['home4_banner_link5'] = $configure['home4_banner_link5'];
					//$data['home4_testi'] = $configure['home4_testi'];
					$data['home4_testi'] = html_entity_decode($configure['home4_testi'], ENT_QUOTES, 'UTF-8');
					$data['h1_banner_img1_link'] = $configure['h1_banner_img1_link'];
					$data['h1_banner_img2_link'] = $configure['h1_banner_img2_link'];
					$data['h1_banner_img3_link'] = $configure['h1_banner_img3_link'];
					$data['h1_banner_img4_link'] = $configure['h1_banner_img4_link'];
					$data['home1_banner1'] = 'image/'.$configure['home1_banner1'];
					$data['home1_banner2'] = 'image/'.$configure['home1_banner2'];
					$data['home1_banner3'] = 'image/'.$configure['home1_banner3'];
					$data['home1_banner4'] = 'image/'.$configure['home1_banner4'];
					$data['banner_title1'] = $configure['home1_banner_title1'];
					$data['banner_title2'] = $configure['home1_banner_title2'];
					$data['banner_title3'] = $configure['home1_banner_title3'];
					$data['banner_title4'] = $configure['home1_banner_title4'];
					$data['banner_title5'] = $configure['home1_banner_title5'];
					$data['banner_title6'] = $configure['home1_banner_title6'];
					$data['banner_title7'] = $configure['home1_banner_title7'];
					$data['banner_title8'] = $configure['home1_banner_title8'];
					$data['home1_banner_link1'] = $configure['home1_banner_link1'];
					$data['home1_banner_link2'] = $configure['home1_banner_link2'];
					$data['home1_banner_link3'] = $configure['home1_banner_link3'];
					$data['home1_banner_link4'] = $configure['home1_banner_link4'];
			
			
			  
			

         
        $data['blog'] = $this->url->link('extension/module/blog');
      

		$this->response->setOutput($this->load->view('common/home', $data));
	}
}
