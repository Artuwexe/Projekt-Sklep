<?php
	ob_start();
	$link = @mysqli_connect("localhost", "root", "", "suplement");

	if(!$link)
		echo "Błąd w połączeniu";
	else{
		$login = $_POST["login"];
		$haselko = $_POST["haslo"];
    
		$query = "INSERT INTO `uzytkownicy` (`login`, `haslo`, `autoryzacja`, `prosba_o_usuniecie`, `usuniete`) VALUES ('$login', '$haselko', '0', '0', '0')";
		if(mysqli_query($link, $query))
  			echo "<br>Dane zadania: zostały dodane<br><br>";
		else
  			echo "blad: ".mysqli_error($link);

		header("location:logowanie.php");
	}
?>
