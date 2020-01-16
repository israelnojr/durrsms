<?php

namespace App\Http\Controllers;

use App\Prediction;
use Illuminate\Http\Request;

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
}
