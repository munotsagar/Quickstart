<?php
class ControllerExtensionModuleSlideshow extends Controller {
	public function index($setting) {
		static $module = 0;		

		$this->load->model('design/banner');
		$this->load->model('tool/image');

		$this->document->addStyle('catalog/view/javascript/jquery/swiper/css/swiper.min.css');
		$this->document->addStyle('catalog/view/javascript/jquery/swiper/css/opencart.css');
		$this->document->addScript('catalog/view/javascript/jquery/swiper/js/swiper.jquery.js');
		
		$data['banners'] = array();

		$results = $this->model_design_banner->getBanner($setting['banner_id']);

		foreach ($results as $result) {
			if (is_file(DIR_IMAGE . $result['image'])) {
				$data['banners'][] = array(
					'title' => $result['title'],
					'link'  => $result['link'],
					'image' => $this->model_tool_image->resize($result['image'], $setting['width'], $setting['height'])
				);
			}
		}

$sql ="SELECT * FROM freshfood_configuration";

			$query = $this->db->query($sql);
	        $configure = $query->row;
			$data['homepage'] = $configure['homepage'];
			
			$str_slider="select * from home1_slider_configuration";
			$fetch_data=$this->db->query($str_slider); 
			$results=$fetch_data->rows; 
			
			foreach ($results as $result) {
							if ($result['s_image'] && file_exists(DIR_IMAGE . $result['s_image'])) {
								$image = $this->model_tool_image->resize($result['s_image'], 1380,600);
							}
							else {
								$image = $this->model_tool_image->resize('no_image.jpg', 1380, 600);
							}

				$data['slider_data'][] = array(
					'id'           => $result['id'],
					'title1'       => $result['title1'],
					'title2'       => $result['title2'],
					'button1_text' => $result['button1_text'],
                    's_image'      => $image
			);
			}
			$str_slider3="select * from home2_slider_configuration";
			$fetch_data_slide=$this->db->query($str_slider3);
			$res=$fetch_data_slide->rows;
			
			foreach ($res as $result_slide3) {
							if ($result_slide3['image_slide3'] && file_exists(DIR_IMAGE . $result_slide3['image_slide3'])) {
								$image = $this->model_tool_image->resize($result_slide3['image_slide3'], 870,540);
							}
							else {
								$image = $this->model_tool_image->resize('no_image.jpg', 550, 550);
							}
				$data['slider3_data'][] = array(
					'id'           => $result_slide3['id'],
					'title1'       => $result_slide3['title1'],
					'title2'       => $result_slide3['title2'],
					'image_slide3'       => $image
					 
			);
			}
			
			$str_slider ="select * from home4_slider_configuration";
			$fetch_slider_four=$this->db->query($str_slider);
			$res_four=$fetch_slider_four->rows;
			 
			foreach ($res_four as $result_slide4) { 
			 
							if ($result_slide4['image_slide4'] && file_exists(DIR_IMAGE . $result_slide4['image_slide4'])) {
								$image = $this->model_tool_image->resize($result_slide4['image_slide4'], 1170,550);
							}
							else {
								$image = $this->model_tool_image->resize('no_image.jpg', 550, 550);
							}
				$data['slider4_data'][] = array(
					'id'           => $result_slide4['id'],
					'title1'       => $result_slide4['title1'],
					'title2'       => $result_slide4['title2'],
					'image_slide4'       => $image
					 
			);
			}
			
		$data['module'] = $module++;

		return $this->load->view('extension/module/slideshow', $data);
	}
}