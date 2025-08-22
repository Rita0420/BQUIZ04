<?php include_once "db.php";

$mids=$Types->all(['big_id'=>$_GET['big_id']]);
foreach($mids as $mid){
    echo "<option value='{$mid['id']}'>{$mid['name']}</option>";
}