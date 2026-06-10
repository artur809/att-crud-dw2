@extends('leiaute')

@section('titulo')
    Editar Aluno<br>
    <a class="btn btn-dark" href="{{ route('aluno.index') }}">Voltar</a>
@endsection

@section('conteudo')
    
    <form action="{{ route('aluno.update', ['id' => $aluno->id]) }}" method="POST">
        @csrf
        
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" value="{{ old('nome', $aluno->nome) }}" required>
        </div>
        <div class="mb-3">
            <label for="endereco" class="form-label">Endereço</label>
            <input type="text" class="form-control" id="endereco" name="endereco" value="{{ old('endereco', $aluno->endereco) }}" required>
        </div>
        <div class="mb-3">
            <label for="matricula" class="form-label">Matrícula</label>
            <input type="text" class="form-control" id="matricula" name="matricula" value="{{ old('matricula', $aluno->matricula) }}" required>
        </div>
        
        <button type="submit" class="btn btn-primary mb-4">Atualizar Aluno</button>
    </form> 

    <div class="card mb-3">
        <div class="card-header">
            <h5 class="mb-0">Gerenciar Telefones do Aluno</h5>
        </div>
        
        <div class="card-body">
            
            <h6>Telefones Cadastrados:</h6>
            @if(isset($aluno->telefones) && $aluno->telefones->count() > 0)
                <ul class="list-group mb-3">
                    @foreach($aluno->telefones as $telefone)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span>
                                <strong>{{ $telefone->descricao ?? 'Telefone' }}:</strong> {{ $telefone->numero }}
                            </span>
                            
                           <a href="{{ route('aluno.telefone.destroy', ['id' => $telefone->id]) }}" 
                           class="btn btn-sm btn-danger btn-excluir-telefone">
                            Deletar
                            </a>
                            
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="text-muted">Nenhum telefone cadastrado para este aluno.</p>
            @endif

            <hr>

            <h6>Adicionar Novo Telefone:</h6>
            <form action="{{ route('aluno.telefone.store', ['id' => $aluno->id]) }}" method="POST">
                @csrf
                <div class="row g-2">
                    <div class="col-md-4">
                        <input type="text" name="descricao" class="form-control form-control-sm" placeholder="Descricao">
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="numero" class="form-control form-control-sm" placeholder="(00) 00000-0000" required>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-sm btn-success w-100">Adicionar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var botoesExcluir = document.querySelectorAll('.btn-excluir-telefone');

            botoesExcluir.forEach(function(botao) {
                botao.addEventListener('click', function(event) {
                    if (!confirm('Tem certeza que deseja excluir este telefone?')) {
                        event.preventDefault();
                    }
                });
            });
        });
    </script>
@endsection