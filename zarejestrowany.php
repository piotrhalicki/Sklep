<?php
include './header.php'; // w headerze 'connect.php'
require './klasy/user.php'; // klasa user
User::conn($conn); // metoda conn z klasy user, w parametrze połączenie
?>

<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	if (($_POST['user_pass']) != ($_POST['user_pass2'])) {
		echo ("Podane przez Ciebie hasła się różnią<br><a href='index.php'>Wróć na stronę główną</a>");
	} else {
		$newUser = new User;
		$newUser->createUser($_POST['user_imie'], $_POST['user_nazwisko'], $_POST['user_email'], $_POST['user_pass'], $_POST['user_adres']);
		$_SESSION['user_id'] = $newUser->get_id();
		echo ("Użytkownik ".ucfirst($_POST['user_imie'])." stworzony.");
		require 'logowanie.php';
	};
} else {
	echo ("Coś poszło nie tak<br><a href='index.php'>Wróć na stronę główną</a>");
}

?>

<?php 
include './footer.php';
?>