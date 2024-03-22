/* 
connexion.js
ce fichier sert a faire les validations javascript du formulaire de connexion
*/

let buttonLog = document.getElementById("login");

let inputEmail = document.getElementById("email");
let errEmail = document.getElementById("errEmail");
let estBon = true;

let inputPassword = document.getElementById("password");
let errPassword = document.getElementById("errPass");

inputEmail.addEventListener("keyup", function(){
    if(inputEmail.value == ""){
        errEmail.textContent = "Erreur: Veuillez entrez un email";
        estBon = false;
    }
    else{
        errEmail.textContent = "";
    }
});

inputPassword.addEventListener("keyup", function(){
    if(inputPassword.value == ""){
        errPassword.textContent = "Erreur: Veuillez entrer un mot de passe";
    }
    else{
        errPassword.textContent = "";
    }
});