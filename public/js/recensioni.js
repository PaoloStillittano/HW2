
function LoadRecensioni(){
    fetch("recensioni/load").then(OnResponseRecensioni).then(OnJsonRecensioni);
}

function OnResponseRecensioni(response){
    return response.json();
}

function OnJsonRecensioni(json){
    const box=document.querySelector('.cell');
    box.innerHTML="";
    for(let i = 0; i < json.length; i++){
        const block=document.createElement('div');
        block.classList.add('block');

        const username=document.createElement('span');
        username.textContent=json[i].username + ":";
        username.classList.add('username');

        const review=document.createElement('div');
        review.classList.add('recensione');

        const recensione=document.createElement('span');
        recensione.textContent=json[i].recensione;
        
        block.appendChild(username);
        review.appendChild(recensione);
        block.appendChild(review);
        box.appendChild(block);
    }
}
LoadRecensioni();
