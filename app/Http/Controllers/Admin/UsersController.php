<?php

namespace App\Http\Controllers\Admin;

use App\Role;
use App\User;
use Gate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:dashboardPermission');
    }
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function edit(User $user)
    {
        if(Gate::denies('edit-user')){
            return redirect()->route('admin.users.index')->with('warning', 'You not allowed to perform this action');
        }
       $roles = Role::all();
       return view('admin.users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
      $user->roles()->sync($request->roles);
      return redirect()->route('admin.users.index')->with('success', 'You\'ve Succesfffully Updated user');
    }

   
    public function destroy(User $user)
    {
        if(Gate::denies('delete-user')){
            return redirect()->route('admin.users.index')->with('warning', 'You not allowed to perform this action');
        }
       $user->roles()->detach();
       $user->delete();
       return redirect()->route('admin.users.index')->with('success', 'You\'ve Succesfffully deleted user');
    }
}
