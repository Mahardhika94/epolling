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
    <title>Login</title>
   <script type="text/javascript" script-name="acme" src="http://use.edgefonts.net/acme.js"></script>
   
 
<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>	
 
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
              <div class="card-body"><h3>Masukkan Komentar/saran anda mengenai Pelayanan FISE</h3>
			  <form action="<?php echo site_url('User/add_saran'); ?>" method="post" role="form">

				  <div class="form-group">
				  <div class="input-group col-xs-12">
				
				  <textarea class="form-control" type="text"  name="komen"  required >
				 
				  </textarea>
				  </div>
				  </div>
				  

				   
                 <button type="submit" class="btn btn-primary btn-block"><span class="fa fa-check"></span> Kirim Saran</button>
			  
                </form></div>
            </div>
          </div>
    </section>
  </body>
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
      	format: "yyyy",
      	autoclose: true,
      	todayHighlight: true,
		minDate:'-1d',
		disabled: true
      });
      
    
	 
	
    </script>

</html>
</html>