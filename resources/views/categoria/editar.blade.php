<div id="editar-categoria" title="Categoria: ">
    <div class="row">
        <div class="col-lg-3">
            <table>
                <tr>
                    <td><label for="nombre-editar">NOMBRE</label></td>
                    <td>
                        <input type="text" id="nombre-editar" />
                        <input type="hidden" id="id-editar" name="id" />
                    </td>
                </tr>

                <tr>
                    <td><input class="btn btn-primary" type="button" id="btnEditarCategoria" value="Editar" /></td>
                    <td><input class="btn btn-primary" type="button" id="btnCerrar" value="Cerrar" /></td>
                </tr>
            </table>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#btnEditarCategoria').on('click', function() {
            post(
                '{{ route('categorias.editar') }}',
                {
                    id: $('#id-editar').val(),
                    nombre: $('#nombre-editar').val()
                },
                function (response) {
                    $('#editar-categoria').dialog('close');
                    // Borrar la categoria es mas sencillo
                    cargarCategorias();
                    $.notify('Categoria editada exitosamente', 'success');
                },
                function (response) {
                    $.notify(response.mensaje, 'error');
                }
            )
        });

        $('#btnCerrar').on('click', function() {
            $('#categoria_' + $('#id-editar').val()).css('border', 'none')
            $('#editar-categoria').dialog('close');
        });
    });
</script>
