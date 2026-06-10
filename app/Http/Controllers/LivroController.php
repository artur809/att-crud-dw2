<?php

namespace App\Http\Controllers;

use App\Models\Livro;
use Illuminate\Http\Request;

class LivroController extends Controller
{
    
    public function index()
    {
        $livros = Livro::all();
        return view('livro.lista', compact('livros'), ['filtro' => '']);
    }

    public function create()
    {
        return view('livro.cria');
    }

    public function store(Request $request)
    {
        try {
            Livro::create([
                'nome' => $request->input('nome'),
                'autor' => $request->input('autor'),
                'isbn' => $request->input('isbn'),
            ]);
            session()->flash('msg', 'Livro armazenado com sucesso!');
            return redirect()->route('livro.index');

        } catch (\Exception $e) {
            session()->flash('erro', 'Erro ao armazenar: ' . $e->getMessage());
            return redirect()->route('livro.create');
        }
    }

    public function destroy($id)
    {
        try {
            $idDescriptografado = decrypt($id);
            $livro = Livro::findOrFail($idDescriptografado);
            $livro->delete();

            session()->flash('msg', 'Livro apagado com sucesso!');
            return redirect()->route('livro.index');

        } catch (\Exception $e) {
            session()->flash('erro', 'Erro ao apagar livro: ' . $e->getMessage());
            return redirect()->route('livro.index');
        }
    }

    public function edit($id)
    {
        try {
            $idDescriptografado = decrypt($id);
            $livro = Livro::findOrFail($idDescriptografado);
            return view('livro.vizualizar', ['livro' => $livro]); // MUDOU AQUI

        } catch (\Exception $e) {
            session()->flash('erro', 'Erro ao carregar: ' . $e->getMessage());
            return redirect()->route('livro.index');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $idDescriptografado = decrypt($id);
            $livro = Livro::findOrFail($idDescriptografado);

            $livro->nome = $request->input('nome');
            $livro->autor = $request->input('autor');
            $livro->isbn = $request->input('isbn');
            $livro->save();

            session()->flash('msg', 'Atualizado com sucesso!');
            return redirect()->route('livro.index');

        } catch (\Exception $e) {
            session()->flash('erro', 'Erro ao atualizar: ' . $e->getMessage());
            return redirect()->route('livro.vizualizar', ['id' => $id]); // MUDOU AQUI
        }
    }

    public function search(Request $request)
    {
        $filtro = trim((string) $request->input('filtro', ''));

        $livros = Livro::where('nome', 'like', "%{$filtro}%")
                    ->orderBy('id', 'asc')
                    ->get();

        return view('livro.lista', compact('livros', 'filtro'));
    }
}