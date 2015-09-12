<?php

namespace Whole\Core\Models;

use Illuminate\Database\Eloquent\Model;

class PageSidebarMenu extends Model
{
    protected $table = 'admin_page_sidebar_menus';
    protected $fillable = ['top_id','title','icon','route','path','order','children_menu'];
}
