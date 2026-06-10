@extends('leiaute')

@section('titulo')
    Visualizar Livro<br>
    <a class="btn btn-dark" href="{{ route('livro.index') }}">Voltar</a>
@endsection

@section('conteudo')
    <form action="{{ route('livro.update', ['id' => encrypt($livro->id)]) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" value="{{ old('nome', $livro->nome) }}" required>
        </div>
        <div class="mb-3">
            <label for="Autor" class="form-label">Autor</label>
            <input type="text" class="form-control" id="autor" name="autor" value="{{ old('endereco', $livro->autor) }}" required>
        </div>
        <div class="mb-3">
            <label for="isbn" class="form-label">isbn</label>
            <input type="text" class="form-control" id="isbn" name="isbn" value="{{ old('isbn', $livro->isbn) }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Atualiza livro</button>
    </form>
@endsection