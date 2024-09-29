<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Enums\RoleEnum;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Administrator = User::firstOrCreate([
            'email' => 'admin@gmail.com'
        ],[
            'name' => 'Administrator',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
            'email_verified_at' => date('Y-m-d H:i:s'),
        ]);

        $Administrator->assignRole(RoleEnum::ADMINISTRATOR);

        $User = User::firstOrCreate([
            'email' => 'user@gmail.com'
        ],[
            'name' => 'User',
            'email' => 'user@gmail.com',
            'password' => bcrypt('password'),
            'email_verified_at' => date('Y-m-d H:i:s'),
        ]);

        $User->assignRole(RoleEnum::USER);
    }
}
