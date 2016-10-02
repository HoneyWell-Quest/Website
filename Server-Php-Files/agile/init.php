<?php
	$username = "u954389869_agile";
	$host = "mysql.hostinger.in";
	$password = "REHAN123@";
	$databaseName = "u954389869_agile";
	
	$connection = mysqli_connect($host,$username,$password,$databaseName);
	if(!$connection){
		echo "Connection Error".mysqli_connect_error;
	}
	else{
		echo "Connection Successfull";
	}
?>