<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use Image;
use App\User;

class UserController extends Controller
{
    public function profile()
    {
        return view('profile', array('user' => Auth::user()));
    }

    public function update(Request $request)
    {
        $id=Auth::id();
        $alter=User::find($id)->update($request->toArray());
        if($request->hasFile('profile_pic')) {
            $update= $request->file('profile_pic');
            $filename=time() . '.' . $update->getClientOriginalExtension();
            Image::make($update)->resize(300, 300)->save(public_path('/uploads/' . $filename));

            $user=  Auth::user();
            $user->profile_pic =$filename;
            $user->save();
        }
        return view('profile', array('user' => Auth::user()));
    }

    public function updatePassword(Request $request)
    {
        dd($request->toArray());
    }
}
