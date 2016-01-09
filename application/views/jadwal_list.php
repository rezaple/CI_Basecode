<div class="row">
            <div class="col m4 s12">
                <h3>Jadwal List</h3>
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
                      <?php echo anchor(site_url('jadwal/create'), 'Create', 'class="create waves-effect waves-light btn"'); ?>
		<?php echo anchor(site_url('jadwal/excel'), 'Excel', 'class="waves-effect waves-light btn"'); ?>
	
                      </div>
              </div>
            </div>
        </div>

        <table class="striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
		    <th>Id Tes</th>
		    <th>Id Kelas</th>
		    <th>Tgl Tes</th>
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($jadwal_data as $jadwal)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td><?php echo $jadwal->id_tes ?></td>
		    <td><?php echo $jadwal->id_kelas ?></td>
		    <td><?php echo $jadwal->tgl_tes ?></td>
		    <td style="text-align:center" width="200px">
			<?php 
			echo anchor(site_url('jadwal/read/'),'<i class="mdi mdi-file-document-box"></i>', array('class'=>'detail btn-floating btn-small waves-effect waves-light green lighten-1','data-id'=> $jadwal->id_jadwal)); 
			echo ' | '; 
			echo anchor(site_url('jadwal/update/'),'<i class="mdi mdi-pen"></i>', array('class'=>'edit btn-floating btn-small waves-effect waves-light blue lighten-1','data-id'=> $jadwal->id_jadwal)); 
			echo ' | '; 
			echo anchor(site_url('jadwal/delete/'),'<i class="mdi mdi-delete"></i>',array('class'=>'delete btn-floating btn-small waves-effect waves-light red lighten-1', 'data-id'=> $jadwal->id_jadwal)); 
			?>
		    </td>
	        </tr>
                <?php
            }
            ?>
            </tbody>
        </table>