<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class PageSidebarMenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admin_page_sidebar_menus')->insert(
            [
                [
                    'id' => "1",
                    'top_id' => "0",
                    'icon' => "icon-settings",
                    'route' => "admin.setting.index",
                    'path' => "admin/setting,admin/setting/*",
                    'order' => "1",
                    'children_menu'=>'0',
                ],
                [
                    'id' => "2",
                    'top_id' => "0",
                    'icon' => "icon-pie-chart",
                    'route' => "admin.analytics.index",
                    'path' => "admin/analytics,admin/analytics/*",
                    'order' => "2",
                    'children_menu'=>'0',
                ],
                [
                    'id' => "3",
                    'top_id' => "0",
                    'icon' => "icon-docs",
                    'route' => "#",
                    'path' => "",
                    'order' => "3",
                    'children_menu'=>'1',
                ],
                [
                    'id' => "4",
                    'top_id' => "3",
                    'icon' => "icon-screen-desktop",
                    'route' => "admin.master_page.index",
                    'path' => "admin/master-page,admin/master-page/*",
                    'order' => "1",
                    'children_menu'=>'0',
                ],
                [
                    'id' => "5",
                    'top_id' => "3",
                    'icon' => "icon-doc",
                    'route' => "admin.content_page.index",
                    'path' => "admin/content-page,admin/content-page/*",
                    'order' => "2",
                    'children_menu'=>'0',
                ],
                [
                    'id' => "6",
                    'top_id' => "3",
                    'icon' => "icon-directions",
                    'route' => "admin.page.index",
                    'path' => "admin/page,admin/page/*",
                    'order' => "3",
                    'children_menu'=>'0',
                ],
                [
                    'id' => "7",
                    'top_id' => "0",
                    'icon' => "icon-grid",
                    'route' => "admin.block.index",
                    'path' => "admin/block,admin/block/*",
                    'order' => "4",
                    'children_menu'=>'0',
                ],
                [
                    'id' => "8",
                    'top_id' => "0",
                    'icon' => "icon-pencil",
                    'route' => "admin.content.index",
                    'path' => "admin/content,admin/content/*",
                    'order' => "5",
                    'children_menu'=>'0',
                ],
                [
                    'id' => "9",
                    'top_id' => "0",
                    'icon' => "icon-star",
                    'route' => "#",
                    'path' => "",
                    'order' => "7",
                    'children_menu'=>'1',
                ],
                [
                    'id' => "10",
                    'top_id' => "0",
                    'icon' => "icon-puzzle",
                    'route' => "#",
                    'path' => "",
                    'order' => "6",
                    'children_menu'=>'1',
                ],
                [
                    'id' => "11",
                    'top_id' => "9",
                    'icon' => "icon-star",
                    'route' => "admin.cache.clear",
                    'path' => "admin/cache/clear,admin/cache/clear/*",
                    'order' => "1",
                    'children_menu'=>'0',
                ],
                [
                    'id' => "12",
                    'top_id' => "9",
                    'icon' => "icon-star",
                    'route' => "admin.logs.errors",
                    'path' => "admin/logs/errors,admin/logs/errors/*",
                    'order' => "2",
                    'children_menu'=>'0',
                ],
                [
                    'id' => "13",
                    'top_id' => "9",
                    'icon' => "icon-star",
                    'route' => "admin.logs.login",
                    'path' => "admin/logs/login,admin/logs/login/*",
                    'order' => "3",
                    'children_menu'=>'0',
                ],
                [
                    'id' => "14",
                    'top_id' => "9",
                    'icon' => "icon-star",
                    'route' => "admin.logs.process",
                    'path' => "admin/logs/process,admin/logs/process/*",
                    'order' => "4",
                    'children_menu'=>'0',
                ],
                [
                    'id' => "15",
                    'top_id' => "0",
                    'icon' => "icon-social-dropbox",
                    'route' => "#",
                    'path' => "",
                    'order' => "8",
                    'children_menu'=>'1',
                ],
                [
                    'id' => "16",
                    'top_id' => "15",
                    'icon' => "icon-cloud-upload",
                    'route' => "admin.component.index",
                    'path' => "admin/component,admin/component/*",
                    'order' => "1",
                    'children_menu'=>'0',
                ],
                [
                    'id' => "17",
                    'top_id' => "15",
                    'icon' => "icon-layers",
                    'route' => "admin.template.index",
                    'path' => "admin/template,admin/template/*",
                    'order' => "2",
                    'children_menu'=>'0',
                ]
            ]
        );


    }
}
