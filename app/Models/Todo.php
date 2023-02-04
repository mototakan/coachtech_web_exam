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

    $keyword = $request->input('content');
    public function doSearch($keyword,$tag_id)
    {
        Todo::find($keyword,$request->tag_id);
    }

    public function isSelectedTag($tag_id)
    {
    if ($this->id == $tag_id)
    {
        return $this->selected;
    }else{
        return selected('')
    }
    }
    
}
