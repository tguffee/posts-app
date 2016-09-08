<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 


class Post_model extends CI_Model {


  function __construct() {
    parent::__construct();
    
  } 

  function getPosts() {
  	$query = $this->db->order_by('id', 'ASC')->get('posts');
  	$results = array();
  	foreach ($query->result() as $result) {
  		$results[] = $result;
  	}
  	return $results;
  }
  
  function insertPost($data) {
  	
  	$this->db->replace('posts', $data);
  }
  
  function deletePost($update_criteria) {
  	$this->db->delete('posts', $update_criteria);
  	
  }

}