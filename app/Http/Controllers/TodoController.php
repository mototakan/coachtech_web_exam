<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use App\Http\Requests\TodoRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Tag;


class TodoController extends Controller
{
    
    public function find(Request $request)
    {
        $todos=[];
        $user= Auth::user();
        $tags=Tag::all();
        $keyword= $request->keyword;
        return view('search',[
            'user'=>$user,
            'todos'=>$todos,
            'tags'=>$tags,
            'keyword'=>$keyword]);
    }

    public function search(Request $request)
    {
        $user= Auth::user();
        $tags=Tag::all();
        $keyword= $request->keyword;
        $tag_id= $request->tag_id;
        $todos=Todo::doSearch($keyword,$tag_id);
        return view('search',[
            'user'=>$user,
            'todos'=>$todos,
            'tags'=>$tags,
            'keyword'=>$keyword]);
    }

    public function index(Request $request)
    {
        $todo=Todo::all();
        $user= Auth::user();
        $param = ['todos'=> $todo, 'user'=>$user];
        return view('index', $param);
        $tags=Tag::all();
        return view('index',['tag'=>$tags]);
    }
    public function create(TodoRequest $request)
    {
        $content= $request->content;
        $tag_id= $request->tag_id;
        $user_id= $request->user_id;
        $todo=[
            'content'=>$content,
            'tag_id'=>$tag_id,
            'user_id'=>$user_id
        ];
        
        Todo::create($todo);
        return redirect('/');
        $auths = Auth::user();
        return view('create', [ 'auths' => $auths ]);
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