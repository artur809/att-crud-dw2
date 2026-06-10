@extends('leiaute')

@section('titulo')
    Cria novo aluno<br>
    <a class="btn btn-dark" href="{{ route('aluno.index') }}">Voltar</a>
@endsection

@section('conteudo')
    <form action="{{ route('aluno.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" required>
        </div>
        <div class="mb-3">
            <label for="endereco" class="form-label">Endereço</label>
            <input type="text" class="form-control" id="endereco" name="endereco" required>
        </div>
        <div class="mb-3">
            <label for="matricula" class="form-label">Matrícula</label>
            <input type="text" class="form-control" id="matricula" name="matricula" required>
        </div>
        <button type="submit" class="btn btn-primary">Criar aluno</button>
    </form>
@endsection