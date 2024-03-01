function cargarCategorias() {
    get(
        '/categorias/',
        [],
        function (response) {
            console.log('recibido', response);
            var tblCategorias = $('#categorias');
            tblCategorias.empty();
            $.each(response, function (index, value) {
                tblCategorias.append($('<tr><td id="' + value.categoria_id + '"><b>' + value.nombre + '</b></td></tr>'));
            });
        }
);
}
