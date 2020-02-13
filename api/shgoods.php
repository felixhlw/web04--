<?php
include_once "../base.php";

$goods=find("goods",$_POST['id']);
$goods['sh']=$_POST['type'];

save("goods",$goods);


?>