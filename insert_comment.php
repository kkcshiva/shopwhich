<?php
include_once('dbfunction.php');

$cn=new dbfunction();  

$cname=$_POST['cname'];
$cemail=$_POST['cemail'];
$cwebsite=$_POST['cwebsite'];
$rating=$_POST['rating'];
$subject=$_POST['subject'];
$storeeidd=$_POST['storeidd'];

$insert=$cn->add_comment($cname,$cemail,$cwebsite,$subject,$storeeidd,$rating);

if($insert){
 echo 'suceess';
}else{
 echo  'fail';
}

?>

