<div class="row">
            <div class="col m4 s12">
                <h3>Tes List</h3>
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
                      <?php echo anchor(site_url('tes/create'), 'Create', 'class="create waves-effect waves-light btn"'); ?>
		<?php echo anchor(site_url('tes/excel'), 'Excel', 'class="waves-effect waves-light btn"'); ?>
		<?php echo anchor(site_url('tes/word'), 'Word', 'class="waves-effect waves-light btn"'); ?>
	
                      </div>
              </div>
            </div>
        </div>

        <table class="striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
		    <th>Nama Tes</th>
		    <th>Nip</th>
		    <th>Jumlah Soal</th>
		    <th>Waktu</th>
		    <th>Status Tes</th>
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($tes_data as $tes)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td><?php echo $tes->nama_tes ?></td>
		    <td><?php echo $tes->nip ?></td>
		    <td><?php echo $tes->jumlah_soal ?></td>
		    <td><?php echo $tes->waktu ?></td>
		    <td><?php echo $tes->status_tes ?></td>
		    <td style="text-align:center" width="200px">
			<?php 
			echo anchor(site_url('tes/read/'),'<i class="mdi mdi-file-document-box"></i>', array('class'=>'detail btn-floating btn-small waves-effect waves-light green lighten-1','data-id'=> $tes->id_tes)); 
			echo ' | '; 
			echo anchor(site_url('tes/update/'),'<i class="mdi mdi-pen"></i>', array('class'=>'edit btn-floating btn-small waves-effect waves-light blue lighten-1','data-id'=> $tes->id_tes)); 
			echo ' | '; 
			echo anchor(site_url('tes/delete/'),'<i class="mdi mdi-delete"></i>',array('class'=>'delete btn-floating btn-small waves-effect waves-light red lighten-1', 'data-id'=> $tes->id_tes)); 
			?>
		    </td>
	        </tr>
                <?php
            }
            ?>
            </tbody>
        </table>