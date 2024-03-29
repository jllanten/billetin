@extends('layouts.autenticado')

@section('content')
    <script src="/js/categorias.js"></script>
    <div class="row">
        <h3>CATEGORIAS</h3>
        <br />
        <table>
            <tbody id="categorias">
            </tbody>
        </table>
    </div>

    <button id="btnAgregar">Agregar categoria</button>
    @include('categoria.agregar')
    @include('categoria.editar')

    @push('scripts')
        <script>
            $(document).ready(function() {
                var dlgAgregarCategoria = $('#agregar-categoria');
                dlgAgregarCategoria.dialog({autoOpen: false});
                $('#btnAgregar').on('click', function() {
                    dlgAgregarCategoria.dialog('open');
                });

                var dlgEditarCategoria = $('#editar-categoria');
                dlgEditarCategoria.dialog({autoOpen: false, width: 400});

                cargarCategorias();
            });
        </script>
    @endpush
@endsection
