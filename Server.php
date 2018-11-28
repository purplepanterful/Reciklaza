<?php
//SERVER
header("Content-type: application/json");
if (isset ($_GET['metal'])&&isset($_GET['karton'])&&isset($_GET['plastika'])&&isset($_GET['staklo'])){
	
	
if (is_numeric($_GET['metal'])&&is_numeric($_GET['karton'])
	&&is_numeric($_GET['plastika'])&&is_numeric($_GET['staklo']))
{

$ukupnoUstedjeno=$_GET['metal']*0.4+$_GET['karton']*3+$_GET['plastika']*3.5+$_GET['staklo']*0.7;
$myObj= new stdClass();
$myObj->usteda= $ukupnoUstedjeno;
$myObj->jedinicaMere="kWh";
$myObj->poruka= "Hvala sto reciklirate";
$myJSON = json_encode($myObj);
echo ($myJSON);
//"Do sada ste ukupno ustedeli ".$ukupnoUstedjeno."kWh energije! Hvala sto reciklirate! :)");
} else {
echo '{"greska":"Parametri nisu brojevi!"}';
}
} else {
echo '{"greska":"Parametri nisu prosledjeni!"}';
}
?>