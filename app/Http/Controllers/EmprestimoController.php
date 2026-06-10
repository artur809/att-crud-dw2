<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Livro;
use Illuminate\Http\Request;

class EmprestimoController extends Controller
{
    
    public function index()
    {
        $filtro = '';
        $alunos = Aluno::with('livros')->get();
        return view('emprestimos.lista', compact('alunos', 'filtro'));
    }

    public function create()
    {
        $alunos = Aluno::all();
        $livros = Livro::all();
        return view('emprestimos.cria', compact('alunos', 'livros'));
    }

    public function store(Request $request)
    {
        try {
            $aluno = Aluno::find($request->aluno_id);
            
            $aluno->livros()->attach(
                $request->livro_id,
                [
                    'datahora' => now(),
                    'datahora_devolucao' => null
                ]
            );

            session()->flash('msg', 'Empréstimo feito com sucesso!');
            return redirect()->route('emprestimo.index');

        } catch (\Exception $e) {
            session()->flash('erro', 'Erro ao cadastrar empréstimo: ' . $e->getMessage());
            return redirect()->route('emprestimo.index');
        }
    }

    public function destroy($aluno_id, $livro_id)
    {
        try {
            $aluno = Aluno::findOrFail($aluno_id);
            $aluno->livros()->detach($livro_id);

            session()->flash('msg', 'Empréstimo excluído com sucesso!');
            return redirect()->route('emprestimo.index');

        } catch (\Exception $e) {
            session()->flash('erro', 'Erro ao excluir empréstimo: ' . $e->getMessage());
            return redirect()->route('emprestimo.index');
        }
    }

    public function edit($aluno_id, $livro_id)
    {
        try {
            $aluno = Aluno::findOrFail($aluno_id);
            $livro = Livro::findOrFail($livro_id);
            $emprestimo = $aluno->livros()->where('livro_id', $livro_id)->firstOrFail()->pivot;

            return view('emprestimos.vizualizar', compact('aluno', 'livro', 'emprestimo'));

        } catch (\Exception $e) {
            session()->flash('erro', 'Erro ao abrir edição: ' . $e->getMessage());
            return redirect()->route('emprestimo.index');
        }
    }

    public function update(Request $request, $aluno_id, $livro_id)
    {
        try {
            $aluno = Aluno::findOrFail($aluno_id);

            $aluno->livros()->updateExistingPivot($livro_id, [
                'datahora' => $request->datahora,
                'datahora_devolucao' => $request->datahora_devolucao
            ]);

            session()->flash('msg', 'Empréstimo atualizado com sucesso!');
            return redirect()->route('emprestimo.index');

        } catch (\Exception $e) {
            session()->flash('erro', 'Erro ao atualizar empréstimo: ' . $e->getMessage());
            return redirect()->route('emprestimo.index');
        }
    }

    public function search(Request $request)
    {
        $filtro = trim((string) $request->input('filtro', ''));
        
        $alunos = Aluno::where('nome', 'like', "%{$filtro}%")                  
                    ->orderBy('id')
                    ->get();

        return view('emprestimos.lista', compact('alunos', 'filtro'));
    }
}