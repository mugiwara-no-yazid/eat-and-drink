
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
function handleNav(){
    const waitingList=document.querySelector('.waiting-list')
    const approvedStands=document.querySelector('.approved-stands');
    const commands = document.querySelector('.commands');

    waitingList.onclick=(e)=>{

    }
}