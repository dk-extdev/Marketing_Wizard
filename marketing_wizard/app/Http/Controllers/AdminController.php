<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use App\Footer;
use App\Title;
use App\User;

use App\Http\Requests;
use App\Contact;
use App\Logo;
use App\SocialIcon;
use Illuminate\Support\Facades\Hash;
use Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller;
class AdminController extends Controller
{
    //
    public function __construct()
    {
        //$this->middleware('auth:admin');
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
    }
    /*public function index(){
    	return "123";
    	//return view('admin.login');
    }*/
    public function getLogin()
    {
      $admin_id_loggedin = Session::get('admin_id_loggedin');
        if($admin_id_loggedin != ''){
            return redirect()->action(
                'AdminDashboardController@dashboard'
            );
			
			//Session::put('admin_id_loggedin', '');
			//Session::remove();
			//return view('admin.dashboard');
        }else{
            return view('admin.login');
        }
    }
    public function postLogin(Request $request)
    {
        if (Auth::guard('admin')->attempt([
            'email' => $request->adminemail,
            'password' => $request->adminpassword,
        ])){
            $admin_exists = Admin::where('email', '=', $request->adminemail)->first();
        	var_dump($admin_exists);
            Session::flash('success', 'Log In Successfully');
            Session::put('admin','admin');
            Session::put('admin_id_loggedin',$admin_exists->id);
            return redirect()->action('AdminDashboardController@dashboard');
        }

        $request->session()->flash('message', 'Login incorrect!');
        return redirect()->back();
    }
    
    public function logout()
    {
        Auth::guard('admin')->logout();
        session()->forget('admin');
        session()->forget('admin_id_loggedin');
        session()->flash('success', 'Successfully Logged Out!');
        return redirect()->route('adminlogin');
    }
    public function update_admin_password(Request $request)
    {
        $old_password = $request->old_password;
        $new_password = $request->new_password;
        $conf_password = $request->conf_password;

        $hashed_pass = Hash::make($new_password);

        $current_admin_id = Session::get('admin_id_loggedin');

        $obj_admin = Admin::find($current_admin_id);

        if($new_password == $conf_password){
            if (Hash::check($old_password, $obj_admin->password)) {
                $obj_admin->password = $hashed_pass;

                if($obj_admin->save()){
                    Session::flash('success', 'Password updated Successfully');
                }else{
                    $request->session()->flash('message', 'There was error updating the password!');
                }
            }else{
                $request->session()->flash('message', 'Current password dosent match!');
            }
        }else{
            $request->session()->flash('message', 'New password and confirm password dosent match!');
        }
        return redirect()->back();

    }
    public function update_admin_email(Request $request)
    {
        $new_email = $request->new_admin_email;
        Contact::first()->update(['email' => $new_email]);
        Session::flash('success', 'Contact Email updated Successfully');
        return redirect()->back();
    }
}
