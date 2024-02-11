<?php
session_start();
if (($_SESSION["logged"] ?? false) === false) {
    header('location:login.php');
    exit;
}
