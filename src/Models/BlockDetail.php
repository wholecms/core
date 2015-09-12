<?php

namespace Whole\Core\Models;

use Illuminate\Database\Eloquent\Model;

class BlockDetail extends Model
{
    protected $table = 'block_detail';
    protected $fillable = ['block_id','top_block_id','data_id','type'];

    public function children()
    {
        return $this->hasMany('Whole\Core\Models\BlockDetail','top_block_id');
    }

    public function pageDetail()
    {
        return $this->belongsTo('Whole\Core\Models\Page','data_id','id');
    }

    public function contentDetail()
    {
        return $this->belongsTo('Whole\Core\Models\Content','data_id','id');
    }

    public function blockDetail()
    {
        return $this->belongsTo('Whole\Core\Models\Block','data_id','id');
    }

    public function componentDetail()
    {
        return $this->belongsTo('Whole\Core\Models\ComponentFile','data_id','id');
    }

}
