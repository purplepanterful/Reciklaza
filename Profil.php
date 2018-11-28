
<!DOCTYPE html>
<html lang="en" id="htmlProfil">
<head>
	<meta charset="UTF-8">
	<title>Profil</title>
	<link rel="stylesheet" href="stilovi/stil_profil.css">
	
</head>
<body>
	<div class="omotac">
	<div class="pozdravProfil">
		<div>
			Zdravo <br>
				<?php 
				session_start();
				include 'Konekcija.php';
				if($_SESSION['niz']["ime"]==null){
					header("Location: UlogujSe.php");
					$_SESSION= array();
					session_destroy();
					$konekcija->mysqli->close();
					exit();
				}else{
				$ime= $_SESSION['niz']["ime"];
				$korisnik_id=$_SESSION['niz']["korisnik_id"];
				echo ucfirst($ime."!");
				}
			
				
				 ?>
		</div>

		<!-- <btn class="recikliraj" id="logout" style="height: 100px; width:200px; background-color: green; "></btn> -->
		<div class="logout">
			<a href="UlogujSe.php" id="logout"><img src="slike/reciklaza/logout.ico" alt=""></a>
		</div>


	</div>
	<hr>
	<form action="" id="forma-recikliraj">
		<div class="ikonice">
			<img src="slike/reciklaza/download.png" alt="">
			<img src="slike/reciklaza/download1.png" alt="">
			<img src="slike/reciklaza/download2.png" alt="">
			<img src="slike/reciklaza/download4.jpg" alt="">
			
			<div class="ukupno" id="metal">Ukupno reciklirano:<br>	</div>				 
			<div class="ukupno" id="plastika">Ukupno reciklirano:<br></div>
			<div class="ukupno" id="karton">Ukupno reciklirano:<br></div>
			<div class="ukupno" id="staklo">Ukupno reciklirano:<br></div>

			 
			 <input type="number" class="item" name="metal" placeholder="Reciklirajte metal" value="0" min="0" id="materijal1">
			<input type="number" class="item" name="plastika" placeholder="Reciklirajte plastiku" value="0" min="0" id="materijal2">
			<input type="number" class="item" name="karton" placeholder="Reciklirajte karton"  value="0" min="0" id="materijal3">
			<input type="number" class="item" name="staklo" placeholder="Reciklirajte staklo" value="0" min="0" id="materijal4">

			
		</div>
		<button id="recikBtn" class="recikliraj" type="submit" >Recikliraj</button>
	</form>
	<hr>
	<!-- Promena sifre -->
		<div id="novaSifraDiv" class="center hideform">
		   
		    <button class="close" style="float: right;">X</button>
		    
		    <form  id ="novaSifraFrm">
		    	
		    	<p>Unesite novu sifru</p> 
		    	<input  id="novaSifra" type="password" required> 
		    	<p>Ponovite novu sifru</p> 
		        <input  id="novaSifraPotvrda" type="password" required>
		        <br>
		        <input type="submit" value="Promeni sifru">
		        
		   
		    </form>
		
		</div>
	<!-- Gasenje naloga -->
		<div  id="gasenjeNalogaDiv"class="center hideform" >
		    <button class="close" style="float: right;">X</button>
		    <form  id="gasenjeNalogaFrm" onsubmit="deleteData(<?php  echo $korisnik_id  ?>)">
		       <p style="color: red;">Da li ste sigurni da zelite da ugasite nalog?</p> 
		       <input type="submit" value="Obrisi nalog">
		    </form>
		</div>


		<div id="rezultat"></div>
		<div class= "footer">
			<button id="promenaSifre">Promeni sifru</button>
			<button id="gasenjeNaloga">Ugasi nalog</button>
		</div>
	
	
</div>
		
	<script src="skripte/jquery.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="skripte/skripte.js"></script>
	
</body>
</html>