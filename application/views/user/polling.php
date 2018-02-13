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
	<script type="text/javascript" script-name="acme" src="http://use.edgefonts.net/acme.js"></script>
    <title>CPanel E-Polling Admin</title>
 
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

.quest1 {
  -webkit-box-sizing: content-box;
  -moz-box-sizing: content-box;
  box-sizing: content-box;
  border: none;
  font: normal normal bold 16px/1 Tahoma, Geneva, sans-serif;
  color: black;
  -o-text-overflow: ellipsis;
  text-overflow: ellipsis;
}
  </style>
  
  <script type="text/javascript">
  function klik(){
  document.getElementById('btnk').click();
  
  }
  
  </script>
  <body class="sidebar-mini fixed" onload="klik()">
    <div class="wrapper">
      <!-- Navbar-->
      <header class="main-header hidden-print"><a class="logo" href="index.html"> <div class="imgjj"> <span class="fa fa-check-square-o"></span> E-POLLING</div></a>
        <nav class="navbar navbar-static-top">
          <!-- Sidebar toggle button--><a class="sidebar-toggle" href="#" data-toggle="offcanvas" id="btnk"></a>
          <!-- Navbar Right Menu-->
          <div class="navbar-custom-menu">
            <ul class="top-nav">
              <!--Notification Menu-->
              
              <!-- User Menu-->
              <li class="dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-th fa-lg"></i></a>
                <ul class="dropdown-menu settings-menu">
                  <li><a href="tentang"><i class="fa fa-clone fa-lg"></i> About</a></li>
				  <li><a href="nav"><i class="fa fa-compass"></i> Navigasi</a></li>
				    <li><a  href="main_user"><i class="fa fa-backward"></i> Kembali</a></li>
                  <li><a href="log_out"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Side-Nav-->
      
      
      <div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1 align="center"> Polling</h1>
           
          </div>
          
        </div>
		
		<div class="row">
		<div class="col-md-1"></div>
          <div class="col-md-10">
            <div class="card ">
			 <h4 align="center">Jawablah Seluruh Pertanyaan dibawah dengan sebenar-benarnya,menurut anda </h4>
			
              
            </div>
          </div>
		  <div class="col-md-1"></div>
        </div>
		<form action="<?php echo site_url('User/pilih_polling'); ?>" method="post">
		<?php  
		$no=0;
		foreach($soal as $row){ 
		$no=$no+1;
		?>
         <div class="row">
		<div class="col-md-1"></div>
          <div class="col-md-10">
            <div class="card ">
			<table class="table quest1">
			  <tr>
				  <td><?php echo $row->nomor; ?></td>
				  <td colspan="2"><?php echo $row->pertanyaan; ?>	
				  <input type="text" name="no<?php echo $no; ?>" value="<?php echo $no; ?>" hidden>
				  </td>
			  </tr>
			  <tr>
					<td></td>
					<td align="center">setuju
					<div class="radio">
  <label><input type="radio" name="jb<?php echo $no; ?>" value="yes" required></label>
</div>
					</td>
					<td align="center">Tidak 
					<div class="radio">
  <label><input type="radio" name="jb<?php echo $no; ?>" value="no"></label>
</div>
					</td>
			  </tr>
			</table>
              
            </div>
          </div>
		  <div class="col-md-1"></div>
        </div>
		<?php } ?>
		
		 <div class="row">
		<div class="col-md-4"></div>
          <div class="col-md-4">
            <div class="card center">
				<button type="submit" class="btn btn-info btn-block" ><span class="fa fa-check"></span> Submit</button>
              
            </div>
          </div>
		  <div class="col-md-4"></div>
        </div>
</form>
      </div>
    </div>
    <!-- Javascripts-->
    <script src="<?php echo base_url(); ?>asset/js/jquery-2.1.4.min.js"></script>
    <script src="<?php echo base_url(); ?>asset/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>asset/js/plugins/pace.min.js"></script>
    <script src="<?php echo base_url(); ?>asset/js/main_user.js"></script>
	<script>
$(document).ready(function(){
$("body").removeClass('sidebar-open');
});
</script>
  </body>
</html>