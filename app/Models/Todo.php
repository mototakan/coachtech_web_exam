<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;
    protected $fillable =['content'];
    protected $guarded =['id'];
    
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function tag()
    {
        return $this->belongsTo('App\Models\Tag');
    }
    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
    $todo = Todo::where('content', 'LIKE BINARY',"%{$request->input}%")->first();
    $param = [
      'input' => $request->input,
      'todo' => $todo
    ];
    return view('find', $param);
    }
}
