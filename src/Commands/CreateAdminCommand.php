<?php
/**
 * Created by PhpStorm.
 * User: Furkan
 * Date: 14.9.2015
 * Time: 03:20
 */

namespace Whole\Core\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class CreateAdminCommand extends Command
{
    protected $name = 'whole:create-admin';
    protected $description = 'Whole CMS Create Admin';

    public function handle()
    {

        $this->info("Yonetim Paneline Erisebilmek Icin Yeni Yonetici Olustur");
        $name = $this->ask('Yonetici Adi');

        while(1)
        {
            $email = $this->ask('Yonetici E-Mail Adresi');
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $this->info("Lutfen Gecerli Bir Mail Adresi Giriniz!");
            }else
            {
                break;
            }
        }
        $password = $this->ask('Yonetici Sifresi');

        $userID = DB::table('users')->insertGetId([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt($password)
        ]);

        DB::table('user_role')->insert([
            'user_id'=>$userID,
            'role_id'=>'1',
        ]);

        $this->info("Yonetici Basariyla Olusturuldu");

    }

}
