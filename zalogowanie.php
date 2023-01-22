<?php
	ob_start();
	$link = @mysqli_connect("localhost", "root", "", "suplement");

	if(!$link)
		echo "Błąd w połączeniu";
	else{
		$login = $_POST["login1"];
		$haselko = $_POST["haslo1"];
    
		$query = "SELECT * FROM `uzytkownicy` WHERE `haslo` = '$haselko', `login` = '$login', `autoryzacja` = 1, `usuniete` = 0)";

		$result=mysqli_query($link, $query)
		$wynik= mysqli_fetch_row($result);
		if($wynik["haslo"] == $haselko)
  			echo "<br>Ten login chyba dobry<br><br>";
  			header("location:stronauzytkownika.php");
		else
  			echo "blad: ".mysqli_error($link);
			header("location:logowanie.php");
	}
?>
