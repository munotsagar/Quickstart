<?php
class ControllerExtensionModuleBlog extends Controller {

  public function index() {
    $this->load->language('extension/cms/blog');

    $this->load->model('extension/cms/blog');
    $this->load->model('tool/image');

    $this->document->setTitle($this->language->get('text_blog'));

		  $this->document->addStyle('catalog/view/javascript/blog.css');  

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

    $data['breadcrumbs'] = array();

    $data['breadcrumbs'][] = array(
      'text' => $this->language->get('text_home'),
      'href' => $this->url->link('common/home')
    );

    $data['breadcrumbs'][] = array(
      'text' => $this->language->get('text_blog'),
      'href' => $this->url->link('extension/module/blog')
    );

    if(!empty($blogs)){
      $data['blogs'] = [];

      foreach($blogs as $blog){

        if(!empty($blog['image'])){
          $image = $this->model_tool_image->resize($blog['image'], 1180, 790);
        } else {
          $image = $this->model_tool_image->resize('catalog/blog/default-banner.jpg', 1180, 790);
        }

        $data['blogs'][] = array(
          'id'          => $blog['blog_id'],
          'image'       => $image,
          'title'       => substr($blog['title'],0,30). '..',
          'description' => utf8_substr(trim(strip_tags(html_entity_decode($blog['description'], ENT_QUOTES, 'UTF-8'))), 0, 120) . '..',
          'href'        => $this->url->link('extension/module/blog/info', 'blog_id=' . $blog['blog_id'])
        );
      }
    } else {
      $data['blogs'] = '';
    }
 
    $blogs_total = $this->model_extension_cms_blog->getTotalBlog();

    $pagination = new Pagination();
    $pagination->total = $blogs_total;
    $pagination->page = $page;
    $pagination->limit = $limit;
    $pagination->url = $this->url->link('extension/module/blog', 'page={page}');

    $data['pagination'] = $pagination->render();

    $data['results'] = sprintf($this->language->get('text_pagination'), ($blogs_total) ? (($page - 1) * $limit) + 1 : 0, ((($page - 1) * $limit) > ($blogs_total - $limit)) ? $blogs_total : ((($page - 1) * $limit) + $limit), $blogs_total, ceil($blogs_total / $limit));

    $data['heading_title'] = $this->language->get('text_blog');

    $data['continue'] = $this->url->link('common/home');

    $data['column_left'] = $this->load->controller('common/column_left');
    $data['column_right'] = $this->load->controller('common/column_right');
    $data['content_top'] = $this->load->controller('common/content_top');
    $data['content_bottom'] = $this->load->controller('common/content_bottom');
    $data['footer'] = $this->load->controller('common/footer');
    $data['header'] = $this->load->controller('common/header');

    $this->response->setOutput($this->load->view('cms/blog_list', $data));

  }

  public function info() {
    $this->load->language('extension/cms/blog');

    $this->load->model('extension/cms/blog');
    $this->load->model('tool/image');

    
	$this->document->addStyle('catalog/view/javascript/blog.css'); 
    $data['breadcrumbs'] = array();

    $data['breadcrumbs'][] = array(
      'text' => $this->language->get('text_home'),
      'href' => $this->url->link('common/home')
    );

    $data['breadcrumbs'][] = array(
      'text' => $this->language->get('text_blog'),
      'href' => $this->url->link('extension/module/blog')
    );

    if (isset($this->request->get['blog_id'])) {
      $blog_id = (int)$this->request->get['blog_id'];
    } else {
      $blog_id = 0;
    }
	
	
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

    $all_blogs = $this->model_extension_cms_blog->getBlogs($filter);
	
	 
	$data['all_blogs'] = [];

      foreach($all_blogs as $blog_list){
		  
		   $data['all_blogs'][] = array(
          'id'          => $blog_list['blog_id'],
          'title'       => $blog_list['title'],
          'date_available'       => $blog_list['date_available'],
		  'href'     =>$this->url->link('extension/module/blog/info', 'blog_id='.$blog_list['blog_id'])
		  );
	  }
  
    $blog_info = $this->model_extension_cms_blog->getBlog($blog_id);
    $blog_previous = $this->model_extension_cms_blog->getPreviousBlog($blog_id, $blog_info['sort_order']);
    $blog_next = $this->model_extension_cms_blog->getNextBlog($blog_id, $blog_info['sort_order']);
   
    if ($blog_info) {
      $this->document->setTitle($blog_info['meta_title']);
      $this->document->setDescription($blog_info['meta_description']);
      $this->document->setKeywords($blog_info['meta_keyword']);

      $data['breadcrumbs'][] = array(
        'text' => $blog_info['title'],
        'href' => $this->url->link('blog/blog', 'blog_id=' .  $blog_id)
      );
 
      if(!empty($blog_info['image'])){
        $data['image'] = $this->model_tool_image->resize($blog_info['image'], 950,700);
      } else {
        $data['image'] = $this->model_tool_image->resize('catalog/blog/default-banner.jpg', 900, 450);
      }

      $data['heading_title'] = $blog_info['title'];
      $data['date_available'] = $blog_info['date_available'];
 
      $data['description'] = html_entity_decode($blog_info['description'], ENT_QUOTES, 'UTF-8');
			  
      if(!empty($blog_previous)){
        $data['previous'] = array(
          'title' => $blog_previous['title'],
          'href'  => $this->url->link('extension/module/blog/info', 'blog_id='.$blog_previous['blog_id'])
        );
      }

      if(!empty($blog_next)){
        $data['next'] = array(
          'title' => $blog_next['title'],
          'href'  => $this->url->link('extension/module/blog/info', 'blog_id='.$blog_next['blog_id'])
        );
      }

      $data['back'] = $this->url->link('extension/module/blog');

      if (!$this->request->server['HTTPS']) {
        $data['current_url'] = HTTP_SERVER . 'index.php?route=extension/module/blog/info&blog_id='.$blog_id;
      } else {
        $data['current_url'] = HTTPS_SERVER . 'index.php?route=extension/module/blog/info&blog_id='.$blog_id;
      }

      $data['column_left'] = $this->load->controller('common/column_left');
      $data['column_right'] = $this->load->controller('common/column_right');
      $data['content_top'] = $this->load->controller('common/content_top');
      $data['content_bottom'] = $this->load->controller('common/content_bottom');
      $data['footer'] = $this->load->controller('common/footer');
      $data['header'] = $this->load->controller('common/header');

      $this->response->setOutput($this->load->view('cms/blog_info', $data));
    } else {
      $data['breadcrumbs'][] = array(
        'text' => $this->language->get('text_error'),
        'href' => $this->url->link('blog/blog', 'blog_id=' . $blog_id)
      );

      $this->document->setTitle($this->language->get('text_error'));

      $data['heading_title'] = $this->language->get('text_error');

      $data['text_error'] = $this->language->get('text_error');

      $data['continue'] = $this->url->link('common/home');

      $this->response->addHeader($this->request->server['SERVER_PROTOCOL'] . ' 404 Not Found');

      $data['column_left'] = $this->load->controller('common/column_left');
      $data['column_right'] = $this->load->controller('common/column_right');
      $data['content_top'] = $this->load->controller('common/content_top');
      $data['content_bottom'] = $this->load->controller('common/content_bottom');
      $data['footer'] = $this->load->controller('common/footer');
      $data['header'] = $this->load->controller('common/header');

      $this->response->setOutput($this->load->view('error/not_found', $data));
    }
  }



}
?>
