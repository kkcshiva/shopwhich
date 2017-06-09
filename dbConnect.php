<?php  
 class dbConnect {  
        function __construct() {  
	//	echo "hello";
           
		 $cn=mysql_connect("localhost", "rushfuqn_online", "L9svGtZOKgg9") or die(mysql_error());
		 mysql_select_db("rushfuqn_onlinestores",$cn) or die("Could connect to Database");
            if(!$cn)// testing the connection  
            {  
                die ("Cannot connect to the database");  
            }   
 
        }  
        public function Close(){  
            mysql_close();  
        }  
    }  
	  
?>