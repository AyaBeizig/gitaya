<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Delete_model extends CI_Model{
	
// Function to select all from table name students.
function show_students(){
$query = $this->db->get('students');
$query_result = $query->result();
return $query_result;
}

// Function to select particular record from table name students.
function show_student_id($data){
$this->db->select('*');
$this->db->from('students');
$this->db->where('student_id', $data);
$query = $this->db->get();
$result = $query->result();
return $result;
}

// Function to Delete selected record from table name students.
function delete_student_id($id){
$this->db->where('student_id', $id);
$this->db->delete('students');
}
}
?> 