<?php class Insert extends CI_Controller{

function __construct(){
	parent::__construct();
	$this->load->helper('url');
	$this->load->model('Model_insert');
	$this->load->library('session');
	$this->load->helper('date');
	$this->load->database();
}

function add_mhs(){
	$nim=$this->input->post('nim');
	$nama=$this->input->post('nama');
	$tgl=$this->input->post('tgl');
	$jenkel=$this->input->post('jenkel');;
	$prodi=$this->input->post('prodi');
	$status=$this->input->post('status');
	$thm=$this->input->post('thm');
	$pass=md5($nim);
	$var=array('nim'=>$nim,'nama'=>$nama,'jenkel'=>$jenkel,'tgl_lahir'=>$tgl,'fakultas'=>'FISE','prodi'=>$prodi,'tahun_masuk'=>$thm,'status'=>$status,
				'password'=>$pass,'stat_pass'=>'no','stat_poll'=>'no');
	$input=$this->Model_insert->add_mhs($var);
	if($input == true){
		redirect('Admin/mhs');
	}else{
		echo "Proses menambah data mahasiswa gagal coba beberapa saat lagi";

	}
}

function add_quest(){
	$nomor=$this->input->post('nomor');
	$title=$this->input->post('judul');
	$quest=$this->input->post('quest');
	$var=array('nomor'=>$nomor,'title'=>$title,'pertanyaan'=>$quest);
	$this->Model_insert->add_quest($var);
	redirect('Admin/data_poling');
}

function add_user(){
	$username=$this->input->post('username');
	$level=$this->input->post('level');
	$pass=$this->input->post('password');
	$newpass=md5($pass);
	$var=array('username'=>$username,'stat_admin'=>$level,'password'=>$newpass);
	$data=$this->Model_insert->add_user($var);
	echo json_encode($data);
	//redirect('Admin/user');


}

function add_user2(){
	$username=$this->input->post('username');
	$level=$this->input->post('level');
	$pass=$this->input->post('password');
	$newpass=md5($pass);
	$var=array('username'=>$username,'stat_admin'=>$level,'password'=>$newpass);
	$data=$this->Model_insert->add_user($var);
	redirect('Admin/user');


}

}
