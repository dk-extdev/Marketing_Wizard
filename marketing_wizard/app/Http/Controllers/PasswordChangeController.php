<?php

namespace App\Http\Controllers;

use App\Title;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;
use App\User;
use App\Admin;

class PasswordChangeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function getChangePassword()
    {
        $title = Title::first();
        $data['site_title'] = $title->title;
        return view('password.reset',$data);
    }
    public function postChangePassword(Request $request)
    {

        $this->validate($request, [
            'current_password' =>'required',
            'password' => 'required|min:5|confirmed'
        ]);
        $c_password = Auth::guard('admin')->user()->password;
        $c_id = Auth::guard('admin')->user()->id;

        $user = Admin::findOrFail($c_id);

        if(Hash::check($request->current_password, $c_password)){

            $password = Hash::make($request->password);
            $user->password = $password;
            $user->save();
            Session::flash('success','Password Changed Successfully');
            return redirect()->route('password_form');
        }else{
            Session::flash('success','Current Password Not Match');
            return redirect()->route('password_form');
        }

    }
}
