<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;


class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert(
            [
                ['id'=>"1",
                    'role_name' => "Yönetici",
                    'permits'=>true,
                ],
                [
                    'id'=>"2",
                    'role_name' => "Editör",
                    'permits'=>true,
                ],
                [
                    'id'=>"3",
                    'role_name' => "Üye",
                    'permits'=>false,
                ]
            ]
        );

//        DB::table('user_role')->insert([
//            'user_id'=>'1',
//            'role_id'=>'1',
//        ]);
    }
}
