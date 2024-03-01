function show(id) {
    console.log('aca');

    $('#' + id)
        .show()
        .addClass('center-screen');
}

function ajax(
    metodo,
    url,
    payload,
    exito,
    error,
    siempre
) {
    payload['_token'] = $('#_token').attr('content');

    $.ajax({
        method: metodo,
        dataType: 'json',
        url: url,
        data: payload,
    }).done(function(response) {
        if (response.estado === 'error') {
            error(response);
        } else {
            exito(response)
        }

        if (typeof siempre !== 'undefined') {
            siempre(response);
        }
    });
}

function get(
    url,
    payload,
    exito,
    error,
    siempre
) {
    return ajax('get', url, payload, exito, error, siempre);
}

function post(
    url,
    payload,
    exito,
    error,
    siempre
) {
    return ajax('post', url, payload, exito, error, siempre);
}

function dialogo(nombre) {
    return $('#' + nombre).dialog();
}
