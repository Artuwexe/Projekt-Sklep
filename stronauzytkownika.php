<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>sklep z suplementami</title>
	<link rel="stylesheet" href="sklep.css">
</head>
<body>
	<div class="menu">
	<div><h5>Sklep z Suplementami diety(user edyszyn)</h5></div>
</div>
<?php
session_start();
	$link1 = @mysqli_connect("localhost", "root", "", "suplement");

	if(!$link1)
		echo "Błąd w połączeniu";
	else{
		$query1 = "SELECT * FROM `uzytkownicy`";
		if($result1 = mysqli_query($link1, $query1)){
			$wynik1 = mysqli_fetch_row($result1)
echo"<form action='zmianahasla.php' method='POST'>
<input type='hidden' name='id'  value='$wynik1[0]'/>
	<input type='text' name='password'  value='nowehaslo'/>
      <input type='submit' name='change'  value='zmień hasło'/>
    </form>
    <form action='usunkonto.php' method='POST'>
    <input type='hidden' name='id'  value='$wynik1[0]'/>
    <input type='submit' name='delete'  value='usuń konto'/>
</form>"
}
?>
<main>
	<?php
	session_start();
	$link = @mysqli_connect("localhost", "root", "", "suplement");

	if(!$link)
		echo "Błąd w połączeniu";
	else{
		echo  "<form method='POST' action=''>
		<select name='filtr'>
		<option value='brak'>bez filtru</option>
		<option value='min'>od najmniejszej ceny</option>
		<option value='max'>od największej ceny</option>
		<option value='blk'>tylko białko</option>
		<option value='supl'>tylko suplementy</option>
		<option value='bat'>tylko batony</option>
		<option value='tlscz'>tylko spalacze tłuszczu</option>
		</select>
		<input type ='submit'> 
		</form>";
		switch($_POST["filtr"]){ //sortowanie
			case 'brak':
				$query = "SELECT * FROM `dane`";
				break;
			case 'min':
				$query = "SELECT * FROM `dane` ORDER BY 'cena' ASC";
				break;
			case 'max':
				$query = "SELECT * FROM `dane` ORDER BY 'cena' DESC";
				break;
			case 'blk':
				$query = "SELECT * FROM `dane` WHERE 'TypProduktu' = 'bialko'";
				break;
			case 'supl':
				$query = "SELECT * FROM `dane`  WHERE 'TypProduktu' = 'suplementy'";
				break;
			case 'bat':
				$query = "SELECT * FROM `dane`  WHERE 'TypProduktu' = 'baton'";
				break;
			case 'tlscz':
				$query = "SELECT * FROM `dane`  WHERE 'TypProduktu' = 'reduktor'";
				break;
			default:
				$query = "SELECT * FROM `dane`";
		}
		
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
						nazwa<input style='border: none' type=text value='$wynik[1]' readonly name='nazwa' required><br>
						opis<input style='border: none' type=text value='$wynik[2]' readonly name='opis' required><br>
						cena<input style='border: none' type=number value='$wynik[3]' readonly name='cena' required><br>
						typ<input style='border: none' type=text value='$wynik[4]' readonly name='typ' required><br>
						procent marży<input style='border: none' type=number value='$wynik[5]' readonly name='marza' required><br>
						w magazynie:<input style='border: none' type=number value='$wynik[6]' readonly name='ilosc' required><br>
						data ważnosci<input style='border: none' type=date value='$wynik[7]' readonly name='data' required>	<br>
						faktyczna cena<input style='border: none' type=number value='$marza' required readonly>	<br>
						<input type ='submit' class='progres' value='dodaj do koszyka'>				
						</form>
						</div>
				";
			}
			echo "<br>";
		}
		else
  			echo "Error: ".mysqli_error($link);
	}
?>
<br>
	</main>
	</body>
	</html>