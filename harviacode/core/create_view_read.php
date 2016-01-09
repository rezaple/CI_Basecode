<?php

$string = "

          <div class='row'>
            <div class='col s12'>
              <div class='box'>
                <div class='box-header'>
                <h3 class='box-title'>".ucfirst($table_name)." Read</h3>
        <table class=\"striped\">";
foreach ($non_pk as $row) {
    $string .= "\n\t    <tr><td>".label($row["column_name"])."</td><td><?php echo $".$row["column_name"]."; ?></td></tr>";
}
$string .= "\n\t    <tr><td></td><td><a href=\"<?php echo site_url('".$c_url."') ?>\" class=\"cancel waves-effect waves-effect waves-light red lighten-1 btn\">Cancel</a></td></tr>";
$string .= "\n\t</table>
        </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->";



$hasil_view_read = createFile($string, $target."views/" . $v_read_file);

?>
