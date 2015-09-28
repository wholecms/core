<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class PageSidebarMenuLangTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admin_page_sidebar_menu_langs')->insert(
            [
                //Turkish
                [
                    'admin_page_sidebar_menu_id' => "1",
                    'title' => "Genel Yapılandırma",
                    'lang'=>'tr',
                ],
                [
                    'admin_page_sidebar_menu_id' => "2",
                    'title' => "İstatistikler",
                    'lang'=>'tr',
                ],
                [
                    'admin_page_sidebar_menu_id' => "3",
                    'title' => "Sayfalar",
                    'lang'=>'tr',
                ],
                [
                    'admin_page_sidebar_menu_id' => "4",
                    'title' => "Ön Sayfa Yöneticisi",
                    'lang'=>'tr',
                ],
                [
                    'admin_page_sidebar_menu_id' => "5",
                    'title' => "İçerik Sayfa Yöneticisi",
                    'lang'=>'tr',
                ],
                [
                    'admin_page_sidebar_menu_id' => "6",
                    'title' => "Sayfa Yöneticisi",
                    'lang'=>'tr',
                ],
                [
                    'admin_page_sidebar_menu_id' => "7",
                    'title' => "Blok Yöneticisi",
                    'lang'=>'tr',
                ],
                [
                    'admin_page_sidebar_menu_id' => "8",
                    'title' => "İçerik Yöneticisi",
                    'lang'=>'tr',
                ],
                [
                    'admin_page_sidebar_menu_id' => "9",
                    'title' => "Araçlar",
                    'lang'=>'tr',
                ],
                [
                    'admin_page_sidebar_menu_id' => "10",
                    'title' => "Bileşenler",
                    'lang'=>'tr',
                ],
                [
                    'admin_page_sidebar_menu_id' => "11",
                    'title' => "Ön Belleği Temizle",
                    'lang'=>'tr',
                ],
                [
                    'admin_page_sidebar_menu_id' => "12",
                    'title' => "Hata Logları",
                    'lang'=>'tr',
                ],
                [
                    'admin_page_sidebar_menu_id' => "13",
                    'title' => "Giriş Logları",
                    'lang'=>'tr',
                ],
                [
                    'admin_page_sidebar_menu_id' => "14",
                    'title' => "İşlem Logları",
                    'lang'=>'tr',
                ],
                [
                    'admin_page_sidebar_menu_id' => "15",
                    'title' => "Eklentiler",
                    'lang'=>'tr',
                ],
                [
                    'admin_page_sidebar_menu_id' => "16",
                    'title' => "Kur & Kaldır",
                    'lang'=>'tr',
                ],
                [
                    'admin_page_sidebar_menu_id' => "17",
                    'title' => "Şablon Yöneticisi",
                    'lang'=>'tr',
                ],
                //English
                [
                    'admin_page_sidebar_menu_id' => "1",
                    'title' => "General Configuration",
                    'lang'=>'en',
                ],
                [
                    'admin_page_sidebar_menu_id' => "2",
                    'title' => "Statistics",
                    'lang'=>'en',
                ],
                [
                    'admin_page_sidebar_menu_id' => "3",
                    'title' => "Pages",
                    'lang'=>'en',
                ],
                [
                    'admin_page_sidebar_menu_id' => "4",
                    'title' => "Master Page",
                    'lang'=>'en',
                ],
                [
                    'admin_page_sidebar_menu_id' => "5",
                    'title' => "Content Page",
                    'lang'=>'en',
                ],
                [
                    'admin_page_sidebar_menu_id' => "6",
                    'title' => "Page Manager",
                    'lang'=>'en',
                ],
                [
                    'admin_page_sidebar_menu_id' => "7",
                    'title' => "Block Manager",
                    'lang'=>'en',
                ],
                [
                    'admin_page_sidebar_menu_id' => "8",
                    'title' => "Content Manager",
                    'lang'=>'en',
                ],
                [
                    'admin_page_sidebar_menu_id' => "9",
                    'title' => "Tools",
                    'lang'=>'en',
                ],
                [
                    'admin_page_sidebar_menu_id' => "10",
                    'title' => "Components",
                    'lang'=>'en',
                ],
                [
                    'admin_page_sidebar_menu_id' => "11",
                    'title' => "Clear Cache",
                    'lang'=>'en',
                ],
                [
                    'admin_page_sidebar_menu_id' => "12",
                    'title' => "Error Logs",
                    'lang'=>'en',
                ],
                [
                    'admin_page_sidebar_menu_id' => "13",
                    'title' => "Login Logs",
                    'lang'=>'en',
                ],
                [
                    'admin_page_sidebar_menu_id' => "14",
                    'title' => "Process Logs",
                    'lang'=>'en',
                ],
                [
                    'admin_page_sidebar_menu_id' => "15",
                    'title' => "Plug-ins",
                    'lang'=>'en',
                ],
                [
                    'admin_page_sidebar_menu_id' => "16",
                    'title' => "Setup & Uninstall",
                    'lang'=>'en',
                ],
                [
                    'admin_page_sidebar_menu_id' => "17",
                    'title' => "Template Manager",
                    'lang'=>'en',
                ]

            ]
        );
    }
}
