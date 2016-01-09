<!-- Main content -->
          <div class='row'>
            <div clas='col s12 m4'><h3>TES</h3></div>
            <div class='col s12 m4'>
              <div class='center' id='response'>
              </div>
            </div>
            
        <form class='col s12'  id='create_form' action="<?php echo $action; ?>" method="post"><div class='row'><div class='input-field col s12'>
	  <?php echo form_error('nama_tes') ?>
            <input type="text" class="validate" name="nama_tes" id="nama_tes"  placeholder="<?php echo $nama_tes; ?>"  value="<?php echo $nama_tes; ?>" />
            <label for="nama_tes">Nama Tes</label></div></div><div class='row'><div class='input-field col s12'>
	  <?php echo form_error('nip') ?>
            <input type="text" class="validate" name="nip" id="nip"  placeholder="<?php echo $nip; ?>"  value="<?php echo $nip; ?>" />
            <label for="nip">Nip</label></div></div><div class='row'><div class='input-field col s12'>
	  <?php echo form_error('jumlah_soal') ?>
            <input type="text" class="validate" name="jumlah_soal" id="jumlah_soal"  placeholder="<?php echo $jumlah_soal; ?>"  value="<?php echo $jumlah_soal; ?>" />
            <label for="jumlah_soal">Jumlah Soal</label></div></div><div class='row'><div class='input-field col s12'>
	  <?php echo form_error('waktu') ?>
            <input type="text" class="validate" name="waktu" id="waktu"  placeholder="<?php echo $waktu; ?>"  value="<?php echo $waktu; ?>" />
            <label for="waktu">Waktu</label></div></div><div class='row'><div class='input-field col s12'>
	  <?php echo form_error('status_tes') ?>
            <input type="text" class="validate" name="status_tes" id="status_tes"  placeholder="<?php echo $status_tes; ?>"  value="<?php echo $status_tes; ?>" />
            <label for="status_tes">Status Tes</label></div></div>
	    <input type="hidden" name="id_tes" value="<?php echo $id_tes; ?>" /> 
	    <div class='row'><div class='right'><button type="submit" class="waves-effect waves-light btn"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('tes') ?>" class="cancel waves-effect waves-effect waves-light red lighten-1 btn">Cancel</a></div></div>
	
</form>
</div><!-- /.row -->