<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Delete_ctrl extends CI_Controller{
function __construct(){
parent::__construct();
$this->load->model('delete_model');
}

// Function to Fetch selected record from database.
function show_student_id() {
$id = $this->uri->segment(3);
$data['students'] = $this->delete_model->show_students();
$data['single_student'] = $this->delete_model->show_student_id($id);
$this->load->view('delete_view', $data);
}
// Function to Delete selected record from database.
function delete_student_id() {
$id = $this->uri->segment(3);
$this->delete_model->delete_student_id($id);
$this->show_student_id();
}
}
?>