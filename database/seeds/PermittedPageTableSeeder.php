<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;


class PermittedPageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permitted_pages')->insert(
            [
                [	
					'role_id'=>"1",
                    'path' => "admin",
                    'access'=>"1",
					'process'=>"1",
                ],
				[	
					'role_id'=>"1",
                    'path' => "admin/user",
                    'access'=>"1",
					'process'=>"1",
                ],
				[	
					'role_id'=>"1",
                    'path' => "admin/role",
                    'access'=>"1",
					'process'=>"1",
                ],
				[	
					'role_id'=>"1",
                    'path' => "admin/template",
                    'access'=>"1",
					'process'=>"1",
                ],
				[	
					'role_id'=>"1",
                    'path' => "admin/master-page",
                    'access'=>"1",
					'process'=>"1",
                ],
				[	
					'role_id'=>"1",
                    'path' => "admin/content-page",
                    'access'=>"1",
					'process'=>"1",
                ],
				[	
					'role_id'=>"1",
                    'path' => "admin/block",
                    'access'=>"1",
					'process'=>"1",
                ],
				[	
					'role_id'=>"1",
                    'path' => "admin/content",
                    'access'=>"1",
					'process'=>"1",
                ],
				[	
					'role_id'=>"1",
                    'path' => "admin/component",
                    'access'=>"1",
					'process'=>"1",
                ],
				[	
					'role_id'=>"1",
                    'path' => "admin/page",
                    'access'=>"1",
					'process'=>"1",
                ],
				[	
					'role_id'=>"1",
                    'path' => "admin/setting",
                    'access'=>"1",
					'process'=>"1",
                ],
				[	
					'role_id'=>"1",
                    'path' => "admin/permitted-page",
                    'access'=>"1",
					'process'=>"1",
                ],
				[	
					'role_id'=>"1",
                    'path' => "admin/user/*",
                    'access'=>"1",
					'process'=>"1",
                ],
				[	
					'role_id'=>"1",
                    'path' => "admin/role/*",
                    'access'=>"1",
					'process'=>"1",
                ],
				[	
					'role_id'=>"1",
                    'path' => "admin/template/*",
                    'access'=>"1",
					'process'=>"1",
                ],
				[	
					'role_id'=>"1",
                    'path' => "admin/master-page/*",
                    'access'=>"1",
					'process'=>"1",
                ],
				[	
					'role_id'=>"1",
                    'path' => "admin/content-page/*",
                    'access'=>"1",
					'process'=>"1",
                ],
				[	
					'role_id'=>"1",
                    'path' => "admin/block/*",
                    'access'=>"1",
					'process'=>"1",
                ],
				[	
					'role_id'=>"1",
                    'path' => "admin/content/*",
                    'access'=>"1",
					'process'=>"1",
                ],
				[	
					'role_id'=>"1",
                    'path' => "admin/component/*",
                    'access'=>"1",
					'process'=>"1",
                ],
				[	
					'role_id'=>"1",
                    'path' => "admin/page/*",
                    'access'=>"1",
					'process'=>"1",
                ],
				[	
					'role_id'=>"1",
                    'path' => "admin/setting/*",
                    'access'=>"1",
					'process'=>"1",
                ],
				[	
					'role_id'=>"1",
                    'path' => "admin/permitted-page/*",
                    'access'=>"1",
					'process'=>"1",
                ],
				[	
					'role_id'=>"1",
                    'path' => "admin/logout",
                    'access'=>"1",
					'process'=>"1",
                ],
				[	
					'role_id'=>"1",
                    'path' => "admin/logs",
                    'access'=>"1",
					'process'=>"1",
                ],
				[	
					'role_id'=>"1",
                    'path' => "admin/logs/*",
                    'access'=>"1",
					'process'=>"1",
                ],
				[	
					'role_id'=>"1",
                    'path' => "admin/analytics",
                    'access'=>"1",
					'process'=>"1",
                ],
				[	
					'role_id'=>"1",
                    'path' => "admin/analytics/*",
                    'access'=>"1",
					'process'=>"1",
                ],
				[	
					'role_id'=>"2",
                    'path' => "admin",
                    'access'=>"1",
					'process'=>"1",
                ],
				[	
					'role_id'=>"3",
                    'path' => "admin",
                    'access'=>"1",
					'process'=>"1",
                ],
               
            ]
        );

    }
}
