<!DOCTYPE html>

<html lang="pl-PL">
<meta charset="UTF-8">

<head>
	<meta charset="UTF-8">
	<meta name="shOp" content="ćwiczenia">	
	<title>&lt; sh([])p &gt;</title>
</head>
<body>

<?php
session_start();
if(!isset($_SESSION['licznik'])) {
	$_SESSION['licznik'] = 1;
} else {
	$_SESSION['licznik']++;
};

require 'connect.php';
?>

<hr>