<?php
class ControllerCustomFreshfoodconfig extends Controller{
	
	  public function index(){
		  
		  
        $this->language->load('custom/freshfoodconfig');
	
		$this->load->model('custom/freshfoodconfig');
	
		
		
		$this->load->model('catalog/product');
        
		$this->GetList();
                
    }
	
	public function GetList(){
		
		 if (isset($this->request->get['sort'])) {
			$sort = $this->request->get['sort'];
		} else {
			$sort = 'name';
		}

		if (isset($this->request->get['order'])) {
			$order = $this->request->get['order'];
		} else {
			$order = 'ASC';
		}

		if (isset($this->request->get['page'])) {
			$page = $this->request->get['page'];
		} else {
			$page = 1;
		}
		 if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}

		if (isset($this->session->data['success'])) {
			$data['success'] = $this->session->data['success'];

			unset($this->session->data['success']);
		} else {
			$data['success'] = '';
		}
		$url = '';

		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}

             if (isset($this->request->post['selected'])) {
			$data['selected'] = (array)$this->request->post['selected'];
		} else {
			$data['selected'] = array();
		}
        
             if (isset($this->request->post['text_confirm'])) {
			$data['text_confirm'] = (array)$this->request->post['text_confirm'];
		} else {
			$data['text_confirm'] = array();
		}
         
		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('custom/dashboard', 'user_token=' . $this->session->data['user_token'], 'SSL')
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('custom/freshfoodconfig', 'user_token=' . $this->session->data['user_token'] . $url, 'SSL')
		);
		
		
		
		
	
		$results=$this->model_custom_freshfoodconfig->getslider();
		
		foreach ($results as $result){
						
                  $action=array();
                  
                 $action[]=array(
                   'text' => $this->language->get('text_edit'),
                   'href' => $this->url->link('custom/freshfoodconfig/editslider', 'user_token=' . $this->session->data['user_token'] . '&id=' . $result['id'], 'SSL')
                  );
                    
                      $data['slider'][]=array(
                      'id'               => $result['id'],
                      'title1'           => $result['title1'],
                      'title2'           => $result['title2'],
                      'button1_text'     => $result['button1_text'],
                      's_image'          => $result['s_image'],
                      'action'           => $action
                  );   
              }
			  /*home3 slide*/
			  $res=$this->model_custom_freshfoodconfig->get_home3_slider();
		
		foreach ($res as $res3){
						
                  $action3=array();
                  
                 $action3[]=array(
                   'text' => $this->language->get('text_edit'),
                   'href' => $this->url->link('custom/freshfoodconfig/editslider_home3', 'user_token=' . $this->session->data['user_token'] . '&id=' . $res3['id'], 'SSL')
                  );
                    
                      $data['slider_3'][]=array(
                      'id'               => $res3['id'],
                      'title1'           => $res3['title1'],
                      'title2'           => $res3['title2'],
					  'image_slide3'          => $res3['image_slide3'],
                      'action3'           => $action3
                  );   
              }
			  /**/ 
			  
			  /*home4 slide*/
			  $res_4=$this->model_custom_freshfoodconfig->get_home4_slider();
		 
		foreach ($res_4 as $res4){
						
                $action4=array();
                  
                $action4[]=array(
                   'text' => $this->language->get('text_edit'),
                   'href' => $this->url->link('custom/freshfoodconfig/editslider_home4', 'user_token=' . $this->session->data['user_token'] . '&id=' . $res4['id'], 'SSL')
                  );
                    
                      $data['slider_4'][]=array(
                      'id'               => $res4['id'],
                      'title1'           => $res4['title1'],
                      'title2'           => $res4['title2'],
					  'image_slide4'          => $res4['image_slide4'],
                      'action4'           => $action4
                  );   
              }
			  /**/
			   
			  
			  if ($this->request->server['REQUEST_METHOD'] != 'POST') {
			$get_homepage=$this->model_custom_freshfoodconfig->gethomepage();
		}
		$data['selected_home']=$get_homepage['homepage'];
		$data['h1_big_title']=$get_homepage['h1_big_title'];
		$data['h1_big_desc']=$get_homepage['h1_big_desc'];
		$data['h1_big_shop']=$get_homepage['h1_big_shop'];
		$data['h1_big_shop_link']=$get_homepage['h1_big_shop_link'];
		$data['h1_big_status']=$get_homepage['h1_big_status'];
		$data['home1_testi']=$get_homepage['home1_testi'];
		$data['h1_choose_center1']=$get_homepage['h1_choose_center1'];
		$data['h1_choose_center2']=$get_homepage['h1_choose_center2'];
		$data['h1_choose_left_title1']=$get_homepage['h1_choose_left_title1'];
		$data['h1_choose_left_desc1']=$get_homepage['h1_choose_left_desc1'];
		$data['h1_choose_left_title2']=$get_homepage['h1_choose_left_title2'];
		$data['h1_choose_left_desc2']=$get_homepage['h1_choose_left_desc2'];
		$data['h1_choose_left_title3']=$get_homepage['h1_choose_left_title3'];
		$data['h1_choose_left_desc3']=$get_homepage['h1_choose_left_desc3'];
		$data['h1_choose_right_title1']=$get_homepage['h1_choose_right_title1'];
		$data['h1_choose_right_desc1']=$get_homepage['h1_choose_right_desc1'];
		$data['h1_choose_right_title2']=$get_homepage['h1_choose_right_title2'];
		$data['h1_choose_right_desc2']=$get_homepage['h1_choose_right_desc2'];
		$data['h1_choose_right_title3']=$get_homepage['h1_choose_right_title3'];
		$data['h1_choose_right_desc3']=$get_homepage['h1_choose_right_desc3'];
		
		$data['h1_banner_title1']=$get_homepage['h1_banner_title1'];
		$data['h1_banner_title2']=$get_homepage['h1_banner_title2'];
		$data['h1_banner_title3']=$get_homepage['h1_banner_title3'];
		$data['h1_banner_title4']=$get_homepage['h1_banner_title4'];
		$data['h1_banner_title5']=$get_homepage['h1_banner_title5'];
		$data['h1_banner_title6']=$get_homepage['h1_banner_title6'];
		$data['h1_banner_title7']=$get_homepage['h1_banner_title7'];
		$data['h1_banner_title8']=$get_homepage['h1_banner_title8'];
		$data['h1_banner_status']=$get_homepage['h1_banner_status'];
		
		$data['h1_banner2_status']=$get_homepage['h1_banner2_status'];
		$data['h1_choose_us2_status']=$get_homepage['h1_choose_us2_status'];
		$data['h1_choose_us2_title1']=$get_homepage['h1_choose_us2_title1'];
		$data['h1_choose_us2_title2']=$get_homepage['h1_choose_us2_title2'];
		
		$data['h1_choose_us2_text']=$get_homepage['h1_choose_us2_text'];
		$data['home2_testi']=$get_homepage['home2_testi'];
		$data['home2_big_title1']=$get_homepage['home2_big_title1'];
		$data['home2_big_title2']=$get_homepage['home2_big_title2'];
		$data['home2_big_title3']=$get_homepage['home2_big_title3'];
		$data['home2_big_shop_now']=$get_homepage['home2_big_shop_now'];
		$data['home2_big_shop_link']=$get_homepage['home2_big_shop_link'];
		$data['home2_testi_title']=$get_homepage['home2_testi_title'];
		$data['home2_big_offers_status']=$get_homepage['home2_big_offers_status'];
		$data['h1_choose_us3_status']=$get_homepage['h1_choose_us3_status'];
		$data['home3_cat_img_status']=$get_homepage['home3_cat_img_status'];
		$data['h1_cat3_title1']=$get_homepage['h1_cat3_title1'];
		$data['h1_cat3_title2']=$get_homepage['h1_cat3_title2'];
		$data['h1_cat3_title3']=$get_homepage['h1_cat3_title3'];
		$data['h1_cat3_link1']=$get_homepage['h1_cat3_link1'];
		$data['h1_cat3_link2']=$get_homepage['h1_cat3_link2'];
		$data['h1_cat3_link3']=$get_homepage['h1_cat3_link3'];
		$data['home3_big_banner_title']=$get_homepage['home3_big_banner_title'];
		$data['home3_big_banner_status']=$get_homepage['home3_big_banner_status'];
		$data['home4_big_banner_status']=$get_homepage['home4_big_banner_status'];
		$data['home2_valid_date']=$get_homepage['home2_valid_date'];
		$data['home1_valid_date']=$get_homepage['home1_valid_date'];
		$data['home3_big_banner_title2']=$get_homepage['home3_big_banner_title2'];
		$data['h1_banner4_status']=$get_homepage['h1_banner4_status'];
		$data['home4_banner_title1']=$get_homepage['home4_banner_title1'];
		$data['home4_banner_link1']=$get_homepage['home4_banner_link1'];
		$data['home4_banner_title2']=$get_homepage['home4_banner_title2'];
		$data['home4_banner_link2']=$get_homepage['home4_banner_link2'];
		$data['home4_banner_title3']=$get_homepage['home4_banner_title3'];
		$data['home4_banner_link3']=$get_homepage['home4_banner_link3'];
		$data['home4_banner_title4']=$get_homepage['home4_banner_title4'];
		$data['home4_banner_link4']=$get_homepage['home4_banner_link4'];
		$data['home4_banner_title5']=$get_homepage['home4_banner_title5'];
		$data['home4_banner_link5']=$get_homepage['home4_banner_link5'];
		$data['home4_testi']=$get_homepage['home4_testi'];
		$data['h1_banner_img1_link']=$get_homepage['h1_banner_img1_link'];
		$data['h1_banner_img2_link']=$get_homepage['h1_banner_img2_link'];
		$data['h1_banner_img3_link']=$get_homepage['h1_banner_img3_link'];
		$data['h1_banner_img4_link']=$get_homepage['h1_banner_img4_link'];
		$data['theme_color']=$get_homepage['theme_color'];
		$data['twitter_link']=$get_homepage['twitter_link'];
		$data['fb_link']=$get_homepage['fb_link'];
		$data['youtube_link']=$get_homepage['youtube_link'];
		$data['google_link']=$get_homepage['google_link'];
		$data['home1_banner_title1']=$get_homepage['home1_banner_title1'];
		$data['home1_banner_title2']=$get_homepage['home1_banner_title2'];
		$data['home1_banner_link1']=$get_homepage['home1_banner_link1'];
		$data['home1_banner_title3']=$get_homepage['home1_banner_title3'];
		$data['home1_banner_title4']=$get_homepage['home1_banner_title4'];
		$data['home1_banner_link2']=$get_homepage['home1_banner_link2'];
		$data['home1_banner_title5']=$get_homepage['home1_banner_title5'];
		$data['home1_banner_title6']=$get_homepage['home1_banner_title6'];
		$data['home1_banner_link3']=$get_homepage['home1_banner_link3'];
		$data['home1_banner_title7']=$get_homepage['home1_banner_title7'];
		$data['home1_banner_title8']=$get_homepage['home1_banner_title8'];
		$data['home1_banner_link4']=$get_homepage['home1_banner_link4'];
		$data['about_footer']=$get_homepage['about_footer'];
		  
		 
		$this->load->model('tool/image');
		
		/*home1 free banner only*/
		if (isset($this->request->post['home1_banner1'])) {

			$data['home1_banner1'] = $this->request->post['home1_banner1'];
	
		} elseif (!empty($get_homepage)) {

			$data['home1_banner1'] = $get_homepage['home1_banner1'];

			$data['home1_banner_view1'] = $get_homepage['home1_banner1'];
	
		} else {

			$data['home1_banner1'] = '';

		}
		
		
		$url = $get_homepage['home1_banner1'];

		$_SERVER['DOCUMENT_ROOT'];

		$parts = parse_url($url,PHP_URL_PATH);

		

		
		
		if (isset($this->request->post['home1_banner1']) && file_exists(DIR_IMAGE . $this->request->post['home1_banner1'])) {

			$data['home1_banner1'] = $this->request->post['home1_banner1'];
			
		} elseif (!empty($get_homepage) && $get_homepage['home1_banner1'] && file_exists(DIR_IMAGE .$get_homepage['home1_banner1'])) {

			$data['home1_banner_view1'] = $this->model_tool_image->resize($get_homepage['home1_banner1'], 100,100);

			$data['home1_banner1'] = $get_homepage['home1_banner1'];

		} else {

			$data['home1_banner_view1'] = $this->model_tool_image->resize('no_image.jpg', 50, 50);

		}
		
		
		/* end home1 free banner only*/
		
		/*home1 free banner second only*/
		 
		 if (isset($this->request->post['home1_banner2'])) {

			$data['home1_banner2'] = $this->request->post['home1_banner2'];
 
		} elseif (!empty($get_homepage)) {

			$data['home1_banner2'] = $get_homepage['home1_banner2'];

			$data['home1_banner_view2'] = $get_homepage['home1_banner2'];

		} else {

			$data['home1_banner2'] = '';

		}
	
		$url = $get_homepage['home1_banner2'];

		$_SERVER['DOCUMENT_ROOT'];

		$parts = parse_url($url,PHP_URL_PATH);
		
		if (isset($this->request->post['home1_banner2']) && file_exists(DIR_IMAGE . $this->request->post['home1_banner2'])) {

			$data['home1_banner2'] = $this->request->post['home1_banner2'];

		} elseif (!empty($get_homepage) && $get_homepage['home1_banner2'] && file_exists(DIR_IMAGE .$get_homepage['home1_banner2'])) {

			$data['home1_banner_view2'] = $this->model_tool_image->resize($get_homepage['home1_banner2'], 100,100);

			$data['home1_banner2'] = $get_homepage['home1_banner2'];

		} else {

			$data['home1_banner_view2'] = $this->model_tool_image->resize('no_image.jpg', 50, 50);

		}
		/* end home1 free banner only*/
		
		/*home1 free banner third only*/
		 
		 if (isset($this->request->post['home1_banner3'])) {

			$data['home1_banner3'] = $this->request->post['home1_banner3'];
 
		} elseif (!empty($get_homepage)) {

			$data['home1_banner3'] = $get_homepage['home1_banner3'];

			$data['home1_banner_view3'] = $get_homepage['home1_banner3'];

		} else {

			$data['home1_banner3'] = '';

		}
	
		$url = $get_homepage['home1_banner3'];

		$_SERVER['DOCUMENT_ROOT'];

		$parts = parse_url($url,PHP_URL_PATH);
		
		if (isset($this->request->post['home1_banner3']) && file_exists(DIR_IMAGE . $this->request->post['home1_banner3'])) {

			$data['home1_banner3'] = $this->request->post['home1_banner3'];

		} elseif (!empty($get_homepage) && $get_homepage['home1_banner3'] && file_exists(DIR_IMAGE .$get_homepage['home1_banner3'])) {

			$data['home1_banner_view3'] = $this->model_tool_image->resize($get_homepage['home1_banner3'], 100,100);

			$data['home1_banner3'] = $get_homepage['home1_banner3'];

		} else {

			$data['home1_banner_view3'] = $this->model_tool_image->resize('no_image.jpg', 50, 50);

		}
		
		/* end home1 free banner only*/
		/*home1 free banner four only*/
		 
		 if (isset($this->request->post['home1_banner4'])) {

			$data['home1_banner4'] = $this->request->post['home1_banner4'];
 
		} elseif (!empty($get_homepage)) {

			$data['home1_banner4'] = $get_homepage['home1_banner4'];

			$data['home1_banner_view4'] = $get_homepage['home1_banner4'];

		} else {

			$data['home1_banner4'] = '';

		}
	
		$url = $get_homepage['home1_banner4'];

		$_SERVER['DOCUMENT_ROOT'];

		$parts = parse_url($url,PHP_URL_PATH);
		
		if (isset($this->request->post['home1_banner4']) && file_exists(DIR_IMAGE . $this->request->post['home1_banner4'])) {

			$data['home1_banner4'] = $this->request->post['home1_banner4'];

		} elseif (!empty($get_homepage) && $get_homepage['home1_banner4'] && file_exists(DIR_IMAGE .$get_homepage['home1_banner4'])) {

			$data['home1_banner_view4'] = $this->model_tool_image->resize($get_homepage['home1_banner4'], 100,100);

			$data['home1_banner4'] = $get_homepage['home1_banner4'];

		} else {

			$data['home1_banner_view4'] = $this->model_tool_image->resize('no_image.jpg', 50, 50);

		}
		
		/* end home1 free banner only*/
		
		
		
		/* homepage1 big section start*/
		/* background image */
		if (isset($this->request->post['h1_big_img1'])) {

			$data['h1_big_img1'] = $this->request->post['h1_big_img1'];

		} elseif (!empty($get_homepage)) {

			$data['h1_big_img1'] = $get_homepage['h1_big_img1'];

			$data['home1_big_img1'] = $get_homepage['h1_big_img1'];

		} else {

			$data['h1_big_img1'] = '';

		}
		
		
		$url = $get_homepage['h1_big_img1'];

		$_SERVER['DOCUMENT_ROOT'];

		$parts = parse_url($url,PHP_URL_PATH);

		

		
		
		if (isset($this->request->post['h1_big_img1']) && file_exists(DIR_IMAGE . $this->request->post['h1_big_img1'])) {

			$data['h1_big_img1'] = $this->request->post['h1_big_img1'];

		} elseif (!empty($get_homepage) && $get_homepage['h1_big_img1'] && file_exists(DIR_IMAGE .$get_homepage['h1_big_img1'])) {

			$data['home1_big_img1'] = $this->model_tool_image->resize($get_homepage['h1_big_img1'], 100,100);

			$data['h1_big_img1'] = $get_homepage['h1_big_img1'];

		} else {

			$data['home1_big_img1'] = $this->model_tool_image->resize('no_image.jpg', 50, 50);

		}
		/*background image*/
		
		/*main image*/
		if (isset($this->request->post['h1_big_img2'])) {

			$data['h1_big_img2'] = $this->request->post['h1_big_img2'];

		} elseif (!empty($get_homepage)) {

			$data['h1_big_img2'] = $get_homepage['h1_big_img2'];

			$data['home1_big_img2'] = $get_homepage['h1_big_img2'];

		} else {

			$data['h1_big_img2'] = '';

		}
		
		
		$url = $get_homepage['h1_big_img2'];

		$_SERVER['DOCUMENT_ROOT'];

		$parts = parse_url($url,PHP_URL_PATH);

		

		
		
		if (isset($this->request->post['h1_big_img2']) && file_exists(DIR_IMAGE . $this->request->post['h1_big_img2'])) {

			$data['h1_big_img2'] = $this->request->post['h1_big_img2'];

		} elseif (!empty($get_homepage) && $get_homepage['h1_big_img2'] && file_exists(DIR_IMAGE .$get_homepage['h1_big_img2'])) {

			$data['home1_big_img2'] = $this->model_tool_image->resize($get_homepage['h1_big_img2'], 100,100);

			$data['h1_big_img2'] = $get_homepage['h1_big_img2'];

		} else {

			$data['home1_big_img2'] = $this->model_tool_image->resize('no_image.jpg', 50, 50);

		}
		
		/*main image*/
		
		/*icon image*/
		if (isset($this->request->post['h1_big_img3'])) {

			$data['h1_big_img3'] = $this->request->post['h1_big_img3'];

		} elseif (!empty($get_homepage)) {

			$data['h1_big_img3'] = $get_homepage['h1_big_img3'];

			$data['home1_big_img3'] = $get_homepage['h1_big_img3'];

		} else {

			$data['h1_big_img3'] = '';

		}
		
		
		$url = $get_homepage['h1_big_img3'];

		$_SERVER['DOCUMENT_ROOT'];

		$parts = parse_url($url,PHP_URL_PATH);

		

		
		
		if (isset($this->request->post['h1_big_img3']) && file_exists(DIR_IMAGE . $this->request->post['h1_big_img3'])) {

			$data['h1_big_img3'] = $this->request->post['h1_big_img3'];

		} elseif (!empty($get_homepage) && $get_homepage['h1_big_img3'] && file_exists(DIR_IMAGE .$get_homepage['h1_big_img3'])) {

			$data['home1_big_img3'] = $this->model_tool_image->resize($get_homepage['h1_big_img3'], 100,100);

			$data['h1_big_img3'] = $get_homepage['h1_big_img3'];

		} else {

			$data['home1_big_img3'] = $this->model_tool_image->resize('no_image.jpg', 50, 50);

		}
		/*icon image*/
		
		/*homepage1 big section end*/
		/*homepage1 choose section start*/
		if (isset($this->request->post['h1_choose_center3'])) {

			$data['h1_choose_center3'] = $this->request->post['h1_choose_center3'];

		} elseif (!empty($get_homepage)) {

			$data['h1_choose_center3'] = $get_homepage['h1_choose_center3'];

			$data['home1_choose_center3'] = $get_homepage['h1_choose_center3'];

		} else {

			$data['h1_choose_center3'] = '';

		}
		
		
		$url = $get_homepage['h1_choose_center3'];

		$_SERVER['DOCUMENT_ROOT'];

		$parts = parse_url($url,PHP_URL_PATH);

		

		
		
		if (isset($this->request->post['h1_choose_center3']) && file_exists(DIR_IMAGE . $this->request->post['h1_choose_center3'])) {

			$data['h1_choose_center3'] = $this->request->post['h1_choose_center3'];

		} elseif (!empty($get_homepage) && $get_homepage['h1_choose_center3'] && file_exists(DIR_IMAGE .$get_homepage['h1_choose_center3'])) {

			$data['home1_choose_center3'] = $this->model_tool_image->resize($get_homepage['h1_choose_center3'], 100,100);

			$data['h1_choose_center3'] = $get_homepage['h1_choose_center3'];

		} else {

			$data['home1_choose_center3'] = $this->model_tool_image->resize('no_image.jpg', 50, 50);

		}
		
		/*left section start*/
		/*first*/
		if (isset($this->request->post['h1_choose_left_img1'])) {

			$data['h1_choose_left_img1'] = $this->request->post['h1_choose_left_img1'];

		} elseif (!empty($get_homepage)) {

			$data['h1_choose_left_img1'] = $get_homepage['h1_choose_left_img1'];

			$data['home1_choose_left_img1'] = $get_homepage['h1_choose_left_img1'];

		} else {

			$data['h1_choose_left_img1'] = '';

		}
		
		
		$url = $get_homepage['h1_choose_left_img1'];

		$_SERVER['DOCUMENT_ROOT'];

		$parts = parse_url($url,PHP_URL_PATH);

		

		
		
		if (isset($this->request->post['h1_choose_left_img1']) && file_exists(DIR_IMAGE . $this->request->post['h1_choose_left_img1'])) {

			$data['h1_choose_left_img1'] = $this->request->post['h1_choose_left_img1'];

		} elseif (!empty($get_homepage) && $get_homepage['h1_choose_left_img1'] && file_exists(DIR_IMAGE .$get_homepage['h1_choose_left_img1'])) {

			$data['home1_choose_left_img1'] = $this->model_tool_image->resize($get_homepage['h1_choose_left_img1'], 100,100);

			$data['h1_choose_left_img1'] = $get_homepage['h1_choose_left_img1'];

		} else {

			$data['home1_choose_left_img1'] = $this->model_tool_image->resize('no_image.jpg', 50, 50);

		}

		/*first end*/
		/*second start*/
		
		if (isset($this->request->post['h1_choose_left_img2'])) {

			$data['h1_choose_left_img2'] = $this->request->post['h1_choose_left_img2'];

		} elseif (!empty($get_homepage)) {

			$data['h1_choose_left_img2'] = $get_homepage['h1_choose_left_img2'];

			$data['home1_choose_left_img2'] = $get_homepage['h1_choose_left_img2'];

		} else {

			$data['h1_choose_left_img2'] = '';

		}
		
		
		$url = $get_homepage['h1_choose_left_img2'];

		$_SERVER['DOCUMENT_ROOT'];

		$parts = parse_url($url,PHP_URL_PATH);

		

		
		
		if (isset($this->request->post['h1_choose_left_img2']) && file_exists(DIR_IMAGE . $this->request->post['h1_choose_left_img2'])) {

			$data['h1_choose_left_img2'] = $this->request->post['h1_choose_left_img2'];

		} elseif (!empty($get_homepage) && $get_homepage['h1_choose_left_img2'] && file_exists(DIR_IMAGE .$get_homepage['h1_choose_left_img2'])) {

			$data['home1_choose_left_img2'] = $this->model_tool_image->resize($get_homepage['h1_choose_left_img2'], 100,100);

			$data['h1_choose_left_img2'] = $get_homepage['h1_choose_left_img2'];

		} else {

			$data['home1_choose_left_img2'] = $this->model_tool_image->resize('no_image.jpg', 50, 50);

		}
		/*second end*/
		/*Third start*/
		if (isset($this->request->post['h1_choose_left_img3'])) {

			$data['h1_choose_left_img3'] = $this->request->post['h1_choose_left_img3'];

		} elseif (!empty($get_homepage)) {

			$data['h1_choose_left_img3'] = $get_homepage['h1_choose_left_img3'];

			$data['home1_choose_left_img3'] = $get_homepage['h1_choose_left_img3'];

		} else {

			$data['h1_choose_left_img3'] = '';

		}
		
		
		$url = $get_homepage['h1_choose_left_img3'];

		$_SERVER['DOCUMENT_ROOT'];

		$parts = parse_url($url,PHP_URL_PATH);

		

		
		
		if (isset($this->request->post['h1_choose_left_img3']) && file_exists(DIR_IMAGE . $this->request->post['h1_choose_left_img3'])) {

			$data['h1_choose_left_img3'] = $this->request->post['h1_choose_left_img3'];

		} elseif (!empty($get_homepage) && $get_homepage['h1_choose_left_img3'] && file_exists(DIR_IMAGE .$get_homepage['h1_choose_left_img3'])) {

			$data['home1_choose_left_img3'] = $this->model_tool_image->resize($get_homepage['h1_choose_left_img3'], 100,100);

			$data['h1_choose_left_img3'] = $get_homepage['h1_choose_left_img3'];

		} else {

			$data['home1_choose_left_img3'] = $this->model_tool_image->resize('no_image.jpg', 50, 50);

		}
		/*Third end*/
		 
		/*first start*/
		if (isset($this->request->post['h1_choose_right_img1'])) {

			$data['h1_choose_right_img1'] = $this->request->post['h1_choose_right_img1'];

		} elseif (!empty($get_homepage)) {

			$data['h1_choose_right_img1'] = $get_homepage['h1_choose_right_img1'];

			$data['home1_choose_right_img1'] = $get_homepage['h1_choose_right_img1'];

		} else {

			$data['h1_choose_right_img1'] = '';

		}
		
		
		$url = $get_homepage['h1_choose_right_img1'];

		$_SERVER['DOCUMENT_ROOT'];

		$parts = parse_url($url,PHP_URL_PATH);

		

		
		
		if (isset($this->request->post['h1_choose_right_img1']) && file_exists(DIR_IMAGE . $this->request->post['h1_choose_right_img1'])) {

			$data['h1_choose_right_img1'] = $this->request->post['h1_choose_right_img1'];

		} elseif (!empty($get_homepage) && $get_homepage['h1_choose_right_img1'] && file_exists(DIR_IMAGE .$get_homepage['h1_choose_right_img1'])) {

			$data['home1_choose_right_img1'] = $this->model_tool_image->resize($get_homepage['h1_choose_right_img1'], 100,100);

			$data['h1_choose_right_img1'] = $get_homepage['h1_choose_right_img1'];

		} else {

			$data['home1_choose_right_img1'] = $this->model_tool_image->resize('no_image.jpg', 50, 50);

		}
		/*first end*/
		/*second start*/
		if (isset($this->request->post['h1_choose_right_img2'])) {

			$data['h1_choose_right_img2'] = $this->request->post['h1_choose_right_img2'];

		} elseif (!empty($get_homepage)) {

			$data['h1_choose_right_img2'] = $get_homepage['h1_choose_right_img2'];

			$data['home1_choose_right_img2'] = $get_homepage['h1_choose_right_img2'];

		} else {

			$data['h1_choose_right_img2'] = '';

		}
		
		
		$url = $get_homepage['h1_choose_right_img2'];

		$_SERVER['DOCUMENT_ROOT'];

		$parts = parse_url($url,PHP_URL_PATH);

		

		
		
		if (isset($this->request->post['h1_choose_right_img2']) && file_exists(DIR_IMAGE . $this->request->post['h1_choose_right_img2'])) {

			$data['h1_choose_right_img2'] = $this->request->post['h1_choose_right_img2'];

		} elseif (!empty($get_homepage) && $get_homepage['h1_choose_right_img2'] && file_exists(DIR_IMAGE .$get_homepage['h1_choose_right_img2'])) {

			$data['home1_choose_right_img2'] = $this->model_tool_image->resize($get_homepage['h1_choose_right_img2'], 100,100);

			$data['h1_choose_right_img2'] = $get_homepage['h1_choose_right_img2'];

		} else {

			$data['home1_choose_right_img2'] = $this->model_tool_image->resize('no_image.jpg', 50, 50);

		}
		/*second end*/
		/*third start*/
		if (isset($this->request->post['h1_choose_right_img3'])) {

			$data['h1_choose_right_img3'] = $this->request->post['h1_choose_right_img3'];

		} elseif (!empty($get_homepage)) {

			$data['h1_choose_right_img3'] = $get_homepage['h1_choose_right_img3'];

			$data['home1_choose_right_img3'] = $get_homepage['h1_choose_right_img3'];

		} else {

			$data['h1_choose_right_img3'] = '';

		}
		
		
		$url = $get_homepage['h1_choose_right_img3'];

		$_SERVER['DOCUMENT_ROOT'];

		$parts = parse_url($url,PHP_URL_PATH);

		

		
		
		if (isset($this->request->post['h1_choose_right_img3']) && file_exists(DIR_IMAGE . $this->request->post['h1_choose_right_img3'])) {

			$data['h1_choose_right_img3'] = $this->request->post['h1_choose_right_img3'];

		} elseif (!empty($get_homepage) && $get_homepage['h1_choose_right_img3'] && file_exists(DIR_IMAGE .$get_homepage['h1_choose_right_img3'])) {

			$data['home1_choose_right_img3'] = $this->model_tool_image->resize($get_homepage['h1_choose_right_img3'], 100,100);

			$data['h1_choose_right_img3'] = $get_homepage['h1_choose_right_img3'];

		} else {

			$data['home1_choose_right_img3'] = $this->model_tool_image->resize('no_image.jpg', 50, 50);

		}
		/*third end*/
		/*right section end*/
		
		
	 
		/*homepage1 Banner section start*/
			/*first start*/
		if (isset($this->request->post['h1_banner_img1'])) {

			$data['h1_banner_img1'] = $this->request->post['h1_banner_img1'];

		} elseif (!empty($get_homepage)) {

			$data['h1_banner_img1'] = $get_homepage['h1_banner_img1'];

			$data['home1_banner_img1'] = $get_homepage['h1_banner_img1'];

		} else {

			$data['h1_banner_img1'] = '';

		}
		
		
		$url = $get_homepage['h1_banner_img1'];

		$_SERVER['DOCUMENT_ROOT'];

		$parts = parse_url($url,PHP_URL_PATH);

		

		
		
		if (isset($this->request->post['h1_banner_img1']) && file_exists(DIR_IMAGE . $this->request->post['h1_banner_img1'])) {

			$data['h1_banner_img1'] = $this->request->post['h1_banner_img1'];

		} elseif (!empty($get_homepage) && $get_homepage['h1_banner_img1'] && file_exists(DIR_IMAGE .$get_homepage['h1_banner_img1'])) {

			$data['home1_banner_img1'] = $this->model_tool_image->resize($get_homepage['h1_banner_img1'], 100,100);

			$data['h1_banner_img1'] = $get_homepage['h1_banner_img1'];

		} else {

			$data['home1_banner_img1'] = $this->model_tool_image->resize('no_image.jpg', 50, 50);

		}	
			
			/*first end*/
			/*second start*/
		if (isset($this->request->post['h1_banner_img2'])) {

			$data['h1_banner_img2'] = $this->request->post['h1_banner_img2'];

		} elseif (!empty($get_homepage)) {

			$data['h1_banner_img2'] = $get_homepage['h1_banner_img2'];

			$data['home1_banner_img2'] = $get_homepage['h1_banner_img2'];

		} else {

			$data['h1_banner_img2'] = '';

		}
		
		
		$url = $get_homepage['h1_banner_img2'];

		$_SERVER['DOCUMENT_ROOT'];

		$parts = parse_url($url,PHP_URL_PATH);

		

		
		
		if (isset($this->request->post['h1_banner_img2']) && file_exists(DIR_IMAGE . $this->request->post['h1_banner_img2'])) {

			$data['h1_banner_img2'] = $this->request->post['h1_banner_img2'];

		} elseif (!empty($get_homepage) && $get_homepage['h1_banner_img2'] && file_exists(DIR_IMAGE .$get_homepage['h1_banner_img2'])) {

			$data['home1_banner_img2'] = $this->model_tool_image->resize($get_homepage['h1_banner_img2'], 100,100);

			$data['h1_banner_img2'] = $get_homepage['h1_banner_img2'];

		} else {

			$data['home1_banner_img2'] = $this->model_tool_image->resize('no_image.jpg', 50, 50);

		}	
			
			/*second end*/
			/*Third start*/
		if (isset($this->request->post['h1_banner_img3'])) {

			$data['h1_banner_img3'] = $this->request->post['h1_banner_img3'];

		} elseif (!empty($get_homepage)) {

			$data['h1_banner_img3'] = $get_homepage['h1_banner_img3'];

			$data['home1_banner_img3'] = $get_homepage['h1_banner_img3'];

		} else {

			$data['h1_banner_img3'] = '';

		}
		
		
		$url = $get_homepage['h1_banner_img3'];

		$_SERVER['DOCUMENT_ROOT'];

		$parts = parse_url($url,PHP_URL_PATH);

		

		
		
		if (isset($this->request->post['h1_banner_img3']) && file_exists(DIR_IMAGE . $this->request->post['h1_banner_img3'])) {

			$data['h1_banner_img3'] = $this->request->post['h1_banner_img3'];

		} elseif (!empty($get_homepage) && $get_homepage['h1_banner_img3'] && file_exists(DIR_IMAGE .$get_homepage['h1_banner_img3'])) {

			$data['home1_banner_img3'] = $this->model_tool_image->resize($get_homepage['h1_banner_img3'], 100,100);

			$data['h1_banner_img3'] = $get_homepage['h1_banner_img3'];

		} else {

			$data['home1_banner_img3'] = $this->model_tool_image->resize('no_image.jpg', 50, 50);

		}	
				
			/*Third end*/
			/*Fourth start*/
		if (isset($this->request->post['h1_banner_img4'])) {

			$data['h1_banner_img4'] = $this->request->post['h1_banner_img4'];

		} elseif (!empty($get_homepage)) {

			$data['h1_banner_img4'] = $get_homepage['h1_banner_img4'];

			$data['home1_banner_img4'] = $get_homepage['h1_banner_img4'];

		} else {

			$data['h1_banner_img4'] = '';

		}
		
		
		$url = $get_homepage['h1_banner_img4'];

		$_SERVER['DOCUMENT_ROOT'];

		$parts = parse_url($url,PHP_URL_PATH);

		

		
		
		if (isset($this->request->post['h1_banner_img4']) && file_exists(DIR_IMAGE . $this->request->post['h1_banner_img4'])) {

			$data['h1_banner_img4'] = $this->request->post['h1_banner_img4'];

		} elseif (!empty($get_homepage) && $get_homepage['h1_banner_img4'] && file_exists(DIR_IMAGE .$get_homepage['h1_banner_img4'])) {

			$data['home1_banner_img4'] = $this->model_tool_image->resize($get_homepage['h1_banner_img4'], 100,100);

			$data['h1_banner_img4'] = $get_homepage['h1_banner_img4'];

		} else {

			$data['home1_banner_img4'] = $this->model_tool_image->resize('no_image.jpg', 50, 50);

		}
			/*Fourth end*/
		/*homepage1 Banner section end*/
		
		/*home2 banner start*/              
		if (isset($this->request->post['h1_banner2_img1'])) {

			$data['h1_banner2_img1'] = $this->request->post['h1_banner2_img1'];

		} elseif (!empty($get_homepage)) {

			$data['h1_banner2_img1'] = $get_homepage['h1_banner2_img1'];

			$data['home2_banner_img1'] = $get_homepage['h1_banner2_img1'];

		} else {

			$data['h1_banner2_img1'] = '';

		}
		
		
		$url = $get_homepage['h1_banner2_img1'];

		$_SERVER['DOCUMENT_ROOT'];

		$parts = parse_url($url,PHP_URL_PATH);

		

		
		
		if (isset($this->request->post['h1_banner2_img1']) && file_exists(DIR_IMAGE . $this->request->post['h1_banner2_img1'])) {

			$data['h1_banner2_img1'] = $this->request->post['h1_banner2_img1'];

		} elseif (!empty($get_homepage) && $get_homepage['h1_banner2_img1'] && file_exists(DIR_IMAGE .$get_homepage['h1_banner2_img1'])) {

			$data['home2_banner_img1'] = $this->model_tool_image->resize($get_homepage['h1_banner2_img1'], 100,100);

			$data['h1_banner2_img1'] = $get_homepage['h1_banner2_img1'];

		} else {

			$data['home2_banner_img1'] = $this->model_tool_image->resize('no_image.jpg', 50, 50);

		}
		 
		 /**/
		 
		            
		if (isset($this->request->post['h1_banner2_img2'])) {

			$data['h1_banner2_img2'] = $this->request->post['h1_banner2_img2'];

		} elseif (!empty($get_homepage)) {

			$data['h1_banner2_img2'] = $get_homepage['h1_banner2_img2'];

			$data['home2_banner_img2'] = $get_homepage['h1_banner2_img2'];

		} else {

			$data['h1_banner2_img2'] = '';

		}
		
		
		$url = $get_homepage['h1_banner2_img2'];

		$_SERVER['DOCUMENT_ROOT'];

		$parts = parse_url($url,PHP_URL_PATH);

		

		
		
		if (isset($this->request->post['h1_banner2_img2']) && file_exists(DIR_IMAGE . $this->request->post['h1_banner2_img2'])) {

			$data['h1_banner2_img2'] = $this->request->post['h1_banner2_img2'];

		} elseif (!empty($get_homepage) && $get_homepage['h1_banner2_img2'] && file_exists(DIR_IMAGE .$get_homepage['h1_banner2_img2'])) {

			$data['home2_banner_img2'] = $this->model_tool_image->resize($get_homepage['h1_banner2_img2'], 100,100);

			$data['h1_banner2_img2'] = $get_homepage['h1_banner2_img2'];

		} else {

			$data['home2_banner_img2'] = $this->model_tool_image->resize('no_image.jpg', 50, 50);

		}
		 
		 /**/
		 /**/
		 
		            
		if (isset($this->request->post['h1_banner2_img3'])) {

			$data['h1_banner2_img3'] = $this->request->post['h1_banner2_img3'];

		} elseif (!empty($get_homepage)) {

			$data['h1_banner2_img3'] = $get_homepage['h1_banner2_img3'];

			$data['home2_banner_img3'] = $get_homepage['h1_banner2_img3'];

		} else {

			$data['h1_banner2_img3'] = '';

		}
		
		
		$url = $get_homepage['h1_banner2_img3'];

		$_SERVER['DOCUMENT_ROOT'];

		$parts = parse_url($url,PHP_URL_PATH);

		

		
		
		if (isset($this->request->post['h1_banner2_img3']) && file_exists(DIR_IMAGE . $this->request->post['h1_banner2_img3'])) {

			$data['h1_banner2_img3'] = $this->request->post['h1_banner2_img3'];

		} elseif (!empty($get_homepage) && $get_homepage['h1_banner2_img3'] && file_exists(DIR_IMAGE .$get_homepage['h1_banner2_img3'])) {

			$data['home2_banner_img3'] = $this->model_tool_image->resize($get_homepage['h1_banner2_img3'], 100,100);

			$data['h1_banner2_img3'] = $get_homepage['h1_banner2_img3'];

		} else {

			$data['home2_banner_img3'] = $this->model_tool_image->resize('no_image.jpg', 50, 50);

		}
		 
		 /**/
		 
		/*end home2 banner*/
 
		/*home2 choose-us*/
		     
		if (isset($this->request->post['h1_choose_us2_left_img1'])) {

			$data['h1_choose_us2_left_img1'] = $this->request->post['h1_choose_us2_left_img1'];

		} elseif (!empty($get_homepage)) {

			$data['h1_choose_us2_left_img1'] = $get_homepage['h1_choose_us2_left_img1'];

			$data['home2_choose_img'] = $get_homepage['h1_choose_us2_left_img1'];

		} else {

			$data['h1_choose_us2_left_img1'] = '';

		}
		
		
		$url = $get_homepage['h1_choose_us2_left_img1'];

		$_SERVER['DOCUMENT_ROOT'];

		$parts = parse_url($url,PHP_URL_PATH);

		

		
		
		if (isset($this->request->post['h1_choose_us2_left_img1']) && file_exists(DIR_IMAGE . $this->request->post['h1_choose_us2_left_img1'])) {

			$data['h1_choose_us2_left_img1'] = $this->request->post['h1_choose_us2_left_img1'];

		} elseif (!empty($get_homepage) && $get_homepage['h1_choose_us2_left_img1'] && file_exists(DIR_IMAGE .$get_homepage['h1_choose_us2_left_img1'])) {

			$data['home2_choose_img'] = $this->model_tool_image->resize($get_homepage['h1_choose_us2_left_img1'], 100,100);

			$data['h1_choose_us2_left_img1'] = $get_homepage['h1_choose_us2_left_img1'];

		} else {

			$data['home2_choose_img'] = $this->model_tool_image->resize('no_image.jpg', 50, 50);

		}
		 
		 
		/*end home2 choose-us*/
		
		
		
		/*home2 special offers start*/              
		if (isset($this->request->post['home2_big_img1'])) {

			$data['home2_big_img1'] = $this->request->post['home2_big_img1'];

		} elseif (!empty($get_homepage)) {

			$data['home2_big_img1'] = $get_homepage['home2_big_img1'];

			$data['home2_special_img1'] = $get_homepage['home2_big_img1'];

		} else {

			$data['home2_big_img1'] = '';

		}
		
		
		$url = $get_homepage['home2_big_img1'];

		$_SERVER['DOCUMENT_ROOT'];

		$parts = parse_url($url,PHP_URL_PATH);

		

		
		
		if (isset($this->request->post['home2_big_img1']) && file_exists(DIR_IMAGE . $this->request->post['home2_big_img1'])) {

			$data['home2_big_img1'] = $this->request->post['home2_big_img1'];

		} elseif (!empty($get_homepage) && $get_homepage['home2_big_img1'] && file_exists(DIR_IMAGE .$get_homepage['home2_big_img1'])) {

			$data['home2_special_img1'] = $this->model_tool_image->resize($get_homepage['home2_big_img1'], 100,100);

			$data['home2_big_img1'] = $get_homepage['home2_big_img1'];

		} else {

			$data['home2_special_img1'] = $this->model_tool_image->resize('no_image.jpg', 50, 50);

		}
		 
		 /*home3 category image*/
		
		if (isset($this->request->post['h1_cat3_img1'])) {

			$data['h1_cat3_img1'] = $this->request->post['h1_cat3_img1'];

		} elseif (!empty($get_homepage)) {

			$data['h1_cat3_img1'] = $get_homepage['h1_cat3_img1'];

			$data['home3_category_img1'] = $get_homepage['h1_cat3_img1'];

		} else {

			$data['h1_cat3_img1'] = '';

		}
		
		
		$url = $get_homepage['h1_cat3_img1'];

		$_SERVER['DOCUMENT_ROOT'];

		$parts = parse_url($url,PHP_URL_PATH);

		
		if (isset($this->request->post['h1_cat3_img1']) && file_exists(DIR_IMAGE . $this->request->post['h1_cat3_img1'])) {

			$data['h1_cat3_img1'] = $this->request->post['h1_cat3_img1'];

		} elseif (!empty($get_homepage) && $get_homepage['h1_cat3_img1'] && file_exists(DIR_IMAGE .$get_homepage['h1_cat3_img1'])) {

			$data['home3_category_img1'] = $this->model_tool_image->resize($get_homepage['h1_cat3_img1'], 100,100);

			$data['h1_cat3_img1'] = $get_homepage['h1_cat3_img1'];

		} else {

			$data['home3_category_img1'] = $this->model_tool_image->resize('no_image.jpg', 50, 50);

		}
		
		
		if (isset($this->request->post['home2_big_img2'])) {

			$data['home2_big_img2'] = $this->request->post['home2_big_img2'];

		} elseif (!empty($get_homepage)) {

			$data['home2_big_img2'] = $get_homepage['home2_big_img2'];

			$data['home2_special_img2'] = $get_homepage['home2_big_img2'];

		} else {

			$data['home2_big_img2'] = '';

		}
		
		
		$url = $get_homepage['home2_big_img2'];

		$_SERVER['DOCUMENT_ROOT'];

		$parts = parse_url($url,PHP_URL_PATH);

		
		if (isset($this->request->post['home2_big_img2']) && file_exists(DIR_IMAGE . $this->request->post['home2_big_img2'])) {

			$data['home2_big_img2'] = $this->request->post['home2_big_img2'];

		} elseif (!empty($get_homepage) && $get_homepage['home2_big_img2'] && file_exists(DIR_IMAGE .$get_homepage['home2_big_img2'])) {

			$data['home2_special_img2'] = $this->model_tool_image->resize($get_homepage['home2_big_img2'], 100,100);

			$data['home2_big_img2'] = $get_homepage['home2_big_img2'];

		} else {

			$data['home2_special_img2'] = $this->model_tool_image->resize('no_image.jpg', 50, 50);

		}
		
		/*home3 category img2*/
		
		       
		if (isset($this->request->post['h1_cat3_img2'])) {

			$data['h1_cat3_img2'] = $this->request->post['h1_cat3_img2'];

		} elseif (!empty($get_homepage)) {

			$data['h1_cat3_img2'] = $get_homepage['h1_cat3_img2'];

			$data['home3_category_img2'] = $get_homepage['h1_cat3_img2'];

		} else {

			$data['h1_cat3_img2'] = '';

		}
		
		
		$url = $get_homepage['h1_cat3_img2'];

		$_SERVER['DOCUMENT_ROOT'];

		$parts = parse_url($url,PHP_URL_PATH);

		

		
		
		if (isset($this->request->post['h1_cat3_img2']) && file_exists(DIR_IMAGE . $this->request->post['h1_cat3_img2'])) {

			$data['h1_cat3_img2'] = $this->request->post['h1_cat3_img2'];

		} elseif (!empty($get_homepage) && $get_homepage['h1_cat3_img2'] && file_exists(DIR_IMAGE .$get_homepage['h1_cat3_img2'])) {

			$data['home3_category_img2'] = $this->model_tool_image->resize($get_homepage['h1_cat3_img2'], 100,100);

			$data['h1_cat3_img2'] = $get_homepage['h1_cat3_img2'];

		} else {

			$data['home3_category_img2'] = $this->model_tool_image->resize('no_image.jpg', 50, 50);

		}
		/**/
		
		
		
		/*home3 category img3*/
		
		       
		if (isset($this->request->post['h1_cat3_img3'])) {

			$data['h1_cat3_img3'] = $this->request->post['h1_cat3_img3'];

		} elseif (!empty($get_homepage)) {

			$data['h1_cat3_img3'] = $get_homepage['h1_cat3_img3'];

			$data['home3_category_img3'] = $get_homepage['h1_cat3_img3'];

		} else {

			$data['h1_cat3_img3'] = '';

		}
		
		
		$url = $get_homepage['h1_cat3_img3'];

		$_SERVER['DOCUMENT_ROOT'];

		$parts = parse_url($url,PHP_URL_PATH);

		

		
		
		if (isset($this->request->post['h1_cat3_img3']) && file_exists(DIR_IMAGE . $this->request->post['h1_cat3_img3'])) {

			$data['h1_cat3_img3'] = $this->request->post['h1_cat3_img3'];

		} elseif (!empty($get_homepage) && $get_homepage['h1_cat3_img3'] && file_exists(DIR_IMAGE .$get_homepage['h1_cat3_img3'])) {

			$data['home3_category_img3'] = $this->model_tool_image->resize($get_homepage['h1_cat3_img3'], 100,100);

			$data['h1_cat3_img3'] = $get_homepage['h1_cat3_img3'];

		} else {

			$data['home3_category_img3'] = $this->model_tool_image->resize('no_image.jpg', 50, 50);

		}
		/**/ 
		
		/*home3 big banner*/ 
		     
		if (isset($this->request->post['home3_big_banner_img1'])) {

			$data['home3_big_banner_img1'] = $this->request->post['home3_big_banner_img1'];

		} elseif (!empty($get_homepage)) {

			$data['home3_big_banner_img1'] = $get_homepage['home3_big_banner_img1'];

			$data['home3_banner_img1'] = $get_homepage['home3_big_banner_img1'];

		} else {

			$data['home3_big_banner_img1'] = '';

		}
		
		
		$url = $get_homepage['home3_big_banner_img1'];

		$_SERVER['DOCUMENT_ROOT'];

		$parts = parse_url($url,PHP_URL_PATH);

		

		
		
		if (isset($this->request->post['home3_big_banner_img1']) && file_exists(DIR_IMAGE . $this->request->post['home3_big_banner_img1'])) {

			$data['home3_big_banner_img1'] = $this->request->post['home3_big_banner_img1'];

		} elseif (!empty($get_homepage) && $get_homepage['home3_big_banner_img1'] && file_exists(DIR_IMAGE .$get_homepage['home3_big_banner_img1'])) {

			$data['home3_banner_img1'] = $this->model_tool_image->resize($get_homepage['home3_big_banner_img1'], 100,100);

			$data['home3_big_banner_img1'] = $get_homepage['home3_big_banner_img1'];

		} else {

			$data['home3_banner_img1'] = $this->model_tool_image->resize('no_image.jpg', 50, 50);

		}
		 
		 /*two image*/
		 if (isset($this->request->post['home3_big_banner_img2'])) {

			$data['home3_big_banner_img2'] = $this->request->post['home3_big_banner_img2'];

		} elseif (!empty($get_homepage)) {

			$data['home3_big_banner_img2'] = $get_homepage['home3_big_banner_img2'];

			$data['home3_banner_img2'] = $get_homepage['home3_big_banner_img2'];

		} else {

			$data['home3_big_banner_img2'] = '';

		}
		
		
		$url = $get_homepage['home3_big_banner_img2'];

		$_SERVER['DOCUMENT_ROOT'];

		$parts = parse_url($url,PHP_URL_PATH);

		

		
		
		if (isset($this->request->post['home3_big_banner_img2']) && file_exists(DIR_IMAGE . $this->request->post['home3_big_banner_img2'])) {

			$data['home3_big_banner_img2'] = $this->request->post['home3_big_banner_img2'];

		} elseif (!empty($get_homepage) && $get_homepage['home3_big_banner_img2'] && file_exists(DIR_IMAGE .$get_homepage['home3_big_banner_img2'])) {

			$data['home3_banner_img2'] = $this->model_tool_image->resize($get_homepage['home3_big_banner_img2'], 100,100);

			$data['home3_big_banner_img2'] = $get_homepage['home3_big_banner_img2'];

		} else {

			$data['home3_banner_img2'] = $this->model_tool_image->resize('no_image.jpg', 50, 50);

		}
		 	 
		/*end home3 big-banner*/
		/*homepage 4 image banner five*/
		/*first inner image*/
		 if (isset($this->request->post['home4_banner_img1'])) {
			$data['home4_banner_img1'] = $this->request->post['home4_banner_img1'];
		} elseif (!empty($get_homepage)) {
			$data['home4_banner_img1'] = $get_homepage['home4_banner_img1'];
			$data['home4_five_image1'] = $get_homepage['home4_banner_img1'];
		} else {
			$data['home4_banner_img1'] = '';
		}
		
		$url = $get_homepage['home4_banner_img1'];
		$_SERVER['DOCUMENT_ROOT'];
		$parts = parse_url($url,PHP_URL_PATH);

		if (isset($this->request->post['home4_banner_img1']) && file_exists(DIR_IMAGE . $this->request->post['home4_banner_img1'])) {
			$data['home4_banner_img1'] = $this->request->post['home4_banner_img1'];
		} elseif (!empty($get_homepage) && $get_homepage['home4_banner_img1'] && file_exists(DIR_IMAGE .$get_homepage['home4_banner_img1'])) {
			$data['home4_five_image1'] = $this->model_tool_image->resize($get_homepage['home4_banner_img1'], 100,100);
			$data['home4_banner_img1'] = $get_homepage['home4_banner_img1'];

		} else {
			$data['home4_five_image1'] = $this->model_tool_image->resize('no_image.jpg', 50, 50);
		}
		 	
		/*end first inner image*/
		/*second inner image*/
		 if (isset($this->request->post['home4_banner_img2'])) {
			$data['home4_banner_img2'] = $this->request->post['home4_banner_img2'];
		} elseif (!empty($get_homepage)) {
			$data['home4_banner_img2'] = $get_homepage['home4_banner_img2'];
			$data['home4_five_image2'] = $get_homepage['home4_banner_img2'];
		} else {
			$data['home4_banner_img2'] = '';
		}
		
		$url = $get_homepage['home4_banner_img2'];
		$_SERVER['DOCUMENT_ROOT'];
		$parts = parse_url($url,PHP_URL_PATH);

		if (isset($this->request->post['home4_banner_img2']) && file_exists(DIR_IMAGE . $this->request->post['home4_banner_img2'])) {
			$data['home4_banner_img2'] = $this->request->post['home4_banner_img2'];
		} elseif (!empty($get_homepage) && $get_homepage['home4_banner_img2'] && file_exists(DIR_IMAGE .$get_homepage['home4_banner_img2'])) {
			$data['home4_five_image2'] = $this->model_tool_image->resize($get_homepage['home4_banner_img2'], 100,100);
			$data['home4_banner_img2'] = $get_homepage['home4_banner_img2'];

		} else {
			$data['home4_five_image2'] = $this->model_tool_image->resize('no_image.jpg', 50, 50);
		}
		 	
		/*end second inner image*/
		/*third inner image*/
		 if (isset($this->request->post['home4_banner_img3'])) {
			$data['home4_banner_img3'] = $this->request->post['home4_banner_img3'];
		} elseif (!empty($get_homepage)) {
			$data['home4_banner_img3'] = $get_homepage['home4_banner_img3'];
			$data['home4_five_image3'] = $get_homepage['home4_banner_img3'];
		} else {
			$data['home4_banner_img3'] = '';
		}
		
		$url = $get_homepage['home4_banner_img3'];
		$_SERVER['DOCUMENT_ROOT'];
		$parts = parse_url($url,PHP_URL_PATH);

		if (isset($this->request->post['home4_banner_img3']) && file_exists(DIR_IMAGE . $this->request->post['home4_banner_img3'])) {
			$data['home4_banner_img3'] = $this->request->post['home4_banner_img3'];
		} elseif (!empty($get_homepage) && $get_homepage['home4_banner_img3'] && file_exists(DIR_IMAGE .$get_homepage['home4_banner_img3'])) {
			$data['home4_five_image3'] = $this->model_tool_image->resize($get_homepage['home4_banner_img3'], 100,100);
			$data['home4_banner_img3'] = $get_homepage['home4_banner_img3'];

		} else {
			$data['home4_five_image3'] = $this->model_tool_image->resize('no_image.jpg', 50, 50);
		}
		 	
		/*end third inner image*/
		/*fourth inner image*/
		 if (isset($this->request->post['home4_banner_img4'])) {
			$data['home4_banner_img4'] = $this->request->post['home4_banner_img4'];
		} elseif (!empty($get_homepage)) {
			$data['home4_banner_img4'] = $get_homepage['home4_banner_img4'];
			$data['home4_five_image4'] = $get_homepage['home4_banner_img4'];
		} else {
			$data['home4_banner_img4'] = '';
		}
		
		$url = $get_homepage['home4_banner_img4'];
		$_SERVER['DOCUMENT_ROOT'];
		$parts = parse_url($url,PHP_URL_PATH);

		if (isset($this->request->post['home4_banner_img4']) && file_exists(DIR_IMAGE . $this->request->post['home4_banner_img4'])) {
			$data['home4_banner_img4'] = $this->request->post['home4_banner_img4'];
		} elseif (!empty($get_homepage) && $get_homepage['home4_banner_img4'] && file_exists(DIR_IMAGE .$get_homepage['home4_banner_img4'])) {
			$data['home4_five_image4'] = $this->model_tool_image->resize($get_homepage['home4_banner_img4'], 100,100);
			$data['home4_banner_img4'] = $get_homepage['home4_banner_img4'];

		} else {
			$data['home4_five_image4'] = $this->model_tool_image->resize('no_image.jpg', 50, 50);
		}
		 	
		/*end fourth inner image*/
		/*five inner image*/
		 if (isset($this->request->post['home4_banner_img5'])) {
			$data['home4_banner_img5'] = $this->request->post['home4_banner_img5'];
		} elseif (!empty($get_homepage)) {
			$data['home4_banner_img5'] = $get_homepage['home4_banner_img5'];
			$data['home4_five_image5'] = $get_homepage['home4_banner_img5'];
		} else {
			$data['home4_banner_img5'] = '';
		}
		
		$url = $get_homepage['home4_banner_img5'];
		$_SERVER['DOCUMENT_ROOT'];
		$parts = parse_url($url,PHP_URL_PATH);

		if (isset($this->request->post['home4_banner_img5']) && file_exists(DIR_IMAGE . $this->request->post['home4_banner_img5'])) {
			$data['home4_banner_img5'] = $this->request->post['home4_banner_img5'];
		} elseif (!empty($get_homepage) && $get_homepage['home4_banner_img5'] && file_exists(DIR_IMAGE .$get_homepage['home4_banner_img5'])) {
			$data['home4_five_image5'] = $this->model_tool_image->resize($get_homepage['home4_banner_img5'], 100,100);
			$data['home4_banner_img5'] = $get_homepage['home4_banner_img5'];

		} else {
			$data['home4_five_image5'] = $this->model_tool_image->resize('no_image.jpg', 50, 50);
		}
		 	
		/*end five inner image*/
		/*end homepage 4 image banner five*/
		 
		
		
		$data['placeholder'] = $this->model_tool_image->resize('no_image.png', 100, 100);
		
		
		$this->load->language('custom/freshfoodconfig');
		
	 
		$data['heading_title'] = $this->language->get('heading_title');
		$data['home_page'] = $this->language->get('home_page');
		$data['btn_save'] = $this->language->get('btn_save');
		$data['btn_cancel'] = $this->language->get('btn_cancel');
		$data['homepage']=$this->language->get('homepage');
		$data['help_homepage']=$this->language->get('help_homepage');
		$data['homepage1']    = $this->language->get('homepage1');
		$data['homepage2']    = $this->language->get('homepage2');
		$data['homepage3']    = $this->language->get('homepage3');
		$data['homepage4']    = $this->language->get('homepage4');
		$data['text_slider_title']=$this->language->get('text_slider_title');
		$data['add_slider_text']=$this->language->get('add_slider_text');
		$data['column_title1']=$this->language->get('column_title1');
		/* $data['column_name']=$this->language->get('column_name'); */
		$data['column_title2']=$this->language->get('column_title2');
		$data['column_button1text']=$this->language->get('column_button1text');
		/* $data['column_button2text']=$this->language->get('column_button2text');
		 $data['column_color']=$this->language->get('column_color'); */
		$data['column_image']=$this->language->get('column_image');
		$data['column_action']=$this->language->get('column_action');
		$data['button_delete']=$this->language->get('button_delete');
		$data['text_confirm']=$this->language->get('text_confirm');
		
		$data['text_status']=$this->language->get('text_status');
		$data['text_big_enable']=$this->language->get('text_big_enable');
		$data['text_big_disable']=$this->language->get('text_big_disable');
		
		$data['text_home1_big_section']=$this->language->get('text_home1_big_section');
		$data['text_backgournd_image']=$this->language->get('text_backgournd_image');
		$data['text_main_image']=$this->language->get('text_main_image');
		$data['text_icon_image']=$this->language->get('text_icon_image');
		$data['text_big_title']=$this->language->get('text_big_title');
		$data['text_big_desc']=$this->language->get('text_big_desc');
		$data['text_big_shop']=$this->language->get('text_big_shop');
		$data['text_big_shop_link']=$this->language->get('text_big_shop_link');
		$data['text_home1_testi']=$this->language->get('text_home1_testi');
		$data['text_testi_desc']=$this->language->get('text_testi_desc');
		$data['text_home1_choose']=$this->language->get('text_home1_choose');
		$data['text_choose_title1']=$this->language->get('text_choose_title1');
		$data['text_choose_desc1']=$this->language->get('text_choose_desc1');
		$data['text_choose_img']=$this->language->get('text_choose_img');
		$data['text_choose_left_title1']=$this->language->get('text_choose_left_title1');
		$data['text_choose_left_desc1']=$this->language->get('text_choose_left_desc1');
		$data['text_choose_left_img1']=$this->language->get('text_choose_left_img1');
		$data['text_choose_left_img2']=$this->language->get('text_choose_left_img2');
		$data['text_choose_left_title2']=$this->language->get('text_choose_left_title2');
		$data['text_choose_left_desc2']=$this->language->get('text_choose_left_desc2');
		$data['text_choose_left_img3']=$this->language->get('text_choose_left_img3');
		$data['text_choose_left_title3']=$this->language->get('text_choose_left_title3');
		$data['text_choose_left_desc3']=$this->language->get('text_choose_left_desc3');
		$data['text_choose_right_img1']=$this->language->get('text_choose_right_img1');
		$data['text_choose_right_title1']=$this->language->get('text_choose_right_title1');
		$data['text_choose_right_desc1']=$this->language->get('text_choose_right_desc1');
		$data['text_choose_right_img2']=$this->language->get('text_choose_right_img2');
		$data['text_choose_right_title2']=$this->language->get('text_choose_right_title2');
		$data['text_choose_right_desc2']=$this->language->get('text_choose_right_desc2');
		$data['text_choose_right_img3']=$this->language->get('text_choose_right_img3');
		$data['text_choose_right_title3']=$this->language->get('text_choose_right_title3');
		$data['text_choose_right_desc3']=$this->language->get('text_choose_right_desc3');	
		
		$data['text_home1_free_banner']=$this->language->get('text_home1_free_banner');		
		$data['text_free_banner_img1']=$this->language->get('text_free_banner_img1');		
		$data['text_free_banner_title1']=$this->language->get('text_free_banner_title1');		
		$data['text_free_banner_title2']=$this->language->get('text_free_banner_title2');
		$data['text_free_banner_img2']=$this->language->get('text_free_banner_img2');		
		$data['text_free_banner_title3']=$this->language->get('text_free_banner_title3');		
		$data['text_free_banner_title4']=$this->language->get('text_free_banner_title4');		
		$data['text_free_banner_img3']=$this->language->get('text_free_banner_img3');		
		$data['text_free_banner_title5']=$this->language->get('text_free_banner_title5');		
		$data['text_free_banner_title6']=$this->language->get('text_free_banner_title6');		
		$data['text_free_banner_img4']=$this->language->get('text_free_banner_img4');		
		$data['text_free_banner_title7']=$this->language->get('text_free_banner_title7');		
		$data['text_free_banner_title8']=$this->language->get('text_free_banner_title8');		
		
		/*home2 banner*/
		$data['text_home2_free_banner']=$this->language->get('text_home2_free_banner');		
		$data['text_home2_choose_us']=$this->language->get('text_home2_choose_us');		
		$data['text_home2_testi']=$this->language->get('text_home2_testi');		
		$data['text_home2_title3']=$this->language->get('text_home2_title3');		
		$data['text_home3_choose_us']=$this->language->get('text_home3_choose_us');		
		$data['text_home3_cat']=$this->language->get('text_home3_cat');		
		$data['text_home3_cat_banner']=$this->language->get('text_home3_cat_banner');		
		$data['text_enter_link']=$this->language->get('text_enter_link');		
		$data['text_valid_date']=$this->language->get('text_valid_date');		
		$data['text_home4_free_banner']=$this->language->get('text_home4_free_banner');		
		$data['text_home4_image_banner']=$this->language->get('text_home4_image_banner');		
		$data['text_home4_testimonial']=$this->language->get('text_home4_testimonial');		
	 	
		
		
		
		
		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');
		
		
		if (!isset($this->request->get['id'])) {        
		$data['cancel'] = $this->url->link('custom/freshfoodconfig', 'user_token=' . $this->session->data['user_token'] . $url, 'SSL');
		$data['delete'] = $this->url->link('custom/freshfoodconfig/deleteSlider', 'user_token=' . $this->session->data['user_token'], 'SSL');
		$data['addhome']=$this->url->link('custom/freshfoodconfig/addhome', 'user_token=' . $this->session->data['user_token'] , 'SSL');
		$data['addslider'] = $this->url->link('custom/freshfoodconfig/addslider', 'user_token=' . $this->session->data['user_token'] , 'SSL');
		$data['home3addslider'] = $this->url->link('custom/freshfoodconfig/home3addslider', 'user_token=' . $this->session->data['user_token'] , 'SSL');
		$data['home4addslider'] = $this->url->link('custom/freshfoodconfig/home4addslider', 'user_token=' . $this->session->data['user_token'] , 'SSL');
		$data['deleteSlider'] = $this->url->link('custom/freshfoodconfig/deleteSlider', 'user_token=' . $this->session->data['user_token'], 'SSL');
		 
		$data['deleteslide3'] = $this->url->link('custom/freshfoodconfig/deleteslide_home3', 'user_token=' . $this->session->data['user_token'], 'SSL');
		
		$data['deleteslide4'] = $this->url->link('custom/freshfoodconfig/deleteslide_home4', 'user_token=' . $this->session->data['user_token'], 'SSL');
		}
		
		$this->response->setOutput($this->load->view('custom/freshfoodconfig',$data)); 
	}
	
	  


	
	public function addslider(){
                $this->load->model('custom/freshfoodconfig');
                
                if (($this->request->server['REQUEST_METHOD'] == 'POST')) {
                    	
			$this->model_custom_freshfoodconfig->addslider($this->request->post);

			

			$url = '';

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}

			$this->response->redirect($this->url->link('custom/freshfoodconfig', 'user_token=' . $this->session->data['user_token'] . $url, 'SSL'));
		}
		$this->GetForm();    
    }
	
	
	   public function editslider(){
        
        

		//$this->document->setTitle($this->language->get('heading_title_styler'));

		$this->load->model('custom/freshfoodconfig');

		if (($this->request->server['REQUEST_METHOD'] == 'POST')) {
			$dd=$this->model_custom_freshfoodconfig->editslider($this->request->get['id'], $this->request->post);
			$this->session->data['success'] = $this->language->get('text_success');
                          
			$url = '';

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}

			$this->response->redirect($this->url->link('custom/freshfoodconfig', 'user_token=' . $this->session->data['user_token'] . $url, 'SSL'));
		}

		$this->GetForm();
        
        
    }
	
	public function deleteSlider() {
		$this->load->language('custom/freshfoodconfig');
		$this->load->model('custom/freshfoodconfig');
		if (isset($this->request->post['selected'])) {
		
		foreach ($this->request->post['selected'] as $id) {
			$this->model_custom_freshfoodconfig->deleteSlider($id);
		}
		$this->session->data['success'] = $this->language->get('text_success');
		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}
		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}
		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}
		$this->response->redirect($this->url->link('custom/freshfoodconfig', 'user_token=' . $this->session->data['user_token'], 'SSL'));
		}
		$this->GetForm();
	}
	
	public function deleteslide_home3(){
		 $this->load->language('custom/freshfoodconfig');
		$this->load->model('custom/freshfoodconfig');
		if (isset($this->request->post['selected'])) {
		
		foreach ($this->request->post['selected'] as $id) {
			$this->model_custom_freshfoodconfig->deleteslide_home3($id);
		}
		//$this->session->data['success'] = $this->language->get('text_success');
		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}
		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}
		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}
		$this->response->redirect($this->url->link('custom/freshfoodconfig', 'user_token=' . $this->session->data['user_token'], 'SSL'));
		}
		 $this->GetForm3();
	}
	
	public function deleteslide_home4(){
		 $this->load->language('custom/freshfoodconfig');
		$this->load->model('custom/freshfoodconfig');
		if (isset($this->request->post['selected'])) {
		
		foreach ($this->request->post['selected'] as $id) {
			$this->model_custom_freshfoodconfig->deleteslide_home4($id);
		}
		//$this->session->data['success'] = $this->language->get('text_success');
		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}
		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}
		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}
		$this->response->redirect($this->url->link('custom/freshfoodconfig', 'user_token=' . $this->session->data['user_token'], 'SSL'));
		}
		 $this->GetForm4();
	}
	public function addhome(){

 		
		$this->document->setTitle($this->language->get('heading_title'));
		$this->load->model('custom/freshfoodconfig');
 
		if (($this->request->server['REQUEST_METHOD'] == 'POST')) {
						
								
			$this->model_custom_freshfoodconfig->homepageconfig($this->request->post);
			 if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
			} else {
				$data['error_warning'] = '';
			}

			if (isset($this->session->data['success'])) {
				$data['success'] = $this->session->data['success'];

				unset($this->session->data['success']);
			} else {
				$data['success'] = '';
			}
			$this->session->data['success'] = $this->language->get("Success: You have modified configuration!");
                          
			$url = '';

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}
			
			$this->response->redirect($this->url->link('custom/freshfoodconfig', 'user_token=' . $this->session->data['user_token'] . $url, 'SSL'));
		}
		
		$this->GetList();
    }
	
	public function home3addslider(){
                $this->load->model('custom/freshfoodconfig');
                         
                if (($this->request->server['REQUEST_METHOD'] == 'POST')) {
                    	
			$this->model_custom_freshfoodconfig->home3addslider($this->request->post);
			$url = '';

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}

			$this->response->redirect($this->url->link('custom/freshfoodconfig', 'user_token=' . $this->session->data['user_token'] . $url, 'SSL'));
		}
		$this->GetForm3();    
    }
	
	
	public function home4addslider(){
                $this->load->model('custom/freshfoodconfig');
                         
                if (($this->request->server['REQUEST_METHOD'] == 'POST')) {
                    	
			$this->model_custom_freshfoodconfig->home4addslider($this->request->post);
			$url = '';

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}

			$this->response->redirect($this->url->link('custom/freshfoodconfig', 'user_token=' . $this->session->data['user_token'] . $url, 'SSL'));
		}
		$this->GetForm4();    
    }
	
	
	
	 public function editslider_home3(){
         
		$this->load->model('custom/freshfoodconfig');

		if (($this->request->server['REQUEST_METHOD'] == 'POST')) {
			$dd=$this->model_custom_freshfoodconfig->editslider_home3($this->request->get['id'], $this->request->post);
			$this->session->data['success'] = $this->language->get('Success: You have modified configuration!"');
                          
			$url = '';

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}

			$this->response->redirect($this->url->link('custom/freshfoodconfig', 'user_token=' . $this->session->data['user_token'] . $url, 'SSL'));
		}
		
		$this->GetForm3();
        
        
    }
	
	 public function editslider_home4(){
         
		$this->load->model('custom/freshfoodconfig');

		if (($this->request->server['REQUEST_METHOD'] == 'POST')) {
			$dd=$this->model_custom_freshfoodconfig->editslider_home4($this->request->get['id'], $this->request->post);
			$this->session->data['success'] = $this->language->get('Success: You have modified configuration!"');
                          
			$url = '';

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}

			$this->response->redirect($this->url->link('custom/freshfoodconfig', 'user_token=' . $this->session->data['user_token'] . $url, 'SSL'));
		}
		
		$this->GetForm4();
        
        
    }
	
	 public function GetForm(){
        
            $this->load->model('custom/freshfoodconfig');
			  $this->load->model('tool/image');
			$this->load->language('custom/freshfoodconfig');
			$data['heading_title'] = $this->language->get('heading_title');
			$data['text_slider_form'] = $this->language->get('text_slider_form');
            $data['header']=$this->load->controller('common/header');
            $data['column_left']=$this->load->controller('common/column_left');
            $data['footer']=$this->load->controller('common/footer');
			$data['column_title1']=$this->language->get('column_title1');
		 
		$data['column_title2']=$this->language->get('column_title2');
		$data['column_button1text']=$this->language->get('column_button1text');
	 
		$data['column_image']=$this->language->get('column_image');
		$data['btn_save'] = $this->language->get('btn_save');
		 
		$data['btn_cancel'] = $this->language->get('btn_cancel');
		
        if (isset($this->request->get['sort'])) {
			$sort = $this->request->get['sort'];
		} else {
			$sort = 'name';
		}

		if (isset($this->request->get['order'])) {
			$order = $this->request->get['order'];
		} else {
			$order = 'ASC';
		}

		if (isset($this->request->get['page'])) {
			$page = $this->request->get['page'];
		} else {
			$page = 1;
		}

		$url = '';

		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}

        
                if (isset($this->request->post['selected'])) {
			$data['selected'] = (array)$this->request->post['selected'];
		} else {
			$data['selected'] = array();
		}

                $url = '';

		if ($order == 'ASC') {
			$url .= '&order=DESC';
		} else {
			$url .= '&order=ASC';
		}

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}
    
		$url = '';

		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}
                
                if (isset($this->error['keyword'])) {
			$data['error_word'] = $this->error['keyword'];
		} else {
			$data['error_word'] = '';
		}

                
                $data['sort'] = $sort;
		$data['order'] = $order;
		$data['cancel'] = $this->url->link('custom/freshfoodconfig', 'user_token=' . $this->session->data['user_token'] . $url, 'SSL');
            
             $data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('custom/freshfoodconfig', 'user_token=' . $this->session->data['user_token'], 'SSL')
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_slider_form'),
			'href' => $this->url->link('custom/freshfoodconfig', 'user_token=' . $this->session->data['user_token'] . $url, 'SSL')
		);
		
		
		 if (isset($this->request->get['id']) && ($this->request->server['REQUEST_METHOD'] != 'POST')) {
			$slider_info = $this->model_custom_freshfoodconfig->slider($this->request->get['id'],$this->request->post); 
			
		}
		
		  if (isset($this->request->post['title1'])) {
			$data['title1'] = $this->request->post['title1'];
		} elseif (!empty($slider_info)) {
			$data['title1'] = $slider_info['title1'];
		} else {
			$data['title1'] = '';
		}
		
	 
		if (isset($this->request->post['title2'])) {
			$data['title2'] = $this->request->post['title2'];
		} elseif (!empty($slider_info)) {
			$data['title2'] = $slider_info['title2'];
		} else {
			$data['title2'] = '';
		}
		
		
		if (isset($this->request->post['button1_text'])) {
			$data['button1_text'] = $this->request->post['button1_text'];
		} elseif (!empty($slider_info)) {
			$data['button1_text'] = $slider_info['button1_text'];
		} else {
			$data['button1_text'] = '';
		}
		
		 
		

				$data['placeholder'] = $this->model_tool_image->resize('no_image.png', 100, 100);
				//$this->load->model('tool/image');

				if (isset($this->request->post['s_image']) && file_exists(DIR_IMAGE . $this->request->post['s_image'])) {
				$data['thumb'] = $this->model_tool_image->resize($this->request->post['s_image'], 100, 100);
				} elseif (!empty($slider_info) && $slider_info['s_image'] && file_exists(DIR_IMAGE . $slider_info['s_image'])) {
				$data['thumb'] = $this->model_tool_image->resize($slider_info['s_image'], 100, 100);
				} else {
				$data['thumb'] = $this->model_tool_image->resize('no_image.png', 100, 100);
				}


				if(isset($this->request->post['s_image'])){
								   $data['s_image']=$this->reqeust->post['s_image'];
							   }else if(!empty ($slider_info)){
								   $data['s_image']=$slider_info['s_image'];
							   }else{
								   $data['s_image']='';
							   }
			
			if (!isset($this->request->get['id'])) {
			$data['action'] = $this->url->link('custom/freshfoodconfig/addslider', 'user_token=' . $this->session->data['user_token'] . $url, 'SSL');
		} else {
			$data['action'] = $this->url->link('custom/freshfoodconfig/editslider', 'user_token=' . $this->session->data['user_token'] . '&id=' . $this->request->get['id'] . $url, 'SSL');
                }
         
                
            $this->response->setOutput($this->load->view('custom/home1_slider_form',$data));
            
    }
	
	 public function GetForm3(){
        
            $this->load->model('custom/freshfoodconfig');
			  $this->load->model('tool/image');
			$this->load->language('custom/freshfoodconfig');
			 
            $data['header']=$this->load->controller('common/header');
            $data['column_left']=$this->load->controller('common/column_left');
            $data['footer']=$this->load->controller('common/footer');
			 
		
        if (isset($this->request->get['sort'])) {
			$sort = $this->request->get['sort'];
		} else {
			$sort = 'name';
		}

		if (isset($this->request->get['order'])) {
			$order = $this->request->get['order'];
		} else {
			$order = 'ASC';
		}

		if (isset($this->request->get['page'])) {
			$page = $this->request->get['page'];
		} else {
			$page = 1;
		}

		$url = '';

		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}

        
                if (isset($this->request->post['selected'])) {
			$data['selected'] = (array)$this->request->post['selected'];
		} else {
			$data['selected'] = array();
		}

                $url = '';

		if ($order == 'ASC') {
			$url .= '&order=DESC';
		} else {
			$url .= '&order=ASC';
		}

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}
    
		$url = '';

		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}
                
                if (isset($this->error['keyword'])) {
			$data['error_word'] = $this->error['keyword'];
		} else {
			$data['error_word'] = '';
		}

                
                $data['sort'] = $sort;
		$data['order'] = $order;
		$data['cancel'] = $this->url->link('custom/freshfoodconfig', 'user_token=' . $this->session->data['user_token'] . $url, 'SSL');
            
             $data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/freshfoodconfig', 'user_token=' . $this->session->data['user_token'], 'SSL')
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_slider_form'),
			'href' => $this->url->link('custom/freshfoodconfig', 'user_token=' . $this->session->data['user_token'] . $url, 'SSL')
		);
		
		
		 if (isset($this->request->get['id']) && ($this->request->server['REQUEST_METHOD'] != 'POST')) {
			$slider_info = $this->model_custom_freshfoodconfig->slider_3($this->request->get['id'],$this->request->post); 
			
		}
		
		  if (isset($this->request->post['title1'])) {
			$data['title1'] = $this->request->post['title1'];
		} elseif (!empty($slider_info)) {
			$data['title1'] = $slider_info['title1'];
		} else {
			$data['title1'] = '';
		}
		 
		  if (isset($this->request->post['title2'])) {
			$data['title2'] = $this->request->post['title2'];
		} elseif (!empty($slider_info)) {
			$data['title2'] = $slider_info['title2'];
		} else {
			$data['title2'] = '';
		}
		 
		 

				$data['placeholder'] = $this->model_tool_image->resize('no_image.png', 100, 100);
				//$this->load->model('tool/image');

				if (isset($this->request->post['image_slide3']) && file_exists(DIR_IMAGE . $this->request->post['image_slide3'])) {
				$data['thumb'] = $this->model_tool_image->resize($this->request->post['image_slide3'], 100, 100);
				} elseif (!empty($slider_info) && $slider_info['image_slide3'] && file_exists(DIR_IMAGE . $slider_info['image_slide3'])) {
				$data['thumb'] = $this->model_tool_image->resize($slider_info['image_slide3'], 100, 100);
				} else {
				$data['thumb'] = $this->model_tool_image->resize('no_image.png', 100, 100);
				}


				if(isset($this->request->post['image_slide3'])){
								   $data['image_slide3']=$this->reqeust->post['image_slide3'];
							   }else if(!empty ($slider_info)){
								   $data['image_slide3']=$slider_info['image_slide3'];
							   }else{
								   $data['image_slide3']='';
							   }
			
			if (!isset($this->request->get['id'])) {
			$data['action'] = $this->url->link('custom/freshfoodconfig/home3addslider', 'user_token=' . $this->session->data['user_token'] . $url, 'SSL');
		} else {
			$data['action'] = $this->url->link('custom/freshfoodconfig/editslider_home3', 'user_token=' . $this->session->data['user_token'] . '&id=' . $this->request->get['id'] . $url, 'SSL');
                }
         
                
            $this->response->setOutput($this->load->view('custom/home3_slider_form',$data));
            
    }
	
    
	
	public function GetForm4(){
        
            $this->load->model('custom/freshfoodconfig');
			  $this->load->model('tool/image');
			$this->load->language('custom/freshfoodconfig');
		 
            $data['header']=$this->load->controller('common/header');
            $data['column_left']=$this->load->controller('common/column_left');
            $data['footer']=$this->load->controller('common/footer');
	  
		
        if (isset($this->request->get['sort'])) {
			$sort = $this->request->get['sort'];
		} else {
			$sort = 'name';
		}

		if (isset($this->request->get['order'])) {
			$order = $this->request->get['order'];
		} else {
			$order = 'ASC';
		}

		if (isset($this->request->get['page'])) {
			$page = $this->request->get['page'];
		} else {
			$page = 1;
		}

		$url = '';

		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}

        
                if (isset($this->request->post['selected'])) {
			$data['selected'] = (array)$this->request->post['selected'];
		} else {
			$data['selected'] = array();
		}

                $url = '';

		if ($order == 'ASC') {
			$url .= '&order=DESC';
		} else {
			$url .= '&order=ASC';
		}

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}
    
		$url = '';

		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}
                
                if (isset($this->error['keyword'])) {
			$data['error_word'] = $this->error['keyword'];
		} else {
			$data['error_word'] = '';
		}

                
                $data['sort'] = $sort;
		$data['order'] = $order;
		$data['cancel'] = $this->url->link('custom/freshfoodconfig', 'user_token=' . $this->session->data['user_token'] . $url, 'SSL');
            
             $data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/freshfoodconfig', 'user_token=' . $this->session->data['user_token'], 'SSL')
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_slider_form'),
			'href' => $this->url->link('custom/freshfoodconfig', 'user_token=' . $this->session->data['user_token'] . $url, 'SSL')
		);
		
		
		 if (isset($this->request->get['id']) && ($this->request->server['REQUEST_METHOD'] != 'POST')) {
			$slider_info = $this->model_custom_freshfoodconfig->slider_4($this->request->get['id'],$this->request->post); 
			 
		}
		
		  if (isset($this->request->post['title1'])) {
			$data['title1'] = $this->request->post['title1'];
		} elseif (!empty($slider_info)) {
			$data['title1'] = $slider_info['title1'];
		} else {
			$data['title1'] = '';
		}
		 
		  if (isset($this->request->post['title2'])) {
			$data['title2'] = $this->request->post['title2'];
		} elseif (!empty($slider_info)) {
			$data['title2'] = $slider_info['title2'];
		} else {
			$data['title2'] = '';
		}
		 
		 

				$data['placeholder'] = $this->model_tool_image->resize('no_image.png', 100, 100);
				//$this->load->model('tool/image');

				if (isset($this->request->post['image_slide4']) && file_exists(DIR_IMAGE . $this->request->post['image_slide4'])) {
				$data['thumb'] = $this->model_tool_image->resize($this->request->post['image_slide4'], 100, 100);
				} elseif (!empty($slider_info) && $slider_info['image_slide4'] && file_exists(DIR_IMAGE . $slider_info['image_slide4'])) {
				$data['thumb'] = $this->model_tool_image->resize($slider_info['image_slide4'], 100, 100);
				} else {
				$data['thumb'] = $this->model_tool_image->resize('no_image.png', 100, 100);
				}


				if(isset($this->request->post['image_slide4'])){
								   $data['image_slide4']=$this->reqeust->post['image_slide4'];
							   }else if(!empty ($slider_info)){
								   $data['image_slide4']=$slider_info['image_slide4'];
							   }else{
								   $data['image_slide4']='';
							   }
			
			if (!isset($this->request->get['id'])) {
			$data['action'] = $this->url->link('custom/freshfoodconfig/home4addslider', 'user_token=' . $this->session->data['user_token'] . $url, 'SSL');
		} else {
			$data['action'] = $this->url->link('custom/freshfoodconfig/editslider_home4', 'user_token=' . $this->session->data['user_token'] . '&id=' . $this->request->get['id'] . $url, 'SSL');
                }
         
                
            $this->response->setOutput($this->load->view('custom/home4_slider_form',$data));
            
    }
	
	
	
	
}
?>