<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Insert_ctrl extends CI_Controller {

function __construct() {
parent::__construct();
$this->load->model('insert_model');
}
function index() {
//Including validation library
$this->load->library('form_validation');

$this->form_validation->set_error_delimiters('<div class="error">', '</div>');

//Validating Name Field
$this->form_validation->set_rules('dname', 'Username');

//Validating Email Field
$this->form_validation->set_rules('demail', 'Email' );

//Validating Mobile no. Field
$this->form_validation->set_rules('dmobile', 'Mobile No.');

//Validating Address Field
$this->form_validation->set_rules('daddress', 'Address');

if ($this->form_validation->run() == FALSE) {
$this->load->view('insert_view');
} else {
//Setting values for tabel columns
$data = array(
'Student_Name' => $this->input->post('dname'),
'Student_Email' => $this->input->post('demail'),
'Student_Mobile' => $this->input->post('dmobile'),
'Student_Address' => $this->input->post('daddress')
);
//Transfering data to Model
$this->insert_model->form_insert($data);
$data['message'] = 'Data Inserted Successfully';
//Loading View
$this->load->view('insert_view', $data);
}
}

}

?>