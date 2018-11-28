<?php
//SERVER

include 'Konekcija.php';
header("Content-type: application/json");

//provera podataka za poziv izmene sifre
if (isset($_POST['sifra']) && isset($_POST['korisnicko_ime'])) {
$sifra=$_POST['sifra'];
$korisnicko_ime= $_POST['korisnicko_ime'];
izmenaSifre($sifra,$korisnicko_ime,$konekcija);
}

//izmena sifre, funkcija
function izmenaSifre($novaSifra, $korisnicko_ime, $konekcija){

	$sql="UPDATE korisnik1 SET sifra='".$novaSifra."' WHERE BINARY korisnicko_ime='".$korisnicko_ime."'";
if (!$q=$konekcija->query($sql)){

echo '{"rezultat":"Nastala je greška pri izvršavanju upita."}';
exit();
} else{
echo'{"rezultat":"Uspesno."}';
}
}

//provera podataka za poziv brisanja naloga

if(isset($_GET["p"]) && $_GET["p"]=="del"){
	if (is_numeric($_GET['id'])) {
		$id= $_GET['id'];

		 obrisiNalog($id, $konekcija);
	}else{
		echo '{"rezultat":"Nije numeric."}';
exit();
	}
	

}

//brisanje naloga, funkcija

function obrisiNalog($korisnik_id, $konekcija){

//pravimo transakciju

$konekcija->autocommit(FALSE);

$sql="DELETE FROM reciklaza WHERE korisnik_id=".$korisnik_id."";
$sql2="DELETE FROM korisnik1 WHERE korisnik_id=".$korisnik_id."";
$konekcija->query($sql);
$konekcija->query($sql2);


//provera uspesnosti transakcije

if (!$konekcija->commit()){

	$konekcija->rollback;
	echo '{"rezultat":"Greska prilikom transakcije."}';

} else{
echo'{"rezultat":"Uspesno obrisan profil."}';
}
}
if($konekcija!=null){$konekcija->close();}
?>