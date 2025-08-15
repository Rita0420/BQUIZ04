<?php include_once "db.php";

//把陣列轉譯
$_POST['pr']=serialize($_POST['pr']);

$Admin->save($_POST);

to("../backend.php");