<?php    

include('dbConnect.php');  
class dbfunction
{
 function __construct() {  
              
            // connecting to database  
            $db = new dbConnect();
               
        }   
		// destructor  
        function __destruct() {  
              
        }
		

 public function add_user($name,$email,$password,$imgnewFilePath,$mobno)
   {
   $user="CREATE TABLE IF NOT EXISTS `users`(  `user_id` int(100) NOT NULL ,  `name` varchar(300) NOT NULL,  `emailid` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL UNIQUE,  `phone` varchar(300) NOT NULL,  `status` varchar(300) NOT NULL,      PRIMARY KEY (user_id) )  ";
mysql_query($user) or die(mysql_error());
$status=1;
$password=md5($password);
$qry=mysql_query("INSERT INTO  `users` (`user_id` ,`name` ,`emailid` ,`password` ,`img`,`phone` ,`status` )
VALUES ('','$name','$email','$password','$imgnewFilePath','$mobno','$status')") or die(mysql_error());
if($qry){
return 1;
}
}

public function insert_user($name,$email,$password,$mobno)
   {
   $user="CREATE TABLE IF NOT EXISTS `users`(  `user_id` int(100) NOT NULL ,  `name` varchar(300) NOT NULL,  `emailid` varchar(300) NOT NULL,
	`password` varchar(300) NOT NULL UNIQUE,  `phone` varchar(300) NOT NULL,  `status` varchar(300) NOT NULL,      PRIMARY KEY (user_id) )  ";
	mysql_query($user) or die(mysql_error());
	$status=1;
	$imgnewFilePath='';
	$password=md5($password);
	$qry=mysql_query("INSERT INTO  `users` (`user_id` ,`name` ,`emailid` ,`password` ,`img`,`phone` ,`status` )
	VALUES ('','$name','$email','$password','$imgnewFilePath','$mobno','$status')") or die(mysql_error());
	if($qry){
	return mysql_insert_id();
	}
}

 public function add_comment($cname,$cemail,$cwebsite,$subject,$storeid,$rating)
   {

$qry=mysql_query("INSERT INTO  `rating` (`id`,`userid` ,`storeid` ,`rating` ,`message` ,`cname`,`cemail`)
VALUES ('','','$storeid','$rating','$subject','$cname','$cemail')") or die(mysql_error());
if($qry){
return 1;
}
}

public function checkuserLogin($username,$password)
{
$password=md5($password);
// echo "select * from users where (emailid='".$username."' || name='".$username."') AND password='".$password."'";
//exit;
$sql=mysql_query("select * from users where (emailid='".$username."' || name='".$username."') AND password='".$password."'");	
$ret=mysql_num_rows($sql);
if($ret>=1){
	return $sql;
}else{
	return 0;
}

}

function get_all_comments($sotreid) {
		
		$query = "SELECT * FROM `rating` WHERE storeid='$sotreid' order by id desc";
		$result = mysql_query($query) or die(mysql_error());

			return $result;
		
		
		
	}
	
	function get_all_stores (){
		
		$query = "SELECT * FROM `stores` WHERE 1";
		$result = mysql_query($query) or die(mysql_error());

			return $result;
		
	}
		function get_product_stores_byname($storename,$stid){
			 $query = "SELECT * FROM `stores` WHERE st_name LIKE '%$storename%' and products LIKE '%$stid%'";
				$result = mysql_query($query) or die(mysql_error());
		return $result;
		}
		
		
	function get_product_stores($sotreid){
		if($sotreid=='Nearby')				{
// SELECT *,3963.0 * ACOS(   SIN( stores.lat*PI()/180 ) * SIN( 17.437461*PI()/180 ) + COS( stores.lat*PI()/180 ) * COS( 17.437461*PI()/180 )  *  COS( (78.448288*PI()/180) - (stores.lng*PI()/180) )   )  AS distance FROM stores 
// ORDER BY distance ASC 

		  $latti=$_SESSION['latitude'];
		  $loong=$_SESSION['longitude'];
		  
			if($latti=='' || $loong==''){
			   $latti=$_COOKIE['latttitude'];
			   $loong=$_COOKIE['longitude'];
			}
			$query = "SELECT *,3963.0 * ACOS(   SIN(stores.lat*PI()/180 ) * SIN( $latti*PI()/180 ) + COS( stores.lat*PI()/180 ) * COS( $latti*PI()/180 )  *  COS( ($loong*PI()/180) - (stores.lng*PI()/180) )   )  AS distance 
			FROM stores ORDER BY distance ASC ";
		}else if($sotreid=='Papular'){
			$query = "SELECT * FROM stores ORDER BY  (SELECT AVG(rating) FROM `rating` WHERE stores.id=rating.storeid) DESC";
		}	else {
			$query = "SELECT * FROM `stores` WHERE products LIKE '%$sotreid%'";
		}
		
		$result = mysql_query($query) or die(mysql_error());
		return $result;
	}
	
	function get_product_storeswith_pages($sotreid,$page){
		$num_rec_per_page=15;
		$offset = $num_rec_per_page * $page ;
		 $latti=$_SESSION['latitude'];
		  $loong=$_SESSION['longitude'];
		  
			if($latti=='' || $loong==''){
			   $latti=$_COOKIE['latttitude'];
			   $loong=$_COOKIE['longitude'];
			}
		if($sotreid=='Nearby')				{
// SELECT *,3963.0 * ACOS(   SIN( stores.lat*PI()/180 ) * SIN( 17.437461*PI()/180 ) + COS( stores.lat*PI()/180 ) * COS( 17.437461*PI()/180 )  *  COS( (78.448288*PI()/180) - (stores.lng*PI()/180) )   )  AS distance FROM stores 
// ORDER BY distance ASC 

		  $latti=$_SESSION['latitude'];
		  $loong=$_SESSION['longitude'];
		  
			if($latti=='' || $loong==''){
			   $latti=$_COOKIE['latttitude'];
			   $loong=$_COOKIE['longitude'];
			}
			$query = "SELECT *,3963.0 * ACOS(   SIN(stores.lat*PI()/180 ) * SIN( $latti*PI()/180 ) + COS( stores.lat*PI()/180 ) * COS( $latti*PI()/180 )  *  COS( ($loong*PI()/180) - (stores.lng*PI()/180) )   )  AS distance 
			FROM stores ORDER BY distance ASC limit $offset,$num_rec_per_page";
		}else if($sotreid=='Papular'){
			//$query = "SELECT * FROM stores ORDER BY  (SELECT AVG(rating) FROM `rating` WHERE stores.id=rating.storeid) DESC  limit $offset,$num_rec_per_page";
			$query = "SELECT *,3963.0 * ACOS(   SIN(stores.lat*PI()/180 ) * SIN( $latti*PI()/180 ) + COS( stores.lat*PI()/180 ) * COS( $latti*PI()/180 )  *  COS( ($loong*PI()/180) - (stores.lng*PI()/180) )   )  AS distance
			FROM stores ORDER BY  (SELECT AVG(rating) FROM `rating` WHERE stores.id=rating.storeid) DESC  limit $offset,$num_rec_per_page";
		}	else {
			//$query = "SELECT * FROM `stores` WHERE products LIKE '%$sotreid%' limit $offset,$num_rec_per_page";
			$query = "SELECT *,3963.0 * ACOS(   SIN(stores.lat*PI()/180 ) * SIN( $latti*PI()/180 ) + COS( stores.lat*PI()/180 ) * COS( $latti*PI()/180 )  *  COS( ($loong*PI()/180) - (stores.lng*PI()/180) )   )  AS distance
			FROM `stores` WHERE products LIKE '%$sotreid%' limit $offset,$num_rec_per_page";
		}
		//echo $query;
		$result = mysql_query($query) or die(mysql_error());
		return $result;
	}
	
	
	function get_nearby_stores($sotreid,$lat,$lng){
		 // echo $sotreid;
		
		if($sotreid=='Nearby'){	
			
			$query = "SELECT *,3963.0 * ACOS(   SIN(stores.lat*PI()/180 ) * SIN( '$lat'*PI()/180 ) + COS( stores.lat*PI()/180 ) * COS( '$lat'*PI()/180 )
			*  COS( ($lng*PI()/180) - (stores.lng*PI()/180) )   )  AS distance FROM stores ORDER BY distance ASC;";
		} else if($sotreid=='Popular'){
			$query = "SELECT * FROM stores ORDER BY  (SELECT AVG(rating) FROM `rating` WHERE stores.id=rating.storeid) DESC";
		} else {
			$query = "SELECT * FROM `stores` WHERE products LIKE '%$sotreid%'";
		}
		// echo $query ;
		$result = mysql_query($query) or die(mysql_error());
		return $result;
	}
	
	function update_user($name,$email,$user_id,$phone){
			//echo "update users set name='$name',phone='$phone',emailid='$email' where user_id='$user_id';";
		$qry=mysql_query("update users set name='$name',phone='$phone',emailid='$email' where user_id='$user_id';") or die(mysql_error());
		
		if($qry){
			return mysql_affected_rows();
		}
		
	}
	
	function get_all_productes ()
	{
		$query = "select * from products ORDER BY product_order";
		//$query = "SELECT * FROM `products`";
		$result = mysql_query($query) or die(mysql_error());
		return $result;
		
	}
	
	
	function get_single_store($sotreid){
	
		$query = "SELECT * FROM `stores` WHERE id='$sotreid';";
		$result = mysql_query($query) or die(mysql_error());
		return $result;
		
	}
	
	public function checkuseremailmb($emailid,$mobile)	
		{
		echo $emailid;
		echo $mobile='9441089969';
			$sql=mysql_query("select * from userdetails where mobileno='".$mobile."'");	
		$ret=mysql_num_rows($sql);
		if($ret>=1)		{
		echo "Ok";
		return $sql;
		}		else		{
		echo "No";
		return 0;
	}

}


 
 public function edit_user($name,$mobileno,$emailid,$address,$uid)
   {
 $update_qry=mysql_query("update userdetails set name='$name',mobileno='$mobileno',emailid='$emailid',address='$address'  where userid='$uid'") or die(mysql_error());
	if($update_qry){
	return 1;
	}
} 

public function add_getintouch($name,$email,$des)
   {
   $qry=mysql_query("INSERT INTO  `getintouch` (`id`,`name` ,`email` ,`des` )
VALUES ('','$name','$email','$des')") or die(mysql_error());
if($qry)
{
return 1;
}
}

function get_stores_by_search($sotreid,$category){
$query = "SELECT * FROM stores where st_name like '%$sotreid%' and products like '%$category%'";
$result = mysql_query($query) or die(mysql_error());
return $result;
}


function get_store_rating ($storeid){

$query = "SELECT AVG(rating) as rating FROM `rating` WHERE storeid = '$storeid' ";
$result = mysql_query($query) or die(mysql_error());
return $result;

}

//////////////////////end classssssss////////////////////////////// 
}