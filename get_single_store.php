<?php
include_once('dbfunction.php');

$cn=new dbfunction();  

$storeid=$_REQUEST['storeid'];

$Result=$cn->get_single_store($storeid);

if($Result){
    $result = array();
    if(mysql_num_rows($Result)) {
		
        while($data = mysql_fetch_assoc($Result)) {
            $result['single_store'] =  $data;
			$result['single_store']['range'] = unserialize( $data['range']);
			// $result['single_store']['timings'] = unserialize( $data['timings']);
			
			$Result1=$cn->get_store_rating($data['id']);
			$ratingis=0;
			if($Result1){
				
				if(mysql_num_rows($Result1)) {
					
					while($data1 = mysql_fetch_assoc($Result1)) {
						$ratingis=  $data1['rating'];
					}     
				}
			}
			$result['single_store']['rating'] = $ratingis;
			
        }     
	}
}

header('Content-type: application/json');
echo json_encode(array('result'=>$result,'no_of_results' => mysql_num_rows($Result).'','status' => 'success'));
?>