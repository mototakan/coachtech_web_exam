<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


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

public static function doSearch($keyword)

    {
    $todo=Todo::all();
    $todo=$todo->where('content','LIKE',$keyword);
    return $todo;
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
