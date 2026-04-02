<?php

namespace App\Http\Controllers;

use App\Models\Tarefa;
use Illuminate\Http\Request;
use App\Models\Usuario;
class tarefaController extends Controller
{
    public function index()
    {
        $tarefas = Tarefa::with('usuario')->orderByDesc('id')->get();
        return view('tarefas.index', compact('tarefas'));
    }

    public function create()
    {
        $usuarios = Usuario::all();
        return view('tarefas.create', compact('usuarios'));
    }


    public function store(Request $request)
    {
        $request->validate([

        'titulo' => ['required', 'string', 'max:255'],
        'descricao' => ['nullable', 'string'],
        'status' => ['required', 'string'],
        'prioridade' => ['required', 'string'],
        'data_entrega' => ['nullable', 'date']
        ]);

        Tarefa::create($request->all());
        return redirect()->route('tarefas.index');
    }

    public function show(Tarefa $tarefa)
    {
        
    }

    public function edit(Tarefa $tarefa)
    {
        $usuarios = Usuario::all();
        return view('tarefas.edit', compact('tarefa', 'usuarios'));
    }

    public function update(Request $request, Tarefa $tarefa)
    {
        $request->validate9([
            'usuario_id' => ['required', 'exists:usuarios,id'],
            'titulo' => ['required', 'string', 'max:255'],
            'status' => ['required', 'string'],
            'prioridade' => ['required', 'string'],
        ])
    }

    public function destroy(Tarefa $tarefa)
    {
        $tarefa->delete();
        return redirect()->route('tarefas.index')->with('sucesso', 'Tarefa excluida!');
    }
}
