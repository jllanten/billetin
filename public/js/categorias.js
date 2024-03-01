function cargarCategorias() {
    get(
        '/categorias/',
        [],
        function (response) {
            var tblCategorias = $('#categorias');
            tblCategorias.empty();
            $.each(response, function (index, value) {
                var id = value.categoria_id;
                tblCategorias.append($('<tr><td id="categoria_' + id + '" data-id="' + id + '" class="input-categoria"><b>' + value.nombre + '</b></td></tr>'));
                $('#categoria_' + id).on('dblclick', function() {
                    $(this).css('border', '2px solid yellow')
                    editarCategoria($(this).attr('data-id'));
                });
            });
        }
    );
}

function editarCategoria(id) {
    get(
        '/categorias/' + id,
        [],
        function(response) {
            $('#nombre-editar').val(response.nombre);
            $('#id-editar').val(id);
            $('#editar-categoria').dialog('open');
        }
    )
}
