<?php

namespace Modules\Core\Admin;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Core\Requests\Admin\StoreUsersRequest;
use Modules\Core\Requests\Admin\UpdateUsersRequest;

class UsersController extends Controller
{

    public function __construct() {
        $this->middleware(['auth', 'permission:'.config('const.permissions.USERS_MANAGE')]);
    }

    /**
     * Display a listing of User.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('Core::admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating new User.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $roles = Role::get()->pluck('name', 'name');

        return view('Core::admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created User in storage.
     *
     * @param StoreUsersRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreUsersRequest $request)
    {
        $user = User::create($request->all());
        $roles = $request->input('roles') ? $request->input('roles') : [];
        $user->assignRole($roles);

        return redirect()->route('admin.users.index');
    }


    /**
     * Show the form for editing User.
     *
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(User $user)
    {
        $roles = Role::get()->pluck('name', 'name');

        return view('Core::admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update User in storage.
     *
     * @param UpdateUsersRequest $request
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateUsersRequest $request, User $user)
    {
        $user->update($request->all());
        $roles = $request->input('roles') ? $request->input('roles') : [];
        $user->syncRoles($roles);

        return redirect()->route('admin.users.index');
    }

    public function show(User $user)
    {

        $user->load('roles');

        return view('Core::admin.users.show', compact('user'));
    }

    /**
     * Remove User from storage.
     *
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(User $user)
    {

        $user->delete();

        return redirect()->route('admin.users.index');
    }

    /**
     * Delete all selected User at once.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function massDestroy(Request $request)
    {

        User::whereIn('id', request('ids'))->delete();

        return response()->noContent();
    }

}
