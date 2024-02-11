<?php
session_start();
unset($_SESSION["id"]);
unset($_SESSION["name"]);
unset($_SESSION["email"]);
$_SESSION["logged"]=false;
header("Location:login.php");
?>