<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $this->call(PageSidebarMenuTableSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(AllPageTableSeeder::class);
//        Model::reguard();

    }
}
