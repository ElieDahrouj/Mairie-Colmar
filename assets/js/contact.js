let motif = document.querySelector('#motif');
let firstBlockContact = document.querySelector('#firstBlock');

let Register = function (moreMotif) {

    let obj = new FormData()
    obj.append('motif',moreMotif)

    fetch('http://localhost/projectCoding/models/ajax/selectDetails.php', {
        method: 'POST',
        headers: new Headers(),
        body: obj
    }).then((res) => res.json())
        .then((data) => {
            if (data.type === 1) {
                let div2 = document.querySelector('#divDetails')
                let divText = document.querySelector('#divInput')
                let choice = document.querySelector('#choice')
                if (div2) {
                    firstBlockContact.removeChild(div2)
                }
                if (divText) {
                    firstBlockContact.removeChild(divText)
                }

                if (data.details.length !== 0) {
                    createdSelect(data)
                    choice.style.display = 'none'
                }
                else {
                    createdInput()
                    choice.style.display = 'none'
                }
            }
        })
    /*.catch((err)=>console.log(err))*/
};

motif.addEventListener('change', function (e) {
    e.preventDefault();
    Register(this.value);
})

function createSelect(data) {
    let div2 = document.createElement('div')
    div2.setAttribute('id', 'divDetails')

    let label = document.createElement('label')
    label.setAttribute('for', 'details')
    label.innerText =  'Detail *'

    let selectTwo = document.createElement('select');
    selectTwo.setAttribute('name', 'details')
    selectTwo.setAttribute('id', 'details')

    let i;
    for (i = 0; i < data.details.length; i++) {
        let options = document.createElement('option')
        options.setAttribute('value', `${data.details[i].id}`)
        options.innerHTML = `${data.details[i].subject}`
        selectTwo.appendChild(options)
    }

    div2.appendChild(label)
    div2.appendChild(selectTwo)
    return div2
}

function createInputText()
{
    let divText = document.createElement('div')
    divText.setAttribute('id','divInput')

    let label = document.createElement('label')
    label.setAttribute('for', 'text')
    label.innerText = 'Renseignez votre detail *'

    let input = document.createElement('input')
    input.setAttribute('id', 'text')
    input.setAttribute('name', 'textInfo')
    input.setAttribute('type', 'text')
    input.style.borderRadius = '5px'
    input.style.padding = '6px'
    input.style.border = "1px solid #a8a8a8"

    divText.appendChild(label)
    divText.appendChild(input)

    return divText
}

function createdSelect(data) {
    let select = createSelect(data)
    document.querySelector('#firstBlock').appendChild(select)
}

function createdInput() {
    let inputText = createInputText()
    document.querySelector('#firstBlock').appendChild(inputText)
}

let registerForm = document.querySelector('#register');

let form = function () {

    fetch('http://localhost/projectCoding/models/ajax/messages.php', {
        method: 'POST',
        headers: new Headers(),
        body: new FormData(registerForm)
    }).then((res) => res.json())
        .then((data) => {
            let report = document.querySelector('.report')

            if (document.querySelector('#color')){
                report.removeChild(document.querySelector('#color'))
            }

            if (data.type === 1) {
                createdMessage(data)
                document.querySelector('#color').classList.add('true');
                document.querySelector('#register').reset()
                if (document.querySelector('#divInput')){
                    firstBlockContact.removeChild(document.querySelector('#divInput'))
                }
                else {
                    firstBlockContact.removeChild(document.querySelector('#divDetails'))
                }
            }
            else{
                createdMessage(data)
                document.querySelector('#color').classList.add('false');
            }

        })
    /*.catch((err)=>console.log(err))*/
};

registerForm.addEventListener('submit', function (e) {
    e.preventDefault();
    form();
})

function createMessage(data) {
    let divMessage = document.createElement('div')
    divMessage.setAttribute('id','color')
    let message = document.createElement('span')
    message.innerHTML = `${data.msg}`

    divMessage.appendChild(message)
    return divMessage
}

function createdMessage(data) {
    let notif = createMessage(data)
    document.querySelector('.report').appendChild(notif)
}