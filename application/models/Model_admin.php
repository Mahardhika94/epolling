<?php class Model_admin extends CI_Model{

function get_admin($username){
	$this->db->where('username',$username);
	$query=$this->db->get('admin');
	return $query;
}

function login($pass,$username){
	$newpass=md5($pass);
	$this->db->where('username',$username);
	$this->db->where('password',$newpass);
	$query=$this->db->get('admin');
	return $query->result();
}


function get_tentang(){
$this->db->where('id_tent',1);
$query=$this->db->get('tentang');
return $query;

}

function get_waktu(){
$this->db->where('id_waktu',1);
$query=$this->db->get('waktu_polling');
return $query;
}

function get_nomor_poll($no){
	$this->db->where('nomor',$no);
	$query=$this->db->get('question');
	return $query->result();
}

function get_datamhs(){
$query=$this->db->get('mahasiswa');
return $query->result();

}

function get_mhs(){
$stat='yes';
$query=$this->db->query('SELECT COUNT( * ) AS dr FROM mahasiswa WHERE stat_poll  ="'.$stat.'";');
return $query;
}

function get_mhs_quer($prod){
$query=$this->db->query('SELECT COUNT( * ) AS dd FROM mahasiswa WHERE prodi  ="'.$prod.'";');
return $query;
}

function del_mhs($nim){
	$this->db->where('nim',$nim);
	$query=$this->db->delete('mahasiswa');
	return $query;

}


function det_mhs($nim){
	$this->db->where('nim',$nim);
	$query=$this->db->get('mahasiswa');
	return $query;
}
function get_soal(){
  $this->db->order_by('nomor');
  $query=$this->db->get('question');
  return $query->result();
}

function del_quest($id){
	$this->db->where('id_quest',$id);
	$query=$this->db->delete('question');
	return $query;

}

function det_quest($id){
	$this->db->where('id_quest',$id);
	$query=$this->db->get('question');
	return $query;
}

function get_user(){
	//$this->db->where('stat_admin','user admin');
	//$this->db->where('stat_admin','super admin');
	$query=$this->db->query('select * from admin where stat_admin ="super admin" or stat_admin="user admin";');
	//$query=$this->db->get('admin');
	return $query->result();
}

function del_user($id){
	$this->db->where('id_user',$id);
	$query=$this->db->delete('admin');
	return $query;
}

function get_per($no){
	$query=$this->db->query('SELECT COUNT( * ) AS jum FROM polling WHERE nomor  ="'.$no.'";');
		return $query;	
}

function get_yes($no){
	$jb='yes';
	$query=$this->db->query('SELECT COUNT( * ) AS yes FROM polling WHERE nomor  ="'.$no.'" and jb  ="'. $jb .  '";');
		return $query;	
}

function get_no($no){
	$jb='no';
	$query=$this->db->query('SELECT COUNT( * ) AS no FROM polling WHERE nomor  ="'.$no.'" and jb  ="'. $jb .  '";');
		return $query;	
}

function get_saran(){
	$query=$this->db->get('saran');
	return $query->result();
}
} 