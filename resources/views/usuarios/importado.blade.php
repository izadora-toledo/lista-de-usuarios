@extends('layouts.layout')

@section('title', 'Usuários Importados')

@section('content')
<div class="importado-container">
    <h2 class="piscar mb-5">Usuários importados com sucesso!</h2>
    <form id="form-usuarios-importados" action="{{ route('usuarios.index') }}" method="GET" class="form-importado">
        <button type="submit" class="btn btn-importado">
            Acessar lista de usuários importados
        </button>
        <img src="{{ asset('assets/icons/icon-seta.svg') }}" alt="Ícone de seta" class="seta" onclick="document.getElementById('form-usuarios-importados').submit();">
    </form>
@endsection

@section('scripts')
<script>
    document.querySelector('.seta').addEventListener('click', function() {
        document.getElementById('form-usuarios-importados').submit();
    });
</script>
@endsection
