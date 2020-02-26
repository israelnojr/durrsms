<?php

namespace App\Http\Controllers;

use App\Prediction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WelcomeController extends Controller
{
    public function welcome()
    {
        $predictions = Prediction::latest()->where([
                ['isPremium', false], ['isEndded', true]
            ])->get()->take(5);
        $prediction = Prediction::latest()->where([
            ['isPremium', false], ['isEndded', false]
        ])->get()->take(5);
        return view('welcome', compact('predictions','prediction'));
    }

    public function strategy()
    {
        $id = Auth::user()->id;
        $user = Auth::user();
       
        if($user->subscription){
            return view('strategy');
        }

        return redirect()->back()->with('warning', 'You Do\'nt have acess, Strategy page to Gain Access - Subscribe to VIP');
    }
}
