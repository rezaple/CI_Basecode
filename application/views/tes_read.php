

          <div class='row'>
            <div class='col s12'>
              <div class='box'>
                <div class='box-header'>
                <h3 class='box-title'>Tes Read</h3>
        <table class="striped">
	    <tr><td>Nama Tes</td><td><?php echo $nama_tes; ?></td></tr>
	    <tr><td>Nip</td><td><?php echo $nip; ?></td></tr>
	    <tr><td>Jumlah Soal</td><td><?php echo $jumlah_soal; ?></td></tr>
	    <tr><td>Waktu</td><td><?php echo $waktu; ?></td></tr>
	    <tr><td>Status Tes</td><td><?php echo $status_tes; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('tes') ?>" class="cancel waves-effect waves-effect waves-light red lighten-1 btn">Cancel</a></td></tr>
	</table>
        </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->