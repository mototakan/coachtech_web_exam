<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use App\Http\Requests\TodoRequest;
use Illuminate\Support\Facades\Auth;


class TodoController extends Controller
{
    public function check(Request $request)
    {
        $text=['text'=>'ログインしてください。'];
        return view('auth',$text);
    }
    public function checkUser(Request $request)
    {
        $email=$request->email;
        $password=$request->password;
        if(Auth::attempt(['email'=>$email,
        'password'=> $password])){
            $text = Auth::user()->name.'さんがログインしました';
        }else{
            $text='ログインに失敗しました';
        }
        return view('auth',['text'=>$text]);
    }

    public function index(Request $request)
    {
        $user= Auth::user();
        $todos = Todo::paginate(4);
        $param = ['todos'=> $todos, 'user'=>$user];
        return view('index', $param);
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
        $todo = Todo::find($request->id);
        $form= $request->all();
        unset($form['_token']);
        Todo::where('id', $request->id)->update($form);
        return redirect('/');
    }
    public function destory(Request $request)
    {
        Todo::find($request->id)->delete();
        return redirect('/');
    }

}