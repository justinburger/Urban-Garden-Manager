<?php
define('DB_USERNAME', 'ugm_prod');
define('DB_PASSWORD', 'Z68frmrPeHBWmE6d');
define('DB_HOST', 'localhost');
define('DB_PORT', null);
define('DB_DB', 'gmanager');

$dbConn = null;

class db{
	static function openConnect(){
	    global $dbConn;
		if(is_resource($dbConn)){
			return $dbConn;
			
		}else{
			$dbConn = mysql_connect(DB_HOST,DB_USERNAME,DB_PASSWORD);
			mysql_select_db(DB_DB,$dbConn);	
			return $dbConn;
		}
	}
	
	static function query($q){
	     db::openConnect();
	  $r=  mysql_query($q) or die(mysql_error());
	  
	 
	  return true;
	}
	
	static function getAllRows($q){
	     db::openConnect();
	  $r=  mysql_query($q) or die(mysql_error());
	  
	  $rtn = array();
	  
	  while($row = mysql_fetch_assoc($r)){
	      $rtn[] = $row;
	  }
	  
	  return $rtn;
	}
	
	
	static function getSingleRow($q){
	    db::openConnect();
	    
	     $r=  mysql_query($q);
	  
	  $rtn = array();
	  
	  return mysql_fetch_assoc($r);
	}
}
