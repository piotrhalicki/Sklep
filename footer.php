<hr>

<a href='index.php'>Strona główna</a><br>

<?php 

echo ("<strong><em>Ilość wyświetleń strony: </em></strong>").$_SESSION['licznik']; 

echo "<pre>";
echo var_dump($_SESSION);
echo "<pre>";

?>

</body>
</html>