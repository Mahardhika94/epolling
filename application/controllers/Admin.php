<?php class Admin extends CI_Controller{

function __construct(){
	parent::__construct();
	$this->load->database();
	$this->load->library('session');
	$this->load->helper('url');
	$this->load->helper('date');
	$this->load->model('Model_admin');

}

function login(){
	$username=$this->input->post('username');
	$pass=$this->input->post('password');
	$log=$this->Model_admin->login($pass,$username);
	$cn=count($log);
	if($cn>0){
		$dt=$this->Model_admin->get_admin($username);
		$row=$dt->row_array();
		$this->session->set_userdata('nama',$row['nama']);
		$this->session->set_userdata('password',$pass);
		$this->session->set_userdata('username',$row['username']);
		$this->session->set_userdata('email',$row['email']);
		$this->session->set_userdata('stat',$row['stat_admin']);
		redirect('Admin/index');
	}else{
		$this->load->view("err_log");}
}

function logout(){
	$this->session->unset_userdata('pass');
	$this->session->unset_userdata('nama');
	$this->session->unset_userdata('stat');
	$this->session->unset_userdata('username');
	$this->session->unset_userdata('email');
	redirect('Admin/index');

}

function index(){
	$stat=$this->session->userdata('stat');
	$nama=$this->session->userdata('nama');
	if($stat =='root admin'){
		$data['stat']=$stat;
		$data['nama']=$nama;
        $this->load->view('admin/index',$data);
	}elseif($stat =='super admin'){
		$data['stat']=$stat;
		$data['nama']=$nama;
        $this->load->view('admin/index',$data);
	}elseif($stat =='user admin'){
		$data['stat']=$stat;
		$data['nama']=$nama;
        $this->load->view('admin/index',$data);
	}else{
		$this->load->view('admin/login');
	}

}

function tentang(){
	$stat=$this->session->userdata('stat');
	$nama=$this->session->userdata('nama');
	$dt=$this->Model_admin->get_tentang();
	$row=$dt->row_array();
	$data['tentang']=$row['tentang'];
	$data['email']=$row['email'];
	$data['nope']=$row['nope'];
	if($stat =='root admin'){
		$data['stat']=$stat;
		$data['nama']=$nama;
        $this->load->view('admin/tentang',$data);
	}elseif($stat =='super admin'){
		$data['stat']=$stat;
		$data['nama']=$nama;
        $this->load->view('admin/tentang',$data);
	}elseif($stat =='user admin'){
		$data['stat']=$stat;
		$data['nama']=$nama;
        $this->load->view('admin/tentang',$data);
	}else{
		$this->load->view('admin/login');
	}

}

function petunjuk(){
	$stat=$this->session->userdata('stat');
	$nama=$this->session->userdata('nama');
	$dt=$this->Model_admin->get_tentang();
	$row=$dt->row_array();
	$data['nav']=$row['petunjuk'];
	if($stat =='root admin'){
		$data['stat']=$stat;
		$data['nama']=$nama;
        $this->load->view('admin/petunjuk',$data);
	}elseif($stat =='super admin'){
		$data['stat']=$stat;
		$data['nama']=$nama;
        $this->load->view('admin/petunjuk',$data);
	}elseif($stat =='user admin'){
		$data['stat']=$stat;
		$data['nama']=$nama;
        $this->load->view('admin/petunjuk',$data);
	}else{
		$this->load->view('admin/login');
	}

}

function setting(){
	$stat=$this->session->userdata('stat');
	$nama=$this->session->userdata('nama');
	$pass=$this->session->userdata('password');
	$dt=$this->Model_admin->get_waktu();
	$row=$dt->row_array();
	$data['awal']=$row['waktu_mulai'];
	$data['akhir']=$row['waktu_akhir'];
	$data['status']=$row['status_waktu'];
	if($stat =='root admin'){
		$data['stat']=$stat;
		$data['nama']=$nama;
		$data['pwd']=$pass;
        $this->load->view('admin/setting',$data);
	}elseif($stat =='super admin'){
		$data['stat']=$stat;
		$data['nama']=$nama;
        $this->load->view('admin/index',$data);
	}elseif($stat =='user admin'){
		$data['stat']=$stat;
		$data['nama']=$nama;
        $this->load->view('admin/index',$data);
	}else{
		$this->load->view('admin/login');
	}

}

function mhs(){
	$stat=$this->session->userdata('stat');
	$nama=$this->session->userdata('nama');
	if($stat =='root admin'){
	    $data['data']=$this->Model_admin->get_datamhs();
		$data['stat']=$stat;
		$data['nama']=$nama;
        $this->load->view('admin/data_mhs',$data);
	}elseif($stat =='super admin'){
		$data['data']=$this->Model_admin->get_datamhs();
		$data['stat']=$stat;
		$data['nama']=$nama;
        $this->load->view('admin/data_mhs',$data);
	}elseif($stat =='user admin'){
		$data['data']=$this->Model_admin->get_datamhs();
		$data['stat']=$stat;
		$data['nama']=$nama;
        $this->load->view('admin/data_mhs',$data);
	}else{
		$this->load->view('admin/login');
	}

}

function ins_mhs(){
	$stat=$this->session->userdata('stat');
	$nama=$this->session->userdata('nama');
	if($stat =='root admin'){
		$data['stat']=$stat;
		$data['nama']=$nama;
        $this->load->view('admin/add_mhs',$data);
	}elseif($stat =='super admin'){
		$data['stat']=$stat;
		$data['nama']=$nama;
        $this->load->view('admin/add_mhs',$data);
	}elseif($stat =='user admin'){
		$data['stat']=$stat;
		$data['nama']=$nama;
        $this->load->view('admin/add_mhs',$data);
	}else{
		$this->load->view('admin/login');
	}

}


function data_poling(){
	$stat=$this->session->userdata('stat');
	$nama=$this->session->userdata('nama');
	if($stat =='root admin'){
	    $data['data']=$this->Model_admin->get_soal();
		$data['stat']=$stat;
		$data['nama']=$nama;
        $this->load->view('admin/data_poling',$data);
	}elseif($stat =='super admin'){
	$data['data']=$this->Model_admin->get_soal();
		$data['stat']=$stat;
		$data['nama']=$nama;
        $this->load->view('admin/data_poling',$data);
	}elseif($stat =='user admin'){
	$data['data']=$this->Model_admin->get_soal();
		$data['stat']=$stat;
		$data['nama']=$nama;
        $this->load->view('admin/data_poling',$data);
	}else{
		$this->load->view('admin/login');
	}

}

function add_poling(){
	$stat=$this->session->userdata('stat');
	$nama=$this->session->userdata('nama');
	if($stat =='root admin'){
		$quer=$this->db->get('question')->result();
		$cn=count($quer);
		$data['stat']=$stat;
		$data['nama']=$nama;
		$data['nomor']=$cn+1;
        $this->load->view('admin/add_question',$data);
	}elseif($stat =='super admin'){
		$data['stat']=$stat;
		$data['nama']=$nama;
        $this->load->view('admin/index',$data);
	}elseif($stat =='user admin'){
		$data['stat']=$stat;
		$data['nama']=$nama;
        $this->load->view('admin/index',$data);
	}else{
		$this->load->view('admin/login');
	}

}

function del_quest($id){
	$this->Model_admin->del_quest($id);
	redirect('Admin/data_poling');
}

function det_quest($id){
	$stat=$this->session->userdata('stat');
	$nama=$this->session->userdata('nama');
	if($stat =='root admin'){
	    $dt=$this->Model_admin->det_quest($id);
		$row=$dt->row_array();
		$data['nomor']=$row['nomor'];
		$data['pertanyaan']=$row['pertanyaan'];
		$data['judul']=$row['title'];
		$data['id']=$row['id_quest'];
		$data['stat']=$stat;
		$data['nama']=$nama;
        $this->load->view('admin/up_quest',$data);
	}elseif($stat =='super admin'){
		$data['stat']=$stat;
		$data['nama']=$nama;
        $this->load->view('admin/index',$data);
	}elseif($stat =='user admin'){
		$data['stat']=$stat;
		$data['nama']=$nama;
        $this->load->view('admin/index',$data);
	}else{
		$this->load->view('admin/login');
	}
}

function hasil(){
	$stat=$this->session->userdata('stat');
	$nama=$this->session->userdata('nama');
	$sr=$this->input->post('search');
	if($sr ==''){
		 $data['kon']='h';
	}elseif($sr ==  'Pilih Hasil Poling yang ingin dilihat' ){
		$data['kon']='h';
	}
	else{
	   $data['kon']='s';
	   $t=explode('|',$sr);
	    $nomor=(int)$t[0];
		$data['title']=$t[1];
	   //-------------------------------setuju (yes)--------------------------------------\\\\
	                                $dt=$this->Model_admin->get_per($nomor);
									$row=$dt->row_array();
									$jum=$row['jum'];
									$dr=$this->Model_admin->get_yes($nomor);
									$row1=$dr->row_array();
									$yes=$row1['yes'];
									if( $jum == 0 or $yes == 0){
										$data['yes']=0;

									}else{
										$r = $yes * 100 / $jum;
										$data['yes']=$r;
									}
	//-------------------------------setuju (yes)--------------------------------------\\\\

	 //-------------------------------tidak setuju (no)--------------------------------------\\\\
	                                $dt=$this->Model_admin->get_per($nomor);
									$row=$dt->row_array();
									$jum1=$row['jum'];
									$dr1=$this->Model_admin->get_no($nomor);
									$row1=$dr1->row_array();
									$no=$row1['no'];
									if( $jum1 == 0 or $no == 0){
										$data['no']=0;

									}else{
										$r1 = $no * 100 / $jum;
										$data['no']=$r1;

									}
	//-------------------------------tidak setuju (no)--------------------------------------\\\\
// echo $jum1 .' '. $nomor .' '. $data['yes'].' '. $data['no'];
	}


	///*

	$dt=$this->Model_admin->get_waktu();
	$row=$dt->row_array();
	$tgl=$row['waktu_akhir'];
	$status=$row['status_waktu'];
	$tglnow=date(20 ."y-m-d");
	$data['awal']=$row['waktu_mulai'];
	$data['akhir']=$row['waktu_akhir'];
	if($tglnow > $tgl && $status =='aktif'){
		$data['soal']=$this->Model_admin->get_soal();
		$data['jum_mhs']=count($this->Model_admin->get_datamhs());
		$dk=$this->Model_admin->get_mhs();
		$row22=$dk->row_array();
		$data['jum_mhspoll']=$row22['dr'];

		$ak=$this->Model_admin->get_mhs_quer('Akuntansi');
		$row1=$ak->row_array();
		$data['akuntan']=$row1['dd'];

		$ak=$this->Model_admin->get_mhs_quer('Hubungan Internasional');
		$row=$ak->row_array();
		$data['hi']=$row['dd'];

		$ak=$this->Model_admin->get_mhs_quer('Sastra Inggris');
		$row=$ak->row_array();
		$data['si']=$row['dd'];

		$ak=$this->Model_admin->get_mhs_quer('Ilmu Komunikasi');
		$row=$ak->row_array();
		$data['ilkom']=$row['dd'];
		if($stat =='root admin'){
				$data['stat']=$stat;
				$data['nama']=$nama;
				$this->load->view('admin/hasil',$data);
			}elseif($stat =='super admin'){
				$data['stat']=$stat;
				$data['nama']=$nama;
				$this->load->view('admin/hasil',$data);
			}elseif($stat =='user admin'){
				$data['stat']=$stat;
				$data['nama']=$nama;
				$this->load->view('admin/hasil',$data);
			}else{
				$this->load->view('admin/login');
			}


	}else{

		$this->load->view("admin/err_page");
	} //*/
}

function coba22(){
$dt=$this->Model_admin->get_mhs_quer('Hubungan Internasional');
$row=$dt->row_array();
echo $row['dd'];
}

function laporan(){
	$stat=$this->session->userdata('stat');
	$nama=$this->session->userdata('nama');
	$dt=$this->Model_admin->get_waktu();
	$row=$dt->row_array();
	$tgl=$row['waktu_akhir'];
	$status=$row['status_waktu'];
	$tglnow=date(20 ."y-m-d");
			$data['awal']=$row['waktu_mulai'];
		$data['akhir']=$row['waktu_akhir'];
	if($tglnow > $tgl && $status =='aktif'){
		$data['soal']=$this->Model_admin->get_soal();
		$data['jum_mhs']=count($this->Model_admin->get_datamhs());
		$data['jum_mhspoll']=count($this->Model_admin->get_mhs());

		$ak=$this->Model_admin->get_mhs_quer('Akuntansi');
		$row1=$ak->row_array();
		$data['akuntan']=$row1['dd'];

		$ak=$this->Model_admin->get_mhs_quer('Hubungan Internasional');
		$row=$ak->row_array();
		$data['hi']=$row['dd'];

		$ak=$this->Model_admin->get_mhs_quer('Sastra Inggris');
		$row=$ak->row_array();
		$data['si']=$row['dd'];

		$ak=$this->Model_admin->get_mhs_quer('Ilmu Komunikasi');
		$row=$ak->row_array();
		$data['ilkom']=$row['dd'];



		if($stat =='root admin'){
			$data['stat']=$stat;
			$data['nama']=$nama;
			$this->load->view('admin/laporan',$data);
		}elseif($stat =='super admin'){
			$data['stat']=$stat;
			$data['nama']=$nama;
			$this->load->view('admin/laporan',$data);
		}elseif($stat =='user admin'){
			$data['stat']=$stat;
			$data['nama']=$nama;
			$this->load->view('admin/laporan',$data);
		}else{
			$this->load->view('admin/login');
		}

	}else{

		$this->load->view("admin/err_page");
	}


}

function tgl(){
$dt="20017-08-08";

 $tgl = date(20 ."y-m-d");
 if($dt > $tgl){
 echo "besar";
 }else{

 echo "kecil";
 }
//echo $tgl;
}


function profil(){
	$stat=$this->session->userdata('stat');
	$pass=$this->session->userdata('password');
	$nama=$this->session->userdata('nama');
	if($stat =='root admin'){
		$data['stat']=$stat;
		$data['nama']=$nama;
		$data['pwd']=$pass;
		$data['email']=$this->session->userdata('email');
		$data['username']=$this->session->userdata('username');
        $this->load->view('admin/profil',$data);
	}elseif($stat =='super admin'){
		$data['stat']=$stat;
		$data['nama']=$nama;
		$data['pwd']=$pass;
		$data['email']=$this->session->userdata('email');
		$data['username']=$this->session->userdata('username');
        $this->load->view('admin/profil',$data);
	}elseif($stat =='user admin'){
		$data['stat']=$stat;
		$data['nama']=$nama;
		$data['pwd']=$pass;
		$data['email']=$this->session->userdata('email');
		$data['username']=$this->session->userdata('username');;
        $this->load->view('admin/profil',$data);
	}else{
		$this->load->view('admin/login');
	}

}

function get_user(){
	$data=$this->Model_admin->get_user();
	echo json_encode($data);
}



function del_user(){
	$id=$this->input->post('id');
	$data = $this->Model_admin->del_user($id);
	echo json_encode($data);

}

function del_user2($id){

	$this->db->where('id_user',$id);
	$this->db->delete('admin');
	redirect('Admin/user');

}

function user(){
	$stat=$this->session->userdata('stat');
	$nama=$this->session->userdata('nama');
	if($stat =='root admin'){
	    $data['data']=$this->Model_admin->get_user();
		$data['stat']=$stat;
		$data['nama']=$nama;
        $this->load->view('admin/add_user',$data);
	}elseif($stat =='super admin'){
		$data['stat']=$stat;
		$data['nama']=$nama;
        $this->load->view('admin/index',$data);
	}elseif($stat =='user admin'){
		$data['stat']=$stat;
		$data['nama']=$nama;
        $this->load->view('admin/index',$data);
	}else{
		$this->load->view('admin/login');
	}

}

function sel_mhs($nim){
	$stat=$this->session->userdata('stat');
	$nama=$this->session->userdata('nama');

	if($stat =='root admin'){
		$data['stat']=$stat;
		$data['nama']=$nama;
		$dt=$this->Model_admin->det_mhs($nim);
		$row=$dt->row_array();
		$data['nama_mhs']=$row['nama'];
		$data['jenkel']=$row['jenkel'];
		$data['tgl_lahir']=$row['tgl_lahir'];
		$data['jenkel']=$row['jenkel'];
		$data['prodi']=$row['prodi'];
		$data['tahun_masuk']=$row['tahun_masuk'];
		$data['status']=$row['status'];
		$data['nim']=$nim;
        $this->load->view('admin/up_mhs',$data);
	}elseif($stat =='super admin'){
	    $dt=$this->Model_admin->det_mhs($nim);
		$row=$dt->row_array();
		$data['nama_mhs']=$row['nama'];
		$data['jenkel']=$row['jenkel'];
		$data['tgl_lahir']=$row['tgl_lahir'];
		$data['jenkel']=$row['jenkel'];
		$data['prodi']=$row['prodi'];
		$data['tahun_masuk']=$row['tahun_masuk'];
		$data['status']=$row['status'];
		$data['nim']=$nim;
		$data['stat']=$stat;
		$data['nama']=$nama;

        $this->load->view('admin/up_mhs',$data);
	}elseif($stat =='user admin'){
		$data['stat']=$stat;
		$data['nama']=$nama;
        $this->load->view('admin/index',$data);
	}else{
		$this->load->view('admin/login');
	}

}
 function del_mhs($nim){
	$r=$this->Model_admin->del_mhs($nim);
	if($r == true){
		redirect('Admin/mhs');
	}else{
		echo "gagal Menghpus data coba beberapa saat lagi";
	}

}

function sel_no($no){
  $dt=$this->Model_admin->get_nomor_poll($no);
  $row=count($dt);
  if($row>0){
  echo "ada";
  }else{
  echo "tidak ada";
  }
}

function komen(){
		$stat=$this->session->userdata('stat');
	$nama=$this->session->userdata('nama');
	if($stat =='root admin'){
		$data['stat']=$stat;
		$data['nama']=$nama;
        $data['saran']=$this->Model_admin->get_saran();
	$this->load->view('admin/komen',$data);
	}elseif($stat =='super admin'){
		$data['stat']=$stat;
		$data['nama']=$nama;
        $data['saran']=$this->Model_admin->get_saran();
	$this->load->view('admin/komen',$data);
	}elseif($stat =='user admin'){
		$data['stat']=$stat;
		$data['nama']=$nama;
        $data['saran']=$this->Model_admin->get_saran();
	$this->load->view('admin/komen',$data);
	}else{
		$this->load->view('admin/login');
	}

}

function cb(){
	$dt['dt'. 1]=99;
	for($x = 1; $x <6; $x++){
	$dt['dt' . $x]=$x;
	}

	for($y = 1; $y <6; $y++){
	echo $dt['dt' . $y] .'</br>';
	}
}

function cb2(){
 for ($x=1;$x<15; $x++){
	$var=array('cb'=>$x);
	$this->db->insert('cb',$var);
 }


}
}
