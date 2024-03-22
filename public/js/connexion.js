/* 
connexion.js
ce fichier sert a faire les validations javascript du formulaire de connexion
*/

let inputEmail = document.getElementById("email");
let errEmail = document.getElementById("errEmail");
let estBon = true;

inputEmail.addEventListener("keyup", function(){
    if(inputEmail.value == ""){
        errEmail.textContent = "Erreur: Veuillez entrez un email";
        estBon = false;
    }
    else{
        errEmail.textContent = "";
    }
});