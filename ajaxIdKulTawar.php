<?php
require "fungsi.php";

$mk = $_POST['mk'];
$rs = search('kultawar',"idkultawar = '".$mk."'");
$option = "";
while($data = mysqli_fetch_object($rs)) {
    $option.='<input type="hidden" class="form-control" type="text" name="idkultawar" value="'.$data->idkultawar.'" readonly>';
}
echo $option;