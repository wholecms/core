<?php
/**
 * Created by PhpStorm.
 * User: Furkan
 * Date: 2.9.2015
 * Time: 00:59
 */

namespace Whole\Core\Composers;
use Illuminate\Contracts\View\View;
use Whole\Core\Repositories\PageSidebarMenu\PageSidebarMenuRepository;

class SidebarMenuViewComposer
{
    protected $page_sidebar_menu;

    /**
     * @param PageSidebarMenuRepository $page_sidebar_menu
     */
    public function __construct(PageSidebarMenuRepository $page_sidebar_menu)
    {
        $this->page_sidebar_menu = $page_sidebar_menu;
    }

    /**
     * @param View $view
     */
    public function compose(View $view)
    {
        $view->with('sidebar_menus',$this->page_sidebar_menu->all());
    }

}