let button = document.querySelector('#isConfirmed')

let isConfirm = function () {

    fetch('http://localhost/projectCoding/models/ajax/infosConfirmed.php', {
        method: 'POST',
        headers: new Headers(),
        body: new FormData(button)
    }).then((res) => res.json())
        .then((data) => {
            let displayInfosNone = document.querySelector('.infoUser')
            if (data.type === 1) {
                displayMessage(data)
                document.querySelector('#displayMessage').classList.add('true');
                displayInfosNone.style.display = 'none'
            }
            else{
                displayMessage(data)
                document.querySelector('#displayMessage').classList.add('false');
                displayInfosNone.style.display = 'block'
            }
        })
    /*.catch((err)=>console.log(err))*/
};
if (button) {
    button.addEventListener('submit', function (e) {
        e.preventDefault();
        isConfirm();
    })
}

function createMessageConfirmation(data) {
    let divNotif = document.createElement('div')
    divNotif.setAttribute('id','displayMessage')
    let messageUser = document.createElement('span')
    messageUser.innerHTML = `${data.msg}`

    divNotif.appendChild(messageUser)
    return divNotif
}

function displayMessage(data) {
    let notifMessage = createMessageConfirmation(data)
    notifMessage.style.textAlign ='center'
    document.querySelector('#messageOnlyUserConnected').appendChild(notifMessage)
}