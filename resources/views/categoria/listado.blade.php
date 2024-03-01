@extends('layouts.autenticado')

@section('content')
    <script src="/js/categorias.js"></script>
    <div class="row">
        <h3>CATEGORIAS</h3>
        <br />
        <table>
            <tbody id="categorias">
{{--                @foreach($categorias as $categoria)--}}
{{--                    <tr>--}}
{{--                        <td><b>{{ $categoria->nombre }}</b></td>--}}
{{--                    </tr>--}}
{{--                @endforeach--}}
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
                dlgEditarCategoria.dialog({autoOpen: false});

                cargarCategorias();
            });
        </script>
    @endpush
@endsection
