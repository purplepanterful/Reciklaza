<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Registracija</title>
	<link rel="stylesheet" href="stilovi/stil.css">
	<!-- <link rel="stylesheet" href="skripte/jquery.js"> -->
	
	
</head>
<body> 
		<!--heder-->
		<div class="heder">
			<ul>
				<li> <a href="Pocetna.php">Početna</a></li>
				<li><a href="UlogujSe.php">Uloguj se</a></li>
				<li class="kliknuta"><a href="" >Registracija</a></li>
				<li><a href="Temperatura.php">Temperatura</a></li>
			</ul>
			
		</div>
		<p><div id="register_output" style="width: 400px; height: 100px !important; "></div></p>
		<!--registracija-->
		<div name="registracija" class="registracija">
			<h1>Unesite svoje podatke:</h1>
		<form action="" method="post" id="forma-registracija">
			<label for="">Ime</label><br>
			<input type="text"size=30 name="ime" id='ime' required><br>
			<label for="">Prezime</label><br>
			<input type="text"size=30 name="prezime" id='prezime' required><br>
			<label for="">Korisničko ime</label><br>
			<input type="text"size=30 name="korisnicko_ime" id='korisnicko_ime' required><br>
			<label for="">Mejl</label><br>
			<input type="email"size=30 name="email" id='email' required><br>
			<label for="">Šifra</label><br>
			<input type="password"size=30 name="sifra"id='sifra' required><br>
			<button type="submit" id="register">Potvrdi</button>
			</form>
			
			
		</div>
		
		<script src="skripte/jquery.js"></script>
		
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="skripte/skripte.js"></script>
		<script src="skripte/registracija.js"></script>
		
</body>
</html>