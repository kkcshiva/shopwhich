<?php
class DB_Connect {

	function __construct(){

		 $cn=mysql_connect("localhost", "rushfuqn_online", "L9svGtZOKgg9") or die(mysql_error());
		 mysql_select_db("rushfuqn_onlinestores",$cn) or die("Could connect to Database");
		
	}


	// users functions
	
		function Users_login($id,$pwd){
			
		echo $query = " SELECT user_id,name, emailid, phone, status,created_date FROM users where emailid ='$id' and  password = '$pwd' "; 
		$result = mysql_query($query) or die(mysql_error());

		if( $result )
		{
			$arr = $this->extract_data($result);
			if($arr)
			return $arr[0]  ;
			else
			return array();
		}
		else
		{
			return 0 ;
		}
	}
	
		
		function admin_login($id,$pwd){
			
		 $query = " SELECT * FROM admin where mailid ='$id' and  password = '$pwd' "; 
		$result = mysql_query($query) or die(mysql_error());

		if( $result )
		{
			$arr = $this->extract_data($result);
			if($arr)
			return $arr[0]  ;
			else
			return array();
		}
		else
		{
			return 0 ;
		}
	}
	function sales_login($id,$pwd){
			
		 $query = " SELECT * FROM salesperson where emailid ='$id' and  password = '$pwd' "; 
		$result = mysql_query($query) or die(mysql_error());

		if( $result )
		{
			$arr = $this->extract_data($result);
			if($arr)
			return $arr[0]  ;
			else
			return array();
		}
		else
		{
			return 0 ;
		}
	}
	public function activate($id,$status,$table)
{
	$query=mysql_query("update `".$table."` set ".$table."_status='".$status."' where ".$table."_id='".$id."'") or die(mysql_error());
    if($query)
	{
		
		return 1;
	}
	else
	{
		return 0;
	}
}

public function deleterow($id,$table)
{
	$query=mysql_query("delete from `".$table."` where ".$table."_id='".$id."'") or die(mysql_error());
    if($query)
	{
		
		return 1;
	}
	else
	{
		return 0;
	}
}
		function 	addsalesperson(  $username, $email, $phonenum,$password, $img, $type,$target,$createdat )
	{
		 $query = " INSERT INTO salesperson  VALUES  ( '', '$username', '$email', '$password', '$phonenum', 'active', Now(),'$img','$type','$target' ) "; 
		$result = mysql_query($query)or die(mysql_error());

		if( $result )
		{
			return mysql_insert_id();
		}
		else
		{
			return -1;
		}
	}
		
	
	 public function add_Stores($shopname,$shoptitle,$mobile,$imgnewFilePath,$address,$description,$productes,$latitude,$longitude,$sales_person_id,
	 $pincode,$address2,$seasonal,$discounting,$restocking,$range,$ownername,$mobile2,$city,$other,$offerimg,$timings)
   {
// echo $offerimg;
$productes=implode(",",$productes);
$status=1;
$remark='tested work fine';

// echo "INSERT INTO  `stores` VALUES ('','$shopname','$description','$imgnewFilePath',
// '$remark','$status','$address','$mobile','$latitude','$longitude','',
// '$productes','$shoptitle','$sales_person_id','$address2','$pincode','$seasonal',
// '$discounting','$restocking','$range','$ownername','$mobile2','$city','$other','$offerimg')";

$qry=mysql_query("INSERT INTO  `stores` VALUES ('','$shopname','$description','$imgnewFilePath',
'$remark','$status','$address','$mobile','$latitude','$longitude',Now(),
'$productes','$shoptitle','$sales_person_id','$address2','$pincode','$seasonal',
'$discounting','$restocking','$range','$ownername','$city','$mobile2','$other','$offerimg','$timings')") or die(mysql_error());
if($qry)
{
return 1;
}
}

