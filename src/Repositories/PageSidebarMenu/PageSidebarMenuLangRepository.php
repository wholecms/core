<?php

/**
 * Created by PhpStorm.
 * User: Furkan
 * Date: 4.3.2016
 * Time: 22:24
 */

namespace Whole\Core\Repositories\PageSidebarMenuLang;
use Whole\Core\Repositories\Repository;
use Whole\Core\Models\PageSidebarMenuLang;



class PageSidebarMenuLangRepository extends Repository
{


    public function __construct(PageSidebarMenuLang $page_sidebar_menu_lang)
    {
        $this->model = $page_sidebar_menu_lang;
    }
}