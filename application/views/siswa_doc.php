<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>Siswa List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nama Siswa</th>
		<th>Jenkel</th>
		<th>Tmp Lahir</th>
		<th>Tgl Lahir</th>
		<th>Id Kelas</th>
		
            </tr><?php
            foreach ($siswa_data as $siswa)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $siswa->nama_siswa ?></td>
		      <td><?php echo $siswa->jenkel ?></td>
		      <td><?php echo $siswa->tmp_lahir ?></td>
		      <td><?php echo $siswa->tgl_lahir ?></td>
		      <td><?php echo $siswa->id_kelas ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>