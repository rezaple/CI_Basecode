<div class="row">
            <div class="col m4 s12">
                <h3>Pengguna List</h3>
            </div>
            <div class="col m4 s12">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                    <div class="center" id="response"></div>
            </div>
            <div class="col  s12 m4 offset-m4">
                <div class="row">
                </div>
                <div class="row">
                      <div class="right">
                      <?php echo anchor(site_url('pengguna/create'), 'Create', 'class="create waves-effect waves-light btn"'); ?>
		<?php echo anchor(site_url('pengguna/excel'), 'Excel', 'class="waves-effect waves-light btn"'); ?>
		<?php echo anchor(site_url('pengguna/word'), 'Word', 'class="waves-effect waves-light btn"'); ?>
	
                      </div>
              </div>
            </div>
        </div>

        <table class="striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
		    <th>Pengguna</th>
		    <th>Password</th>
		    <th>Level</th>
		    <th>Status</th>
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($pengguna_data as $pengguna)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td><?php echo $pengguna->pengguna ?></td>
		    <td><?php echo $pengguna->password ?></td>
		    <td><?php echo $pengguna->level ?></td>
		    <td><?php echo $pengguna->status ?></td>
		    <td style="text-align:center" width="200px">
			<?php 
			echo anchor(site_url('pengguna/read/'),'<i class="mdi mdi-file-document-box"></i>', array('class'=>'detail btn-floating btn-small waves-effect waves-light green lighten-1','data-id'=> $pengguna->id_pengguna)); 
			echo ' | '; 
			echo anchor(site_url('pengguna/update/'),'<i class="mdi mdi-pen"></i>', array('class'=>'edit btn-floating btn-small waves-effect waves-light blue lighten-1','data-id'=> $pengguna->id_pengguna)); 
			echo ' | '; 
			echo anchor(site_url('pengguna/delete/'),'<i class="mdi mdi-delete"></i>',array('class'=>'delete btn-floating btn-small waves-effect waves-light red lighten-1', 'data-id'=> $pengguna->id_pengguna)); 
			?>
		    </td>
	        </tr>
                <?php
            }
            ?>
            </tbody>
        </table>