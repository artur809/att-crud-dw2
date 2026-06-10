@extends('leiaute')

@section('titulo')
    Criar Empréstimo<br>
    <a class="btn btn-dark" href="{{ route('emprestimo.index') }}">Voltar</a>
@endsection

@section('conteudo')
    <form action="{{ route('emprestimo.store') }}" method="POST">
        @csrf
        
        <div class="mb-3">
            <label for="aluno_id" class="form-label">Aluno</label>
            <select class="form-control" id="aluno_id" name="aluno_id" required>
                <option value="">Selecione um aluno</option>
                @foreach($alunos as $aluno)
                    <option value="{{ $aluno->id }}">
                        {{ $aluno->nome }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="livro_id" class="form-label">Livro</label>
            <select class="form-control" id="livro_id" name="livro_id" required>
                <option value="">Selecione um livro</option>
                @foreach($livros as $livro)
                    <option value="{{ $livro->id }}">
                        {{ $livro->nome }}
                    </option>
                @endforeach
            </select>
        </div>
        
        <button type="submit" class="btn btn-primary">Efetuar Empréstimo</button>
    </form>
@endsection