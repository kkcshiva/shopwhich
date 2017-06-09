<?php
include_once('dbfunction.php');

$cn=new dbfunction();  

$sotreid=$_REQUEST['sotreid'];

$Result=$cn->get_product_stores($sotreid);

if($Result){
    $result = array();
    if(mysql_num_rows($Result)) {
		
        while($data = mysql_fetch_assoc($Result)) {
            $result['product_stores'][] =  $data;
        }     
	}
}

header('Content-type: application/json');
echo json_encode(array('result'=>$result,'no_of_results' => mysql_num_rows($Result).'','status' => 'success'));
?>