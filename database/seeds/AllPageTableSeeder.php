<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class AllPageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('all_pages')->insert(
            [
                [
                    'id'=>'1',
                    'path'=>'admin',

                ],
                [
                    'id'=>'2',
                    'path'=>'admin/user',

                ],
                [
                    'id'=>'3',
                    'path'=>'admin/role',

                ],
                [
                    'id'=>'4',
                    'path'=>'admin/template',

                ],
                [
                    'id'=>'5',
                    'path'=>'admin/master-page',

                ],
                [
                    'id'=>'6',
                    'path'=>'admin/content-page',

                ],
                [
                    'id'=>'7',
                    'path'=>'admin/block',

                ],
                [
                    'id'=>'8',
                    'path'=>'admin/content',

                ],
                [
                    'id'=>'9',
                    'path'=>'admin/component',

                ],
                [
                    'id'=>'10',
                    'path'=>'admin/page',

                ],
                [
                    'id'=>'11',
                    'path'=>'admin/setting',

                ],
                [
                    'id'=>'12',
                    'path'=>'admin/permitted-page',

                ],
                [
                    'id'=>'13',
                    'path'=>'admin/user/*',

                ],
                [
                    'id'=>'14',
                    'path'=>'admin/role/*',

                ],
                [
                    'id'=>'15',
                    'path'=>'admin/template/*',

                ],
                [
                    'id'=>'16',
                    'path'=>'admin/master-page/*',

                ],
                [
                    'id'=>'17',
                    'path'=>'admin/content-page/*',

                ],
                [
                    'id'=>'18',
                    'path'=>'admin/block/*',

                ],
                [
                    'id'=>'19',
                    'path'=>'admin/content/*',

                ],
                [
                    'id'=>'20',
                    'path'=>'admin/component/*',

                ],
                [
                    'id'=>'21',
                    'path'=>'admin/page/*',

                ],
                [
                    'id'=>'22',
                    'path'=>'admin/setting/*',

                ],
                [
                    'id'=>'23',
                    'path'=>'admin/permitted-page/*',

                ],
                [
                    'id'=>'24',
                    'path'=>'admin/logout',

                ],
                [
                    'id'=>'25',
                    'path'=>'admin/logs',

                ],
                [
                    'id'=>'26',
                    'path'=>'admin/logs/*',

                ],
                [
                    'id'=>'27',
                    'path'=>'admin/analytics',

                ],
                [
                    'id'=>'28',
                    'path'=>'admin/analytics/*',

                ],
				[
                    'id'=>'28',
                    'path'=>'admin/cache/clear',

                ],
				[
                    'id'=>'28',
                    'path'=>'admin/cache/clear/*',

                ],
            ]
        );


    }
}
