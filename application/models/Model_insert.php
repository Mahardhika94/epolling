<?php class Model_insert extends CI_Model{

function add_mhs($var){
$query=$this->db->insert('mahasiswa',$var);
return $query;
}

function add_quest($var){
	$query=$this->db->insert('question',$var);
	return $query;
}

function add_user($var){
	$this->db->insert('admin',$var);

}

}