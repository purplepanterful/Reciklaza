<?php
 $konekcija= new mysqli("localhost", "root", "", "reciklazadb");
					
//provera konekcije
if ($konekcija->connect_errno) {
    printf("Neuspela konekcija: %s\n", $konekcija->connect_error);
    header("Location:UlogujSe.php");
    exit();
}
$konekcija->set_charset("utf8");
?>