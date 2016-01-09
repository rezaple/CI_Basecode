

          <div class='row'>
            <div class='col s12'>
              <div class='box'>
                <div class='box-header'>
                <h3 class='box-title'>Menu Read</h3>
        <table class="striped">
	    <tr><td>Name</td><td><?php echo $name; ?></td></tr>
	    <tr><td>Link</td><td><?php echo $link; ?></td></tr>
	    <tr><td>Icon</td><td><?php echo $icon; ?></td></tr>
	    <tr><td>Is Active</td><td><?php echo $is_active; ?></td></tr>
	    <tr><td>Is Parent</td><td><?php echo $is_parent; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('menu') ?>" class="cancel waves-effect waves-effect waves-light red lighten-1 btn">Cancel</a></td></tr>
	</table>
        </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->