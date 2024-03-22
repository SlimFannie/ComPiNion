let inputPseudo = document.getElementById("pseudo");
let inputNom = document.getElementById("nom");
let inputPrenom = document.getElementById("prenom");
let inputEmail = document.getElementById("email");
let inputPassword = document.getElementById("password");

let errPseudo = document.getElementById("errPseudo");
let errNom = document.getElementById("errNom");
let errPrenom = document.getElementById("errPrenom");
let errEmail = document.getElementById("errEmail");
let errPassword = document.getElementById("errPassword");

inputPassword.addEventListener("keyup", function(){
    if(inputPassword.value == ""){
        errPassword.textContent = "Erreur: Veuillez entrer un mot de passe";
    }
    else{
        errPassword.textContent = "";
    }
});

inputPseudo.addEventListener("keyup", function(){
    if(inputPseudo.value == ""){
        errPseudo.textContent = "Erreur: Veuillez entrer un pseudo";
    }
    else{
        errPseudo.textContent = "";
    }
});

inputNom.addEventListener("keyup", function(){
    if(inputNom.value == ""){
        errNom.textContent = "Erreur: Veuillez entrer un nom";
    }
    else{
        errNom.textContent = "";
    }
});

inputPrenom.addEventListener("keyup", function(){
    if(inputPrenom.value == ""){
        errPrenom.textContent = "Erreur: Veuillez entrer un prenom";
    }
    else{
        errPrenom.textContent = "";
    }
});

inputEmail.addEventListener("keyup", function(){
    if(inputEmail.value == ""){
        errEmail.textContent = "Erreur: Veuillez entrer un email";
    }
    else{
        errEmail.textContent = "";
    }
});