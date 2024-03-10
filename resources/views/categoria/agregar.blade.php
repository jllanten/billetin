<div id="agregar-categoria" title="Nueva categoria">
    <div class="row">
        <div class="col-lg-3">
            <table>
                <tr>
                    <td>NOMBRE</td>
                    <td><input type="text" id="nombre" /></td>
                </tr>

                <tr><td colspan="2">&nbsp;</td></tr>

                <tr>
                    <td><input class="btn btn-primary" type="button" id="btnAgregarCategoria" value="Agregar" /></td>
                    <td><input class="btn btn-primary" type="button" id="btnCancelar" value="Cancelar" /></td>
                </tr>
            </table>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#btnAgregarCategoria').on('click', function() {
            post(
                '{{ route('categorias.agregar') }}',
                { nombre: $('#nombre').val() },
                function (response) {
                    $('#agregar-categoria').dialog('close');
                    cargarCategorias();
                    $.notify('Categoria creada exitosamente', 'success');
                },
                function (response) {
                    $.notify(response.mensaje, 'error');
                }
            )
        });

        $('#btnCancelar').on('click', function() {
            $('#agregar-categoria').dialog('close');
        });
    });
</script>
