<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<script type="text/javascript" script-name="acme" src="http://use.edgefonts.net/acme.js"></script>
    <title>CPanel E-Polling Admin</title>
   
  
  </head>
<script>

function al(){
	alert(99);
	}


function simpan(){
//var pwd=<?php echo $pwd; ?>;
	var pwd = document.getElementById('pwd').value;
	var pass = document.getElementById('pass21').value;
	//alert(pwd);
	//alert(pass);
	if(pass == pwd){
	var r = confirm("Apakah Anda yakin untuk Memperbarui Data Polling?");
	if(r == true){
	document.getElementById('upoll').submit();
	}else{
	location.reload();
	}
	}else{
	var f=confirm("Password yang anda masukkan tidak sesuai!!");
	if(f == true){
	location.reload();
	}
	}
}

function reset(){
//var pwd=<?php echo $pwd; ?>;
	var pwd = document.getElementById('pwd2').value;
	var pass = document.getElementById('pass22').value;
	//alert(pwd);
	//alert(pass);
	if(pass == pwd){
	var r = confirm("Apakah Yakin Akan Menonaktifkan Proses Polling?");
	if(r == true){
	document.getElementById('reset').submit();
	}else{
	location.reload();
	}
	}else{
	var f=confirm("Password yang anda masukkan tidak sesuai!!");
	if(f == true){
	location.reload();
	}
	}
}
</script>
  <style>
  .imgjj {
  -webkit-box-sizing: content-box;
  -moz-box-sizing: content-box;
  box-sizing: content-box;
  border: none;
  font: normal normal bold 27px/2 "acme", Helvetica, sans-serif;
  color: rgba(255,255,255,1);
  -o-text-overflow: ellipsis;
  text-overflow: ellipsis;
}

a:hover { 
    background-color: red;
	color:yellow;
}
  </style>
  
  
  <body class="sidebar-mini fixed">
    <div class="wrapper">
      <!-- Navbar-->
      <header class="main-header hidden-print"><a class="logo" href="index.html"><div class="imgjj">Admin CPanel</div></a>
        <nav class="navbar navbar-static-top">
          <!-- Sidebar toggle button--><a class="sidebar-toggle" href="#" data-toggle="offcanvas"></a>
          <!-- Navbar Right Menu-->
          <div class="navbar-custom-menu">
            <ul class="top-nav">
              <!--Notification Menu-->
              
              <!-- User Menu-->
              <li class="dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user fa-lg"></i></a>
                <ul class="dropdown-menu settings-menu">
                  <li><a href="profil"><i class="fa fa-user fa-lg"></i> Profile</a></li>
				  <li <?php if($stat =='super admin' || $stat =='user admin') {echo 'hidden';} ?>><a href="user"><i class="fa fa-user fa-cogs"></i> Data Admin</a></li>
                  <li><a href="logout"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Side-Nav-->
      <aside class="main-sidebar hidden-print">
        <section class="sidebar">
          <div class="user-panel">
            <div class="pull-left image"><img class="img-circle" src="https://img00.deviantart.net/ffd1/i/2016/130/e/4/admin_or_secured_icon_by_dnilvincent333-da227yk.png" alt="User Image"></div>
            <div class="pull-left info">
              <p><?php echo $nama; ?></p>
              <p class="designation"><?php echo $stat; ?></p>
            </div>
          </div>
          <!-- Sidebar Menu-->
          <ul class="sidebar-menu">
            <li><a href="index"><i class="fa fa-home"></i><span>Beranda</span></a></li>
			<li ><a href="tentang"><i class="fa fa-clone"></i><span>Tentang</span></a></li>
			<li class="active" <?php if($stat =='super admin' || $stat =='user admin') {echo 'hidden';} ?>><a href="setting"><i class="fa fa-cog"></i><span>Atur E-polling</span></a></li>
			<li><a href="petunjuk"><i class="fa fa-compass"></i><span> Petunjuk</span></a></li>
            <li ><a href="#"><i class="fa fa-users"></i><span>Mahasiswa</span><i class="fa fa-angle-right"></i></a>
              <ul class="treeview-menu">
                <li <?php if($stat =='user admin') {echo 'hidden';} ?>><a href="ins_mhs"><i class="fa fa-circle-o"></i> Tambah Data Mahasiswa</a></li>
                <li><a href="mhs" ><i class="fa fa-circle-o"></i> Data Mahasiswa</a></li>
              </ul>
            </li>
            <li ><a href="#"><i class="fa fa-edit"></i><span>Detail Polling</span><i class="fa fa-angle-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="data_poling"><i class="fa fa-circle-o"></i> Data Polling</a></li>
                <li <?php if($stat =='super admin' || $stat =='user admin') {echo 'hidden';} ?>><a href="add_poling"><i class="fa fa-circle-o"></i> Tambah pertanyaan polling</a></li>
            </ul>
            </li>
            <li ><a href="hasil"><i class="fa fa-bar-chart"></i><span>Hasil Polling</span></a></li>
			<li ><a href="laporan"><i class="fa fa-file"></i><span>Laporan</span></a></li>
          </ul>
        </section>
      </aside>
      <div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1><i class="fa fa-Home"></i> Beranda</h1>
           
          </div>
          <div>
            <ul class="breadcrumb">
              <li><i class="fa fa-home fa-lg"></i></li>
              <li><a href="#">Beranda</a></li>
            </ul>
          </div>
        </div>
        <div class="row">
		<div class="col-md-3"></div>
          <div class="col-md-6">
            <div class="card ">
			
              <h1			  class="text-center">Masukan Waktu Penyelenggaraan Polling</h1><p>
			  <form action="<?php echo site_url('Update/up_poll'); ?>" method="post" id="upoll">
			  <div class="form-group">
			 
			  <a class="btn btn-block <?php if($status =='aktif') {echo 'btn-info';}else{echo 'btn-danger';}?>">
			  <?php if($status =='aktif') {echo 'Polling  Aktif';}else{echo 'Polling Non Aktif';}?>
			  </a>
			 
			  </div>
			  <div class="form-group">
			  <div class="input-group col-xs-12">
			  <label class="label-control">Tanggal Dimulai</label>
			  <input type="text" class="form-control " name="tgl1" id="demoDate" placeholder="Pilih Tanggal awal" value="<?php echo $awal; ?>" readonly>
		
			  </div>
			  </div>
			  
			  <div class="form-group">
			  <div class="input-group col-xs-12">
			  <label class="label-control">Tanggal Berakir</label>
			  <input type="text" class="form-control " name="tgl2" id="demoDate2" placeholder="Pilih Tanggal akhir" value="<?php echo $akhir; ?>"  readonly>
			  </div>
			  </div>
			  <!---
			  <div class="form-group">
			  <div class="input-group col-xs-4">
			  <label class="label-control">Jam Dimulai</label>
			  <input type="text" class="form-control " name="jam1" id="jam1" value="<?php echo $jam1; ?>"  required>
			  </div>
			  </div>
			   <div class="form-group">
			  <div class="input-group col-xs-4">
			  <label class="label-control">Jam Berakhir</label>
			  <input type="text" class="form-control " name="jam2" required value="<?php echo $jam2; ?>">
			  </div>
			  </div>
			  --->
			  <a  class="btn btn-primary" data-toggle="modal" data-target="#myModal"><span class="fa fa-check"></span> Simpan</a>
			<a   class="btn btn-danger" data-toggle="modal" data-target="#myModal2"><span class="fa fa-times" ></span> Hapus Data Polling</a>
            
			  
			  </form>
			  <form action="<?php echo site_url('Update/reset_poll'); ?>" method="post" id="reset">
			  
			  </form>
			  
            </div>
          </div>
		  <div class="col-md-3"></div>
        </div>
      </div>
    </div>
	
	<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" align="center">Peringatan</h4>
      </div>
      <div class="modal-body">
	 <p align="center"> <img height="60" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS9JcaKsX5N6N2L4-r1jDlzTyxeY7Mj_MuSboWMfDi1r7zsmq6D" class="img img-rounded">
       
