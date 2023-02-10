<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class Todo extends Model
{
    use HasFactory;
    protected $guarded =['id'];
    
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function tag()
    {
        return $this->belongsTo('App\Models\Tag');
    }

public static function doSearch($keyword,$tag_id)

    {
    $todo = self::query();
    if (isset($keyword)) {
        $todo->where('content', 'Like', "%{$keyword}%");
    }
    if (isset($tag_id)) {
        $todo->where('tag_id', '=', $tag_id);
    }
    $user_id = Auth::id();
    $todo->where('user_id', '=', $user_id)->get();
    $todos = $todo->get();
    $todos->where('user_id', '=', $user_id);
    return $todos;
    }


    public function isSelectedTag($tag_id)
    {
    if ($this->tag_id == $tag_id)
    {
        return 'selected';
    }else{
        return '';
    }
    }
    
}
