//https://newsapi.org/docs/endpoints/everything
function onResponse(response){
    return response.json();
}
function onJsonNews(json){
    console.log(json);
    let max=10;
    if(json.length<max){
        max=json.length;
    }
    for(let i=0; i<max; i++){
        const elemento = document.createElement('div');
        const contenitore= document.querySelector('#contenitore');
        contenitore.appendChild(elemento);
        const elementList= document.querySelectorAll('#contenitore div');
        const new_titolo=document.createElement('h1');
        const new_img=document.createElement('img');
        const new_desc=document.createElement('p');
        const new_data=document.createElement('p');
        const new_fonte=document.createElement('p');
        const leggi=document.createElement('a');
        leggi.textContent="Continua a leggere";
        leggi.id="link";
        leggi.href=json.articles[i].url;
        leggi.target="_blank";
        new_titolo.textContent=json.articles[i].title;
        new_img.src=json.articles[i].urlToImage;
        new_desc.textContent=json.articles[i].description;
        new_data.textContent=(json.articles[i].publishedAt).substring(0,10);
        new_fonte.textContent="Fonte: "+json.articles[i].source.name;
        elementList[i].appendChild(new_titolo);
        elementList[i].appendChild(new_img);
        elementList[i].appendChild(new_desc); -
        elementList[i].appendChild(new_data);
        elementList[i].appendChild(new_fonte);
        elementList[i].appendChild(leggi);
    }
}
fetch('/homework2/public/home/notizie').then(onResponse).then(onJsonNews);