
// pour creer un slide show 
var i =0;
var images = [];
var time=3000;

images[0]="image/slid1.jpg";
images[1]="image/slide2.jpg";
images[2]="image/slid3.jpg";

function changeimage(){
    document.slide.src= images[i];

    if(i<images.length-1){
        i++;
    }else{
        i=0;
    }

    setTimeout("changeimage()",time);
    
}
window.onload=changeimage;

var validerForm = function(){
    var Nom = document.querySelector("#Nom");
    if(Nom.value ==""){
      alert("le nom est obligatoire");
      
    }

  var i =0;
  while( i <Nom.value.length){
      if(isNaN(Nom.value.charAt(i))==false){
          alert("il faut entrer une chaine de caractere dans le nom");
          break;

      }
      i++;


  }
  // controler le prénom
  var Prenom = document.querySelector("#Prénom");
  var j=0;
  if(Prenom.value ==""){
      alert("le Prénom est obligatoire");
      
  }
  while( j <Prenom.value.length){
      if(isNaN(Prenom.value.charAt(j))==false){
          alert("il faut entrer une chaine de caractere dans le prénom");
          break;

      }
      j++;

  }
   // controler l'adress email
   var Email = document.querySelector('#Email').value
   // var re c est un recherche pour le tester de l'email
   var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
   if (re.test(Email)==false) {
       alert('Adresse e-mail non valide');
   }
   // controlleur de mot de passe 
   var password = document.querySelector('#password').value
   var password_confirm = document.querySelector('#password_confirm').value

   if(password==" " ||  password != password_confirm ){
       alert("Mot de passe est incorecte ou non identique!")
   }
}

var validerfinaliser =function(){

    var Nom = document.querySelector("#Nom");
    if(Nom.value ==""){
      alert("le nom est obligatoire");
      
    }
  var i =0;
  while( i <Nom.value.length){
      if(isNaN(Nom.value.charAt(i))==false){
          alert("il faut entrer une chaine de caractere dans le nom");
          break;

      }
      i++;

  }
      // controler le prénom
  var Prenom = document.querySelector("#Prénom");
  var j=0;
  if(Prenom.value ==""){
      alert("le Prénom est obligatoire");
      
  }
  while( j <Prenom.value.length){
      if(isNaN(Prenom.value.charAt(j))==false){
          alert("il faut entrer une chaine de caractere dans le prénom");
          break;

      }
      j++;

  }

//controler Telephone 
 var tele=document.querySelector("#Téléphone");
 var z=0;
 while( z <tele.value.length){
     
     if(isNaN(tele.value.charAt(z))==true){
         alert("il faut entrer un numero de téléphone ");
         break;

     }
     z++;
 }
 if(tele.value.length<10){
     alert("le numero de téléphone est insufisant");
 }
 if(tele.value==""){
     alert("le numero de téléphone est obligatoire");
 }
 // controller l'adress
 var Adresse = document.querySelector("#Adress");

 if(Adresse.value ==""){
     alert("l'Adresse est obligatoire");
 }
}


