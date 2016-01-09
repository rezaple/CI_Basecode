<?php

$string = "<div class=\"row\">
            <div class=\"col m4 s12\">
                <h3>".ucwords($table_name)." List</h3>
            </div>
            <div class=\"col m4 s12\">
                    <?php echo \$this->session->userdata('message') <> '' ? \$this->session->userdata('message') : ''; ?>
                    <div class=\"center\" id=\"response\"></div>
            </div>
            <div class=\"col  s12 m4 offset-m4\">
                <div class=\"row\">
                </div>
                <div class=\"row\">
                      <div class=\"right\">
                      <?php echo anchor(site_url('".$c_url."/create'), 'Create', 'class=\"create waves-effect waves-light btn\"'); ?>";
                      if ($export_excel == '1') {
                          $string .= "\n\t\t<?php echo anchor(site_url('".$c_url."/excel'), 'Excel', 'class=\"waves-effect waves-light btn\"'); ?>";
                      }
                      if ($export_word == '1') {
                          $string .= "\n\t\t<?php echo anchor(site_url('".$c_url."/word'), 'Word', 'class=\"waves-effect waves-light btn\"'); ?>";
                      }
                      if ($export_pdf == '1') {
                          $string .= "\n\t\t<?php echo anchor(site_url('".$c_url."/pdf'), 'PDF', 'class=\"waves-effect waves-light btn\"'); ?>";
                      }
                      $string .= "\n\t
                      </div>
              </div>
            </div>
        </div>

        <table class=\"striped\" id=\"mytable\">
            <thead>
                <tr>
                    <th width=\"80px\">No</th>";
foreach ($non_pk as $row) {
    $string .= "\n\t\t    <th>" . label($row['column_name']) . "</th>";
}
$string .= "\n\t\t    <th>Action</th>
                </tr>
            </thead>";
$string .= "\n\t    <tbody>
            <?php
            \$start = 0;
            foreach ($" . $c_url . "_data as \$$c_url)
            {
                ?>
                <tr>";

$string .= "\n\t\t    <td><?php echo ++\$start ?></td>";

foreach ($non_pk as $row) {
    $string .= "\n\t\t    <td><?php echo $" . $c_url ."->". $row['column_name'] . " ?></td>";
}

$string .= "\n\t\t    <td style=\"text-align:center\" width=\"200px\">"
        . "\n\t\t\t<?php "
        . "\n\t\t\techo anchor(site_url('".$c_url."/read/'),'<i class=\"mdi mdi-file-document-box\"></i>', array('class'=>'detail btn-floating btn-small waves-effect waves-light green lighten-1','data-id'=> $".$c_url."->".$pk.")); "
        . "\n\t\t\techo ' | '; "
        . "\n\t\t\techo anchor(site_url('".$c_url."/update/'),'<i class=\"mdi mdi-pen\"></i>', array('class'=>'edit btn-floating btn-small waves-effect waves-light blue lighten-1','data-id'=> $".$c_url."->".$pk.")); "
        . "\n\t\t\techo ' | '; "
        . "\n\t\t\techo anchor(site_url('".$c_url."/delete/'),'<i class=\"mdi mdi-delete\"></i>',array('class'=>'delete btn-floating btn-small waves-effect waves-light red lighten-1', 'data-id'=> $".$c_url."->".$pk.")); "
        . "\n\t\t\t?>"
        . "\n\t\t    </td>";

$string .=  "\n\t        </tr>
                <?php
            }
            ?>
            </tbody>
        </table>";


$hasil_view_list = createFile($string, $target."views/" . $v_list_file);

?>