	 public function updare_Stores($shopname,$shoptitle,$mobile,$imgnewFilePath,$address,$description,$productes,$latitude,$longitude,$ctid,$pincode,
	 $address2,$seasonal,$discounting,$restocking,$range,$ownername,$mobile,$city,$other,$offer,$timings)
   {
	   // echo "update  `stores` set st_name='$shopname',st_descript='".mysql_real_escape_string($description)."',address='$address' ,contactno='$mobile',
// lat='$latitude',lng='$longitude',products='$productes',st_title='".mysql_real_escape_string($shoptitle)."',address2='$address2',pincode='$pincode' where id=$ctid ";
   
   if($imgnewFilePath!='')
{
$productes=implode(",",$productes);
$qry=mysql_query("update stores set st_name='$shopname',st_descript='".mysql_real_escape_string($description)."',image='$imgnewFilePath' ,
address='$address' ,contactno='$mobile',lat='$latitude',lng='$longitude',products='$productes',st_title='".mysql_real_escape_string($shoptitle)."',
address2='$address2',pincode='$pincode',seasonal='$seasonal',discounting='$discounting',restocking='$restocking',
owner='$ownername',mobile='$mobile',city='$city',other='$other',offerimg='$offer',timings='$timings' where id='$ctid' ") or die(mysql_error());
}
else
{
$productes=implode(",",$productes);
$qry=mysql_query("update  stores set st_name='$shopname',st_descript='".mysql_real_escape_string($description)."',address='$address' ,contactno='$mobile',
lat='$latitude',lng='$longitude',products='$productes',st_title='".mysql_real_escape_string($shoptitle)."',address2='$address2',
pincode='$pincode',offerimg='$offer',timings='$timings' where id='$ctid' ") or die(mysql_error());

}
if($qry)
{
return 1;
}
else
{
return 0;
}
}	
	 public function add_cate($catgna,$description,$image)
   {

$status=1;
$qry=mysql_query("INSERT INTO  `products` (`id` ,`product_name` ,`discription` ,`status`,`img` )
VALUES ('','$catgna','$description','$status','$image')") or die(mysql_error());
if($qry)
{
return 1;
}
}	
		
		// function Users_login($id,$pwd){
			
		// $query = " SELECT user_id,name, emailid, phone, status,created_date FROM Users where emailid ='$id' and  password = '$pwd' "; 
		// $result = mysql_query($query) or die(mysql_error());

		// if( $result )
		// {
			// $arr = $this->extract_data($result);
			// if(count($arr )>0)
			// return $arr[0]  ;
			// else
			// return array();
		// }
		// else
		// {
			// return 0 ;
		// }
	// }


	public function get_all_users() {

		$res=mysql_query("select * from users") or die(mysql_error());
		return  $res;
	}
	
	public function get_all_salesper() {

		$res=mysql_query("select * from salesperson") or die(mysql_error());
		return  $res;
	}
	public function get_salesper($id) {

		$res=mysql_query("select * from salesperson where salesperson_id='$id'") or die(mysql_error());
		return  $res;
	}
	
	public function get_all_productes() 
	{
		//$res=mysql_query("select * from products ORDER BY product_order") or die(mysql_error());
		$res=mysql_query("select * from products") or die(mysql_error());
		return  $res;
	}

// ******* end user functions **********
	
	
//  stores functions



function get_all_stores (){
		
		$query = "SELECT * FROM `stores` ORDER BY  `id` DESC ";
		$result = mysql_query($query) or die(mysql_error());

			return $result;
		
	}
	function get_all_stores_sales($salesid){
		
		$query = "SELECT * FROM `stores` WHERE 1 and sales_person_id='$salesid' order by id desc";
		$result = mysql_query($query) or die(mysql_error());

			return $result;
		
	}

	function getstorsbyid ($stid){
		
		$query = "SELECT * FROM `stores` WHERE id=$stid";
		$result = mysql_query($query) or die(mysql_error());

			return $result;
		
	}

function get_all_popular_stores (){
		
		$query = "SELECT * FROM `stores` WHERE 1";
		$result = mysql_query($query) or die(mysql_error());

			return $result;
		
	}

function get_all_stores_nearby ($lat,$lng){



}

function get_all_stores_byproduct($product){




}







function get_store_byid($id)
{
		$query = " SELECT Id, TempleName, Description, CreatedAt, Status,lat,lng FROM templetimingstemples where Id = $Id ";
		$result = mysql_query($query) or die(mysql_error());
		if( $result )
		{
			return  $result;
		}
		else
		{
			return  -1;
		}
	}	
	
	
	
	
	// store functions end
	
	
	
	
	
	
	public function insert_shop_admin($name,$branch_id,$password,$address,$contact)  {
			
		$create = mysql_query("CREATE TABLE IF NOT EXISTS branch_users (  id int(10) unsigned NOT NULL AUTO_INCREMENT, branch_id varchar(20) NOT NULL,  name varchar(20) NOT NULL,  username varchar(30) NOT NULL,  password varchar(30) NOT NULL,
				  address varchar(200) NOT NULL,  contact varchar(20) NOT NULL,  create_at DATE NOT NULL,  PRIMARY KEY (id), UNIQUE KEY (username));") or die(mysql_error());
			
		$s =mysql_query("select max(id) from branch_users");
		$arr=mysql_fetch_array($s);
		$sno=$arr[0]+1;
		$sno1 = str_pad($sno, 2, "0", STR_PAD_LEFT);
		$sno2 = str_pad($branch_id, 2, "0", STR_PAD_LEFT);

		$name1= strtoupper(substr($name,0,4));

		$username=$name1.$sno2.$sno1;
			
		$insert=mysql_query("INSERT INTO branch_users (id,branch_id,name, username, password, address,contact,create_at) VALUES ('', '$branch_id','$name','$username','$password','$address','$contact','".$this->get_indian_time()."');") or die(mysql_error());

		if ($insert){
			return	mysql_insert_id();
		}else {
			return	-1;
		}
	}

	
	
	public function login_branch_admin($username,$password) {
		$res=mysql_query("select id,branch_id,contact from branch_users where username = '$username' and password = '$password';") or die(mysql_error());
		return  $res;
	}

	public function get_all() {
		$res=mysql_query("select * from branches;") or die(mysql_error());
		return  $res;
	}

	
	public function get_all_temples() {
		$res=mysql_query("select * from main ") or die(mysql_error());
		$res_arr = array();
		if ($res) {
			while ($res_data = mysql_fetch_array($res)) {
				$res_arr[] = $res_data;
			}
		}
		return  $res_arr;

	}
	
	public function delete_branch($id) {
		$delete=mysql_query("delete from branches where id='$id';") or die(mysql_error());
		if ($delete){
			$delete1=mysql_query("delete from branch_users where branch_id='$id';") or die(mysql_error());
			if ($delete1){
				return	1;
			}else {
				return	0;
			}
		}else {
			return	0;
		}
	}

	public function delete_branchuser($id) {
		$delete=mysql_query("delete from branch_users where id='$id';");
		if ($delete){
			return	1;
		}else {
			return	0;
		}
	}
	
	function Users_Insert(  $username, $firstname, $lastname, $email, $phonenum, $address,
	$password, $facebook_id, $createdat )
	{
		$query = " INSERT INTO users ( id, username, firstname, lastname, email, phonenum,
		address, password, facebook_id, createdat )
 VALUES 
 ( '', '$username', '$firstname', '$lastname', '$email', '$phonenum', 
 '$address', '$password', '$facebook_id', '$createdat' ) "; 
		$result = mysql_query($query)or die(mysql_error());

		if( $result )
		{
			return mysql_insert_id();
		}
		else
		{
			return -1;
		}
	}
	
	
	function Users_UPDATE( $id, $username, $firstname, $lastname, $email, $phonenum, $address, $password, $facebook_id, $createdat )
	{
		//UPDATE
		$query = " UPDATE users SET  id = '$id',  username = '$username',  firstname = '$firstname',  lastname = '$lastname',  email = '$email',  phonenum = '$phonenum',  address = '$address',  password = '$password',  facebook_id = '$facebook_id',  createdat = '$createdat' WHERE col = val ";
		$result = mysql_query($query);

		if( $result )
		{
			echo 'Success';
		}
		else
		{
			echo 'Query Failed';
		}
	}
	function Users_($id)
	{
		//DELETE
		$query = " DELETE FROM users    where username ='$id'  ";
		$result = mysql_query($query);

		if( $result )
		{
			echo 'Success';
		}
		else
		{
			echo 'Query Failed';
		}
	}
	function Users_SELECT()
	{
		//SELECT
		$query = " SELECT id, username, firstname, lastname, email, phonenum, address, password, facebook_id, createdat FROM users ";
		$result = mysql_query($query);

		if( $result )
		{
			return $this->extract_data($result);
		}
		else
		{
			echo 'Query Failed';
		}
	}
	
	
	
	/// message on shop
	function user_message_insert($title, $description, $parent, $image, $video_url, $type, $modified,
	$date, $name,
	$user, $status) {

		 $query = " INSERT INTO posts ( ID,title, description, parent, image, video_url, type, modified, date, name,
  user, status )  VALUES ('', '$title', '$description', '$parent', '$image', '$video_url', '$type', '$modified', '$date', '$name', '$user', '$status' ) "; 
		$result = mysql_query($query);

		if( $result )
		{
			return 'Success';
		}
		else
		{
			return 'Query Failed';
		}
	}
	
	function Users_SELECT_ByEmail($email)
	{
		//SELECT
		$query = " SELECT id, username, firstname, lastname, email,
		 phonenum, address, password, facebook_id, createdat FROM users where email ='$email' ";
		$result = mysql_query($query);

		if( $result )
		{
			return $this->extract_data($result);
		}
		else
		{
			return array();
		}
	}
	// selected shop messages
	function posts_select_single($store_id) {

		$query = " SELECT title, description, parent, image, video_url, type, modified,
		 date, name, user, status FROM posts where ID='$id'";
		$result = mysql_query($query);

		if( $result )
		{
			return $result;
		}
		else
		{
			echo 'Query Failed';
		}

	}
	

	function messsage_delete ($user_id,$store_id,$msg_id) {

	echo	$query = " DELETE FROM posts WHERE  ID= '$id'  ";
		$result = mysql_query($query);

		if( $result )
		{
			echo 'Success';
		}
		else
		{
			echo 'Query Failed';
		}
	}
	 
// changing status
	 function UpdateUserPostStatus($id,$status) {
		$qry ="UPDATE posts SET  status=$status  WHERE ID = $id ";
		$result = mysql_query($qry);

		if( $result )
		{
			return  1;
		}
		else
		{
			echo -1;
		}
	}

	function Store_INSERT (  $TempleName, $Description, $CreatedAt, $Status,$location ){
		$query = " INSERT INTO templetimingstemples ( Id, TempleName, Description, CreatedAt, Status,templelocation)
		VALUES ( '', '$TempleName', '$Description', '$CreatedAt', '$Status','$location' ) ";
		$result = mysql_query($query) or die(mysql_error());

		if( $result )
		{
			echo 'Success';
		}
		else
		{
			echo 'Query Failed';
		}
	}	
	
	

	
// utilities 

function extract_data($res) {
		$res_arr = array();
		if ($res) {
			while ($res_data = mysql_fetch_array($res)) {
				$res_arr[] = $res_data;
			}
		}
		return  $res_arr;
	}
	
	


	}

?>