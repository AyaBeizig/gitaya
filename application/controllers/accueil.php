<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Accueil extends CI_Controller {
	function __construct(){
		parent :: __construct();
	}

Public function index() {
	$this-> load-> model('Functions');
	$data['body_data'] = $this-> Functions-> get_feeds();
	/*$data['title'] = 'Accueil' ;
	$data['page_class'] = 'news_feed' ;*/
	
$this->load->view('template/header');
$this->load->view('body');
$this->load->view('template/footer');

}
}
?>