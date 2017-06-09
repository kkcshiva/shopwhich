<?php
include_once('dbfunction.php');

$cn=new dbfunction();  

 $username=$_REQUEST['username'];
 $password=$_REQUEST['password'];

$Result=$cn->checkuserLogin($username,$password);

if($Result){
    $result = array();
    if(mysql_num_rows($Result)) {
		
        while($data = mysql_fetch_assoc($Result)) {
            $result['logindata'] =  $data;
        }     
	}
}

header('Content-type: application/json');
echo json_encode(array('result'=>$result,'no_of_results' => mysql_num_rows($Result).'','status' => 'success'));
?>