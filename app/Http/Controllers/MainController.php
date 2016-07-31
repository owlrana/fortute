<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use Mail;

class MainController extends Controller
{
    public function index()
    {
    	$content = DB::table('contents')->get();
        return view('index')->with([
            'title' => "Admin login",
            'content' => $content,
        ]);
    }

    public function send_mail(Request $request){

    	$sender_data = array(
            'link' => '',
        );

        $data = array(
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'mobile' => $request->input('mobile'),
            'type' => $request->input('type'),
            'message' => $request->input('message'),
        );

        Mail::send('emails.contact', $data, function ($message) use ($sender_data)  {

            $message->from('indiaxpert@indiaxpert.com', 'Important Fortute');
            $message->to('sandeepdnp28@gmail.com')->subject('Thanks for Contact.....');

        });

    }
}
