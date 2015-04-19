<?php

$newUser = new User;
$newUser->showUser($_SESSION['user_id']);

?>

<fieldset>
<legend><strong><big>Twój profil</big></strong></legend>
<b>Imię: <?php echo $newUser->get_imie(); ?> </b><br>
<b>Nazwisko: <?php echo $newUser->get_nazwisko(); ?> </b><br>
<b>Email: <?php echo $newUser->get_email(); ?> </b><br>
<b>Adres: <?php echo $newUser->get_adres(); ?> </b><br>
</fieldset>
<br>
<fieldset>
<button type='submit'>Modyfikuj konto</button><br>
<button type='submit'>Usuń konto</button><br>
</fieldset>