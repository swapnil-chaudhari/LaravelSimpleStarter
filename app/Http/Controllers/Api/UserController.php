<?php

namespace App\Http\Controllers\Api;

use App\User;
use App\Role;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;

class UserController extends ApiController
{
    public function index()
    {
        $users = User::with('roles')->get();

        return[
            'users' => $users->toArray(),
        ];
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
          'name'             => 'required|max:225',
          'email'            => 'required|email',
          'password'         => 'required|min:6|',
          'role'             => 'required|not_in:0',
        ]);

        if($validator->fails()){
          $errors = $validator->errors()->toArray();
          return [
            'errors' => $errors,
          ];
        }

        $user = User::firstOrCreate([
          'name' => $request->name,
          'email' => $request->email,
          'password' => bcrypt($request->password),
        ]);

        $role = Role::findOrFail($request->role);

        $user->roles()->attach($role->id);

        return [
          'user' => true,
        ];

    }

    public function update(Request $request)
    {

      $validator = Validator::make($request->all(), [
        'name'     => 'required|max:225',
        'email'    => 'required|email',
        'password' => 'min:6',
        'role_id'  => 'required|not_in:0',
      ]);

      if($validator->fails()){
        $errors = $validator->errors()->toArray();
        return [
          'errors' => $errors,
        ];
      }

      $user = User::find($request->id);
      $user->name = $request->name;
      $user->email = $request->email;
      $user->password = bcrypt($request->password);
      $user->save();

      $user->roles()->sync([
        'role_id' => $request->role_id,
      ]);

      return [
        'user' => true,
      ];
    }

    public function delete(Request $request)
    {
      $user = User::find($request->id);
      $user->delete();
    }

    public function getRoles()
    {
      $roles = Role::all()->toArray();

      return[
          'roles' => $roles,
      ];
    }
}
