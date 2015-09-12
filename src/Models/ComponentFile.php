<?php

namespace Whole\Core\Models;

use Illuminate\Database\Eloquent\Model;

class ComponentFile extends Model
{
    protected $table = 'component_file';
    protected $fillable = ['component_id','name','file'];


    public function component()
    {
        return $this->belongsTo('Whole\Core\Models\Component');
    }

}
