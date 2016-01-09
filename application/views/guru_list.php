<div class="row">
            <div class="col m4 s12">
                <h3>Guru List</h3>
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
                      <?php echo anchor(site_url('guru/create'), 'Create', 'class="create waves-effect waves-light btn"'); ?>
		<?php echo anchor(site_url('guru/excel'), 'Excel', 'class="waves-effect waves-light btn"'); ?>
	
                      </div>
              </div>
            </div>
        </div>

        <table class="striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
		    <th>Nuptk</th>
		    <th>Nama Guru</th>
		    <th>Tmp Lahir</th>
		    <th>Tgl Lahir</th>
		    <th>Golongan</th>
		    <th>Pend Guru</th>
		    <th>Id Matpel</th>
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($guru_data as $guru)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td><?php echo $guru->nuptk ?></td>
		    <td><?php echo $guru->nama_guru ?></td>
		    <td><?php echo $guru->tmp_lahir ?></td>
		    <td><?php echo $guru->tgl_lahir ?></td>
		    <td><?php echo $guru->golongan ?></td>
		    <td><?php echo $guru->pend_guru ?></td>
		    <td><?php echo $guru->id_matpel ?></td>
		    <td style="text-align:center" width="200px">
			<?php 
			echo anchor(site_url('guru/read/'),'<i class="mdi mdi-file-document-box"></i>', array('class'=>'detail btn-floating btn-small waves-effect waves-light green lighten-1','data-id'=> $guru->nip)); 
			echo ' | '; 
			echo anchor(site_url('guru/update/'),'<i class="mdi mdi-pen"></i>', array('class'=>'edit btn-floating btn-small waves-effect waves-light blue lighten-1','data-id'=> $guru->nip)); 
			echo ' | '; 
			echo anchor(site_url('guru/delete/'),'<i class="mdi mdi-delete"></i>',array('class'=>'delete btn-floating btn-small waves-effect waves-light red lighten-1', 'data-id'=> $guru->nip)); 
			?>
		    </td>
	        </tr>
                <?php
            }
            ?>
            </tbody>
        </table>