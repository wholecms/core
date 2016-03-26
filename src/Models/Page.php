<?php

namespace Whole\Core\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = ['content_page_id','menu_title','menu_description','menu_icon','menu_image','meta_title','meta_keywords','meta_description','title_visibility','status','access','link_target','content_embed','default','content_type','content_title','content_id','component_id','external_link','route'];

    public function contentPage()
    {
        return $this->belongsTo('Whole\Core\Models\ContentPage');
    }

    public function content()
    {
        return $this->belongsTo('Whole\Core\Models\Content');
    }

    public function component()
    {
        return $this->belongsTo('Whole\Core\Models\ComponentFile');
    }



//    public function file()
//    {
//        return $this->belongsToMany('Whole\Core\Models\Component','component_file','component_id')->withPivot('id','file','name');
//    }

}
