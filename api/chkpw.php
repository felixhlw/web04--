<?php
include_once "../base.php";
$table=$_GET['table'];
$acc=$_GET['acc'];
$pw=$_GET['pw'];
$chk=nums($table,["acc"=>$acc,"pw"=>$pw]);
if($chk>0){
    echo 1;
    //$_SESSION[$table]=$acc;
    switch($table){
        case "admin":
            $_SESSION['admin']=$acc;
        break;
        case "member":
            $_SESSION['mem']=$acc;
        break;
    }
}else{
    echo 0;
}