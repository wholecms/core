<?php

namespace Whole\Core\Models;

use Illuminate\Database\Eloquent\Model;

class ContentPageField extends Model
{
    protected $table = 'content_page_field';
    protected $fillable = ['content_page_id','field'];

    public function fieldsDetails()
    {
        return $this->belongsToMany('Whole\Core\Models\ContentPageField','content_page_field_detail','content_page_field_id','content_page_field_id','content_page_field_id')->withPivot('data_id','type')->withTimestamps();
    }

    public function details()
    {
        return $this->hasMany('Whole\Core\Models\ContentPageFieldDetail','content_page_field_id','id');
    }
}
