<?php class User extends CI_Controller{

function __construct(){
	parent::__construct();
	$this->load->database();
	$this->load->helper('url');
	$this->load->library('session');
	$this->load->helper('date');
	$this->load->model('Model_user');
	}

	function index(){
		$stat=$this->session->userdata('stat');
		$nim =$this->session->userdata('nim');
		if($stat =='mhs' && $nim != ''){
			redirect('User/main_user');
		}else{
			$this->load->view('user/login');
		}
	/*
	echo $stat .'</br>';
	echo $nim; */
	}
	function log(){
	$this->load->view('user/login');

	}

	function log_out(){
		$this->session->unset_userdata('stat');
		$this->session->unset_userdata('nim');
		redirect('User/index');

	}

	function login_mhs(){
		$nim=$this->input->post('nim');
		$pass=$this->input->post('password');
		$newpass=md5($pass);
		$log=$this->Model_user->login($nim,$newpass);
		$con =count($log);
		//echo $con;
		if($con > 0){
			$dt=$this->Model_user->get_dtmhs($nim);
			$row=$dt->row_array();
			if($row['status']=='Non Aktif'){
					 $this->load->view('err_log2');
			}
			else if($row['stat_pass'] == 'no'){
				$data['nim']=$nim;
				$this->load->view('user/konfirm_password',$data);
			}else{
				$this->session->set_userdata('stat','mhs');
				$this->session->set_userdata('nim',$nim);
				redirect('User/main_user');
			}
		}else{
			 $this->load->view('err_log');
		}
	}



	function konfirm(){
		$nim=$this->input->post('nim');
		$jenkel=$this->input->post('jenkel');
		$tgl=$this->input->post('tgl');
		$prodi=$this->input->post('prodi');
		$pass=$this->input->post('pass');
		$dt=$this->Model_user->sel_mhs($nim,$jenkel,$tgl,$prodi);
		$cn=count($dt);
		if($cn > 0){
			$newpass=md5($pass);
			$var=array('password'=>$newpass,'stat_pass'=>'yes');
			$this->Model_user->up_pass($nim, $var);
			$this->load->view('user/suc_confirm');
		}else{
			$this->load->view('user/galat_pass');
		}


	}

	function main_user(){
		$stat=$this->session->userdata('stat');
		$nim=$this->session->userdata('nim');
		if($stat =='mhs' && $nim != ''){
			$this->load->view('user/main_user');
		}else{
			redirect('User/index');
		}

	}


	function tentang(){
		$dt=$this->Model_user->get_tetang();
		$row=$dt->row_array();
		$data['tentang']=$row['tentang'];
		$data['email']=$row['email'];
		$data['nope']=$row['nope'];
		$data['stat']=$this->session->userdata('stat');
		$this->load->view('user/tentang',$data);
	}

	function nav(){
		$stat=$this->session->userdata('stat');
		if($stat == 'mhs'){
			$dt=$this->Model_user->get_tetang();
			$row=$dt->row_array();
			$data['nav']=$row['petunjuk'];
			$this->load->view('user/nav',$data);
		}else{
			redirect('User/index');
		}

	}

	function polling(){
		$stat=$this->session->userdata('stat');
		$nim=$this->session->userdata('nim');
		if($stat == 'mhs' && $nim !=''){
			$dt=$this->Model_user->get_dtmhs($nim);
			$row=$dt->row_array();
			$st_poll =$row['stat_poll'];
			$tglnow=date(20 ."y-m-d");
			//***** mengambil data waktu polling **//
			$dr=$this->Model_user->get_timpoll();
			$rw=$dr->row_array();
			$tgl_aw=$rw['waktu_mulai'];
			$tgl_ak=$rw['waktu_akhir'];
			$stat_wk=$rw['status_waktu'];
				if($tglnow >= $tgl_aw && $tglnow <= $tgl_ak && $st_poll == 'no'  && $stat_wk == 'aktif'){
					redirect('User/tampill_poll');
				}else{
					$this->load->view('user/galat_polling');
				}
		}else{
			redirect('User/index');
		}
	}


	function tampill_poll(){
		$stat=$this->session->userdata('stat');
		$nim =$this->session->userdata('nim');
		$data['soal']=$this->Model_user->get_soal();
		if($stat =='mhs' && $nim !=''){
			$this->load->view('user/polling',$data);
		}else{
			redirect('User/index');
		}
	}

	function pilih_polling(){
	$nim=$this->session->userdata('nim');
	  $dt=$this->Model_user->get_soal();
	  $jum=count($dt);
	  $k=0;
	  for($x =1; $x<=$jum; $x++){
	    $dt['jb'. $x]=$this->input->post('jb'. $x);
		$dt['no'. $x]=$this->input->post('no'. $x);
		$var=array('nomor'=>$dt['no'. $x], 'nim'=>$nim,'jb'=>$dt['jb'. $x]);
		$r=$this->db->insert('polling',$var);
		if($r == true){
		  $k=$k+1;
		}

	  }

	 // for($x =1; $x<=$jum; $x++){echo 'nomor ' . $dt['no'. $x].' jawaban : '. $dt['jb'. $x] .'</br>'; }
 if($k == $jum){
		 $var1=array('stat_poll'=>'yes');
		 $this->db->where('nim',$nim);
		 $this->db->update('mahasiswa',$var1);
		 $this->load->view('user/komen');
	  }else{
		$this->db->where('nim',$nim);
		$this->db->delete('polling');
		$this->load->view('user/poll_gagal');
	  }
	}

	function add_saran(){
		$saran =$this->input->post('komen');
		$var=array('saran'=> $saran);
		$this->Model_user->add_saran($var);
		$this->load->view('user/pol_sukses');
	}
}
