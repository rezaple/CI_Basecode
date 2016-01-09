<!-- Main content -->
          <div class='row'>
            <div class='col s12 m4'><h3>MENGAJAR</h3></div>
            <div class='col s12 m4'>
              <div class='center' id='response'>
              </div>
            </div>
            
        <form class='col s12'  id='create_form' action="<?php echo $action; ?>" method="post"><div class='row'><div class='input-field col s12'>
	  <?php echo form_error('nip') ?>
            <input type="text" class="validate" name="nip" id="nip"  placeholder="<?php echo $nip; ?>"  value="<?php echo $nip; ?>" />
            <label for="nip">Nip</label></div></div><div class='row'><div class='input-field col s12'>
	  <?php echo form_error('id_kelas') ?>
            <input type="text" class="validate" name="id_kelas" id="id_kelas"  placeholder="<?php echo $id_kelas; ?>"  value="<?php echo $id_kelas; ?>" />
            <label for="id_kelas">Id Kelas</label></div></div>
	    <input type="hidden" name="kd" value="<?php echo $kd; ?>" /> 
	    <div class='row'><div class='right'><button type="submit" class="waves-effect waves-light btn"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('mengajar') ?>" class="cancel waves-effect waves-effect waves-light red lighten-1 btn">Cancel</a></div></div>
	
</form>
</div><!-- /.row -->