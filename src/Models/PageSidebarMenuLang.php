<?php

namespace Whole\Core\Models;

use Illuminate\Database\Eloquent\Model;

class PageSidebarMenuLang extends Model
{
    protected $table = 'admin_page_sidebar_menu_langs';
    protected $fillable = ['admin_page_sidebar_menu_id','title','lang'];
	
	
}
