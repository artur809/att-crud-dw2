@extends('leiaute')

@section('titulo')
    Gestão de Empréstimos<br>
    <a class="btn btn-light" href="{{ route('emprestimos.create') }}">Novo Empréstimo</a>
@endsection

@section('conteudo')
    <form class="mb-3" method="GET" action="{{ route('emprestimo.search') }}">
        <div class="input-group">
            <input id="filtro" name="filtro" class="form-control" type="text" placeholder="Pesquisar..." value="{{ $filtro ?? '' }}" autofocus>
            <button class="btn btn-primary" type="submit">Pesquisar</button>
        </div>
    </form>

    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>Nome Aluno</th>
                <th>Nome Livro</th>
                <th>Data/Hora Empréstimo</th>
                <th>Devolvido</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($alunos as $aluno)
                @foreach ($aluno->livros as $livro)
                    <tr>
                        <td>{{ $aluno->nome }}</td>
                        <td>{{ $livro->nome }}</td>
                        <td>{{ \Carbon\Carbon::parse($livro->pivot->datahora)->format('d/m/Y H:i') }}</td>
                        <td>
                            @if($livro->pivot->datahora_devolucao)
                                <span class="badge bg-success">Sim</span>
                            @else
                                <span class="badge bg-warning text-dark">Não</span>
                            @endif
                        </td>
                        <td style="white-space: nowrap;">
                            <a title="Editar" class="btn btn-sm btn-secondary" href="{{ route('emprestimo.edit', [$aluno->id, $livro->id]) }}">Editar</a>
                            <a title="Excluir" class="btn btn-sm btn-danger btn-excluir" href="{{ route('emprestimo.destroy', [$aluno->id, $livro->id]) }}">Excluir</a>
                        </td>
                    </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>
@endsection

@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var botoesExcluir = document.querySelectorAll('.btn-excluir');

            botoesExcluir.forEach(function(botao) {
                botao.addEventListener('click', function(evento) {
                    if (!confirm('Tem certeza que deseja excluir este empréstimo?')) {
                        evento.preventDefault();
                    }
                });
            });
        });
    </script>
@endsection