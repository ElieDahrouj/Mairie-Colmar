function verifMail(champ)
{
    let regex = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;

    let infoVerif = document.createElement('span')
    infoVerif.style.paddingLeft = '10px'
    infoVerif.setAttribute('id', 'validationMail')


    if(!regex.test(champ.value))
    {
        infoVerif.style.color = 'red'
        infoVerif.classList.add('fas')
        infoVerif.classList.add('fa-times')
    }
    else
    {
        infoVerif.style.color = 'green'
        infoVerif.classList.add('fas')
        infoVerif.classList.add('fa-check')
    }
    return infoVerif
}

let inputEmail = document.querySelector('#userID')
inputEmail.addEventListener('keyup',function () {
    let statusGet = document.querySelector('#validationMail')
    let mail = document.querySelector('#status')
    if (statusGet){
        mail.removeChild(statusGet)
    }
    let statusMail = verifMail(this)
    document.querySelector('#status').appendChild(statusMail)
})

let eventMail = document.querySelector('#mail')
let modaleEmail = document.querySelector('.foundMail')
eventMail.addEventListener('click',function () {
    if (modaleEmail.style.display === 'none') {
        modaleEmail.style.display = 'flex'
    }
    else{
        modaleEmail.style.display = 'flex'
    }
});

let closeEmail = document.querySelector('#closeAll')
closeEmail.addEventListener('click',function () {
    if (modaleEmail.style.display === 'flex') {
        modaleEmail.style.display = 'none'
    }
    else{
        modaleEmail.style.display = 'none'
    }
});