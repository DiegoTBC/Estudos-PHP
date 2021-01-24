let validationButton = document.getElementById('validation-button');
let celNumber = document.getElementById('celnumber');
let validationCodeContainer = document.getElementById('validation-code-container')
validationButton.addEventListener('click', function (event){
    event.preventDefault();//tira a ação de submeter formulario

    let url = `http://localhost:8000/send/${celNumber.value}`
    alert(url);
    fetch(url).then(function(response){
        if(response.ok) {
            alert('O codigo de validação foi enviado para seu celular')
            validationCodeContainer.classList.remove('d-none')

        }
    })

})
