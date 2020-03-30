<?php

namespace App\Http\Controllers;

use App\Message;
use Telnyx\Telnyx;
use App\CountryCode;
use Illuminate\Http\Request;
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
        $codes = CountryCode::all();
        return view('sms', compact('codes'));
    }
    public function sendSms(Request $request)
    {
        if(Gate::denies('can-send-sms')){
            return back()->with('warning', 'You not allowed to perform this action');
        }
        dd($request->all());
        $request->validate([
            'shortcode' => 'required | numeric',
            'mobile' => 'required | numeric',
            'sendfrom' => 'required',
            'message' => 'required',
        ]);
        DB::transaction(function () use ($request){
            Message::create([
                'user_id' => Auth::user()->id,
                'shortcode' => $request->shortcode,
                'mobile' => $request->mobile,
                'sendfrom' => $request->sendfrom,
                'message' => $request->message, 
                'status' => true
            ]);
            
            $api_key = env('Telnyx_API_KEY');
            $profile_id = env('messaging_profile_id');
            \Telnyx\Telnyx::setApiKey($api_key); 
            \Telnyx\Message::Create([
                "from" => $request->sendfrom,
                "to" => $request->shortcode . $request->mobile,
                "text" => $request->message,
                'messaging_profile_id' => $profile_id
            ]);
        });
        Session::flash('success', 'Message sent');
        return back();
    }
}
