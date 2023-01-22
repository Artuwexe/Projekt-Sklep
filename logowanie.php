<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>sklep z suplementami</title>
	<link rel="stylesheet" href="sklep.css">
</head>
<body>
	<?php  
	$male_litery=substr(str_shuffle(str_repeat("abcdefghijklmnopqrstuvwxyz",7)),0,7);
	$duze_litery=substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ"),0,1);
	$znaki_specjalne=substr(str_shuffle("!@#$%^&*(){}[]-+=|:;<>?,."),0,1);
	$haslo=str_shuffle($male_litery.$duze_litery.$znaki_specjalne);
	 echo "<form method ='POST' action='tworzenieUsera.php'>
    <legend>Stwórz konto</legend>
		<label>Nazwa użytkownika</label><input type='text' name='login' required='' maxlength='30'><br>
		<label>hasło(lepiej je zapisz)</label><input type='text' name='haslo' required='' value=$haslo><br>
        <input type='submit' value='utwórz'>
    </form>
     <form method ='POST' action='Logowanie.php'>
    <legend>Logowanie</legend>
		<label>Nazwa użytkownika</label><input type='text' name='login1' required='' maxlength='30'><br>
		<label>hasło</label><input type='password' name='haslo2' required=''><br>
        <input type='submit' value='loguj'>
    </form>
    <form method ='POST' action=''>
    <legend>Zmień konto</legend>
		<label>Nazwa użytkownika</label><input type='text' name='login2' required='' maxlength='30'><br>
		<label>hasło</label><input type='password' name='haslo2' required=''><br>
        <input type='submit' value='zmień'>
    </form>";
    ?><!--zmiane użytkownika w innym oknie zrobić -->
    </body>