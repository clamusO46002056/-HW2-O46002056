function checkMaiuscolo(stringa){
    for(let i=0; i<stringa.length; i++){
        if(stringa.charCodeAt(i)>= 65 && stringa.charCodeAt(i) <= 90)
            {
                return true;
            }
    }
    return false;
}
function onResponse(response){
    return response.json();
}
function onJSON(json){
    console.log(json);
    const lista_persone=json;
    for(let i=0; i<lista_persone.length; i++){
        if(lista_persone[i].nome==form.utente.value){
            alert("Nome utente '"+form.utente.value+"' già presente! Scegline un altro");
            return;
        }
    }
}
function check(event){
    //Controllo l'inserimento di username e password
    if(form.utente.value.length==0||form.password.value.length==0){
        event.preventDefault();
        alert("E' necessario riempire i campi!");
        return;
    }
    //Verifico che la password rispetti il vincolo di lunghezza (compresa tra 5 e 20 caratteri) e che contenga almeno una maiuscola
    if(form.password.value.length>20||form.password.value.length<5){
        event.preventDefault();
        alert("La password deve contenere da 5 a 20 caratteri");
        return;
    }
    if(checkMaiuscolo(form.password.value)==false){
        event.preventDefault();
        alert("La password deve contenere almeno un carattere maiuscolo");
        return;
    }
    fetch("/homework2/public/utenti/").then(onResponse).then(onJSON);
}

//Associo il listener all'evento del form
const form=document.forms["iscrizione"];
form.addEventListener("submit", check);
