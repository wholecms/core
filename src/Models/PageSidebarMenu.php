<?php

namespace Whole\Core\Models;

use Illuminate\Database\Eloquent\Model;

class PageSidebarMenu extends Model
{
    protected $table = 'admin_page_sidebar_menus';
    protected $fillable = ['top_id','icon','route','path','order','children_menu'];
	
	public function lang()
	{
		return $this->hasOne('Whole\Core\Models\PageSidebarMenuLang','admin_page_sidebar_menu_id')->where('lang',\App::getLocale());
	}
}
