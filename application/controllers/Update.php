<?php class Update extends CI_Controller{

function __construct(){
	parent::__construct();
	$this->load->helper('url');
	$this->load->model('Model_update');
	$this->load->library('session');
	$this->load->helper('date');
	$this->load->database();
}

function up_mhs($id){
	$nim=$this->input->post('nim');
	$nama=$this->input->post('nama');
	$tgl=$this->input->post('tgl');
	$jenkel=$this->input->post('jenkel');
	$prodi=$this->input->post('prodi');
	$status=$this->input->post('status');
	$thm=$this->input->post('thm');
	$pass=md5($nim);
	$var=array('nim'=>$nim,'nama'=>$nama,'jenkel'=>$jenkel,'tgl_lahir'=>$tgl,'fakultas'=>'FISE','prodi'=>$prodi,'tahun_masuk'=>$thm,'status'=>$status,
				'password'=>$pass,'stat_pass'=>'no','stat_poll'=>'no');
	$input=$this->Model_update->up_mhs($var,$id);
	if($input == true){
		redirect('Admin/mhs');
	}else{
		echo "Proses menambah data mahasiswa gagal coba beberapa saat lagi";

	}
}

function up_tentang(){
	$tentang=$this->input->post('tentang');
	$email=$this->input->post('email');
	$nope=$this->input->post('nope');
	$var=array('tentang'=>$tentang,'email'=>$email,'nope'=>$nope);
	$this->Model_update->up_tentang($var);
	redirect('Admin/tentang');
}

function up_petunjuk(){
	$petunjuk=$this->input->post('nav');
	$var=array('petunjuk'=>$petunjuk);
	$this->Model_update->up_tentang($var);
	redirect('Admin/petunjuk');
}
function up_poll(){
	$awal=$this->input->post('tgl1');
	$akhir=$this->input->post('tgl2');
	$stat='aktif';
	$var=array('waktu_mulai'=>$awal,'waktu_akhir'=>$akhir,'status_waktu'=>$stat);
	$this->Model_update->up_poll($var);
	redirect('Admin/setting');

}

function reset_poll(){
 $stat='non aktif';
 $var=array('status_waktu'=>$stat);
 $this->Model_update->up_poll($var);
 $this->Model_update->rest_poll();
 redirect('Admin/setting');
}


function up_quest($id){
	$nomor=$this->input->post('nomor');
	$title=$this->input->post('judul');
	$quest=$this->input->post('quest');
	$var=array('nomor'=>$nomor,'title'=>$title,'pertanyaan'=>$quest);
	$this->Model_update->up_quest($var,$id);
	redirect('Admin/data_poling');
}


function up_pro($id){
	$username=$this->input->post('username');
	$nama=$this->input->post('nama');
	$email=$this->input->post('email');
	$pass=$this->input->post('password');
	$newpass=md5($pass);
	$var=array('username'=>$username,'nama'=>$nama,'email'=>$email,'password'=>$newpass);
	$r=$this->Model_update->up_profile($var,$id);
	if($r == true){
	$this->session->set_userdata('password',$pass);
	$this->session->set_userdata('nama',$nama);
	$this->session->set_userdata('username',$username);
	redirect('Admin/profil');
	}else{
	redirect('Admin/profil');
	}
}


}