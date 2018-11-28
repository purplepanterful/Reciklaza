<?php
		include 'Konekcija.php';

		if( $_POST['ime']!="" && $_POST['prezime']!="" && $_POST['email']!="" && $_POST['korisnicko_ime']!="" && $_POST['sifra']!="" &&
			trim($_POST['ime'])!="" && trim($_POST['prezime'])!="" && trim($_POST['email'])!="" && trim($_POST['korisnicko_ime'])!="" && trim($_POST['sifra'])!=""){
		$ime = trim($_POST['ime']);
	
		$prezime=trim($_POST['prezime']);
		
		$email=trim($_POST['email']);

		$korisnicko_ime=trim($_POST['korisnicko_ime']);
	
		$sifra=trim($_POST['sifra']);
	}else{
		echo "neki parametar nije prosledjen"; exit();
	}

		$provera_kor_ime = $konekcija->prepare("SELECT * FROM korisnik1 WHERE korisnicko_ime = ?");
		$provera_kor_ime->bind_param("s",$korisnicko_ime);
		$provera_kor_ime->execute();
		$provera_kor_ime->store_result();

		if($provera_kor_ime->num_rows>0){
			$neka=$provera_kor_ime->num_rows;
			unset($_POST['korisnicko_ime']);
			unset($korisnicko_ime);
			$provera_kor_ime->close();
			echo ("Korisničko ime je zauzeto.");
		}else{
			$provera_kor_ime->close();
			$statement = $konekcija->prepare("INSERT INTO korisnik1 (ime, prezime, email, sifra, korisnicko_ime) VALUES (?, ?, ?, ?, ?)");
			$statement->bind_param("sssss", $ime, $prezime, $email, $sifra, $korisnicko_ime);
			$statement->execute();
					
				if($statement->affected_rows==1)
					{$statement->close();
					//header("Location:UlogujSe.php");
						echo ('Korisnik uspesno unet!');
					$konekcija->close();
					exit();
					}	else{
						echo ("Korisnik nije unešen u bazu");
						$statement->close();
						$konekcija->close();
					}
		}	

?>