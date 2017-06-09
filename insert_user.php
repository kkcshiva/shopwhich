<?php
include_once('dbfunction.php');
$_SESSION['error']="";
 $obj = new dbfunction();
 
$name=$_POST['name'];
$email=$_POST['email'];
$password=$_POST['password'];
$mobno=$_POST['mobno'];

$insert=$obj->insert_user($name,$email,$password,$mobno);
if($insert){
	echo $insert;
}else{
	echo '-1';
}
?>