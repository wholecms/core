<?php

namespace Whole\Core\Models;

use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    protected $fillable = ['name','folder','description','scaffold'];

    public function templateFields()
    {
        return $this->hasMany('Whole\Core\Models\TemplateField','template_id','id');
    }
	
	public function fields()
    {
		return $this->belongsToMany('Whole\Core\Models\Template','template_fields','template_id')->withPivot('template_id','name','field')->withTimestamps();
    }
}
