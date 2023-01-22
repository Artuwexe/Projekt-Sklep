<?php
	ob_start();
	$link = @mysqli_connect("localhost", "root", "", "suplement");

	if(!$link)
		echo "Błąd w połączeniu";
	else{
		$nazwa = $_POST["nazwa"];
		$opis = $_POST["opis"];
		$cena = $_POST["cena"];
		$typ = $_POST["typ"];
		$ilosc = $_POST["ilosc"];
		$data = $_POST["data"];
		$marza = $_POST["marza"];
    
		$query = "INSERT INTO `dane` (`nazwa`, `opis`, `cena`, `TypProduktu`, `procent_marzy`, `ilosc`, `waznosc`) VALUES ('$nazwa', '$opis', '$cena', '$typ', '$marza', '$ilosc', '$data')";
		if(mysqli_query($link, $query))
  			echo "<br>Dane zadania: zostały dodane<br><br>";
		else
  			echo "blad: ".mysqli_error($link);

		header("location:stronaadmina.php");
	}
?>
