<?php 
//Klijent
session_start();
	include 'Konekcija.php';
	
if(isset($_POST['novaSifra'])){
	$korisnicko_ime=$_SESSION['niz']["korisnicko_ime"];
	$sifra=$_POST['novaSifra'];
	
	//Pravljenje klijenta, koristimo CURL biblioteku

	$url ="http://localhost/treciDomaci/PromenaSifre.php";
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, $url);
	curl_setopt($curl, CURLOPT_POST, false);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, false);
	$fields = array("sifra" => $sifra, "korisnicko_ime" => $korisnicko_ime);
	curl_setopt($curl, CURLOPT_POSTFIELDS, $fields);
	$odgovor=json_decode(curl_exec($curl));
	
}

?>
