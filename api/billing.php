<?php
include_once "../base.php";
echo "<script>alert(`訂購成功\n感謝您的選購`)</script>";
$_POST['no']=date("Ymd").rand(100000,999999);
$_POST['acc']=$_SESSION['mem'];
$_POST['goods']=serialize($_SESSION['cart']);
save("ord",$_POST);
unset($_SESSION['cart']);
to("../index.php");
/* echo "<pre>";print_r($_POST);"</pre>"; */
?>