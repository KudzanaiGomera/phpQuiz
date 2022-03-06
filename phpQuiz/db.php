<?php
	$dbhost	= "localhost";
	$dbuser = "offipcoz";
	$dbpass = "+gQ8E)Vgj63oH3";
	$dbname = "offipcoz_quiz";

	$connection = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

	if(mysqli_connect_errno()){ 
		die("Database Connection Failed" . mysqli_connect_error() . "(" . mysqli_connect_errno() . ")");
	}
?>