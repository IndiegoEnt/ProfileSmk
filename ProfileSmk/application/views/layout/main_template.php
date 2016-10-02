
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Dashboard Profil Sekolah</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url() ?>ProfileSmk/assets/bootstrap/dist/css/bootstrap.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url() ?>ProfileSmk/assets/custom/dashboard.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>ProfileSmk/assets/datatables.net-bs/css/dataTables.bootstrap.min.css"></link>
    <link href="<?php echo base_url() ?>ProfileSmk/assets/datatables.net-bs/css/bootstrap-theme.css"></link>
    <link href="<?php echo base_url() ?>ProfileSmk/assets/ckeditor/styles.css"></link>
    <link href="<?php echo base_url() ?>ProfileSmk/assets/bootstrap-fileinput/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css"></link>
    
	  <link rel="stylesheet" href="<?php echo base_url() ?>ProfileSmk/assets/zerotype/css/admin_style.css" type="text/css">
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../ProfileSmk/assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    
    <script>window.jQuery || document.write('<script src="<?php echo base_url() ?>ProfileSmk/assets/jquery/dist/jquery.min.js"><\/script>')</script>
    <script src="<?php echo base_url() ?>ProfileSmk/assets/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url() ?>ProfileSmk/assets/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>ProfileSmk/assets/ckeditor/ckeditor.js"></script>
    <script src="<?php echo base_url() ?>ProfileSmk/assets/typeahead.js/dist/bloodhound.js"></script>
    <script src="<?php echo base_url() ?>ProfileSmk/assets/typeahead.js/dist/typeahead.jquery.js"></script>
    <script src="<?php echo base_url() ?>ProfileSmk/assets/bootstrap-tagsinput/dist/bootstrap-tagsinput.js"></script>
    <script src="<?php echo base_url() ?>ProfileSmk/assets/jquery-validation/dist/jquery.validate.js"></script>

    
    <script src="<?php echo base_url() ?>ProfileSmk/assets/bootstrap-fileinput/js/plugins/purify.min.js"></script>
    <script src="<?php echo base_url() ?>ProfileSmk/assets/bootstrap-fileinput/js/plugins/sortable.min.js"></script>
    <script src="<?php echo base_url() ?>ProfileSmk/assets/bootstrap-fileinput/js/plugins/canvas-to-blob.min.js"></script>
    <script src="<?php echo base_url() ?>ProfileSmk/assets/bootstrap-fileinput/js/fileinput.js"></script>
    <script src="<?php echo base_url() ?>ProfileSmk/assets/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>

    


    
  </head>
  <?php
        $data;
        if(!$this->session->userdata('logged_in')){
            redirect('Auth');
        }else{
            $data = $this->session->userdata();
        }
        ?> 
  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Dashboard</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Hello : <?php echo $data['nama']?></a></li>
            <li><a href="<?php echo base_url(); ?>auth/logout">Logout</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li id="admin"><a href="<?php echo base_url(); ?>admin">Home</a></li>
            <li id="users"><a href="<?php echo base_url(); ?>users">Users <span class="sr-only">(current)</span></a></li>
            <li id="profile"><a href="<?php echo base_url(); ?>profile">Profile</a></li>
            <li id="guru"><a href="<?php echo base_url(); ?>guru">Direktori Guru</a></li>
            <li id="berita"><a href="<?php echo base_url(); ?>berita">Berita</a></li>
            <li id="kategori"><a href="<?php echo base_url(); ?>kategori">Kategori</a></li>
            <li id="ekskul"><a href="<?php echo base_url(); ?>ekskul">Ekskul</a></li>
            <li id="event"><a href="<?php echo base_url(); ?>event">Event</a></li>
            <li id="jurusan"><a href="<?php echo base_url(); ?>jurusan">Jurusan</a></li>
            <li id="galeri"><a href="<?php echo base_url(); ?>galeri">Galeri</a></li>
            <li id="agenda"><a href="<?php echo base_url(); ?>agenda">Agenda</a></li>
           
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <?php echo $this->template->content; ?>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->

    <script>
		var currentUrl  = window.location.href 
		var urlPreg = currentUrl.split("/");
		var currentMenuSelected = null
		if(urlPreg.indexOf("index.php") == -1){
			currentMenuSelected = urlPreg[3]
		}else{
			currentMenuSelected = (urlPreg[urlPreg.indexOf("index.php") + 1])
		} 
    currentMenuSelected = currentMenuSelected.toLowerCase()
		$('#' + currentMenuSelected).addClass('active')
		</script>
    </body>
</html>
