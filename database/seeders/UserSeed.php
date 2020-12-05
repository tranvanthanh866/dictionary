<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data_user = [
            [
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'password' => bcrypt('admin123')
            ],
        ];
        foreach ($data_user as $user) {
            User::create($user);
        }

        $administrator = User::where('email','admin@admin.com')->first();
        $administrator->assignRole(config('const.roles.ADMINISTRATOR'));
    }
}
