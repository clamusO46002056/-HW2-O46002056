//Funzione che carica le prenotazioni di una persona
fetch("/homework2/public/prenotazioni").then(onResponse).then(onJsonPrenotazione);
function onResponse(response){
    return response.json();
}

function onJsonEsitoPrenotazione(json){
    if(json.stato){
        alert("Elemento rimosso dalle prenotazioni!");
    } else {
        alert("Si è verificato un errore");
    }
}

function onJsonPrenotazione(json){
    const lista_eventi=json;
    let i=0;
    for(let singolo_evento of lista_eventi){
        const nome = document.createElement("h1");
        nome.textContent=singolo_evento.nome;
        const bottone=document.createElement("button");
        bottone.textContent="Rimuovi dall'elenco!";
        const slot=document.createElement("div");
        const prenotazioni=document.querySelector("#prenotazioni");
        prenotazioni.appendChild(slot);
        let lista_slot=document.querySelectorAll("#prenotazioni div");        //Utilizzo come indici la lunghezza della lista per poter utilizzare di volta in volta un nuovo <div> creato
        lista_slot[lista_slot.length-1].appendChild(nome);
        lista_slot[lista_slot.length-1].appendChild(bottone);
        bottone.addEventListener("click", rimuovi_prenotazione);
    }
    document.querySelector("#box_pref").classList.remove("nascondi");
}

//Funzione che rimuove un elemento dai preferiti
function rimuovi_prenotazione(event){
    const elemento=event.currentTarget;
    const nodoSup=elemento.parentNode;
    const titolo=nodoSup.querySelector("h1");
    fetch("/homework2/public/prenotazioni/elimina/"+encodeURIComponent(titolo.textContent)).then(onResponse).then(onJsonEsitoPrenotazione);
    nodoSup.remove();
}