<?php
include_once('dbfunction.php');

$cn=new dbfunction();  
	if($_REQUEST['custphone']!='' )
	{
		$pid=$_REQUEST['id'];
		$cname=$_REQUEST['custname'];
		$index1=$_REQUEST['custphone'];
		$index2=$_REQUEST['storecontactno'];
		

$in=mysql_query("insert into `product_enquiry` values('','$pid','$cname','$index','active')") or die(mysql_error());
header('Content-type: application/json');
	
	if($in){
	
		$message1="Thankyou for Contacting us.We will get back to you soon!";
		$message2="A User with Number ".$index1." requested an enquiry for your stores via shop@";
		
		$messageuser= str_replace(" ","%20",$message1);
		$messageshop= str_replace(" ","%20",$message2);
		
		$linkuser="http://login.rocktosms.com/api/web2sms.php?workingkey=1499313h210b69009aw9f&sender=RUSHME&to=$index1&message=$messageuser";   
		$homepage1 = mb_convert_encoding( file_get_contents($linkuser), "HTML-ENTITIES", "UTF-8"  );
			
			
		$linkshop="http://login.rocktosms.com/api/web2sms.php?workingkey=1499313h210b69009aw9f&sender=RUSHME&to=$index2&message=$messageshop";   
		$homepage2 = mb_convert_encoding( file_get_contents($linkshop), "HTML-ENTITIES", "UTF-8"  );
			
			if($homepage1=="Invalid Mobile Numbers" || $homepage2=="Invalid Mobile Numbers"){
				$status="Not send";
			}else{
				$status="Send";
			}
			
	
		echo json_encode(array('status' => $status));
	
	}else{
			
		echo json_encode(array('status' => 'failed'));
	}
		
}else{

	echo json_encode(array('status' => 'failed'));
}
	
?>