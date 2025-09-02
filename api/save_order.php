<?php include_once "db.php";

$_POST['acc']=$_SESSION['login'];
$_POST['items']=serialize($_SESSION['cart']);
$_POST['no']=date("Ymd").rand(100000,999999);

$Orders->save($_POST);

unset($_SESSION['cart']);

to("../index.php");