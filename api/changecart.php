<?php

session_start();
$id=$_POST['id'];
$num=$_POST['num'];
$_SESSION['cart'][$id]=$num;

?>