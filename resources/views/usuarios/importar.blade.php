@extends('layouts.layout')

@section('title', 'Importar Usuários')

@section('content')
<div class="importar-container">
    <h2 class="mb-5">Bem-vindo à tela de importação de usuários</h2>
    <form id="importar-form" action="{{ route('usuarios.importando') }}" method="GET" class="form-importar">
        <button type="submit" class="btn btn-importar">
            Importar usuários
        </button>
        <img src="{{ asset('assets/icons/icon-seta.svg') }}" alt="Ícone de seta" class="seta" onclick="document.getElementById('importar-form').submit();">
    </form>
</div>
@endsection

@section('scripts')
<script>
    document.querySelector('.seta').addEventListener('click', function() {
        document.getElementById('importar-form').submit();
    });
</script>
@endsection
