<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::orderBy('created_at', 'desc')->paginate(10);
        return view('todos.index', compact('todos'));
    }

    public function list()
    {
        $todos = Todo::orderBy('created_at', 'desc')->get();
        return view('todos.list', compact('todos'));
    }

    public function store(Request $request)
    {
        $data = $request->validate($this->rule());
        Todo::create($data);
        return redirect()->back()->with('success', 'Succesfully created');
    }

    public function update(Todo $todo, Request $request)
    {
        $data = $request->validate($this->rule());
        $todo->update($data);
        return redirect()->back()->with('success', 'Succesfully updated');
    }

    public function destroy(Todo $todo)
    {
        $todo->delete();
        return redirect()->back()->with('success', 'Succesfully deleted');

    }

    public function rule()
    {
        return [
            "name" => "string",
            "description" => "string",
        ];
    }
}
