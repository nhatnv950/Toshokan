<?php
	error_reporting(0);
	ob_start();
	session_start(); 
	$conn= mysqli_connect('localhost','root','','library2018') or 
        die(mysqli_connect_error());
        
	if($conn==null)
	{
		echo "mysqlにつながってない";
		exit; 
	}
	mysqli_set_charset($conn, 'utf8');
	
?>