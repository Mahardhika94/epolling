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
	<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/canvasjs.min.js"></script>
    <title>CPanel E-Polling Admin</title>
 
  </head>
  <script type="text/javascript">
window.onload = function () {
	var chart = new CanvasJS.Chart("chartContainer",
	{
		theme: "theme8",
		title:{
			text: "Prosentase polling dengan Pertanyaan '<?php echo $title; ?> ? ' "
		},
		data: [
		{
			type: "pie",
			showInLegend: true,
			toolTipContent: "{y} - #percent %",
			yValueFormatString: "",
			legendText: "{indexLabel}",
			dataPoints: [
				{  y: <?php echo $no; ?>, indexLabel: " Tidak Setuju <?php echo $no; ?> %" },
				{  y: <?php echo $yes; ?>, indexLabel: "Setuju <?php echo $yes; ?> %" }
			]
		}
		]
	});
	chart.render();
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
			<li <?php if($stat =='super admin' || $stat =='user admin') {echo 'hidden';} ?>><a href="setting"><i class="fa fa-cog"></i><span>Atur E-polling</span></a></li>
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
            <li class="active" ><a href="hasil"><i class="fa fa-bar-chart"></i><span>Hasil Polling</span></a></li>
			<li ><a href="laporan"><i class="fa fa-file"></i><span>Laporan</span></a></li>
          </ul>
        </section>
      </aside>
      <div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1><i class="fa fa-Home"></i> Hasil</h1>
           
          </div>
          <div>
            <ul class="breadcrumb">
              <li><i class="fa fa-home fa-lg"></i></li>
              <li><a href="#">Hasil</a></li>
            </ul>
          </div>
        </div>
         <div class="row">
		
          <div class="col-md-12">
            <div class="card ">
			
              <div class="form-group">
			  <div class="input-group col-xs-12">
			  <form action="<?php echo site_url('Admin/hasil'); ?>" method="post">
			  <select type="text" class="form-control" name="search" placeholder="Pilih Hasil Poling yang ingin dilihat">
			  <option>Pilih Hasil Poling yang ingin dilihat</option>
			  <?php foreach($soal as $soal){ ?>
			  <option><?php echo $soal->nomor .'| '. $soal->pertanyaan; ?></option>
			  <?php } ?>
</select>                
				
				  
			  </div>
			  </div>
			  <div class="form-group">
			  
			  <div class="input-group col-xs-12">
			  <button class="btn btn-warning btn-block" type="submit"><span class="fa fa-coment"></span>Tampilkan Hasil</button>
			  </form>
			  <a class="btn btn-info btn-block" target="_blank" href="komen"><span class="fa fa-coment"></span>Tampilkan Kritik/Saran</a>
			  </div>
			  </div>
            </div>
          </div>
		
        </div>
		<div class="row  <?php if($kon =='h'){echo 'hidden'; } ?>">
		
          <div class="col-md-12">
            <div class="card ">
                <div class="row">
                  <div class="col-xs-12">
                    <h2 class="page-header text-center"><img class="img img-rounded" src="http://2.bp.blogspot.com/-PFdNXgonUCM/VScNDs8RstI/AAAAAAAAAIo/19mW23V_JfU/s1600/logo%2Brespati%2Bhitam%2Bputih.jpg" height="60"> Laporan Polling Kepuasan Mahasiswa Tehadap FISE UNRIYO</h2>
                  </div>
                </div>
                <div class="row invoice-info">
                
                 
				  <div class="col-xs-12"><strong>Tanggal Polling : </strong><small><?php echo ' '. $awal .' samapai '. $akhir; ?></small></p>
                    
                  </div>
                  <div class="col-xs-12"><b>Jumlah Responden : <?php echo $jum_mhs; ?></b></div>
				   <div class="col-xs-12"><b>Jumlah Responden yang memilih : <?php echo $jum_mhspoll; ?></b></div>
                </div>
				</p>
				<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8">
				<h3 class="text-center">Table Deskripsi Responden</h3>
                  <div class="col-xs-12 table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Fakultas</th>
                          <th>Jumlah Responden</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>1</td>
                          <td>Sastra Ingris</td>
                          <td><?php echo $si; ?></td>
                        
                        </tr>
						 <tr>
                          <td>2</td>
                          <td>Hubungan Internasional</td>
                          <td><?php echo $hi; ?></td>
                        
                        </tr>
						 <tr>
                          <td>3</td>
                          <td>Akuntasnsi</td>
                          <td><?php echo $akuntan; ?></td>
                        
                        </tr>
						 <tr>
                          <td>4</td>
                          <td>Ilmu Komunikasi</td>
                          <td><?php echo $ilkom; ?></td>
                        
                        </tr>
                       
                      </tbody>
                    </table></div>
					<div class="col-md-2"></div>
                  </div>
                </div>
				<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-12">
            <div class="card">
             
              
                <div id="chartContainer" style="height: 700px; width: 100%;"></div>

            </div>
          </div>
				<div class="col-md-2"></div>
				</div>
                
         
              
			  
            </div>
          </div>
		  
        </div>

      </div>
    </div>
    <!-- Javascripts-->
    <script src="<?php echo base_url(); ?>asset/js/jquery-2.1.4.min.js"></script>
    <script src="<?php echo base_url(); ?>asset/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>asset/js/plugins/pace.min.js"></script>
    <script src="<?php echo base_url(); ?>asset/js/main.js"></script>
  </body>
</html>