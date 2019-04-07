<?php

class ModelCustomFreshfoodconfig extends Model {

	public function homepageconfig($data){
		$this->db->query("UPDATE freshfood_configuration SET homepage = '" . $this->db->escape($data['homepage']) . "'
			,h1_banner_img1='".$this->db->escape($data['h1_banner_img1'])."'
			,h1_banner_title1='".$this->db->escape($data['h1_banner_title1'])."'
			,h1_banner_title2='".$this->db->escape($data['h1_banner_title2'])."'
			,h1_banner_img2='".$this->db->escape($data['h1_banner_img2'])."'
			,h1_banner_title3='".$this->db->escape($data['h1_banner_title3'])."'
			,h1_banner_title4='".$this->db->escape($data['h1_banner_title4'])."'
			,h1_banner_img3='".$this->db->escape($data['h1_banner_img3'])."'
			,h1_banner_title5='".$this->db->escape($data['h1_banner_title5'])."'
			,h1_banner_title6='".$this->db->escape($data['h1_banner_title6'])."'
			,h1_banner_img4='".$this->db->escape($data['h1_banner_img4'])."'
			,h1_banner_title7='".$this->db->escape($data['h1_banner_title7'])."'
			,h1_banner_title8='".$this->db->escape($data['h1_banner_title8'])."'
			,h1_banner_status='".$this->db->escape($data['h1_banner_status'])."'
			,h1_big_img1='".$this->db->escape($data['h1_big_img1'])."'
			,h1_big_img2='".$this->db->escape($data['h1_big_img2'])."'
			,h1_big_img3='".$this->db->escape($data['h1_big_img3'])."'
			,h1_big_img3='".$this->db->escape($data['h1_big_img3'])."'
			,h1_big_title='".$this->db->escape($data['h1_big_title'])."' 
			,h1_big_desc='".$this->db->escape($data['h1_big_desc'])."' 
			,h1_big_shop='".$this->db->escape($data['h1_big_shop'])."' 
			,h1_big_shop_link='".$this->db->escape($data['h1_big_shop_link'])."' 
			,h1_big_status='".$this->db->escape($data['h1_big_status'])."' 
			,home1_testi='".$this->db->escape($data['home1_testi'])."' 
			,h1_choose_center1='".$this->db->escape($data['h1_choose_center1'])."' 
			,h1_choose_center2='".$this->db->escape($data['h1_choose_center2'])."'
			,h1_choose_center3='".$this->db->escape($data['h1_choose_center3'])."'
			,h1_choose_left_title1='".$this->db->escape($data['h1_choose_left_title1'])."'
			,h1_choose_left_desc1='".$this->db->escape($data['h1_choose_left_desc1'])."' 
			,h1_choose_left_img1='".$this->db->escape($data['h1_choose_left_img1'])."'
			,h1_choose_left_img2='".$this->db->escape($data['h1_choose_left_img2'])."'
			,h1_choose_left_title2='".$this->db->escape($data['h1_choose_left_title2'])."'
			,h1_choose_left_desc2='".$this->db->escape($data['h1_choose_left_desc2'])."'
			,h1_choose_left_img3='".$this->db->escape($data['h1_choose_left_img3'])."'
			,h1_choose_left_title3='".$this->db->escape($data['h1_choose_left_title3'])."'
			,h1_choose_left_desc3='".$this->db->escape($data['h1_choose_left_desc3'])."'
			,h1_choose_right_img1='".$this->db->escape($data['h1_choose_right_img1'])."'
			,h1_choose_right_title1='".$this->db->escape($data['h1_choose_right_title1'])."'
			,h1_choose_right_desc1='".$this->db->escape($data['h1_choose_right_desc1'])."'
			,h1_choose_right_img2='".$this->db->escape($data['h1_choose_right_img2'])."'
			,h1_choose_right_title2='".$this->db->escape($data['h1_choose_right_title2'])."'
			,h1_choose_right_desc2='".$this->db->escape($data['h1_choose_right_desc2'])."'
			,h1_choose_right_img3='".$this->db->escape($data['h1_choose_right_img3'])."'
			,h1_choose_right_title3='".$this->db->escape($data['h1_choose_right_title3'])."'
			,h1_choose_right_desc3='".$this->db->escape($data['h1_choose_right_desc3'])."'			
			,h1_banner2_img1='".$this->db->escape($data['h1_banner2_img1'])."'	
			,h1_banner2_img2='".$this->db->escape($data['h1_banner2_img2'])."'
			,h1_banner2_img3='".$this->db->escape($data['h1_banner2_img3'])."'
			,h1_banner2_status='".$this->db->escape($data['h1_banner2_status'])."'
			,h1_choose_us2_left_img1='".$this->db->escape($data['h1_choose_us2_left_img1'])."'
			,h1_choose_us2_text='".$this->db->escape($data['h1_choose_us2_text'])."'
			,h1_choose_us2_status='".$this->db->escape($data['h1_choose_us2_status'])."'
			,h1_choose_us2_title1='".$this->db->escape($data['h1_choose_us2_title1'])."'
			,h1_choose_us2_title2='".$this->db->escape($data['h1_choose_us2_title2'])."'
			,home2_testi='".$this->db->escape($data['home2_testi'])."'
			,home2_big_img1='".$this->db->escape($data['home2_big_img1'])."'
			,home2_big_img2='".$this->db->escape($data['home2_big_img2'])."'
			,home2_big_title1='".$this->db->escape($data['home2_big_title1'])."'
			,home2_big_title2='".$this->db->escape($data['home2_big_title2'])."'
			,home2_big_title3='".$this->db->escape($data['home2_big_title3'])."'
			,home2_big_shop_now='".$this->db->escape($data['home2_big_shop_now'])."'
			,home2_big_shop_link='".$this->db->escape($data['home2_big_shop_link'])."'
			,home2_testi_title='".$this->db->escape($data['home2_testi_title'])."'
			,home2_big_offers_status='".$this->db->escape($data['home2_big_offers_status'])."'
			,h1_choose_us3_status='".$this->db->escape($data['h1_choose_us3_status'])."'
			,h1_cat3_img1='".$this->db->escape($data['h1_cat3_img1'])."'
			,h1_cat3_img2='".$this->db->escape($data['h1_cat3_img2'])."'
			,h1_cat3_img3='".$this->db->escape($data['h1_cat3_img3'])."'
			,home3_cat_img_status='".$this->db->escape($data['home3_cat_img_status'])."'
			,h1_cat3_title1='".$this->db->escape($data['h1_cat3_title1'])."'
			,h1_cat3_title2='".$this->db->escape($data['h1_cat3_title2'])."'
			,h1_cat3_title3='".$this->db->escape($data['h1_cat3_title3'])."'
			,h1_cat3_link1='".$this->db->escape($data['h1_cat3_link1'])."'
			,h1_cat3_link2='".$this->db->escape($data['h1_cat3_link2'])."'
			,h1_cat3_link3='".$this->db->escape($data['h1_cat3_link3'])."'
			,home3_big_banner_img1='".$this->db->escape($data['home3_big_banner_img1'])."'
			,home3_big_banner_title='".$this->db->escape($data['home3_big_banner_title'])."'
			,home3_big_banner_img2='".$this->db->escape($data['home3_big_banner_img2'])."'
			,home3_big_banner_status='".$this->db->escape($data['home3_big_banner_status'])."'
			,home2_valid_date='".$this->db->escape($data['home2_valid_date'])."'
			,home1_valid_date='".$this->db->escape($data['home1_valid_date'])."'
			,home3_big_banner_title2='".$this->db->escape($data['home3_big_banner_title2'])."'
			,home4_big_banner_status='".$this->db->escape($data['home4_big_banner_status'])."'
			,h1_banner4_status='".$this->db->escape($data['h1_banner4_status'])."'
			,home4_banner_img1='".$this->db->escape($data['home4_banner_img1'])."'
			,home4_banner_title1='".$this->db->escape($data['home4_banner_title1'])."'
			,home4_banner_title2='".$this->db->escape($data['home4_banner_title2'])."'
			,home4_banner_title3='".$this->db->escape($data['home4_banner_title3'])."'
			,home4_banner_title4='".$this->db->escape($data['home4_banner_title4'])."'
			,home4_banner_title5='".$this->db->escape($data['home4_banner_title5'])."'
			,home4_banner_link1='".$this->db->escape($data['home4_banner_link1'])."'
			,home4_banner_img2='".$this->db->escape($data['home4_banner_img2'])."'
			,home4_banner_link2='".$this->db->escape($data['home4_banner_link2'])."'
			,home4_banner_img3='".$this->db->escape($data['home4_banner_img3'])."'
			,home4_banner_link3='".$this->db->escape($data['home4_banner_link3'])."'
			,home4_banner_img4='".$this->db->escape($data['home4_banner_img4'])."'
			,home4_banner_link4='".$this->db->escape($data['home4_banner_link4'])."'
			,home4_banner_img5='".$this->db->escape($data['home4_banner_img5'])."'
			,home4_banner_link5='".$this->db->escape($data['home4_banner_link5'])."'
			,home4_testi='".$this->db->escape($data['home4_testi'])."'
			,h1_banner_img1_link='".$this->db->escape($data['h1_banner_img1_link'])."'
			,h1_banner_img2_link='".$this->db->escape($data['h1_banner_img2_link'])."'
			,h1_banner_img3_link='".$this->db->escape($data['h1_banner_img3_link'])."'
			,h1_banner_img4_link='".$this->db->escape($data['h1_banner_img4_link'])."'
			,theme_color='".$this->db->escape($data['theme_color'])."'
			,twitter_link='".$this->db->escape($data['twitter_link'])."'
			,fb_link='".$this->db->escape($data['fb_link'])."'
			,youtube_link='".$this->db->escape($data['youtube_link'])."'
			,google_link='".$this->db->escape($data['google_link'])."'
			,home1_banner1='".$this->db->escape($data['home1_banner1'])."'
			,home1_banner2='".$this->db->escape($data['home1_banner2'])."'
			,home1_banner3='".$this->db->escape($data['home1_banner3'])."'
			,home1_banner4='".$this->db->escape($data['home1_banner4'])."'
			,home1_banner_title1='".$this->db->escape($data['home1_banner_title1'])."'
			,home1_banner_title2='".$this->db->escape($data['home1_banner_title2'])."'
			,home1_banner_link1='".$this->db->escape($data['home1_banner_link1'])."'
			,home1_banner_title3='".$this->db->escape($data['home1_banner_title3'])."'
			,home1_banner_title4='".$this->db->escape($data['home1_banner_title4'])."'
			,home1_banner_link2='".$this->db->escape($data['home1_banner_link2'])."'
			,home1_banner_title5='".$this->db->escape($data['home1_banner_title5'])."'
			,home1_banner_title6='".$this->db->escape($data['home1_banner_title6'])."'
			,home1_banner_link3='".$this->db->escape($data['home1_banner_link3'])."'
			,home1_banner_title7='".$this->db->escape($data['home1_banner_title7'])."'
			,home1_banner_title8='".$this->db->escape($data['home1_banner_title8'])."'
			,home1_banner_link4='".$this->db->escape($data['home1_banner_link4'])."'
			,about_footer='".$this->db->escape($data['about_footer'])."'
			WHERE freshconfig_id = 0 ");
		  
	}

	public function gethomepage(){
       $sql="select * from freshfood_configuration where freshconfig_id=0 ";
           $qeury=$this->db->query($sql);
           return $qeury->row;
    }
	
	public function getslider(){ 
		$get_slider="select * from home1_slider_configuration";
		$query=$this->db->query($get_slider);
		return $query->rows;
	}
	
	public function addslider($data){
		
			
            $insert_data="INSERT INTO home1_slider_configuration SET title1='".$this->db->escape($data['title1'])."',title2='".$this->db->escape($data['title2'])."',button1_text='".$this->db->escape($data['button1_text'])."',s_image='".$this->db->escape($data['s_image'])."' ";
			 
			$this->db->query($insert_data);
        } 
	public function home3addslider($data){
		 
		   $insert_data="INSERT INTO home2_slider_configuration SET title1='".$this->db->escape($data['title1'])."',
		   title2='".$this->db->escape($data['title2'])."',image_slide3='".$this->db->escape($data['image_slide3'])."'";
			 
			$this->db->query($insert_data);
		
	}
	
	public function home4addslider($data){
		 
		   $insert_data="INSERT INTO home4_slider_configuration SET title1='".$this->db->escape($data['title1'])."',
		   title2='".$this->db->escape($data['title2'])."',image_slide4='".$this->db->escape($data['image_slide4'])."'";
			  
			$this->db->query($insert_data);
		
	}
		
	 public function slider($id,$data){
           $sql="select * from home1_slider_configuration where id=".$id." ";
           $qeury=$this->db->query($sql);
           return $qeury->row;
       }
	  
	  public function slider_3($id,$data){
           $sql="select * from home2_slider_configuration where id=".$id." ";
           $qeury=$this->db->query($sql);
           return $qeury->row;
       } 
	   
	   public function slider_4($id,$data){
           $sql="select * from home4_slider_configuration where id=".$id." ";
           $qeury=$this->db->query($sql);
           return $qeury->row;
       }
	  
	  public function get_home3_slider(){ 
		$get_slider="select * from home2_slider_configuration";
		$query=$this->db->query($get_slider);
		return $query->rows;
		} 
		
		public function get_home4_slider(){ 
			$get_slider="select * from home4_slider_configuration";
			$query=$this->db->query($get_slider);
			return $query->rows;
		}
	   
	   
	    public function editslider($id,$data){
          $this->db->query("UPDATE home1_slider_configuration SET title1='" . $this->db->escape($data['title1']) . "',title2='".$this->db->escape($data['title2'])."', button1_text = '" . $this->db->escape($data['button1_text']) . "' WHERE id = ".$id ." ");
			if (isset($data['s_image'])) {
				$this->db->query("UPDATE home1_slider_configuration SET s_image = '" . $this->db->escape(html_entity_decode($data['s_image'], ENT_QUOTES, 'UTF-8')) . "' WHERE id = ".$id." ");
			}
		 }
		 
		  public function editslider_home3($id,$data){
          $this->db->query("UPDATE home2_slider_configuration SET title1='" . $this->db->escape($data['title1']) ."'
		  ,title2='".$this->db->escape($data['title2'])."' WHERE id = ".$id ." ");
			if (isset($data['image_slide3'])) {
				$this->db->query("UPDATE home2_slider_configuration SET image_slide3 = '" . $this->db->escape(html_entity_decode($data['image_slide3'], ENT_QUOTES, 'UTF-8')) . "' WHERE id = ".$id." ");
			}
		 }
		 
		 public function editslider_home4($id,$data){
          $this->db->query("UPDATE home4_slider_configuration SET title1='" . $this->db->escape($data['title1']) ."'
		  ,title2='".$this->db->escape($data['title2'])."' WHERE id = ".$id ." ");
			if (isset($data['image_slide4'])) {
				$this->db->query("UPDATE home4_slider_configuration SET image_slide4 = '" . $this->db->escape(html_entity_decode($data['image_slide4'], ENT_QUOTES, 'UTF-8')) . "' WHERE id = ".$id." ");
			}
		 }
		 
		  public function deleteSlider($id) {
			 
		$this->db->query("DELETE FROM home1_slider_configuration WHERE id = '" . (int)$id . "'");
		$this->cache->delete('product');
	}
	 public function deleteslide_home3($id) {
		  
		$this->db->query("DELETE FROM home2_slider_configuration WHERE id = '" . (int)$id . "'");
		$this->cache->delete('product');
	}
	
	public function deleteslide_home4($id) {
		  
		$this->db->query("DELETE FROM home4_slider_configuration WHERE id = '" . (int)$id . "'");
		$this->cache->delete('product');
	}

}
?>