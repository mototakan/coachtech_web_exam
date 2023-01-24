<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use App\Http\Requests\TodoRequest;


class TodoController extends Controller
{
    public function index(Request $request)
    {
        $todos = Todo::all();
        return view('index', ['todos'=> $todos]);
    }
    public function store(TodoRequest $request)
    {
        $new_todo=new Todo();
        $form= $request->all();
        unset($form['_token']);
        Todo::create($form);
        return redirect('/');
        
    }
    public function update(TodoRequest $request)
    {
        $todos = Todo::find($request->id);
        $form= $request->all();
        unset($form['_token']);
        Todo::create($form);
        return redirect('/');
    }
    public function destory(Request $request)
    {
        Todo::find($request->id)->delete();
        return redirect('/');
    }

}