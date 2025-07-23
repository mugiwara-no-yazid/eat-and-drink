
function apiReq(url, method, data){
    fetch('/api/commande', {
        method: method,
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify(data)
    })
    .then(response => response.json())
    .then(data => {
        console.log(data);
    })
    .catch(error => {
        console.error('Erreur:', error);
    });
}

function handleWaitingList(){
    const List=document.querySelectorAll('.stand-wait');
    List.forEach(element => {
        const buttons = element.querySelectorAll('button');
        buttons.forEach(button=>{
            if(button.className.includes('approve')){
                button.onclick=()=>{
                }
            }
        })
    });
}

function createModale(action){
    const div=document.createElement('div');
    div.innerHTML=`
        <p>Voulez-vous ${action} ce stand?</p>
        <div>
            <button class="button" style="background: rgba(95, 240, 79, 0.53);">Oui</button>
            <button class="button" style="background: rgba(222, 53, 53, 0.69);">Non</button>
        </div>
    `
    div.className="card modale";
    document.body.appendChild(div);
}

handleWaitingList();