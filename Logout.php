<?php
include_once('dbfunction.php');
 $obj = new dbfunction();
 session_start();
session_destroy();
header("Location:index.php");

?>