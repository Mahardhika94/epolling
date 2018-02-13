<?php class Model_update extends CI_Model{

function up_mhs($var,$nim){
$this->db->where('nim',$nim);
$query=$this->db->update('mahasiswa',$var);
return $query;
}

function up_tentang($var){
$this->db->where('id_tent','1');
$query=$this->db->update('tentang',$var);
return $query;
}

function up_poll($var){
	$this->db->where('id_waktu','1');
	$query=$this->db->update('waktu_polling',$var);
	return $quey;
}


function up_quest($var,$id){
	$this->db->where('id_quest',$id);
	$this->db->update('question',$var);
	return $query;

}

function up_profile($var,$id){
	$this->db->where('username',$id);
	$query=$this->db->update('admin',$var);
	return $query;
}

function rest_poll(){
	$var =array('stat_poll'=>'no');
	$query=$this->db->update('mahasiswa',$var);
	return $query;
}
}