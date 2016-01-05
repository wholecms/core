<?php

namespace Whole\Core\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = ['title','meta_description','meta_keywords','rss_description','rss_title','status',
        'offline_message','template_id','logo','logo_title','logo_description','favicon','copyright',
        'google_analytics','admin_title','admin_footer','admin_logo','admin_login_logo'];

    public function template()
    {
        return $this->belongsTo('\Whole\Core\Models\Template');
    }
}
