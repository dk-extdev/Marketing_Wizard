<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Admin;
use App\UserVideos;
use App\User;
use App\Contact;



use Illuminate\Support\Facades\Session;
class AdminDashboardController extends Controller
{
    //
    public function dashboard()
    {
        $admin_id_loggedin = Session::get('admin_id_loggedin');

        if($admin_id_loggedin == ''){
            return redirect()->action(
                'AdminController@getLogin'
            );
        }
        $totalvideos = UserVideos::where('status','=','Completed')->count();
        $totalcustomers = User::count();
        $todayvideos = UserVideos::whereRaw('DATE(created_at) = CURDATE()')->where('status','=','Completed')->count();

        return view('admin.dashboard')
        ->with('totalvideos', $totalvideos)
        ->with('todayvideos', $todayvideos)
        ->with('totalcustomers', $totalcustomers);
        //->withTotalVideos($totalvideos);
        //->withLogo($logo)
        //->withSocial($social)
        //->withContact($contact)
        //->withUservideos($uservideos)
        //->withTitle($title)
        //->withFooter($footer);
    }
    public function setting()
    {
        $admin_id_loggedin = Session::get('admin_id_loggedin');

        if($admin_id_loggedin == ''){
            return redirect()->action(
                'AdminController@getLogin'
            );
        }
        $contact = Contact::first();
        return view('admin.setting')
        ->with('contact', $contact);
    }
}
