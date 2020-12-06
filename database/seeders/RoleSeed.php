<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => config('const.roles.ADMINISTRATOR')],
            ['name' => config('const.roles.ADMIN')],
            ['name' => config('const.roles.USER')],

        ];
        foreach ($data as $value ){
            Role::create($value);
        }
        $role_administrator = Role::findByName('administrator');
        $role_administrator->givePermissionTo(config('const.permissions.USERS_MANAGE'));
        $role_administrator->givePermissionTo(config('const.permissions.ADMIN'));

    }
}