</p>	   <p align="center bold"> Untuk Merubah data Polling Silakan Masukkan Password Anda</p>
		<input type="password" placeholder="Password" class="form-control" name="pass" id="pass21">
		<input  type="password" placeholder="Password"  name="pwd" id="pwd" value="<?php echo $pwd; ?>" hidden>
      </div>
      <div class="modal-footer">
	  <a class="btn btn-primary" onclick="simpan()">Ubah</a>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>


<div id="myModal2" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" align="center">Peringatan</h4>
      </div>
      <div class="modal-body">
	 <p align="center"> <img height="60" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS9JcaKsX5N6N2L4-r1jDlzTyxeY7Mj_MuSboWMfDi1r7zsmq6D" class="img img-rounded">
       
</p>	   <p align="center bold"> Untuk Merubah data Polling Silakan Masukkan Password Anda</p>
		<input type="password" placeholder="Password" class="form-control" name="pass" id="pass22">
		<input  type="password" placeholder="Password"  name="pwd" id="pwd2" value="<?php echo $pwd; ?>" hidden>
      </div>
      <div class="modal-footer">
	  <a class="btn btn-primary" onclick="reset()">Reset Polling</a>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
    <!-- Javascripts-->
    <script src="<?php echo base_url(); ?>asset/js/jquery-2.1.4.min.js"></script>
    <script src="<?php echo base_url(); ?>asset/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>asset/js/plugins/pace.min.js"></script>
    <script src="<?php echo base_url(); ?>asset/js/main.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/plugins/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>asset/js/plugins/select2.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>asset/js/plugins/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript">
     
      
      $('#demoDate').datepicker({
      	format: "yyyy-mm-dd",
      	autoclose: true,
      	todayHighlight: true,
		minDate:'-1d',
		disabled: true
      });
      
     $('#demoDate2').datepicker({
		format: "yyyy-mm-dd",
		autoclose: true,
		Highlight:true
	 
	 });
	 
	
    </script>
  </body>
</html>