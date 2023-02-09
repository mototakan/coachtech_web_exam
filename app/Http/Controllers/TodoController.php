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
        $todo = Todo::where('user_id', \Auth::user()->id)->get();
        $todos=[];
        $user= Auth::user();
        $tags=$request->input('tags');
        $tag_id= $request->tag_id;
        $keyword= $request->content;
        return view('search',[
            'user'=>$user,
            'todos'=>$todos,
            'tags'=>$tags,
            'keyword'=>$keyword]);
            
    }

    public function search(Request $request)
    {
        $todo = Todo::where('user_id', \Auth::user()->id)->get();
        $user= Auth::user();
        $keyword= $request->content;
        $tag_id= $request->tag_id;
        $tags = Todo::where('tag_id',"{$request->input}")->get();
        $param = [
        'input' => $request->input
        ];
        return view('search',$param);
        $todos=Todo::doSearch($keyword,$tag_id);
        return view('search',[
            'user'=>$user,
            'todos'=>$todos,
            'tags'=>$tags,
            'keyword'=>$keyword]);
    }

    public function index(Request $request)
    {
        $todo = Todo::where('user_id', \Auth::user()->id)->get();
        $user= Auth::user();
        $param = ['todos'=> $todo, 'user'=>$user];
        return view('index', $param);
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