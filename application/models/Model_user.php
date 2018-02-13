<?php class Model_user extends CI_Model{

  function get_soal(){
	$query=$this->db->get('question');
	return $query->result();
	}
   function login($nim,$pass){
		$this->db->where('nim',$nim);
		$this->db->where('password',$pass);
		$query=$this->db->get('mahasiswa');
		return $query->result();
	}
	
	function get_dtmhs($nim){
		$this->db->where('nim',$nim);
		$query=$this->db->get('mahasiswa');
		return $query;}
		
	
	function sel_mhs($nim,$jenkel,$tgl,$prodi){
		$this->db->where('nim',$nim);
		$this->db->where('jenkel',$jenkel);
		$this->db->where('tgl_lahir',$tgl);
		$this->db->where('prodi',$prodi);
		$query=$this->db->get('mahasiswa');
		return $query->result();
	}
	
	function up_pass($nim,$var){
		$this->db->where('nim',$nim);
		$query=$this->db->update('mahasiswa',$var);
		return $query;
	}
	
	function get_tetang(){
		$query=$this->db->get('tentang');
		return $query;
	}
	
	function get_timpoll(){
		$query=$this->db->get('waktu_polling');
		return $query;
	}
	
	function add_saran($var){
		$query=$this->db->insert('saran',$var);
		return $query;
	}
}