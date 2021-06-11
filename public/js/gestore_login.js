function checkMaiuscolo(stringa){
    for(let i=0; i<stringa.length; i++){
        if(stringa.charCodeAt(i)>= 65 && stringa.charCodeAt(i) <= 90)
            {
                return true;
            }
    }
    return false;
}
function check(event){
    //Controllo l'inserimento di username e password
    if(form_login.utente.value.length==0||form_login.password.value.length==0){
        event.preventDefault();
        alert("E' necessario riempire i campi!");
        return;
    }
    //Verifico che la password rispetti il vincolo di lunghezza (compresa tra 5 e 20 caratteri) e che contenga almeno una maiuscola
    if(form_login.password.value.length>20||form_login.password.value.length<5){
        event.preventDefault();
        alert("La password deve contenere da 5 a 20 caratteri");
        return;
    }
    if(checkMaiuscolo(form_login.password.value)==false){
        event.preventDefault();
        alert("La password deve contenere almeno un carattere maiuscolo");
        return;
    }
}

//Associo il listener all'evento del form di login
const form_login=document.forms["login"];
form_login.addEventListener("submit", check);
