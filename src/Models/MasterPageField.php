<?php

namespace Whole\Core\Models;

use Illuminate\Database\Eloquent\Model;

class MasterPageField extends Model
{
    protected $table = 'master_page_field';
    protected $fillable = ['master_page_id','field'];

    public function fieldsDetails()
    {
        return $this->belongsToMany('Whole\Core\Models\MasterPageField','master_page_field_detail','master_page_field_id','master_page_field_id','master_page_field_id')->withPivot('data_id','type')->withTimestamps();
    }

    public function details()
    {
        return $this->hasMany('Whole\Core\Models\MasterPageFieldDetail','master_page_field_id','id');
    }


}
