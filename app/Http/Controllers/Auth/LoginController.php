<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{

    use AuthenticatesUsers;

    protected $redirectTo;
    public function redirectTo()
    {
        if(\Auth::user()->hasAnyRoles(['superadmin', 'admin'])){
           $this->redirectTo = '/home';
           return $this->redirectTo;
        }
        elseif(\Auth::user()->hasRole('customer')){
            $this->redirectTo = '/admin/profile/'. Auth::user()->id;
            return $this->redirectTo;
        }
        else{
            $this->redirectTo = '/';
            return $this->redirectTo;
        }
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
