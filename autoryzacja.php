<?php
	ob_start();
	$link = @mysqli_connect("localhost", "root", "", "suplement");

	if(!$link)
		echo "Błąd w połączeniu";
	else{
		$id = $_POST["id"];
    
		$query = "UPDATE `uzytkownicy` SET autoryzacja = 1 WHERE 'id' =$id";
		if(mysqli_query($link, $query))
  			echo "<br>Dane zadania: zostały dodane<br><br>";
		else
  			echo "blad: ".mysqli_error($link);

		header("location:stronaadmina.php");
	}
?>
