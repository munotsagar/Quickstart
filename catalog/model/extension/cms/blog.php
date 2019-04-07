<?php
class ModelExtensionCmsBlog extends Model {

  public function getBlog($blog_id) {
    $query = $this->db->query("SELECT DISTINCT * FROM " . DB_PREFIX . "blog b LEFT JOIN " . DB_PREFIX . "blog_description bd ON (b.blog_id = bd.blog_id) LEFT JOIN " . DB_PREFIX . "blog_to_store b2s ON (b.blog_id = b2s.blog_id) WHERE b.blog_id = '" . (int)$blog_id . "' AND bd.language_id = '" . (int)$this->config->get('config_language_id') . "' AND b2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND b.status = '1'");
 
    return $query->row;
  }

  public function getBlogs($data = array()) {
    $sql = "SELECT * FROM " . DB_PREFIX . "blog b LEFT JOIN " . DB_PREFIX . "blog_description bd ON (b.blog_id = bd.blog_id) LEFT JOIN " . DB_PREFIX . "blog_to_store b2s ON (b.blog_id = b2s.blog_id) WHERE bd.language_id = '" . (int)$this->config->get('config_language_id') . "' AND b2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND b.status = '1' ORDER BY b.date_available DESC";

    $sql .= " LIMIT ". (int)$data['start'] . ", ". (int)$data['limit'];


    $query = $this->db->query($sql);

    return $query->rows;
  }

  public function getTotalBlog() {
    $sql = "SELECT COUNT(*) AS total FROM " . DB_PREFIX . "blog WHERE status = '1'";
    $query = $this->db->query($sql);

    return $query->row['total'];
  }

  public function getPreviousBlog($blog_id, $sort_order) {
    $query = $this->db->query("SELECT DISTINCT * FROM " . DB_PREFIX . "blog b LEFT JOIN " . DB_PREFIX . "blog_description bd ON (b.blog_id = bd.blog_id) WHERE  (b.sort_order = '" . (int)$sort_order . "' AND b.blog_id < '" . (int)$blog_id . "') OR (b.sort_order < '" . (int)$sort_order . "') AND bd.language_id = '" . (int)$this->config->get('config_language_id') . "' ORDER BY b.sort_order DESC, b.blog_id DESC LIMIT 1");

    return $query->row;
  }

  public function getNextBlog($blog_id, $sort_order) {
    $query = $this->db->query("SELECT DISTINCT * FROM " . DB_PREFIX . "blog b LEFT JOIN " . DB_PREFIX . "blog_description bd ON (b.blog_id = bd.blog_id) WHERE  (b.sort_order = '" . (int)$sort_order . "' AND b.blog_id > '" . (int)$blog_id . "') OR (b.sort_order > '" . (int)$sort_order . "') AND bd.language_id = '" . (int)$this->config->get('config_language_id') . "' ORDER BY b.sort_order ASC, b.blog_id ASC LIMIT 1");

    return $query->row;
  }

  public function getFooterBlogs() {
    $sql = "SELECT * FROM " . DB_PREFIX . "blog b LEFT JOIN " . DB_PREFIX . "blog_description bd ON (b.blog_id = bd.blog_id) LEFT JOIN " . DB_PREFIX . "blog_to_store b2s ON (b.blog_id = b2s.blog_id) WHERE bd.language_id = '" . (int)$this->config->get('config_language_id') . "' AND b2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND b.status = '1' ORDER BY b.sort_order DESC, b.blog_id DESC LIMIT 1";

		$query = $this->db->query($sql);

    return $query->rows;
  }

  public function getBlogLayoutId($blog_id) {
    $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "blog_to_layout WHERE blog_id = '" . (int)$blog_id . "' AND store_id = '" . (int)$this->config->get('config_store_id') . "'");

    if ($query->num_rows) {
      return (int)$query->row['layout_id'];
    } else {
      return 0;
    }
  }

}
?>
