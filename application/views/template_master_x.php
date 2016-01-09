<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Base Template</title>

  <!-- CSS  -->
  <link href="<?php echo base_url(); ?>assets/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="<?php echo base_url(); ?>assets/css/materialdesignicons.min.css" media="all" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url(); ?>assets/css/style-icon.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="<?php echo base_url(); ?>assets/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link rel="stylesheet" href="<?php echo base_url('assets/datatables/jquery.dataTables.css') ?>"/>

</head>
<body>
<ul id="dropdown1" class="dropdown-content">
  <li><a href="#!">one</a></li>
  <li><a href="#!">two</a></li>
  <li class="divider"></li>
  <li><a href="#!">three</a></li>
</ul>
<ul id="dropdown2" class="dropdown-content">
  <li><a href="#!">one</a></li>
  <li><a href="#!">two</a></li>
</ul>
<ul id="dropdown3" class="dropdown-content">
  <li><a href="#!">one</a></li>
  <li><a href="#!">two</a></li>
  <li><a href="#!">three</a></li>
</ul>
<div class="navbar-fixed">
  <nav>
		<div class="nav-wrapper"><a id="logo-container" href="#" class="brand-logo hide-on-small-and-down">Sistem Presensi</a>
			<a href="#" data-activates="slide-out" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
			<ul class="right">
				<li><a href="#"><i class="material-icons">search</i></a></li>
				<li><a class="dropdown-button" href="#" data-activates="dropdown3"><i class="material-icons">view_module</i></a></li>
				<li><a class="dropdown-button" href="#" data-activates="dropdown2"><i class="material-icons">refresh</i></a></li>
				<li><a class="dropdown-button" href="#" data-activates="dropdown1"><i class="material-icons">more_vert</i></a></li>
			</ul>
		</div>
  </nav>
</div>

	<ul id="slide-out" class="side-nav fixed">
		<img class="responsive-img2" src="<?php echo base_url(); ?>assets/images/sample-1.jpg">
		<img class="circle responsive-img3" src="<?php echo base_url(); ?>assets/images/1.jpg">
		<div class="section"><br/><br/></div>

		<a class="btn-flat disabled top">Nama Pengguna</a>
		<br/>
		<li><a class="waves-effect waves-red" href="#!"><i class="mdi mdi-home-variant"></i> Dashboard</a></li>
    <li><a href="<?php echo base_url();?>" class="waves-effect waves-red mn"  data-target="menu"><i class="mdi mdi-home-variant"></i> Menu Management</a></li>
  
    <li class="no-padding">
		  <ul class="collapsible collapsible-accordion">
			<li><a class="waves-effect waves-red collapsible-header" href="#"><i class="mdi mdi-information-outline"></i> Informasi Pribadi</a>
			  <div class="collapsible-body">
				<ul>
				  <li><a href="<?php echo base_url();?>" data-target="welcome/form" class="mn"><i class="mdi mdi-bell-outline"></i> Forms</a></li>
				  <li><a href="<?php echo base_url();?>" data-target="welcome/table" class="mn">Table</a></li>
				  <li><a href="<?php echo base_url();?>" data-target="welcome/pre" class="mn">Preloader</a></li>
				  <li><a href="#!">Fourth</a></li>
				</ul>
			  </div>
			</li>
		  </ul>
		</li>
		<li class="no-padding">
		  <ul class="collapsible collapsible-accordion">
			<li>
			  <a class="waves-effect waves-red collapsible-header"><i class="mdi mdi-folder"></i> Referensi Data</a>
			  <div class="collapsible-body">
				<ul>
				  <li><a href="#!"><i class="mdi mdi-note"></i> Data Umum</a></li>
				  <li><a href="#!"><i class="mdi mdi-note-text"></i> Data Jabatan</a></li>
				  <li><a href="#!"><i class="mdi mdi-file"></i> Ref. Presensi</a></li>
				  <li><a href="#!"><i class="mdi mdi-file-chart"></i> Ref. Akademik</a></li>
				</ul>
			  </div>
			</li>
		  </ul>
		</li>
		<li class="no-padding">
		  <ul class="collapsible collapsible-accordion">
			<li>
			  <a class="waves-effect waves-red collapsible-header"><i class="mdi mdi-school"></i> Data Akademik</a>
			  <div class="collapsible-body">
				<ul>
				  <li><a href="<?php echo base_url();?>" data-target="jadwal" class="mn"><i class="mdi mdi-book-open"></i> Mata Pelajaran</a></li>
				  <li><a href="#!"><i class="mdi mdi-calendar-text"></i> Jadwal Pelajaran</a></li>
				  <li><a href="#!"><i class="mdi mdi-clipboard-outline"></i> Papan Informasi</a></li>
				  <li><a href="#!"><i class="mdi mdi-calendar-blank"></i> Kalender</a></li>
				</ul>
			  </div>
			</li>
		  </ul>
		</li>
		<li class="no-padding">
		  <ul class="collapsible collapsible-accordion">
			<li>
			  <a class="waves-effect waves-red collapsible-header"><i class="mdi mdi-code-equal"></i> Master</a>
			  <div class="collapsible-body">
				<ul class="slide-outa">
				  <li><a href="<?php echo base_url();?>" data-target="guru/create" class="mn"><i class="mdi mdi-account"></i> Data Guru</a></li>
				  <li><a href="<?php echo base_url();?>" data-target="guru" class="mn"><i class="mdi mdi-account-multiple"></i> Data Siswa</a></li>
				</ul>
			  </div>
			</li>
		  </ul>
		</li>
		<li class="no-padding">
		  <ul class="collapsible collapsible-accordion">
			<li>
			  <a class="waves-effect waves-red collapsible-header"><i class="mdi mdi-database"></i>Data Presensi</a>
			  <div class="collapsible-body">
				<ul>
				  <li><a href="unduh"><i class="mdi mdi-download"></i> Unduh Presensi</a></li>
				  <li><a href="#!"><i class="mdi mdi-briefcase-download"></i> Data Absen</a></li>
				  <li><a href="#!"><i class="mdi mdi-pencil-box-outline"></i> Input Presensi</a></li>
				</ul>
			  </div>
			</li>
		  </ul>
		</li>
	</ul>
