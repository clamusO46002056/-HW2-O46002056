
function onResponse(response){
    return response.json();
}

function onJsonAzienda(json){
    for(let i=0; i<json.length; i++){
        const elemento = document.createElement('div');
        elemento.id='marca'+i;
        const contenitore= document.querySelector('#contenitore');
        contenitore.appendChild(elemento);
        const elementList= document.querySelectorAll('#contenitore div');
        const new_titolo=document.createElement('h1');
        const new_img=document.createElement('img');
        const new_desc=document.createElement('p');
        new_desc.classList.add('descrizione');
        new_desc.classList.add('nascondi');

        const preferito=document.createElement('button');
        preferito.textContent='Aggiungi ai preferiti!';

        const mostra_piu=document.createElement('p'); 
        mostra_piu.textContent='Mostra di più';
        mostra_piu.classList.add('mostra');

        const mostra_meno=document.createElement('p'); 
        mostra_meno.classList.add('descrizione');
        mostra_meno.classList.add('nascondi');
        mostra_meno.classList.add('meno');
        mostra_meno.textContent='Mostra di meno';

        new_titolo.textContent=json[i].nome;
        new_img.src=json[i].url_logo;
        new_desc.textContent=json[i].descrizione;
        elementList[i].appendChild(new_titolo);
        elementList[i].appendChild(new_img); 
        elementList[i].appendChild(mostra_piu);
        elementList[i].appendChild(new_desc);
        elementList[i].appendChild(mostra_meno);
        elementList[i].appendChild(preferito);
        preferito.addEventListener("click", aggiungi_preferiti);
        mostra_piu.addEventListener("click", funzione_mostra);
        new_img.addEventListener("click", analisi_azienda);
    }
}

//Funzione che crea uno slot con l'azienda da analizzare
function analisi_azienda(event){
    const corrente=event.currentTarget;
    const nodoSup=corrente.parentNode;
    const contenitore=document.querySelector("#corpo");
    contenitore.classList.add("nascondi");
    const azienda=nodoSup.querySelector("h1");
    const reports= document.querySelector('#titolo');
    const titolo=document.createElement("h1");
    titolo.textContent=azienda.textContent;
    reports.appendChild(titolo);
    fetch("/homework2/public/aziende/analizza/"+azienda.textContent).then(onResponse).then(onJsonAnalisi);
}

function onJsonAnalisi(json){
    for(let i=0; i<json.length; i++){
        const elemento = document.createElement('div');
        const contenitore= document.querySelector('#analisi');
        contenitore.appendChild(elemento);
        const lista_report=document.querySelectorAll("#analisi div");
        const numero_report=document.createElement("h1");
        numero_report.textContent="Report numero " + (i+1);
        const IVA_azienda=document.createElement("p");
        IVA_azienda.textContent="IVA azienda acquirente: " + json[i].IVA;
        const codice_lotto=document.createElement("p");
        codice_lotto.textContent="Codice lotto acquistato: " + json[i].codice_lotto;
        const prezzo_lotto=document.createElement("p");
        prezzo_lotto.textContent="Prezzo lotto: " + json[i].prezzo;
        const tipo_lotto=document.createElement("p");
        tipo_lotto.textContent="Tipo lotto: " + json[i].tipo;
        lista_report[i].appendChild(numero_report);
        lista_report[i].appendChild(IVA_azienda);
        lista_report[i].appendChild(codice_lotto);
        lista_report[i].appendChild(prezzo_lotto);
        lista_report[i].appendChild(tipo_lotto);
    }
    const paragrafo=document.createElement("p");
    paragrafo.textContent="Clicca per tornare indietro!";
    const contenitore= document.querySelector('#reports');
    contenitore.classList.remove("nascondi");
    paragrafo.addEventListener("click", ritorna_indietro)
    contenitore.appendChild(paragrafo);

}

function ritorna_indietro(event){
    const corrente=event.currentTarget;
    corrente.remove();
    const titolo=document.querySelector("#titolo");
    titolo.innerHTML="";
    const analisi=document.querySelector("#analisi");
    analisi.innerHTML="";
    const corpo=document.querySelector("#corpo");
    corpo.classList.remove("nascondi");
    const reports=document.querySelector("#reports");
    reports.classList.add("nascondi");
}

function onJsonInserimento(json){
    if(json.stato){
        alert("Elemento inserito nella sezione personale preferiti!");
    } else {
        alert("Si è verificato un errore, controlla se l'elemento è già tra i preferiti!");
    }
}

//Funzione che mostra le descrizioni
function funzione_mostra(event){
    const elemento=event.currentTarget;
    elemento.classList.add('nascondi');
    const nodoSup=elemento.parentNode;
    const listaDesc=nodoSup.querySelectorAll(".descrizione");
    for(let singoloDesc of listaDesc){
        singoloDesc.classList.remove('nascondi');
    }
    const meno=nodoSup.querySelector(".meno");
    meno.addEventListener("click", funzione_nascondi);
}

//Funzione che nasconde le descrizioni
function funzione_nascondi(event){
    const elemento=event.currentTarget;
    const nodoSup=elemento.parentNode;
    const listaDesc=nodoSup.querySelectorAll(".descrizione");
    for(let singoloDesc of listaDesc){
        singoloDesc.classList.add('nascondi');
    }
    const mostra=nodoSup.querySelector(".mostra");
    mostra.classList.remove('nascondi');
}

//Funzione che aggiunge i preferiti
function aggiungi_preferiti(event){
    const elemento=event.currentTarget;
    const nodoSup=elemento.parentNode;
    const titolo=nodoSup.querySelector("h1");
    //Aggiungo al database l'azienda preferita e l'utente che l'ha scelta
    fetch("/homework2/public/personale/"+titolo.textContent).then(onResponse).then(onJsonInserimento);
}

//Funzione che rimuove un elemento dai preferiti
function rimuovi_preferiti(event){
    const elemento=event.currentTarget;
    const nodoSup=elemento.parentNode;
    nodoSup.remove();
    const lista_slot=document.querySelectorAll("#preferiti div h1");
    if(lista_slot.length<=0){
        document.querySelector("#box_pref").classList.add("nascondi");
    }
}

//Funzione che mostra gli elementi in base alla barra di ricerca
function funzione_ricerca(event){
    const input= event.currentTarget;
    const lista_marche=document.querySelectorAll("#contenitore div h1");
    for(let singola_marca of lista_marche){
        const marca=singola_marca.textContent;
        const testo=input.value;
        (singola_marca.parentNode).classList.remove("nascondi");
        if(((marca.toLowerCase()).indexOf(testo.toLowerCase()))===-1){
            (singola_marca.parentNode).classList.add("nascondi");
        }
    }
}

fetch('/homework2/public/aziende/carica').then(onResponse).then(onJsonAzienda);
const barra_ricerca=document.querySelector("input");
barra_ricerca.addEventListener("keyup", funzione_ricerca);
