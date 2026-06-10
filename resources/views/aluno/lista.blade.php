@extends('leiaute')

@section('titulo')
    Gestão de alunos<br>
    <a class="btn btn-light" href="{{ route('aluno.create') }}">Criar aluno</a>
@endsection

@section('conteudo')
    <form class="mb-3" method="GET" action="{{ route('aluno.search') }}">
        <div class="input-group">
            <input id="filtro" name="filtro" class="form-control" type="text" placeholder="Pesquisar..." value="{{ $filtro ?? '' }}" autofocus>
            <button class="btn btn-primary" type="submit">Pesquisar</button>
        </div>
    </form>

    <table class="table table-striped table-sm">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Endereço</th>
            <th>Matrícula</th>
            <th>Ações</th>
        </tr>
        @foreach ($alunos as $aluno)
            <tr>
                <td>{{ $aluno->id }}</td>
                <td>{{ $aluno->nome }}</td>
                <td>{{ $aluno->endereco }}</td>
                <td>{{ $aluno->matricula }}</td>
                <td style="white-space: nowrap;">
                    <a title="Ver/editar" class="btn btn-sm btn-secondary" href="{{ route('aluno.view', $aluno->id) }}"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path d="M0 0h24v24H0z" fill="none" /><path fill="currentColor" d="M3 21v-4.25L16.2 3.575q.3-.275.663-.425t.762-.15t.775.15t.65.45L20.425 5q.3.275.438.65T21 6.4q0 .4-.137.763t-.438.662L7.25 21zM17.6 7.8L19 6.4L17.6 5l-1.4 1.4z" /></svg></a>
                    <a title="Excluir" class="btn btn-sm btn-danger btn-excluir" 
                    href="{{ route('aluno.destroy', $aluno->id) }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path d="M0 0h24v24H0z" fill="none" /><path fill="currentColor" d="M7 21q-.825 0-1.412-.587T5 19V6H4V4h5V3h6v1h5v2h-1v13q0 .825-.587 1.413T17 21zM17 6H7v13h10zM9 17h2V8H9zm4 0h2V8h-2zM7 6v13z" /></svg></a>
                </td>
            </tr>
        @endforeach
    </table>
@endsection

@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var botoesExcluir = document.querySelectorAll('.btn-excluir');

            botoesExcluir.forEach(function (botao) {
                botao.addEventListener('click', function (event) {
                    if (!confirm('Tem certeza que deseja excluir este aluno?')) {
                        event.preventDefault();
                    }
                });
            });
        });
    </script>
@endsection
