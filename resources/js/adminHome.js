
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
    const List=document.querySelectorAll('waitingList');
    List.array.forEach(element => {
        const buttons = element.querySelectorAll('button');
        buttons.forEach(button=>{
            if(button.hasAttribute('approve')){
                button.onclick=()=>{
                    const div=document.createElement('div');
                    div.innerHTML=`
                        <p>Voulez vous accepter ce stand?</p>
                        <button></button>
                    `
                }
            }
        })
    });
}