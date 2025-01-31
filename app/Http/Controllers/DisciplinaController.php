<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Disciplina;


class DisciplinaController extends Controller
{
    public function index()
    {
        $disciplinas = Disciplina::all();
        return view('disciplinas.index', compact('disciplinas'));
    }

    public function create()
    {
        return view('disciplinas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string',
            'cargaHorario' => 'required|integer',
            'semestre' => 'required|integer',
        ]);

        Disciplina::create($request->all());
        return redirect()->route('disciplinas.index')->with('success', 'Disciplina criada com sucesso.');
    }

    public function edit(Disciplina $disciplina)
    {
        return view('disciplinas.edit', compact('disciplina'));
    }

    public function update(Request $request, Disciplina $disciplina)
    {
        $request->validate([
            'nome' => 'required|string',
            'cargaHorario' => 'required|integer',
            'semestre' => 'required|integer',
        ]);

        $disciplina->update($request->all());
        return redirect()->route('disciplinas.index')->with('success', 'Disciplina atualizada com sucesso.');
    }

    public function destroy(Disciplina $disciplina)
    {
        $disciplina->delete();
        return redirect()->route('disciplinas.index')->with('success', 'Disciplina deletada com sucesso.');
    }
}
