<?php
/**
 * Created by PhpStorm.
 * User: Furkan
 * Date: 31.8.2015
 * Time: 02:24
 */

namespace Whole\Core\Repositories\PageSidebarMenu;
use Whole\Core\Repositories\Repository;
use Whole\Core\Models\PageSidebarMenu;



class PageSidebarMenuRepository extends Repository
{


    public function __construct(PageSidebarMenu $page_sidebar_menu)
    {
        $this->model = $page_sidebar_menu;
    }

    public function all()
    {
        return $this->model->oldest('order')->get();
    }



}