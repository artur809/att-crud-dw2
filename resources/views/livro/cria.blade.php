@extends('leiaute')

@section('titulo')
    Cria novo livro<br>
    <a class="btn btn-dark" href="{{ route('livro.index') }}">Voltar</a>
@endsection

@section('conteudo')
    <form action="{{ route('livro.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" required>
        </div>
        <div class="mb-3">
            <label for="autor" class="form-label">Autor</label>
            <input type="text" class="form-control" id="autor" name="autor" required>
        </div>
        <div class="mb-3">
            <label for="Isbn" class="form-label">Isbn</label>
            <input type="text" class="form-control" id="Isbn" name="isbn" required>
        </div>
        <button type="submit" class="btn btn-primary">Criar Livro</button>
    </form>
@endsection