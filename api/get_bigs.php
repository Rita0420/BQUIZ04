<?php include_once "db.php";

$bigs=$Types->all(['big_id'=>0]);
foreach($bigs as $big){
    echo "<option value='{$big['id']}'>{$big['name']}</option>";
}