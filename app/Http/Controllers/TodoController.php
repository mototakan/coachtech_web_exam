<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use App\Http\Requests\TodoRequest;
use Illuminate\Support\Facades\Auth;


class TodoController extends Controller
{
    
    public function find()
    {
        $todos=['input' => ''];
        $user= Auth::user();
        $tags=Tag::all();
        return view('search',[$user,$todos,$tags]);
    }

    public function search(Request $request)
    {
        $user= Auth::user();
        $tags=Tag::all();
        $keyword= $request->keyword;
        $tag_id= $request->tag_id;
        return doSearch($keyword,$tag_id);
        return view('search',[$user,$todos,$tags]);
    }

    public function index(Request $request)
    {
        $todo=Todo::all();
        $user= Auth::user();
        $param = ['todos'=> $todos, 'user'=>$user];
        return view('index', $param);
        $tags=Tag::all();
        return view('index',['tag'=>$tags]);
    }
    public function create(TodoRequest $request)
    {
        $content= $request->content;
        $tag_id= $request->tag_id;
        $todo=[
            'content'=>$content,
            'tag_id'=>$tag_id
        ];
        Todo::create($todo);
        return redirect('/');
        
    }
    public function update(TodoRequest $request)
    {
        $content= $request->content;
        $tag_id= $request->tag_id;
        $todo=[
            'content'=>$content,
            'tag_id'=>$tag_id
        ];
        Todo::where('id', $request->id)->update($todo);
        return redirect('/');
    }
    public function delete(Request $request)
    {
        Todo::find($request->id)->delete();
        return redirect('/');
    }

}