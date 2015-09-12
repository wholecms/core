<?php

namespace Whole\Core\Models;

use Illuminate\Database\Eloquent\Model;

class Component extends Model
{
    protected $fillable = ['name','folder','description'];


    public function file()
    {
        return $this->belongsToMany('Whole\Core\Models\Component','component_file','component_id')->withPivot('id','file','name');
    }

    public function component()
    {
        return $this->belongsTo('Whole\Core\Models\Component','component_id','id');
    }

}