<div id="loading" style="display:none">
	<div class="preloader-wrapper active">
						<div class="spinner-layer spinner-red-only">
						  <div class="circle-clipper left">
							<div class="circle"></div>
						  </div><div class="gap-patch">
							<div class="circle"></div>
						  </div><div class="circle-clipper right">
							<div class="circle"></div>
						  </div>
						</div>
					  </div>
</div>
<div class="container">
    <div class="row">
    		<div class="col s12 m12 l10 offset-l2">
      		<div id="container">
                <?php echo $contents; ?>
      		</div>
        </div>
    </div>
</div>




  <!--  Scripts-->
  <script src="<?php echo base_url(); ?>assets/js/jquery-1.11.2.min.js"></script>
  <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
  <script src="<?php echo base_url(); ?>assets/js/materialize.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/init.js"></script>

  <script>
    $(function() {

      //preloading
       $('#loading').ajaxStart(function(){
              $(this).fadeIn();
       }).ajaxStop(function(){
              $(this).fadeOut();
       });

       //saat mengklik tombol menu
       $(document).delegate(".mn","click",function(e){
              e.preventDefault();
              var target = $(this).data('target');
              var url = $(".mn").attr('href')+target;
              $('#container').load(url);
              return false;
       });

       $(document).delegate(".create","click",function(e){
              e.preventDefault();
              //var target = $(this).data('target');
              var url = $(".create").attr('href');
              $('#container').load(url);
              return false;
       });

       $(document).delegate(".detail","click",function(e){
              e.preventDefault();
              //var target = $(this).data('target');
              var url = $(".detail").attr('href');
              $('#container').load(url);
              return false;
       });

       $(document).delegate(".edit","click",function(e){
              e.preventDefault();
              //var target = $(this).data('target');
              var url = $(".edit").attr('href');
              $('#container').load(url);
              return false;
       });

     });
  </script>
  <script type="text/javascript">
      $(document).ready(function () {

          $("#mytable").dataTable();
          $('select').material_select();
      });

  </script>


  </body>
   <footer>
		<div class="footer-copyright">
            <div class="container">
            <div class="right">© 2015 Copyright Reza Ple</div>

			</div>
        </div>
    </footer>
</html>
