<?php

namespace App\Http\Controllers\AdminAuth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Auth;
class AuthController extends Controller
{
    use AuthenticatesAndRegistersUsers, ThrottlesLogins;
    protected $redirectTo = '/admin/login';
    protected $guard = 'admin';
    public function showLoginForm(){
    	if(Auth:guard('admin')->check){
    		redirect('admin/login');
    	}
    	return view('auth.login');
    }
    public function logout(){
    	Auth:guard('admin')->logout();
    	return redirect()->route('admin/login');
    }
    public function login(){
    	echo "123123";
    }
}
