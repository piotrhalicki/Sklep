<?php
include './header.php'; // w headerze 'connect.php'
require './klasy/user.php'; // klasa user
User::conn($conn); // metoda conn z klasy user, w parametrze połączenie
?>

<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$newUser = new User;
	if ($newUser->logUser($_POST['users_email'], $_POST['users_pass']) === true) {
		$_SESSION['user_id'] = $newUser->get_id();
		echo ("<h1>Witaj</h1><br>");
		require 'profil.php';
	} else {
		echo ("<strong>Zły login lub hasło</strong><br>");
	}
}

?>

<?php 
include './footer.php';
?>