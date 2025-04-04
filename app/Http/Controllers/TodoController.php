<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    public function todo()
    {
    $valeursFiltre = Todo::where('texte', "YOLO")->orderBy('id')->take(10)->get();

    $valeursEnBase = Todo::all();
     return view('Todo', ['todos' => $valeursEnBase,
                          'filters' => $valeursFiltre
                         ]);
    }

    public function index()
    {
    $valeursEnBase = Todo::all();
     return view('index', ['todos' => $valeursEnBase]);
    }

    public function addTodo(Request $request)
    {
        $request->validate([
            'texte' => 'required|string|max:255',
            'termine' => 'required|boolean'
        ]);

        Todo::create([
            'texte' => $request->texte,
            'termine' => $request->termine
        ]);

        return redirect('/todo');
    }

    public function markAsDone($id)
    {
        $todo = Todo::find($id);
    
        if ($todo) {
            $todo->termine = true;
            $todo->save();  
        }
    
        return view('updateTodo', ['todos' => Todo::all()]);
        return redirect('/todo');
    }
    
    public function deleteTodo($id)
    {
        $todo = Todo::find($id);

        if ($todo) {
            if ($todo->termine) {
                $todo->delete();
                return redirect('/todo')->with('success', 'La tâche a été supprimée.');
            } else {
                return redirect('/todo')->with('error', 'Impossible de supprimer une tâche non terminée.');
            }
        }

        return redirect('/todo')->with('error', 'Tâche non trouvée.');
    }

}
   