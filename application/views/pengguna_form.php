<!-- Main content -->
          <div class='row'>
            <div clas='col s12 m4'><h3>PENGGUNA</h3></div>
            <div class='col s12 m4'>
              <div class='center' id='response'>
              </div>
            </div>
            
        <form class='col s12'  id='create_form' action="<?php echo $action; ?>" method="post"><div class='row'><div class='input-field col s12'>
	  <?php echo form_error('pengguna') ?>
            <input type="text" class="validate" name="pengguna" id="pengguna"  placeholder="<?php echo $pengguna; ?>"  value="<?php echo $pengguna; ?>" />
            <label for="pengguna">Pengguna</label></div></div><div class='row'><div class='input-field col s12'>
	  <?php echo form_error('password') ?>
            <input type="text" class="validate" name="password" id="password"  placeholder="<?php echo $password; ?>"  value="<?php echo $password; ?>" />
            <label for="password">Password</label></div></div><div class='row'><div class='input-field col s12'>
	  <?php echo form_error('level') ?>
            <input type="text" class="validate" name="level" id="level"  placeholder="<?php echo $level; ?>"  value="<?php echo $level; ?>" />
            <label for="level">Level</label></div></div><div class='row'><div class='input-field col s12'>
	  <?php echo form_error('status') ?>
            <input type="text" class="validate" name="status" id="status"  placeholder="<?php echo $status; ?>"  value="<?php echo $status; ?>" />
            <label for="status">Status</label></div></div>
	    <input type="hidden" name="id_pengguna" value="<?php echo $id_pengguna; ?>" /> 
	    <div class='row'><div class='right'><button type="submit" class="waves-effect waves-light btn"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('pengguna') ?>" class="cancel waves-effect waves-effect waves-light red lighten-1 btn">Cancel</a></div></div>
	
</form>
</div><!-- /.row -->