<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;



class TodoController extends Controller
{
    public function index(Request $request)
    {
        $todos = Todo::all();
        return view('index', ['todos'=> $todos]);
    }
    public function post(Request $request)
    {
        $content = $request->content;
        $todos = ['content' => $content];
        return view('index',$todos);
    }

}