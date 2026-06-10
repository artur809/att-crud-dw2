@extends('leiaute')

@section('titulo')
    Editar Empréstimo<br>
    <a class="btn btn-dark" href="{{ route('emprestimo.index') }}">Voltar</a>
@endsection

@section('conteudo')
    <form action="{{ route('emprestimo.update', ['aluno_id' => $emprestimo->aluno_id, 'livro_id' => $emprestimo->livro_id]) }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Aluno</label>
            <input type="text" class="form-control" value="{{ $aluno->nome }}" disabled>
        </div>

        <div class="mb-3">
            <label class="form-label">Livro Emprestado</label>
            <input type="text" class="form-control" value="{{ $livro->nome }}" disabled>
        </div>
        
        <div class="mb-3">
            <label class="form-label">Data/Hora do Empréstimo</label>
            <input type="datetime-local" class="form-control" name="datahora" 
                   value="{{ old('datahora', \Carbon\Carbon::parse($emprestimo->datahora)->format('Y-m-d\TH:i')) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Data/Hora da Devolução</label>
            <input type="datetime-local" class="form-control" name="datahora_devolucao" 
                   value="{{ old('datahora_devolucao', $emprestimo->datahora_devolucao ? \Carbon\Carbon::parse($emprestimo->datahora_devolucao)->format('Y-m-d\TH:i') : '') }}">
        </div>
        
        <button type="submit" class="btn btn-primary">Atualizar Empréstimo</button>
    </form>
@endsection