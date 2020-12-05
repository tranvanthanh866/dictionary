<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        $data = [
            ['name' => config('const.permissions.USERS_MANAGE')],
            ['name' => config('const.permissions.ADMIN')],
            ['name' => config('const.permissions.USER')],
        ];
        foreach ($data as $value) {
            Permission::create($value);
        }

    }
}
