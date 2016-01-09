<!-- Main content -->
          <div class='row'>
            <div class='col s12 m4'><h3>MATPEL</h3></div>
            <div class='col s12 m4'>
              <div class='center' id='response'>
              </div>
            </div>
            
        <form class='col s12'  id='create_form' action="<?php echo $action; ?>" method="post"><div class='row'><div class='input-field col s12'>
	  <?php echo form_error('nama_matpel') ?>
            <input type="text" class="validate" name="nama_matpel" id="nama_matpel"  placeholder="<?php echo $nama_matpel; ?>"  value="<?php echo $nama_matpel; ?>" />
            <label for="nama_matpel">Nama Matpel</label></div></div><div class='row'><div class='input-field col s12'>
	  <?php echo form_error('kkm') ?>
            <input type="text" class="validate" name="kkm" id="kkm"  placeholder="<?php echo $kkm; ?>"  value="<?php echo $kkm; ?>" />
            <label for="kkm">Kkm</label></div></div>
	    <input type="hidden" name="id_matpel" value="<?php echo $id_matpel; ?>" /> 
	    <div class='row'><div class='right'><button type="submit" class="waves-effect waves-light btn"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('matpel') ?>" class="cancel waves-effect waves-effect waves-light red lighten-1 btn">Cancel</a></div></div>
	
</form>
</div><!-- /.row -->