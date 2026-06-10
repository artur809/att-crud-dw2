<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aluno;
use App\Models\Telefone;

class AlunoController extends Controller
{
    public function index()
    {
        $alunos = Aluno::all();
        return view('aluno.lista', ['alunos' => $alunos, 'filtro' => '']);
    }

    public function create()
    {
        return view('aluno.cria');
    }

    public function store(Request $request)
    {
        try {
            $aluno = new Aluno();
            $aluno->nome = $request->input('nome');
            $aluno->endereco = $request->input('endereco');
            $aluno->matricula = $request->input('matricula');
            $aluno->save();

            session()->flash('msg', 'Armazenado com sucesso!');
            return redirect()->route('aluno.index');

        } catch (\Exception $e) {
            session()->flash('erro', 'Erro ao armazenar: ' . $e->getMessage());
            return redirect()->route('aluno.create');
        }
    }

    public function view($id)
    {
        try {
            $aluno = Aluno::find($id);
            return view('aluno.visualizar', ['aluno' => $aluno]);

        } catch (\Exception $e) {
            session()->flash('erro', 'Erro ao carregar: ' . $e->getMessage());
            return redirect()->route('aluno.index');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $aluno = Aluno::find($id);
            $aluno->nome = $request->input('nome');
            $aluno->endereco = $request->input('endereco');
            $aluno->matricula = $request->input('matricula');
            $aluno->save();

            session()->flash('msg', 'Atualizado com sucesso!');
            return redirect()->route('aluno.index');

        } catch (\Exception $e) {
            session()->flash('erro', 'Erro ao atualizar: ' . $e->getMessage());
            // CORRIGIDO: aluno.edit não existe, agora usa aluno.view
            return redirect()->route('aluno.view', ['id' => $id]);
        }
    }

    public function destroy($id)
    {
        try {
            $aluno = Aluno::find($id);
            $aluno->delete();

            session()->flash('msg', 'Registro excluído com sucesso!');
            return redirect()->route('aluno.index');

        } catch (\Exception $e) {
            session()->flash('erro', 'Erro ao excluir: ' . $e->getMessage());
            return redirect()->route('aluno.index');
        }
    }

    public function search(Request $request)
    {
        $filtro = trim((string) $request->input('filtro', ''));

        $alunos = Aluno::where('nome', 'like', "%{$filtro}%")
                       ->orderBy('id')
                       ->get();

        return view('aluno.lista', ['alunos' => $alunos, 'filtro' => $filtro]);
    }

    public function storeTelefone(Request $request, $id)
    {
        try {
            $telefone = new Telefone();
            $telefone->aluno_id = $id;
            $telefone->numero = $request->input('numero');
            $telefone->descricao = $request->input('descricao');
            $telefone->save();

            session()->flash('msg', 'Telefone adicionado com sucesso!');
            return redirect()->route('aluno.view', ['id' => $id]);

        } catch (\Exception $e) {
            session()->flash('erro', 'Erro ao adicionar telefone: ' . $e->getMessage());
            return redirect()->route('aluno.view', ['id' => $id]);
        }
    }

    public function destroyTelefone($id)
    {
        try {
            $telefone = Telefone::find($id);
            $aluno_id = $telefone->aluno_id;
            $telefone->delete();

            session()->flash('msg', 'Telefone excluído com sucesso!');
            return redirect()->route('aluno.view', ['id' => $aluno_id]);

        } catch (\Exception $e) {
            session()->flash('erro', 'Erro ao excluir telefone: ' . $e->getMessage());
            return redirect()->back();
        }
    }
}