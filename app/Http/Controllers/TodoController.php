<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TodoController extends Controller
{
    public function index() {
        $todos = Todo::all();
        return view("todo.index", compact('todos'));
    }
    public function add() {
        $todos = Todo::all();
        return view("todo.form", compact('todos'));
    }
    public function edit() {
        return view("todo.form");
    }
    public function store(Request $request) {
        // dd($request->all());

        $todo = new Todo();
        $todo->task = $request->get('task');
        $todo->description = $request->get('description');

        $todo->save();
        $image_location = Storage::putFile('public/'. $todo->id, $request->file('image'));

        $todo->image_url = $image_location;
        $todo->save();
        return redirect("/todo");
    }
}