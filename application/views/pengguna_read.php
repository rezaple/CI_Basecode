

          <div class='row'>
            <div class='col s12'>
              <div class='box'>
                <div class='box-header'>
                <h3 class='box-title'>Pengguna Read</h3>
        <table class="striped">
	    <tr><td>Pengguna</td><td><?php echo $pengguna; ?></td></tr>
	    <tr><td>Password</td><td><?php echo $password; ?></td></tr>
	    <tr><td>Level</td><td><?php echo $level; ?></td></tr>
	    <tr><td>Status</td><td><?php echo $status; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('pengguna') ?>" class="cancel waves-effect waves-effect waves-light red lighten-1 btn">Cancel</a></td></tr>
	</table>
        </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->