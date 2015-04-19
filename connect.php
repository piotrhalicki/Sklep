<?php

$db = array(
			'serverName' 	=> "localhost",
			'userName'		=> "root",
			'pass' 			=> "pass",
			'dbName' 		=> "Shop"
			);

$conn = new mysqli($db['serverName'], $db['userName'], $db['pass'], $db['dbName']);
	if ($conn->connect_error) {
		die ("Połączenie nieudane.<br>Błąd: ".$conn->connect_error."<br>");
	} else {
		echo ("Połączenie z bazą ".$db['dbName']." udane.");
	};
	
//User::conn($conn);
//Admin::conn($conn);
//Category::conn($conn);
//Item::conn($conn);
//Order::conn($conn);
//Order_item::conn($conn);
//Picture::conn($conn);
	
?>