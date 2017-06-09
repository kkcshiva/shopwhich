<?php
include_once('dbfunction.php');
$_SESSION['error']="";
 $obj = new dbfunction();
 
$name=$_REQUEST['name'];
$email=$_REQUEST['email'];
$user_id=$_REQUEST['user_id'];
$phone=$_REQUEST['phone'];

echo $update=$obj->update_user($name,$email,$user_id,$phone);

?>