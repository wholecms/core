<?php
/**
 * Created by PhpStorm.
 * User: Furkan
 * Date: 2.9.2015
 * Time: 16:18
 */

namespace Whole\Core\Http\Helpers;
use Whole\Core\Repositories\PageSidebarMenu\PageSidebarMenuRepository as PageSidebarMenuRepository;
use Whole\Core\Models\PageSidebarMenu;
class SidebarMenuHelper extends PageSidebarMenuRepository {

    public static function isActive($sidebars,$route,$id)
    {
        foreach($sidebars as $sidebar)
        {
            if ($sidebar->top_id==$id)
            {
                if ($sidebar->path!="")
                {
                    if (self::isActivePath($sidebar->path))
                    {
                        return true;
                    }
                }
            }
        }
        return false;
    }

    public static function isActivePath($path)
    {

        $paths = explode(',',$path);
        foreach($paths as $path)
        {
            if (\Request::is($path)){ return true;}
        }
        return false;
    }

}
