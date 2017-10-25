<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Footer;
use App\Logo;
use App\PasswordSubmit;
use App\SocialIcon;
use App\Title;
use App\User;
use Illuminate\Http\Request;
use App\Exam;

use App\Http\Requests;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Stripe\Charge;
use Stripe\Stripe;
use Stripe\Token;

class HomeController extends Controller
{
    public function getHomePage()
    {
        $data = [];
        $logo = Logo::first();
        $social = SocialIcon::first();
        $contact = Contact::first();
        $title = Title::first();
        $footer = Footer::first();
        $data['exam'] = Exam::all()->count();
        return view('home.home',$data)
            ->withSocial($social)
            ->withContact($contact)
            ->withLogo($logo)
            ->withTitle($title)
            ->withFooter($footer);
    }

    
    
    public function getForgetPassword()
    {
        $logo = Logo::first();
        $social = SocialIcon::first();
        $contact = Contact::first();
        $title = Title::first();
        $footer = Footer::first();
        return view('user.reset-password')
            ->withSocial($social)
            ->withContact($contact)
            ->withLogo($logo)
            ->withTitle($title)
            ->withFooter($footer);
    }
    public function submitForgetPassword(Request $request)
    {
        $email = $request->email;
        $ur = User::whereEmail($email)->count();
        $user = User::whereEmail($email)->first();
        if ($ur == 1){
            $data['token'] = Str::random(60);
            $data['email'] = $email;
            $data['status'] = 0;
            $rr = PasswordSubmit::create($data);
            $url = route('user-password-reset',$rr->token);

            $contact = Contact::first();
            $title = Title::first();
            $footer = Footer::first();
            $mail_val = [
                'email' => $user->email,
                'name' => $user->lname.' '.$user->fname,
                'g_email' => $contact->email,
                'g_title' => $title->title,
                'subject' => 'Password Reset',
            ];
            Config::set('mail.driver','mail');
            Config::set('mail.from',$contact->email);
            Config::set('mail.name',$title->title);

            Mail::send('auth.reset-email', ['name' => $user->name,'link'=>$url,'footer'=>$footer->left_footer], function ($m) use ($mail_val) {
                $m->from($mail_val['g_email'], $mail_val['g_title']);
                $m->to($mail_val['email'], $mail_val['name'])->subject($mail_val['subject']);
            });

            session()->flash('message', 'Check Your Email.Reset link Successfully send.');
            Session::flash('type', 'success');
            return redirect()->back();

        }else{
            session()->flash('message', 'Email Not Match our Recorded.');
            Session::flash('type', 'warning');
            return redirect()->back();
        }
    }
    public function resetForgetPassword($token)
    {
        $pw = PasswordSubmit::whereToken($token)->count();
        if ($pw != null) {

            $logo = Logo::first();
            $social = SocialIcon::first();
            $contact = Contact::first();
            $title = Title::first();
            $footer = Footer::first();

            return view('user.reset-password-form')
                ->withSocial($social)
                ->withContact($contact)
                ->withLogo($logo)
                ->withTitle($title)
                ->withFooter($footer)
                ->withToken($token);
        }else{
            session()->flash('message', 'Something Is Error..');
            Session::flash('type', 'warning');
            return redirect()->route('user-forget-password');
        }
    }
    public function ResetSubmitPassword(Request $request)
    {
        $this->validate($request,[
            'email' => 'email|required',
            'token' => 'required',
            'password' => 'required|min:6|confirmed'
        ]);
        $pw = PasswordSubmit::whereEmail($request->email)->whereToken($request->token)->count();
        $pw1 = PasswordSubmit::whereEmail($request->email)->whereToken($request->token)->first();
        if ($pw == 1){

            $user = User::whereEmail($pw1->email)->first();
            $password = Hash::make($request->password);
            $user->password = $password;
            $user->save();
            PasswordSubmit::whereEmail($pw1->email)->delete();
            session()->flash('message', 'Password Reset Successfully.');
            Session::flash('type', 'success');
            return redirect()->route('userlogin');
        }else{
            session()->flash('message', 'Something Is Error.');
            Session::flash('type', 'success');
            return redirect()->back();
        }
    }
}
