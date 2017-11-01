<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use App\Footer;
use App\Title;
use App\User;
use Mail;
use DB;

use App\Http\Requests;
use App\Contact;
use App\Logo;
use App\SocialIcon;
use Illuminate\Support\Facades\Hash;
use Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller;
class CustomerController extends Controller
{
    //
    public function create()
    {
        $admin_id_loggedin = Session::get('admin_id_loggedin');

        if($admin_id_loggedin == ''){
            return redirect()->action(
                'AdminController@getLogin'
            );
        }
        
        return view('admin.createcustomer');
    }
    public function edit($id)
    {
        $admin_id_loggedin = Session::get('admin_id_loggedin');

        if($admin_id_loggedin == ''){
            return redirect()->action(
                'AdminController@getLogin'
            );
        }
        $data = User::where('id', '=', $id)->first();
        //print_r($data['email']);
        return view('admin.editcustomer')->with('userdata',$data);
    }
    public function add(Request $request)
	{
		if($request['new_customer_active']=='on'){
			$status = 1;
		}else $status = 0;
        $user= new User();
        $user->name= $request['new_customer_name'];
        $user->email= $request['new_customer_email'];
        $user->password= Hash::make($request['new_customer_password']);
        $user->phone= $request['new_customer_phone'];
        $user->status= $status;
        $user->type= $request['new_customer_type'];
        if($user->save()){
            Session::flash('success', 'New Customer Created Successfully');
            if($request['new_customer_confirm']=='on'){
			    //$note = new WelcomeNote($user);
			    //Mail::to($user->email)->send($note);
			    /*$contact = Contact::first();
			    $data = array(
			    	'email' => $request['new_customer_email'],
			    	'subject' => 'Wecome to create Account',
			    	'g_email' => 'lenadolgova714@gmail.com',
			    	'bodyMessage' => 'Please try to login with password'
			    	);
			    Mail::send('admin.email', $data, function($message) use ($data){
			    	echo $data['g_email'];
			    	echo $data['email'];
			    	echo $data['subject'];
			    	$message->from($data['g_email']);
			    	$message->to($data['email']);
			    	$message->subject($data['subject']);
			    });*/
            }
        }else{
            $request->session()->flash('message', 'There was error saving the info!');
        }
        return redirect()->back();
    }
    public function update($id, Request $request)
	{
		 $admin_id_loggedin = Session::get('admin_id_loggedin');

        if($admin_id_loggedin == ''){
            return redirect()->action(
                'AdminController@getLogin'
            );
        }
		$user = User::find($id);
		if($request['new_customer_active']=='on'){
			$status = 1;
		}else $status = 0;
        $user->name= $request['new_customer_name'];
        $user->email= $request['new_customer_email'];
        $user->password= Hash::make($request['new_customer_password']);
        $user->phone= $request['new_customer_phone'];
        $user->status= $status;
        $user->type= $request['new_customer_type'];
        if($user->save()){
            Session::flash('success', 'Customer Info Updated Successfully');
            if($request['new_customer_confirm']=='on'){
			    $contact = Contact::first();
			    $data = array(
			    	'email' => $request['new_customer_email'],
			    	'subject' => 'Updated Account',
			    	'g_email' => 'lenadolgova714@gmail.com',
			    	'bodyMessage' => 'Please try to login with password'
			    	);
			    Mail::send('admin.email', $data, function($message) use ($data){
			    	echo $data['g_email'];
			    	echo $data['email'];
			    	echo $data['subject'];
			    	$message->from($data['g_email']);
			    	$message->to($data['email']);
			    	$message->subject($data['subject']);
			    });
            }
        }else{
            $request->session()->flash('message', 'There was error saving the info!');
        }
        return redirect()->back();
    }
    public function view()
    {
        $admin_id_loggedin = Session::get('admin_id_loggedin');

        if($admin_id_loggedin == ''){
            return redirect()->action(
                'AdminController@getLogin'
            );
        }
        

        $customersdata = DB::table('users')
                 ->select(DB::raw('*, (SELECT count(*) FROM user_videos as v WHERE users.id = v.user_id and v.status = "Completed") as completed_video_num, (SELECT count(*) FROM user_videos as v WHERE users.id = v.user_id and v.status != "Completed") as rendering_video_num'))
                 ->get();
        $videos = DB::table('user_videos')
        		->where('status', 'Completed')
                 ->get();
        $videosdata = array();
        foreach($videos as $video) {
        	if(!isset($videosdata[$video->user_id])) {
        		$videosdata[$video->user_id] = array();
        	}
        	array_push($videosdata[$video->user_id], $video->url);
        }
        foreach($videosdata as $id => $v) {
        	$videosdata[$id] = json_encode($v);
        }
        return view('admin.viewcustomer')
        ->with('customersdata',$customersdata)
        ->with('videosdata',$videosdata);
    }
    public function typeUpdate(Request $request)
    {
    	print_r($request['type']);
    	print_r($request['id']);
        $admin_id_loggedin = Session::get('admin_id_loggedin');

        if($admin_id_loggedin == ''){
            return redirect()->action(
                'AdminController@getLogin'
            );
        }
        User::where('id', $request['id'])->update(['type' => $request['type']]);
        $response = array();
        $response['success'] = 'success';
        $response['id'] = $request['id'];
        $response['type'] = $request['type'];
        return \Response::json($response);
    }
    public function delete($id)
    {
        $admin_id_loggedin = Session::get('admin_id_loggedin');

        if($admin_id_loggedin == ''){
            return redirect()->action(
                'AdminController@getLogin'
            );
        }
        User::where('id', $id)->delete();
        $response = array();
        $response['success'] = 'success';
        $response['id'] = $id;
        return \Response::json($response);
    }
}
