<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/css/main_user.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Main User</title>
   <script type="text/javascript" script-name="acme" src="http://use.edgefonts.net/acme.js"></script>
   
 

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
</style>
  </head>
  <body>
    <section class="material-half-bg">
      <div class="cover"></div>
    </section>
    <section class="login-content">
      <div class="logo">
       <div class="imgjj"> <h1 class="text-center"><span class="fa fa-check-square-o"></span> E-POLLING</h1></div>
      </div>
     <div class="row">
		
          <div class="col-md-12">
            <div class="card center">
              <div class="card-body">
			  <h3 class="text-center">Selamat Datang Di E-Polling</h3>
			  
          <div class="form-group">
	
            <!--<h4 align="justify">Anda telah berhasil melakukan proses pembaharuan password, Sebagai salah satu syarat Untuk dapat melakukan polling/angket kepuasan mahasiswa terhadapat pelayanan Fakultas Ilmu Sosial dan Ekonomi (FISE) </h4>
          -->
		  </div>
          
          <div class="form-group btn-container">
            <a href="<?php echo site_url('User/polling'); ?>"class="btn btn-success btn-block"><i class="fa fa-edit fa-lg fa-fw"></i>Mulai Polling</a>
			<a href="<?php echo site_url('User/tentang'); ?>" class="btn btn-info btn-block"><i class="fa fa-clone fa-lg fa-fw"></i>Tentang Aplikasi</a>
			<a href="<?php echo site_url('User/nav'); ?>" class="btn btn-info btn-block"><i class="fa fa-compass fa-lg fa-fw"></i>Petunjuk Penggunaan</a>
			<a href="<?php echo site_url('User/log_out'); ?>" class="btn btn-danger btn-block"><i class="fa fa-sign-out fa-lg fa-fw"></i>Log Out</a>
          </div></div>
            </div>
          </div>
    </section>
  </body>
  <script src="<?php echo base_url(); ?>asset/js/jquery-2.1.4.min.js"></script>
  <script src="<?php echo base_url(); ?>asset/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url(); ?>asset/js/plugins/pace.min.js"></script>
 
</html>
</html>