var metal, karton, plastika, staklo;

var podaci = {}

$('#forma-recikliraj').on('submit', function(e) {
  e.preventDefault();
  Recikliraj();
  $('.item').val(0);
});
function Recikliraj(){
 
    var nizJSON= [];
    var niz = $("input.item");

    for(i=0; i<niz.length;i++){
           var reciklirano = niz[i].value; 
           var materijal=niz[i].name;

           var Objekat={
            "materijal": materijal,
            "reciklirano": reciklirano
           }
           nizJSON.push(Objekat);
}
var nizStringJson= JSON.stringify(nizJSON);

 $.ajax({
    url: "Reciklaza.php",
    data: "text",
    type: "POST",
    data: { test: JSON.stringify( nizJSON ) }, 
    success: function( data, status, xhr ) {
    var niz = data.split(",");
 
    metal = niz[0];
    plastika = niz[1];
    karton = niz[2];
    staklo = niz[3];

    $('#metal').text('Ukupno reciklirano: '+niz[0]);
    $('#plastika').text('Ukupno reciklirano: '+niz[1]);
    $('#karton').text('Ukupno reciklirano: '+niz[2]);
    $('#staklo').text('Ukupno reciklirano: '+niz[3]);

    Izracunaj();
  },
  error: function( xhr, status, error ) {
      
  }
        });


};
//Poziv servera ajax
function Izracunaj() {
  $.get("Server.php", { "metal": metal, "karton": karton , "plastika" : plastika,"staklo": staklo},
   function(data){
     $("#rezultat").html(JSON.stringify(data));
   });
};
$('#logout').on('click', function(e) {
    var data="status=izlogovan";
    $.ajax({
    url: "Logout.php",
    type: "POST",
    data: data,
    success:function(data){
        alert(data);
        window.location.replace("http://localhost/treciDomaci/UlogujSe.php");

      }
       

  });
});
$('#promenaSifre').on('click', function () {
    $('#novaSifraDiv').show();
    $("#gasenjeNaloga").attr("disabled", true);
    $("#recikBtn").attr("disabled", true);
     $("#recikBtn").css({'pointer-events': 'none'});
    //$(this).hide();
});
$('#gasenjeNaloga').on('click', function () {
    $('#gasenjeNalogaDiv').show();
     $("#promenaSifre").attr("disabled", true);
     $("#recikBtn").attr("disabled", true);
     $("#recikBtn").css({'pointer-events': 'none'});
     

    
     
    //$(this).hide();
});


//gasenje naloga
function deleteData(str){
  event.preventDefault();
  var id = str;

  $.ajax({
      url: "PromenaSifre.php?p=del",
      type: "GET",
      data: "id="+id, 
      success:function(data){
        alert(JSON.stringify(data));   
      var data="status=izlogovan";
      $.ajax({
      url: "Logout.php",
      type: "POST",
      data: data,
      success:function(data){
        window.location.replace("http://localhost/treciDomaci/Pocetna.php");
}
       

      });

      }
      

  });
}


//nova sifra
$('#novaSifraFrm').on('submit', function(e){
  e.preventDefault();
  if ($('#novaSifra').val()!=""&& $('#novaSifra').val()!=null && $('#novaSifra').val()!=undefined && $('#novaSifra').val() == $('#novaSifraPotvrda').val()) { 
     
    var data= "novaSifra="+$('#novaSifra').val();
    $.ajax({
      url: "PromenaSifreAjax.php",
      type: "POST",
      data: data,
      success: function(data){alert(data);}

  });
  }else{
    switch($('#novaSifra').val()){
      case "":alert("Sifre su prazan string.");
        break;
      case undefined:
      alert("Sifre su undefined.");
        break;
      case null: alert("Sifre su null.");
        break;
      default:
    }
    if ($('#novaSifra').val()!=$('#novaSifraPotvrda').val()) {
       $('#novaSifra').val()=="";
       $('#novaSifraPotvrda').val()=="";
       alert("Sifre se ne podudaraju");

    }

  }
});

$('.close').on('click', function () {
    $('.center').hide();
     $("#gasenjeNaloga").attr("disabled", false);
      $("#promenaSifre").attr("disabled", false);
      $("#recikBtn").attr("disabled", false);
      $("#recikBtn").css({'pointer-events': 'auto'});
    $('#show').show();
});



function OdabraniGrad(grad) {
  $.get("Temperatura.php", { "grad": grad},
   function(data){
     $("#rezultat").html(data);
   });
};



 