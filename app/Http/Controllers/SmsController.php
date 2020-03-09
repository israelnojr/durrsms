<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;
use Nexmo\Laravel\Facade\Nexmo;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;


class SmsController extends Controller
{
    public function sendSmsForm()
    {
        if(Gate::denies('can-send-sms')){
            return redirect()->back()->with('warning', 'You not allowed to perform this action');
        }
        return view('sms');
    }
    public function sendSms(Request $request)
    {
        if(Gate::denies('can-send-sms')){
            return back()->with('warning', 'You not allowed to perform this action');
        }
        $request->validate([
            'shortcode' => 'required | numeric',
            'mobile' => 'required | numeric',
            'sendfrom' => 'required',
            'message' => 'required',
        ]);
        DB::transaction(function ()   use ($request){
            Message::create([
                'user_id' => Auth::user()->id,
                'shortcode' => $request->shortcode,
                'mobile' => $request->mobile,
                'sendfrom' => $request->sendfrom,
                'message' => $request->message, 
                'status' => true
            ]);
            
            Nexmo::message()->send([
                'to' => $request->shortcode . $request->mobile,
                'from' => $request->sendfrom,
                'text' => $request->message
            ]);

        });

        Session::flash('success', 'Message sent');
        return back();
    }
}
