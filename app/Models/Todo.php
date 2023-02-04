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

    public static function doSearch($keyword,$tag_id)
    {
        $todo=Todo::all();
        $todo->where('content','LIKE',$keyword)->get();
        $todo->where('tag_id','LIKE',$tag_id)->get();
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
