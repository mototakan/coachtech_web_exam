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
    public function doSearch($keyword,$tag_id);
    
    public function isSelectedTag($tag_id)
    {
    if ($todo->id == $tag_id)
    {
        $todo->tag->selected()
    }else{
        $todo->tag=null
    }
    }
    
}
