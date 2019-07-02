let burger = document.querySelector('.menu')
let modale = document.querySelector('#modal')
let close = document.querySelector('.closeModal')
burger.addEventListener('click',function () {
    if (modale.style.display === 'none') {
        modale.style.display = 'block'
    }
    else{
        modale.style.display = 'block'
    }
});

close.addEventListener('click',function () {
    if (modale.style.display === 'block') {
        modale.style.display = 'none'
    }
    else{
        modale.style.display = "none"
    }
})
