<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['web', 'auth', 'permission:' . config('const.permissions.ADMIN')], 'prefix' => env('ADMIN_DIR', 'admin'), 'as' => 'admin.'], function () {
    Route::group(['namespace' => 'Modules\Core\Admin'], function () {
        Route::middleware(['permission:' . config('const.permissions.USERS_MANAGE')])->group(function () {
            Route::resource('permissions', 'PermissionsController');
            Route::delete('permissions_mass_destroy', 'PermissionsController@massDestroy')->name('permissions.mass_destroy');
            Route::resource('roles', 'RolesController');
            Route::delete('roles_mass_destroy', 'RolesController@massDestroy')->name('roles.mass_destroy');
            Route::resource('users', 'UsersController');
            Route::delete('users_mass_destroy', 'UsersController@massDestroy')->name('users.mass_destroy');
        });

        // Change Password Routes...
        Route::get('change_password', 'ChangePasswordController@showChangePasswordForm')->name('change_password');
        Route::patch('change_password', 'ChangePasswordController@changePassword')->name('change_password');

    });
});

