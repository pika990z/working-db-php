<?php
	$db = "mysql"; //hostname or IP of your database
	$username = "root"; //db user you will be using, can keep as root
	$password = "Password123!"; //password you will use, if using docker-compose can be configured for root
	$dbname = "test"; //database to connect to
	$con = new mysqli($db, $username, $password, $dbname); //we using mysql - this will create a connection called $con
	if ($con->connect_error){
		die('Error: ' . $con->connect_error); //standard error stuff
	}
?>
