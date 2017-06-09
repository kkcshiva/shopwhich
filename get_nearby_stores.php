<?php
include_once('dbfunction.php');

$cn=new dbfunction();  

//print_r($_REQUEST);
$sotreid=$_REQUEST['sotreid'];
$lat=$_REQUEST['lat'];
$lng=$_REQUEST['lng'];

$Result=$cn->get_nearby_stores($sotreid,$lat,$lng);

if($Result){
    $result = array();
    if(mysql_num_rows($Result)) {
		
        while($data = mysql_fetch_assoc($Result)) {
            $result['nearby_stores'][] =  $data;
        }     
	}
}

header('Content-type: application/json');
echo json_encode(array('result'=>$result,'no_of_results' => mysql_num_rows($Result).'','status' => 'success'));
?>