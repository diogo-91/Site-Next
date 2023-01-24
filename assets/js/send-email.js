const sendMail = (form) => {
    var data = new FormData(form);
    axios.post('/envio-email', data)
    .then(function (response) {

        console.log(response)
        console.log(response.data)

        if(response && form.querySelector('.message-return')) {
            form.querySelector('.message-return').innerHTML = '<div style="">Mensagem enviada com sucesso</div>';
        }
    })
}