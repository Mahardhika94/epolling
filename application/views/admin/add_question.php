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
   <script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>

  </head>
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
  <script type="text/javascript">
  function cek_no(){
 var no = document.getElementById('nomor').value;
  alert(no);
  var url = "http://localhost/epolling/index.php/Admin/sel_no/"+no;
    alert(no);
			var client = new XMLHttpRequest();
			alert(no);
			client.open("GET", url, false);
			client.send();
			var hasil=client.responseText;
				if (client.status == 200){
					var result = hasil;
					if(hasil =='ada'){
					alert("Nomor Yang anda masukkan sudah terdaftar!!!");

					}else{

					alert("yes");
					}

				}
				else{
								alert("Periksa Koneksi Internet anda");
				}

  }
  </script>
  <body  class="sidebar-mini fixed">
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
            <li ><a href="hasil"><i class="fa fa-bar-chart"></i><span>Hasil Polling</span></a></li>
			<li ><a href="laporan"><i class="fa fa-file"></i><span>Laporan</span></a></li>
          </ul>
        </section>
      </aside>
      <div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1><i class="fa fa-Home"></i> Pertanyaan</h1>

          </div>
          <div>
            <ul class="breadcrumb">
              <li><i class="fa fa-home fa-lg"></i></li>
              <li><a href="#">Beranda</a></li>
            </ul>
          </div>
        </div>
         <div class="row">
		<div class="col-md-2"></div>
          <div class="col-md-8">
            <div class="card ">

              <h4			  class="text-center">Masukan Pertanyaan</h4><p>
			  <form action="<?php echo site_url('Insert/add_quest/'); ?>" method="post" id="form1">

			  <div class="form-group">
			  <div class="input-group col-xs-4">
			  <label class="label-control">Nomor</label>
			  <input type="number"  class="form-control " name="nomor" id="nomor" value="<?php echo $nomor; ?>" readonly>
			  </div>
			  </div>
			  <div class="form-group">
			  <div class="input-group col-xs-6">
			  <label class="label-control">Judul</label>
			  <input type="text"  class="form-control " name="judul" id="judul" >
			  </div>
			  </div>
			  <div class="form-group">
			  <div class="input-group col-xs-12">
			  <label class="label-control">Pertanyan</label>
			  <textarea  class="form-control" name="quest" id="quest"></textarea>
			  </div>
			  </div>

			  <button type="button" id="btn_ok" class="btn btn-primary"><span class="fa fa-check"></span> Simpan Pertanyaan</button>
			  <button type="submit"  class="btn btn-primary hidden"><span class="fa fa-check" id="ok2"></span> Simpan Pertanyaant</button>
			  <a href="" onclick="goBack()" class="btn btn-default"><span class="fa fa-times"></span> Cancel</a>
			  </form>

            </div>
          </div>
		  <div class="col-md-2"></div>
        </div>
      </div>
    </div>
    <!-- Javascripts-->
    <script src="<?php echo base_url(); ?>asset/js/jquery-2.1.4.min.js"></script>
    <script src="<?php echo base_url(); ?>asset/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>asset/js/plugins/pace.min.js"></script>
    <script src="<?php echo base_url(); ?>asset/js/main.js"></script>
<script type="text/javascript">
function kilk(){
document.getElementById('ok2').click();
}

function goBack() {
    window.history.back();
}
$('#btn_ok').on('click',function(){
	var no =$('#nomor').val();
  $.ajax({
                type : "POST",
                url  : "<?php echo base_url('index.php/Admin/sel_no/')?>"+no,

                success: function(data){
				var st= data;
				    if(st =='ada'){
					alert("oopps Maaf nomor soal yang di daftarkan sudah terdapat di dabase");
					}else{
                    //alert(st);
					kilk();
					//$('#form1')submit();
					}
                }
            });

return false;

});

</script>
  </body>
</html>
