<?php

namespace Whole\Core\Models;

use Illuminate\Database\Eloquent\Model;

class Block extends Model
{
    protected $fillable = ['name','title','status','title_visibility','list_embed','access','item_json'];

    public function detail()
    {
        return $this->belongsToMany('Whole\Core\Models\Block','block_detail','block_id','block_id')->withPivot('id','data_id','type','top_block_id')->withTimestamps();
    }

    public function blockDetail()
    {
        return $this->hasMany('Whole\Core\Models\BlockDetail','block_id','id');
    }
}
