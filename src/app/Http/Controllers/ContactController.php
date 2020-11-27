<?php
namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Mail\ContactSendmail;

class ContactController extends Controller
{
    public function contact(){
        return view('home.contact.contact');

    }



    public function confirm(Request $request){
        $this->validate($request,[
            'email' => 'required|email:filter,spoof,dns,strict',
            'title'=>'required|max:100',
            'body'=>'required|max:1000',

        ]);

        $inputs = $request->all();
        return view('home.contact.confirm',[
            'inputs'=>$inputs,
        ]);

    }

    public function send(Request $request){
        $this->validate($request,[
            'email' => 'required|email:filter,spoof,dns,strict',
            'title'=>'required|max:100',
            'body'=>'required|max:1000',
        ]);

        $action = $request->input('action');
        $inputs = $request->except('action');

        if($action !== 'submit'){
            return redirect()
            ->route('contact.contact')
            ->withInput($inputs);
        } else {
            \Mail::to($inputs['email'])->send(new ContactSendmail($inputs));

            $request->session()->regenerateToken();

            return view('home.contact.thanks');

        }
    }
}
