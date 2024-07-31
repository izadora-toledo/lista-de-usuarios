@extends('layouts.layout')

@section('title', 'Lista de Usuários')

@section('content')

<div class="container">
    <div class="btn-container">
        <a href="/importar" class="btn-importar-novamente mt-4">Importar novamente</a>
        <a href="/importar" class="seta-link mt-4">
            <img src="{{ asset('assets/icons/icon-seta.svg') }}" class="seta">
        </a>
    </div>
    <h1>Lista de usuários importados</h1>
    <table id="usuariosTable" class="table table-bordered">
        <thead>
            <tr>
                <th class="tem-seta">Nome</th>
                <th class="tem-seta">Email</th>
                <th class="tem-seta">Estado</th>
                <th>Símbolo</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($usuariosPorEstado as $estado => $usuarios)
            @foreach ($usuarios as $usuario)
                <tr>
                    <td>{{ $usuario->primeiro_nome }} {{ $usuario->ultimo_nome }}</td>
                    <td>{{ $usuario->email }}</td>
                    <td>{{ $usuario->estado }}</td>
                    <td><img src="{{ $usuario->imagem }}" alt="Imagem do usuário" class="user-image"></td>
                </tr>
            @endforeach
        @endforeach
        </tbody>
    </table>        
</div>

@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('#usuariosTable').DataTable({
            "paging": true,
            "pageLength": 10,
            "searching": true,
            "ordering": true,
            "language": {
                "search": "Buscar <span data-toggle='tooltip' title='Pode buscar por nome, email ou estado'><img src='{{ asset('assets/icons/icon-lupa.svg') }}' style='width: 16px; height: 16px;'></span>",
                "paginate": {
                    "previous": "Anterior",
                    "next": "Próximo",
                    "first": "Primeiro",
                    "last": "Último"
                },
                "lengthMenu": "Mostrar _MENU_ usuários por página",
                "zeroRecords": "Nenhum usuário encontrado",
                "info": "Mostrando página _PAGE_ de _PAGES_",
                "infoEmpty": "Nenhum usuário disponível",
                "infoFiltered": "(filtrado de _MAX_ usuários no total)"
            },
            "dom": '<"top"f>rt<"bottom"lp><"clear">'
        });
        
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
@endsection
