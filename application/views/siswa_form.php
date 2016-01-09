<!-- Main content -->
          <div class='row'>
            <div class='col s12 m4'><h3>SISWA</h3></div>
            <div class='col s12 m4'>
              <div class='center' id='response'>
              </div>
            </div>
            
        <form class='col s12'  id='create_form' action="<?php echo $action; ?>" method="post"><div class='row'><div class='input-field col s12'>
	  <?php echo form_error('nama_siswa') ?>
            <input type="text" class="validate" name="nama_siswa" id="nama_siswa"  placeholder="<?php echo $nama_siswa; ?>"  value="<?php echo $nama_siswa; ?>" />
            <label for="nama_siswa">Nama Siswa</label></div></div><div class='row'><div class='input-field col s12'>
	  <?php echo form_error('jenkel') ?>
            <input type="text" class="validate" name="jenkel" id="jenkel"  placeholder="<?php echo $jenkel; ?>"  value="<?php echo $jenkel; ?>" />
            <label for="jenkel">Jenkel</label></div></div><div class='row'><div class='input-field col s12'>
	  <?php echo form_error('tmp_lahir') ?>
            <input type="text" class="validate" name="tmp_lahir" id="tmp_lahir"  placeholder="<?php echo $tmp_lahir; ?>"  value="<?php echo $tmp_lahir; ?>" />
            <label for="tmp_lahir">Tmp Lahir</label></div></div><div class='row'><div class='input-field col s12'>
	  <?php echo form_error('tgl_lahir') ?>
            <input type="text" class="validate" name="tgl_lahir" id="tgl_lahir"  placeholder="<?php echo $tgl_lahir; ?>"  value="<?php echo $tgl_lahir; ?>" />
            <label for="tgl_lahir">Tgl Lahir</label></div></div><div class='row'><div class='input-field col s12'>
	  <?php echo form_error('id_kelas') ?>
            <input type="text" class="validate" name="id_kelas" id="id_kelas"  placeholder="<?php echo $id_kelas; ?>"  value="<?php echo $id_kelas; ?>" />
            <label for="id_kelas">Id Kelas</label></div></div>
	    <input type="hidden" name="nis" value="<?php echo $nis; ?>" /> 
	    <div class='row'><div class='right'><button type="submit" class="waves-effect waves-light btn"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('siswa') ?>" class="cancel waves-effect waves-effect waves-light red lighten-1 btn">Cancel</a></div></div>
	
</form>
</div><!-- /.row -->