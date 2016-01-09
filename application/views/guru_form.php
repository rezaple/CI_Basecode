<!-- Main content -->
          <div class='row'>
            <div class='col s12 m4'><h3>GURU</h3></div>
            <div class='col s12 m4'>
              <div class='center' id='response'>
              </div>
            </div>
            
        <form class='col s12'  id='create_form' action="<?php echo $action; ?>" method="post"><div class='row'><div class='input-field col s12'>
	  <?php echo form_error('nuptk') ?>
            <input type="text" class="validate" name="nuptk" id="nuptk"  placeholder="<?php echo $nuptk; ?>"  value="<?php echo $nuptk; ?>" />
            <label for="nuptk">Nuptk</label></div></div><div class='row'><div class='input-field col s12'>
	  <?php echo form_error('nama_guru') ?>
            <input type="text" class="validate" name="nama_guru" id="nama_guru"  placeholder="<?php echo $nama_guru; ?>"  value="<?php echo $nama_guru; ?>" />
            <label for="nama_guru">Nama Guru</label></div></div><div class='row'><div class='input-field col s12'>
	  <?php echo form_error('tmp_lahir') ?>
            <input type="text" class="validate" name="tmp_lahir" id="tmp_lahir"  placeholder="<?php echo $tmp_lahir; ?>"  value="<?php echo $tmp_lahir; ?>" />
            <label for="tmp_lahir">Tmp Lahir</label></div></div><div class='row'><div class='input-field col s12'>
	  <?php echo form_error('tgl_lahir') ?>
            <input type="text" class="validate" name="tgl_lahir" id="tgl_lahir"  placeholder="<?php echo $tgl_lahir; ?>"  value="<?php echo $tgl_lahir; ?>" />
            <label for="tgl_lahir">Tgl Lahir</label></div></div><div class='row'><div class='input-field col s12'>
	  <?php echo form_error('golongan') ?>
            <input type="text" class="validate" name="golongan" id="golongan"  placeholder="<?php echo $golongan; ?>"  value="<?php echo $golongan; ?>" />
            <label for="golongan">Golongan</label></div></div><div class='row'><div class='input-field col s12'>
	  <?php echo form_error('pend_guru') ?>
            <input type="text" class="validate" name="pend_guru" id="pend_guru"  placeholder="<?php echo $pend_guru; ?>"  value="<?php echo $pend_guru; ?>" />
            <label for="pend_guru">Pend Guru</label></div></div><div class='row'><div class='input-field col s12'>
	  <?php echo form_error('id_matpel') ?>
            <input type="text" class="validate" name="id_matpel" id="id_matpel"  placeholder="<?php echo $id_matpel; ?>"  value="<?php echo $id_matpel; ?>" />
            <label for="id_matpel">Id Matpel</label></div></div>
	    <input type="hidden" name="nip" value="<?php echo $nip; ?>" /> 
	    <div class='row'><div class='right'><button type="submit" class="waves-effect waves-light btn"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('guru') ?>" class="cancel waves-effect waves-effect waves-light red lighten-1 btn">Cancel</a></div></div>
	
</form>
</div><!-- /.row -->