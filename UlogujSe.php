<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Uloguj se</title>
	<link rel="stylesheet" href="stilovi/stil.css">
</head>
<body>
	<div class="heder">
			<ul>
				<li> <a href="Pocetna.php">Početna</a></li>
				<li class="kliknuta"><a href="">Uloguj se</a></li>
				<li><a href="Registracija.php" >Registracija</a></li>
				<li><a href="Temperatura.php">Temperatura</a></li>
			</ul>
			
		</div>
		<div name="registracija" class="registracija">
			<h1>Ulogujte se</h1>
		<form action="" method="post">
			
			<label for="">Korisničko ime</label><br>
			<input type="text"size=30 name='korisnicko_ime' id='korisnicko_ime'required><br>
			<label for="">Šifra</label><br>
			<input type="password"size=30 name='sifra'id='sifra' required><br>
			<button type="submit" name='submit' id='submit'>Potvrdi</button>
			
			</form>
			<?php
				include 'Konekcija.php';
				
				
				

				
				if (isset($_POST['sifra']) && isset($_POST['korisnicko_ime']) && trim($_POST['sifra'])!="" && trim($_POST['korisnicko_ime'])!="" && isset($_POST['submit'])) {
						session_start();
						$korisnicko_ime=trim($_POST['korisnicko_ime']);
						$sifra=trim($_POST['sifra']);
						
					
					$statement = mysqli_prepare($konekcija, "SELECT * FROM korisnik1 WHERE BINARY korisnicko_ime = ? AND BINARY sifra = ? ");
					mysqli_stmt_bind_param($statement, "ss", $korisnicko_ime, $sifra);
					mysqli_stmt_execute($statement);
					mysqli_stmt_store_result($statement);
					if(mysqli_stmt_num_rows($statement)==1){
					
					mysqli_stmt_store_result($statement);
					mysqli_stmt_bind_result($statement, $korisnik_id, $ime, $prezime, $email, $sifra, $korisnicko_ime);
					 $response = array();
					$response["success"] = false;  
					
					while(mysqli_stmt_fetch($statement)){
						$response["success"] = true;  
						$response["korisnik_id"] = $korisnik_id;  
						$response["ime"] = $ime;
						$response["prezime"] = $prezime;
						$response["email"]=$email;
						$response["sifra"] = $sifra;
						$response["korisnicko_ime"] = $korisnicko_ime;
						
						
					}
					$_SESSION['niz'] = $response;
					header("Location:Profil.php");
					$konekcija->mysqli->close();
				}else{
					 	unset($_POST['submit']);
					 	unset($_POST['korisnicko_ime']);
					 	unset($_POST['sifra']);
					 	
						die("Morate uneti pravo korisnicko ime i lozinku da biste se ulogovali.");
					}

					
			
			
			    }
			   
			  ?>
			

			
		</div>
		<script src="skripte/jquery.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	
</body>
</html>