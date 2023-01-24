number_whats = '';
const callWahts = (number) => {

    number_whats = number;

    let div = document.createElement('div');
    div.setAttribute('id', 'w_chat');

    let closed = '';
    let decodedCookie = decodeURIComponent(document.cookie);
    if(decodedCookie.includes('widget_close_whats=')) {
        closed = 'closed';
    }

    div.innerHTML = '<div id="widget_circle" class="widget_bg3 right" onclick="closeWhatss();">' +
                        '<img src="/assets/img/whats-img.svg" id="widget_logo">' +
                        '<span id="button_text">WhatsApp</span>' +
                    '</div>' +
                    '<div id="widget_popup"'+ ((closed != '') ? ' class="closed"' : '') +'>' +
                        '<div id="welcome_message">' +
                            '<p>Olá! Tem dúvidas?</p>' +
                            '<p>Clique aqui e fale com a nossa equipe.</p>' +
                            '<div id="widget_close"></div>' +
                        '</div>' +
                    '</div>';

    document.body.appendChild(div);

    document.getElementById('widget_circle').addEventListener('click', whatsOpen);

    document.getElementById('widget_close').addEventListener('click', function () {
        document.getElementById('widget_popup').classList.add('closed');

        let d = new Date();
            d.setTime(d.getTime() + (3*24*60*60*1000));

        let expires = 'expires='+ d.toUTCString();
        document.cookie = 'widget_close_whats=true;' + expires + ';path=/';
    });   
}

const whatsOpen = () => {
    window.open('https://api.whatsapp.com/send?phone=' + number_whats);
}

callWahts("5515988039753");