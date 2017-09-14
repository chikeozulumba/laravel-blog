<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use Session;

use App\Post;

class PagesController extends Controller
{
    public function getIndex() {
        $posts  = Post::orderBy('created_at', 'desc')->limit(4)->get();
        return view('pages.welcome')->withPosts($posts);
    }

    public function getAbout() {
        $first = "Chike";
        $last = "Ozulumba";

        $fullname =  $first . " " .  $last;
        $email = 'chike.ozulumba@gmail.com';

        $data['email'] = $email;
        $data['fullname'] = $fullname;
        return view('pages.about')->withFullname($fullname)->withEmail($email)->withData($data);
    }

    public function getContact() {
        return view('pages.contact');
    }

    public function postContact(Request $request) {
        $this->validate($request, [
            'email' => 'required|email',
            'message' => 'required|min:10',
            'subject' => 'required|min:3'
        ]);

        $data = [
            'email' => $request->email,
            'subject' => $request->subject,
            'message_content' => $request->message
        ];

        Mail::send('emails.contact', $data, function($message) use ($data) {
            $message->from($data['email']);
            $message->to('o.devcode@gmail.com');
            $message->subject($data['subject']);

        });

        Session::flash('success', 'Your message was sent');

        return redirect()->url('/');
    }
}
