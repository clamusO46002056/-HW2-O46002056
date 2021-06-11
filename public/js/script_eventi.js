function onJsonPrenotazione(json){
    if(json.stato){
        alert("Evento aggiunto alle prenotazioni!");
    } else {
        alert("Si è verificato un errore, controlla che l'evento non sia già presente");
    }
}

function onResponse(response){
    return response.json();
}

function prenota_evento(event){
    const elemento_corrente=event.currentTarget;
    const nodoSup=elemento_corrente.parentNode;
    const nome=nodoSup.querySelector("h1");
    const data=nodoSup.querySelector('p');
    fetch("/homework2/public/eventi/aggiungi/"+nome.textContent+"/"+data.textContent).then(onResponse).then(onJsonPrenotazione);
}

function onJsonEvent(json){
    let max_results=10;
    const eventi=document.querySelector("#eventi");
    eventi.innerHTML="";
    if(json.page.totalElements<=max_results)
    {
        max_results=json.page.totalElements;
    }
    for(let i=0; i<max_results; i++){
        const nome_evento=json._embedded.events[i].name;
        const data_evento=json._embedded.events[i].dates.start.localDate;
        const slot=document.createElement("div");
        const nome=document.createElement("h1");
        const bottone=document.createElement("button");
        bottone.textContent="Partecipa";
        nome.textContent=nome_evento;
        const data=document.createElement("p");
        data.textContent=data_evento;
        eventi.appendChild(slot);
        slot.appendChild(nome);
        slot.appendChild(data);
        slot.appendChild(bottone);
        bottone.addEventListener("click", prenota_evento);
    }
}



function aggiorna(){
    fetch("/homework2/public/eventi/prossimi").then(onResponse).then(onJsonEvent);
}
/*const form=document.querySelector("form");
form.addEventListener("submit", cerca);*/
fetch("/homework2/public/eventi/prossimi").then(onResponse).then(onJsonEvent);
const aggiornamento=document.querySelector("#aggiorna");
aggiornamento.addEventListener("click", aggiorna);