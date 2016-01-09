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
  <style media="screen">
    #container{
      min-height: 550px;
    }
  </style>
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

		<a class="btn-flat disabled top">
    <?php
    $user = $this->ion_auth->user()->row();
		echo $user->username;
    ?>
    </a>
		<br/>
		<li><a class="waves-effect waves-red" href="#!"><i class="mdi mdi-home-variant"></i> Dashboard</a></li>
    <li><a href="<?php echo base_url();?>" class="waves-effect waves-red mn"  data-target="menu"><i class="mdi mdi-home-variant"></i> Menu Management</a></li>
    <?php
    // 0 berrati parent, sedangkan 1 berarti aktif
    $menu = $this->db->get_where('menu', array('is_parent' => 0,'is_active'=>1));
    foreach ($menu->result() as $m) {

        // chek ada sub menu
        $submenu = $this->db->get_where('menu',array('is_parent'=>$m->id,'is_active'=>1));
        if($submenu->num_rows()>0){

            // tampilkan submenu
            echo "<li class='no-padding'>
                    <ul class='collapsible collapsible-accordion'>
                      <li>  ".anchor('#',  "<i class='$m->icon'></i>".ucwords($m->name),array('class'=>'waves-effect waves-red collapsible-header'))."
                        <div class='collapsible-body'>
                          <ul>";
                            foreach ($submenu->result() as $s){
                                 echo "<li>" . anchor('', "<i class='$s->icon'></i>" . ucwords($s->name), array('class'=>'mn','data-target'=>$s->link)) . "</li>";
                            }
                    echo"</ul>
                        </div>
                      </li>
                    </ul>
                  </li>";
        }else{
            echo "<li>" . anchor("", "<i class='$m->icon'></i>" . ucwords($m->name),array('class'=>'waves-effect waves-red mn', 'data-target'=> $m->link)) . "</li>";
        }

    }
    ?>
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

              $('#container').load(url,function(){
                      $("#mytable").dataTable();
                      $('select').material_select();
              });

              return false;
       });

       $(document).delegate(".create","click",function(e){
              e.preventDefault();
              //var target = $(this).data('target');
              var url = $(".create").attr('href');
              $('#container').load(url, function(){
                  $("#create_form").submit(function (e){
                        e.preventDefault();
                        var url = $(this).attr('action');
                        var data = $(this).serialize();
                        $.ajax({
                            url:url,
                            type:'POST',
                            data:data
                        }).done(function (data){

                            window.mydata = data;
                            if(mydata['error'] !=""){
                              setTimeout(function() { $("#response").html(mydata['error']).fadeIn("slow"); }, 500);
                              setTimeout(function() { $("#response").fadeOut(); }, 3000);
                            }else if(mydata['success'] !=""){
                                $('#create_form')[0].reset();
                                setTimeout(function() { $("#response").html(mydata['success']).fadeIn("slow"); }, 500);
                                setTimeout(function() { $("#response").fadeOut(); }, 3000);
                            }
                        });
                    });
              });
              return false;
       });

       $(document).delegate(".cancel","click",function(e){
              e.preventDefault();
              //var target = $(this).data('target');
              var url = $(".cancel").attr('href');
              $('#container').load(url,function(){
                      $("#mytable").dataTable();
                      $('select').material_select();
              });
              return false;
       });

       $(document).delegate(".detail","click",function(e){
              e.preventDefault();
              var id = $(this).data('id');
              var url = $(".detail").attr('href')+'/'+id;
              $('#container').load(url);
              return false;
       });

       $(document).delegate(".edit","click",function(e){
              e.preventDefault();
              var id = $(this).data('id');
              var url = $(".edit").attr('href')+'/'+id;
              $('#container').load(url, function(){
                  $("#create_form").submit(function (e){
                        e.preventDefault();
                        var url = $(this).attr('action');
                        var data = $(this).serialize();
                        $.ajax({
                            url:url,
                            type:'POST',
                            data:data
                        }).done(function (data){

                            window.mydata = data;
                            if(mydata['error'] !=""){
                              setTimeout(function() { $("#response").html(mydata['error']).fadeIn("slow"); }, 500);
                              setTimeout(function() { $("#response").fadeOut(); }, 3000);
                            }else if(mydata['success'] !=""){
                                $('#create_form')[0].reset();
                                setTimeout(function() { $("#response").html(mydata['success']).fadeIn("slow"); }, 500);
                                setTimeout(function() { $("#response").fadeOut(); }, 3000);
                            }
                        });
                    });
              });
              return false;
       });

       //button delete di klik
       $(document).delegate(".delete","click",function(e){
                e.preventDefault();
                var deleteid = $(this).data('id');
                var deleteurl = $(".delete").attr('href')+'/'+deleteid;
                var table = $('#mytable').dataTable();
                var myTable = $('#mytable').DataTable();
                var row = $(this).closest("tr");
                if(confirm("Are You Sure?")){
                    $.ajax({
                    url:deleteurl,
                    type:'POST' ,
                    data:'id='+deleteid
                    }).done(function (data){
                          window.mydata = data;
                          if(mydata['error'] !=""){
                            setTimeout(function() { $("#response").html(mydata['error']).fadeIn("slow"); }, 500);
                            setTimeout(function() { $("#response").fadeOut(); }, 3000);

                          }else if(mydata['success'] !=""){
                              setTimeout(function() { $("#response").html(mydata['success']).fadeIn("slow"); }, 500);
                              setTimeout(function() { $("#response").fadeOut(); }, 3000);
                              myTable.row(row).remove().draw();
                          }
                    });
                }else{
                    return false;
                }
            });

     });
  </script>
  <script type="text/javascript">
      $(document).ready(function () {
          $('select').material_select();
      });
  </script>


  </body>
  <div class="divider">

  </div>
   <footer>
  		<div class="footer-copyright">
        <div class="container">
          <div class="right">Reza Ple</div>
  		  </div>
      </div>
    </footer>
</html>
