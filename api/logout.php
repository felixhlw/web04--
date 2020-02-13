<?php
include_once "../base.php";
session_start();

unset($_SESSION['mem']);
unset($_SESSION['cart']);

to("../index.php");


?>