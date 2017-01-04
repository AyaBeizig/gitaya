<?php
class Functions extends CI_Model
{
	function __construct(){
		parent :: __construct();
		$this -> load -> database();
	}
	public function get_feeds(){
		$this-> db-> select('*');
		$this-> db-> from ('publication');
		$this-> db-> join('user', 'publication.id = user.id');
		$query = $this -> db -> get();
		return $query -> result_array();
		
	}
}