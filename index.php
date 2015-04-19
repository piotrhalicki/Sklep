<?php
session_start();
include './header.php'; // w headerze 'connect.php'
require './klasy/user.php'; // klasa user
User::conn($conn); // metoda conn z klasy user, w parametrze połączenie
?>

<br>
<b>Hello World</b><br>
<br>

<?php

require 'rejestracja.php';
echo "<br>";
require 'logowanie.php';

?>

<?php
/*
$newUser = new User;
echo '<pre>';
var_dump($newUser);
echo '<pre>';
$newUser->createUser('piotr', 'halicki', 'piotr_halicki@wp.pl', '123', 'Bellottiego');
echo '<pre>';
var_dump($newUser);
echo '<pre>';

$newUser2 = new User;
echo '<pre>';
var_dump($newUser2);
echo '<pre>';
*/
?>

<br>
<b>Goodbye World</b><br>
<br>

<?php 
include './footer.php';
?>