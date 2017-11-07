<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Logo;
use App\SocialIcon;
use App\Contact;
use App\UserVideos;
use Illuminate\Support\Facades\Session;
use App\Title;
use App\Footer;

use FFMpeg;

class VideosController extends Controller
{

    public function getVideos()
    {

        $user_id_loggedin = Session::get('user_id_loggedin');

        if($user_id_loggedin == ''){
            return redirect()->action(
                'UserAuthController@getLogin'
            );
        }

        $logo = Logo::first();
        $social = SocialIcon::first();
        $contact = Contact::first();
        $title = Title::first();
        $footer = Footer::first();

        $uservideos = UserVideos::orderBy('user_video_id','DESC')->get();

        return view('videos.videos')
        ->withLogo($logo)
        ->withSocial($social)
        ->withContact($contact)
        ->withUservideos($uservideos)
        ->withTitle($title)
        ->withFooter($footer);
    }

    public function createVideos()
    {

        $user_id_loggedin = Session::get('user_id_loggedin');

        if($user_id_loggedin == ''){
            return redirect()->action(
                'UserAuthController@getLogin'
            );
        }

        $logo = Logo::first();
        $social = SocialIcon::first();
        $contact = Contact::first();
        $title = Title::first();
        $footer = Footer::first();


        return view('videos.create')
        ->withLogo($logo)
        ->withSocial($social)
        ->withContact($contact)
        ->withTitle($title)
        ->withFooter($footer);
    }

    public function getMyVideos()
    {

        $logo = Logo::first();
        $social = SocialIcon::first();
        $contact = Contact::first();
        $title = Title::first();
        $footer = Footer::first();

        $user_id_loggedin = Session::get('user_id_loggedin');

        if($user_id_loggedin == ''){
            return redirect()->action(
                'UserAuthController@getLogin'
            );
        }

        $data['pendingvideos'] = UserVideos::orderBy('user_video_id','DESC')->where("user_id","=",$user_id_loggedin)->where("status","!=",'Completed')->get();
        $data['completedvideos'] = UserVideos::orderBy('user_video_id','DESC')->where("user_id","=",$user_id_loggedin)->where("status","=",'Completed')->get();

        return view('videos.my_videos',$data)
        ->withLogo($logo)
        ->withSocial($social)
        ->withContact($contact)
        ->withTitle($title)
        ->withFooter($footer);
    }
    public function deleteMyVideos($id)
    {
        $logo = Logo::first();
        $social = SocialIcon::first();
        $contact = Contact::first();
        $title = Title::first();
        $footer = Footer::first();

        $user_id_loggedin = Session::get('user_id_loggedin');

        if($user_id_loggedin == ''){
            return redirect()->action(
                'UserAuthController@getLogin'
            );
        }
        UserVideos::where('user_video_id', $id)->delete();
        $response = array();
        $response['success'] = 'success';
        return \Response::json($response);
    }

    public function my_purchases()
    {

        $user_id_loggedin = Session::get('user_id_loggedin');
        if($user_id_loggedin == ''){
            return redirect()->action(
                'UserAuthController@getLogin'
            );
        }

        $logo = Logo::first();
        $social = SocialIcon::first();
        $contact = Contact::first();
        $title = Title::first();
        $footer = Footer::first();

        $user_id_loggedin = Session::get('user_id_loggedin');
        $data['data_here'] = 'Data HEre';

        return view('videos.my_purchases',$data)
        ->withLogo($logo)
        ->withSocial($social)
        ->withContact($contact)
        ->withTitle($title)
        ->withFooter($footer);
    }

    public function make_video_test()
    {
        echo "string";

        $logger = '';

        $ffmpeg = FFMpeg\FFMpeg::create([
            'ffmpeg.binaries'  => '../assets/ffmpeg/bin/ffmpeg.exe',
            'ffprobe.binaries' => '../assets/ffmpeg/bin/ffprobe',
            'timeout'          => 3600,
            'ffmpeg.threads'   => 1,
        ]);
        $video = "http://www.dailymotion.com/cdn/H264-176x144-2/video/x56cpxc.mp4?auth=1483507736-2562-c6cmioov-b1be3ef782de022e4cdfedb4c674859b";
        $video = $ffmpeg->open($video);
        $video
        ->filters()
        ->resize(new FFMpeg\Coordinate\Dimension(320, 240))
        ->synchronize();
        $video
        ->frame(FFMpeg\Coordinate\TimeCode::fromSeconds(10))
        ->save('frame.jpg');
        $video
        ->save(new FFMpeg\Format\Video\X264(), 'export-x264.mp4')
        ->save(new FFMpeg\Format\Video\WMV(), 'export-wmv.wmv')
        ->save(new FFMpeg\Format\Video\WebM(), 'export-webm.webm');
    }

}