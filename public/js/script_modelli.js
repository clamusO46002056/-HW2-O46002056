//Inserimento modello
function check(event){
    event.preventDefault();
    //Controllo l'inserimento dei valori del form
    if(form.codice.value.length==0||form.data.value.leght==0||form.nome.value.length==0||form.genere.value.length==0||form.nazione.value.length==0||form.ingaggio.value.length==0){
        alert("E' necessario riempire i campi!");
        return;
    } else{
        fetch("/homework2/public/modelli/get").then(onResponse).then(onJSON);
    }
}

function onResponse(response){
    return response.json();
}

function onJSON(json){
    for(let i=0; i<json.length; i++){
        if(json[i].codice==form.codice.value){
            alert("Codice modello: "+form.codice.value+" già presente! Scegline un altro");
            return;
        }
    }
    if(form.azienda.value.length==0){
        fetch("/homework2/public/modelli/inserimento"+"/"+form.codice.value+""+"/"+form.data.value+""+"/"+form.nome.value+""+"/"+form.genere.value+""+"/"+form.nazione.value+""+"/"+'no_azienda'+""+"/"+form.ingaggio.value+"").then(onResponse).then(onJSONAdd);

    }else{
        fetch("/homework2/public/modelli/inserimento"+"/"+form.codice.value+""+"/"+form.data.value+""+"/"+form.nome.value+""+"/"+form.genere.value+""+"/"+form.nazione.value+""+"/"+form.azienda.value+""+"/"+form.ingaggio.value+"").then(onResponse).then(onJSONAdd);

    }
}

function onJSONAdd(json){
    if(json.stato){
        alert("Modello aggiunto al database!");
    } else {
        alert("Si è verificato un errore");
    }
}

//Ricerca modello
function cerca(event){
    event.preventDefault();
    const contenitore=document.querySelector("#contenitore");
    contenitore.innerHTML="";
    if(form_cerca.genere.value.length==0||form_cerca.manager.value.length==0){
        alert("E' necessario riempire i campi");
        return;
    } else{
        fetch("/homework2/public/modelli/cerca"+"/"+form_cerca.genere.value+""+"/"+form_cerca.manager.value+""+"/"+form_cerca.nazione.value).then(onResponse).then(onJsonModello);
    }
    
    
}

function onJsonModello(json){
    console.log(json);
    if(json.length==0){
        const contenitore= document.querySelector('#contenitore');
        const new_desc=document.createElement('h3');
        new_desc.textContent="Nessun modello risponde ai criteri selezionati!";
        contenitore.appendChild(new_desc);
    } else{
        for(let i=0; i<json.length; i++){
            const elemento = document.createElement('div');
            const contenitore= document.querySelector('#contenitore');
            contenitore.appendChild(elemento);
            const elementList= document.querySelectorAll('#contenitore div');
            const new_nome=document.createElement('h1');
            const new_sesso=document.createElement('p');
            const new_data=document.createElement('p');
            const new_nazione=document.createElement('p');
            const new_codice=document.createElement('p');
            const new_ingaggio=document.createElement('p');
            new_nome.textContent=json[i].nome;
            new_sesso.textContent=json[i].sesso;
            new_data.textContent=json[i].data_nascita;
            new_nazione.textContent=json[i].nazionalita;
            new_codice.textContent=json[i].codice;
            new_ingaggio.textContent=json[i].ingaggio;
            elementList[i].appendChild(new_nome);
            elementList[i].appendChild(new_sesso); 
            elementList[i].appendChild(new_data);
            elementList[i].appendChild(new_nazione);
            elementList[i].appendChild(new_codice);
            elementList[i].appendChild(new_ingaggio);
        }
    }
}

const form=document.forms["aggiungi_modello"];
form.addEventListener("submit", check);
const form_cerca=document.forms["cerca_modello"];
form_cerca.addEventListener("submit", cerca);