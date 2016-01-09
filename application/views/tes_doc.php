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
        <h2>Tes List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nama Tes</th>
		<th>Nip</th>
		<th>Jumlah Soal</th>
		<th>Waktu</th>
		<th>Status Tes</th>
		
            </tr><?php
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
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>