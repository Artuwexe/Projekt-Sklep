<?php
		$link = @mysqli_connect("localhost", "root", "", "suplement");

		if(!$link)
			echo "Błąd w połączeniu";
		else{
			$nazwa = $_POST["nazwa"];
			$cena = $_POST["cena"];
			$opis = $_POST["opis"];
			$id = $_POST["id"];
			$ilosc = $_POST["ilosc"];
			$data = $_POST["data"];
			$marza = $_POST["marza"];
			$typ = $_POST["typ"];
    }
   		$query = "UPDATE `dane` SET `nazwa` = '$nazwa', `cena` = '$cena', `opis` = '$opis', `ilosc` = '$ilosc', `waznosc` = '$data',  `procent_marzy` = '$marza',  `TypProduktu` = '$typ'  WHERE `id` = $id";
		if(mysqli_query($link, $query)){
			echo "Udało się<br>Dane zostały zmienione<br><br>";
			header("location:stronaadmina.php");
		}
  		else{
  				echo "Błąd: ".mysqli_error($link);
  		}
	
?>