let foundPassword = document.querySelector('#lostPass');

let recupPass = function () {

    fetch('http://localhost/projectCoding/models/ajax/lostPassword.php', {
        method: 'POST',
        headers: new Headers(),
        body: new FormData(foundPassword)
    }).then((res) => res.json())
        .then((data) => {
            if (document.querySelector('#messagePass')){
                document.querySelector('#lostPass').removeChild(document.querySelector('#messagePass'))
            }
            if (data.type === 1){
                display(data)
                document.querySelector('#messagePass').classList.add('true')

            }
            else {
                display(data)
                document.querySelector('#messagePass').classList.add('false')
            }
        })
};

foundPassword.addEventListener('submit', function (e) {
    e.preventDefault();
    recupPass();
})

function responseToUser(data){
    let messageUser = document.createElement('p')
    messageUser.setAttribute('id','messagePass')
    messageUser.innerHTML = `${data.msg}`
    messageUser.style.textAlign = 'center'

    return messageUser
}
function display(data) {
    let stockMessage = responseToUser(data)
    document.querySelector('#lostPass').appendChild(stockMessage)
}