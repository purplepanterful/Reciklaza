
	$('#forma-registracija').on('submit', function(e) {
  	e.preventDefault();
  
	var ime=$("#ime").val();
	var prezime= $("#prezime").val();
	var korisnicko_ime= $("#korisnicko_ime").val();
	var email= $("#email").val();
	var sifra=  $("#sifra").val();
	console.log("ime="+ime+"prezime="+prezime+"korisnicko_ime="+ korisnicko_ime +"email="+ email +"sifra="+sifra) ;
	//ovde dodati proveru valjda za korisnicko ime, imejl i pass
	var data= "ime="+ime+"&prezime="+prezime+"&korisnicko_ime="+ korisnicko_ime +"&email="+ email +"&sifra="+sifra;

	$.ajax({
		method: "post",
		url:"RegistracijaAjax.php",
		data: data,
		success: function(data){
			//$("#register_output").html(data);
			if(data === "Korisnik uspesno unet!") {
				alert("Uspešno ste se registrovali.")
			 	window.location.replace("http://localhost/treciDomaci/UlogujSe.php");
			}else if (data==="Korisničko ime je zauzeto.") {
    alert(data);
}
			
		}
	});

});
