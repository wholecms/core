<?php

namespace Whole\Core\Models;

use Illuminate\Database\Eloquent\Model;

class ContentPageFieldDetail extends Model
{
    protected $table = 'content_page_field_detail';


    public function content()
    {
        return $this->belongsTo('Whole\Core\Models\Content','data_id','id');
    }

    public function block()
    {
        return $this->belongsTo('Whole\Core\Models\Block','data_id','id');
    }

    public function component()
    {
        return $this->belongsTo('Whole\Core\Models\ComponentFile','data_id','id');
    }
}
