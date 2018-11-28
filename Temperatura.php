<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
  <link rel="stylesheet" href="stilovi/stil.css">
	<script src="skripte/jquery.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript"></script>
	<title>Temperatura</title>
</head>
<body>
  <div class="heder">
      <ul>
        <li > <a href="Pocetna.php">Početna</a></li>
        <li><a href="UlogujSe.php">Uloguj se</a></li>
        <li><a href="Registracija.php" >Registracija</a></li>
        <li class="kliknuta"><a href="Temperatura.php">Temperatura</a></li>
      </ul>
      
    </div>
    <div class="registracija">
  <h1>Globalno zagrevanje</h1>
  <p class="temper">
     Globalno zagrevanje je naziv za povećanje 
     prosečne temperature zemljine atmosfere i okeana naročito u 20. veku, kao i za prateće klimatske efekte. Od početka 20. 
     veka, srednja temperatura Zemljine površine se povećala za oko 0,8 °C, pri čemu je do oko dve trećine povećanja došlo u poslednje tri dekade. Zagrevanje klimatskog sistema je nedvosmisleno, i naučnici su više od 90% sigurni da je ono prvenstveno uzrokovano povećanjem koncentracija gasova staklene bašte, 
     nastalih ljudskim aktivnostima kao što su sagorevanje fosilnih goriva i krčenje šuma. Neki od efekata globalnog zagrevanja, osim povećanja temperature su: rast nivoa mora,
     promene u padavinama i širenje pustinja, povećanje kiselosti okeana (acidifikacija); ekstremniji meteorološki fenomeni, kao što su suše, toplotni valovi; kao i uticaj na ekosisteme, nestanak pojedinih vrsta zbog temperaturnih promena i dr. 
  </p>
  <form action="#" method="post">
  <select name="Grad" >
    <option value="Belgrade">Beograd</option>
    <option value="Moscow">Moskva</option>
    <option value="Paris">Pariz</option>
    <option value="London">London</option>
    <option value="Berlin">Berlin</option>
  </select>
<input type="submit" name="submit" id="grad" value="Prikaži prognozu" />
</form>

<div id="temperatura"></div>


<?php
    $selected_val="Belgrade";
    if(isset($_POST['Grad'])){
      $selected_val = $_POST['Grad']; 
    }
    $url= 'http://api.openweathermap.org/data/2.5/weather?q='.$selected_val.'&units=metric&appid=75c5b500635292b5729c3a3882784d81';
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_POST, false);
    $curl_odgovor = curl_exec($curl);
    curl_close($curl);
    $parsiran_json = json_decode ($curl_odgovor);
    $temperatura = $parsiran_json->main->temp;
    $vlaznost= $parsiran_json->main->humidity;
    
    switch ($selected_val) {
    case "Moscow":
         echo("Trenutna temperatura u Moskvi je ".$temperatura." *C a vlažnost vazduha ".$vlaznost."%.");
        break;
    case "Berlin":
         echo("Trenutna temperatura u ".$selected_val."u je ".$temperatura." *C a vlažnost vazduha ".$vlaznost."%.");
        break;
    case "Paris":
        echo("Trenutna temperatura u Parizu je ".$temperatura." *C a vlažnost vazduha ".$vlaznost."%.");
        break;
    case "London":
        echo("Trenutna temperatura u ".$selected_val."u je ".$temperatura." *C a vlažnost vazduha ".$vlaznost."%.");
        break;
  
    default:
         echo("Trenutna temperatura u Beogradu je ".$temperatura." *C a vlažnost vazduha ".$vlaznost."%.");
}
   
  ?>
 

</div>

</body>
</html>