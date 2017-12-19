<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Queue\SqsQueue;

use Auth;
use AWS;
use DB;
use Log;
use App\Jobs\SendToRender;
use App\Http\Requests;
use App\Logo;
use App\SocialIcon;
use App\Contact;
use App\UserVideos;
use Session;
use App\Title;
use App\Footer;
use App\TemplateVideos;
use App\Category;
use App\Tags;
use Aws\Sqs\SqsClient;
use Aws\Exception\AwsException;

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
        $title = Title::first();
        $template_videos = TemplateVideos::paginate(12);
        //$data['template_videos'] = TemplateVideos::get();
        //$total_template_videos = TemplateVideos::count();
        //$data['count_pages'] = ceil($total_template_videos / 9);
        return view('videos.create')
        ->withTitle($title)
        ->with('template_videos',$template_videos);
    }
    public function createVideosPage()
    {

        $user_id_loggedin = Session::get('user_id_loggedin');

        if($user_id_loggedin == ''){
            return redirect()->action(
                'UserAuthController@getLogin'
            );
        }
        $response = array();
        $template_videos = TemplateVideos::paginate(12);
        return view('videos.page')->with('template_videos',$template_videos)->render();
    }
    public function createVideosSearch($sort='name',$search)
    {

        $user_id_loggedin = Session::get('user_id_loggedin');

        if($user_id_loggedin == ''){
            return redirect()->action(
                'UserAuthController@getLogin'
            );
        }
        if($sort=="date"){
            $sort = "created_at";
        }
        $response = array();
        $template_videos = TemplateVideos::where('name', 'like', '%' . $search . '%')->orderBy($sort, 'ASC')->paginate(12);
        return view('videos.page')->with('template_videos',$template_videos)->render();
    }
    public function createVideosReceive(Request $request){
        
        if($request->input( 'project_id' ) && $request->input( 'video_url' ) && $request->input( 'project_title' )){
            echo "true";
            if(DB::table('user_videos')->where('project_id', $request->input( 'project_id' ))){
                DB::table('user_videos')
            ->where('project_id', $request->input( 'project_id' ))
            ->update(['video_url' => $request->input( 'video_url' ),'status'=>'Completed', 'updated_at' => date('Y-m-d H:i:s')]);    
            }
        }else{
            echo "false";
        }
    }
    public function createVideosRender(Request $request){
        $user_id_loggedin = Session::get('user_id_loggedin');

        if($user_id_loggedin == ''){
            return redirect()->action(
                'UserAuthController@getLogin'
            );
        }
        $customer_name = $request->input( 'customer_name' );
        $project_title = $request->input( 'project_title' );
        $customer_domain = $request->input( 'customer_domain' );
        $customer_description = $request->input( 'customer_description' );
        $customer_main_video = $request->input( 'customer_main_video' );
        $background = $request->input( 'background' );
        $textcolor = $request->input( 'textcolor' );
        $intro = $request->input( 'intro' );
        $randomId = md5(uniqid(mt_rand(), true));
        $message = [
            'project' => '0005',
            'id' => $randomId,
            'output' => $randomId,
            'project_title' => $project_title,
            'customer_name' => $customer_name,
            'customer_domain' => $customer_domain,
            'main_text' => $customer_description,
            'customer_main_video' => $customer_main_video,
            'background'=> $background,
            'textcolor'=> $textcolor,
            'intro'=> $intro
        ];
        $queueUrl = "https://sqs.us-east-1.amazonaws.com/926913178378/dynamic-video";
        $messageBody = json_encode($message);
        $client = AWS::createClient('sqs');
        $params = [
            'Attributes' => array(
                'ReceiveMessageWaitTimeSeconds' => 5
            ),
            'MessageBody' => $messageBody,
            'QueueUrl' => $queueUrl
        ];
        $response = array();
        try {
            $result = $client->sendMessage($params);
            $currentuserid = Session::get('user_id_loggedin');;
            DB::table('user_videos')->insert(
                ['user_id' => $currentuserid, 'project_id' => $randomId, 'project_title' => $project_title, 'customer_name' => $customer_name, 'customer_domain' => $customer_domain, 'main_text' => $customer_description, 'customer_main_video' => $customer_main_video, 'background' => $background, 'textcolor' => $textcolor, 'intro' => $intro, 'status' => 'Rendering','created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')]
            );
            $response['success'] = 'success';
            $response['id'] = $randomId;
            return \Response::json($response);
        } catch (AwsException $e) {
            $response['success'] = 'failed';
            return \Response::json($response);
            //error_log($e->getMessage());
        }
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