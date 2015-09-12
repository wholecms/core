<?php

namespace Whole\Core\Models;

use Illuminate\Database\Eloquent\Model;

class MasterPage extends Model
{
    protected $fillable = ['template_id','name'];

    public function hiddenFields()
    {
        return $this->belongsToMany('Whole\Core\Models\MasterPage','master_page_hidden_field','master_page_id')->withPivot('field_name')->withTimestamps();
    }

    public function fields()
    {
        return $this->belongsToMany('Whole\Core\Models\MasterPage','master_page_field','master_page_id')->withPivot('field')->withTimestamps();
    }

    public function template()
    {
        return $this->belongsTo('Whole\Core\Models\Template');
    }

    public function templateFields()
    {
        return $this->hasMany('Whole\Core\Models\TemplateField','template_id','template_id');
    }

}
