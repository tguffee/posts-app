<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Post_Controller extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	
	public function __construct() {
		parent::__construct();

		$this->load->model('Post_model');
	}
	
	public function index() {
		$this->load->view('post_view');
	}
	
	//retrieves all posts from db
	public function loadPosts() {
		$posts = $this->Post_model->getPosts();
		$data = array();
		$data['posts'] = $posts;
		echo json_encode($data);
	}
	
	//calls crowdtangle api to get posts and persists to db
	public function refreshPosts() {
		$curl = curl_init();
		curl_setopt_array($curl, array(
				CURLOPT_RETURNTRANSFER => 1,
				CURLOPT_URL => 'https://api.crowdtangle.com/posts?token=2xpyFYUqGbuNPzkbhmGVYHMiskH6A46kTL5bSkg8&sortBy=total_interactions',
				CURLOPT_SSL_VERIFYHOST => 0,
				CURLOPT_SSL_VERIFYPEER => 0
				
		));
		$resp = curl_exec($curl);
		curl_close($curl);
		
		$obj = json_decode($resp);
		$posts = $obj->result->posts;
		foreach ($posts as $post) {
			$this->Post_model->insertPost($post);
		}
	}
	
	//deletes post from db
	public function deletePost() {
		$post_id = $_POST['id'];
		$update_criteria = array('id' => $post_id);
		$this->Post_model->deletePost($update_criteria);
	}
	
}

/* End of file posts_controller.php */
/* Location: ./application/controllers/posts_controller.php */