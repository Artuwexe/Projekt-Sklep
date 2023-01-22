<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>sklep z suplementami</title>
	<link rel="stylesheet" href="sklep.css">
</head>
<body>
	<div class="menu">
	<div><h5>Sklep z Suplementami diety(admin edyszyn)</h5></div>
</div>
<main>
	<?php
	$link = @mysqli_connect("localhost", "root", "", "suplement");

	if(!$link)
		echo "Błąd w połączeniu";
	else{
		$query = "SELECT * FROM `dane`";
		if($result = mysqli_query($link, $query)){
			while($wynik = mysqli_fetch_row($result)){
				$marza = $wynik[3] + $wynik[3]*$wynik[5]*0.01; 
				/*dodaj kejsy*/switch($wynik[4]){
						case 'suplementy':
							echo "<img src='bialko.jpg' alt='suplement'>";
							break;
						case 'bialko':
							echo "<img src='whey.jpg' alt='suplement'>";
							break;
						case 'baton':
							echo "<img src='baton.jpg' alt='suplement'>";
							break;
						case 'reduktor':
							echo "<img src='reduktor.jpg' alt='suplement'>";
							break;
						default:
							echo "zły typ produktu";
					}
				echo "
					<div class='siata'>
					
						<form method='POST' action='zmien.php'>		
						<input type=hidden value='$wynik[0]' readonly name='id' required>
						nazwa<input style='border: none' type=text value='$wynik[1]' name='nazwa' required><br>
						opis<input style='border: none' type=text value='$wynik[2]' name='opis' required><br>
						cena<input style='border: none' type=number value='$wynik[3]' name='cena' required><br>
						typ<input style='border: none' type=text value='$wynik[4]' name='typ' required><br>
						procent marży<input style='border: none' type=number value='$wynik[5]' name='marza' required><br>
						w magazynie:<input style='border: none' type=number value='$wynik[6]' name='ilosc' required><br>
						data ważnosci<input style='border: none' type=date value='$wynik[7]' name='data' required>	<br>
						faktyczna cena<input style='border: none' type=number value='$marza' required readonly>	<br>
						<input type ='submit' class='progres' value='zmien'>				
						</form>
						<form method='POST' action='usun.php'>
						<td><input type ='submit' class='usun' value='usun'></td>
						<input type=hidden value='$wynik[1]' readonly name='nazwa' required>
						<input type=hidden value='$wynik[2]' readonly name='opis' required>
						<input type=hidden value='$wynik[3]' readonly name='cena' required>
						</form>
						</div>
				";
			}
			echo "<br>";
		}
		else
  			echo "Error: ".mysqli_error($link);
	}
echo"Te konta oczekują na autoryzacje";
$query2 = "SELECT * FROM `uzytkownicy` WHERE 'autoryzacja' = 0";
if($result2 = mysqli_query($link, $query2)){
			while($wynik2 = mysqli_fetch_row($result2)){
				echo "<form method='POST' action='autoryzacja.php'>
				<input type=hidden value='$wynik2[0]' readonly name='id' required>
						Login<input style='border: none' type=text value='$wynik2[1]' name='Login' required><br>
						><input type ='submit' class='usun' value='zatwierdz'>
						</form>
						";//po kliknięciu autoryzuje

}
echo"Te konta oczekują na usunięcie";
$query3 = "SELECT * FROM `uzytkownicy` WHERE `prosba_o_usuniecie` = 1";
if($result3 = mysqli_query($link, $query3)){
			while($wynik3 = mysqli_fetch_row($result3)){
				echo "<form method='POST' action='usuwaniekonta.php'>
				<input type=hidden value='$wynik3[0]' readonly name='id' required>
						Login<input style='border: none' type=text value='$wynik2[1]' name='Login' required><br>
						><input type ='submit' class='usun' value='zatwierdz'>
						</form>
						";//po kliknięciu autoryzuje

}
?>
<br>
<br>
<form method="POST" action="dodaj.php">
		<legend>dodaj nowy element</legend>
		<label>Nazwa produktu</label><input type="text" name="nazwa" required="" maxlength="30"><br>
		<label>cena</label><input type="number" name="cena" required=""><br>
		<label>opis</label><input type="text" name="opis" required=""><br>
		<label>Rodzaj produktu</label><input type="radio" name="typ" value="suplementy" required="">Suplement<input type="radio" name="typ" value="bialko" required="">białko<input type="radio" name="typ" value="baton" required="">baton<input type="radio" name="typ" value="reduktor" required="">spalacz tłusczu<br>
        <label>data ważności(przy suplementach)</label><input type="date" name="data"><br>
        <label>Ile sztuk</label><input type="number" name="ilosc" required="podaj sztuki"><br>
        <label>marża</label><input type="number" name="marza" required="podaj marze">%<br>
		<input type="submit" id="dod" value="dodaj">
		<input type="reset" id="usun" value="usuń">
		<br>
</form>
<br>
	</main>
	</body>
	</html>