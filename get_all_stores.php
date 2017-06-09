<?php
include_once('dbfunction.php');

$cn=new dbfunction();  

$Result=$cn->get_all_stores();

if($Result){
    $result = array();
    if(mysql_num_rows($Result)) {
		
        while($data = mysql_fetch_assoc($Result)) {
            $result['all_stores'][] =  $data;
        }     
	}
}

header('Content-type: application/json');
echo json_encode(array('result'=>$result,'no_of_results' => mysql_num_rows($Result).'','status' => 'success'));
?>