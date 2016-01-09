<!-- Main content -->
          <div class='row'>
            <div class='col s12 m4'><h3>JADWAL</h3></div>
            <div class='col s12 m4'>
              <div class='center' id='response'>
              </div>
            </div>
            
        <form class='col s12'  id='create_form' action="<?php echo $action; ?>" method="post"><div class='row'><div class='input-field col s12'>
	  <?php echo form_error('id_tes') ?>
            <input type="text" class="validate" name="id_tes" id="id_tes"  placeholder="<?php echo $id_tes; ?>"  value="<?php echo $id_tes; ?>" />
            <label for="id_tes">Id Tes</label></div></div><div class='row'><div class='input-field col s12'>
	  <?php echo form_error('id_kelas') ?>
            <input type="text" class="validate" name="id_kelas" id="id_kelas"  placeholder="<?php echo $id_kelas; ?>"  value="<?php echo $id_kelas; ?>" />
            <label for="id_kelas">Id Kelas</label></div></div><div class='row'><div class='input-field col s12'>
	  <?php echo form_error('tgl_tes') ?>
            <input type="text" class="validate" name="tgl_tes" id="tgl_tes"  placeholder="<?php echo $tgl_tes; ?>"  value="<?php echo $tgl_tes; ?>" />
            <label for="tgl_tes">Tgl Tes</label></div></div>
	    <input type="hidden" name="id_jadwal" value="<?php echo $id_jadwal; ?>" /> 
	    <div class='row'><div class='right'><button type="submit" class="waves-effect waves-light btn"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('jadwal') ?>" class="cancel waves-effect waves-effect waves-light red lighten-1 btn">Cancel</a></div></div>
	
</form>
</div><!-- /.row -->