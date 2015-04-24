$('#alerta').hide();
    function alertas(color, texto) {

        switch (color) {
            case 'rojo':
                $('#color_alert').attr('class', 'alert-box alert radius')
                break;
            case 'naranja':
                $('#color_alert').attr('class', 'alert-box warning radius')
                break;
            case 'verde':
                $('#color_alert').attr('class', 'alert-box success radius')
                break;
            case 'azul':
                $('#color_alert').attr('class', 'alert-box info radius')
                break;
            default :
                $('#color_alert').attr('class', 'alert-box success radius')
        }
        $('#texto_alert').html(texto);
        $('#alerta').show();
        setTimeout(
                function()
                {
                    $('#alerta').hide();
                }, 5000);
    }
    $(document).foundation();

    $(".preload, .load").hide();