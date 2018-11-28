<?php
session_start();
include 'Konekcija.php';

 header('Content-Type: text/plain');
$pomocna= $_POST["test"];
 $data =json_decode(utf8_encode($pomocna));



$metal= ($data[0]->reciklirano);
$plastika= ($data[1]->reciklirano);
$karton= ($data[2]->reciklirano);
$staklo= ($data[3]->reciklirano);
$id=$_SESSION['niz']["korisnik_id"];
$sql = "INSERT INTO reciklaza (korisnik_id, metal, plastika, karton, staklo) 
VALUES ( ".$id.",".$metal.",".$plastika.",".$karton.",".$staklo.")";

 if($konekcija->query($sql) === TRUE) {
    // echo "New record created successfully";
} else {
     echo "Error: " . $sql . "<br>" . $konekcija->error;
 }

$qry1 = "SELECT SUM(metal) AS count FROM reciklaza WHERE korisnik_id=".$id."";
$res1 = $konekcija->query($qry1);
$total1 = 0;
$rec1 = $res1->fetch_assoc();
$total1 = $rec1['count'];

$qry2 = "SELECT SUM(plastika) AS count FROM reciklaza WHERE korisnik_id=".$id."";
$res2 = $konekcija->query($qry2);
$total2 = 0;
$rec2 = $res2->fetch_assoc();
$total2 = $rec2['count'];

$qry3 = "SELECT SUM(karton) AS count FROM reciklaza WHERE korisnik_id=".$id."";
$res3 = $konekcija->query($qry3);
$total3 = 0;
$rec3 = $res3->fetch_assoc();
$total3 = $rec3['count'];

$qry4 = "SELECT SUM(staklo) AS count FROM reciklaza WHERE korisnik_id=".$id."";
$res4 = $konekcija->query($qry4);
$total4 = 0;
$rec4 = $res4->fetch_assoc();
$total4 = $rec4['count'];



print $total1.",".$total2.",".$total3.",".$total4;
  
  exit();



?>