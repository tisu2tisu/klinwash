<?php
session_start();
include_once "functions.php";
session_destroy();
header("Location: login.php");
?>