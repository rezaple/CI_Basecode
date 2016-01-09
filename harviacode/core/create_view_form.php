<?php

$string = "<!-- Main content -->
          <div class='row'>
            <div class='col s12 m4'><h3>".  strtoupper($table_name)."</h3></div>
            <div class='col s12 m4'>
              <div class='center' id='response'>
              </div>
            </div>
            ";
$string .= "
        <form class='col s12'  id='create_form' action=\"<?php echo \$action; ?>\" method=\"post\">";
foreach ($non_pk as $row) {
  $label= ucwords(str_replace("_"," ",$row["column_name"]));
    if ($row["data_type"] == 'text') {
        $string .="<div class='row'><div class='input-field col s12'>";
        $string .= "\n\t <?php echo form_error('" . $row["column_name"] . "') ?>
            <textarea class=\"materialize-textarea\" rows=\"3\" name=\"" . $row["column_name"] . "\" id=\"" . $row["column_name"] . "\" ><?php echo $" . $row["column_name"] . "; ?></textarea>
            <label for=\"" . $row["column_name"] . "\"> ".$label."</label></div></div>";
    } else {
        $string .="<div class='row'><div class='input-field col s12'>";
        $string .= "\n\t  <?php echo form_error('" . $row["column_name"] . "') ?>
            <input type=\"text\" class=\"validate\" name=\"" . $row["column_name"] . "\" id=\"" . $row["column_name"] . "\"  placeholder=\"<?php echo $" . $row["column_name"] . "; ?>\"  value=\"<?php echo $" . $row["column_name"] . "; ?>\" />
            <label for=\"" . $row["column_name"] . "\">".$label."</label></div></div>";
    }
}
$string .= "\n\t    <input type=\"hidden\" name=\"" . $pk . "\" value=\"<?php echo $" . $pk . "; ?>\" /> ";
$string .= "\n\t    <div class='row'><div class='right'><button type=\"submit\" class=\"waves-effect waves-light btn\"><?php echo \$button ?></button> ";
$string .= "\n\t    <a href=\"<?php echo site_url('" . $c_url . "') ?>\" class=\"cancel waves-effect waves-effect waves-light red lighten-1 btn\">Cancel</a></div></div>";
$string .= "\n\t
</form>
</div><!-- /.row -->";

$hasil_view_form = createFile($string, $target . "views/" . $v_form_file);
?>
