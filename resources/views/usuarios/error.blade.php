@extends('layouts.layout')

@section('title', 'Erro')

@section('content')
<div class="error-container">
    <h1 class="erro">ERRO {{ $code }}</h1>
    <h2 class="mb-5">Ops... algo errado não está certo :(</h2>
    <p>{{ $message }}</p>        
    <form id="form-usuarios-importados-erro" action="{{ route('usuarios.importar') }}" method="GET" class="form-error">
        <button type="submit" class="btn btn-error">
            Voltar à página de importação
        </button>
        <img src="{{ asset('assets/icons/icon-seta.svg') }}" alt="Ícone de seta" class="seta" onclick="document.getElementById('form-usuarios-importados-erro').submit();">
    </form>
@endsection

@section('scripts')
<script>
    document.querySelector('.seta').addEventListener('click', function() {
        document.getElementById('form-usuarios-importados-erro').submit();
    });
</script>
@endsection
