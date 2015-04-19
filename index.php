<?php
include './header.php'; // w headerze 'connect.php'
require './klasy/user.php'; // klasa user
User::conn($conn); // metoda conn z klasy user, w parametrze połączenie
?>

<b>Hello World</b><br>
<br>


<form method='POST' action='zarejestrowany.php'>
<fieldset>
<legend><b><big>Rejestracja</big></b></legend><br>
<label><b>Imię:</b><br>
<input type='text' name='user_imie' placeholder='imię'><br>
</label>
<label><b>Nazwisko:</b><br>
<input type='text' name='user_nazwisko' placeholder='nazwisko'><br>
</label>
<label><b>E-mail:</b><br>
<input type='text' name='user_email' placeholder='email'><br>
</label>
<label><b>Hasło:</b><br>
<input type='password' name='user_pass' placeholder='hasło'><br>
</label>
<label><b>Powtórz hasło:</b><br>
<input type='password' name='user_pass2' placeholder='powtórz hasło'><br>
</label>
<label><b>Adres:</b><br>
<textarea name='user_adres' cols='32' rows='3' placeholder='adres'></textarea><br>
</label><br>
<button type='submit'>Zarejestruj się</button>
</fieldset>
</form>

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
<b>Goodbye World</b>

<?php 
include './footer.php';
?>